<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleCreatedRequest;
use App\Http\Requests\RoleUpdatedRequest;
use App\Jobs\PermissionSyncJob;
use App\Services\Roles;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    private $roles;
    public function __construct(Roles $roles)
    {
        $this->roles = $roles;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->roles->all()->whereNotIn('name', ['customer']);
        return view('dashboard.role.index', compact('roles'))->withTitle('Roles');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $query = Permission::get();

        $permissions = array();
        foreach( $query as $q ) {
            $param = explode('-', $q->name );
            $permissions[$param[0]][] = $q;
        }
        return view('dashboard.role.create', compact('permissions'))->withTitle('Add new role');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleCreatedRequest $request)
    {
        try {
            $this->roles->create($request->all());
        } catch (\Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.role.show')->withTitle('View role');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::with('permissions')->find($id);
        $query = Permission::get();
        $permissions = array();
        foreach( $query as $q ) {
            $param = explode('-', $q->name );
            $permissions[$param[0]][] = $q;
        }

        $rolePermissions = $role->permissions->pluck('name', 'id')->toArray();

        return view('dashboard.role.edit', compact('role', 'permissions', 'rolePermissions'))->withTitle('Update role');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdatedRequest $request, $id)
    {
        try {
            $this->roles->update($request->all(), $id);
            dispatch(new PermissionSyncJob($id, request()->input('permissions')));
        } catch (\Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back();
    }
}

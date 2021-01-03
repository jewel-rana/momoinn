<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreatedRequest;
use App\Http\Requests\UserUpdatedRequest;
use App\Models\User;
use App\Services\Roles;
use App\Services\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    private $users;
    private $roles;

    public function __construct(Users $users, Roles $roles)
    {
        $this->users = $users;
        $this->roles = $roles;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(15);
        return view('dashboard.user.index', compact('users'))->withTitle('Users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $roles = $this->roles->getRoles();
        return view('dashboard.user.create', compact('roles'))->withTitle('Add new user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreatedRequest $request)
    {
        try {
            $user = $this->users->create($request->all());
            $role = Role::where('id', $request->role_id)->first();
            $user->assignRole($role);
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $user = User::find($id);
        return view('dashboard.user.show', compact('user'))->withTitle('User : ' . $user->name);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user = Auth::user();
        return view('dashboard.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = $this->roles->getRoles();
        return view('dashboard.user.edit', compact('user', 'roles'))->withTitle('Edit user');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdatedRequest $request, $id)
    {
        try {
            DB::transaction(function() use($request, $id) {
                $this->users->update($request->all(), $id);
                $this->users->syncRole($request->all(), $id);
            }, 2);
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage() . '-' . $e->getFile() . $e->getLine());
        }
        return redirect()->route('users.index');
    }

    public function action(Request $request)
    {
        if (isset($request->action)) {
            return call_user_func(array($this, $request->action), $request);
        }
    }

    private function active($request)
    {
        $this->users->update(['status' => 1], $request->id);
        return redirect()->back();
    }

    private function deactive($request)
    {
        $this->users->update(['status' => 2], $request->id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}

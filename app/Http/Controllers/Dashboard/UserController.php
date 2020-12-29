<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $success = 200;
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
    public function create( Request $request )
    {
        $roles = Role::whereNotIn('name', ['customer', 'reseller'])->pluck('name', 'id');
        return view('dashboard.user.create', compact('roles'))->withTitle('Add new user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = ['status'=> false, 'label' => 'error', 'content' => 'Cannot create user'];
        //form validation rules
        $validator = Validator::make($request->all(), [
            'branch_id' => 'bail|required|numeric|exists:branches,id',
            'name' => 'bail|required|string|max:191',
            'email' => 'bail|required|unique:users,email',
            'mobile' => 'bail|required|regex:/^(01){1}[3456789]{1}(\d){8}$/|unique:users,mobile',
            'password' => 'bail|required|same:password_confirm|min:8|max:32',
            'password_confirm' => 'required',
            'role' => 'bail|required|integer',
            'designation_id' => 'bail|required|integer'
        ]);

        //validation fails
        if ( $validator->fails() ) {
            $data['content'] = $validator->errors()->first();
        } else {

            $designation = Designation::findOrFail( $request->designation_id );
            //Saving data
            DB::beginTransaction();
            try{
                $user = new User();
                $user->branch_id = $request->branch_id;
                $user->name = $request->name;
                $user->fathers_name = $request->fathers_name;
                $user->mothers_name = $request->mothers_name;
                $user->email = $request->email;
                $user->gender = $request->gender;
                $user->mobile = $request->mobile;
                $user->password = Hash::make( $request->password );
                $user->email_verified_at = now();
                $user->status = 1;

                if( $user->save() ) {
                    $role = Role::where('id', $request->role)->first();
                    $user->assignRole($role); //Assigning role to user

                    //create employee
                    $employee = new Employee;
                    $employee->user_id = $user->id;
                    $employee->designation_id = $request->designation_id;
                    $employee->date_of_birth = ( $request->date_of_birth ) ? date('Y-m-d', strtotime( $request->date_of_birth ) ) : date('Y-m-d');
                    $employee->department_id = $designation->department_id;
                    $employee->designation_id = $request->designation_id;
                    $employee->joining_date = ( $request->joining_date ) ? date('Y-m-d', strtotime( $request->joining_date ) ) : date('Y-m-d');
                    $employee->save();

                    DB::commit();
                    $data['status'] = true;
                    $data['label'] = 'success';
                    $data['content'] = 'User has been successfully created';
                }
            } catch( \Exception $e ) {
                DB::rollback();
                Log::debug($e->getMessage());
            }
        }

        if( $data['status'] == true ) {
            return redirect()->route('dashboard.user.index')->with([
                'message' => $data
            ]);
        } else {
            return redirect()->back()->with([
                'message' => $data
            ])->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Request $request, $id )
    {
        $user = User::find( $id );
        return view('dashboard.user.show', compact('user'))->withTitle('User : '. $user->name );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( User $user )
    {
        $roles = Role::whereNotIn('name', ['customer', 'reseller'])->pluck('name', 'id');
        return view('dashboard.user.edit', compact('user', 'roles'))->withTitle('Edit user');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = ['status'=> false, 'label' => 'error', 'content' => 'Cannot update user'];
        //form validation rules
        $validator = Validator::make($request->all(), [
            'branch_id' => 'bail|required|integer|exists:branches,id',
            'name' => 'bail|required|string|max:191',
            'email' => 'bail|required|unique:users,email,' . $id,
            'mobile' => 'bail|required|regex:/^(01){1}[3456789]{1}(\d){8}$/|unique:users,mobile,' . $id,
            'password' => 'bail|nullable|same:password_confirm|min:8|max:32',
            'role' => 'bail|required|integer|exists:roles,id'
        ]);

        //validation fails
        if ( $validator->fails() ) {
            $data['content'] = $validator->errors()->first();
        } else {

            $designation = Designation::findOrFail( $request->designation_id );
            //Saving data
            DB::beginTransaction(); //Start transaction!

            try{
                //saving logic here
                $user = User::findOrFail( $id );
                $user->branch_id = $request->branch_id;
                $user->name = $request->name;
                $user->fathers_name = $request->fathers_name;
                $user->mothers_name = $request->mothers_name;
                $user->gender = $request->gender;
                $user->email = $request->email;
                $user->email_verified_at = now();
                $user->status = 1;
                if( $request->password ) {
                    $user->password = Hash::make( $request->password );
                }

                if( $user->save() ) {
                    //remove previous role
                    if( $user->hasanyrole(Role::all() ) ) {
                        foreach( $user->roles as $role ) {
                            $user->removeRole( $role );
                        }
                    }

                    //assign role
                    $role = Role::where('id', $request->role)->first();
                    $user->assignRole($role);

                    //save employee info
                    $employee = Employee::firstOrNew(['user_id' => $user->id]);
                    $employee->user_id = $user->id;
                    $employee->department_id = $designation->department_id;
                    $employee->designation_id = $request->designation_id;
                    $employee->joining_date = ( $request->joining_date ) ? date('Y-m-d', strtotime( $request->joining_date ) ) : $employee->designation_id;
                    $employee->date_of_birth = ( $request->date_of_birth ) ? date('Y-m-d', strtotime( $request->date_of_birth ) ) : $employee->date_of_birth;

                    $employee->save();

                    DB::commit();
                    $data['status'] = true;
                    $data['label'] = 'success';
                    $data['content'] = 'User has been successfully updated';
                }
            }
            catch(\Exception $e)
            {
                DB::rollback();
                Log::debug($e->getMessage());
            }
        }

        if( $data['status'] == true ) {
            return redirect()->route('dashboard.user.index')->with([
                'message' => $data
            ]);
        } else {
            return redirect()->back()->with([
                'message' => $data
            ])->withInput($request->all())->withErrors($validator->errors());
        }
    }

    public function action( Request $request )
    {
        $customer_id = $request->id;
        if( isset( $request->action ) ) {
            return call_user_func(array($this, $request->action), $request);
        }
    }

    private function active( $request )
    {
        $data = ['status' => false, 'label' => 'error', 'content' => 'User cannot activate'];
        $user = User::findOrFail($request->id);
        $user->status = 1;
        if( $user->save()) {
            $data['label'] = 'success';
            $data['status'] = true;
            $data['content'] = 'User has been successfully activated';
        }

        if( request()->ajax() || request()->wantsJson() ) {
            return response()->json($data, $this->success);
        }
        return redirect()->back()->with([
            'message' => $data
        ]);
    }

    private function deactive( $request )
    {
        $data = ['status' => false, 'label' => 'error', 'content' => 'User cannot de-activate'];
        $user = User::findOrFail($request->id);
        $user->status = 2;
        if( $user->save()) {
            $data['label'] = 'success';
            $data['status'] = true;
            $data['content'] = 'User has been successfully de-activated';
        }

        if( request()->ajax() || $request->wantsJson() ) {
            return response()->json($data, $this->success);
        }
        return redirect()->back()->with([
            'message' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( User $user )
    {
        if( Auth::user()->can('user-delete') ) {
            $user->delete();

            return redirect()->back()->with([
                'message' => [
                    'label' => 'success',
                    'content' => 'User has been successfully deleted.'
                ]
            ]);
        } else {
            return redirect()->back()->with([
                'message' => [
                    'label' => 'danger',
                    'content' => 'You have no permission to delete user.'
                ]
            ]);
        }
    }

    /**
     * Logout the user from session.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect(route('login'))->with([
            'message' => [
                'label' => 'success',
                'content' => 'You are successfully loggedout.'
            ]
        ]);;
    }

    public function export( Request $request )
    {
        return Excel::download(new CustomersExport, 'ispbillman_users.xlsx');
    }

    public function import( Request $request )
    {
        if( $request->isMethod('post') && $request->file('myFile')) {
            Excel::import(new CustomersImport, $request->myFile);
            return redirect()->route('dashboard.user.index')->with([
                'message' => [
                    'label' => 'success',
                    'content' => 'Users successfully imported.'
                ]
            ]);
        }

        return view('dashboard.user.import')->withTitle('Import users')->withCount(0);
    }
}

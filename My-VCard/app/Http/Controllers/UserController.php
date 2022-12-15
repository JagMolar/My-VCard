<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DataTables,Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('users');
    }

    public function getUserList(Request $request)
    {
        
        $data  = User::get();

        return Datatables::of($data)
                ->addColumn('roles', function($data){
                    $roles = $data->getRoleNames()->toArray();
                    $badge = '';
                    if($roles){
                        $badge = implode(' , ', $roles);
                    }

                    return $badge;
                })
                ->addColumn('permissions', function($data){
                    $roles = $data->getAllPermissions();
                    $badges = '';
                    foreach ($roles as $key => $role) {
                        $badges .= '<span class="badge badge-dark m-1">'.$role->name.'</span>';
                    }

                    return $badges;
                })
                ->addColumn('action', function($data){
                    if($data->name == 'Super Admin'){
                        return '';
                    }
                    if (Auth::user()->can('manage_user')){
                        return '<div class="table-actions">
                                <a href="'.url('user/'.$data->id).'" ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                <a href="'.url('user/delete/'.$data->id).'"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                            </div>';
                    }else{
                        return '';
                    }
                })
                ->rawColumns(['roles','permissions','action'])
                ->make(true);
    }

    public function create()
    {
        try
        {
            $roles = Role::pluck('name','id');
            return view('create-user', compact('roles'));

        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);

        }
    }

    public function store(Request $request)
    {
        // create user 
        $validator = Validator::make($request->all(), [
            'name'     => 'required | string ',
            'email'    => 'required | email | unique:users',
            'password' => 'required | confirmed',
            'role'     => 'required'
        ]);
        
        if($validator->fails()) {
            // return redirect()->back()->withInput()->withErr('error', $validator->messages()->first());
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors('error', $validator)
                    ->first();
        }
        try
        {
            // store user information
            $user = User::create([
                        'name'     => $request->name,
                        'email'    => $request->email,
                        'password' => Hash::make($request->password),
                    ]);

            // assign new role to the user
            $user->syncRoles($request->role);

            if($user){ 
                return redirect('users')->with('success', 'New user created!');
            }else{
                return redirect('users')->with('error', 'Failed to create new user! Try again.');
            }
        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    public function edit($id)
    {
        try
        {
            $user  = User::with('roles','permissions')->find($id);

            if($user){
                $user_role = $user->roles->first();
                $roles     = Role::pluck('name','id');

                return view('user-edit', compact('user','user_role','roles'));
            }else{
                return redirect('404');
            }

        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }

    public function update(Request $request)
    {

        // update user info
        $validator = Validator::make($request->all(), [
            'id'       => 'required',
            'name'     => 'required | string ',
            'email'    => 'required | email',
            'role'     => 'required'
        ]);

        // check validation for password match
        if(isset($request->password)){
            $validator = Validator::make($request->all(), [
                'password' => 'required | confirmed'
            ]);
        }
        
        if ($validator->fails()) {
            // return redirect()->back()->withInput()->with('error', $validator->messages()->first());
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors('error', $validator)
                    ->first();
        }

        try{
            
            $user = User::find($request->id);

            $update = $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            // update password if user input a new password
            if(isset($request->password)){
                $update = $user->update([
                    'password' => Hash::make($request->password)
                ]);
            }

            // sync user role
            $user->syncRoles($request->role);

            return redirect()->back()->with('success', 'User information updated succesfully!');
        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);

        }
    }


    public function delete($id)
    {
        $user   = User::find($id);
        if($user){
            $user->delete();
            return redirect('users')->with('success', 'User removed!');
        }else{
            return redirect('users')->with('error', 'User not found');
        }
    }

    public function myVCard(Request $request){
        if(isset ($request-> cardImage)){
            dd($request);
            $cardImage = $request->file('card_image')->store('public/img/uploads');
            $url_image = Storage::url($cardImage);

        }
        
    }

    public function updateProfiles(Request $request)
    {
      
        // dd($request);

        // update user info
        $validator = Validator::make($request->all(), [
            'id'                     => 'required',
            'name'                   => 'required | string ',
            'user_image'             => 'image| max:1024',
            'position'               => 'required | string ',
            'socialUrl1'             => 'nullable | url ',
            'socialUrl2'             => 'nullable | url ',
            // 'socialUrl3'             => 'nullable | url ',
            'socialUrl3'             => 'nullable | numeric | digits:9 ',
            'socialUrl4'             => 'nullable | email ',
            'socialUrl5'             => 'nullable | url ',
        ]);
        // dd($validator);
        

        if ($validator->fails()) {
            // return back()->withInput()->with('error', $validator->messages()->first());
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors('error', $validator)
                    ->first();
        }


        try {
            $user = User::find($request->id);
            $name = $request->name;
            $position = $request->position;

            if(isset($request->user_image)){
                $user_image = $request->file('user_image')->store('public/img/uploads');
                $url_image = Storage::url($user_image);

                $update = $user->update([
                    'name' => $name,
                    'position' => $position,
                    'user_image' => $url_image,
                ]);
   
            }else{
       
                $update = $user->update([
                    'name' => $name,
                    'position' => $position
                ]);

            }
                $socialUrl1 = $request->socialUrl1;
                $socialUrl2 = $request->socialUrl2;
                $socialUrl3 = $request->socialUrl3;
                // dd($socialUrl3);
                $socialUrl4 = $request->socialUrl4;
                $socialUrl5 = $request->socialUrl5;

                $sql = 'SELECT social_user_id FROM social_media s JOIN users u ON u.id=s.social_user_id WHERE u.id='.$user->id;
                // dd($sql);
                $social_media = DB::select($sql);
               
                if(empty($social_media)){
                    $sqlSocial = "INSERT INTO social_media (social_user_id,social_url1,social_url2,social_url3,social_url4,social_url5) VALUES (".$user->id.",'".$socialUrl1."','".$socialUrl2."','".$socialUrl3."','".$socialUrl4."','".$socialUrl5."')";
             
                    $socialData = DB::insert($sqlSocial);

                } else {
                    $sqlDelete = "DELETE FROM social_media WHERE social_user_id =".$user->id;
                    // dd($sqlDelete);

                    $socialDelete=  DB::delete($sqlDelete);
                    //DELETE FROM social_media WHERE `social_media`.`social_id` = 3 AND `social_media`.`social_user_id` = 7"
                    $sqlSocial = "INSERT INTO social_media (social_user_id,social_url1,social_url2,social_url3,social_url4,social_url5) VALUES (".$user->id.",'".$socialUrl1."','".$socialUrl2."','".$socialUrl3."','".$socialUrl4."','".$socialUrl5."')";
                    // dd($sqlSocial);
                    $socialData = DB::insert($sqlSocial);

                }          

            $request->session()->flash('alert-success', 'Imagen de usuario actualizada correctamente!');
            return back()->with('success', 'User data updated!');
        } catch (\Exception $e ) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }

    } //End function updateProfiles
} //fin UserController

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    //    $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function clearCache()
    {
        \Artisan::call('cache:clear');
        return view('clear-cache');
    }


    public function welcomeCard()
    {
        $users= Auth::user();
       
        $privilege=  User::with('roles')->where('name', '=', 'Super Admin')->get();
        $idRol= $privilege[0]->id;
        
        $id= $users->id;
        $userPrivilege= ($id == $idRol) ? 'Super Admin' : null;
        
        $name= $users->name;
        $position= $users->position;
        if(empty($user_image)){
            $user_image = '';
        }else{
            $user_image = $users->user_image;
        }
    
        $social_media = DB::select('select * from social_media where social_user_id = ?', [$id]) ;

        // dd($social_media);

        $urlCard = url("/user-card");

        if(empty($social_media)){
            $socialUrl1 = '';
            $socialUrl2 = '';
            $socialUrl3 = '';
            $socialUrl4 = '';
            $socialUrl5 = '';
        }else{
            $socialUrl1 = $social_media[0]->social_url1;
            $socialUrl2 = $social_media[0]->social_url2;
            $socialUrl3 = $social_media[0]->social_url3;
            // dd($socialUrl3);
            $socialUrl4 = $social_media[0]->social_url4;
            $socialUrl5 = $social_media[0]->social_url5;
        }

        return view('edit-card',[
            'users' => $users,
            'name'=> $name,
            'position' => $position,
            'user_image' => $user_image,
            'socialUrl1'=> $socialUrl1,
            'socialUrl2'=> $socialUrl2,
            'socialUrl3'=> $socialUrl3,
            'socialUrl4'=> $socialUrl4,
            'socialUrl5'=> $socialUrl5,
            'userPrivilege' => $userPrivilege,
            'urlCard' => $urlCard 
        ]);
    }

    public function myCard()
    {
        $users= Auth::user();
   
        $userPrivilege=  User::with('roles')->where('name', '=', 'Super Admin')->get();
      
        $id= $users->id;
        $name= $users->name;
        $position= $users->position;
        $user_image = $users->user_image;

        $urlCard = url("/user-card/$id");
 
        $social_media = DB::select('select * from social_media where social_user_id = ?', [$id]) ;
  

        if(empty($social_media)){
            $socialUrl1 = '';
            $socialUrl2 = '';
            $socialUrl3 = '';
            $socialUrl4 = '';
            $socialUrl5 = '';
        }else{
            $socialUrl1 = $social_media[0]->social_url1;
            $socialUrl2 = $social_media[0]->social_url2;
            $socialUrl3 = $social_media[0]->social_url3;
            // dd($socialUrl3);
            $socialUrl4 = $social_media[0]->social_url4;
            $socialUrl5 = $social_media[0]->social_url5;
        }

        return view('my-card',compact(
            'users',
            'name',
            'position',
            'user_image',
            'socialUrl1',
            'socialUrl2',
            'socialUrl3',
            'socialUrl4',
            'socialUrl5' ,
            'userPrivilege',
            'urlCard' 
        ));
    }

    public function userCard($id)
    {

        $users= User::find($id);
 
        $userPrivilege=  User::with('roles')->where('name', '=', 'Super Admin')->get();
        $id= $users->id;
        $name= $users->name;
        $position= $users->position;
        $user_image = $users->user_image;

        $urlCard = url("/user-card/$id");

        $social_media = DB::select('select * from social_media where social_user_id = ?', [$id]) ;
  
        if(empty($social_media)){
            $socialUrl1 = '';
            $socialUrl2 = '';
            $socialUrl3 = '';
            $socialUrl4 = '';
            $socialUrl5 = '';
        }else{
            $socialUrl1 = $social_media[0]->social_url1;
            $socialUrl2 = $social_media[0]->social_url2;
            $socialUrl3 = $social_media[0]->social_url3;
            $socialUrl4 = $social_media[0]->social_url4;
            $socialUrl5 = $social_media[0]->social_url5;
        }
        
        return view('user-card',compact(
            'users',
            'name',
            'position',
            'user_image',
            'socialUrl1',
            'socialUrl2',
            'socialUrl3',
            'socialUrl4',
            'socialUrl5' ,
            'userPrivilege',
            'urlCard' 
        ));
    }


    public function myVCardPDF(){
       
        $users= Auth::user();
     
        $userPrivilege=  User::with('roles')->where('name', '=', 'Super Admin')->get();
      
        $id= $users->id;
        $name= $users->name;
        $position= $users->position;
        $user_image = $users->user_image;

        $urlCard = url("/my-card");    
 
        $social_media = DB::select('select * from social_media where social_user_id = ?', [$id]) ;
  

        if(empty($social_media)){
            $socialUrl1 = '';
            $socialUrl2 = '';
            $socialUrl3 = '';
            $socialUrl4 = '';
            $socialUrl5 = '';
            $data = [
                'id' => $id,
                'name' => $name,
                'position' => $position,
                'user_image' => $user_image,
                'urlCard' => $urlCard,
                'socialUrl1' => $socialUrl1,
                'socialUrl2' => $socialUrl2,
                'socialUrl3' => $socialUrl3,
                'socialUrl4' => $socialUrl4,
                'socialUrl5' => $socialUrl5,
                'userPrivilege' => $userPrivilege,
                'urlCard' => $urlCard 
            ];
        }else{
            $socialUrl1 = $social_media[0]->social_url1;
            $socialUrl2 = $social_media[0]->social_url2;
            $socialUrl3 = $social_media[0]->social_url3;
            $socialUrl4 = $social_media[0]->social_url4;
            $socialUrl5 = $social_media[0]->social_url5;
            $data = [
                'id' => $id,
                'name' => $name,
                'position' => $position,
                'user_image' => $user_image,
                'urlCard' => $urlCard,
                'socialUrl1' => $socialUrl1,
                'socialUrl2' => $socialUrl2,
                'socialUrl3' => $socialUrl3,
                'socialUrl4' => $socialUrl4,
                'socialUrl5' => $socialUrl5,
                'userPrivilege' => $userPrivilege,
                'urlCard' => $urlCard 
            ];
        }

        // OPCION2 
        $file = $name.'_VCard.pdf';

        $pdf = PDF::loadView('my-card', compact('users',
        'name',
        'position',
        'user_image',
        'socialUrl1',
        'socialUrl2',
        'socialUrl3',
        'socialUrl4',
        'socialUrl5' ,
        'userPrivilege',
        'urlCard' ));

        return $pdf->download($file);

    }

}//Fin HomeController

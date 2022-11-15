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
        $this->middleware('auth');
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
        // $userPrivilege= $users->roles->name;
        $userPrivilege=  User::with('roles')->where('name', '=', 'Super Admin')->get();
        // dd($userPrivilege);
        $id= $users->id;
        $name= $users->name;
        $position= $users->position;
        $user_image = $users->user_image;
        // dd($user_image);

        // if(empty($position)){
        //     $position = 'Indique un cargo';
        // }
        $social_media = DB::select('select * from social_media where social_user_id = ?', [$id]) ;
        // dd($id);
        // dd($social_media);
        // dd($social_media[0]);
        // dd($social_media[0]->social_url1);

        $urlCard = url("/my-card");
        // dd($urlCard);

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
        

        // $userImages = DB::select('select * from user_images where image_id = ?', [$id]) ;
        // // dd($user_images);
        // if(empty($userImages)){
        //     $userImages = null;
        // }
        // $name = $users=>'name';
        // dd($id);
        // dd($name);
        // $users = User::orderBy('id', 'desc')->get();
        // $sql = "SELECT * FROM users WHERE id =".$id;
        // dd($sql);
        // $users = DB::select($sql);
        // dd($sql);
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
        // $userPrivilege= $users->roles->name;
        $userPrivilege=  User::with('roles')->where('name', '=', 'Super Admin')->get();
        // dd($userPrivilege);
        $id= $users->id;
        $name= $users->name;
        $position= $users->position;
        $user_image = $users->user_image;

        $urlCard = url("/my-card");
        // dd($urlCard);

        // $user_image = $request->file('user_image')->store('public/img/uploads');
        // $url_image = Storage::url($user_image);
 
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
        

        // return view('my-card',[
        //     'users' => $users,
        //     'name'=> $name,
        //     'position' => $position,
        //     'user_image' => $user_image,
        //     'socialUrl1'=> $socialUrl1,
        //     'socialUrl2'=> $socialUrl2,
        //     'socialUrl3'=> $socialUrl3,
        //     'socialUrl4'=> $socialUrl4,
        //     'socialUrl5'=> $socialUrl5,
        //     'userPrivilege' => $userPrivilege,
        //     'urlCard' => $urlCard 
        // ]);
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

    // public function myVCard(Request $request){
    //     dd($request);
    //     if(isset ($request-> cardImage)){
    //         dd($request);
    //         $cardImage = $request->file('card_image')->store('public/img/uploads');
    //         $url_image = Storage::url($cardImage);
    //         // $imagenCodificada = $_POST["imagen"];
    //         // $imagenCodificada = 'imagen';
    //         // $imagenCodificadaLimpia = str_replace("data:image/png;base64,", "", $imagenCodificada);
    //         // $imagenDecodificada = base64_decode($imagenCodificadaLimpia);
    //         // $nombreImagenGuardada = "imagen_" . uniqid() . ".png";
    //         // file_put_contents($nombreImagenGuardada, $imagenDecodificada);
    //         // echo json_encode($nombreImagenGuardada); 
    //     }
        
    // }

    public function myVCardPDF(){
        // dd('pdf');
        $users= Auth::user();
        // dd($users);
        // $userPrivilege= $users->roles->name;
        $userPrivilege=  User::with('roles')->where('name', '=', 'Super Admin')->get();
        // dd($userPrivilege);
        $id= $users->id;
        $name= $users->name;
        $position= $users->position;
        $user_image = $users->user_image;

        $urlCard = url("/my-card");
        // dd($urlCard);

        // $user_image = $request->file('user_image')->store('public/img/uploads');
        // $url_image = Storage::url($user_image);
 
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
        // dd($data);
        //NO ENTRA A CREAR LA VISTA!!
        // $pdf = PDF::loadView('my-card', $data)
        // ->save(storage_path('app/public/').'{{$name}}'+'_VCard.pdf');
        // dd('pdf');

        // OPCION2 
        $file = $name.'_VCard.pdf';
        // view()->share('my-card',$data);
        // dd($file);

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
        // dd('pdf');

        return $pdf->download($file);

        // return view('edit-card',[
        //     'users' => $users,
        //     'name'=> $name,
        //     'position' => $position,
        //     'user_image' => $user_image,
        //     'socialUrl1'=> $socialUrl1,
        //     'socialUrl2'=> $socialUrl2,
        //     'socialUrl3'=> $socialUrl3,
        //     'socialUrl4'=> $socialUrl4,
        //     'socialUrl5'=> $socialUrl5,
        //     'userPrivilege' => $userPrivilege,
        //     'urlCard' => $urlCard 
        // ]);     
        // return redirect()->back();
    }


}//Fin HomeController

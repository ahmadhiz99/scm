<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

use App\Helpers\SidebarHelper;
use App\Models\User;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $menu = SidebarHelper::list(Auth::user()->role_id);

        $curr_user = Auth::user()->id;
        $user = User::find($curr_user);
        $user->password = Crypt::decrypt($user->password);


        return view('component.profile.index',[
            'menu'=>$menu,
            'user'=>$user
        ]);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProfile(Request $request)
    {
        $menu = SidebarHelper::list(Auth::user()->role_id);
        
        $curr_user = Auth::user()->id;
        $user = User::find($curr_user);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = Crypt::encrypt($request->password);
        $user->rekening = $request->rekening;
        $user->bank = $request->bank;

        // dd($user);

        if($user->save()){
            return back()->with('success', 'Selamat Data dimasukan!');
        }else{
            return back()->with('failed', 'Maaf Data dimasukan!');
        }    
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile2()
    {
        $menu = SidebarHelper::list(Auth::user()->role_id);

        $curr_user = Auth::user()->id;
        $user = User::find($curr_user);
        // dd($user);

        return view('component.profile.profile2',[
            'menu'=>$menu,
            'user'=>$user
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

}

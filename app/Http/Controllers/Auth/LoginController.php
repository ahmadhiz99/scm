<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
       
    }

    protected function redirectTo(){
        if(Auth()->user()->role_id == 1){
            return route('admin.dashboard');
        }
        else if(Auth()->user()->role_id == 2){
            return route('seller.dashboard');
        }
        else if(Auth()->user()->role_id == 3){
            $cust_order = CustomerOrder::find(Auth()->user()->id);

            // return route('konsumen.dashboard');

            dd($cust_order);

            return route(
                'konsumen.dashboard',
                [
                    'menu'=>$menu,
                    'dataContent'=>$dataContent
                ]
            );
        }
    }

    public function login(Request $request){
        // $cust_order = CustomerOrder::all();

        // $i = 0;
        // foreach($cust_order as $key => $data){
        // };

        // dd($cust_order);

        // return route('konsumen.dashboard');

        // dd($cust_order);
        $input = $request->all();
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required'
        ]);

        // $user = User::where('email', $request->input('email'))->first();
        // $decrypted = Crypt::decrypt($user->password); 
        // if ($input) {
        //     if ($input['password'] == $decrypted) {
                // Auth::login($user);

        //         dd('text');
        //         return redirect()->intended('dashboard')->with('success');
        //         }
        //     }
        //     return Redirect::back()->with('error');
         

        if( auth()->attempt(array('email'=>$input['email'], 'password'=>$input['password']))){
        // if( auth()->attempt(array('email'=>$input['email'], 'password'=>Crypt::encrypt($input['password']))) ){

            if( auth()->user()->role_id == 1 ){
                return redirect()->route('admin.dashboard');
            }
            else if( auth()->user()->role_id == 2 ){
                return redirect()->route('seller.dashboard');
            }
            else if( auth()->user()->role_id == 3 ){
                return redirect()->route('konsumen.dashboard');
            }
            else if( auth()->user()->role_id == 4 ){
                return redirect()->route('suplier.dashboard');
           }else{
            return back()->with('failed', 'Selamat Data dimasukan!');
            //    return redirect()->route('login')->with('error','Email and password are wrong');
            }
        }else{
            return back()->with('failed', 'Maaf Username Atau Password Salah!');
        }
    }
}

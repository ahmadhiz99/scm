<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers\SidebarHelper;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\DevCode;
use App\Models\Minat;


use Illuminate\Support\Facades\DB;
use App\Helpers\TableHelper;

use App\Models\User;



class AdminController extends Controller
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
        $menu = SidebarHelper::list(Auth::user()->role_id);

        // Inisiate Data
        $user = User::all();
        $table = new User;
                
        return view(
            'admin.dashboard',                              
            [
                'menu'=>$menu,
                'user'=>$user,
            ]
        );

    }

    public function dataPendaftaran()
    {
        $datapendaftaran = Pendaftaran::all();
        // dd($datapendaftaran);
        return view('admin.pendaftar',['datapendaftaran'=>$datapendaftaran]);
        // return view('admin.dashboard');
    }
    public function dataDevCode()
    {
        $dataDevCode = DevCode::all();
        // dd($dataDevCode);
        return view('admin.devcode',['dataDevCode'=>$dataDevCode]);
        // return view('admin.dashboard');
    }
        public function tambahdevcode(Request $request)
    {

        $dataMinat = Minat::all();
        // dd($dataMinat);
        return view('admin.tambahdevcode',['dataMinat'=>$dataMinat]);
        // return view('admin.dashboard');
    }



    public function tambahdatadevcode(Request $request)
    {
// dd($request);
        $dataDevCode = new DevCode;
        // dd($dataDevCode);
        $dataDevCode->name = $request->name;
        $dataDevCode->email = $request->email;
        $dataDevCode->img_url = $request->img_url;
        $dataDevCode->role= $request->role;
        $dataDevCode->ig = $request->ig;
        $dataDevCode->github = $request->github;
        $dataDevCode->linkedin = $request->linkedin;
        $dataDevCode->bio = $request->bio;
        $dataDevCode->save();
        // dd($request);
        // return back()->with('status', 'Data Dapat ditambahkan!');
       
        $dataMinat = Minat::all();
        // dd($dataMinat);
        return view('admin.tambahdevcode',['dataMinat'=>$dataMinat]);
    }

    
    public function hapusdevcode($id)
{
    // dd($id);
    $dataDevCode =  DevCode::find($id);
    // dd($dataDevCode);
    $dataDevCode->delete();
    // dd($request);
    return back()->with('status', 'Data Terhapus!');

}

public function hapusminat($id)
{
    // dd($id);
    $dataminat =  Minat::find($id);
    // dd($dataminat);
    $dataminat->delete();
    // dd($request);
    return back()->with('status', 'Data Terhapus!');

}
    
    public function dataminat()
    {
        $dataminat = Minat::all();
        // dd($dataminat);
        return view('admin.minat',['dataminat'=>$dataminat]);
        // return view('admin.dashboard');
    }
    public function detailpendaftar($id)
    {
        // dd($id);
        $datapendaftaran = Pendaftaran::find($id);
        // dd($datapendaftaran);
        return view('admin.detail-pendaftar',['datapendaftaran'=>$datapendaftaran]);
        // return view('admin.dashboard');
    }
    public function detaildevcode($id)
    {
        // dd($id);
        $dataDevCode = DevCode::find($id);
        // dd($dataDevCode);
        return view('admin.detail-devcode',['dataDevCode'=>$dataDevCode]);
        // return view('admin.dashboard');
    }

    public function approvependaftar($id)
    {

            $datapendaftaran =  Pendaftaran::find($id);
            // dd($datapendaftaran);
            $datapendaftaran->status = 1;
            // $pendaftaran->nama = $request->nama;
            // $pendaftaran->email = $request->email;
            // $pendaftaran->nim = $request->nim;
            // // $pendaftaran->img_url = $request->img_url;
            // $pendaftaran->minat_id= $request->id_minat;
            // $pendaftaran->nomor_wa = $request->nomor_wa;
            // $pendaftaran->ig = $request->ig;
            // $pendaftaran->github = $request->github;
            // $pendaftaran->linkdin = $request->linkdin;
    
            $datapendaftaran->save();
            // dd($request);
            return back()->with('status', 'Selamat Data Anda disetujui!');
        // return view('admin.dashboard');    
}
public function hapuspendaftaran($id)
{
    // dd($id);
    $datapendaftaran =  Pendaftaran::find($id);
    // dd($datapendaftaran);
    $datapendaftaran->delete();
    // dd($request);
    return back()->with('status', 'Data Terhapus!');

}
public function disapprovependaftar($id)
{

        $datapendaftaran =  Pendaftaran::find($id);
        // dd($datapendaftaran);
        $datapendaftaran->status = 0;
        $datapendaftaran->save();
        // dd($request);
        return back()->with('status', 'Data Tidak disetujui!');
    // return view('admin.dashboard');    
}
public function tambahminat(Request $request)
{
// dd($request);
    $dataminat = new Minat;
    // dd($dataminat);
     $dataminat->name_minat = $request->name_minat;

    $dataminat->save();
    // dd($request);
    return back()->with('status', 'Data Dapat ditambahkan!');
    // return view('admin.dashboard');
}

public function editminat($id ,Request $request)
{
// dd($id);
    $dataminat = Minat::find($id);
    // dd($dataminat);
     $dataminat->name_minat = $request->name_minat;

    $dataminat->save();
    // dd($request);
    return back()->with('status', 'Data Telah diedit!');
    // return view('admin.dashboard');
}


}
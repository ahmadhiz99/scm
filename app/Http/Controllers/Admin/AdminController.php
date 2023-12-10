<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers\SidebarHelper;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\DevCode;
use App\Models\Minat;

use App\Models\Catalog;
use App\Models\ProductionOrder;
use App\Models\Material;
use App\Models\CustomerOrder;

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

        $countUserSeller = User::where('role_id','=','2')->get();
        $countUserKonsumen = User::where('role_id','=','3')->get();
        $countCatalog = Catalog::all();
        $countProductionOrder = ProductionOrder::all();
        $countMaterial = Material::all();

        $data = [
            'countUserSeller' => $countUserSeller->count(),
            'countUserKonsumen' => $countUserKonsumen->count(),
            'countProductionOrder' => $countProductionOrder->count(),
            'countCatalog' => $countCatalog->count(),
            'countMaterial' => $countMaterial->count()
        ];

        return view(
            'admin.dashboard',                              
            [
                'menu'=>$menu,
                'user'=>$user,
                'data'=>$data
            ]
        );

    }
}
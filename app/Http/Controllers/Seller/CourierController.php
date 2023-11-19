<?php

namespace App\Http\Controllers\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Helpers\SidebarHelper;
use App\Helpers\TableHelper;

use App\Models\Material;
use App\Models\Courier;


class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function configDB_new(){
        return New Courier;
    }

    public function configDB_all(){
        $curr_user = Auth::user()->id;
        return Courier::where('user_id','=',$curr_user)->get();
    }

    public function configDB_find($id){
        return Courier::find($id);
    }

    public function configDB_option($id){
        return Courier::all();
    }
    
    public function index()
    {
        $menu = SidebarHelper::list(Auth::user()->role_id);
        
        return view(
            'seller.dashboard',
            ['menu'=>$menu]
        );
    }

    public function material_page()
    {        
        // Menu
        $menu = SidebarHelper::list(Auth::user()->role_id);

        $db_all = $this->configDB_all();
        $db_new = $this->configDB_new();

        // Inisiate Data
                
        // Datatable
        $tableConfig = [
            'field_block' => [
                '',
                'id',
                'user_id',
                'created_at',
                'updated_at',
                'deleted_at'
            ],
            'field_rename'=>[
                '',
                'id' => 'No',
                'no_production' => 'No Production'
            ],
            'content' => $db_all,
            'action' => [
                'detail' => [
                    'name' => 'Detail',
                    'modal' => '#ModalDetail',
                    'route' => '/seller/detail-courier',
                    'class' => 'btn btn-secondary text-white btn-sm',
                    'icon' => '',
                ],
                'add' => [
                    'name' => 'Add Data',
                    'modal' => '#ModalAdd',
                    'route' => '/seller/add-courier',
                    'class' => 'btn btn-primary text-white btn-md mb-3',
                    'icon' => '',
                ],
                'edit' => [
                    'name' => 'Edit',
                    'modal' => '#ModalEdit',
                    'route' => '/seller/edit-courier',
                    'class' => 'btn btn-warning text-white btn-sm',
                    'icon' => '',
                ],
                'delete' => [
                    'name' => 'Delete',
                    'modal' => '#ModalDelete',
                    'route' => '/seller/delete-courier',
                    'class' => 'btn btn-danger text-white btn-sm',
                    'icon' => '',
                ],
            ],
            'form-add' => [
                'courier_name' => [
                    'name' => 'courier_name',
                    'title' => 'courier_name',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'courier_name'
                ],
                'courier_address' => [
                    'name' => 'courier_address',
                    'title' => 'courier_address',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'courier_address'
                ],
                'courier_phone' => [
                    'name' => 'courier_phone',
                    'title' => 'courier_phone',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'courier_phone'
                ],
                'courier_email' => [
                    'name' => 'courier_email',
                    'title' => 'courier_email',
                    'tag' => 'input',
                    'type' => 'email',
                    'placeholder' => 'courier_email'
                ],
            ],
            'form-edit' => [
                'courier_name' => [
                    'name' => 'courier_name',
                    'title' => 'courier_name',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'courier_name'
                ],
                'courier_address' => [
                    'name' => 'courier_address',
                    'title' => 'courier_address',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'courier_address'
                ],
                'courier_phone' => [
                    'name' => 'courier_phone',
                    'title' => 'courier_phone',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'courier_phone'
                ],
                'courier_email' => [
                    'name' => 'courier_email',
                    'title' => 'courier_email',
                    'tag' => 'input',
                    'type' => 'email',
                    'placeholder' => 'courier_email'
                ],
            ],
            'form-detail' => [
                'courier_name' => [
                    'name' => 'courier_name',
                    'title' => 'courier_name',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'courier_name'
                ],
                'courier_address' => [
                    'name' => 'courier_address',
                    'title' => 'courier_address',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'courier_address'
                ],
                'courier_phone' => [
                    'name' => 'courier_phone',
                    'title' => 'courier_phone',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'courier_phone'
                ],
                'courier_email' => [
                    'name' => 'courier_email',
                    'title' => 'courier_email',
                    'tag' => 'input',
                    'type' => 'email',
                    'placeholder' => 'courier_email'
                ],
            ],
            
        ];

        $columTable = TableHelper::index($db_new, $tableConfig);

        return view(
            'seller.courier',
            [
                'menu'=>$menu,
                'catalog'=>$db_all,
                'data_table'=>$columTable,
                'tableConfig'=>$tableConfig
            ]
        );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $curr_user = Auth::user()->id;
        $db_new = $this->configDB_new();

        foreach($request->request as $key => $data){
            if($key == '_token')continue;
            $db_new->$key = $data;            
        }
            $db_new->user_id = $curr_user;            



        if($db_new->save()){
            return back()->with('success', 'Selamat Data dimasukan!');
        }else{
            return back()->with('failed', 'Selamat Data dimasukan!');

        }
        // dd($db_new);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $curr_user = Auth::user()->id;
        $db_find = $this->configDB_find($id);

        foreach($request->request as $key => $data){
            if($key == '_token')continue;
            $db_find->$key = $data;            
        }
            $db_find->user_id = $curr_user;            

        if($db_find->save()){
            return back()->with('success', 'Selamat Data dimasukan!');
        }else{
            return back()->with('failed', 'Selamat Data dimasukan!');

        }
        // dd($db_find);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $curr_user = Auth::user()->id;
        $db_find = $this->configDB_find($id);

        foreach($request->request as $key => $data){
            if($data == null )break;
            
            if($db_find->delete()){
                return back()->with('success', 'Selamat Data dimasukan!');
                break;
            }else{
                return back()->with('failed', 'Selamat Data dimasukan!');
                break;
            }
        }       
    }
}

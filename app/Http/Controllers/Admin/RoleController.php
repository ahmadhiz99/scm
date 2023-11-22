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
use App\Models\Roles;


class RoleController extends Controller
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

    public function configDB_new(){
        return New Roles;
    }

    public function configDB_find($id){
        return Roles::find($id);
    }


    public function configDB_all(){
        return Roles::all();
    }

    public function configDB_role(){
        return Roles::all();
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
        $user = $this->configDB_all();
        $table = $this->configDB_new();

        $role = $this->configDB_role();
                
         // Datatable
         $tableConfig = [
            'field_block' => [
                '',
                'password',
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
            'content' => $user,
            'action' => [
                'detail' => [
                    'name' => 'Detail',
                    'modal' => '#ModalDetail',
                    'route' => '/admin/detail-role',
                    'class' => 'btn btn-secondary text-white btn-sm',
                    'icon' => '',
                ],
                'add' => [
                    'name' => 'Add Data',
                    'modal' => '#ModalAdd',
                    'route' => '/admin/add-role',
                    'class' => 'btn btn-primary text-white btn-md mb-3',
                    'icon' => '',
                ],
                'edit' => [
                    'name' => 'Edit',
                    'modal' => '#ModalEdit',
                    'route' => '/admin/edit-role',
                    'class' => 'btn btn-warning text-white btn-sm',
                    'icon' => '',
                ],
                'delete' => [
                    'name' => 'Delete',
                    'modal' => '#ModalDelete',
                    'route' => '/admin/delete-role',
                    'class' => 'btn btn-danger text-white btn-sm',
                    'icon' => '',
                ],
            ],
            'form-add' => [
                'role_name' => [
                    'name' => 'role_name',
                    'title' => 'role_name',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'role_name'
                ],
                'level' => [
                    'name' => 'level',
                    'title' => 'level',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'level'
                ],
            ],
            'form-edit' => [
                'role_name' => [
                    'name' => 'role_name',
                    'title' => 'role_name',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'role_name'
                ],
                'level' => [
                    'name' => 'level',
                    'title' => 'level',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'level'
                ],
            ],
            'form-detail' => [
                'role_name' => [
                    'name' => 'role_name',
                    'title' => 'role_name',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'role_name'
                ],
                'level' => [
                    'name' => 'level',
                    'title' => 'level',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'level'
                ],
            ],
        ];

        $columTable = TableHelper::index($table, $tableConfig);
        
        return view(
            'admin.role',                              
            [
                'menu'=>$menu,
                'user'=>$user,
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
            
            // dd($db_new);

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
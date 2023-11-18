<?php

namespace App\Http\Controllers\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Helpers\SidebarHelper;
use App\Helpers\TableHelper;

use App\Models\Material;
use App\Models\SalesOrder;


class SalesOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function configDB_new(){
        return New SalesOrder;
    }

    public function configDB_all(){
        return SalesOrder::all();
    }

    public function configDB_find($id){
        return SalesOrder::find($id);
    }

    public function configDB_option($id){
        return SalesOrder::all();
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
                    'route' => '/seller/detail-sales-order',
                    'class' => 'btn btn-secondary text-white btn-sm',
                    'icon' => '',
                ],
                'add' => [
                    'name' => 'Add Data',
                    'modal' => '#ModalAdd',
                    'route' => '/seller/add-sales-order',
                    'class' => 'btn btn-primary text-white btn-md mb-3',
                    'icon' => '',
                ],
                'edit' => [
                    'name' => 'Edit',
                    'modal' => '#ModalEdit',
                    'route' => '/seller/edit-sales-order',
                    'class' => 'btn btn-warning text-white btn-sm',
                    'icon' => '',
                ],
                'delete' => [
                    'name' => 'Delete',
                    'modal' => '#ModalDelete',
                    'route' => '/seller/delete-sales-order',
                    'class' => 'btn btn-danger text-white btn-sm',
                    'icon' => '',
                ],
            ],
            'form-add' => [
                'no_sale_invoice' => [
                    'name' => 'no_sale_invoice',
                    'title' => 'no_sale_invoice',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'no_sale_invoice'
                ],
                'invoice_date' => [
                    'name' => 'invoice_date',
                    'title' => 'invoice_date',
                    'tag' => 'date',
                    'type' => 'date',
                    'placeholder' => 'invoice_date'
                ],
                'due_date' => [
                    'name' => 'due_date',
                    'title' => 'due_date',
                    'tag' => 'date',
                    'type' => 'date',
                    'placeholder' => 'due_date'
                ],
                'customer_name' => [
                    'name' => 'customer_name',
                    'title' => 'customer_name',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'customer_name'
                ],
                'shipping_address' => [
                    'name' => 'shipping_address',
                    'title' => 'shipping_address',
                    'tag' => 'input',
                    'type' => 'email',
                    'placeholder' => 'shipping_address'
                ],
                'grand_total' => [
                    'name' => 'grand_total',
                    'title' => 'grand_total',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'grand_total'
                ],
                'courier_id' => [
                    'name' => 'courier_id',
                    'title' => 'courier_id',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'courier_id'
                ],
                'status' => [
                    'name' => 'status',
                    'title' => 'status',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'status'
                ],
            ],
            'form-edit' => [
                'no_sale_invoice' => [
                    'name' => 'no_sale_invoice',
                    'title' => 'no_sale_invoice',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'no_sale_invoice'
                ],
                'invoice_date' => [
                    'name' => 'invoice_date',
                    'title' => 'invoice_date',
                    'tag' => 'date',
                    'type' => 'date',
                    'placeholder' => 'invoice_date'
                ],
                'due_date' => [
                    'name' => 'due_date',
                    'title' => 'due_date',
                    'tag' => 'date',
                    'type' => 'date',
                    'placeholder' => 'due_date'
                ],
                'customer_name' => [
                    'name' => 'customer_name',
                    'title' => 'customer_name',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'customer_name'
                ],
                'shipping_address' => [
                    'name' => 'shipping_address',
                    'title' => 'shipping_address',
                    'tag' => 'input',
                    'type' => 'email',
                    'placeholder' => 'shipping_address'
                ],
                'grand_total' => [
                    'name' => 'grand_total',
                    'title' => 'grand_total',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'grand_total'
                ],
                'courier_id' => [
                    'name' => 'courier_id',
                    'title' => 'courier_id',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'courier_id'
                ],
                'status' => [
                    'name' => 'status',
                    'title' => 'status',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'status'
                ],
            ],
            'form-detail' => [
                'no_sale_invoice' => [
                    'name' => 'no_sale_invoice',
                    'title' => 'no_sale_invoice',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'no_sale_invoice'
                ],
                'invoice_date' => [
                    'name' => 'invoice_date',
                    'title' => 'invoice_date',
                    'tag' => 'date',
                    'type' => 'date',
                    'placeholder' => 'invoice_date'
                ],
                'due_date' => [
                    'name' => 'due_date',
                    'title' => 'due_date',
                    'tag' => 'date',
                    'type' => 'date',
                    'placeholder' => 'due_date'
                ],
                'customer_name' => [
                    'name' => 'customer_name',
                    'title' => 'customer_name',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'customer_name'
                ],
                'shipping_address' => [
                    'name' => 'shipping_address',
                    'title' => 'shipping_address',
                    'tag' => 'input',
                    'type' => 'email',
                    'placeholder' => 'shipping_address'
                ],
                'grand_total' => [
                    'name' => 'grand_total',
                    'title' => 'grand_total',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'grand_total'
                ],
                'courier_id' => [
                    'name' => 'courier_id',
                    'title' => 'courier_id',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'courier_id'
                ],
                'status' => [
                    'name' => 'status',
                    'title' => 'status',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'status'
                ],
            ],
            
        ];

        $columTable = TableHelper::index($db_new, $tableConfig);

        return view(
            'seller.sales-order',
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

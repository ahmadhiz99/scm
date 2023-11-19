<?php

namespace App\Http\Controllers\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Helpers\SidebarHelper;
use App\Helpers\TableHelper;

use App\Models\Material;
use App\Models\DeliveryOrder;
use App\Models\Courier;
use App\Models\SalesOrder;

class DeliveryOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function configDB_new(){
        return New DeliveryOrder;
    }

    public function configDB_all(){
        $curr_user = Auth::user()->id;
        return DeliveryOrder::where('user_id','=',$curr_user)->get();
    }

    public function configDB_find($id){
        return DeliveryOrder::find($id);
    }

    public function configDB_courier(){
        return Courier::all();
    }

    public function configDB_sales_order(){
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
        $db_all_courier = $this->configDB_courier();
        $db_all_sales_order = $this->configDB_sales_order();
        

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
                    'route' => '/seller/detail-delivery-order',
                    'class' => 'btn btn-secondary text-white btn-sm',
                    'icon' => '',
                ],
                'add' => [
                    'name' => 'Add Data',
                    'modal' => '#ModalAdd',
                    'route' => '/seller/add-delivery-order',
                    'class' => 'btn btn-primary text-white btn-md mb-3',
                    'icon' => '',
                ],
                'edit' => [
                    'name' => 'Edit',
                    'modal' => '#ModalEdit',
                    'route' => '/seller/edit-delivery-order',
                    'class' => 'btn btn-warning text-white btn-sm',
                    'icon' => '',
                ],
                'delete' => [
                    'name' => 'Delete',
                    'modal' => '#ModalDelete',
                    'route' => '/seller/delete-delivery-order',
                    'class' => 'btn btn-danger text-white btn-sm',
                    'icon' => '',
                ],
            ],
            'form-add' => [
                'quantity' => [
                    'name' => 'quantity',
                    'title' => 'Quantity',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'quantity'
                ],
                'delivery_date' => [
                    'name' => 'delivery_date',
                    'title' => 'delivery_date',
                    'tag' => 'date',
                    'type' => 'date',
                    'placeholder' => 'delivery_date'
                ],
                'courier' => [
                    'name' => 'courier',
                    'title' => 'courier',
                    'tag' => 'option',
                    'type' => 'option',
                    'placeholder' => 'courier',
                    'option-config' => [
                        'option-title' => 'courier_name',
                        'option-reference' => 'id',
                        'option-content' => $db_all_courier,
                    ],
                ],
                'status' => [
                    'name' => 'status',
                    'title' => 'status',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'status'
                ],
                'description' => [
                    'name' => 'description',
                    'title' => 'description',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'description'
                ],
                'height' => [
                    'name' => 'height',
                    'title' => 'height',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'height'
                ],
                'weight' => [
                    'name' => 'weight',
                    'title' => 'weight',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'weight'
                ],
                'sales_order_id' => [
                    'name' => 'sales_order_id',
                    'title' => 'sales_order_id',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'sales_order_id'
                ],
                'sales_order_id' => [
                    'name' => 'sales_order_id',
                    'title' => 'sales_order_id',
                    'tag' => 'option',
                    'type' => 'option',
                    'placeholder' => 'sales_order_id',
                    'option-config' => [
                        'option-title' => 'no_sale_invoice',
                        'option-reference' => 'id',
                        'option-content' => $db_all_sales_order,
                    ],
                ],
            ],
            'form-edit' => [
                'quantity' => [
                    'name' => 'quantity',
                    'title' => 'Quantity',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'quantity'
                ],
                'delivery_date' => [
                    'name' => 'delivery_date',
                    'title' => 'delivery_date',
                    'tag' => 'date',
                    'type' => 'date',
                    'placeholder' => 'delivery_date'
                ],
                'courier' => [
                    'name' => 'courier',
                    'title' => 'courier',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'courier'
                ],
                'status' => [
                    'name' => 'status',
                    'title' => 'status',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'status'
                ],
                'description' => [
                    'name' => 'description',
                    'title' => 'description',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'description'
                ],
                'height' => [
                    'name' => 'height',
                    'title' => 'height',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'height'
                ],
                'weight' => [
                    'name' => 'weight',
                    'title' => 'weight',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'weight'
                ],
                'sales_order_id' => [
                    'name' => 'sales_order_id',
                    'title' => 'sales_order_id',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'sales_order_id'
                ],
            ],
            'form-detail' => [
                'quantity' => [
                    'name' => 'quantity',
                    'title' => 'Quantity',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'quantity'
                ],
                'delivery_date' => [
                    'name' => 'delivery_date',
                    'title' => 'delivery_date',
                    'tag' => 'date',
                    'type' => 'date',
                    'placeholder' => 'delivery_date'
                ],
                'courier' => [
                    'name' => 'courier',
                    'title' => 'courier',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'courier'
                ],
                'status' => [
                    'name' => 'status',
                    'title' => 'status',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'status'
                ],
                'description' => [
                    'name' => 'description',
                    'title' => 'description',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'description'
                ],
                'height' => [
                    'name' => 'height',
                    'title' => 'height',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'height'
                ],
                'weight' => [
                    'name' => 'weight',
                    'title' => 'weight',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'weight'
                ],
                'sales_order_id' => [
                    'name' => 'sales_order_id',
                    'title' => 'sales_order_id',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'sales_order_id'
                ],
            ],
            
        ];

        $columTable = TableHelper::index($db_new, $tableConfig);

        return view(
            'seller.delivery-order',
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

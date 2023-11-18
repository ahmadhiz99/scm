<?php

namespace App\Http\Controllers\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Helpers\SidebarHelper;
use App\Helpers\TableHelper;

use App\Models\Material;
use App\Models\PurchaseOrder;
use App\Models\Supplier;
use App\Models\SalesOrder;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function configDB_new(){
        return New PurchaseOrder;
    }

    public function configDB_all(){
        return PurchaseOrder::all();
    }

    public function configDB_find($id){
        return PurchaseOrder::find($id);
    }

    public function configDB_supplier_all(){
        return Supplier::all();
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
        $db_all_supplier = $this->configDB_supplier_all();        

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
                    'route' => '/seller/detail-purchase-order',
                    'class' => 'btn btn-secondary text-white btn-sm',
                    'icon' => '',
                ],
                'add' => [
                    'name' => 'Add Data',
                    'modal' => '#ModalAdd',
                    'route' => '/seller/add-purchase-order',
                    'class' => 'btn btn-primary text-white btn-md mb-3',
                    'icon' => '',
                ],
                'edit' => [
                    'name' => 'Edit',
                    'modal' => '#ModalEdit',
                    'route' => '/seller/edit-purchase-order',
                    'class' => 'btn btn-warning text-white btn-sm',
                    'icon' => '',
                ],
                'delete' => [
                    'name' => 'Delete',
                    'modal' => '#ModalDelete',
                    'route' => '/seller/delete-purchase-order',
                    'class' => 'btn btn-danger text-white btn-sm',
                    'icon' => '',
                ],
            ],
            'form-add' => [
                'no_purchase_invoice' => [
                    'name' => 'no_purchase_invoice',
                    'title' => 'no_purchase_invoice',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'no_purchase_invoice'
                ],
                'purchase_date' => [
                    'name' => 'purchase_date',
                    'title' => 'purchase_date',
                    'tag' => 'date',
                    'type' => 'date',
                    'placeholder' => 'purchase_date'
                ],
                'receive_date' => [
                    'name' => 'receive_date',
                    'title' => 'receive_date',
                    'tag' => 'date',
                    'type' => 'date',
                    'placeholder' => 'receive_date'
                ],
                'requester_name' => [
                    'name' => 'requester_name',
                    'title' => 'requester_name',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'requester_name'
                ],
                'grand_total' => [
                    'name' => 'grand_total',
                    'title' => 'grand_total',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'grand_total'
                ],
                'payment_total' => [
                    'name' => 'payment_total',
                    'title' => 'payment_total',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'payment_total'
                ],
                'status' => [
                    'name' => 'status',
                    'title' => 'Status Data',
                    'tag' => 'option',
                    'type' => 'option',
                    'option-config' => [
                        'option-title' => 'title',
                        'option-reference' => 'id',
                        'option-content' => [
                            [
                                'id' => '1',
                                'name' => 'active',
                                'value' => 'active',
                                'title' => 'Active'
                            ],
                            [
                                'id' => '2',
                                'name' => 'non_active',
                                'value' => 'npn_active',
                                'title' => 'Non Active'
                            ],
                        ],
                    ],
                ],
                'supplier_id' => [
                    'name' => 'supplier_id',
                    'title' => 'supplier_id',
                    'tag' => 'option',
                    'type' => 'option',
                    'placeholder' => 'supplier_id',
                    'option-config' => [
                        'option-title' => 'supplier_name',
                        'option-reference' => 'id',
                        'option-content' => $db_all_supplier,
                    ],
                ],
            ],
            'form-edit' => [
                'no_purchase_invoice' => [
                    'name' => 'no_purchase_invoice',
                    'title' => 'no_purchase_invoice',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'no_purchase_invoice'
                ],
                'purchase_date' => [
                    'name' => 'purchase_date',
                    'title' => 'purchase_date',
                    'tag' => 'date',
                    'type' => 'date',
                    'placeholder' => 'purchase_date'
                ],
                'receive_date' => [
                    'name' => 'receive_date',
                    'title' => 'receive_date',
                    'tag' => 'date',
                    'type' => 'date',
                    'placeholder' => 'receive_date'
                ],
                'requester_name' => [
                    'name' => 'requester_name',
                    'title' => 'requester_name',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'requester_name'
                ],
                'grand_total' => [
                    'name' => 'grand_total',
                    'title' => 'grand_total',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'grand_total'
                ],
                'payment_total' => [
                    'name' => 'payment_total',
                    'title' => 'payment_total',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'payment_total'
                ],
                'status' => [
                    'name' => 'status',
                    'title' => 'Status Data',
                    'tag' => 'option',
                    'type' => 'option',
                    'option-config' => [
                        'option-title' => 'title',
                        'option-reference' => 'id',
                        'option-content' => [
                            [
                                'id' => '1',
                                'name' => 'active',
                                'value' => 'active',
                                'title' => 'Active'
                            ],
                            [
                                'id' => '2',
                                'name' => 'non_active',
                                'value' => 'npn_active',
                                'title' => 'Non Active'
                            ],
                        ],
                    ],
                ],
                'supplier_id' => [
                    'name' => 'supplier_id',
                    'title' => 'supplier_id',
                    'tag' => 'option',
                    'type' => 'option',
                    'placeholder' => 'supplier_id',
                    'option-config' => [
                        'option-title' => 'courier_name',
                        'option-reference' => 'id',
                        'option-content' => $db_all_supplier,
                    ],
                ],
            ],
            'form-detail' => [
                'no_purchase_invoice' => [
                    'name' => 'no_purchase_invoice',
                    'title' => 'no_purchase_invoice',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'no_purchase_invoice'
                ],
                'purchase_date' => [
                    'name' => 'purchase_date',
                    'title' => 'purchase_date',
                    'tag' => 'date',
                    'type' => 'date',
                    'placeholder' => 'purchase_date'
                ],
                'receive_date' => [
                    'name' => 'receive_date',
                    'title' => 'receive_date',
                    'tag' => 'date',
                    'type' => 'date',
                    'placeholder' => 'receive_date'
                ],
                'requester_name' => [
                    'name' => 'requester_name',
                    'title' => 'requester_name',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'requester_name'
                ],
                'grand_total' => [
                    'name' => 'grand_total',
                    'title' => 'grand_total',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'grand_total'
                ],
                'payment_total' => [
                    'name' => 'payment_total',
                    'title' => 'payment_total',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'payment_total'
                ],
                'status' => [
                    'name' => 'status',
                    'title' => 'Status Data',
                    'tag' => 'option',
                    'type' => 'option',
                    'option-config' => [
                        'option-title' => 'title',
                        'option-reference' => 'id',
                        'option-content' => [
                            [
                                'id' => '1',
                                'name' => 'active',
                                'value' => 'active',
                                'title' => 'Active'
                            ],
                            [
                                'id' => '2',
                                'name' => 'non_active',
                                'value' => 'npn_active',
                                'title' => 'Non Active'
                            ],
                        ],
                    ],
                ],
                'supplier_id' => [
                    'name' => 'supplier_id',
                    'title' => 'supplier_id',
                    'tag' => 'option',
                    'type' => 'option',
                    'placeholder' => 'supplier_id',
                    'option-config' => [
                        'option-title' => 'courier_name',
                        'option-reference' => 'id',
                        'option-content' => $db_all_supplier,
                    ],
                ],
            ],
            
        ];

        $columTable = TableHelper::index($db_new, $tableConfig);

        return view(
            'seller.purchase-order',
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

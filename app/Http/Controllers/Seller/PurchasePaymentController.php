<?php

namespace App\Http\Controllers\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Helpers\SidebarHelper;
use App\Helpers\TableHelper;

use App\Models\Material;
use App\Models\PurchasePayment;
use App\Models\Courier;
use App\Models\SalesOrder;
use App\Models\PurchaseOrder;

class PurchasePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function configDB_new(){
        return New PurchasePayment;
    }

    public function configDB_all(){
        return PurchasePayment::all();
    }

    public function configDB_find($id){
        return PurchasePayment::find($id);
    }

    public function configDB_supplier_all(){
        return Courier::all();
    }

    public function configDB_order(){
        return PurchaseOrder::all();
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
        $db_purchase_order_all = $this->configDB_order();    

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
                    'route' => '/seller/detail-purchase-payment',
                    'class' => 'btn btn-secondary text-white btn-sm',
                    'icon' => '',
                ],
                'add' => [
                    'name' => 'Add Data',
                    'modal' => '#ModalAdd',
                    'route' => '/seller/add-purchase-payment',
                    'class' => 'btn btn-primary text-white btn-md mb-3',
                    'icon' => '',
                ],
                'edit' => [
                    'name' => 'Edit',
                    'modal' => '#ModalEdit',
                    'route' => '/seller/edit-purchase-payment',
                    'class' => 'btn btn-warning text-white btn-sm',
                    'icon' => '',
                ],
                'delete' => [
                    'name' => 'Delete',
                    'modal' => '#ModalDelete',
                    'route' => '/seller/delete-purchase-payment',
                    'class' => 'btn btn-danger text-white btn-sm',
                    'icon' => '',
                ],
            ],
            'form-add' => [
                'purchase_order_id' => [
                    'name' => 'purchase_order_id',
                    'title' => 'purchase_order_id',
                    'tag' => 'option',
                    'type' => 'option',
                    'placeholder' => 'purchase_order_id',
                    'option-config' => [
                        'option-title' => 'no_purchase_invoice',
                        'option-reference' => 'id',
                        'option-content' => $db_purchase_order_all
                    ]
                        
                ],
                'payer_name' => [
                    'name' => 'payer_name',
                    'title' => 'payer_name',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'payer_name'
                ],
                'nominal' => [
                    'name' => 'nominal',
                    'title' => 'nominal',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'nominal'
                ],
                'payment_method' => [
                    'name' => 'payment_method',
                    'title' => 'payment_method',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'payment_method'
                ],
                'payment_date' => [
                    'name' => 'payment_date',
                    'title' => 'payment_date',
                    'tag' => 'date',
                    'type' => 'date',
                    'placeholder' => 'payment_date'
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
            ],
            'form-edit' => [
                'purchase_order_id' => [
                    'name' => 'purchase_order_id',
                    'title' => 'purchase_order_id',
                    'tag' => 'option',
                    'type' => 'option',
                    'placeholder' => 'purchase_order_id',
                    'option-config' => [
                        'option-title' => 'no_purchase_invoice',
                        'option-reference' => 'id',
                        'option-content' => $db_purchase_order_all
                    ]
                        
                ],
                'payer_name' => [
                    'name' => 'payer_name',
                    'title' => 'payer_name',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'payer_name'
                ],
                'nominal' => [
                    'name' => 'nominal',
                    'title' => 'nominal',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'nominal'
                ],
                'payment_method' => [
                    'name' => 'payment_method',
                    'title' => 'payment_method',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'payment_method'
                ],
                'payment_date' => [
                    'name' => 'payment_date',
                    'title' => 'payment_date',
                    'tag' => 'date',
                    'type' => 'date',
                    'placeholder' => 'payment_date'
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
            ],
            'form-detail' => [
                'purchase_order_id' => [
                    'name' => 'purchase_order_id',
                    'title' => 'purchase_order_id',
                    'tag' => 'option',
                    'type' => 'option',
                    'placeholder' => 'purchase_order_id',
                    'option-config' => [
                        'option-title' => 'no_purchase_invoice',
                        'option-reference' => 'id',
                        'option-content' => $db_purchase_order_all
                    ]
                        
                ],
                'payer_name' => [
                    'name' => 'payer_name',
                    'title' => 'payer_name',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'payer_name'
                ],
                'nominal' => [
                    'name' => 'nominal',
                    'title' => 'nominal',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'nominal'
                ],
                'payment_method' => [
                    'name' => 'payment_method',
                    'title' => 'payment_method',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'payment_method'
                ],
                'payment_date' => [
                    'name' => 'payment_date',
                    'title' => 'payment_date',
                    'tag' => 'date',
                    'type' => 'date',
                    'placeholder' => 'payment_date'
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
            ],
        ];

        $columTable = TableHelper::index($db_new, $tableConfig);

        return view(
            'seller.purchase-payment',
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

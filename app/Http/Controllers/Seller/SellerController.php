<?php

namespace App\Http\Controllers\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Helpers\SidebarHelper;
use App\Helpers\TableHelper;

use App\Models\ProductionOrder;
use App\Models\Material;



class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $menu = SidebarHelper::list(Auth::user()->role_id);
        
        return view(
            'seller.dashboard',
            ['menu'=>$menu]
        );
    }

    public function production_order_page()
    {        
        // Menu
        $menu = SidebarHelper::list(Auth::user()->role_id);

        $material = Material::all();

        // Inisiate Data
        $production_order = ProductionOrder::all();
        $table = new ProductionOrder;

                
        // Datatable
        $tableConfig = [
            'field_block' => [
                '',
                'id',
                'description',
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
            'content' => $production_order,
            'action' => [
                'detail' => [
                    'name' => 'Detail',
                    'modal' => '#ModalDetail',
                    'route' => '/seller/detail',
                    'class' => 'btn btn-secondary text-white btn-sm',
                    'icon' => '',
                ],
                'add' => [
                    'name' => 'Add Data',
                    'modal' => '#ModalAdd',
                    'route' => '/seller/add',
                    'class' => 'btn btn-primary text-white btn-md mb-3',
                    'icon' => '',
                ],
                'edit' => [
                    'name' => 'Edit',
                    'modal' => '#ModalEdit',
                    'route' => '/seller/edit',
                    'class' => 'btn btn-warning text-white btn-sm',
                    'icon' => '',
                ],
                'delete' => [
                    'name' => 'Delete',
                    'modal' => '#ModalDelete',
                    'route' => '/seller/delete',
                    'class' => 'btn btn-danger text-white btn-sm',
                    'icon' => '',
                ],
            ],
            'form-add' => [
                'no_production' => [
                    'name' => 'no_production',
                    'title' => 'No Production',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'Number Production'
                ],
                'requester_name' => [
                    'name' => 'requester_name',
                    'title' => 'Request Name',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'Request Production'
                ],
                'quantity' => [
                    'name' => 'quantity',
                    'title' => 'Quantity',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'quantity'
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
                'start_date' => [
                    'name' => 'start_date',
                    'title' => 'Start Date',
                    'tag' => 'date',
                    'type' => '',
                    'placeholder' => 'Start Date'
                ],
                'end_date' => [
                    'name' => 'end_date',
                    'title' => 'End Date',
                    'tag' => 'date',
                    'type' => '',
                    'placeholder' => 'End Date'
                ],
            ],
            'form-edit' => [
                'no_production' => [
                    'name' => 'no_production',
                    'title' => 'No Production',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'Number Production'
                ],
                'requester_name' => [
                    'name' => 'requester_name',
                    'title' => 'Request Name',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'Request Production'
                ],
                'quantity' => [
                    'name' => 'quantity',
                    'title' => 'Quantity',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'quantity'
                ],
                // 'status' => [
                //     'name' => 'status',
                //     'title' => 'Status Data',
                //     'tag' => 'option',
                //     'type' => 'option',
                //     'option-config' => [
                //         'option-title' => 'material_name',
                //         'option-content' => $material
                //     ],
                //     'placeholder' => 'Status Data'
                // ],
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
                'start_date' => [
                    'name' => 'start_date',
                    'title' => 'Start Date',
                    'tag' => 'date',
                    'type' => '',
                    'placeholder' => 'Start Date'
                ],
                'end_date' => [
                    'name' => 'end_date',
                    'title' => 'End Date',
                    'tag' => 'date',
                    'type' => '',
                    'placeholder' => 'End Date'
                ],
            ],
            'form-detail' => [
                'no_production' => [
                    'name' => 'no_production',
                    'title' => 'No Production',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'Number Production'
                ],
                'requester_name' => [
                    'name' => 'requester_name',
                    'title' => 'Request Name',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'Request Production'
                ],
                'quantity' => [
                    'name' => 'quantity',
                    'title' => 'Quantity',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'quantity'
                ],
                // 'status' => [
                //     'name' => 'status',
                //     'title' => 'Status Data',
                //     'tag' => 'option',
                //     'type' => 'option',
                //     'option-config' => [
                //         'option-title' => 'material_name',
                //         'option-content' => $material
                //     ],
                //     'placeholder' => 'Status Data'
                // ],
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
                'start_date' => [
                    'name' => 'start_date',
                    'title' => 'Start Date',
                    'tag' => 'date',
                    'type' => '',
                    'placeholder' => 'Start Date'
                ],
                'end_date' => [
                    'name' => 'end_date',
                    'title' => 'End Date',
                    'tag' => 'date',
                    'type' => '',
                    'placeholder' => 'End Date'
                ],
            ]
        ];

        $columTable = TableHelper::index($table, $tableConfig);

        return view(
            'seller.production_order',
            [
                'menu'=>$menu,
                'production_order'=>$production_order,
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
        $production_order = new ProductionOrder;

        foreach($request->request as $key => $data){
            if($key == '_token')continue;
            $production_order->$key = $data;            
        }
            $production_order->user_id = $curr_user;            



        if($production_order->save()){
            return back()->with('success', 'Selamat Data dimasukan!');
        }else{
            return back()->with('failed', 'Selamat Data dimasukan!');

        }
        // dd($production_order);
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
        $production_order = ProductionOrder::find($id);

        foreach($request->request as $key => $data){
            if($key == '_token')continue;
            $production_order->$key = $data;            
        }
            $production_order->user_id = $curr_user;            

        if($production_order->save()){
            return back()->with('success', 'Selamat Data dimasukan!');
        }else{
            return back()->with('failed', 'Selamat Data dimasukan!');

        }
        // dd($production_order);
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
        $production_order = ProductionOrder::find($id);

        foreach($request->request as $key => $data){
            if($data == null )break;
            
            if($production_order->delete()){
                return back()->with('success', 'Selamat Data dimasukan!');
                break;
            }else{
                return back()->with('failed', 'Selamat Data dimasukan!');
                break;
            }
        }       
    }
}

<?php

namespace App\Http\Controllers\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Helpers\SidebarHelper;
use App\Helpers\TableHelper;

use App\Models\Material;
use App\Models\CatalogCategory;
use App\Models\MaterialCategory;


class MaterialController extends Controller
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

    public function material_page()
    {        
        // Menu
        $menu = SidebarHelper::list(Auth::user()->role_id);

        $materialCategory = MaterialCategory::all();

        // Inisiate Data
        $material = Material::all();
        $table = new Material;

                
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
            'content' => $material,
            'action' => [
                'detail' => [
                    'name' => 'Detail',
                    'modal' => '#ModalDetail',
                    'route' => '/seller/detail-material',
                    'class' => 'btn btn-secondary text-white btn-sm',
                    'icon' => '',
                ],
                'add' => [
                    'name' => 'Add Data',
                    'modal' => '#ModalAdd',
                    'route' => '/seller/add-material',
                    'class' => 'btn btn-primary text-white btn-md mb-3',
                    'icon' => '',
                ],
                'edit' => [
                    'name' => 'Edit',
                    'modal' => '#ModalEdit',
                    'route' => '/seller/edit-material',
                    'class' => 'btn btn-warning text-white btn-sm',
                    'icon' => '',
                ],
                'delete' => [
                    'name' => 'Delete',
                    'modal' => '#ModalDelete',
                    'route' => '/seller/delete-material',
                    'class' => 'btn btn-danger text-white btn-sm',
                    'icon' => '',
                ],
            ],
            'form-add' => [
                'material_name' => [
                    'name' => 'material_name',
                    'title' => 'material_name',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'material_name'
                ],
                'stock' => [
                    'name' => 'stock',
                    'title' => 'stock',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'stock'
                ],
                'unit' => [
                    'name' => 'unit',
                    'title' => 'unit',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'unit'
                ],
                'price' => [
                    'name' => 'price',
                    'title' => 'price',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'price'
                ],
                'description' => [
                    'name' => 'description',
                    'title' => 'description',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'description'
                ],
                'status' => [
                    'name' => 'status',
                    'title' => 'Status',
                    'tag' => 'option',
                    'type' => 'option',
                    'option-config' => [
                        'option-title' => 'title',
                        'option-reference' => 'value',
                        'option-content' => [
                            [
                                'id' => '1',
                                'name' => 'SAFE',
                                'value' => 'SAFE',
                                'title' => 'SAFE'
                            ],
                            [
                                'id' => '2',
                                'name' => 'UNSAFE',
                                'value' => 'UNSAFE',
                                'title' => 'UNSAFE'
                            ],
                        ],
                    ],
                ],
                'material_category_id' => [
                    'name' => 'material_category_id',
                    'title' => 'Status Data',
                    'tag' => 'option',
                    'type' => 'option',
                    'option-config' => [
                        'option-title' => 'material_category_name',
                        'option-reference' => 'id',
                        'option-content' => $materialCategory
                    ],
                    'placeholder' => 'Status Data'
                ],
                'description' => [
                    'name' => 'description',
                    'title' => 'description',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'description'
                ],
            ],
            'form-edit' => [
                'material_name' => [
                    'name' => 'material_name',
                    'title' => 'material_name',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'material_name'
                ],
                'stock' => [
                    'name' => 'stock',
                    'title' => 'stock',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'stock'
                ],
                'unit' => [
                    'name' => 'unit',
                    'title' => 'unit',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'unit'
                ],
                'price' => [
                    'name' => 'price',
                    'title' => 'price',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'price'
                ],
                'description' => [
                    'name' => 'description',
                    'title' => 'description',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'description'
                ],
                'status' => [
                    'name' => 'status',
                    'title' => 'Status',
                    'tag' => 'option',
                    'type' => 'option',
                    'option-config' => [
                        'option-title' => 'title',
                        'option-reference' => 'value',
                        'option-content' => [
                            [
                                'id' => '1',
                                'name' => 'SAFE',
                                'value' => 'SAFE',
                                'title' => 'SAFE'
                            ],
                            [
                                'id' => '2',
                                'name' => 'UNSAFE',
                                'value' => 'UNSAFE',
                                'title' => 'UNSAFE'
                            ],
                        ],
                    ],
                ],
                'material_category_id' => [
                    'name' => 'material_category_id',
                    'title' => 'Status Data',
                    'tag' => 'option',
                    'type' => 'option',
                    'option-config' => [
                        'option-title' => 'material_category_name',
                        'option-reference' => 'id',
                        'option-content' => $materialCategory
                    ],
                    'placeholder' => 'Status Data'
                ],
                'description' => [
                    'name' => 'description',
                    'title' => 'description',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'description'
                ],
            ],
            'form-detail' => [
                'material_name' => [
                    'name' => 'material_name',
                    'title' => 'material_name',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'material_name'
                ],
                'stock' => [
                    'name' => 'stock',
                    'title' => 'stock',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'stock'
                ],
                'unit' => [
                    'name' => 'unit',
                    'title' => 'unit',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'unit'
                ],
                'price' => [
                    'name' => 'price',
                    'title' => 'price',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'price'
                ],
                'description' => [
                    'name' => 'description',
                    'title' => 'description',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'description'
                ],
                'status' => [
                    'name' => 'status',
                    'title' => 'Status',
                    'tag' => 'option',
                    'type' => 'option',
                    'option-config' => [
                        'option-title' => 'title',
                        'option-reference' => 'value',
                        'option-content' => [
                            [
                                'id' => '1',
                                'name' => 'SAFE',
                                'value' => 'SAFE',
                                'title' => 'SAFE'
                            ],
                            [
                                'id' => '2',
                                'name' => 'UNSAFE',
                                'value' => 'UNSAFE',
                                'title' => 'UNSAFE'
                            ],
                        ],
                    ],
                ],
                'material_category_id' => [
                    'name' => 'material_category_id',
                    'title' => 'Status Data',
                    'tag' => 'option',
                    'type' => 'option',
                    'option-config' => [
                        'option-title' => 'material_category_name',
                        'option-reference' => 'id',
                        'option-content' => $materialCategory
                    ],
                    'placeholder' => 'Status Data'
                ],
                'description' => [
                    'name' => 'description',
                    'title' => 'description',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'description'
                ],
            ],
        ];

        $columTable = TableHelper::index($table, $tableConfig);

        return view(
            'seller.material',
            [
                'menu'=>$menu,
                'catalog'=>$material,
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
        $material = new Material;

        foreach($request->request as $key => $data){
            if($key == '_token')continue;
            $material->$key = $data;            
        }
            $material->user_id = $curr_user;            



        if($material->save()){
            return back()->with('success', 'Selamat Data dimasukan!');
        }else{
            return back()->with('failed', 'Selamat Data dimasukan!');

        }
        // dd($material);
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
        $material = Material::find($id);

        foreach($request->request as $key => $data){
            if($key == '_token')continue;
            $material->$key = $data;            
        }
            $material->user_id = $curr_user;            

        if($material->save()){
            return back()->with('success', 'Selamat Data dimasukan!');
        }else{
            return back()->with('failed', 'Selamat Data dimasukan!');

        }
        // dd($material);
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
        $material = Material::find($id);

        foreach($request->request as $key => $data){
            if($data == null )break;
            
            if($material->delete()){
                return back()->with('success', 'Selamat Data dimasukan!');
                break;
            }else{
                return back()->with('failed', 'Selamat Data dimasukan!');
                break;
            }
        }       
    }
}

<?php

namespace App\Http\Controllers\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Helpers\SidebarHelper;
use App\Helpers\TableHelper;

use App\Models\Catalog;
use App\Models\CatalogCategory;

class CatalogController extends Controller
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

    public function catalog_page()
    {        
        // Menu
        $menu = SidebarHelper::list(Auth::user()->role_id);

        $CatalogCategory = CatalogCategory::all();

        // Inisiate Data
         $curr_user = Auth::user()->id;
         $catalog = Catalog::where('user_id','=',$curr_user)->get();

        $table = new Catalog;
                
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
            'content' => $catalog,
            'action' => [
                'detail' => [
                    'name' => 'Detail',
                    'modal' => '#ModalDetail',
                    'route' => '/seller/detail-catalog',
                    'class' => 'btn btn-secondary text-white btn-sm',
                    'icon' => '',
                ],
                'add' => [
                    'name' => 'Add Data',
                    'modal' => '#ModalAdd',
                    'route' => '/seller/add-catalog',
                    'class' => 'btn btn-primary text-white btn-md mb-3',
                    'icon' => '',
                ],
                'edit' => [
                    'name' => 'Edit',
                    'modal' => '#ModalEdit',
                    'route' => '/seller/edit-catalog',
                    'class' => 'btn btn-warning text-white btn-sm',
                    'icon' => '',
                ],
                'delete' => [
                    'name' => 'Delete',
                    'modal' => '#ModalDelete',
                    'route' => '/seller/delete-catalog',
                    'class' => 'btn btn-danger text-white btn-sm',
                    'icon' => '',
                ],
            ],
            'form-add' => [
                'product_name' => [
                    'name' => 'product_name',
                    'title' => 'product_name',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'product_name'
                ],
                'stock' => [
                    'name' => 'stock',
                    'title' => 'stock',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'stock'
                ],
                'unit_price' => [
                    'name' => 'unit_price',
                    'title' => 'unit_price',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'unit_price'
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
                                'value' => 'non_active',
                                'title' => 'Non Active'
                            ],
                        ],
                    ],
                ],
                'catalog_category_id' => [
                    'name' => 'catalog_category_id',
                    'title' => 'Status Data',
                    'tag' => 'option',
                    'type' => 'option',
                    'option-config' => [
                        'option-title' => 'catalog_category_name',
                        'option-reference' => 'id',
                        'option-content' => $CatalogCategory
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
                'image' => [
                    'name' => 'image',
                    'title' => 'Image',
                    'tag' => 'image',
                    'type' => 'image',
                    'placeholder' => 'image'
                ],
            ],
            'form-edit' => [
                'product_name' => [
                    'name' => 'product_name',
                    'title' => 'product_name',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'product_name'
                ],
                'stock' => [
                    'name' => 'stock',
                    'title' => 'stock',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'stock'
                ],
                'unit_price' => [
                    'name' => 'unit_price',
                    'title' => 'unit_price',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'unit_price'
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
                                'value' => 'non_active',
                                'title' => 'Non Active'
                            ],
                        ],
                    ],
                ],
                'catalog_category_id' => [
                    'name' => 'catalog_category_id',
                    'title' => 'Status Data',
                    'tag' => 'option',
                    'type' => 'option',
                    'option-config' => [
                        'option-title' => 'catalog_category_name',
                        'option-reference' => 'id',
                        'option-content' => $CatalogCategory
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
                'image' => [
                    'name' => 'image',
                    'title' => 'Image',
                    'tag' => 'image',
                    'type' => 'image',
                    'placeholder' => 'image'
                ],
            ],
            'form-detail' => [
                'product_name' => [
                    'name' => 'product_name',
                    'title' => 'product_name',
                    'tag' => 'input',
                    'type' => 'text',
                    'placeholder' => 'product_name'
                ],
                'stock' => [
                    'name' => 'stock',
                    'title' => 'stock',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'stock'
                ],
                'unit_price' => [
                    'name' => 'unit_price',
                    'title' => 'unit_price',
                    'tag' => 'input',
                    'type' => 'number',
                    'placeholder' => 'unit_price'
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
                                'value' => 'non_active',
                                'title' => 'Non Active'
                            ],
                        ],
                    ],
                ],
                'catalog_category_id' => [
                    'name' => 'catalog_category_id',
                    'title' => 'Status Data',
                    'tag' => 'option',
                    'type' => 'option',
                    'option-config' => [
                        'option-title' => 'catalog_category_name',
                        'option-reference' => 'id',
                        'option-content' => $CatalogCategory
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
                'image' => [
                    'name' => 'image',
                    'title' => 'Image',
                    'tag' => 'image',
                    'type' => 'image',
                    'placeholder' => 'image'
                ],
            ],
        ];

        $columTable = TableHelper::index($table, $tableConfig);

        return view(
            'seller.catalog',
            [
                'menu'=>$menu,
                'catalog'=>$catalog,
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
        $catalog = new Catalog;

        
        
        foreach($request->request as $key => $data){
            if($key == '_token')continue;
            $catalog->$key = $data;
                     
        }
            $catalog->user_id = $curr_user;             
            
            // Image Upload
            $imageName = time().'.'.$request->image->extension(); 
            $request->image->move(public_path('images'), $imageName);
            $catalog->image = $imageName;
            
            // dd($request);

        if($catalog->save()){
            return back()->with('success', 'Selamat Data dimasukan!');
        }else{
            return back()->with('failed', 'Selamat Data dimasukan!');

        }
        // dd($catalog);
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
        $catalog = Catalog::find($id);

        foreach($request->request as $key => $data){
            if($key == '_token')continue;
            $catalog->$key = $data;            
        }
            $catalog->user_id = $curr_user;     
            
            // Image Upload
            $imageName = time().'.'.$request->image->extension(); 
            $request->image->move(public_path('images'), $imageName);
            $catalog->image = $imageName;
            

        if($catalog->save()){
            return back()->with('success', 'Selamat Data dimasukan!');
        }else{
            return back()->with('failed', 'Selamat Data dimasukan!');

        }
        // dd($catalog);
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
        $catalog = Catalog::find($id);

        foreach($request->request as $key => $data){
            if($data == null )break;
            
            if($catalog->delete()){
                return back()->with('success', 'Selamat Data dimasukan!');
                break;
            }else{
                return back()->with('failed', 'Selamat Data dimasukan!');
                break;
            }
        }       
    }
}

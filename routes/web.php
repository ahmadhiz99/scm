<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Seller\CatalogController;
use App\Http\Controllers\Seller\CatalogCategoryController;
use App\Http\Controllers\Seller\MaterialController;
use App\Http\Controllers\Seller\MaterialCategoryController;
use App\Http\Controllers\Seller\DeliveryOrderController;
use App\Http\Controllers\Seller\CourierController;
use App\Http\Controllers\Seller\SalesOrderController;
use App\Http\Controllers\Seller\PurchaseOrderController;
use App\Http\Controllers\Seller\PurchasePaymentController;
use App\Http\Controllers\Seller\SupplierController;
use App\Http\Controllers\Seller\SalesPaymentController;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;


use App\Http\Controllers\Konsumen\KonsumenController;

use App\Http\Controllers\Suplier\SuplierController;

use App\Http\Controllers\Profile\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

// Auth::routes();

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){
    Auth::routes();
});

// ADMIN ROUTES
Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');

    Route::get('user',[UserController::class,'index'])->name('user.user');
    Route::post('add-user',[UserController::class,'add'])->name('user.add-user');
    Route::post('edit-user/{id}',[UserController::class,'edit'])->name('user.edit-user');
    Route::post('delete-user/{id}',[UserController::class,'delete'])->name('user.delete-user');

    Route::get('role',[RoleController::class,'index'])->name('role.role');
    Route::post('add-role',[RoleController::class,'add'])->name('role.add-role');
    Route::post('edit-role/{id}',[RoleController::class,'edit'])->name('role.edit-role');
    Route::post('delete-role/{id}',[RoleController::class,'delete'])->name('role.delete-role');

     // Profile
     Route::get('profile',[ProfileController::class,'index']);
     Route::post('edit-profile',[ProfileController::class,'editProfile']);
    
});

//# SELLER ROUTES
Route::group(['prefix'=>'seller', 'middleware'=>['isSeller','auth','PreventBackHistory']], function(){
    // Dashboard
    Route::get('dashboard',[SellerController::class,'index'])->name('seller.dashboard');
    
    
    // Production Order
    Route::get('production_order',[SellerController::class,'production_order_page'])->name('seller.production_order');
    Route::post('add',[SellerController::class,'add'])->name('seller.add');
    Route::post('edit/{id}',[SellerController::class,'edit'])->name('seller.edit');
    Route::post('delete/{id}',[SellerController::class,'delete'])->name('seller.delete');

    // Katalog 
    Route::get('catalog',[CatalogController::class,'catalog_page'])->name('catalog.catalog');
    Route::post('add-catalog',[CatalogController::class,'add'])->name('catalog.add_catalog');
    Route::post('edit-catalog/{id}',[CatalogController::class,'edit'])->name('catalog.edit-catalog');
    Route::post('delete-catalog/{id}',[CatalogController::class,'delete'])->name('catalog.delete-catalog');

    // Katalog Categories 
    Route::get('catalog-category',[CatalogCategoryController::class,'page'])->name('catalog-category.catalog-category');
    Route::post('add-catalog-category',[CatalogCategoryController::class,'add'])->name('catalog-category.add-catalog-category');
    Route::post('edit-catalog-category/{id}',[CatalogCategoryController::class,'edit'])->name('catalog-category.edit-catalog-category');
    Route::post('delete-catalog-category/{id}',[CatalogCategoryController::class,'delete'])->name('catalog-category.delete-catalog-category');
        
     // Material 
     Route::get('material',[MaterialController::class,'material_page'])->name('material.material');
     Route::post('add-material',[MaterialController::class,'add'])->name('material.add-material');
     Route::post('edit-material/{id}',[MaterialController::class,'edit'])->name('material.edit-material');
     Route::post('delete-material/{id}',[MaterialController::class,'delete'])->name('material.delete-material');

      // Material Categories 
      Route::get('material-category',[MaterialCategoryController::class,'material_page'])->name('material-category.material-category');
      Route::post('add-material-category',[MaterialCategoryController::class,'add'])->name('material-category.add-material-category');
      Route::post('edit-material-category/{id}',[MaterialCategoryController::class,'edit'])->name('material-category.edit-material-category');
      Route::post('delete-material-category/{id}',[MaterialCategoryController::class,'delete'])->name('material-category.delete-material-category');

    // Delivery Order
    Route::get('delivery-order',[DeliveryOrderController::class,'material_page'])->name('delivery-order.delivery-order');
    Route::post('add-delivery-order',[DeliveryOrderController::class,'add'])->name('delivery-order.add-delivery-order');
    Route::post('edit-delivery-order/{id}',[DeliveryOrderController::class,'edit'])->name('delivery-order.edit-delivery-order');
    Route::post('delete-delivery-order/{id}',[DeliveryOrderController::class,'delete'])->name('delivery-order.delete-delivery-order');
    
    // Courier
    Route::get('courier',[CourierController::class,'material_page'])->name('courier.courier');
    Route::post('add-courier',[CourierController::class,'add'])->name('courier.add-courier');
    Route::post('edit-courier/{id}',[CourierController::class,'edit'])->name('courier.edit-courier');
    Route::post('delete-courier/{id}',[CourierController::class,'delete'])->name('courier.delete-courier');
    

    // Sales Order
    Route::get('sales-order',[SalesOrderController::class,'material_page'])->name('sales-order.sales-order');
    Route::post('add-sales-order',[SalesOrderController::class,'add'])->name('sales-order.add-sales-order');
    Route::post('edit-sales-order/{id}',[SalesOrderController::class,'edit'])->name('sales-order.edit-sales-order');
    Route::post('delete-sales-order/{id}',[SalesOrderController::class,'delete'])->name('sales-order.delete-sales-order');

    // Purchase Order
    Route::get('purchase-order',[PurchaseOrderController::class,'material_page'])->name('purchase-order.purchase-order');
    Route::post('add-purchase-order',[PurchaseOrderController::class,'add'])->name('purchase-order.add-purchase-order');
    Route::post('edit-purchase-order/{id}',[PurchaseOrderController::class,'edit'])->name('purchase-order.edit-purchase-order');
    Route::post('delete-purchase-order/{id}',[PurchaseOrderController::class,'delete'])->name('purchase-order.delete-purchase-order');

    // Purchase Payment
    Route::get('purchase-payment',[PurchasePaymentController::class,'material_page'])->name('purchase-payment.purchase-payment');
    Route::post('add-purchase-payment',[PurchasePaymentController::class,'add'])->name('purchase-payment.add-purchase-payment');
    Route::post('edit-purchase-payment/{id}',[PurchasePaymentController::class,'edit'])->name('purchase-payment.edit-purchase-payment');
    Route::post('delete-purchase-payment/{id}',[PurchasePaymentController::class,'delete'])->name('purchase-payment.delete-purchase-payment');
    
    // Supplier
    Route::get('supplier',[SupplierController::class,'material_page'])->name('supplier.supplier');
    Route::post('add-supplier',[SupplierController::class,'add'])->name('supplier.add-supplier');
    Route::post('edit-supplier/{id}',[SupplierController::class,'edit'])->name('supplier.edit-supplier');
    Route::post('delete-supplier/{id}',[SupplierController::class,'delete'])->name('supplier.delete-supplier');
    
    // Sales Payment
    Route::get('sales-payment',[SalesPaymentController::class,'material_page'])->name('sales-payment.sales-payment');
    Route::post('add-sales-payment',[SalesPaymentController::class,'add'])->name('sales-payment.add-sales-payment');
    Route::post('edit-sales-payment/{id}',[SalesPaymentController::class,'edit'])->name('sales-payment.edit-sales-payment');
    Route::post('delete-sales-payment/{id}',[SalesPaymentController::class,'delete'])->name('sales-payment.delete-sales-payment');

    
    // Profile
    Route::get('profile',[ProfileController::class,'index']);
    Route::post('edit-profile',[ProfileController::class,'editProfile']);

    
});

// KONSUMEN ROUTES
Route::group(['prefix'=>'konsumen', 'middleware'=>['isKonsumen','auth','PreventBackHistory']], function(){
    // Route::get('detail/payement-order',[KonsumenController::class,'detail_payment'])->name('konsumen.detail_payment');
    
    Route::get('dashboard',[KonsumenController::class,'index'])->name('konsumen.dashboard');
    Route::get('detail/{id}',[KonsumenController::class,'detail'])->name('konsumen.detail');
    Route::post('detail/{id}/cart',[KonsumenController::class,'cart'])->name('konsumen.cart');
    Route::get('detail/detail-order/{id}',[KonsumenController::class,'detail_order'])->name('konsumen.detail-order');
    Route::get('detail/{id}/payment/{count}',[KonsumenController::class,'payment'])->name('konsumen.payment');
    Route::get('detail/{id}/finish-payment',[KonsumenController::class,'finish_payment'])->name('konsumen.finish-payment');

    Route::get('profile',[KonsumenController::class,'profile']);
    Route::post('edit-profile',[KonsumenController::class,'editProfile']);

    Route::post('search',[KonsumenController::class,'search'])->name('search');
    Route::get('searchCatalog/{catageoryCatalog}',[KonsumenController::class,'searchCatalog'])->name('searchCatalog');
    Route::get('order',[KonsumenController::class,'order'])->name('order');
    Route::get('detail-order/{id}',[KonsumenController::class,'detail'])->name('order.detail');



});


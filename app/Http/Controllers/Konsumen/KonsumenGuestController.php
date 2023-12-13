<?php

namespace App\Http\Controllers\Konsumen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

use App\Helpers\SidebarHelper;
use App\Models\Catalog;
use App\Models\User;
use App\Models\CustomerOrder;
use App\Models\SalesOrder;
use App\Models\SalesPayment;

use \Carbon;
use View;

class KonsumenGuestController extends Controller
{
  

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard_guest()
    {
        // $curr_user = Auth::user()->id;
        // $this->id = $curr_user;

        // $menu = SidebarHelper::list(Auth::user()->role_id);

        $dataContent = DB::table('catalogs')
            ->select('catalog_categories.*','users.*','catalogs.*')
            ->join('users', 'users.id', '=', 'catalogs.user_id')
            ->join('catalog_categories', 'catalog_categories.id', '=', 'catalogs.catalog_category_id')
            ->get();

            // dd($dataContent);

        return view(
            'konsumen.guest',
            [
                // 'menu'=>$menu,
                'dataContent'=>$dataContent,
                'message'=>''

            ]
        );
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curr_user = Auth::user()->id;
        $this->id = $curr_user;

        $menu = SidebarHelper::list(Auth::user()->role_id);

        $dataContent = DB::table('catalogs')
            ->select('catalog_categories.*','users.*','catalogs.*')
            ->join('users', 'users.id', '=', 'catalogs.user_id')
            ->join('catalog_categories', 'catalog_categories.id', '=', 'catalogs.catalog_category_id')
            ->get();

            // dd($dataContent);

        return view(
            'konsumen.dashboard',
            [
                'menu'=>$menu,
                'dataContent'=>$dataContent,
                'message'=>''

            ]
        );
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $menu = SidebarHelper::list(Auth::user()->role_id);

        $data = Catalog::find($id);

        return view(
            'konsumen.detail',
            [
                'menu'=>$menu,
                'data'=>$data
            ]
        );
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $menu = SidebarHelper::list(Auth::user()->role_id);
        $curr_user = Auth::user()->id;

        // $data = Catalog::find($id);

        $dataContent = DB::table('catalogs')
            ->select('catalog_categories.*','users.*','catalogs.*')
            ->join('users', 'users.id', '=', 'catalogs.user_id')
            ->join('catalog_categories', 'catalog_categories.id', '=', 'catalogs.catalog_category_id')
            ->where('users.id','=',$id)
            ->get();

        $user = User::find($id);

            // dd($profile);

        return view(
            'konsumen.store',
            [
                'menu'=>$menu,
                'dataContent'=>$dataContent,
                'user'=>$user
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cart(Request $request, $id)
    {
        // dd($request->count);
        $curr_user = Auth::user()->id;
        $menu = SidebarHelper::list(Auth::user()->role_id);
        $data = Catalog::find($id);
        $cust_find_duplicate = CustomerOrder::where('catalog_id','=',$id)->where('user_id','=',$curr_user)->first();
       
        if($cust_find_duplicate !=null){
            $cust_find_duplicate->quantity = $request->count;
            if($cust_find_duplicate->save()){
                $menu = SidebarHelper::list(Auth::user()->role_id);
                $data = Catalog::find($id);
                // session()->flash('status', 'This is a message!'); 
                // return back();
                // return view(
                //     'konsumen.detail',
                //     [
                //         'menu'=>$menu,
                //         'data'=>$data
                //     ]
                // );
                return back()->with('status', 'Maaf Data Duplicates!');
            }else{
                return back()->with('status', 'Maaf Data Duplicates!');
            }
        }else{
            $cust_order = new CustomerOrder;
            $cust_order->user_id = $curr_user;
            $cust_order->catalog_id = $id;
            $cust_order->quantity = $request->count;
            $cust_order->price = $data->unit_price;
            $cust_order->note = $request->note;
            $cust_order->sales_order_id = 0;
            
            // $cust_order->sales_order_id = 1;
            if($cust_order->save()){
                return back()->with('status', 'Selamat Data dimasukan!');
            }else{
                return back()->with('status', 'Maaf Data Tidak falid!');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function payment($id, $count)
    {
        $menu = SidebarHelper::list(Auth::user()->role_id);
        $dataCatalog = Catalog::find($id);

        $curr_user = Auth::user()->id;
        $user = User::find($curr_user);
        
        $data = DB::table('customer_orders')
        ->select('customer_orders.id as id_customer_order','customer_orders.*','catalogs.*')
        ->join('catalogs', 'customer_orders.catalog_id', '=', 'catalogs.id')
        ->where('catalogs.id', $id)
        ->orderBy('customer_orders.id','desc')
        ->get();
        // dd($data);

        return view(
            'konsumen.payment',
            [
                'menu'=>$menu,
                'data'=>$data[0],
                'user'=>$user,
                'count'=>$count
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail_order($id)
    {   
        $this->update_notif = true;
        $this->id_customer_order = $id;

        $curr_user = Auth::user()->id;
        $menu = SidebarHelper::list(Auth::user()->role_id);
        
        $cust_order = CustomerOrder::find($id);
        $cust_order->notif = '0';

        $data = DB::table('customer_orders')
            ->select('customer_orders.id as id_customer_order','customer_orders.*','catalogs.*')
            ->join('catalogs', 'customer_orders.catalog_id', '=', 'catalogs.id')
            ->where('customer_orders.id', $id)
            ->orderBy('customer_orders.id','desc')
            ->get();

        
        // dd($cust_order->update());
        // DD($data[0]);
        
        if($cust_order->save()){
            return view(
                'konsumen.detail-order',
                [
                    'menu'=>$menu,
                    'cust_order'=>$cust_order,
                    'data'=>$data[0]
                ]
            );

        }else{
            echo 'null';
        }
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function finish_payment(Request $request, $id)
    {        

        // dd($request);
        $salesPayment = new SalesPayment;
        $curdate = Carbon\Carbon::now();
        $catalog = Catalog::find($id);

        $umkm = DB::table('catalogs')
            ->select('catalogs.id as id_customer_order','catalogs.user_id as id_umkm','catalogs.*','users.*')
            ->join('users', 'catalogs.user_id', '=', 'users.id')
            ->where('catalogs.id', $id)
            ->get();

        // dd($umkm[0]);

        // $salesOrder = new SalesOrder;
        // $salesOrder->no_sale_invoice = 'inv-'.$id.'-'.$curdate->toArray()['timestamp'];
        // $salesOrder->invoice_date = $curdate->toArray()['formatted'];
        // $salesOrder->customer_name = $request->customerName;
        // $salesOrder->shipping_address = $request->address;
        // $salesOrder->quantity = $request->total;
        // // $salesOrder->courier_id = 0;
        // $salesOrder->status = 0;
        // $curr_user = Auth::user()->id;
        // $salesOrder->user_id = $curr_user;
        // // $sales_order_id = $salesOrder->id;

        $curr_user = Auth::user()->id;

        if($request->id == 1){
            $customerOrder = CustomerOrder::find($request->id);
            $customerOrder->catalog_id = $request->catalog_id;
            // $customerOrder->shipping_address = $request->address;
            // $customerOrder->grand_total = $request->total;
            $customerOrder->price = $request->unitPrice;
            $customerOrder->quantity = $request->quantity;
            $customerOrder->sales_order_id = 0; 
            $customerOrder->status = 1; // 1 berarti tidak masuk cart
            $customerOrder->user_id = $curr_user;
            
        }else{
            // dd($request);
            $customerOrder = new CustomerOrder;
            $customerOrder->catalog_id = $request->catalog_id;
            // $customerOrder->shipping_address = $request->address;
            // $customerOrder->grand_total = $request->total;
            $customerOrder->price = $request->unitPrice;
            $customerOrder->quantity = $request->quantity;
            $customerOrder->sales_order_id = 0; 
            $customerOrder->status = 1; // 1 berarti tidak masuk cart
            $customerOrder->user_id = $curr_user;

            $salesOrder = new SalesOrder;
            $salesOrder->no_sale_invoice = 'inv-'.$curr_user.'-'.$request->catalog_id.'-'.$curdate->toArray()['timestamp'];
            $salesOrder->invoice_date = $curdate->toArray()['formatted'];
            $salesOrder->customer_name = $request->customerName;
            $salesOrder->shipping_address = $request->address;
            $salesOrder->grand_total = $request->total;
            $salesOrder->user_id = $umkm[0]->id_umkm;
            $salesOrder->customer_id = $curr_user;

            // $salesOrder->courier_id = 0;
            $salesOrder->status = 0;
            $curr_user = Auth::user()->id;
            
        }


        if($customerOrder->save()){
            $salesOrder->save();
            $customerOrder->sales_order_id = $salesOrder->id;
            $customerOrder->save();

            // return back()->with('success', 'Selamat Data dimasukan!');
           return redirect('https://wa.me/+62'.$umkm[0]->phone.'?text=Halo,%20Saya'.'%20'.$request->customerName.'.%20Ingin%20Mengkonfirmasi%20Untuk%20Pesanan%20'.$umkm[0]->product_name.',%20Dengan%20Total%20'.$request->total.'.');
        }else{
            return back()->with('failed', 'Selamat Data dimasukan!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $menu = SidebarHelper::list(Auth::user()->role_id);

        $curr_user = Auth::user()->id;
        $user = User::find($curr_user);
        // dd(Crypt::decrypt($user->password));
        // $user->password = Crypt::decrypt($user->password);

        return view('component.profile.profile2',[
            'menu'=>$menu,
            'user'=>$user
        ]);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProfile(Request $request)
    {
        $menu = SidebarHelper::list(Auth::user()->role_id);
        
        $curr_user = Auth::user()->id;
        $user = User::find($curr_user);
        // dd($user);
        
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = Crypt::encrypt($request->password);
        $user->rekening = $request->rekening;
        $user->bank = $request->bank;

        if($user->save()){
            return back()->with('success', 'Selamat Data dimasukan!');
        }else{
            return back()->with('failed', 'Maaf Data dimasukan!');
        }    
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $keyword = '%'.$request->search.'%';

        // $curr_user = Auth::user()->id;
        // $this->id = $curr_user;

        // $menu = SidebarHelper::list(Auth::user()->role_id);

        $dataContent = DB::table('catalogs')
            ->select('catalog_categories.*','users.*','catalogs.*')
            ->join('users', 'users.id', '=', 'catalogs.user_id')
            ->join('catalog_categories', 'catalog_categories.id', '=', 'catalogs.catalog_category_id')
            ->where('catalogs.product_name','like',$keyword)
            ->get();

        return view(
            'konsumen.guest',
            [
                // 'menu'=>$menu,
                'dataContent'=>$dataContent,
                'message'=>''

            ]
        );
        
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchCatalog($catageoryCatalog)
    {
        $keyword = '%'.$catageoryCatalog.'%';

        $curr_user = Auth::user()->id;
        $this->id = $curr_user;

        $menu = SidebarHelper::list(Auth::user()->role_id);

        $dataContent = DB::table('catalog_categories')
            ->select('catalog_categories.*','catalogs.*','users.*')
            ->join('catalogs', 'catalogs.catalog_category_id','=','catalog_categories.id')
            ->join('users', 'users.id', '=', 'catalogs.user_id')
            ->where('catalog_categories.catalog_category_name','like',$keyword)
            // ->where('user_id','=',$curr_user)
            ->get();

            // dd($dataContent);

        return view(
            'konsumen.dashboard',
            [
                'menu'=>$menu,
                'dataContent'=>$dataContent,
                'message'=>'Hasil Pencaraian Catalog Category: '.$catageoryCatalog
            ]
        );
        
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order()
    {
        
        $curr_user = Auth::user()->id;
        $this->id = $curr_user;

        $menu = SidebarHelper::list(Auth::user()->role_id);

        $dataContent = DB::table('sales_orders')
            ->select('catalogs.*','customer_orders.*','users.*','sales_orders.*')
            // ->join('sales_orders', 'sales_orders.id', '=', 'delivery_orders.sales_order_id')
            ->join('customer_orders', 'sales_orders.id', '=', 'customer_orders.sales_order_id')
            ->join('catalogs', 'catalogs.id', '=', 'customer_orders.catalog_id')
            ->join('users','catalogs.user_id','=','users.id')
            // ->where('customer_orders.status','IN','(1,2)')
            ->where('sales_orders.customer_id','=',$curr_user)
            ->get();

            // dd($dataContent);

        return view(
            'konsumen.order',
            [
                'menu'=>$menu,
                'dataContent'=>$dataContent
            ]
        );
        
    }

}

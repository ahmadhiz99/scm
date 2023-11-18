<?php

namespace App\Http\Controllers\Konsumen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use App\Helpers\SidebarHelper;
use App\Models\Catalog;
use App\Models\User;
use App\Models\CustomerOrder;
use App\Models\SalesOrder;
use App\Models\SalesPayment;

use \Carbon;
use View;

class KonsumenController extends Controller
{
    public $id;
    public $update_notif = false;
    public $id_customer_order = '0';

    public function __construct(){        
        
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {

            $this->id = Auth::user()->id;
            $cust_order = DB::table('customer_orders')
            ->select('customer_orders.id as id_customer_order','customer_orders.*','catalogs.*')
            ->join('catalogs', 'customer_orders.catalog_id', '=', 'catalogs.id')
            ->where('customer_orders.user_id', Auth::user()->id)
            ->orderBy('customer_orders.id','desc')
            ->get();
            $beep = false;

            foreach($cust_order as $data){
                if($data->notif == '1'){
                    $beep = true;
                    break;
                }
            }

            View::share(['cust_order_2' => $cust_order, 'beep' => $beep]);
          
            // dd($request);
    
            return $next($request);
        });
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

        // $dataContent = Catalog::all();

        $dataContent = DB::table('catalogs')
            ->select('catalog_categories.*','users.*','catalogs.*')
            ->join('users', 'users.id', '=', 'catalogs.user_id')
            ->join('catalog_categories', 'catalog_categories.id', '=', 'catalogs.catalog_category_id')
            // ->where('customer_orders.user_id', Auth::user()->id)
            // ->orderBy('customer_orders.id','desc')
            ->get();

        // dd($dataContent);

        return view(
            'konsumen.dashboard',
            [
                'menu'=>$menu,
                'dataContent'=>$dataContent
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cart($id, $count)
    {
        // dd();

        $curr_user = Auth::user()->id;
        $menu = SidebarHelper::list(Auth::user()->role_id);

        // dd($curr_user);
        
        $data = Catalog::find($id);
        
        $cust_find_duplicate = CustomerOrder::where('catalog_id','=',$id)->where('user_id','=',$curr_user)->first();

        
        if($cust_find_duplicate !=null){
            $cust_find_duplicate->quantity += $count;
            if($cust_find_duplicate->save()){
                // dd($cust_find_duplicate);
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
            $cust_order->quantity = $count;
            $cust_order->price = 12000;
            $cust_order->note = 12000;
            $cust_order->sales_order_id = 1;
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
        // dd($count);
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
            ->select('catalogs.id as id_customer_order','catalogs.*','users.*')
            ->join('users', 'catalogs.user_id', '=', 'users.id')
            ->where('catalogs.id', $id)
            ->get();

        // dd($umkm[0]);

        $salesOrder = new SalesOrder;
        $salesOrder->no_sale_invoice = 'inv-'.$id.'-'.$curdate->toArray()['timestamp'];
        $salesOrder->invoice_date = $curdate->toArray()['formatted'];
        $salesOrder->customer_name = $request->customerName;
        $salesOrder->shipping_address = $request->address;
        $salesOrder->grand_total = $request->total;
        // $salesOrder->courier_id = 0;
        $salesOrder->status = 0;
        $curr_user = Auth::user()->id;
        $salesOrder->user_id = $curr_user;
        // $sales_order_id = $salesOrder->id;

        if($salesOrder->save()){
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
        // dd($user);

        return view('component.profile.index',[
            'menu'=>$menu,
            'user'=>$user
    ]);
    
    }
}

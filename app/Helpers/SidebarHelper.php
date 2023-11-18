<?php
namespace App\Helpers;

class SidebarHelper
{
    public static function list($role_id)
    {
    if($role_id == 1){
        $menu = [
            'beranda'=>[
                'name'=>'Beranda',
                'icon'=>'fa fa-check',
                'ref'=>'dashboard',
                // 'item'=>[
                //     'beranda1'=>[
                //         'name'=>'beranda1',
                //         'icon'=>'fa fa-check',
                //         'ref'=>'beranda1',
                //     ],
                //     'beranda2'=>[
                //         'name'=>'beranda2',
                //         'icon'=>'fa fa-check',
                //         'ref'=>'beranda2',
                //     ],
                // ],
            ],
            'user'=>[
                'name'=>'User',
                'icon'=>'fa fa-check',
                'ref'=>'user',
            ],
            'role'=>[
                'name'=>'Roles',
                'icon'=>'fa fa-check',
                'ref'=>'role',
            ],
            // 'pengiriman_suplier'=>[
            //     'name'=>'Pengiriman suplier',
            //     'icon'=>'fa fa-check',
            //     'ref'=>'pengiriman_suplier',
            // ],
            // 'pengiriman_konsumen'=>[
            //     'name'=>'Pengiriman Konsumen',
            //     'icon'=>'fa fa-check',
            //     'ref'=>'pengiriman_konsumen',
            // ],
            // 'detail_pengiriman'=>[
            //     'name'=>'Detail Pengiriman',
            //     'icon'=>'fa fa-check',
            //     'ref'=>'detail_pengiriman',
            // ],
            // 'laporan'=>[
            //     'name'=>'Laporan',
            //     'icon'=>'fa fa-check',
            //     'ref'=>'laporan',
            // ],
        ];
    }else if($role_id == 2){
        $menu = [
            'beranda'=>[
                'name'=>'Beranda',
                'icon'=>'fa fa-check',
                'ref'=>'dashboard',
            ],
            'production_order'=>[
                'name'=>'Produksi',
                'icon'=>'fa fa-check',
                'ref'=>'production_order',
            ],
            'catalog'=>[
                'name'=>'Katalog',
                'icon'=>'fa fa-check',
                'ref'=>'catalog',
                'item'=>[
                    'catalog'=>[
                        'name'=>'Data Katalog',
                        'icon'=>'fa fa-check',
                        'ref'=>'catalog',
                    ],
                    'catalog-category'=>[
                        'name'=>'Kategori Katalog',
                        'icon'=>'fa fa-check',
                        'ref'=>'catalog-category',
                    ],
                ],
            ],
            'material'=>[
                'name'=>'Material',
                'icon'=>'fa fa-check',
                'ref'=>'material',
                'item'=>[
                    'material'=>[
                        'name'=>'Data Material',
                        'icon'=>'fa fa-check',
                        'ref'=>'material',
                    ],
                    'material-category'=>[
                        'name'=>'Kategori Material',
                        'icon'=>'fa fa-check',
                        'ref'=>'material-category',
                    ],
                ],
            ],
            'delivery'=>[
                'name'=>'Pengiriman',
                'icon'=>'fa fa-check',
                'ref'=>'delivery',
                'item'=>[
                    'delivery-order'=>[
                        'name'=>'Pengiriman',
                        'icon'=>'fa fa-check',
                        'ref'=>'delivery-order',
                    ],
                    'courier'=>[
                        'name'=>'Kurir',
                        'icon'=>'fa fa-check',
                        'ref'=>'courier',
                    ],
                ],
            ],
            'purchase_order'=>[
                'name'=>'Pesanan',
                'icon'=>'fa fa-check',
                'ref'=>'purchase_order',
                'item'=>[
                    'purchase-order'=>[
                        'name'=>'Purchase Orders',
                        'icon'=>'fa fa-check',
                        'ref'=>'purchase-order',
                    ],
                    'purchase-payment'=>[
                        'name'=>'Purchase Payment',
                        'icon'=>'fa fa-check',
                        'ref'=>'purchase-payment',
                    ],
                    'supplier'=>[
                        'name'=>'Suplier',
                        'icon'=>'fa fa-check',
                        'ref'=>'supplier',
                    ],
                ],
            ],
            'sales-order'=>[
                'name'=>'Penjualan',
                'icon'=>'fa fa-check',
                'ref'=>'sales-order',
                'item'=>[
                    'sales-order'=>[
                        'name'=>'Sales Order',
                        'icon'=>'fa fa-check',
                        'ref'=>'sales-order',
                    ],
                    'sales-payment'=>[
                        'name'=>'Sales Payment',
                        'icon'=>'fa fa-check',
                        'ref'=>'sales-payment',
                    ],
                ],
            ],
        ];
}else if($role_id == 3){
    $menu = [
        'beranda'=>[
            'name'=>'Home',
            'icon'=>'fa fa-check',
            'ref'=>'dashboard',
        ],
        'checkout'=>[
            'name'=>'Pesanan',
            'icon'=>'fa fa-check',
            'ref'=>'checkout',
        ],
    ];
}else{
    $menu = [];
}



             return $menu;
      }

     public function startQueryLog()
     {
        //    \DB::enableQueryLog();
     }

     public function showQueries()
     {
        //   dd(\DB::getQueryLog());
     }

     public static function instance()
     {
        //  return new AppHelper();
     }
}
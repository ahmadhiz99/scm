<?php

namespace App\Http\Controllers\Component;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = [
            'beranda'=>[
                'name'=>'Beranda',
                'icon'=>'fas fa-cog',
                'ref'=>'beranda',
                'item'=>[
                    'beranda1'=>[
                        'name'=>'beranda1',
                        'icon'=>'fas fa-cog',
                        'ref'=>'beranda1',
                    ],
                    'beranda2'=>[
                        'name'=>'beranda2',
                        'icon'=>'fas fa-cog',
                        'ref'=>'beranda2',
                    ],
                ],
            ],
            'kendaraan'=>[
                'name'=>'kendaraan',
                'icon'=>'fas fa-cog',
                'ref'=>'kendaraan',
                'item'=>[
                    'kendaraan1'=>[
                        'name'=>'kendaraan1',
                        'icon'=>'fas fa-cog',
                        'ref'=>'kendaraan1',
                    ],
                    'kendaraan2'=>[
                        'name'=>'kendaraan2',
                        'icon'=>'fas fa-cog',
                        'ref'=>'beranda2',
                    ],
                ],
            ],
        ];

        return $menu;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

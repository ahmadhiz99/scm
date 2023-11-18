<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class MaterialsController extends Controller
{
    public function materials()
    {
        $materials = Material::with('materialCategory')->get();
        return response()->json(
            $materials, 200
        );
    }
}

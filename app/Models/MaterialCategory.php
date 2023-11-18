<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "material_categories";

    public function material()
    {
        return $this->hasMany(Material::class);
    }
}

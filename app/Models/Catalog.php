<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $table = "catalogs";

    // public function materialCategory()
    // {
    //     return $this->belongsTo(MaterialCategory::class);
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}

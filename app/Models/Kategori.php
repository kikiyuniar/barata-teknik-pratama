<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable = ['foto'];

    // public function subcategory()
    // {
    //     return $this->hasMany(related: Subkategori::class);
    // }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_kategori extends Model
{
    use HasFactory;
    protected $fillable = ['kategori_kode', 'kategori_nama'];
}

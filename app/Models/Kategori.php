<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $primaryKey = 'kategori_id';
    public $timestamps = false;
    protected $fillable = [
        'nama_kategori',
        'status'
    ];

    public function download() {
        return $this->hasMany(Download::class, 'kategori_id', 'kategori_id');
    }
}

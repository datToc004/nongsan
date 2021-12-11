<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donhangnhap extends Model
{
    protected $table = 'donhangnhap';

    /**
     * Get the user that owns the Donhangnhap
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nhacungcap()
    {
        return $this->belongsTo(Nhacungcap::class);
    }

    public function sanpham()
    {
        return $this->belongsToMany(Sanpham::class, 'lohang');
    }

    public function lohang()
    {
        return $this->hasMany(Lohang::class);
    }
}

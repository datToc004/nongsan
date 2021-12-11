<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lohang extends Model
{
    protected $table = "lohang";

    protected $fillable = ['id', 'lohang_han_su_dung', 'lohang_gia_mua_vao', 'lohang_gia_ban_ra', 'lohang_so_luong_sp', 'sanpham_id', 'donhangnhap_id'];

    public $timestamps = true;

    public function sanpham()
    {
        return $this->belongsTo(Sanpham::class);
    }
}

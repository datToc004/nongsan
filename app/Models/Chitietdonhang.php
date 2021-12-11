<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chitietdonhang extends Model
{
    protected $table = "chitietdonhang";

    protected $fillable = ['sanpham_id','donhang_id','chitietdonhang_so_luong','chitietdonhang_thanh_tien'];

	public $timestamps = false;

    public function sanpham()
    {
        return $this->belongsTo(Sanpham::class);
    }
}

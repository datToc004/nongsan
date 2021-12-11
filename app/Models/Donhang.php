<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donhang extends Model
{
    protected $table = "donhang";

    protected $fillable = ['id','donhang_nguoi_nhan','donhang_nguoi_nhan_email','donhang_nguoi_nhan_sdt','donhang_nguoi_nhan_dia_chi','donhang_ghi_chu','donhang_tong_tien','khachhang_id','tinhtranghd_id'];

	public $timestamps = true;

    public function khachhang()
    {
        return $this->belongsTo(Khachhang::class);
    }

    public function sanpham()
    {
        return $this->belongsToMany(Sanpham::class, 'chitietdonhang');
    }

    /**
     * Get all of the chitiet for the Donhang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function chitietdh()
    {
        return $this->hasMany(Chitietdonhang::class);
    }
}

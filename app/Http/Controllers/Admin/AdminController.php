<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chitietdonhang;
use App\Models\Donhang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $donhang = DB::table('donhang')->where('tinhtranghd_id', 1)->count();
        $luotbinhluan = DB::table('binhluan')->where('binhluan_trang_thai', 0)->count();
        $khachhang = DB::table('khachhang')->count();
        $sanpham = DB::table('sanpham')->count();
        $binhluan = DB::table('binhluan')->where('binhluan_trang_thai', 0)->get();
        $bannhieu = DB::table('chitietdonhang')
            ->where('donhang.tinhtranghd_id', 4)
            ->join('donhang', 'donhang.id', '=', 'chitietdonhang.donhang_id')
            ->select(
                'sanpham_id',
                DB::raw('SUM(chitietdonhang_so_luong) as ban'),
                DB::raw('SUM(chitietdonhang_don_gia*chitietdonhang_so_luong) as tien')
            )
            ->groupBy('sanpham_id')
            ->orderBy('tien', 'desc')
            ->take(10)
            ->get();
        // print_r($bannhieu);
        $nhapnhieu = DB::table('lohang')

            ->select(
                'sanpham_id',
                DB::raw('SUM(lohang_so_luong_nhap) as nhap'),
                DB::raw('SUM(lohang_don_gia*lohang_so_luong_nhap) as tien')
            )
            ->groupBy('sanpham_id')
            ->orderBy('tien', 'desc')
            ->take(10)
            ->get();
        $muanhieu = DB::table('donhang')
            ->where('donhang.tinhtranghd_id', 4)
            ->select(
                'khachhang_id',
                DB::raw('COUNT(khachhang_id) as donhang'),
                DB::raw('SUM(donhang_don_gia) as tien')
            )
            ->groupBy('khachhang_id')
            ->orderBy('tien', 'desc')
            ->take(10)
            ->get();
        // print_r($nhapnhieu);
        return view('backend.dashboard', compact('donhang', 'binhluan', 'khachhang', 'sanpham', 'luotbinhluan', 'bannhieu', 'nhapnhieu', 'muanhieu'));
    }
    public function index1()
    {
        $donhang = Donhang::all();
        foreach($donhang as $dh){
            $tongtien=0;
            foreach($dh->chitietdh as $item){
                $tongtien+=$item->chitietdonhang_so_luong*$item->chitietdonhang_don_gia;
            }
            $dh->donhang_don_gia=$tongtien;
            $dh->save();
        }
    }
}

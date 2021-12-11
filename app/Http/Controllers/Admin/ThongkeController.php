<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Donhang;
use App\Models\Donhangnhap;
use App\Models\Lohang;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ThongkeController extends Controller
{
    public function getList()
    {
        $data1 = Lohang::all();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date_now = date("Y-m-d");
        foreach ($data1 as $item) {
            if ($date_now <= date("Y-m-d", strtotime($item->ngaysx . "+ $item->lohang_han_su_dung  day"))) {
                $item->lohang_tinh_trang = 0;
                $item->save();
            } else {
                $item->lohang_tinh_trang = 1;
                $item->save();
            }
        }
        $sl = DB::table('lohang')
            ->select(
                DB::raw('SUM(lohang_so_luong_nhap) as nhap'),
                DB::raw('SUM(lohang_so_luong_da_ban) as ban'),
                DB::raw('SUM(lohang_so_luong_hien_tai) as ton'),
                DB::raw('SUM(lohang_so_luong_doi_tra) as tra')
            )
            ->get();
        $bannhieu = DB::table('lohang')
            ->select(
                'sanpham_id',
                DB::raw('SUM(lohang_so_luong_da_ban) as ban'),
                DB::raw('SUM(lohang_so_luong_hien_tai) as ton')
            )
            ->groupBy('sanpham_id')
            ->orderBy('ban', 'desc')
            ->get();
        $tonnhieu = DB::table('lohang')
            ->select(
                'sanpham_id',
                DB::raw('SUM(lohang_so_luong_da_ban) as ban'),
                DB::raw('SUM(lohang_so_luong_hien_tai) as ton')
            )
            ->groupBy('sanpham_id')
            ->orderBy('ton', 'desc')
            ->get();
        $hethan = DB::table('lohang')
            ->where('lohang_tinh_trang', 1)
            ->select(
                'sanpham_id',
                DB::raw('SUM(lohang_so_luong_da_ban) as ban'),
                DB::raw('SUM(lohang_so_luong_hien_tai) as ton')
            )
            ->groupBy('sanpham_id')
            ->get();
        $conhan = DB::table('lohang')
            ->where('lohang_tinh_trang', 0)
            ->select(
                'sanpham_id',
                DB::raw('SUM(lohang_so_luong_da_ban) as ban'),
                DB::raw('SUM(lohang_so_luong_hien_tai) as ton')
            )
            ->groupBy('sanpham_id')
            ->get();
        // print_r($hethan);
        return view('backend.thongke.tongquan', compact('sl', 'tonnhieu', 'bannhieu', 'hethan', 'conhan'));
    }

    public function getDoanhThu(Request $r)
    {
        if ($r->nam) {
            $year_n = $r->nam;
        } else {
            $year_n = Carbon::now()->format('Y');
        }
        
        $month_n = Carbon::now()->format('m');
        for ($i = 1; $i <= 12; $i++) {
            $monthjs[$i] = 'Tháng ' . $i;
            $numberjs[$i] = Donhang::where('tinhtranghd_id', 4)->whereMonth('created_at', $i)->whereYear('created_at', $year_n)->sum('donhang_don_gia');
        }

        return view('backend.thongke.doanhthu', compact('monthjs', 'numberjs'));
    }

    public function getDoanhThuThang(Request $r)
    {
        $year_n = $r->nam;


        $month_n = Carbon::now()->format('m');
        $rs=DB::table('donhang')
                    ->join('chitietdonhang', 'donhang.id', '=', 'chitietdonhang.donhang_id')
                    ->join('sanpham', 'sanpham.id', '=', 'chitietdonhang.sanpham_id')
                    ->join('donvitinh', 'donvitinh.id', '=', 'sanpham.donvitinh_id')
                    ->select(DB::raw('sum(chitietdonhang.chitietdonhang_so_luong) as soluong'),DB::raw('sum(chitietdonhang.chitietdonhang_don_gia*chitietdonhang.chitietdonhang_so_luong) as tongtien'),DB::raw('sum(donhang.donhang_don_gia) as donhang_tongtien'), 'sanpham.id', 'sanpham.sanpham_ten', 'sanpham.sanpham_url', 'sanpham.sanpham_khuyenmai', 'sanpham.sanpham_ky_hieu','donvitinh_ten')
                    ->where('tinhtranghd_id', 4)->whereMonth('donhang.created_at', $r->thang)->whereYear('donhang.created_at', $year_n)
                    ->groupBy('sanpham.id')
                    ->orderBy('tongtien', 'desc')
                    ->get();

        return response()->json($rs);
    }

    public function getDoanhThuThang1(Request $r)
    {
        $year_n = $r->nam;


        $month_n = Carbon::now()->format('m');
        $data=DB::table('donhang')
                    ->join('chitietdonhang', 'donhang.id', '=', 'chitietdonhang.donhang_id')
                    ->join('sanpham', 'sanpham.id', '=', 'chitietdonhang.sanpham_id')
                    ->join('donvitinh', 'donvitinh.id', '=', 'sanpham.donvitinh_id')
                    ->select(DB::raw('sum(chitietdonhang.chitietdonhang_so_luong) as soluong'),DB::raw('sum(chitietdonhang.chitietdonhang_don_gia*chitietdonhang.chitietdonhang_so_luong) as tongtien'),DB::raw('sum(donhang.donhang_don_gia) as donhang_tongtien'), 'sanpham.id', 'sanpham.sanpham_ten', 'sanpham.sanpham_url', 'sanpham.sanpham_khuyenmai', 'sanpham.sanpham_ky_hieu','donvitinh_ten')
                    ->where('tinhtranghd_id', 4)->whereMonth('donhang.created_at', $r->thang)->whereYear('donhang.created_at', $year_n)
                    ->groupBy('sanpham.id')
                    ->orderBy('tongtien', 'desc')
                    ->get();

        return view('backend.thongke.doanhthuthang', compact('data'));
    }

    public function getNhapHang1(Request $r)
    {
        if ($r->nam) {
            $year_n = $r->nam;
        } else {
            $year_n = Carbon::now()->format('Y');
        }

        $month_n = Carbon::now()->format('m');
        for ($i = 1; $i <= 12; $i++) {
            $monthjs[$i] = 'Tháng ' . $i;
            $numberjs[$i] = Donhangnhap::where('donhangnhap_tinh_trang', 1)->whereMonth('created_at', $i)->whereYear('created_at', $year_n)->sum('donhangnhap_tong_tien');
        }

        return view('backend.thongke.nhaphang', compact('monthjs', 'numberjs'));
    }

    public function getNhapHangThang1(Request $r)
    {
        $year_n = $r->nam;


        $month_n = Carbon::now()->format('m');
        $rs=DB::table('donhangnhap')
                    ->join('lohang', 'donhangnhap.id', '=', 'lohang.donhangnhap_id')
                    ->join('sanpham', 'sanpham.id', '=', 'lohang.sanpham_id')
                    ->join('donvitinh', 'donvitinh.id', '=', 'sanpham.donvitinh_id')
                    ->select(DB::raw('sum(lohang.lohang_so_luong_nhap) as soluong'),DB::raw('sum(lohang.lohang_gia_mua_vao*lohang.lohang_so_luong_nhap) as tongtien'),DB::raw('sum(donhangnhap.donhangnhap_tong_tien) as donhang_tongtien'), 'sanpham.id', 'sanpham.sanpham_ten', 'sanpham.sanpham_url', 'sanpham.sanpham_khuyenmai', 'sanpham.sanpham_ky_hieu','donvitinh_ten','lohang.lohang_don_gia')
                    ->where('donhangnhap_tinh_trang', 1)->whereMonth('donhangnhap.created_at', $r->thang)->whereYear('donhangnhap.created_at', $year_n)
                    ->groupBy('sanpham.id')
                    ->orderBy('tongtien', 'desc')
                    ->get();

        return response()->json($rs);
    }

    public function getNhapHangThang2(Request $r)
    {
        $year_n = $r->nam;


        $month_n = Carbon::now()->format('m');
        $data=DB::table('donhangnhap')
                    ->join('lohang', 'donhangnhap.id', '=', 'lohang.donhangnhap_id')
                    ->join('sanpham', 'sanpham.id', '=', 'lohang.sanpham_id')
                    ->join('donvitinh', 'donvitinh.id', '=', 'sanpham.donvitinh_id')
                    ->select(DB::raw('sum(lohang.lohang_so_luong_nhap) as soluong'),DB::raw('sum(lohang.lohang_don_gia*lohang.lohang_so_luong_nhap) as tongtien'),DB::raw('sum(donhangnhap.donhangnhap_tong_tien) as donhang_tongtien'), 'sanpham.id', 'sanpham.sanpham_ten', 'sanpham.sanpham_url', 'sanpham.sanpham_khuyenmai', 'sanpham.sanpham_ky_hieu','donvitinh_ten','lohang.lohang_don_gia')
                    ->where('donhangnhap_tinh_trang', 1)->whereMonth('donhangnhap.created_at', $r->thang)->whereYear('donhangnhap.created_at', $year_n)
                    ->groupBy('sanpham.id')
                    ->orderBy('tongtien', 'desc')
                    ->get();

        return view('backend.thongke.nhaphangthang', compact('data'));
    }

    public function getNhapvao()
    {
        $title = 'Sản phẩm nhập vào';
        $data = DB::table('lohang')
            ->join('sanpham', 'sanpham.id', '=', 'lohang.sanpham_id')
            ->select(
                'sanpham.*',
                'lohang.*'
            )
            ->get();
        // print_r($sanpham);
        return view('backend.thongke.sanpham', compact('data', 'title'));
    }

    public function getBanra()
    {
        $title = 'Sản phẩm bán ra';
        $data = DB::table('lohang')
            ->where('lohang.lohang_so_luong_da_ban', '>', 0)
            ->join('sanpham', 'sanpham.id', '=', 'lohang.sanpham_id')
            ->select(
                'sanpham.*',
                'lohang.*'
            )
            ->get();
        // print_r($data);
        return view('backend.thongke.sanpham', compact('data', 'title'));
    }

    public function getHienco()
    {
        $title = 'Sản phẩm hiện có';
        $data = DB::table('lohang')
            ->where('lohang.lohang_so_luong_hien_tai', '>', 0)
            ->join('sanpham', 'sanpham.id', '=', 'lohang.sanpham_id')
            ->select(
                'sanpham.*',
                'lohang.*'
            )
            ->get();
        // print_r($data);
        return view('backend.thongke.sanpham', compact('data', 'title'));
    }

    public function getDoitra()
    {
        $title = 'Sản phẩm đổi trả';
        $data = DB::table('lohang')
            ->where('lohang.lohang_so_luong_doi_tra', '>', 0)
            ->join('sanpham', 'sanpham.id', '=', 'lohang.sanpham_id')
            ->select(
                'sanpham.*',
                'lohang.*'
            )
            ->get();
        // print_r($data);
        return view('backend.thongke.sanpham', compact('data', 'title'));
    }

    public function getBanchay()
    {
        $title = 'Sản phẩm bán chạy';
        $data = DB::table('lohang')
            ->select(
                'sanpham_id',
                'lohang_gia_ban_ra',
                'lohang_gia_mua_vao',
                DB::raw('SUM(lohang_so_luong_nhap) as nhap'),
                DB::raw('SUM(lohang_so_luong_da_ban) as ban'),
                DB::raw('SUM(lohang_so_luong_hien_tai) as ton')
            )
            ->groupBy('sanpham_id')
            ->orderBy('ban', 'desc')
            ->get();
        // print_r($data);
        return view('backend.thongke.sanpham1', compact('data', 'title'));
    }

    public function getTonnhieu()
    {
        $title = 'Sản phẩm nhập vào';
        $data = DB::table('lohang')
            ->select(
                'sanpham_id',
                DB::raw('SUM(lohang_so_luong_nhap) as nhap'),
                DB::raw('SUM(lohang_so_luong_da_ban) as ban'),
                DB::raw('SUM(lohang_so_luong_hien_tai) as ton')
            )
            ->groupBy('sanpham_id')
            ->orderBy('ton', 'desc')
            ->get();
        // print_r($sanpham);
        return view('backend.thongke.sanpham1', compact('data', 'title'));
    }

    public function getHethan()
    {
        $title = 'Sản phẩm hết hạn sử dụng';
        $data = DB::table('lohang')
            ->where('lohang_tinh_trang', 1)
            ->select(
                'sanpham_id',
                DB::raw('SUM(lohang_so_luong_nhap) as nhap'),
                DB::raw('SUM(lohang_so_luong_da_ban) as ban'),
                DB::raw('SUM(lohang_so_luong_hien_tai) as ton')
            )
            ->groupBy('sanpham_id')
            ->get();
        // print_r($sanpham);
        return view('backend.thongke.sanpham1', compact('data', 'title'));
    }

    public function getConhan()
    {
        $title = 'Sản phẩm còn hạn sử dụng';
        $data = DB::table('lohang')
            ->where('lohang_tinh_trang', 0)
            ->select(
                'sanpham_id',
                DB::raw('SUM(lohang_so_luong_nhap) as nhap'),
                DB::raw('SUM(lohang_so_luong_da_ban) as ban'),
                DB::raw('SUM(lohang_so_luong_hien_tai) as ton')
            )
            ->groupBy('sanpham_id')
            ->get();
        // print_r($sanpham);
        return view('backend.thongke.sanpham1', compact('data', 'title'));
    }
}

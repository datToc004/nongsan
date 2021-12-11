<?php

use App\Http\Controllers\Admin\ThongkeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DonhangController;
use App\Http\Controllers\Admin\DonvitinhController;
use App\Http\Controllers\Admin\KhachhangController;
use App\Http\Controllers\Admin\KhuyenmaiController;
use App\Http\Controllers\Admin\LoaisanphamController;
use App\Http\Controllers\Admin\LohangController;
use App\Http\Controllers\Admin\NhacungcapController;
use App\Http\Controllers\Admin\NhomController;
use App\Http\Controllers\Admin\QuangcaoController;
use App\Http\Controllers\Admin\SanphamController;
use App\Http\Controllers\Admin\TuyendungController;

use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\ProductController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', [UserController::class, 'index'])->name('login')->middleware('CheckLogout');
Route::post('post-login', [UserController::class, 'postLogin'])->name('login.post');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('/resources/upload/{folder}/{filename}', function ($folder, $filename) {
    $path = resource_path() . '/upload/' . $folder . '/' . $filename;

    if (!File::exists($path)) {
        return response()->json(['message' => 'Image not found.'], 404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::group(['prefix' => 'nongsan'], function () {
    Route::get('/', [HomeController::class, 'getList'])->name('home.customer');
    Route::get('/shop', [ProductController::class, 'getList'])->name('shop');
    Route::get('detail/{id}', [ProductController::class, 'getDetail'], 'getDetail')->name('product.getDetail');
    Route::get('/shop-search', [ProductController::class, 'getSearch'])->name('shop.search');

    Route::group(['prefix' => 'cart', 'middleware' => 'CheckLogin'], function () {
        Route::get('get-cart', [ProductController::class, 'getCart'])->name('cart.getCart');
        Route::get('add-cart/{id}', [ProductController::class, 'addCart'])->name('cart.addCart');
        Route::get('updatecart/{rowId}/{qty}', [ProductController::class, 'updateCart'])->name('cart.updateCart');
        Route::get('removecart/{id}', [ProductController::class, 'removeCart'])->name('cart.removeCart');

        Route::get('/checkout', [ProductController::class, 'getCheckout'])->name('checkout');
        Route::post('/post-checkout', [ProductController::class, 'postCheckout'])->name('checkout.post');
        Route::get('/complete', [ProductController::class, 'getComplete'])->name('complete.get');

        Route::get('account', [HomeController::class, 'getAccount'])->name('customer.account');
        Route::post('account-post', [HomeController::class, 'postAccount'])->name('customer.account.post');
    });

    Route::get('contact', [HomeController::class, 'getContact'])->name('customer.contact');

    Route::group(['prefix' => 'promotion'], function () {
        Route::get('/', [HomeController::class, 'getPromotion'])->name('promotion.get');
        Route::get('/{id}', [HomeController::class, 'getDetailPromotion'])->name('promotion.detail.get');
    });

    Route::get('login', [HomeController::class, 'getLogin'])->name('customer.login')->middleware('CheckLogout');
    Route::get('register', [HomeController::class, 'getRegister'])->name('customer.register')->middleware('CheckLogout');
    Route::post('register-post', [HomeController::class, 'postRegister'])->name('customer.register.post');
    Route::post('post-login', [UserController::class, 'postLoginCustomer'])->name('login.post.customer');
    Route::get('logout', [UserController::class, 'logoutCustomer'])->name('logout.customer');
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('home');
    Route::group(['prefix' => 'sanpham'], function () {
        Route::get('/', [SanphamController::class, 'getList'])->name('admin.sanpham.list');
        Route::get('/add', [SanphamController::class, 'getAdd'])->name('admin.sanpham.getAdd');
        Route::get('/edit/{id}', [SanphamController::class, 'getEdit'])->name('admin.sanpham.getEdit');
        Route::get('/delete/{id}', [SanphamController::class, 'getDelete'])->name('admin.sanpham.getDelete');
        Route::post('/post-add', [SanphamController::class, 'postAdd'])->name('admin.sanpham.postAdd');
        Route::post('/post-edit/{id}', [SanphamController::class, 'postEdit'])->name('admin.sanpham.postEdit');
        Route::get('/xoahinh/{id}', [SanphamController::class, 'delImage']);
    });
    Route::group(['prefix' => 'loaisanpham'], function () {
        Route::get('/', [LoaisanphamController::class, 'getList'])->name('admin.loaisanpham.list');
        Route::get('/add', [LoaisanphamController::class, 'getAdd'])->name('admin.loaisanpham.getAdd');
        Route::get('/edit/{id}', [LoaisanphamController::class, 'getEdit'])->name('admin.loaisanpham.getEdit');
        Route::get('/delete/{id}', [LoaisanphamController::class, 'getDelete'])->name('admin.loaisanpham.getDelete');
        Route::post('/post-add', [LoaisanphamController::class, 'postAdd'])->name('admin.loaisanpham.postAdd');
        Route::post('/post-edit/{id}', [LoaisanphamController::class, 'postEdit'])->name('admin.loaisanpham.postEdit');
    });
    Route::group(['prefix' => 'nhom'], function () {
        Route::get('/', [NhomController::class, 'getList'])->name('admin.nhom.list');
        Route::get('/add', [NhomController::class, 'getAdd'])->name('admin.nhom.getAdd');
        Route::get('/edit/{id}', [NhomController::class, 'getEdit'])->name('admin.nhom.getEdit');
        Route::get('/delete/{id}', [NhomController::class, 'getDelete'])->name('admin.nhom.getDelete');
        Route::post('/post-add', [NhomController::class, 'postAdd'])->name('admin.nhom.postAdd');
        Route::post('/post-edit/{id}', [NhomController::class, 'postEdit'])->name('admin.nhom.postEdit');
    });
    Route::group(['prefix' => 'donvitinh'], function () {
        Route::get('/', [DonvitinhController::class, 'getList'])->name('admin.donvitinh.list');
        Route::get('/add', [DonvitinhController::class, 'getAdd'])->name('admin.donvitinh.getAdd');
        Route::get('/edit/{id}', [DonvitinhController::class, 'getEdit'])->name('admin.donvitinh.getEdit');
        Route::get('/delete/{id}', [DonvitinhController::class, 'getDelete'])->name('admin.donvitinh.getDelete');
        Route::post('/post-add', [DonvitinhController::class, 'postAdd'])->name('admin.donvitinh.postAdd');
        Route::post('/post-edit/{id}', [DonvitinhController::class, 'postEdit'])->name('admin.donvitinh.postEdit');
    });
    Route::group(['prefix' => 'nhacungcap'], function () {
        Route::get('/', [NhacungcapController::class, 'getList'])->name('admin.nhacungcap.list');
        Route::get('/add', [NhacungcapController::class, 'getAdd'])->name('admin.nhacungcap.getAdd');
        Route::get('/edit/{id}', [NhacungcapController::class, 'getEdit'])->name('admin.nhacungcap.getEdit');
        Route::get('/delete/{id}', [NhacungcapController::class, 'getDelete'])->name('admin.nhacungcap.getDelete');
        Route::post('/post-add', [NhacungcapController::class, 'postAdd'])->name('admin.nhacungcap.postAdd');
        Route::post('/post-edit/{id}', [NhacungcapController::class, 'postEdit'])->name('admin.nhacungcap.postEdit');
    });
    Route::group(['prefix' => 'lohang'], function () {
        Route::get('/', [LohangController::class, 'getList'])->name('admin.lohang.list');
        Route::get('/add', [LohangController::class, 'getAdd'])->name('admin.lohang.getAdd');
        Route::get('/edit/{id}', [LohangController::class, 'getEdit'])->name('admin.lohang.getEdit');
        Route::get('/delete/{id}', [LohangController::class, 'getDelete'])->name('admin.lohang.getDelete');
        Route::post('/post-add', [LohangController::class, 'postAdd'])->name('admin.lohang.postAdd');
        Route::post('/post-edit/{id}', [LohangController::class, 'postEdit'])->name('admin.lohang.postEdit');
        Route::get('/nhaphang/{id}', [LohangController::class, 'getNhaphang'])->name('admin.lohang.getNhaphang');
        Route::post('/post-nhaphang/{id}', [LohangController::class, 'postNhaphang'])->name('admin.lohang.postNhaphang');
        Route::get('/nhaphang', [LohangController::class, 'getNhaphang1'])->name('admin.lohang.getNhaphang1');
        Route::post('/post-nhaphang', [LohangController::class, 'postNhaphang1'])->name('admin.lohang.postNhaphang1');
        Route::get('/hoadon/{id}', [LohangController::class, 'pdf'])->name('admin.lohang.pdf');
    });
    Route::group(['prefix' => 'khachhang'], function () {
        Route::get('/', [KhachhangController::class, 'getList'])->name('admin.khachhang.list');
        Route::get('/history/{id}', [KhachhangController::class, 'getHistory'])->name('admin.khachhang.getHistory');
        Route::get('/delete/{id}', [KhachhangController::class, 'getDelete'])->name('admin.khachhang.getDelete');
    });
    Route::group(['prefix' => 'donhang'], function () {
        Route::get('/', [DonhangController::class, 'getList'])->name('admin.donhang.list');
        Route::get('/edit-status/{id}', [DonhangController::class, 'getEdit'])->name('admin.donhang.getEdit');
        Route::post('/post-edit-status/{id}', [DonhangController::class, 'postEdit'])->name('admin.donhang.postEdit');
        Route::get('/edit1-delivery/{id}', [DonhangController::class, 'getEdit1'])->name('admin.donhang.getEdit1');
        Route::post('/post-edit-delivery/{id}', [DonhangController::class, 'postEdit1'])->name('admin.donhang.postEdit1');
        Route::get('/edit2-bill/{id}', [DonhangController::class, 'getEdit2'])->name('admin.donhang.getEdit2');
        Route::post('/post-edit-bill/{id}', [DonhangController::class, 'postEdit2'])->name('admin.donhang.postEdit2');
        Route::get('/hoadon/{id}', [DonhangController::class, 'pdf'])->name('admin.donhang.pdf');
    });
    Route::group(['prefix' => 'quangcao'], function () {
        Route::get('/', [QuangcaoController::class, 'getList'])->name('admin.quangcao.list');
        Route::get('/add', [QuangcaoController::class, 'getAdd'])->name('admin.quangcao.getAdd');
        Route::get('/edit/{id}', [QuangcaoController::class, 'getEdit'])->name('admin.quangcao.getEdit');
        Route::get('/delete/{id}', [QuangcaoController::class, 'getDelete'])->name('admin.quangcao.getDelete');
        Route::post('/post-add', [QuangcaoController::class, 'postAdd'])->name('admin.quangcao.postAdd');
        Route::post('/post-edit/{id}', [QuangcaoController::class, 'postEdit'])->name('admin.quangcao.postEdit');
        Route::get('/chance/{id}/{status}', [QuangcaoController::class, 'getChance'])->name('admin.quangcao.getChance');
    });
    Route::group(['prefix' => 'tuyendung'], function () {
        Route::get('/', [TuyendungController::class, 'getList'])->name('admin.tuyendung.list');
        Route::get('/add', [TuyendungController::class, 'getAdd'])->name('admin.tuyendung.getAdd');
        Route::get('/edit/{id}', [TuyendungController::class, 'getEdit'])->name('admin.tuyendung.getEdit');
        Route::get('/delete/{id}', [TuyendungController::class, 'getDelete'])->name('admin.tuyendung.getDelete');
        Route::post('/post-add', [TuyendungController::class, 'postAdd'])->name('admin.tuyendung.postAdd');
        Route::post('/post-edit/{id}', [TuyendungController::class, 'postEdit'])->name('admin.tuyendung.postEdit');
    });
    Route::group(['prefix' => 'khuyenmai'], function () {
        Route::get('/', [KhuyenmaiController::class, 'getList'])->name('admin.khuyenmai.list');
        Route::get('/add', [KhuyenmaiController::class, 'getAdd'])->name('admin.khuyenmai.getAdd');
        Route::get('/edit/{id}', [KhuyenmaiController::class, 'getEdit'])->name('admin.khuyenmai.getEdit');
        Route::get('/delete/{id}', [KhuyenmaiController::class, 'getDelete'])->name('admin.khuyenmai.getDelete');
        Route::post('/post-add', [KhuyenmaiController::class, 'postAdd'])->name('admin.khuyenmai.postAdd');
        Route::post('/post-edit/{id}', [KhuyenmaiController::class, 'postEdit'])->name('admin.khuyenmai.postEdit');
    });
    Route::group(['prefix' => 'thongke'], function () {
        Route::get('/', [ThongkeController::class, 'getList'])->name('admin.thongke.list');
        Route::get('/thongkedt', [ThongkeController::class, 'getDoanhThu'])->name('admin.thongke.doanhthu');
        Route::post('/thongkedt1', [ThongkeController::class, 'getDoanhThuThang'])->name('admin.thongke.doanhthu1');
        Route::get('/thongkedt2', [ThongkeController::class, 'getDoanhThuThang1'])->name('admin.thongke.doanhthu2');
        Route::get('/thongkenh', [ThongkeController::class, 'getNhapHang1'])->name('admin.thongke.nhaphang1');
        Route::post('/thongkenh1', [ThongkeController::class, 'getNhapHangThang1'])->name('admin.thongke.nhaphangt1');
        Route::get('/thongkenh2', [ThongkeController::class, 'getNhapHangThang2'])->name('admin.thongke.nhaphangt2');
        Route::get('/nhapvao', [ThongkeController::class, 'getNhapvao'])->name('admin.thongke.nhapvao');
        Route::get('/banra', [ThongkeController::class, 'getBanra'])->name('admin.thongke.banra');
        Route::get('/hienco', [ThongkeController::class, 'getHienco'])->name('admin.thongke.hienco');
        Route::get('/doitra', [ThongkeController::class, 'getDoitra'])->name('admin.thongke.doitra');
        Route::get('/nhaphang', [ThongkeController::class, 'getNhaphang'])->name('admin.thongke.getNhaphang');
        Route::get('/banchay', [ThongkeController::class, 'getBanchay'])->name('admin.thongke.banchay');
        Route::get('/tonnhieu', [ThongkeController::class, 'getTonnhieu'])->name('admin.thongke.tonnhieu');
        Route::get('/hethan', [ThongkeController::class, 'getHethan'])->name('admin.thongke.hethan');
        Route::get('/conhan', [ThongkeController::class, 'getConhan'])->name('admin.thongke.conhan');
    });
});

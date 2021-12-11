@extends('backend.master')
@section('title')
    <h3 class="page-header">
        Đơn hàng nhập /
        <a href="{!! URL::route('admin.lohang.getNhaphang1') !!}" class="btn btn-info" style="margin-top:-8px;">Nhập hàng</a>
    </h3>
@stop
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <b><i>Danh sách đơn hàng nhập</i></b>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="dataTable_wrapper">

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tên nhà cung cấp</th>
                            <th>Thời gian nhập hàng</th>
                            <th>Tổng tiền</th>
                            <th>Tình trạng</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr class="even gradeC" align="center">
                                <td>{!! $item->id !!}</td>
                                <td style="width:200px">
                                    {{ $item->nhacungcap->nhacungcap_ten }}
                                </td>
                                <td>{!! date('H:m:s d-m-Y', strtotime("$item->created_at")) !!}</td>
                                <td>{!! number_format("$item->donhangnhap_tong_tien", 0, ',', '.') !!} vnđ </td>
                                <td>
                                    @if ($item->donhangnhap_tinh_trang==0)
                                        Chưa  thanh toán
                                    @else
                                        Đã thanh toán
                                    @endif
                                </td>

                                <td class="center">
                                    <a href="{!! URL::route('admin.lohang.getEdit', $item->id ) !!}" type="button" class="btn btn-primary"
                                        data-toggle="tooltip" data-placement="left" title="Cập nhât Đơn hàng">
                                        <i class="fa fa-crosshairs"></i>
                                    </a>
                                    <a href="{!! URL::route('admin.lohang.pdf', $item->id) !!}" type="button" class="btn btn-default"
                                        data-toggle="tooltip" data-placement="left" title="In hóa đơn">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </td>
                            </tr>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
    </div>
@stop

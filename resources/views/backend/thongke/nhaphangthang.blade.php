@extends('backend.master')
@section('title')
    <h3 class="page-header ">
        Thống kê nhập hàng theo tháng /

    </h3>
@stop
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <b><i>Thống kê sản phẩm nhập theo tháng</i></b>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Kí hiệu</th>
                            <th>Tên</th>
                            <th>ĐVT</th>
                            <th>Số lượng nhập</th>
                            <th>Tổng tiền nhập</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr class="odd gradeX" align="left">
                                <td>{{ $item->sanpham_ky_hieu }}</td>
                                <td>{{ $item->sanpham_ten }}</td>
                                <td>{{ $item->donvitinh_ten }}</td>
                                <td>{{ $item->soluong }}</td>
                                <td>{!! number_format($item->tongtien, 0, ',', '.') !!} vnđ</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
    </div>

@stop

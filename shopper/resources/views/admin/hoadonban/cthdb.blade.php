@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Chi tiết đơn bán</h3>
            <div class="table-data__tool">
                <div class="header-wrap">
               
            </div>
            </div>
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                        <tr>

                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Size</th>
                            <th>Màu sắc</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hdb as $sp)
                        <tr class="tr-shadow">
                            <div class="mb-5">
                                <td>{{$loop->index+1}}</td>
                                <td>{{$sp->sanpham->TenSP}}</td>
                                @foreach($size as $s)
                                @if($s->id==$sp->size)
                                <td>{{$s->TenSize}}</td>
                                @endif
                                @endforeach
                                <td>{{$sp->color}}</td>
                                <td>{{$sp->soluong}}</td>
                                <td>{{$sp->TongTien}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-2">
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>
</div>

@endsection
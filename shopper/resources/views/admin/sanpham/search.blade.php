@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">data table</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-right">
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>add item</button>
                </div>
            </div>
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                        <tr>

                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Giá</th>
                            <th>Loại</th>
                            <th>Thương hiệu</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sanpham as $sp)
                            <tr class="tr-shadow">
                                <div class="mb-5">
                                <td>{{$sp->TenSP}}</td>
                                <td><img style="width:60px; height:80px;" src="{{asset('images/'.$sp->Anh)}}" alt=""></td>
                                <td>{{$sp->Gia}}</td>
                                <td>{{$sp->loai->TenLoai}}</td>
                                <td>{{$sp->ThuongHieu}}</td>
                                <td>
                                    <div class="table-data-feature">
                                        <a href="{{route('updatesp',['id'=>$sp->id])}}"><button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                        </a>
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                            <i class="zmdi zmdi-more"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>
</div>

@endsection
@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Sản phẩm</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-right">
                    <a href="{{route('addsp')}}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class=""></i>add item</button></a>
                </div>
                <div class="header-wrap">
                <form class="form-header" action="{{route('searchSP')}}" method="POST">
                    @csrf
                    <input class="au-input au-input--xl" type="text" name="keyword" placeholder="Search for datas &amp; reports..." />
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form>
               
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
                                        <a href="{{route('updatesp',['id'=>$sp->id])}}"><button class="item mr-2" data-toggle="tooltip" data-placement="top" title="Product">
                                                <i class="zmdi zmdi-apps"></i>
                                            </button>
                                        <a href="{{route('updatesl',['id'=>$sp->id])}}"><button class="item mr-2" data-toggle="tooltip" data-placement="top" title="Quantity">
                                                <i class="zmdi zmdi-n-1-square"></i>
                                            </button>
                                        </a>
                                        
                                        <a href="{{route('themsize',['id'=>$sp->id])}}">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Add">
                                            <i class="zmdi zmdi-plus-circle"></i>
                                        </button>
                                        </a>
            
                                    </div>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-2">
                {{$sanpham->links()}}
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>
</div>

@endsection
@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Size Sản Phẩm</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-right">
                    <a href="{{route('adds')}}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class=""></i>add item</button></a>
                </div>
                <div class="header-wrap">
                <form class="form-header" action="{{route('searchSize')}}" method="POST">
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

                            <th>STT</th>
                            <th>Tên Size</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($size as $sp)
                        <tr class="tr-shadow">
                            <div class="mb-5">
                                <td>{{$loop->index+1}}</td>
                                <td>{{$sp->TenSize}}</td>
                                <td>
                                    <div class="table-data-feature">
                                        <a href="{{route('updateS',['id'=>$sp->id])}}"><button class="item mr-2" data-toggle="tooltip" data-placement="top" title="">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                        </a>
    
                                        <a href="{{route('deletelS',['id'=>$sp->id])}}">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="">
                                            <i class="zmdi zmdi-delete"></i>
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
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>
</div>

@endsection
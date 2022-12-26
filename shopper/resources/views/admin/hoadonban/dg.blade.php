@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Đánh giá</h3>
            <div class="table-data__tool">
                <div class="header-wrap">
                    <form class="form-header" action="{{route('searchhdb')}}" method="POST">
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
                            <th>Tên Khách hàng</th>
                            <th>Nội dung</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($danhgia as $sp)
                        <tr class="tr-shadow">
                            <div class="mb-5">
                                <td>{{$loop->index+1}}</td>
                                <td>{{$sp->users->name}}</td>
                                <td>{{$sp->NoiDung}}</td>
                                <td>
                                    <form action="{{route('updatedg',['id'=>$sp->id])}}">
                                    <select name="dg" id="cars">
                                        @for($i=0;$i<=1;$i++)
                                        <option value="{{$i}}" @if($sp->Duyet==$i) selected @endif)>
                                        @if($i==0)
                                        Ẩn
                                        @else
                                        Hiện
                                        @endif
                                        </option>
                                        @endfor
                                    </select>
                                    <button type="submit" class="btn btn-primary">Trạng thái</button>
                                    </form>
                                </td>
                                <td><a class="text-danger" href="{{route('deletedg',['id'=>$sp->id])}}">xóa</a></td>
                                
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
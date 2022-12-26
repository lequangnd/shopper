@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Hóa đơn bán</h3>
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
                            <th>Ngày đặt</th>
                            <th>Tổng tiền</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </form>
                        @foreach($hdb as $sp)
                        <tr class="tr-shadow">
                            <div class="mb-5">
                                <td>{{$loop->index+1}}</td>
                                <td>{{$sp->users->name}}</td>
                                <td>{{$sp->NgayDat}}</td>
                                <td>{{$sp->TongTien}}</td>
                                <td><a href="{{route('cthdb',['id'=>$sp->id])}}">Chi tiết</a></td>
                                <td>
                                    <form action="{{route('updateTH',['id'=>$sp->id])}}">
                                    <select name="TrangThai" id="cars">
                                        @foreach($trangthai as $tt)
                                        <option value="{{$tt->id}}" @if($tt->id==$sp->TrangThai_id) selected @endif)>{{$tt->TenTH}}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-sm">Trạng thái</button>
                                    </form>
                                </td>
                                <td><a class="text-primary  " href="{{route('pdf',['id'=>$sp->id])}}">PDF</a></td>
                                <td><a class="text-danger" href="{{route('deleterhdbuser',['id'=>$sp->id])}}">Hủy</a></td>
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
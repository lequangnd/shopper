@extends('admin.layouts.master')
@section('content')
<div class="container">
    <form method="post" action="{{route('updatesanpham',['id'=>$sanpham->id])}}">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                    <input type="text" name="TenSP" value="{{$sanpham->TenSP}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="cars">Chọn loại sản phẩm</label><br />
                    <select name="Loai" id="cars">
                        @foreach($loai as $l)
                        <option value="{{$l->id}}" @if($l->id==$sanpham->loai_id) selected @endif>{{$l->TenLoai}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Thương hiệu</label>
                    <input type="text" name="ThuongHieu" value="{{$sanpham->ThuongHieu}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Giá</label>
                    <input type="text" name="Gia" value="{{$sanpham->Gia}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Giá bán</label>
                    <input type="text" name="GiaBan" value="{{$sanpham->GiaBan}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
            </div>

            <div class="col-6">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ảnh</label><br />
                    <input type="file" value="{{$sanpham->Anh}}" name="Anh" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Màu sắc</label>
                    <input type="text" name="MauSac" value="{{$sanpham->MauSac}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Thời trang Nam/Nữ</label>
                    <select name="Fashion" id="">
                        @if($sanpham->Fashion) selected
                        <option value="0">Nam</option>
                        @else
                        <option value="1">Nữ</option>
                        @endif
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nhà cung cấp</label>
                    <select name="ncc" id="">
                        @foreach($ncc as $n)
                        <option value="{{$n->id}}" @if($n->id==$sanpham->nhacungcap_id) selected @endif>{{$n->TenNCC}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                    <textarea class="form-control" name="MoTa" id="exampleFormControlTextarea1" rows="3">{{$sanpham->MoTa}}</textarea>
                </div>
            </div>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
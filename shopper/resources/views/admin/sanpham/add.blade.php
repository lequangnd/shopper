@extends('admin.layouts.master')
@section('content')
<div class="container">
    <form method="post" action="{{route('addsp')}}">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                    <input type="text" name="TenSP" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                <label for="cars">Chọn loại sản phẩm</label><br/>
                <select name="Loai" id="cars">
                   @foreach($loai as $l)
                    <option value="{{$l->id}}">{{$l->TenLoai}}</option>
                    @endforeach
                </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Thương hiệu</label>
                    <input type="text" name="ThuongHieu" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Giá nhập</label>
                    <input type="text" name="Gia" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Giá bán</label>
                    <input type="text" name="GiaBan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                
            </div>

            <div class="col-6">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ảnh</label><br/>
                    <input type="file" name="Anh" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Màu sắc</label>
                    <input type="text" name="MauSac" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Thời trang Nam/Nữ</label>
                    <select name="Fashion" id="">
                        <option value="0">Nam</option>
                        <option value="1">Nữ</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nhà cung cấp</label>
                    @foreach($ncc as $n)
                    <select name="ncc" id="">
                    <option value="{{$n->id}}">{{$n->TenNCC}}</option>
                    </select>
                    @endforeach
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                    <textarea class="form-control" name="MoTa"  id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
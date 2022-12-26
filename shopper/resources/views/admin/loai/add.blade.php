@extends('admin.layouts.master')
@section('content')
<div class="container">
    <form method="post" action="{{route('addLoais')}}">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên Loại</label>
                    <input type="text" name="TenLoai" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
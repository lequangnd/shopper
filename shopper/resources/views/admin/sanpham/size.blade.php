@extends('admin.layouts.master')
@section('content')
<div class="container">
    <form method="post" action="{{route('addsize',['id'=>$id ,'hdn'=>$hdn])}}">
        @csrf
        <div class="row">
            <div class="col-6">
                
                <div class="mb-3">
                <label for="cars">Chọn size sản phẩm</label><br/>
                <select name="Size" id="cars">
                   @foreach($size as $s)
                    <option value="{{$s->id}}">{{$s->TenSize}}</option>
                    @endforeach
                </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Số lượng</label>
                    <input type="text" name="sl" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <button type="submit" name="continue" class="btn btn-primary">continue</button>
    </form>
</div>
@endsection
@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            @foreach($ct as $c)
            <form method="post" action="{{route('updateSLs',['id'=>$c->id])}}">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="cars">Chọn size sản phẩm</label><br />
                            <select name="size" id="cars" disabled>
                                @foreach($size as $s)
                                <option value="{{$s->id}}" @if($c->size_id==$s->id) selected @endif>{{$s->TenSize}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Số lượng</label>
                            <input type="text" name="sl" value="{{$c->SoLuong}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
            @endforeach
        </div>

        
    </div>
</div>
@endsection
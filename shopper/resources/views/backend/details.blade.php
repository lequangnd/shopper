@extends('backend.layouts.master')
@section('content')
<!-- Topbar Start -->
<div class="container-fluid">
    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{asset('images/'.$details->Anh)}}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{$details->TenSP}}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(50 Reviews)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">{{$details->GiaBan}}</h3>


                <form method="post" action="{{route('add-cart-details',['id'=>$details->id])}}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$details->id}}">
                    <p class="mb-4">{{$details->MoTa}}</p>
                    <div class="d-flex mb-3">
                        <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>

                        @foreach($size as $s)
                        <div class="custom-control custom-radio custom-control-inline  @error('size') is-invalid @enderror">
                            <input type="radio" class="custom-control-input" id="size-{{$loop->index}}" name="size" value="{{$s->size_id}}">
                            <label class="custom-control-label" for="size-{{$loop->index}}">{{$s->size->TenSize}}</label>
                        </div>
                        @endforeach
                        @error('size')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror


                    </div>
                    <div class="d-flex mb-4">
                        <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                        <?php $color = explode(",", $details->MauSac) ?>

                        @foreach($color as $c)
                        <div class="custom-control custom-radio custom-control-inline  @error('color') is-invalid @enderror">
                            <input type="radio" class="custom-control-input" id="color-{{$loop->index}}" name="color" value="{{$c}}">
                            <label class="custom-control-label" for="color-{{$loop->index}}">{{$c}}</label>
                        </div>
                        @endforeach
                        @error('color')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        

                    </div>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" name="quantity" class="form-control bg-secondary text-center" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus" type="button">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        @if(Auth::check())
                        <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                        @else
                        <a href="{{route('login')}}" class="btn btn-primary px-3"> Add To Cart</a>
                        @endif
                    </div>
                </form>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Đánh giá</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        @foreach($dg as $d)
                        @if($d->Duyet==1)
                        <span class="text-primary">{{$d->users->name}}: &nbsp</span>{{$d->NoiDung}}</br>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->
    <!-- Footer Start -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function()
    {
        $(".btn-plus").click(function()
        {

        })
    });
</script>
@endsection
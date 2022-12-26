@extends('backend.layouts.master')
@section('content')
<!-- Cart Start -->
<div class="container-fluid pt-5 cart-backend" data-url="{{route('delete-cart')}}">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0 update-cart-url" data-url="{{route('update-cart')}}">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Image</th>
                        <th>Products</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @if($carts !=null)
                    @foreach($carts as $c)
                    <tr>
                        <td class="align-middle"><img src="{{asset('images/'.$c['image'])}}" alt="" style="width: 50px;"></td>
                        <td class="align-middle">{{$c['name']}}</td>
                        @foreach($size as $s)
                        @if($s->id == $c['size'])
                        <td class="align-middle">{{$s->TenSize}}</td>
                        @endif
                        @endforeach
                        <td class="align-middle">{{$c['color']}}</td>
                        <td class="align-middle price">{{$c['price']}}</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-minus " data-price="{{$c['price']}}">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" name="sl" class="form-control form-control-sm bg-secondary text-center quantity id-{{$c['id']}}" value="{{$c['quantity']}}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-plus" data-id="{{$c['id']}}" data-price="{{$c['price']}}">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle money total-{{$c['id']}}">
                            <?php
                            if ($c == null) {
                                echo "";
                            }
                            $tt = $c['quantity'] * $c['price'];
                            echo $tt;
                            ?>
                        </td>
                        <td class="align-middle">
                            <a href=""><button class="btn btn-sm btn-primary update-cart" data-id="{{$c['id']}}"><i class="fa fa-edit"></i></button></a>
                            <a href=""><button class="btn btn-sm btn-primary delete-cart" data-id="{{$c['id']}}"><i class="fa fa-times"></i></button></a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Thông Tin Đơn Hàng</h4>
                </div>
                <div class="card-body">
                </div>
                <form method="post" action="{{route('order')}}">
                    @csrf
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold" id="">Tổng tiền</h5>
                            <p class="font-weight-bold text-dark tt">
                                <?php
                                $tt = 0;
                                $cart = session()->get('cart');
                                if ($cart != null) {
                                    foreach ($cart as $c) {
                                        $tt += $c['price'] * $c['quantity'];
                                    }
                                }
                                echo $tt;
                                ?>
                            </p>
                        </div>
                        <input type="text" name="DiaChi" value="{{Auth::user()->DiaChi}}" class="form-control p-4" placeholder="Địa chỉ giao hàng">
                        <button class="btn btn-block btn-primary my-3 py-3" id="order">Đặt hàng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <h5 class="font-weight-bold" id="dem"></h5>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function updatecart(e) {
        e.preventDefault();
        var id = $(this).data("id");
        var url = $(".update-cart-url").data("url");
        var quantity = $(this).parents("tr").find("input.quantity").val();
        $.ajax({
            type: "Get",
            url: url,
            data: {
                id: id,
                quantity: quantity
            },
            success: function(data) {
                swal("Cập nhật thành công", "", "success");
            },
            error: function() {

            }
        });
    }

    function deletecart(e) {
        e.preventDefault();
        var url = $(".cart-backend").data("url");
        var id = $(this).data("id");
        $.ajax({
            type: "Get",
            url: url,
            data: {
                id: id
            },
            success: function(data) {
                swal("Xóa thành công", "", "success").then(function()
                {
                    $(".update-cart-url").html(data);
                });
            },
            error: function() {

            },
        });
    }


    $(document).ready(function() {

        $(".btn-plus").click(function(e) {
            var id = parseInt($(this).data("id"));
            var quantity = parseInt($(".id-" + id).val());
            var price = parseInt($(this).data("price"));
            var money = quantity * price;
            $(".total-" + id).text(money);
            var total = 0;
            $(".money").each(function() {
                total += parseInt($(this).text());
            });
            $(".tt").text(total);
        })
        $(".btn-minus").click(function() {
            var quantity = parseInt($(this).parents("tr").find("input.quantity").val());
            var price = parseInt($(this).data("price"));
            var money = quantity * price;
            $(this).parents("tr").find("td.money").text(money);
            var total = 0;
            $(".money").each(function() {
                total += parseInt($(this).text());
            });
            $(".tt").text(total);
        })

        $(".update-cart").click(updatecart);
        $(".delete-cart").click(deletecart);

    });
</script>
@endsection
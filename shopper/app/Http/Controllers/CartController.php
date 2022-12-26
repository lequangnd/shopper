<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateRequest;
use App\Models\Chitiethoadonban;
use App\Models\Chitietsize;
use App\Models\Hoadonban;
use App\Models\Loai;
use App\Models\Sanpham;
use App\Models\Size;
use DateTime;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class CartController extends Controller
{
    public function __construct()
    {
        $category = Loai::all();
        View::share('category', $category);
    }

    public function show_cart()
    {
        $cartContent = session()->get('cart');
        $size = Size::all();
        return view('backend.cart', ['carts' => $cartContent, 'size' => $size]);
    }

    public function addcart($id)
    {
        $product = Sanpham::find($id);
        //$cart=array();
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->TenSP,
                'price' => $product->GiaBan,
                'quantity' => 1,
                'image' => $product->Anh,
                'size' => 1,
                'color' => 'Trắng',

            ];
        }
        session()->put('cart', $cart);
    }

    public function updatecart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $carts);
            $carts = session()->get('cart');
        }
    }

    public function addcartDetails(Request $request, $id)
    {
        $product = Sanpham::find($id);
        //$cart=array();
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + $request->quantity;
        } else {
            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->TenSP,
                'price' => $product->GiaBan,
                'quantity' => $request->quantity,
                'image' => $product->Anh,
                'size' => $request->size,
                'color' => $request->color,

            ];
        }
        session()->put('cart', $cart);
        print_r(session()->get('cart'));
        return redirect()->route('cart');
    }

    public function deletecart(Request $request)
    {
        if ($request->id) {
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            $carts = session()->get('cart');
        }
    }

    public function order(Request $request)
    {
        $content = session()->get('cart');
        $data['users_id'] = Auth::user()->id;
        $data['NgayDat'] = new DateTime();
        $data['DiaChi'] = $request->input('DiaChi');
        $tt=0;
        foreach($content as $c)
        {
            $tt +=$c['quantity'] * $c['price'];
        }
        $data['TongTien'] = $tt;
        $data['TrangThai_id'] = '1';
        $hdb = Hoadonban::insertGetId($data);
        foreach ($content as $c) {
            $data_details['hoadonban_id'] = $hdb;
            $data_details['sanpham_id'] = $c['id'];
            $data_details['SoLuong'] = $c['quantity'];
            $data_details['size'] = $c['size'];
            $data_details['color'] = $c['color'];
            $data_details['TongTien'] = $c['quantity'] * $c['price'];
            Chitiethoadonban::insert($data_details);
            $ctsize = Chitietsize::where('sanpham_id', $c['id'])->where('size_id', $c['size'])->get();
            foreach ($ctsize as $sl) {
                $soluong = $sl->SoLuong  - $c['quantity'];
                $sl->SoLuong = $soluong;
                $sl->save();
            }
        }
        session()->forget('cart');
        return redirect()->route('index');
    }
}

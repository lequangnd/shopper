<?php

namespace App\Http\Controllers;

use App\Models\Chitietsize;
use App\Models\Danhgia;
use App\Models\Loai;
use App\Models\Sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BackendController extends Controller
{
    public function __construct()
    {
        $category=Loai::all();
        View::share('category',$category);
    }

    public function index()
    {
        $sanpham=Sanpham::all();
        return view('backend.index',['sanpham'=>$sanpham]);
    }

    public function details($id)
    {
        $details=Sanpham::find($id);
        $size=Chitietsize::where('sanpham_id',$id)->get();
        $danhgia=Danhgia::all();
        return view('backend.details',['details'=>$details, 'size'=>$size,'dg'=>$danhgia]);
    }

    public function category($id,Request $request)
    {
        $fashion=$request->get('fashion',null);
        $category=Loai::find($id);
        $product=$category->sanpham;
        if($fashion!=null)
        {
            $product=$category->sanpham()->where('fashion',$fashion)->get();
        }
        return view('backend.category',['product'=>$product, 'categories'=>$category]);

    }

    public function search(Request $request)
    {
        $key=$request->input('keyword',"");
        $search=Sanpham::where('TenSP','like','%'.$key.'%')->get();
        return view('backend.search',['search'=>$search]);
    }
}

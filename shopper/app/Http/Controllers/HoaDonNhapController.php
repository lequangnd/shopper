<?php

namespace App\Http\Controllers;

use App\Models\Chitiethoadonnhap;
use App\Models\Hoadonnhap;
use App\Models\Size;
use Illuminate\Http\Request;

class HoaDonNhapController extends Controller
{
    public function hdn()
    {
        $hoadonnhap = Hoadonnhap::all();
        return view('admin.hoadonban.hdn', ['hdn' => $hoadonnhap]);
    }

    public function cthdn($id)
    {
        $hoadonnhap = Hoadonnhap::find($id);
        $cthdn=Chitiethoadonnhap::where('hoadonnhap_id',$hoadonnhap->id)->get();
        $size=Size::all();
        return view('admin.hoadonban.cthdn', ['hdn' => $cthdn,'size'=>$size]);
    }
}

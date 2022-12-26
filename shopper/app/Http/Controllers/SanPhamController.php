<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sanpham;
use App\Models\Chitietsize;
use App\Models\Hoadonnhap;
use App\Models\Chitiethoadonnhap;
use App\Models\Loai;
use App\Models\Nhacungcap;
use App\Models\Size;
use DateTime;
use RealRashid\SweetAlert\Facades\Alert;

class SanPhamController extends Controller
{
    public function index()
    {
        $sanpham = Sanpham::paginate(5);
        return view('admin.sanpham.index', ['sanpham' => $sanpham]);
    }

    public function add()
    {
        $loai = Loai::all();
        $size = Size::all();
        $ncc = Nhacungcap::all();
        return view('admin.sanpham.add', ['loai' => $loai, 'size' => $size, 'ncc' => $ncc]);
    }
    public function addSP(Request $request)
    {
        $sanpham = new Sanpham;
        $sanpham->TenSP = $request->input('TenSP');
        $sanpham->loai_id = $request->input('Loai');
        $sanpham->ThuongHieu = $request->input('ThuongHieu');
        $sanpham->Gia = $request->input('Gia');
        $sanpham->GiaBan = $request->input('GiaBan');
        $sanpham->Anh = $request->input('Anh');
        $sanpham->MauSac = $request->input('MauSac');
        $sanpham->Fashion = $request->input('Fashion');
        $sanpham->MoTa = $request->input('MoTa');
        $sanpham->nhacungcap_id = $request->input('ncc');
        $sanpham->save();
        $hoadonnhap = new Hoadonnhap;
        $hoadonnhap->ncc = $sanpham->nhacungcap->TenNCC;
        $hoadonnhap->ngaynhap = new DateTime();
        $hoadonnhap->TongTien = '0';
        $hoadonnhap->save();
        $hdn = $hoadonnhap->id;
        return redirect()->route('size', [$sanpham->id, $hdn]);
    }

    public function size($id, $hdn)
    {
        $size = Size::all();
        return view('admin.sanpham.size', ['size' => $size, 'id' => $id, 'hdn' => $hdn]);
    }
    public function addsize(Request $request, $id, $hdn)
    {
        $sanpham = Sanpham::find($id);
        $hoadonnhap = Hoadonnhap::find($hdn);
        $size = new Chitietsize;
        $ctsize = Chitietsize::where('sanpham_id', $sanpham->id)->get();
        foreach ($ctsize as $ct) {
            if ($ct->size_id == $request->Size) {
                alert()->info('', 'Size này đã tồn tại trong sản phẩm này');
                return redirect()->route('size', [$sanpham->id, $hoadonnhap->id]);
            }
        }
        $size->size_id = $request->input('Size');
        $size->sanpham_id = $id;
        $size->SoLuong = $request->input('sl');
        $size->save();
        $cthdn = new Chitiethoadonnhap;
        $cthdn->sanpham_id = $sanpham->id;
        $cthdn->hoadonnhap_id = $hdn;
        $cthdn->Size = $size->size->TenSize;
        $cthdn->SoLuong = $size->SoLuong;
        $cthdn->Gia = $sanpham->Gia;
        $Tongtien = $size->SoLuong * $cthdn->Gia;
        $cthdn->TongTien = $Tongtien;
        $cthdn->save();
        $tt = $hoadonnhap->TongTien + $cthdn->TongTien;
        $hoadonnhap->TongTien = $tt;
        $hoadonnhap->save();
        if ($request->exists('continue')) {
            Alert::success('', 'Thêm thành công');
            return redirect()->route('size', [$sanpham->id, $hoadonnhap->id]);
        }
        Alert::success('', 'Thêm thành công');
        return redirect()->route('sp');
    }

    public function update($id)
    {
        $sanpham = Sanpham::find($id);
        $ncc = Nhacungcap::all();
        $loai = Loai::all();
        return view('admin.sanpham.update', ['sanpham' => $sanpham, 'ncc' => $ncc, 'loai' => $loai]);
    }

    public function updateSP(Request $request, $id)
    {
        $sanpham = Sanpham::find($id);
        $sanpham->TenSP = $request->input('TenSP');
        $sanpham->loai_id = $request->input('Loai');
        $sanpham->ThuongHieu = $request->input('ThuongHieu');
        $sanpham->Gia = $request->input('Gia');
        $sanpham->GiaBan = $request->input('GiaBan');
        $sanpham->Anh = $request->input('Anh');
        $sanpham->MauSac = $request->input('MauSac');
        $sanpham->Fashion = $request->input('Fashion');
        $sanpham->MoTa = $request->input('MoTa');
        $sanpham->nhacungcap_id = $request->input('ncc');
        $sanpham->save();
        return redirect()->route('sp');
    }


    public function updatesl($id)
    {
        $size = Size::all();
        $ct = Chitietsize::where('sanpham_id', $id)->get();
        return view('admin.sanpham.updatesl', ['size' => $size, 'ct' => $ct]);
    }

    public function updateSLs(Request $request, $id)
    {
        $cts = Chitietsize::find($id);
        $cts->SoLuong = $request->input('sl');
        $cts->save();
        $cthdn = Chitiethoadonnhap::where('Size', $cts->size->TenSize)->where('sanpham_id', $cts->sanpham_id)->get();
        foreach ($cthdn as $ct) {
            $ct->SoLuong = $cts->SoLuong;
            $Tongtien = $cts->SoLuong * $ct->Gia;
            $ct->TongTien = $Tongtien;
            $ct->save();
        }
        $cthdn1 = Chitiethoadonnhap::where('sanpham_id', $cts->sanpham_id)->get();
        $tt = 0;
        foreach ($cthdn1 as $ct1) {
            $tt += $ct1->TongTien;
            $hdn = Hoadonnhap::where('id', $ct1->hoadonnhap_id)->get();
            foreach ($hdn as $h) {
                $h->TongTien = $tt;
                $h->save();
            }
        }
        return redirect()->route('sp');
    }

    public function themsize($id)
    {
        $size = Size::all();
        return view('admin.sanpham.themsize', ['size' => $size, 'id' => $id]);
    }

    public function themsizes(Request $request, $id)
    {
        $sanpham = Sanpham::find($id);
        $ctsize = new Chitietsize;
        $check = Chitietsize::where('sanpham_id', $sanpham->id)->get();
        foreach ($check as $ch) {
            if ($ch->size_id == $request->Size) {
                alert()->info('', 'Size này đã tồn tại trong sản phẩm này');
                return redirect()->route('themsize', $sanpham->id);
            }
        }
        $ctsize->sanpham_id = $id;
        $ctsize->size_id = $request->input('Size');
        $ctsize->SoLuong = $request->input('sl');
        $ctsize->save();
        $cthdn = Chitiethoadonnhap::where('sanpham_id', $id)->get();
        foreach ($cthdn as $ct) {
            $id_hdn = $ct->hoadonnhap_id;
        }
        $cthdn = new Chitiethoadonnhap;
        $cthdn->sanpham_id = $id;
        $cthdn->hoadonnhap_id = $id_hdn;
        $cthdn->Size = $ctsize->size->TenSize;
        $cthdn->SoLuong = $ctsize->SoLuong;
        $cthdn->Gia = $sanpham->Gia;
        $Tongtien = $cthdn->SoLuong * $cthdn->Gia;
        $cthdn->TongTien = $Tongtien;
        $cthdn->save();
        $cthdn1 = Chitiethoadonnhap::where('sanpham_id', $id)->get();
        $tt = 0;
        foreach ($cthdn1 as $ct1) {
            $tt += $ct1->TongTien;
            $hdn = Hoadonnhap::where('id', $ct1->hoadonnhap_id)->get();
            foreach ($hdn as $h) {
                $h->TongTien = $tt;
                $h->save();
            }
        }
        Alert::success('', 'Thêm thành công');
        return redirect()->route('sp');
    }

    public function searchSP(Request $request)
    {
        $key = $request->input('keyword', "");
        $sanpham = Sanpham::where('TenSP', 'like', '%' . $key . '%')->paginate(5);
        return view('admin.sanpham.index', ['sanpham' => $sanpham]);
    }
}

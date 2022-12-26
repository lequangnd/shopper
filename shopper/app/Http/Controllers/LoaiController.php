<?php

namespace App\Http\Controllers;

use App\Models\Loai;
use Illuminate\Http\Request;

class LoaiController extends Controller
{
    public function index()
    {
        $loai = Loai::all();
        return view('admin.loai.index', ['loai' => $loai]);
    }

    public function addLoai(Request $request)
    {
        $loai =new Loai;
        $loai->TenLoai=$request->input('TenLoai');
        $loai->save();
        return redirect()->route('loai');
    }

    public function add()
    {
        return view('admin.loai.add');
    }

    public function update($id)
    {
        $loai = Loai::find($id);
        return view('admin.loai.update', ['loai' => $loai]);
    }

    public function updateLoai(Request $request,$id)
    {
        $loai = Loai::find($id);
        $loai->TenLoai=$request->input('TenLoai');
        $loai->save();
        return redirect()->route('loai');
    }

    public function delete($id)
    {
        $loai=Loai::find($id);
        $loai->delete();
        return redirect()->route('loai');
    }

    public function searchLoai(Request $request)
    {
        $key=$request->input('keyword',"");
        $Loai=Loai::where('TenLoai','like','%'.$key.'%')->get();
        return view('admin.loai.index',['loai'=>$Loai]);
    }
}

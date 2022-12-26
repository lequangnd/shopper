<?php

namespace App\Http\Controllers;

use App\Models\Chitiethoadonban;
use App\Models\Danhgia;
use App\Models\Hoadonban;
use App\Models\Hoadonnhap;
use App\Models\Size;
use App\Models\Trangthai;
use App\Models\User;
use Barryvdh\DomPDF\Facade\PDF;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HoaDonBanController extends Controller
{
    public function index()
    {
        $hoadonban = Hoadonban::all();
        $trangthai=Trangthai::all();
        return view('admin.hoadonban.index', ['hdb' => $hoadonban,'trangthai'=>$trangthai]);
    }

    public function searchHDB(Request $request)
    {
        $key=$request->input('keyword',"");
        $user=User::where('name','like','%'.$key.'%')->first();
        $hoadonban=Hoadonban::all();
        $trangthai=Trangthai::all();
        return view('admin.hoadonban.seachhdb',['user'=>$user, 'hdb'=>$hoadonban, 'trangthai'=>$trangthai]);
    }

    public function cthdb($id)
    {
        $hoadonban = Hoadonban::find($id);
        $cthb=Chitiethoadonban::where('hoadonban_id',$hoadonban->id)->get();
        $size=Size::all();
        return view('admin.hoadonban.cthdb', ['hdb' => $cthb,'size'=>$size]);
    }

    public function HDBuser()
    {
        $user=Auth::user()->id;
        $hoadonban = Hoadonban::where('users_id',$user)->get();
        return view('admin.hoadonban.hdbuser', ['hdb' => $hoadonban]);
    }

    public function delete($id)
    {
        $hoadonban=Hoadonban::find($id);
        $hoadonban->delete();
        return redirect()->route('hdbuser');
    }

    public function updateTH(Request $request,$id)
    {
        $hoadonban=Hoadonban::find($id);
        $hoadonban->TrangThai_id=$request->input('TrangThai');
        $hoadonban->save();
        return redirect()->route('hdb');
    }

    public function thongke()
    {
        $c=Carbon::now();
        $user=User::all();
        $hdb=Hoadonban::all();
        $hd=Hoadonban::whereMonth('NgayDat',$c->month)->get();
        return view('admin.hoadonban.thongke',['user'=>$user,'hdb'=>$hdb,'hd'=>$hd]);
    }

    public function thongkePost(Request $request)
    {
        $date=$request->input('date');
        $user=User::whereMonth('created_at',$date)->get();
        $hdb=Hoadonban::all();
        $hd=Hoadonban::whereMonth('NgayDat',$date)->get();
        return view('admin.hoadonban.thongke',['user'=>$user,'hdb'=>$hdb,'hd'=>$hd]);
    }

    public function danhgia()
    {
        return view('admin.hoadonban.danhgia');
    }

    public function danhgiaPost(Request $request)
    {
        $danhgia=new Danhgia;
        $danhgia->users_id=Auth::user()->id;
        $danhgia->NoiDung=$request->input('danhgia');
        $danhgia->Duyet='0';
        $danhgia->save();
        return redirect()->route('index');
    }

    public function dg()
    {
        $danhgia=Danhgia::all();
        return view('admin.hoadonban.dg',['danhgia'=>$danhgia]);
    }

    public function updatedg(Request $request,$id)
    {
        $danhgia=Danhgia::find($id);
        $danhgia->duyet=$request->input('dg');
        $danhgia->save();
        return redirect()->route('dg');
    }

    public function deletedg($id)
    {
        $danhgia=Danhgia::find($id);
        $danhgia->delete();
        return redirect()->route('dg');
    }

    public function pdf($id)
    {
        $hdb=Hoadonban::find($id);
        $pdf=PDF::loadView('admin.hoadonban.pdf',['hdb'=>$hdb])->setOption(['defaultFont' => 'sans-serif']);
        return $pdf->stream('2.pdf');
    }

}

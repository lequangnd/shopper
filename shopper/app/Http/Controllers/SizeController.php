<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\User;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
       $size = Size::all();
        return view('admin.size.index', ['size' =>$size]);
    }

    public function addSize(Request $request)
    {
       $size =new Size;
       $size->TenSize=$request->input('TenSize');
       $size->save();
        return redirect()->route('s');
    }

    public function add()
    {
        return view('admin.size.add');
    }

    public function update($id)
    {
       $size = Size::find($id);
        return view('admin.size.update', ['size' =>$size]);
    }

    public function updateSize(Request $request,$id)
    {
       $size = Size::find($id);
       $size->TenSize=$request->input('TenSize');
       $size->save();
        return redirect()->route('s');
    }

    public function delete($id)
    {
       $size=Size::find($id);
       $size->delete();
        return redirect()->route('s');
    }

    public function searchSize(Request $request)
    {
        $key=$request->input('keyword',"");
       $size=Size::where('TenSize','like','%'.$key.'%')->get();
        return view('admin.size.index',['size'=>$size]);
    }

    public function user()
    {
       $user = User::all();
        return view('admin.user.index', ['user' =>$user]);
    }

    public function searchuser(Request $request)
    {
        $key=$request->input('keyword',"");
       $user=User::where('name','like','%'.$key.'%')->get();
        return view('admin.user.index',['user'=>$user]);
    }

}

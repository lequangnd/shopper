<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Str;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function register()
    {
        return view('backend.register',);
    }
    public function addRegister(Request $request)
    {
        $request->validate([ 'email'=> 'email:rfc,dns','password'=> 'required|max:8','SDT'=>'required|max:11', 'DiaChi'=>'required', 'name'=>'required']);
        $user=new User;
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=bcrypt( $request->input('password'));
        $user->MatKhau=$request->input('password');
        $user->SDT=$request->input('SDT');
        $user->DiaChi=$request->input('DiaChi');
        $user->save();
        return redirect()->route('login');
    }

    public function login()
    {
        return view('backend.login');
    }

    public function postLogin(Request $request)
    {
    
        $request->validate([ 'email'=> 'email:rfc,dns','password'=> 'required|max:8']);
        $email=$request->input('email');
        $password=$request->input('password');
        if(Auth::attempt(['email'=>$email, 'password'=>$password]))
        {
            if(Auth::user()->id!=4)
            {
            return redirect()->route('index');
            }else
            {
                return redirect()->route('sp');
            }
        }
        else
        {
           Session::put('message','Tài khoản hoặc mật khẩu không chính xác');
           return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    public function change()
    {
        return view('backend.password',);
    }

    public function changePassword(Request $request)
    {
        $request->validate(['password'=> 'required|max:8']);
        $id=Auth::user()->id;
        $user=User::find($id);
        if($user->MatKhau == $request->oldpassword)
        {
        $user->password=bcrypt( $request->input('password'));
        $user->MatKhau=$request->input('password');
        $user->save();
        Alert::success('', 'Thay đổi mật khẩu thành công');
        return redirect()->route('login');
        }else
        {
            Alert::info('', 'Thay đổi mật khẩu không thành công');
            return redirect()->route('change');
        }
       
    }

    // forget password

    public function forget()
    {
        return view('backend.forget');
    }

    public function forgetPost(Request $request)
    {
        if($user=User::where("email",$request->email)->first())
        {
        Mail::send('backend.getmail',compact('user'),function($email) use($user)
        {
            $email->subject('Eshopper - Lấy mật khẩu.');
            $email->to($user->email, $user->name);
            Alert::susscess('', 'Vui lòng vào email để xác nhận.');
            return;
        });
        }
        else
        {
            alert()->info('Title','Thông tin gmail chưa chính xác hoặc không tồn tại');
            return redirect()->route('forget');
        }
       
    }

    public function getpassword($id,$token)
    {
        $user=User::find($id);
        if($token== $user->MatKhau)
        {
            return view('backend.getpassword',['user'=>$user]);
        }
        return abort(404);
    }

    public function activePassword(Request $request,$id)
    {
        $user=User::find($id);
        $user->password=bcrypt($request->password);
        $user->MatKhau=$request->password;
        $user->save();
        return redirect()->route('login');
    }
}

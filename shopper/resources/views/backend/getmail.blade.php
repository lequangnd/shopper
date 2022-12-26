<p>Xin chào {{$user->name}}</p>
<a href="{{route('getpassword',['id'=>$user->id,'token'=>$user->MatKhau])}}">Click</a>
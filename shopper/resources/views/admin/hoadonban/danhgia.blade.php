<link href="{{asset('admin/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">
<div class="container">
    <form method="post" action="{{route('danhgiaPost')}}">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nội dung</label>
                    <textarea name="danhgia" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
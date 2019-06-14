@if ($errors->any())
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

@if (session('success'))
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
               {{session()->get('success')}}

            </div>
        </div>
    </div>
@endif

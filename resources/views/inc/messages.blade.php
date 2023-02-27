@if(session()->has('message'))
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
    {{session()->get('message')}}
  </div>
@endif

@if(count($errors)>0)
@foreach($errors->all() as $error)
  <div class="alert alert-danger">
    {{$error}}
  </div>
@endforeach
@endif

@if(session()->has('error'))
  <div class="alert alert-danger">
    {{session()->get('error')}}
  </div>
@endif

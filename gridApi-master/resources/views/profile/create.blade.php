@extends('welcome')


@section('content')

<form action="{{route('profile.store')}}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
<input type= "text" name = "mobile" placeholder="mobile">
<input type = "text" name = "email" placeholder="email">
 <input type="file" name="image" id="file">
 <button type="submit">STORE</button>
</form>




@endsection
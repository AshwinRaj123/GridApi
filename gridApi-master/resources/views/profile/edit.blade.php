@extends('welcome')


@section('content')
<form action="{{ route('profile.update',$profile->id) }}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}

	<input type="hidden" name="_method" value="PUT">

<input type= "text" name = "first_name">
<input type = "text" name = "last_name">
<input type="file" name="image" id="file">
<button type="submit">STORE</button>
</form>



@endsection




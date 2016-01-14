@extends('home')

@section('content')
@if( $errors->all() )
<div class="alert alert-danger" role="alert"> 
	<strong>Oops!</strong><br>
	<ul>
		@foreach( $errors->all() as $error )
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
@if( Session::get('success') )
<div class="alert alert-success" role="alert"> 
	<strong>{{trans('labels.welldone')}}</strong> {{Session::get('success')}}
</div>
@endif
{{ Form::open(array('url' => $book->id.'/update','enctype'=>'multipart/form-data')) }}
	<div class="form-group">
		<label for="booktitle">{{trans('labels.title')}}</label>
		<input type="text" name="title" class="form-control" id="booktitle" value="{{$book->title}}" placeholder="Title">
	</div>
	<div class="form-group">
		<label for="bookauthor">{{trans('labels.author')}}</label>
		<input type="text" name="author" class="form-control" id="bookauthor" value="{{$book->author}}" placeholder="Author">
	</div>
	<div class="form-group">
		<label for="bookgenre">{{trans('labels.genre')}}</label>
		<input type="text" name="genre" class="form-control" id="bookgenre" value="{{$book->genre}}" placeholder="Genre">
	</div>
	<div class="form-group">
		<label for="bookdescription">{{trans('labels.description')}}</label>
		<textarea name="description" class="form-control" id="bookdescription" placeholder="Description">{{$book->description}}</textarea>
	</div>
	<div class="form-group">
		<label for="bookpublished">{{trans('labels.datepublished')}}</label>
		<input type="text" name="published" class="form-control" id="bookpublished" value="{{$book->published}}" placeholder="">
	</div>
	<div class="form-group">
		<label for="bookformat">{{trans('labels.format')}}</label>
		<select type="text" name="format" class="form-control" id="bookformat">
			<option value="Kindle">Kindle</option>
			<option value="Hardcover"{{($book->format=='Hardcover')?' selected':''}}>Hardcover</option>
			<option value="Paperback"{{($book->format=='Paperback')?' selected':''}}>Paperback</option>
			<option value="MP3 CD"{{($book->format=='MP3 CD')?' selected':''}}>MP3 CD</option>
		</select>
	</div>
	<div class="form-group">
		<label for="bookcover">{{trans('labels.bookcover')}}</label>
		<input type="file" name="image" id="bookcover"><br>
		@if($book->image)
		<img src="{{asset('uploads/'.$book->image)}}" alt="" class="img-responsive">
		@endif
		<p class="help-block"></p>
	</div>
	<hr>
	<button type="submit" class="btn btn-success">
		<i class="glyphicon glyphicon-floppy-saved"></i>
		{{trans('labels.submit')}}
	</button>
{{ Form::close() }}
@stop

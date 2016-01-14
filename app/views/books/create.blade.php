@extends('home')

@section('content')
@if( $errors->all() )
<div class="alert alert-danger" role="alert"> 
	<strong>Oh snap!</strong><br>
	<ul>
		@foreach( $errors->all() as $error )
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
{{ Form::open(array('url' => '/','enctype'=>'multipart/form-data')) }}
	<div class="form-group">
		<label for="booktitle">{{trans('labels.title')}}</label>
		<input type="text" name="title" class="form-control" id="booktitle" placeholder="Title">
	</div>
	<div class="form-group">
		<label for="bookauthor">{{trans('labels.author')}}</label>
		<input type="text" name="author" class="form-control" id="bookauthor" placeholder="Author">
	</div>
	<div class="form-group">
		<label for="bookgenre">{{trans('labels.genre')}}</label>
		<input type="text" name="genre" class="form-control" id="bookgenre" placeholder="Genre">
	</div>
	<div class="form-group">
		<label for="bookdescription">{{trans('labels.description')}}</label>
		<textarea name="description" class="form-control" id="bookdescription" placeholder="Description"></textarea>
	</div>
	<div class="form-group">
		<label for="bookpublished">{{trans('labels.datepublished')}}</label>
		<input type="text" name="published" class="form-control" id="bookpublished" placeholder="">
	</div>
	<div class="form-group">
		<label for="bookformat">{{trans('labels.format')}}</label>
		<select type="text" name="format" class="form-control" id="bookformat">
			<option value="Kindle">Kindle</option>
			<option value="Hardcover">Hardcover</option>
			<option value="Paperback">Paperback</option>
			<option value="MP3 CD">MP3 CD</option>
		</select>
	</div>
	<div class="form-group">
		<label for="bookcover">{{trans('labels.bookcover')}}</label>
		<input type="file" name="image" id="bookcover">
		<p class="help-block"></p>
	</div>
	<hr>
	<button type="submit" class="btn btn-success">
		<i class="glyphicon glyphicon-floppy-saved"></i>
		{{trans('labels.submit')}}
	</button>
{{ Form::close() }}
@stop

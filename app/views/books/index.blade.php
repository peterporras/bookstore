@extends('home')

@section('content')
@if( Session::get('success') )
<div class="alert alert-success" role="alert"> 
	<strong>Well done!</strong> {{Session::get('success')}}
</div>
@endif
@if( Session::get('error') )
<div class="alert alert-danger" role="alert"> 
	<strong>Oops!</strong> {{Session::get('error')}}
</div>
@endif
<div class="row">
@if( $books )
	@foreach( $books as $book )
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="thumbnail">
			<div class="row">
				<div class="col-md-4">
					<a href="{{url('/'.$book->id.'/edit')}}">
		            	<?php $thumb = ($book->image)? url('uploads/'.$book->image): asset('img/cinema.png'); ?>
		        		<img src="{{$thumb}}" class="img-responsive">
		            </a>
				</div>
				<div class="col-md-8">
					<div class="caption">
						<h3>{{ $book->title }}</h3>
						<p><strong>Author:</strong> {{ ($book->author) ? $book->author : 'N/A' }}</p>
						<p><strong>Published:</strong> {{ ($book->published) ? : 'N/A' }}</p>
						<p><strong>Genre:</strong> {{ ($book->genre) ? : 'N/A' }}</p>
						<p><strong>Format:</strong> {{ ($book->format) ? : 'N/A' }}</p>
						@if($book->description)
						<p>{{ $book->description }}</p>
						@endif
						<p>
							<a href="{{url('/'.$book->id.'/edit')}}" class="btn btn-primary" role="button">
								<i class="glyphicon glyphicon-pencil"></i>
								Edit
							</a> 

							<button type="button" class="btn btn-danger" data-title="{{ $book->title }}" data-id="{{ $book->id }}" data-toggle="modal" data-target=".delete-modal">
								<i class="glyphicon glyphicon-remove"></i>
								Delete
							</button>
						</p>
					</div>	
				</div>
			</div>
		</div>
	</div>
	@endforeach
	{{ $books->links() }}
@endif
</div>
<div class="modal fade delete-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style="display: none;"> 
	<div class="modal-dialog modal-sm"> 
		<div class="modal-content"> 
			<div class="modal-header"> 
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button> 
				<h4 class="modal-title" id="mySmallModalLabel">Delete Book</h4> 
			</div> 
			<div class="modal-body"> 
				Are you sure to remove <strong class="booktitle"></strong>?
			</div> 
			<div class="modal-footer">
				{{ Form::open(array('url' => '/','method'=>'get')) }}
				<a type="button" class="btn btn-default" data-dismiss="modal">Cancel</a>
				<button type="submit" class="btn btn-danger">
					<i class="glyphicon glyphicon-remove"></i> Delete
				</button>
				{{ Form::close() }}
			</div>
		</div> 
	</div> 
</div>
@stop
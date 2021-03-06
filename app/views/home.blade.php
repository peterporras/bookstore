<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bookstore</title>
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<div class="container">
		<div class="row"><br>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">{{trans('labels.options')}}</h3>
					</div>
					<div class="panel-body">
						<div class="list-group">
							<a href="{{url('/')}}" class="list-group-item">
								<i class="glyphicon glyphicon-menu-hamburger"></i>
								{{trans('labels.books')}}
							</a>
							<a href="{{url('create')}}" class="list-group-item">
								<i class="glyphicon glyphicon-ok-sign"></i>
								{{trans('labels.addbooks')}}
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">
							{{ ($title) ? $title : ''  }}
						</h3>
					</div>
					<div class="panel-body">
						
						@yield('content')

					</div>
				</div>
			</div>
		</div>
	</div>
	

	<script src="{{asset('js/jquery-1.11.3.min.js')}}"></script>
	<script src="{{asset('js/jquery-ui.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
  	<script>
  	$(function() {
  		$( "#bookpublished" ).datepicker({dateFormat: "yy-mm-dd"});
		$('.delete-modal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget);
			var title = button.data('title');
			var id = button.data('id');
			var modal = $(this);

			modal.find('.modal-title').text('Delete "'+title+'"');
			modal.find('.modal-body .booktitle').text(title);
			modal.find('form').attr('action', '{{url('/')}}/delete/'+id);
		});
  	});
  	</script>
</body>
</html>
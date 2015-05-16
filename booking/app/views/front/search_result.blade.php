<!DOCTYPE html>
<html lang="">
	<head>
		<base href="{{asset('')}}">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>

		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<h1 class="text-center">Search Result</h1>

<div class="container">

	<div class="row">

			<table class="table table-hover">
				<thead>
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>

					@foreach($availables as $available)
						@if($types == $available->Types->name || $available->quantity != 0)
						<tr>
							<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
								<a href="booking/habitacion.jpg" class="thumbnail">
									<img src="booking/habitacion.jpg" alt="" width="200px">  
								</a>
							</td>
							<td>disponibles : {{$available->quantity}}</td>
							<td>{{$available->Types->name}}</td>
							<td>{{$available->currency}} {{$available->price}}</td>
							<th><a href="api/reservation_form/{{$available->id}}" class="btn btn-xs btn-success">Reservar</a></th>
						</tr>
						@endif
					@endforeach
				</tbody>
			</table>
	</div>

</div>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	</body>
</html>
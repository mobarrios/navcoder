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
		<div class="col-xs-9">
			<table class="table table-hover">
				<thead>
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th></th>


					</tr>
				</thead>
				<tbody>

					<tr>
						<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
							<a href="booking/habitacion.jpg" class="thumbnail">
								<img src="booking/habitacion.jpg" alt="" width="200px">  
							</a>
						</td>
						<td>{{$availables->Types->name}}</td>
						<td>{{$availables->currency}} {{$availables->price}}</td>
						<td><a href="api/reservation_form/{{$availables->id}}" class="btn btn-xs btn-success">Reservar</a></td>
					</tr>			
				</tbody>
			</table>
		</div>

		{{--
		<div class="col-xs-3">
		
			<div class="panel panel-primary">
				  <div class="panel-heading">
						<h4 class="panel-title">Extras Services</h4>
				  </div>
				  <div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th></th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th><input type="checkbox"></th>
									<td>Transfer in/out</td>
									<td>$200</td>
								</tr>
								<tr>
									<th><input type="checkbox"></th>
									<td>City Tour</td>
									<td>$500</td>
								</tr>
							</tbody>
						</table>
					</div>
				  </div>
			</div>
			--}}

		</div>
	</div>


</div>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	</body>
</html>
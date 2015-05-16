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


<div class="container">

<br>
<div class="row">

	<div class="panel panel-default">
	<div class="panel-heading">Reservation Data</div>
		<div class="panel-body">

		<strong>Llegada : </strong> {{Session::get('from')}} <br>
		<strong>Salida : </strong> {{Session::get('to')}} <br> 

		<strong>Habitación : </strong> {{$id->Types->name}} <br> 

		<strong>Total : </strong> {{$id->currency}} {{Session::get('total_days') * $id->price }} <br> 
		
		</div>
	</div>

</div>


	<div class="row">

		<form action="" method="POST" role="form">
		<legend>Resevation Form</legend>
		<div class="form-group">
			<label for="">Apellido</label>
			<input type="text" class="form-control" id="" placeholder="Input field">
			<label for="">Nombre</label>
			<input type="text" class="form-control" id="" placeholder="Input field">
			<label for="">Tel.</label>
			<input type="text" class="form-control" id="" placeholder="Input field">
			<label for="">e-Mail</label>
			<input type="text" class="form-control" id="" placeholder="Input field">

			<hr>
			<h3>Garantía</h3>
			<label for="">Tarjeta de Crédito</label>i
			<select name="" id="input" class="form-control" required="required">
				<option value="">Visa</option>
				<option value="">Amex</option>
				<option value="">Master Card</option>
				<option value="">Diners</option>
			</select>
			<label for="">Número</label>
			<input type="text" class="form-control" id="" placeholder="Input field">
			<label for="">Cod. Seg.</label>
			<input type="text" class="form-control" id="" placeholder="Input field">
			<label for="">Vto.</label>
			<input type="text" class="form-control" id="" placeholder="Input field">
		</div>



		<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	

		
	</div>

</div>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	</body>
</html>
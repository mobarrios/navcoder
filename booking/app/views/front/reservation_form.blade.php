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

		<table class="table">
			<thead>
				<tr>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Habitación</td>
					<td>{{$id->Types->name}}</td>
				</tr>
				<tr>
					<td>Llegada</td>
					<td>{{Session::get('from')}}</td>
				</tr>
				<tr>
					<td>Salida</td>
					<td>{{Session::get('to')}}</td>
				</tr>
				<tr>
					<td>Total</td>
					<td>{{$id->currency}} {{Session::get('total_days') * $id->price }} </td>
				</tr>
			</tbody>
		</table>


		
		</div>
	</div>

</div>


	<div class="row">

		<form action="{{route('post_process_reservation')}}" method="POST" role="form">
		
		<input type="hidden" name="from" value="{{Session::get('from')}}">
		<input type="hidden" name="to" value="{{Session::get('to')}}">
		<input type="hidden" name="types_id" value="{{$id->Types->id}}">
		<input type="hidden" name="currency" value="{{$id->currency}}">
		<input type="hidden" name="total" value="{{Session::get('total_days') * $id->price }}">



		<div class="form-group">
			<label for="">Apellido</label>
			<input name="last_name" type="text" class="form-control" id="" placeholder="Input field">
			<label for="">Nombre</label>
			<input name="name" type="text" class="form-control" id="" placeholder="Input field">
			<label for="">Tel.</label>
			<input name="phone"  type="text" class="form-control" id="" placeholder="Input field">
			<label for="">e-Mail</label>
			<input name="mail" type="text" class="form-control" id="" placeholder="Input field">
			<label for="">Cant. Pax</label>
				<select name="pax_quantity" id="input" class="form-control" required="required">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>

			<hr>
			<h3>Garantía</h3>
			<label for="">Tarjeta de Crédito</label>i
			<select name="cc" id="input" class="form-control" required="required">
				<option value="1">Visa</option>
				<option value="2">Amex</option>
				<option value="3">Master Card</option>
				<option value="4">Diners</option>
			</select>
			<label for="">Número</label>
			<input name="cc_number" type="text" class="form-control" id="" placeholder="Input field">
			<label for="">Cod. Seg.</label>
			<input name="cc_code" type="text" class="form-control" id="" placeholder="Input field">
			<label for="">Vto.</label>
			<input name="cc_vto" type="text" class="form-control" id="" placeholder="Input field">
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
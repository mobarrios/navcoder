<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

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
	<h3>ADMINISTRACION</h3>
		<form action="{{route('post_loginit')}}" method="POST" class="form-inline" role="form">
		
			<div class="form-group">
				<label class="sr-only" for="">User</label>
				<input type="text" class="form-control" id="" placeholder="User" name="user">
			</div>
			
			<div class="form-group">
				<label class="sr-only" for="">Pass</label>
				<input type="password" class="form-control" id="" placeholder="Pass" name="pass">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	</body>
</html>
<!DOCTYPE html>
<html lang="ES">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<base href="{{asset('')}}">
		<title>{ stock }</title>

		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

		<!-- Custom Templates -->
		<link rel="stylesheet" href="{{ URL::asset('assets/css/stylesheet.css') }}" >

		<style type="text/css">
			body
			{
				background-color: #D4DED9;
				font-size: 12px;*/
				font-family: Verdana, Geneva, sans-serif;
			}

		</style>

		@yield('css')

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		
		@yield('menu')
		
		<div class="container">

		@if(App::environment('dev'))
			<span class="label label-danger">Development...</span>
		@elseif(App::environment('local'))
			<span class="label label-danger">Local...</span>
		@endif

		@yield('content')
			
		</div>

		
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

			@yield('js')
			
		<script type="text/javascript">

		$('document').ready(function(){

			//datepicker en forms
			$( ".datepicker" ).datepicker();

			//confirm delete
			$('.del_confirm').on('click',function()
			{
				if (!confirm("Desea eliminar este registro?"))
                {
                 return false;
                }
			});
		});
			
		</script>


	</body>
</html>
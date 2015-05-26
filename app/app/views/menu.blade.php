<nav class="navbar navbar-default navbar-fixed-top">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Nav.</span>
				<span class="fa fa-bars"></span>
			</button>
			<a href="inicio" class="navbar-brand"> <img src="{{ URL::asset('assets/images/nav_stock_logo_little.png') }}" ></a>
		</div>			

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i>  Menu</a>
					<ul class="dropdown-menu">							
							@foreach(Roles::availableModules() as $availableModule)							
								<li role="presentation"><a href="{{route($availableModule->path)}}">{{$availableModule->name}}</a></li>																
							@endforeach						
					</ul>
				</li>
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name}} </a>
					<ul class="dropdown-menu">
						<li><a href="">Perfil</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i></a>
					<ul class="dropdown-menu">
						<li><a href="{{route('users')}}">Usuarios</a></li>
						<li><a href="{{route('profiles')}}">Perfiles</a></li>
						<li><a href="update">Update <span class="badge">1</span> </a></li>
					</ul>
				</li>

				<li><a href="{{route('logout')}}"><i class="fa fa-sign-out"></i></a>
				</li>

			</ul>
		</div>
	</div><!-- /.navbar-collapse -->
</nav>
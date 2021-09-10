<html>
	<head>
		<title>Meu primeiro projeto - @yield("titulo")</title>
		<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
	</head>
	<body>
		
		<nav class="navbar navbar-expand-sm bg-light">
			
			<ul class="navbar-nav">
				
				<li class="nav-item">
					<a class="nav-link" href="/">Home</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link" href="/cliente">Cliente</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link" href="/status">Status</a>
				</li>
				
			</ul>
			
		</nav>
		
		@if (Session::get("acao") == "salvo")
			<div class="alert alert-success">
				Salvo com Sucesso!
			</div>
		@endif
		
		@if (Session::get("acao") == "excluido")
			<div class="alert alert-danger">
				Excluído com Sucesso!
			</div>
		@endif
		
		<div class="container">
			
			<div>
				@yield("cadastro")
			</div>
			
			<div>
				@yield("listagem")
			</div>
			
		</div>
	</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Template</title>
	<meta name= "viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel= "stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="{{asset('css/template.css')}}" type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	  rel="stylesheet">
</head>
<body>
 <div class= "container-fluid">
     <div class= "row">
			<nav class= "navbar-expand-lg navbar navbar-dark bg-dark w-100">

			  <a class= "navbar-brand" href="#">MENU</a>

			  <button class= "navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="material-icons"></span>
			  </button>

				<div class= "collapse navbar-collapse" id="navbarNav">

					<ul class= "navbar-nav">
					
					<li class= "nav-item">
					 <div class= "dropdown">

							<button class= "btn btn-secondary" type="button" data-toggle="dropdown">
								Aplicaçao
							</button>

							<div class= "dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class= "dropdown-item" href="{{route('logout')}}"> 
								Logout
								</a>
							</div>

					 </div>
					</li>
					
					<li class="nav-item">
					 <div class="dropdown">

							<button class="btn btn-secondary" type="button" data-toggle="dropdown">
								Clientes
							</button>

							<div class= "dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class= "dropdown-item" href="{{route('listar')}}">
								Listar
								</a>
							<div class= "dropdown-divider"></div>
								<a class= "dropdown-item" href="{{route('usuario_cadastro')}}">
								Cadastrar
								</a>
							</div>

					 </div>	
					</li>
					
					<li class ="nav-item">
					 <div class="dropdown">

							<button class="btn btn-secondary" type="button" data-toggle="dropdown">
								Vendas
							</button>

							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="{{route('venda_cadastro')}}">
								Vender
								</a>
							</div>

					 </div>
					</li>
					
					</ul>
					
				</div>
			</nav>
     </div>
		
		<div class = "row">
			<div class = "col-md-2">
				<!-- coluna vazia esquerda -->
			</div>
			<div id="conteudo" class = "col-md-8 mt-3 p-3">
				@yield('conteudo')
			</div>
			<div class         = "col-md-2">
				<!-- coluna vazia direita -->
			</div>
		</div>
 </div>
<script src           = "https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src           = "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src           = "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
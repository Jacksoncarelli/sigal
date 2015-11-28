@extends('layouts.templatelogin	')

@section('content')
	<head xmlns="http://www.w3.org/1999/html">

		<style type="text/css">
			body {
				background-image: url("/assets/img/login.jpg");
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-size: cover;
			}

		</style>
</head>
	<body
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

<div class="container-fluid" >
	<div class="row">
		<div style="margin-top: 1%" top class="col-md-3 col-md-offset-1">
			<div class="panel panel-default">
				<h2><div align="center" class="panel-heading">Área de login<div></h2>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-group" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label for="exampleInputEmail1">Email do usuário</label>
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
								<input type="email" class="form-control" name="email" value="{{ old('Usuario') }}" autofocus>
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">Senha</label>
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
									<input type="password" class="form-control" name="password">
								</div>


						<div class="form-group">
							<div align="center">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Lembrar-me
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div align="center">
								<button type="submit" class="btn btn-primary">Entrar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
	</body>

@endsection

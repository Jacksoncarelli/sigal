@extends('layouts.templatelogin	')

@section('content')


	<!-- Form Module-->
	<div class="module form-module" >
		<div>
		</div>
		<div class="form left" >
			<h2 align="center">Área de login</h2>

			<form class="form-group" role="form" method="POST" action="{{ url('/auth/login') }}">
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
							<input type="email" class="form-control" name="email" value="{{ old('Usuario') }}" autofocus>
						</div><br>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
								<input type="password" class="form-control" name="password">
							</div>
<br>
				<button>Login</button>
			</form>
		</div>
		<div class="form">


		</div>
		<div ></div>
	</div>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='loginform/js/da0415260bc83974687e3f9ae.js'></script>

@endsection

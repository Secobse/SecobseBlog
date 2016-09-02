<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>登录后台</title>

	<!-- Bootstrap core CSS -->
	<link href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<style>
		body {
			padding-top: 40px;
			padding-bottom: 40px;
			background-color: #eee;
		}

		.form-signin {
			max-width: 330px;
			padding: 15px;
			margin: 0 auto;
		}
		.form-signin .form-signin-heading,
		.form-signin .checkbox {
			margin-bottom: 10px;
		}
		.form-signin .checkbox {
			font-weight: normal;
		}
		.form-signin .form-control {
			position: relative;
			height: auto;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			padding: 10px;
			font-size: 16px;
		}
		.form-signin .form-control:focus {
			z-index: 2;
		}
		.form-signin input[type="password"] {
			margin-bottom: 10px;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}
	</style>
</head>

<body>
  @if(Session::has('status'))
	  <div class="alert alert-success">{{ Session::get('status') }}</div>
  @endif
<div class="container">

	<form class="form-signin" role="form" action="/admin/login" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<h2 class="form-signin-heading">登录后台</h2>
		<label for="username" class="sr-only">管理员</label>
		<input type="text" name="username" id="username" class="form-control" placeholder="UserName" required autofocus>
		@if ($errors->has('username'))
			<span class="help-block">
				<strong>{{ $errors->first('username') }}</strong>
			</span>
		@endif
		<label for="inputPassword" class="sr-only">密码</label>
		<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
		@if ($errors->has('password'))
			<span class="help-block">
				<strong>{{ $errors->first('password') }}</strong>
			</span>
		@endif
		<button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
	</form>

</div> <!-- /container -->

</body>
</html>

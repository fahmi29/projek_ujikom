<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="asset/css/font-awesome.min.css">
</head>
<body>
	<div class="col-md-4 offset-lg-4" style="margin-top: 10%;">
		<div class="card">
			<div class="card-header"><h4>Login <i class="fa fa-spin fa-cog"></i></h4></div>
			<div class="card-body">
				<form method="post" action="config/konek.php?op=in">
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-user"></i>
					</div>
					<input type="text" name="username" class="form-control" placeholder="Masukan Username">
				</div><br>

				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-key"></i>
					</div>
					<input type="password" name="password" class="form-control" placeholder="Masukan Password">
				</div><br>
				
					<button class="btn btn-primary" name="login" style="float: right;"><i class="fa fa-in"></i>Login</button>
				</form>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="asset/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="asset/js/popper.js"></script>
<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
</html>
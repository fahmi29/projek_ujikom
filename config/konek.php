<?php
	session_start();

	mysql_connect('127.0.0.1','root','');
	// mysql_connect('127.0.0.1','root','');
	// mysql_select_db('ujikom_11505054');
	mysql_select_db('ujikom_11505054');

	@$user = $_POST['username'];
	@$pass = $_POST['password'];
	@$op = $_GET['op'];

	if ($op == 'in') {
		$sql = mysql_query("SELECT * from user where username = '$user' and password = '$pass'");
		$c = mysql_fetch_array($sql);

		$_SESSION['user_id'] = $c['id'];
		$_SESSION['username'] = $c['username'];
		$_SESSION['password'] = $c['password'];
		$_SESSION['fullname'] = $c['fullname'];
		$_SESSION['level'] = $c['level'];

		if ($c['level'] == 'Manager') {
			echo "<script>alert('Selamat Datang $_SESSION[level]');document.location.href='../manager/index.php'</script>";
		}elseif ($c['level'] == 'Sekertaris') {
			echo "<script>alert('Selamat Datang $_SESSION[level]');document.location.href='../sekertaris/index.php'</script>";
		}elseif ($c['level'] == 'Admin') {
			echo "<script>alert('Selamat Datang $_SESSION[level]');document.location.href='../admin/index.php'</script>";
		}elseif ($c['level'] == 'Pegawai') {
			echo "<script>alert('Selamat Datang $_SESSION[level]');document.location.href='../pegawai/index.php'</script>";
		}
		else{
			echo "<script>alert('username atau Password Salah');document.location.href='../index.php'</script>";
			// mysql_error();
		}
	}elseif ($op == 'out') {
		unset($_SESSION['username']);
		unset($_SESSION['password']);
		die("Please Wait......... <script>document.location.href='../index.php'</script>");
	}
 ?>

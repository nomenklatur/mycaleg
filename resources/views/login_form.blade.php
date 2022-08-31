<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>MyCaleg | {{$title}}</title>
  <link rel="icon" href="images/logo.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/login-register.css">
  <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
</head>

<body>
	@if (session()->has('success'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		{{ session('success') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
@endif
@if (session()->has('AuthError'))
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		{{ session('AuthError') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
@endif
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="/register" method="POST">
			@csrf
			<h1>Buat Akun</h1>
			<span>gunakan e-mail kamu untuk registrasi</span>
			@error('nama')
				<label for="nama" style="color: red; font-size:11px; margin-right:auto">{{$message}}</label>
			@enderror
			<input type="text" placeholder="Nama" name="nama" id="nama" required />
			@error('username')
				<label for="username" style="color: red; font-size:11px; margin-right:auto">{{$message}}</label>
			@enderror
			<input type="text" placeholder="Username" name="username" id="username" required/>
			@error('email')
				<label for="email" style="color: red; font-size:11px; margin-right:auto">{{$message}}</label>
			@enderror
			<input type="email" placeholder="Email" name="email" id="email" required />
			@error('password')
				<label for="password" style="color: red; font-size:11px; margin-right:auto">{{$message}}</label>
			@enderror
			<input type="password" placeholder="Password" name="password" id="password" required/>
			<button type="submit">Daftar</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="/login" method="POST">
			@csrf
			<h1>Masuk</h1>
			<span>gunakan akun yang terdaftar untuk masuk</span>
			@error('login_username')
				<label for="login_username" style="color: red; font-size:11px; margin-right:auto">{{$message}}</label>
			@enderror
			<input type="text" placeholder="Username" name="login_username" id="login_username" required />
			<input type="password" placeholder="Password" name="login_password" id="login_password" />
			<button type="submit">Masuk</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Sudah punya akun?</h1>
				<p>Untuk dapat menggunakan fitur tertentu silahkan masuk menggunakan akunmu</p>
				<button class="ghost" id="signIn">Masuk</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Belum punya akun?</h1>
				<p>Daftarkan diri kamu agar dapat menggunakan fitur sistem</p>
				<button class="ghost" id="signUp">Daftar</button>
			</div>
		</div>
	</div>
</div>

<script src="js/app.js" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>

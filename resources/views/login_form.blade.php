<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>MyCaleg | {{$title}}</title>
  <link rel="icon" href="images/logo.png">
  <link rel="stylesheet" href="css/login-register.css">
  <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
</head>

<body>


<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1>Buat Akun</h1>
			<span>gunakan e-mail kamu untuk registrasi</span>
			<input type="text" placeholder="Nama" />
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<button>Daftar</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#">
			<h1>Masuk</h1>
			<span>gunakan akun yang terdaftar untuk masuk</span>
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<button>Masuk</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Halo kamu!</h1>
				<p>Untuk dapat menggunakan fitur tertentu silahkan masuk menggunakan akunmu</p>
				<button class="ghost" id="signIn">Masuk</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Selamat Datang!</h1>
				<p>Daftarkan diri kamu agar dapat menggunakan fitur sistem</p>
				<button class="ghost" id="signUp">Daftar</button>
			</div>
		</div>
	</div>
</div>

<script src="js/app.js" charset="utf-8"></script>
</body>

</html>

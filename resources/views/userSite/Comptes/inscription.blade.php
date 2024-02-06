<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Signup/Signin</title>
  <link rel="stylesheet" href="/dist/css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
		@if (Session::has('error'))
            <div class="alert alert-success text-center" role="alert">
                {{ Session::get('error')}}
            </div>
        @endif
			<div class="signup">
				<form action="{{ route('inscrire') }}" method="POST">
					@csrf
					<label for="chk" aria-hidden="true" style="margin-bottom: -20px;">S'inscrire</label>
					<input type="text" name="nom" placeholder="Nom" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="motPasse" placeholder="Mot de passe" required="">
					<input type="text" name="contact" placeholder="contact" required="">
					<input type="text" name="adresse" placeholder="adresse" required="">
					<button>S'incrire</button>
				</form>
			</div>

			<div class="login">
				<form action="{{ route('connexion') }}" method="POST">
					@csrf
					<label for="chk" aria-hidden="true">Connexion</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="motPasse" placeholder="Mot de passe" required="">
					<button>Se connecter</button>
				</form>
			</div>
	</div>
</body>
</html>
<!-- partial -->
  
</body>
</html>

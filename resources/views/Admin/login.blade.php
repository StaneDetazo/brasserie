
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card mt-5">
        <div class="card-header">
          <h4>Veuillez vous connecter!</h4>
        </div>
        <div class="card-body">
          <form action="{{ route('login') }}">
            <div class="form-group">
              <input type="text" class="form-control my-4" id="email" placeholder="E-mail">
            </div>
            <div class="form-group my-4">
              <input type="password" class="form-control" id="password" placeholder="Mot de passe">
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
            <p class="mt-2 text-left">Vous n'avez pas de compte? <a href="{{ route('signUp') }}">Créer un compte</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

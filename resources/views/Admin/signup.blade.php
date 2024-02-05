
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="wnameth=device-wnameth, initial-scale=1.0">
  <title>SignUp Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card mt-5">
        <div class="card-header">
          <h4>Veuillez Renseigner les informations</h4>
        </div>
        <div class="card-body">
          <form method="post" action="{{ route('createGrossiste') }}">
          @csrf
          <div class="form-group">
              <input type="text" class="form-control my-4" name="nom" id="nom" placeholder="Nom">
            </div>
            <div class="form-group">
              <input type="text" class="form-control my-4" name="adresse" id="adresse" placeholder="Adresse">
            </div>
            <div class="form-group">
              <input type="text" class="form-control my-4" name="telephone" id="telephone" placeholder="Téléphone">
            </div>
            <div class="form-group">
              <input type="text" class="form-control my-4" name="email" id="email" placeholder="E-mail">
            </div>
            <div class="form-group my-4">
              <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe">
            </div>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
        <p class="mt-2 text-left">Vous avez déjà un compte? <a href="{{ route('login') }}">Se connecter</a></p>
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

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BOISSON</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/dist/css/styless.css" rel="stylesheet" />

      
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/admin/acceuil">BB/SNB</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/admin/acceuil">Acceuil</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="#!">A propos</a></li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Produits</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">Liste des articles</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Ajouter un article</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form  action="panier" class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Commandes   
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                    @if (Auth::user() !== null) 
                         <span>{{ Auth::user()->name }}</span>
                    @else 
                        <form  action="inscription" class="d-flex">
                            <button class="btn btn-outline-primary mx-2" type="submit">
                                <i class="bi-pen me-1"></i>
                            s'inscrire 
                            </button>
                        </form>
                    @endif
                   
                    <form  action="deconnexion" method="POST" class="d-flex">
                        @csrf 
                        @method('DELETE')
                        <button class="btn btn-outline-primary mx-2" type="submit">
                            <i class="bi-logout me-1"></i>
                           Déconnecion   
                        </button>
                    </form>
                   
                </div>
            </div>
        </nav>

        <!-- Header-->
        <header class="bg-img bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="bg-img text-center text-white">
                    <h1 class="display-4 fw-bolder">GERER VOS STOCKS</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Rafraichissez-vous !</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        @if (Session::has('success'))
            <div class="alert alert-success text-center" role="alert">
                {{ Session::get('success')}}
            </div>
        @endif
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                <form action="" method="POST"
                enctype="multipart/form-data">
             
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Nom </label>
                        <input type="text" class="form-control" id="" name=""
                            value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nomre de casier </label>
                        <input type="text" class="form-control" id="" name=""
                            value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="categ" class="form-label">Catégorie</label>
                        <select class="form-control" id="categ">
                            <option value="sucrerie">Sucrerie</option>
                            <option value="beer">Bière</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Quantité(cl/l)</label>
                        <input type="text" class="form-control" id="" name=""
                            value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Prix(casier)</label>
                        <input type="text" class="form-control" id="" name=""
                            value="" required>
                    </div>
                    <div class="float-right">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </div>
            </form>

                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; BB/SNB 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

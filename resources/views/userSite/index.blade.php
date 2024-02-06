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
            <a class="navbar-brand" href="/">BB/SNB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Acceuil</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#!">A propos</a></li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Produits</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">Tous</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            @foreach($categories as $categorie)
                            <li><a class="dropdown-item"
                                    href="{{ route('filtre.P', ['categorie_produit' => $categorie->nom_categorie]) }}">{{ $categorie->nom_categorie }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
                <form action="{{ route('panier') }}" class="d-flex">
                    <button class="btn btn-outline-danger" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Panier
                        <span
                            class="badge bg-danger text-white ms-1 rounded-pill">{{ count((array) session('cart')) }}</span>
                    </button>
                </form>
                @if (Auth::user() !== null)
                <span class="mx-4 fs-5">{{ Auth::user()->name }}</span>
                <form action="deconnexion" method="POST" class="d-flex">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-primary mx-2" type="submit">
                        <i class="bi-logout me-1"></i>
                        Déconnecion
                    </button>
                </form>
                @else
                <form action="inscription" class="d-flex">
                    <button class="btn btn-outline-primary mx-2" type="submit">
                        <i class="bi-pen me-1"></i>
                        s'inscrire ou se connecter
                    </button>
                </form>
                @endif
            </div>
        </div>
    </nav>

    <!-- Header-->
    <header class="bg-img bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="bg-img text-center text-white">
                <h1 class="display-4 fw-bolder">BUVEZ AVEC MODERATION</h1>
                <p class="lead fw-normal text-white-50 mb-0">Rafraichissez-vous !</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    @if (Session::has('success'))
    <div id="alert" class="alert alert-success text-center" role="alert">
        {{ Session::get('success')}}
    </div>
    @endif
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($produits as $produits)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="/images/{{ $produits->image }}" alt="image du produit" />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{ $produits->libelle_produit }} |
                                    {{ $produits->categorie_produit }} </h5>
                                <!-- Product price-->
                                {{ $produits->prix_produit }} <sup>fcfa</sup> | {{ $produits->stock_produit }}
                            </div>
                        </div>
                        <!-- Product actions-->
                        <a type="button" href="{{ route('ajouterPanier.ajout', $produits->id_produit) }}"
                            class="btn btn-primary">Ajouter</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; BB/SNB 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>
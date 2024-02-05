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
        <link href="css/styles.css" rel="stylesheet" />
         <!-- lien du datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- lien de configuration -->
    <link rel="stylesheet" href="../dist/css/gestion.css">
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/">BB/SNB</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Acceuil</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="#!">A propos</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Produits</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">Tous</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">SNB</a></li>
                                <li><a class="dropdown-item" href="#!">BB</a></li>
                            </ul>
                        </li> -->
                    </ul>
                    <form  action="panier" class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                           Panier   
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
    <div class="container">
    <button type="submit" class="btn btn-danger btn-sm my-4">Vider le panier</button>
    <a href="/" type="submit" class="btn btn-danger btn-sm my-4">Retour</a>
    
    <table class="table_personnelle table table-bordered">
        <thead>
            <tr class="table-primary">
                <th>Produit</th>
                <th>Quantité</th>
                <th>Annuler</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td data-th="Produit">
                    <div class="row">
                        <div class="col-sm-4 hidden-xs">
                            <img src="" class="card-img-top" alt="produit" height="50" />
                        </div>
                        <div class="col-sm-5">
                            <p class="text-nowrap"></p>
                        </div>
                    </div>
                </td>
                <td>
                    <div>
                        <input type="text" min=1 value="" class="form-control quantity cart_update" style="width: 50px;"
                            disabled />
                    </div>
                </td>
                <!--  -->
                <!-- <td data-th="total" class="text-center"></td> -->
                <td>
                    <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#supprimer"
                        data-bs-whatever="@mdo"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path
                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                            <path
                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                        </svg>
                    </a>
                </td>
            </tr>


        </tbody>
    </table>
    <form action="" method="POST" class="row g-3">

        <div id="div_total">
            <label for="total" class="form-label">Total:</label>
            <span id="total"> 0 <sup>fcfa</sup></span>
        </div>
       

        <button type="submit" class="btn btn-primary">Valider la commande</button>
        <!--                     
                    <a href="#" type="submit" class="btn btn-success my-3" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" data-bs-whatever="@mdo">Historique</a> -->
    </form>
    </div>
      
</body>

</html>
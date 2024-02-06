@extends('master')
@section('content')
@php
$total = 0
@endphp

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row m-4">
                <div class="col-sm-6">
                    <h1 class="m-0">Gestion des produits</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Acceuil</a></li>
                        <li class="breadcrumb-item active">Produits</li>
                    </ol>
                </div><!-- /.col -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @elseif ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @elseif(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <button type="button" class="btn btn-primary float-right mx-4 my-2" data-bs-toggle="modal"
            data-bs-target="#ajouter">Ajouter</button>

        <!-- Main content -->
        <table id="table_personnelle" class="display">
            <thead>
                <tr class="table-primary">
                    <th>#</th>
                    <th>libelle du produit</th>
                    <th>prix du produit</th>
                    <th>categorie produit</th>
                    <th>Stock du produit</th>
                    <th>Stock du critique</th>
                    <th>Images</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($afficher as $aff)
                <tr>
                    <td>{{ $aff->id_produit }}</td>
                    <td>{{ $aff->libelle_produit }}</td>
                    <td>{{ $aff->prix_produit }}</td>
                    <td>{{ $aff->categorie_produit }}</td>
                    <td>{{ $aff->stock_produit }}</td>
                    <td>{{ $aff->stock_critique }}</td>
                    <td> <img src="/images/{{ $aff->image }}" width="100" height="100"> </td>
                    <td>
                        <a href="" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#voir{{ $aff->id_produit }}" data-bs-whatever="@mdo"><svg
                                xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                class="bi bi-eye" viewBox="0 0 16 16">
                                <path
                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path
                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg>
                        </a>
                        <a href="" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modifierProduit{{ $aff->id_produit }}" data-bs-whatever="@mdo"><svg
                                xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg></a>
                        <a href="" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#suprimerProduit{{ $aff->id_produit }}" data-bs-whatever="@mdo"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                <path
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                            </svg>
                        </a>

                    </td>
                </tr>

                <!-- mofifier produit modal -->

                <div class="modal fade" id="modifierProduit{{ $aff->id_produit }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">MODIFIER LE PRODUIT</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('modifierproduit', ['id' => $aff->id_produit]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Libelle du produit</label>
                                        <input type="text" class="form-control" id="nom"
                                            value="{{ $aff->libelle_produit }}" name="libelle_produit" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Prix du produit</label>
                                        <input type="text" class="form-control" value="{{ $aff->prix_produit }}"
                                            id="nom" name="prix_produit" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Image</label>
                                        <input class="form-control" type="file" value="{{ $aff->image }}" id="formFile"
                                            name="image">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Nom de la catégorie: </label>
                                        <select id="categorie_produit" name="categorie_produit" class="form-control">
                                            <option value="{{ $aff->categorie_produit }}">{{ $aff->categorie_produit }}
                                            </option>
                                            @foreach ($lister as $categorie)
                                            <option value="{{ $categorie->nom_categorie }}">
                                                {{ $categorie->nom_categorie }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Stock du produit</label>
                                        <input type="text" class="form-control" value="{{ $aff->stock_produit }}"
                                            id="nom" name="stock_produit" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Stock critique</label>
                                        <input type="text" class="form-control" value="{{ $aff->stock_critique }}"
                                            id="nom" name="stock_critique" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-primary">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- fin modal  -->

                <!-- suprimer produit modal -->
                <div class="modal fade" id="suprimerProduit{{ $aff->id_produit }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmer la suppression</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Êtes-vous sûr de vouloir supprimer ce produit?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <form action="{{ route('detruireproduit', ['id' => $aff->id_produit]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- fin modal  -->

                <!-- Voir produit modal -->

                <div class="modal fade div_voir_modal" id="voir{{ $aff->id_produit }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">INFORMATION SUR LE PRODUIT</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('voir', ['id' => $aff->id_produit]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <img src="/images/{{ $aff->image }}" width="300" height="300"
                                            class="rounded-circle mx-auto d-block" alt="image du personnel">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nom_utilisateur" class="form-label">Identifiant: </label>
                                        <span>{{ $aff->id_produit }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nom_utilisateur" class="form-label">Nom du produit: </label>
                                        <span>{{ $aff->libelle_produit }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="mot_passe" class="form-label">Prix du produit: </label>
                                        <span>{{ $aff->prix_produit }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="contact" class="form-label">Categorie produit: </label>
                                        <span>{{ $aff->categorie_produit }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="role_utilisateur" class="form-label">Stock du produit: </label>
                                        <span>{{ $aff->stock_produit }}</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="role_utilisateur" class="form-label">Stock critique du produit:
                                        </label>
                                        <span>{{ $aff->stock_critique }}</span>
                                    </div>
                                    <div class="float-right">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Fermer</button>
                                        <!-- <button type="submit" class="btn btn-primary">Ajouter</button> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- fin modal  -->
                @endforeach
            </tbody>
        </table>
        <!-- /.content -->

        <!-- ajouter produit modal -->
        <div class="modal fade div_modal_ajouter" id="ajouter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">AJOUTER UN PRODUIT</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('produit.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nom" class="form-label">Libelle du produit</label>
                                <input type="text" class="form-control" id="nom" name="libelle_produit" required>
                            </div>
                            <div class="mb-3">
                                <label for="nom" class="form-label">Prix du produit</label>
                                <input type="text" class="form-control" id="nom" name="prix_produit" required>
                            </div>
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom de la catégorie</label>
                                <select name="categorie_produit" id="categorie_produit" class="form-control" required>
                                    <option value=""></option>
                                    @foreach ($lister as $categorie)
                                    <option value="{{ $categorie->nom_categorie }}">
                                        {{ $categorie->nom_categorie }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nom" class="form-label">Stock du produit</label>
                                <input type="text" class="form-control" id="nom" name="stock_produit" required>
                            </div>
                            <div class="mb-3">
                                <label for="nom" class="form-label">Stock critique</label>
                                <input type="text" class="form-control" id="nom" name="stock_critique" required>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image: </label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- fin modal  -->
    </div>
</div><!-- /.row -->

@endsection
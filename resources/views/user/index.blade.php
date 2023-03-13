@extends('layouts/app')

@section('content')
<div class="col-lg-8 mx-auto mt-4">

    <div class="card">
        <div class="card-header">
            <h4>Utilisateurs</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Liste des utilisateurs</h5>

            <!-- Message d'information -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <p class="card-text">

                <!-- Tableau -->
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Pseudo</th>
                            <th scope="col">email</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Nom</th>
                            {{-- <th scope="col">Adresse</th>
                            <th scope="col">Code postal</th>
                            <th scope="col">ville</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">Role</th>
                            <th scope="col">Date de création</th> --}}

                            {{-- <th scope="col">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>

                            <td>{{$user->pseudo}}</td>
                            <td>{{$user->firstName}}</td>
                            <td>{{$user->lastName}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="{{ route('user.show', $user->id)}}" class="btn btn-sm"><i class="bi bi-eye icone"></i> Voir</a>
                                <a href="{{ route('user.edit', $user->id)}}" class="btn btn-sm"><i class=" bi bi-pencil-square"></i> Editer</a>
                                <form action="{{ route('user.destroy', $user->id)}}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm"" type=" submit"><i class="bi bi-trash3"></i> Supprimer</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Fin du Tableau -->
            </p>
        </div>
    </div>

</div>

@endsection
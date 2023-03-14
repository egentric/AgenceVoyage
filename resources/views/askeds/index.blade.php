@extends('layouts/app')

@section('content')
<div class="col-lg-8 mx-auto mt-4">

    <div class="card">
        <div class="card-header">
            <h4>Demandes</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Liste des demandes</h5>
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
                            <th scope="col">Status</th>
                            <th scope="col">N° de demande</th>
                            <th scope="col">email</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Voyages</th>

                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($askeds as $asked)
                        <tr>

                            <td>{{$askeds->Status}}</td>
                            <td>{{$askeds->id}}</td>
                            <td>{{$askeds->user->email}}</td>
                            <td>{{$askeds->user->firstName}}</td>
                            <td>{{$askeds->user->lastName}}</td>
                            <td>{{$askeds->travels->name}}</td>
                            <td>
                                <a href="{{ route('askeds.show', $user->id)}}" class="btn btnBlue btn-sm"><i class="bi bi-eye icone"></i> Voir</a>
                                <a href="{{ route('askeds.edit', $user->id)}}" class="btn btnBlue btn-sm"><i class=" bi bi-pencil-square"></i> Editer</a>
                                <form action="{{ route('askeds.destroy', $user->id)}}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btnRed btn-sm"" type=" submit"><i class="bi bi-trash3"></i> Supprimer</button>
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
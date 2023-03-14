@extends('layouts/app')

@section('content')
<div class="col-lg-8 mx-auto mt-4">

    <div class="card">
        <div class="card-header">
            <h4>Ville</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Liste des villes</h5>
            <a href="{{ route('cities.create') }}" class="btn btnBlue"><i class="bi bi-file-earmark-plus"></i> Créer</a>
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
                            <th scope="col">Nom</th>
                            <th scope="col">Pays</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cities as $city)
                        <tr>

                            <td>{{$city->name}}</td>
                            <td>Pays</td>
                            <td>
                                <a href="{{ route('cities.edit', $city->id)}}" class="btn btn-sm btnBlue"><i class=" bi bi-pencil-square"></i> Editer</a>
                                <form action="{{ route('cities.destroy', $city->id)}}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btnRed" type=" submit"><i class="bi bi-trash3"></i> Supprimer</button>
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
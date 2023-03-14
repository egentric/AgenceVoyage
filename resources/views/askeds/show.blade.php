@extends('layouts/app')

@section('content')
<div class="col-lg-8 mx-auto mt-4">

    <div class="card">
        <div class="card-header">
            <h4>Demande N°{{ $asked->id }}</h4>
        </div>
        <div class="card-body">

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
    <tbody>
        <tr>
            <th>N°</th>
            <td>{{$askeds->id}}</td>
        </tr>
        <tr>
            <th>Stautus</th>
            <td>{{$askeds->status}}</td>
        </tr>
        <tr>
            <th>Voyage</th>
            <td>{{$askeds->travels->name}}</td>
        </tr>
        <tr>
            <th>Prix</th>
            <td>{{$askeds->travels->price}} /pers</td>
        </tr>
        <tr>
            <th>Nombre de participant</th>
            <td>{{$askeds->numberPeople}}</td>
        </tr>
        <tr>
            <th>Durée</th>
            <td>{{$askeds->travels->duration}}</td>
        </tr>
        <tr>
            <th>Prénom</th>
            <td>{{$askeds->user->firstName}}</td>
        </tr>
        <tr>
            <th>Nom</th>
            <td>{{$askeds->user->lastName}}</td>
        </tr>
        <tr>
            <th>e-mail</th>
            <td>{{$askeds->user->email}}</td>
        </tr>
        <tr>
            <th>Téléphone</th>
            <td>{{$askeds->user->phone}}</td>
        </tr>
        <tr>
            <th>adresse</th>
            <td>{{$askeds->user->address}}</td>
        </tr>
        <tr>
            <th>code Postal</th>
            <td>{{$askeds->user->zip}}</td>
        </tr>
        <tr>
            <th>Ville</th>
            <td>{{$askeds->user->city}}</td>
        </tr>


        <tr>
            <th>Action</th>
            <td><a href="{{ route('askeds.index')}}" class="btn btnBlue btn-sm"><i class="bi bi-arrow-return-left"></i> Retour liste</a>
                <a href="{{ route('askeds.edit', $user->id)}}" class="btn btnBlue btn-sm"><i class=" bi bi-pencil-square"></i> Editer</a>
                <form action="{{ route('askeds.destroy', $user->id)}}" method="POST" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btnRed btn-sm"" type=" submit"><i class="bi bi-trash3"></i> Supprimer</button>
            </td>
        </tr>
    </tbody>
</table>
</div>
<!-- Fin du Tableau -->
</p>
</div>
</div>

</div>

@endsection
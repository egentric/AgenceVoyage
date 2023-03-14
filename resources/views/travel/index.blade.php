@extends('layouts/app')

@section('content')
<div class="col-lg-8 mx-auto mt-4">

    <div class="card">
        <div class="card-header">
            <h4>Voyages</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Liste des voyages</h5>
            <a href="{{ route('travels.create') }}" class="btn btnBlue"><i class="bi bi-file-earmark-plus"></i> Créer</a>

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
                            <th scope="col">Description</th>
                            <th scope="col">Durée</th>
                            <th scope="col">Prix (/pers)</th>
                            <th scope="col">Déstination</th>
                            <th scope="col">Thèmes</th>
                            <th scope="col">Types</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($travels as $travel)
                        <tr>

                            <td>{{$travel->name}}</td>
                            <td>{{$travel->intro}}</td>
                            <td>{{$travel->duration}}</td>
                            <td>{{$travel->price}}€</td>
                            <td>{{$travel->destination->name}} ({{$travel->destination->country->code}})</td>
                            <td>
                                @foreach ($travel->themes as $theme)
                                <span class="badge badge-secondary">{{ $theme->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($travel->types as $type)
                                <span class="badge badge-secondary">{{ $type->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('travels.edit', $travel->id)}}" class="btn btn-sm"><i class=" bi bi-pencil-square"></i> Editer</a>
                                <form action="{{ route('travels.destroy', $travel->id)}}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm" type=" submit"><i class="bi bi-trash3"></i> Supprimer</button>
                                </form>
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
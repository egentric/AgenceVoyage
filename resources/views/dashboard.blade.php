@extends('layouts/app')

@section('content')
<div class="col-lg-8 mx-auto mt-4">

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6 mt-4">
                <a href="{{ route('askeds.index')}}">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="bi bi-bookmarks"></i> Demandes</h4>
                    </div>
                    <div class="card-body">
                        <div class=" table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>N° Demande</th>
                                    <th>N° email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($askeds as $asked)
                                <tr>
                                    <td>{{$asked->status}}</td>
                                    <td>{{$asked->id}}</td>
                                    <td>{{$asked->user->email}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-md-6 mt-4">
                <a href="{{ route('travels.index')}}">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="bi bi-airplane"></i> Voyage</h4>
                    </div>
                    <div class="card-body">
                        <div class=" table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Destination</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($travels as $travel)
                                <tr>
                                    <td>{{$travel->name}}</td>
                                    <td>{{$travel->destination->name}}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-md-3 mt-4">
                <a href="{{ route('themes.index')}}">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="bi bi-clipboard-heart"></i> Thèmes</h4>
                        </div>
                        <div class="card-body">
                            <div class=" table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($themes as $theme)
                                    <tr>
                                        <td>{{$theme->name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mt-4">
                <a href="{{ route('types.index')}}">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="bi bi-house-heart"></i> Types</h4>
                        </div>
                        <div class="card-body">
                            <div class=" table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($types as $type)
                                    <tr>
                                        <td>{{$type->name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mt-4">
                <a href="{{ route('countries.index')}}">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="bi bi-globe-europe-africa"></i> Pays</h4>
                        </div>
                        <div class="card-body">
                            <div class=" table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($countries as $country)
                                    <tr>
                                        <td>{{$country->name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mt-4">
                <a href="{{ route('cities.index')}}">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="bi bi-geo"></i> Villes</h4>
                        </div>
                        <div class="card-body">
                            <div class=" table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cities as $city)
                                    <tr>
                                        <td>{{$city->name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </a>
            </div>




            <div class="col-md-6 mt-4">
                <a href="{{ route('contacts.index')}}">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="bi bi-envelope-at"></i> Contacts</h4>
                        </div>
                        <div class="card-body">
                            <div class=" table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>e-mail</th>
                                        <th>Sujet</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->topic}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </a>
                </div>
    



            <div class="col-md-6 mt-4">
                <a href="{{ route('user.index')}}">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fs-4 bi-people"></i> Utilisateur</h4>
                    </div>
                    <div class="card-body">
                        <div class=" table-responsive">
                    <table class="table">
                            <thead>
                                <tr>
                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th>e-mail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->firstName}}</td>
                                    <td>{{$user->lastName}}</td>
                                    <td>{{$user->email}}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-md-6 mt-4">
            <a href="{{ route('user.edit', $user = Auth::user())}}">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fs-4 bi bi-person"></i> Mon Compte</h4>
                    </div>
                    <div class="card-body">
                        <div class=" table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th>e-mail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$user->firstName}}</td>
                                    <td>{{$user->lastName}}</td>
                                    <td>{{$user->email}}</td>
                                </tr>

                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </a>
            </div>

        </div>
    </div>
</div>
@endsection
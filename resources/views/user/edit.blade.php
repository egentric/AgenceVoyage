@extends('layouts/app')

@section('content')
<div class="col-lg-8 mx-auto mt-4">

    <div class="card">
        <div class="card-header">
            <h4>Mon Compte</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Modifier mes informations</h5>

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

            <!-- Formulaire -->
            <form method="post" action="{{ route('user.update', $user) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <p class="card-text">

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Pseudo</label>
                            <input required type="text" name="pseudo" class="form-control" value="{{ $user->pseudo }}" id='pseudo'>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label>e-mail</label>
                            <input required type="text" name="email" class="form-control" value="{{ $user->email }}" id='email'>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Prénom</label>
                                <input required type="text" name="firstName" class="form-control" value="{{ $user->firstName }}" id='firstName'>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nom</label>
                                <input required type="text" name="lastName" class="form-control" value="{{ $user->lastName }}" id='lastName'>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Adresse</label>
                                <input required type="text" name="address" class="form-control" value="{{ $user->address }}" id='address'>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Code Postal</label>
                                <input required type="text" name="zip" class="form-control" value="{{ $user->zip }}" id='zip'>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>Ville</label>
                                <input required type="text" name="city" class="form-control" value="{{ $user->city }}" id='city'>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>Téléphone</label>
                                <input required type="text" name="phone" class="form-control" value="{{ $user->phone }}" id='phone'>
                            </div>
                        </div>


                    </div>


                </div>
                </p>


                <div class="form-group col-sm-8">
                    <button type="submit" class="btn btnBlue rounded-pillshadow-sm"><i class="bi bi-save2 "></i> Mettre à jour</button>
                    <a href="{{ route('user.index')}}" class="btn btnBlue"><i class="bi bi-arrow-return-left"></i> Retour à la liste</a>
                </form>

            <form action="{{route('user.destroy', $user)}}" method="post">
                @CSRF
                @method('delete')
                <button type="submit" class=" mt-3 btn btnRed">Supprimer le compte</button>
            </form>
        </div>
    </div>
    <!-- Fin du formulaire -->
</div>

@endsection
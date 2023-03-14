@extends('layouts/app')

@section('content')
<div class="col-lg-8 mx-auto mt-4">

    <div class="card">
        <div class="card-header">
            <h4>{{$city->name}}</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Modifier la ville</h5>

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
            <form method="post" action="{{ route('cities.update', $city) }}">
                @csrf
                @method('put')
                <p class="card-text">

                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input required type="text" name="name" class="form-control" value="{{ $city->name }}" id='name'>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label for="country">Pays</label>
                            <select class="form-control" name="country" id="country">
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" @if ($city->idCountry == $country->id) selected @endif >{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                </p>


                <div class="form-group col-sm-8">
                    <button type="submit" class="btn btnBlue rounded-pillshadow-sm"><i class="bi bi-save2 "></i> Modifier</button>
                    <a href="{{ route('cities.index')}}" class="btn btnBlue"><i class="bi bi-arrow-return-left"></i> Retour à la liste</a>
                </div>
            </form>

            <form action="{{route('cities.destroy', $city)}}" method="post">
                @CSRF
                @method('delete')
                <button type="submit" class=" mt-3 btn btnRed">Supprimer le pays</button>
            </form>
        </div>
    </div>
    <!-- Fin du formulaire -->
</div>

@endsection
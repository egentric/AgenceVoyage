@extends('layouts/app')

@section('content')
<div class="col-lg-8 mx-auto mt-4">

    <div class="card">
        <div class="card-header">
            <h4>Ville</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Ajouter une ville</h5>

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
            <form method="post" action="{{ route('cities.store') }}">
                @csrf
                <p class="card-text">

                <div class="row mt-2">
                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input required type="text" name="name" class="form-control" value="{{ old('name') }}" id='name'>
                        </div>
                    </div>
                </div>
                <div class="row mt-2"">

                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label for="country">Pays</label>
                            <select class="form-control" name="country" id="country">
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                </p>


                <div class="form-group col-sm-8">
                    <button type="submit" class="btn btnBlue rounded-pillshadow-sm"><i class="bi bi-save2 "></i> Ajouter</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Fin du formulaire -->
</div>

@endsection
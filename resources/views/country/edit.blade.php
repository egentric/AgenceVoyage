@extends('layouts/app')

@section('content')
<div class="col-lg-8 mx-auto mt-4">

    <div class="card">
        <div class="card-header">
            <h4>{{$country->name}}</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Modifier le pays</h5>

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
            <form method="post" action="{{ route('countries.update', $country) }}">
                @csrf
                @method('put')
                <p class="card-text">

                <div class="row mt-2">
                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input required type="text" name="name" class="form-control" value="{{ $country->name }}" id='name'>
                        </div>
                    </div>
                </div>
                <div class="row mt-2"">

                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label for="code">Code ISO</label>
                            <input required type="text" name="code" class="form-control" value="{{ $country->code }}" id='code'>
                        </div>
                    </div>

                </div>
                </p>


                <div class="form-group col-sm-8">
                    <button type="submit" class="btn btnBlue rounded-pillshadow-sm"><i class="bi bi-save2 "></i> Modifier</button>
                    <a href="{{ route('countries.index')}}" class="btn btnBlue"><i class="bi bi-arrow-return-left"></i> Retour à la liste</a>

                </div>
            </form>

            <form action="{{route('countries.destroy', $country)}}" method="post">
                @CSRF
                @method('delete')
                <button type="submit" class=" mt-3 btn btnRed"><i class="bi bi-trash3"></i> Supprimer le pays</button>
            </form>
        </div>
    </div>
    <!-- Fin du formulaire -->
</div>

@endsection
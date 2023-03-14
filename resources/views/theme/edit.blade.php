@extends('layouts/app')

@section('content')
<div class="col-lg-8 mx-auto mt-4">

    <div class="card">
        <div class="card-header">
            <h4>{{$theme->name}}</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Modifier le thème</h5>

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
            <form method="post" action="{{ route('themes.update', $theme) }}">
                @csrf
                @method('put')
                <p class="card-text">

                <div class="row mt-2">
                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input required type="text" name="name" class="form-control" value="{{ $theme->name }}" id='name'>
                        </div>
                    </div>
                </div>
                <div class="row mt-2"">

                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form-control h-100" rows="2">{{$theme->description}}</textarea>
                        </div>
                    </div>

                </div>
                </p>


                <div class="form-group col-sm-8">
                    <button type="submit" class="btn btnBlue rounded-pillshadow-sm"><i class="bi bi-save2 "></i> Modifier</button>
                    <a href="{{ route('themes.index')}}" class="btn btnBlue"><i class="bi bi-arrow-return-left"></i> Retour à la liste</a>

                </div>
            </form>

            <form action="{{route('themes.destroy', $theme)}}" method="post">
                @CSRF
                @method('delete')
                <button type="submit" class=" mt-3 btn btnRed">Supprimer le thème</button>
            </form>
        </div>
    </div>
    <!-- Fin du formulaire -->
</div>

@endsection
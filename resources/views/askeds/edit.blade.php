@extends('layouts/app')

@section('content')
<div class="col-lg-8 mx-auto mt-4">

    <div class="card">
        <div class="card-header">
            <h4>Demande N° {{ $askeds->id }}</h4>
        </div>

        <div class="card-body">
            <h5 class="card-title">Status {{ $askeds->status }}</h5>

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
            <form method="post" action="{{ route('askeds.update', $asked) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <p class="card-text">

                <div class="row mt-2">
                   
                    <div class="col-sm-6">
                            <div class="form-group">
                                <label>Status</label>
                                <input required type="text" name="status" class="form-control" value="{{ $askeds->status }}" id='status'>
                            </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nombre de participants</label>
                            <input required type="text" name="numberPeople" class="form-control" value="{{ $askeds->numberPeople }}" id='numberPeople'>
                        </div>

                    </div>
                </div>

        </div>
    </div>

    </p>

    <div class="row">

        <div class="form-group col-sm-8">
            <button type="submit" class="btn btnBlue rounded-pillshadow-sm"><i class="bi bi-save2 "></i> Mettre à jour</button>
            <a href="{{ route('askeds.index')}}" class="btn btnBlue"><i class="bi bi-arrow-return-left"></i> Retour à la liste</a>
            </form>

            <form action="{{route('askeds.destroy', $asked)}}" method="post">
                @CSRF
                @method('delete')
                <button type="submit" class=" mt-3 btn btnRed"><i class="bi bi-trash3"></i> Supprimer le compte</button>
            </form>
        </div>
    </div>
</div>
<!-- Fin du formulaire -->
</div>

@endsection
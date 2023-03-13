@extends('layouts/app')

@section('content')
<div class="col-lg-8 mx-auto mt-4">

    <div class="card">
        <div class="card-header">
            <h4>{{$type->name}}</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Modifier le type</h5>

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
            <form method="post" action="{{ route('types.update', $type) }}">
                @csrf
                @method('put')
                <p class="card-text">

                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input required type="text" name="name" class="form-control" value="{{ $type->name }}" id='name'>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form-control h-100" rows="5">{{$type->description}}</textarea>
                        </div>
                    </div>

                </div>
                </p>


                <div class="form-group col-sm-8">
                    <button type="submit" class="btn btnYellow rounded-pillshadow-sm"><i class="bi bi-save2 "></i> Modifier</button>
                </div>
            </form>

            <form action="{{route('types.destroy', $type)}}" method="post">
                @CSRF
                @method('delete')
                <button type="submit" class=" mt-3 btn btnRed">Supprimer le type</button>
            </form>
        </div>
    </div>
    <!-- Fin du formulaire -->
</div>

@endsection
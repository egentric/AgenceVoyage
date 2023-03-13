@extends('layouts/app')

@section('content')
<div class="col-lg-8 mx-auto mt-4">

    <div class="card">
        <div class="card-header">
            <h4>Type</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Ajouter un type</h5>

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
            <form method="post" action="{{ route('types.store') }}">
                @csrf
                <p class="card-text">

                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input required type="text" name="name" class="form-control" value="{{ old('name') }}" id='name'>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form-control h-100" rows="5">{{old('description')}}</textarea>
                        </div>
                    </div>

                </div>
                </p>


                <div class="form-group col-sm-8">
                    <button type="submit" class="btn btnYellow rounded-pillshadow-sm"><i class="bi bi-save2 "></i> Ajouter</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Fin du formulaire -->
</div>

@endsection
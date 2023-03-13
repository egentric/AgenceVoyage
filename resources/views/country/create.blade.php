@extends('layouts/app')

@section('content')
<div class="col-lg-8 mx-auto mt-4">

    <div class="card">
        <div class="card-header">
            <h4>Pays</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Ajouter un pays</h5>

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
            <form method="post" action="{{ route('countries.store') }}">
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
                            <label for="code">Code ISO</label>
                            <input required type="text" name="code" class="form-control" value="{{ old('code') }}" id='code'>
                        </div>
                    </div>

                </div>
                </p>


                <div class="form-group col-sm-8">
                    <button type="submit" class="btn btnblue rounded-pillshadow-sm"><i class="bi bi-save2 "></i> Ajouter</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Fin du formulaire -->
</div>

@endsection
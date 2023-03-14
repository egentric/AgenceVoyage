@extends('layouts/app')

@section('content')
<div class="col-lg-8 mx-auto mt-4" id="travels">

    <div class="card">
        <div class="card-header">
            <h4>{{$travel->name}}</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Modifier un voyage</h5>

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
            <form method="post" action="{{ route('travels.update', $travel) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <p class="card-text">

                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label for="name">Intitulé du voyage</label>
                            <input required type="text" name="name" class="form-control" value="{{ $travel->name }}" id='name'>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label for="intro">Courte description du voyage</label>
                            <textarea id="intro" name="intro" class="form-control h-100" rows="2">{{ $travel->intro }}</textarea>
                        </div>
                    </div>

                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label for="description">Description du voyage</label>
                            <textarea class="ckeditor-description h-100 form-control" id="description" name="description" rows="5">
                            {{ $travel->description }}
                            </textarea>
                        </div>
                    </div>

                    <div class="col-6 mb-4">
                        <div class="form-group">
                            <label for="duration">Durée</label>
                            <input required type="text" name="duration" class="form-control" value="{{ $travel->duration }}" id='duration'>
                        </div>
                    </div>

                    <div class="col-6 mb-4">
                        <div class="form-group">
                            <label for="price">Prix (par personne)</label>
                            <input required type="number" name="price" class="form-control" value="{{ $travel->price }}" id='price'>
                        </div>
                    </div>

                    <div class="col-6 mb-4">
                        <div class="form-group">
                            <label for="departCity">Ville de départ</label>
                            <select class="form-control" name="departCity" id="departCity">
                                @foreach ($cities as $city)
                                <option value="{{ $city->id }}" @if ($city->id === $travel->departCity) selected @endif>{{ $city->name }} ({{ $city->country->code }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-6 mb-4">
                        <div class="form-group">
                            <label for="destinationCity">Destination</label>
                            <select class="form-control" name="destinationCity" id="destinationCity">
                                @foreach ($cities as $city)
                                <option value="{{ $city->id }}" @if ($city->id === $travel->destinationCity) selected @endif>{{ $city->name }} ({{ $city->country->code }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label>Ajouter des images</label>
                            <div class="images-container row">


                                @foreach ($travel->pictures as $key => $picture)
                                <div class="file-input-content">
                                    <input accept="image/*" type="file" name="pictures[]" class="form-control d-none file-input" id="file-{{$key}}">
                                    <label for="file-{{$key}}"><img class="file-preview" src="{{ asset('storage/' . $picture->url) }}"></label>
                                    <input id="file-{{$key}}-name" type="text" name="picturesName[]" class="form-control position-absolute bottom-0 start-0" placeholder="Titre de l'image" value="{{$picture->name}}">
                                    <input type="hidden" name="crtImage[]" value="{{$picture->id}}">
                                    <button class="position-absolute top-0 end-0 btn-del-file" type="button">X</button>
                                </div>
                                @endforeach

                                <button class="btn btn-primary btn-add-file" type="button">+</button>
                            </div>


                        </div>
                    </div>

                    <div class="col-6 mb-4">
                        <div class="list-group list-group-light">
                            <div class="form-group">
                                <label for="destinationCity">Thèmes</label>
                                @foreach($themes as $theme)
                                <li class="list-group-item  list">
                                    <input class="form-check-input check" type="checkbox" value="{{$theme->id}}" id="idTheme-{{$theme->id}}" name="themes[]" @if ($travel->themes->contains($theme->id)) checked @endif />
                                    <label class="form-check-label" for="idTheme-{{$theme->id}}">-{{$theme->name}}</label>
                                </li>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-6 mb-4">
                        <div class="list-group list-group-light">
                            <div class="form-group">
                                <label for="destinationCity">Types</label>
                                @foreach($types as $type)
                                <li class="list-group-item  list">
                                    <input class="form-check-input check" type="checkbox" value="{{$type->id}}" id="idType-{{$type->id}}" name="types[]" @if ($travel->types->contains($type->id)) checked @endif/>
                                    <label class="form-check-label" for="idType-{{$type->id}}">-{{$type->name}}</label>
                                </li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                </p>


                <div class="form-group col-sm-8">
                    <button type="submit" class="btn btnBlue rounded-pillshadow-sm"><i class="bi bi-save2 "></i> Modifier</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Fin du formulaire -->
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    // CKeditor
    ClassicEditor
        .create(document.querySelector('.ckeditor-description'))
        .catch(error => {
            console.error(error);
        });

    // Multiple image preview
    var imageUploadNumber = {{ count($travel->pictures) - 1 }};
    $(document).ready(function() {
        // Increment upload
        $('.btn-add-file').click(function() {
            imageUploadNumber++;
            var htmlData = `<div class="file-input-content">
                                    <input accept="image/*" type="file" name="pictures[]" class="form-control d-none file-input" id="file-${imageUploadNumber}">
                                    <label for="file-${imageUploadNumber}" class="d-none"><img class="file-preview"></label>
                                    <input id="file-${imageUploadNumber}-name" type="text" name="picturesName[]" class="form-control position-absolute bottom-0 start-0" placeholder="Titre de l'image">
                                    <button class="position-absolute top-0 end-0 btn-del-file" type="button">X</button>
                            </div>`;
            console.log(htmlData);
            $('.images-container .btn-add-file').before(htmlData);
            $(`#file-${imageUploadNumber}`).click();
        });

        // Remove image
        $('body').on('click', '.btn-del-file', function() {
            $(this).parents('.file-input-content').remove();
        })

        // Show image on upload
        $('body').on('change', '.file-input', function() {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                let id = this.id;

                reader.onload = function(event) {
                    console.log(id);
                    $(`label[for="${id}"] img`).attr('src', event.target.result);
                    $(`label[for="${id}"]`).removeClass('d-none');
                    $(`#${id}-name`).val(file.name);
                }
                reader.readAsDataURL(file);
            }
        });

    });
</script>
@endsection
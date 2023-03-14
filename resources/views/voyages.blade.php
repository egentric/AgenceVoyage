@extends('layouts/front')
@section('title', 'Agence de voyage : séjour organisé, voyage sur mesure')
@section('meta-desc', "Laissez-nous vous guider à travers les merveilles du monde avec notre agence de voyage. Nous vous offrons une expérience de voyage inoubliable, de la réservation de vols et d'hôtels à la planification de votre itinéraire.")


@section('content')
<section id="hero_banner">
    <div class="container">
    </div>
</section>

<section id="travel_search">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 travel_search_form row">
                <div class="col-4 mb-2">
                    <label class="label-title">Destination</label>
                    <div class="dropdown">
                        <input type="text" class="autocomplete-dropdown form-control" autocomplete="off" />
                        <div class="dropdown-menu">
                            <i class="hasNoResults">Auncun résultat</i>
                            <div class="list-autocomplete">
                                @foreach($cities as $city)
                                <button type="button" class="dropdown-item">{{$city->name}} ({{$city->country->code}})</button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4 mb-2">
                    <label class="label-title">Ville de départ</label>
                    <div class="dropdown">
                        <input type="text" class="autocomplete-dropdown form-control" autocomplete="off" />
                        <div class="dropdown-menu">
                            <i class="hasNoResults">Auncun résultat</i>
                            <div class="list-autocomplete">
                                @foreach($cities as $city)
                                <button type="button" class="dropdown-item">{{$city->name}} ({{$city->country->code}})</button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-4 mb-2">
                    <label class="label-title">Date de départ</label>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-4 mb-2">
                    <label class="label-title">Type</label>
                    <div class="dropdown">
                        <button class="form-control d-flex justify-content-between align-items-center dropdown-toggle" type="button" id="dropdownTypesMenu" data-bs-toggle="dropdown" aria-expanded="false">
                            Sélectionner différent type
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownTypesMenu">
                            @foreach($types as $type)
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$type->id}}" id="typeCheckbox-{{$type->id}}" name="types[]" />
                                        <label class="form-check-label" for="typeCheckbox-{{$type->id}}">{{$type->name}}</label>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>


                <div class="col-4 mb-2">
                    <label class="label-title">Thème</label>
                    <div class="dropdown">
                        <button class="form-control d-flex justify-content-between align-items-center dropdown-toggle" type="button" id="dropdownTMenu" data-bs-toggle="dropdown" aria-expanded="false">
                            Sélectionner différent thèmes
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownTMenu">
                            @foreach($themes as $theme)
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$theme->id}}" id="themeCheckbox-{{$theme->id}}" name="themes[]" />
                                        <label class="form-check-label" for="themeCheckbox-{{$theme->id}}">{{$theme->name}}</label>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-4 mb-2">
                    <button class="btn" type="submit">Rechercher</button>
                </div>
            </div>
        </div>
</section>

<section id="travel_list">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 travel_search_form row">
                <div class="col-lg-12">
                    <h2>{{count($travels)}} Voyage{{count($travels) > 1 ? 's' : ''}}</h2>
                </div>

                @foreach($travels as $travel)
                <div class="col-3 mb-4">
                    <a href="{{ route('travels.show', $travel) }}" class="card">
                        <div class="img-container">
                            @if (!empty($travel->pictures[0]))
                                <img src="{{ asset('storage/'.$travel->pictures[0]->url) }}" alt="{{$travel->pictures[0]->name}}" class="mw-100">
                            @endif
                            <div class="price">
                                <span class="price-num">{{$travel->price}}€</span>
                                <span class="ttc">TTC/PERS.</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3>{{$travel->name}}</h3>
                            <p>{{$travel->destination->country->name}}, {{$travel->destination->name}}</p>
                            <p>{{$travel->duration}}</p>
                        </div>
                    </a>
                </div>
                @endforeach

                {{$travels->links()}}
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts-bottom')
<script>
    // Auto complete
    function createAuto(i, elem) {

        var input = $(elem);
        var dropdown = input.closest('.dropdown');
        var listContainer = dropdown.find('.list-autocomplete');
        var listItems = listContainer.find('.dropdown-item');
        var hasNoResults = dropdown.find('.hasNoResults');

        listItems.hide();
        listItems.each(function() {
            $(this).data('value', $(this).text());
            //!important, keep this copy of the text outside of keyup/input function
        });

        input.on("input", function(e) {

            if ((e.keyCode ? e.keyCode : e.which) == 13) {
                $(this).closest('.dropdown').removeClass('open').removeClass('in');
                return; //if enter key, close dropdown and stop
            }
            if ((e.keyCode ? e.keyCode : e.which) == 9) {
                return; //if tab key, stop
            }


            var query = input.val().toLowerCase();

            if (query.length > 1) {

                dropdown.addClass('open').addClass('in');

                listItems.each(function() {

                    var text = $(this).data('value');
                    if (text.toLowerCase().indexOf(query) > -1) {

                        var textStart = text.toLowerCase().indexOf(query);
                        var textEnd = textStart + query.length;
                        var htmlR = text.substring(0, textStart) + '<em>' + text.substring(textStart, textEnd) + '</em>' + text.substring(textEnd + length);
                        $(this).html(htmlR);
                        $(this).show();

                    } else {

                        $(this).hide();

                    }
                });

                var count = listItems.filter(':visible').length;
                (count > 0) ? hasNoResults.hide(): hasNoResults.show();

            } else {
                listItems.hide();
                dropdown.removeClass('open').removeClass('in');
                hasNoResults.show();
            }
        });

        listItems.on('click', function(e) {
            var txt = $(this).text().replace(/^\s+|\s+$/g, ""); //remove leading and trailing whitespace
            input.val(txt);
            dropdown.removeClass('open').removeClass('in');
        });

    }

    $('.autocomplete-dropdown').each(createAuto);

    $(document).on('focus', '.autocomplete-dropdown', function() {
        $(this).select(); // in case input text already exists
    });

    // Datepicker
    $(function() {
        $('#datetimepicker1').datepicker({
            format: 'mm/dd/yyyy',
        });
    });
</script>
@endsection
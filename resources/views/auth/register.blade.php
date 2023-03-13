<!doctype html>
<html lang="fr">

<head>
    <title>Inscription</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    @vite(['resources/css/app.scss', 'resources/js/app.js'])

</head>

<body id="auth">
    <main>
        <section class="auth-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-5">
                        <div class="auth-wrap p-4 p-md-5 mb-5">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-user-o"></span>
                            </div>
                            <h3 class="text-center mb-4">S'inscrire</h3>
                            @include('components.alert')
                            <form method="POST" action="{{ route('register.register') }}">
                                @csrf

                                <div class="form-group mb-4">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="row">
                                    <div class="form-group mb-4 col">
                                        <label for="firstName">Prénom</label>
                                        <input type="text" class="form-control" id="firstName" name="firstName">
                                    </div>
                                    <div class="form-group mb-4 col">
                                        <label for="lastName">Nom</label>
                                        <input type="text" class="form-control" id="lastName" name="lastName">
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="address">Adresse</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>

                                <div class="row">
                                    <div class="form-group mb-4 col">
                                        <label for="zip">Code Postal</label>
                                        <input type="string" class="form-control" id="zip" name="zip">
                                    </div>
                                    <div class="form-group mb-4 col">
                                        <label for="city">Ville</label>
                                        <input type="text" class="form-control" id="city" name="city">
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="phone">Téléphone</label>
                                    <input type="text" class="form-control" id="phone" name="phone">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password">Mot de passe</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>

                                <div class="form-group mb-4">
                                    <button type="submit" class="btn btn-primary rounded submit p-3 px-5">S'inscrire</button>
                                </div>
                            </form>
                        </div>

                        <a href="{{route('login')}}" class="form-text text-muted text-center d-block">
                            Se connecter
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
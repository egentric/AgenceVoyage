<!doctype html>
<html lang="fr">

<head>
    <title>Mot de passe oublié</title>
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
                            <h3 class="text-center mb-4">Réinitialiser mon mot de passe</h3>
                            @include('components.alert')
                            <form method="POST" action="{{ route('reset.password.post') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group mb-4">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email')}}">
                                </div>

                                <div class="form-group mb-4">
                                    <label for="password">Mot de passe</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>

                                <div class="form-group mb-4">
                                    <label for="password_confirmation">Confirmation</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Réinitialiser</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
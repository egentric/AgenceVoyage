<table class="table">
    <tbody>
        {{-- <tr>
            <th>Id</th>
            <td>{{$user->id}}</td>
        </tr> --}}
        <tr>
            <th>Pseudo</th>
            <td>{{$user->pseudo}}</td>
        </tr>
        <tr>
            <th>email</th>
            <td>{{$user->email}}</td>
        </tr>
        <tr>
            <th>Role</th>
            <td>{{$user->role->role}}</td>
        </tr>
        <tr>
            <th>Nom</th>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <th>Prénom</th>
            <td>{{$user->firstName}}</td>
        </tr>
        <tr>
            <th>Adresse</th>
            <td>{{$user->adress}}</td>
        </tr>
        <tr>
            <th>Code Postal</th>
            <td>{{$user->zip}}</td>
        </tr>
        <tr>
            <th>Ville</th>
            <td>{{$user->city}}</td>
        </tr>
        <tr>
            <th>Téléphone</th>
            <td>($user->phone)</td>
        </tr>

        <tr>
            <th>Action</th>
            <td><a href="{{ route('user.index')}}" class="btn btn-sm"><i class="bi bi-arrow-return-left"></i> Retour liste</a>
                <a href="{{ route('user.edit', $user->id)}}" class="btn btn-sm"><i class=" bi bi-pencil-square"></i> Editer</a>
                <form action="{{ route('user.destroy', $user->id)}}" method="POST" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm"" type=" submit"><i class="bi bi-trash3"></i> Supprimer</button>
            </td>
        </tr>
    </tbody>
</table>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@extends("partials.nav")

@section('content')
    <div class="">
        
        <table class="table table-striped">
            <tr>
                <th>Image</th>
                <th>#ID</th>
                <th>Nom Utilisateur</th>
                <th>Email</th>
                <th>Date_Inscription</th>
                <th>Details</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td><img src=""/></td>
                    <td>{{$user->ID_UTILISATEUR}}</td>
                    <td>{{$user->NOM_UTILISATEUR}}</td>
                    <td>{{$user->EMAIL}}</td>
                    <td>{{$user->DATE_INSCRIPTION}}</td>
                    <td><a href="{{ route('profiles.show', $user->ID_UTILISATEUR) }}" class="btn btn-primary">More details</a></td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="mx-5">
    {{ $users->links() }}
    </div>


@endsection

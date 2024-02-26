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
                    <td>{{$user->id}}</td>
                    <td>{{$user->NOM_UTILISATEUR}}</td>
                    <td>{{$user->EMAIL}}</td>
                    <td>{{$user->DATE_INSCRIPTION}}</td>
                    <td><a href="{{ route('profiles.show', $user->id) }}" class="btn btn-primary">More details</a></td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="mx-5">
    {{ $users->links() }}
    </div>


@endsection

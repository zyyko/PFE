<style>
    .container {
        display: flex;
        margin-left: 30px;
        flex-wrap: wrap; /* Allow flex items to wrap to new line */
    }
    .text-container {
        margin-top: 30px;
        margin-left: 30px;
        flex: 1; /* Take remaining space */
    }
    .group-button {
        margin-top: 30px; /* Adjust as needed */
    }
    @media (max-width: 768px) {
        .container {
            flex-direction: column; /* Display items vertically on small screens */
            align-items: center; /* Center items horizontally */
        }
        .text-container {
            margin-top: 0; /* Remove top margin on small screens */
            margin-left: 0; /* Remove left margin on small screens */
            text-align: center; /* Center text on small screens */
        }
    }
</style>

@extends("partials.nav")

@section('content')
    <div class="container">
        <div>
            <img src="download.png" alt="" style="border-radius: 50%;">
        </div>
        <div class="text-container">
            <div>
                <b>Nom Complet</b>: {{$profile->NOM_UTILISATEUR}} <br/>
                <b>Date inscription</b>: {{$profile->DATE_INSCRIPTION}}<br/>
                <b>Type utilisateur</b>: NULL
            </div>
            <div class="group-button">
                <form action="">
                    <input type="submit" class="btn btn-danger" value="Supprimer"/>
                    <input type="submit" class="btn btn-primary" value="Notifier"/>
                    <input type="submit" class="btn btn-warning" value="Bannir"/>
                </form>
            </div>
        </div>
    </div>
    <div>
        <h4 class="mx-5 mt-3">Les reservations </h4>
        <table>
            
        </table>
    </div>
@endsection

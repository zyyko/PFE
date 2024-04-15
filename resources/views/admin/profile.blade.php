<x-layout>
    <x-slot name="header">
        {{ __('Reservateurs') }}
    </x-slot>
    <x-panel class="flex justify-center items-center">
        <div>

            <div class="flex justify-center items-center">
                <img src="download.png" class="" style="border-radius: 50%;s">
            </div>
            <div class="text-container text-center">
                <div>
                    <b>Nom Complet</b>: {{$profile->NOM_UTILISATEUR}} <br/>
                    <b>Date inscription</b>: {{$profile->DATE_INSCRIPTION}}<br/>
                    <b>Compte status</b>: {{$profile->compte_status}}<br/>
                </div>
                <div class="group-button mt-3">
                    <Link modal href="{{route('show.delete',[$profile->id, $profile->NOM_UTILISATEUR])}}"class="font-bold text-white bg-red-500 px-4 py-2 mr-4 rounded">Supprimer</Link>
                        @if ($profile->compte_status == "BANNED")
                            <Link modal href="{{route('show.débannir',[$profile->id, $profile->NOM_UTILISATEUR])}}"class="font-bold text-white bg-blue-500 px-4 py-2 mr-4 rounded">Débannir</Link>
                        @else
                            <Link slideover href="{{route('show.bannir',[$profile->id, $profile->NOM_UTILISATEUR])}}" class="font-bold text-white bg-orange-500 px-4 py-2 mr-4 rounded">Bannir</Link>
                        @endif
                        <Link modal href="{{ route('show.notify', $profile->email) }}" class="font-bold text-white bg-green-500 px-4 py-2 mr-4 rounded">Notifier</Link>
                </div>  
            </div>
        </div>
        <div>
        </div> 
        
    </x-panel>
    
    <div class="max-w-7xl mx-auto p-8">
        <x-splade-table :for="$reservations" >
        </x-splade-table>
      </div>

</x-layout>



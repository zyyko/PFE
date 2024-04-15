

<x-splade-modal>
    <x-splade-form method="post" action="{{route('user.delete', request('profile'), request('profilename'))}}">
        <h1 style="">Veuillez-vous vraiment supprimer l'utilisateur <strong>{{request('profilename')}}</strong></h1>
        (<i style="color: red;">Vous ne pouvez pas revenir en arrière une fois que l'action est confirmée.</i>)
        <div class="flex justify-center">
            <x-splade-submit name="search" class="font-bold text-white bg-red-500 px-4 py-2 mt-4 rounded">Supprimer</x-splade-submit>
            <button type="button" class="font-bold text-white bg-gray-500 px-4 py-2 mt-4 rounded mx-3" @click="modal.close">Cancel</button>
        </div>
    </x-splade-form>
</x-splade-modal>
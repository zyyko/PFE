<x-splade-modal>
    <x-splade-form method="post" action="{{ route('accept', request('id')) }}">

        <h1 style="">Veuillez-vous vraiment accepter l'immobilier de l'utilisateur {{ request('id') }}?
            <strong>{{ request('profilename') }}</strong>
        </h1>
        <div class="flex justify-center">
            <x-splade-submit name="search"
                class="font-bold text-white bg-green-500 px-4 py-2 mt-4 rounded">Accepter</x-splade-submit>
            <button type="button" class="font-bold text-white bg-gray-500 px-4 py-2 mt-4 rounded mx-3"
                @click="modal.close">Cancel</button>

        </div>
    </x-splade-form>
</x-splade-modal>

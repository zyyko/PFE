<x-splade-modal>
    <x-splade-form method="post" action="{{ route('accept', request('profile')) }}">
        <h1 style="color:red;">Raison de l'interdiction</h1>
        <x-splade-textarea name="reason" id="" cols="50" rows="10" placeholder="Your reason ..." />
        <x-splade-submit name="search" class="font-bold text-white bg-red-500 px-4 py-2 mt-4 rounded" />
    </x-splade-form>
</x-splade-modal>

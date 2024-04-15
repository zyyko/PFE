<x-splade-modal> 
    <x-splade-form method="post" action="{{route('user.notify', request('profile'))}}">
        <h1 style="font-weight: 800;">Title : <x-splade-input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="title" name="title"/></h1>
        <x-splade-textarea name="content" id="" cols="50" rows="10" placeholder="Contenu ..." />
        <x-splade-submit name="search" class="font-bold text-white bg-red-500 px-4 py-2 mt-4 rounded" />
    </x-splade-form>

</x-splade-modal>

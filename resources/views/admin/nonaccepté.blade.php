<x-layout>

    <x-slot name="header">
        {{ __('Immobiliers non acceptés') }}
    </x-slot>

    <div class="max-w-7xl mx-auto p-8">
        <x-splade-table :for="$immobiliersNonAcceptes">
            @cell('action', $immobilierNonAccepte)
                <Link modal href="{{ route('profile.immobilier', $immobilierNonAccepte->ID_IMMOBILIER) }}"
                    class="font-bold text-white bg-blue-500 px-4 py-2 mr-4 rounded">
                More details</Link>
            @endcell
        </x-splade-table>
    </div>
</x-layout>

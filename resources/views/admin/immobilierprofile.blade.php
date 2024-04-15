<x-layout>
    <x-slot name="header">
        {{ __('Immobiliers non accepté') }}
    </x-slot>

    <x-panel class="flex justify-center items-center flex-wrap">
        <div class="w-full p-4 mt-4">
            <div class="bg-gray-100 rounded-lg p-4">
                <h2 class="text-2xl font-bold mb-4">Informations sur l'immobilier</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p><span class="font-semibold">Type:</span> {{ $immobilierInfos->TYPE }}</p>
                        <p><span class="font-semibold">Surface:</span> {{ $immobilierInfos->Surface }}</p>
                        <p><span class="font-semibold">Prix:</span> {{ $immobilierInfos->Prix }}</p>
                    </div>
                    <div>
                        <p><span class="font-semibold">Climatisation:</span>
                            {{ $immobilierInfos->climatisation ? 'Yes' : 'No' }}</p>
                        <p><span class="font-semibold">Garage:</span> {{ $immobilierInfos->garage ? 'Yes' : 'No' }}</p>
                        <p><span class="font-semibold">Cuisine Equipé:</span>
                            {{ $immobilierInfos->cuisine_equipee ? 'Yes' : 'No' }}</p>
                        <p><span class="font-semibold">Chauffage Central:</span>
                            {{ $immobilierInfos->chauffage_central ? 'Yes' : 'No' }}</p>
                        <p><span class="font-semibold">Wifi:</span> {{ $immobilierInfos->wifi ? 'Yes' : 'No' }}</p>
                        <p><span class="font-semibold">TV:</span> {{ $immobilierInfos->tv ? 'Yes' : 'No' }}</p>
                        <!-- Add more characteristics as needed -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Main photo section -->
        <div class="w-full md:w-1/2 lg:w-1/2 p-4">
            @foreach ($result as $key => $item)
                @if ($key === 'main_photo')
                    <div class="relative flex">
                        <img class="w-full h-auto rounded-lg border border-gray-300"
                            src="{{ asset('storage/' . $item) }}" alt="Main Photo">
                        <div
                            class="absolute inset-0 flex flex-col justify-center items-center bg-black bg-opacity-50 text-white opacity-0 transition-opacity duration-300 hover:opacity-100">
                            <h3 class="text-center">Main Photo</h3>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Additional photos section -->
        <div class="w-full md:w-1/2 lg:w-1/4 p-4">
            @foreach ($result as $key => $item)
                @if ($key !== 'main_photo' && $loop->index < 3)
                    <div class="relative mb-4">
                        <img class="w-full h-auto rounded-lg border border-gray-300"
                            src="{{ asset('storage/' . $item->file_name) }}" alt="Additional Image">
                        <div
                            class="absolute inset-0 flex flex-col justify-center items-center bg-black bg-opacity-50 text-white opacity-0 transition-opacity duration-300 hover:opacity-100">
                            <h3 class="text-center">Additional Image</h3>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Additional photos section for the next line -->
        <div class="w-full p-4 mt-4 flex justify-center">
            @foreach ($result as $key => $item)
                @if ($key !== 'main_photo' && $loop->index >= 3)
                    <div class="relative mb-4 mr-4">
                        <img class="h-auto rounded-lg border border-gray-300"
                            src="{{ asset('storage/' . $item->file_name) }}" alt="Additional Image">
                        <div
                            class="absolute inset-0 flex flex-col justify-center items-center bg-black bg-opacity-50 text-white opacity-0 transition-opacity duration-300 hover:opacity-100">
                            <h3 class="text-center">Additional Image</h3>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Description section -->
        <!-- Description section -->
        <div class="w-full p-4 mt-4">
            <div class="bg-gray-100 rounded-lg p-4">
                <h2 class="text-2xl font-bold mb-4">Description</h2>
                <p>{{ $immobilierInfos->Description }}</p>
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">
                    <Link modal href="{{ route('accept.immoblier', $immobilierInfos->ID_UTILISATEUR) }}">Accepter
                    </Link>
                </button>
            </div>
        </div>
    </x-panel>
</x-layout>

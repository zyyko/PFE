<x-layout>

    <x-slot name="header">
      {{ __('Reservateurs') }}
    </x-slot>
  
    <div class="max-w-7xl mx-auto p-8">
      <x-splade-table :for="$users"/>
    </div>
</x-layout>
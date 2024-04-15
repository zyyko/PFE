<x-layout>

    <x-slot name="header">
      {{ __('Reservateurs') }}
    </x-slot>

    @if(!auth('administrators')->check())
    <?php
    header("Location: /admin/login");
    exit;
    ?>
    @endif
    
    <div class="max-w-7xl mx-auto p-8">
      <x-splade-table :for="$users" >
        @cell('action', $user)
        <Link href="{{route('profiles.show', $user->id)}}" class="font-bold text-indigo-600">More details</Link>
        @endcell
      </x-splade-table>
    </div>
</x-layout>


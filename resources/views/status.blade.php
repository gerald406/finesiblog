<x-layouts.app :title="__('Dashboard')">

    <x-container>
        <h2 class="text-lg mb-4 text-gray-500">Solicitud de Amigos</h2>
        @foreach ($requests as $request)
            <x-card class="mb-4">
                <div class="flex justify-between">
                    {{ $request->name }}
                    <form action="{{ route('friends.update', $request )}}" method="post">
                        @csrf
                        @method('PUT')
                    
                        <input type="submit" class="px-4 py-2 bg-yellow-400 text-gray-800 font-semibold sm:rounded-lg text-xs" value="Confirmar Amigo">
                    </form>
                </div>
            </x-card>
        @endforeach

        <h2 class="text-lg mb-4 text-gray-500">Solicitud de Enviadas</h2>
        @foreach ($sent as $request)
            <x-card class="mb-4">
                {{ $request->name }}
            </x-card>
        @endforeach
    </x-container>
</x-layouts.app>

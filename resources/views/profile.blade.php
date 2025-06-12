<x-layouts.app :title="__('Dashboard')">

    <x-container>
        <form action="{{ route('friends.store', $user) }}" method="POST" class="mb-8">
            @csrf
            <input type="submit" class="px-4 py-2 bg-yellow-400 text-gray-800 font-semibold sm:rounded-lg text-xs" value="Solicitar Amistad">
        </form>
        @foreach ($posts as $post)
            <x-card class="mb-4">
                {{ $post->body }}
                <div class="text-xs text-stale-500">
                    <span>{{ $post->created_at->diffForHumans() }}</span>
                </div>
            </x-card>
        @endforeach
    </x-container>
</x-layouts.app>

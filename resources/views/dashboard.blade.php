<x-layouts.app :title="__('Dashboard')">

    <x-container>
    
        @foreach ($posts as $post)
            <a href="{{ route('profile.show', $post->user) }}" class="px-6 mb-2 flex items-center gap-2 font-medium text-stale-100">
                <svg class="h-4" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z">
                    </path>
                </svg>
                {{ $post->user->name }}
            </a>
            <x-card class="mb-4">
                {{ $post->body }}
                <div class="text-xs text-stale-500">
                    <span>{{ $post->created_at->diffForHumans() }}</span>
                </div>
            </x-card>
        @endforeach
    </x-container>
</x-layouts.app>

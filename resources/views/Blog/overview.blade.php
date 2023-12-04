<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Blogs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($blogs as $blog)
            <div style="margin-bottom: .5rem;" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("$blog->title") }}
                    <a href="{{ route('blog.show', $blog->id) }}" style="float: right; margin-left: .5rem;">
                        <span class="material-symbols-outlined" style="font-size:1rem; font-weight: 900; color: #fff;">
                            visibility
                        </span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
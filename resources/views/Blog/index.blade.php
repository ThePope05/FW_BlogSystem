<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your Blogs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($blogs as $blog)
            <div style="margin-bottom: .5rem;" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("$blog->title") }}
                    <form action="{{ route('blog.show', $blog) }}" method="GET">
                        @csrf
                        <button type="submit" style="float: right;">
                            <span class="material-symbols-outlined" style="font-size:1rem; font-weight: 900;">
                                visibility
                            </span>
                        </button>
                    </form>
                    <form action="{{ route('blog.destroy', $blog) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" style="float: right;">
                            <span class="material-symbols-outlined" style="font-size:1rem; font-weight: 900; color:red;">
                                delete
                            </span>
                        </button>
                    </form>
                    <form action="{{ route('blog.edit', $blog) }}" method="GET">
                        @csrf
                        <button type="submit" style="float: right;">
                            <span class="material-symbols-outlined" style="font-size:1rem; font-weight: 900;">
                                edit
                            </span>
                        </button>
                    </form>
                </div>
            </div>
            @endforeach

            <div style="margin-bottom: .5rem;" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('blog.create') }}" style="width: 100%;">
                        <span class="material-symbols-outlined" style="width: 100%; text-align:center; font-size:3rem; font-weight: 900;">
                            add
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
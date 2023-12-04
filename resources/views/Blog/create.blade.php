<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?= isset($blog) ? "Edit Blog" : 'New Blog' ?>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="<?= isset($blog) ? route('blog.update', $blog) : route('blog.store') ?>" method="POST">
                @csrf
                <?= isset($blog) ? method_field('PATCH') : '' ?>
                <input type="text" placeholder="Title" name="title" style="
                                                                    Background-Color:rgb(31 41 55);
                                                                    Padding: 1.5rem;
                                                                    Border-radius: .5rem;
                                                                    Width: 100%;
                                                                    Border: none;
                                                                    Font-Size: 2rem;
                                                                    Color: rgb(229 231 235);
                                                                    Margin-Bottom: .5rem;" value="<?= isset($blog) ? $blog->title : '' ?>">

                <input type="text" placeholder="Body" name="body" style="
                                                                    Background-Color:rgb(31 41 55);
                                                                    Padding: 1.5rem;
                                                                    Border-radius: .5rem;
                                                                    Width: 100%;
                                                                    Border: none;
                                                                    Font-Size: 1rem;
                                                                    Color: rgb(229 231 235);
                                                                    Margin-Bottom: .5rem;" value="<?= isset($blog) ? $blog->body : '' ?>">

                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <button type="submit" style="
                                        Background-Color:rgb(31 41 55);
                                        Padding: 1.5rem;
                                        Border-radius: .5rem;
                                        Width: 100%;
                                        Border: none;
                                        Font-Size: 1rem;
                                        Color: rgb(229 231 235);">
                    Publish
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
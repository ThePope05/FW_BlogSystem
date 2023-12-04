<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 type="text" placeholder="Title" name="title" style="
                                                                    Background-Color:rgb(31 41 55);
                                                                    Padding: 1.5rem;
                                                                    Border-radius: .5rem;
                                                                    Width: 100%;
                                                                    Border: none;
                                                                    Font-Size: 2rem;
                                                                    Color: rgb(229 231 235);
                                                                    Margin-Bottom: .5rem;">
                <?= isset($blog) ? $blog->title : '' ?>
            </h2>

            <p type="text" placeholder="Body" name="body" style="
                                                                    Background-Color:rgb(31 41 55);
                                                                    Padding: 1.5rem;
                                                                    Border-radius: .5rem;
                                                                    Width: 100%;
                                                                    Border: none;
                                                                    Font-Size: 1rem;
                                                                    Color: rgb(229 231 235);
                                                                    Margin-Bottom: .5rem;">
                <?= isset($blog) ? $blog->body : '' ?>
            </p>
            <div style="margin-bottom: .5rem;background-color: rgb(23 30 44);" class="overflow-hidden shadow-sm sm:rounded-lg">
                <h2 style="color: rgb(229 231 235); padding: .5rem 1.5rem; font-size: 1.5rem;">Comments</h2>
                @foreach ($comments as $comment)
                <div class="p-6 text-gray-900 dark:text-gray-100" style="padding: .2rem 1.5rem;">
                    {{ __("$comment->comment") }}
                </div>
                @endforeach
            </div>
            <form action="{{ route('comment.store') }}" method="POST">
                @csrf
                <input type="text" placeholder="Comment" name="comment" style="
                                                                    background-color: rgb(23 30 44);
                                                                    Padding: .5rem 1.5rem;
                                                                    Border-radius: .5rem .5rem 0 0;
                                                                    Width: 100%;
                                                                    Border: none;
                                                                    Font-Size: 1rem;
                                                                    Color: rgb(229 231 235);">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                <button type="submit" style="
                                        background-color: rgb(23 30 44);
                                        Padding: .5rem;
                                        Border-radius: 0 0 .5rem .5rem;
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
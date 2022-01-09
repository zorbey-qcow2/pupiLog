@props(['post'])
<article
    {{$attributes->merge (['class' => "transition-colors duration-300 bg-slate-900 hover:bg-slate-800 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl mt-4 ml-4"])}}>
    <div class="py-6 px-5">
        <div>
            <img src="{{ asset('/storage/' . $post->thumbnail) }}" alt="" class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2">
                    <x-category-button :category="$post->category"/>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl text-teal-800">
                        <a href="/posts/{{$post->slug}}">{{ $post->title }}</a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                                        <time>{{ $post->created_at->diffForHumans() }} yayınlandı</time>
                                    </span>
                </div>
            </header>

            <div class="text-sm mt-4 text-green-700">
                <p>
                    {{$post->excerpt}}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="{{   $post->author->avatar ? asset('/storage/' . $post->author->avatar) : '/storage/thumbnails/avatar.png' }}" alt="">
                    <div class="ml-3">
                        <h5 class="font-bold text-red-900"><a
                                href="/?author={{$post->author->username}}">{{ $post->author->username }}</a></h5>
{{--                        <h6>Mascot at Laracasts</h6>--}}
                    </div>
                </div>

                <div>
                    <a href="/posts/{{$post->slug}}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Devam et</a>
                </div>
            </footer>
        </div>
    </div>
</article>

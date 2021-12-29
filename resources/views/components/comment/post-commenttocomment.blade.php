@props(['comtocom'])
<div class="bg-gray-50 p-6 rounded-xl">
<article class="flex space-x-4 bg-green-100">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60?u={{ $comtocom->user_id }}" alt="" width="60" height="60"
             class="rounded-xl">
    </div>

    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{ $comtocom->author->username }}</h3>
            <p class="text-xs">
                {{--                        <time>{{ $comtocom->created_at->diffForHumans() }} yazıldı</time>--}}
            </p>
        </header>

        <p class="text-red-500">{{ $comtocom->body }}</p>
    </div>

</article>
</div>

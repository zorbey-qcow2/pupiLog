@props(['comment','isSubCom' => false])
<x-panel class="bg-gray-50">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u={{ $comment->user_id }}" alt="" width="60" height="60"
                 class="rounded-xl">
        </div>

        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{ $comment->author->username }}</h3>
                <p class="text-xs">
                    <time>{{ $comment->created_at->diffForHumans() }} yazıldı</time>
                </p>
            </header>

            <p>{{ $comment->body }} </p>
            @if($isSubCom == false)
                @auth()
                    <button class="mt-1 text-teal-800">
                        <a href="{{Request::url() . '/' . $comment->id}}">Yanıtla</a></button>
                @endauth
            @endif
            <div class="border-t mt-2 pl-4">@include('like.like', ['model' => $comment])</div>
        </div>

    </article>
    @if($comment->comtocoms)
        @foreach($comment->comtocoms->sortByDesc("created_at") as $comtocom)
            <x-comment.post-commenttocomment :comtocom="$comtocom"/>
        @endforeach
    @endif
</x-panel>

@props(['post','comment','commentposttitle','isSubCom' => false])
@auth()
    <x-panel>
        @if($isSubCom == true)
            <form method="POST" action="/posts/{{ $post->slug }}/{{$comment->id}}">
                @else
                    <form method="POST" action="/posts/{{ $post->slug }}/comments">
                        @endif
                        @csrf
                        <header class="flex items-center">
                            <img src="{{   auth()->user()->avatar ? asset('/storage/' . auth()->user()->avatar) : '/storage/thumbnails/avatar.png' }}" alt="" width="40" height="40" class="rounded-full">
                            <h2 class="ml-4 text-pink-900">{{$commentposttitle ?? 'hata'}}</h2>
                        </header>

                        <div class="mt-6">
                                <textarea name="body" class="w-full text-sm bg-green-100 focus:outline-none focus:ring"
                                          cols="30"
                                          rows="5"
                                          placeholder="Beyinden binary'e birşeyler aktar!"
                                          required></textarea>
                            @error('body')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
                            <x-form.submit-button>Ateşle</x-form.submit-button>
                        </div>
                    </form>
    </x-panel>
@else
    <p class="font-semibold">
        <span class="text-white">Yorum bırakmak için</span>
        <a href="/register" class="text-purple-600 hover:underline">kayıt ol</a> <span class="text-white">ya da</span>
        <a href="/login" class="text-purple-600 hover:underline">giriş yap</a>
    </p>
@endauth

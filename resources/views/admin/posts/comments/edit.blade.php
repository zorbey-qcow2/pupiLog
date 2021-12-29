<x-layout>
    <x-slot name="content">
        <section class="px-6 py-8">
            <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
                <article class="max-w-4xl mx-auto">
                    <x-comeback link="/admin/comments">Panel'e dön</x-comeback>
                    <section class="col-span-8 space-y-6">
                        <h1 class="text-red-500 underline text-xl text-center">Düzenlenen Yorum: </h1>
                        <x-comment.post-comment :comment="$comment" :isSubCom="true"/>
                        <x-panel>
                            <h1 class="text-blue-300 text-xl mb-6">Ait olduğu post:</h1>
                            <a class="text-white" href="/posts/{{$comment->post->slug}}">=> {{$comment->post->title}}</a>
                            <form method="POST" action="/admin/posts/comment/{{$comment->id}}/update" class="mt-10">
                                @csrf
                                @method('PATCH')
                                <x-form.input name="username" autocomplete="username"
                                              value="{{$comment->author->username}}"/>
                                <x-form.textarea name="body">{{$comment->body}}</x-form.textarea>
                                <x-form.input name="created_at" value="{{$comment->created_at}}"/>
                                <x-form.submit-button>Düzenle</x-form.submit-button>
                            </form>
                        </x-panel>
                    </section>
                </article>
            </main>
        </section>
    </x-slot>
</x-layout>

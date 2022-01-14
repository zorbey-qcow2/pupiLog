<x-layout>
    <x-slot name="content">
        <x-usercp-settings heading="User Control Panel:">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 text-white">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                        <div class="mb-6">
                            <img
                                src="{{   $user->avatar ? asset('/storage/' . $user->avatar) : '/storage/avatar/avatar.png' }}"
                                alt="" class="rounded-xl ml-6" width="120">
                        </div>

                        <p class="mb-4"><span class="text-red-500">Kullanıcı:</span> {{$user->username}}</p>
                        @if($user->epigram)
                        <p class="text-red-500">Seni tanımlayan Epigram: <span class="text-white">{{$user->epigram}}</span></p>
                        @endif
                        <p class=""><span class="text-red-500">Toplam Yorum:</span> {{$user->comments->count() + $user->comtocoms->count()}}</p>
                        <p class=""><span class="text-red-500">Onaylanan Yorum:</span> {{ $publishedCommentCount }}</p>

                    </div>
                </div>
            </div>

        </x-usercp-settings>
    </x-slot>
</x-layout>

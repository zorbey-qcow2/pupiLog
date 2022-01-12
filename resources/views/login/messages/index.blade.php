<x-layout>
    <x-slot name="content">
        <x-usercp-settings heading="User Control Panel:">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-gray-200 text-center">
                            <a class="border p-2 bg-slate-800 text-white" href="/usercp/newmessage">Yeni Mesaj
                            </a>
                        </div>
                    </div>
                </div>

                {{--                check:--}}
                {{--                $user->load(['messages.conversation.users' => fn ($q) => $q->where('id', '<>', $user->id)]) ... @foreach ($user->messages as $message)    participants: {{ $message->conversation->users->join(', ') }}  @endforeach--}}
                {{--                and check only:--}}
                {{--                $user->load('messages.conversation.users');--}}

                @if($user->conversations()->exists())
                    <p class="text-white">Mesajlar</p>
                    @foreach($user->conversations as $conversation)
                        <div class="mt-8">
                            <a href="/usercp/readmessage/{{$conversation->id}}"><p class="text-white"><span
                                        class="text-blue-300">Konu:</span> {{ $conversation->subject }}</p></a>
                            <p class="text-white"><span
                                    class="text-red-500">Son Mesaj:</span> {{ $conversation->lastMessage?->body }}
                                [Seen]</p>
                            <p class="text-white"><span
                                    class="text-blue-300">Katılımcılar:</span> {{ $conversation->users->pluck('username')->join(', ') }}
                            </p>
                        </div>
                    @endforeach
                @else
                    <p class="text-white">Mesaj kutun boş!</p>
                @endif
            </div>

        </x-usercp-settings>
    </x-slot>
</x-layout>

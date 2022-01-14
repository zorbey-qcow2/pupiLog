<x-layout>
    <x-slot name="content">
        <x-usercp-settings heading="User Control Panel:">
            <div class="flex flex-col">
                @if($user->conversations()->exists())
                    <p class="text-white">Bildirimler</p>
                    @foreach($user->conversations as $conversation)
                        <div class="mt-8">
                            <a href="/usercp/readmessage/{{$conversation->id}}"><p class="text-white"><span
                                        class="text-blue-300">Konu:</span> {{ $conversation->subject }}</p></a>
                            <p class="text-white"><span
                                    class="text-red-500">Bildiri:</span> {{ $conversation->lastMessage?->body }}
                            </p>
                            <p class="text-white"><span
                                    class="text-blue-300">Gönderen:</span> {{ $conversation->users->pluck('username')->join(', ') }}
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

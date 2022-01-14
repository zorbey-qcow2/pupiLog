<x-layout>
    <x-slot name="content">
        <x-usercp-settings heading="User Control Panel:">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-gray-200 text-center">
                            <x-comeback link="/usercp/messages">Mesajlara dön</x-comeback>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <p class="text-white"><span class="text-blue-300">Konu:</span> {{ $conversation->subject }}</p>
                    <p class="text-white mb-4"><span
                            class="text-blue-300">Katılımcılar:</span> {{ $conversation->users->pluck('username')->join(', ') }}
                    </p>

                    @foreach($conversation->messages as $con)
                        <p class="text-white"><span
                                class="text-red-500">{{$con->user->username}}:</span> {{ $con->body }} </p>
                    @endforeach

                    <div class="border p-6 border-blue-300 rounded-md mt-10">
                        <form method="POST" action="/usercp/replymessage/{{$conversation->id}}">
                            @csrf
                            <x-form.textarea name="body"></x-form.textarea>
                            <x-form.submit-button>Gönder</x-form.submit-button>
                        </form>
                    </div>

                </div>

            </div>

        </x-usercp-settings>
    </x-slot>
</x-layout>

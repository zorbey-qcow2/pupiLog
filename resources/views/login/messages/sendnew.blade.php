<x-layout>
    <x-slot name="content">
        <x-usercp-settings heading="User Control Panel:">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden">
                            <form action="/usercp/sendmessage" method="POST">
                                @csrf
                                <x-form.input name="username"/>
                                <x-form.input name="title"/>
                                <x-form.textarea name="body"></x-form.textarea>
                                <x-form.submit-button>Gönder</x-form.submit-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </x-usercp-settings>
    </x-slot>
</x-layout>

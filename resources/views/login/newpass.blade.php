<x-layout>
    <x-slot name="content">
        <section class="px-6 py-8">
            <main class="max-w-lg mx-auto mt-10">
                <x-panel>
                    <h1 class="text-center font-bold text-xl text-teal-800">{{ucwords($username)}} için Yeni Şifre!</h1>
                    <form method="POST" action="/newpass/{{$username}}" class="mt-10">
                        @csrf
                        <x-form.input name="password" type="password"/>
                        <x-form.submit-button>Belirle</x-form.submit-button>
                    </form>
                </x-panel>
            </main>
        </section>
    </x-slot>
</x-layout>

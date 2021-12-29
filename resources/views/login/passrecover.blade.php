<x-layout>
    <x-slot name="content">
        <section class="px-6 py-8">
            <main class="max-w-lg mx-auto mt-10">
                <x-panel>
                    <h1 class="text-center font-bold text-xl text-teal-800">Şifre Yenileme!</h1>
                    <form method="POST" action="/forgotpass" class="mt-10">
                        @csrf

                        <x-form.input name="username" autocomplete="username"/>
                        <x-form.textarea name="mnemonic"/>
                        <x-form.captcha/>

                        <x-form.submit-button>Devam</x-form.submit-button>
                    </form>
                </x-panel>
            </main>
        </section>
    </x-slot>
</x-layout>

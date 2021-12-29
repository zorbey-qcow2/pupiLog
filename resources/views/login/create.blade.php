<x-layout>
    <x-slot name="content">
        <section class="px-6 py-8">
            <main class="max-w-lg mx-auto mt-10">
                <x-panel>
                    <h1 class="text-center font-bold text-xl text-teal-800">Giriş Yap!</h1>
                    <div class="mt-6 text-right text-sm"><a href="forgotpass" class="text-white">[Şifremi Unuttum]</a></div>
                    <form method="POST" action="/login" class="mt-10">
                        @csrf

                        <x-form.input name="username" autocomplete="username"/>
                        <x-form.input name="password" type="password"/>
                        <x-form.captcha/>

                        <x-form.submit-button>Gir</x-form.submit-button>
                    </form>
                </x-panel>
            </main>
        </section>
    </x-slot>
</x-layout>

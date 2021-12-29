<x-layout>
    <x-slot name="content">
        <section class="px-6 py-8">
            <main class="max-w-lg mx-auto mt-10  border border-gray-200 p-6 rounded-xl text-teal-800">
                <h1 class="text-center font-bold text-xl">Kayıt ol!</h1>
                <form method="POST" action="/register" class="mt-10">
                    @csrf
                    <x-form.input name="username"/>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-500">
                            Eposta (zorunlu değil)
                        </label>
                        <input class="border border-gray-200 p-2 w-full rounded"
                               type="email"
                               name="email"
                               id="email"
                               value="{{ old('email') }}"
                        >
                        <x-form.error name="email"/>
                    </div>
                    <x-form.input name="password" type="password" autocomplete="new-password"/>
                    <x-form.captcha/>
                    <x-form.div>
                        <x-form.submit-button>Hesap oluştur</x-form.submit-button>
                    </x-form.div>
                </form>
            </main>
        </section>
    </x-slot>
</x-layout>

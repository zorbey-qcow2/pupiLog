<x-layout>
    <x-slot name="content">
        <section class="px-6 py-8">
            <main class="max-w-lg mx-auto mt-10  border border-gray-200 p-6 rounded-xl text-teal-800">
                <h1 class="text-center font-bold text-xl">Hoşgeldin <span
                        class="text-gray-500">{{request()->user()->username}}</span>,</h1>
                <h2 class="text-center text-bold text-lg mt-6 text-teal-700">Hesap kurtarımı için aşağıdaki 15 kelimelik
                    mnemonic anahtarını
                    not al:</h2>
                <div class="max-w-lg mx-auto mt-10  border border-gray-200 p-6 rounded-xl text-teal-800">
                    <p class="font-bold text-xl text-white">{{ $mnemonicWords }}</p>
                </div>
                <div class="mt-6 text-center">
                    <form method="POST" action="/hosgeldin">
                        @csrf
                        @method('PATCH')
                        <button type="submit" name="submit" value="Save"
                                class="px-2 py-2 inline-flex text-xl leading-5 font-semibold rounded-md bg-green-100 text-green-800">
                            Kaydettim
                        </button>
                    </form>
                </div>
            </main>
        </section>
    </x-slot>
</x-layout>

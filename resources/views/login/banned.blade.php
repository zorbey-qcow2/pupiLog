<x-layout>
    <x-slot name="content">
        <section class="px-6 py-8">
            <main class="max-w-lg mx-auto mt-10">
                <x-panel>
                    <h1 class="text-center font-bold text-xl text-teal-800">Banned!!!!!</h1>
                    <h2 class="text-white">Reason: {{ auth()->user()->ban_reason }}</h2>
                </x-panel>
            </main>
        </section>
    </x-slot>
</x-layout>

<!doctype html>
<head>
    <title>Müdhiish bi blogggg</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        html {
            scroll-behavior: smooth;
            background-color: #0d0208;
        }
    </style>
</head>

<body style="font-family: 'Roboto Mono'">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="/images/logo.png" alt="Laracasts Logo" width="165" height="16">
            </a>
        </div>

        <div class="mt-8 md:mt-0 flex items-center">
            @auth()
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="text-xs font-bold uppercase text-green-500">Hoşgeldin {{ auth()->user()->username }}!</button>
                    </x-slot>
                    @can('admin')
                        <x-dropdown-item href="/admin/posts" :active="request()->is('admin/posts')">Admin Panel
                        </x-dropdown-item>
                    @endcan
                    <x-dropdown-item href="usercp" :active="request()->is('usercp')">User Panel
                    </x-dropdown-item>
                    <x-dropdown-item href="#" x-data="{}"
                                     @click.prevent="document.querySelector('#logout-form').submit()">
                        Çıkış
                    </x-dropdown-item>

                    <form id="logout-form" method="POST" action="/logout" class="hidden">
                        @csrf
                    </form>

                </x-dropdown>



            @else
                <a href="/register" class="text-xs font-bold uppercase text-green-500">Kayıt ol</a>
                <a href="/login" class="ml-6 text-xs font-bold uppercase text-green-500">Giriş yap</a>
            @endauth
            <a href="#newsletter"
               class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Güncellemeleri Takiple
            </a>
        </div>
    </nav>

    {{ $content }}

    <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16"
            id="newsletter">
        <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
        <h5 class="text-3xl">Güncel yazılar için bağlantıda kal</h5>
        <p class="text-sm mt-3">Saçmalık ve spam yok. E-postan temiz kalacak.</p>

        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                <form method="POST" action="/newsletter" class="lg:flex text-sm">
                    @csrf
                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <label for="email" class="hidden lg:inline-block">
                            <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                        </label>

                        <input id="email" name="email" type="text" placeholder="Eposta adresi"
                               class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                    </div>

                    <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                    >
                        Takiple
                    </button>
                </form>
            </div>
        </div>
    </footer>
</section>

<x-flashmessage/>
</body>

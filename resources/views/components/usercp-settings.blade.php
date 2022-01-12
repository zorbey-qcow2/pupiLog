@props(['heading'])

{{--section class için ml-12 kaldırılıp mx-auto eklenebilir.??--}}

<section class="py-8 max-w-6xl ml-12">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b text-teal-800">{{$heading}}</h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <ul>
                <li>
                    <a href="/usercp"
                       class="{{request()->is('usercp') ? 'text-blue-500' : 'text-white'}}">userCP</a>
                </li>
                <li>
                    <a href="/usercp/edit"
                       class="{{request()->is('usercp/edit') ? 'text-blue-500' : 'text-white'}}">Profile</a>
                </li>
                <li>
                    <a href="/usercp/messages"
                       class="{{request()->is('usercp/messages') ? 'text-blue-500' : 'text-white'}}">Messages</a>
                </li>
                <li>
                    <a href="/usercp/notifications"
                       class="{{request()->is('usercp/notifications') ? 'text-blue-500' : 'text-white'}}">Notifications</a>
                </li>
            </ul>
        </aside>
        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>

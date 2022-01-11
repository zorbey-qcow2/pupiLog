@props(['heading'])

{{--section class için ml-12 kaldırılıp mx-auto eklenebilir.??--}}

<section class="py-8 max-w-6xl ml-12">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b text-teal-800">{{$heading}}</h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4 text-red-500">User CP</h4>
            <ul>
                <li>
                    <a href="/admin/posts"
                       class="{{request()->is('admin/posts') ? 'text-blue-500' : 'text-white'}}">userCP</a>
                </li>
                <li>
                    <a href="/admin/comments"
                       class="{{request()->is('admin/comments') ? 'text-blue-500' : 'text-white'}}">Profile</a>
                </li>
                <li>
                    <a href="/usercp/messages"
                       class="{{request()->is('usercp/messages') ? 'text-blue-500' : 'text-white'}}">Messages</a>
                </li>
                <li>
                    <a href="/admin/posts/create"
                       class="{{request()->is('admin/posts/create') ? 'text-blue-500' : 'text-white'}}">Notifications</a>
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

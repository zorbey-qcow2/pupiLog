@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b text-teal-800">{{$heading}}</h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4 text-red-500">Links</h4>
            <ul>
                <li>
                    <a href="/admin/posts"
                       class="{{request()->is('admin/posts') ? 'text-blue-500' : 'text-white'}}">All Posts</a>
                </li>
                <li>
                    <a href="/admin/comments"
                       class="{{request()->is('admin/comments') ? 'text-blue-500' : 'text-white'}}">All Comments</a>
                </li>
                <li>
                    <a href="/admin/userlist"
                       class="{{request()->is('admin/userlist') ? 'text-blue-500' : 'text-white'}}">Users</a>
                </li>
                <li>
                    <a href="/admin/posts/create"
                       class="{{request()->is('admin/posts/create') ? 'text-blue-500' : 'text-white'}}">New Post</a>
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

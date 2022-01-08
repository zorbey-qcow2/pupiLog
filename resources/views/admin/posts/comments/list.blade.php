<x-layout>
    <x-slot name="content">
        <x-admin-settings heading="Edit Comments:">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">

                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($comments as $comment)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">


                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="/posts/{{$comment->post->slug}}">PostID:{{ $comment->post->id }}</a>
                                                </div>

                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">


                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="/admin/posts/{{$comment->post_id}}/{{$comment->id}}">
                                                        <p class="over">  {{ Str::of($comment->post->body)->limit(40) }}</p>
                                                    </a>
                                                </div>

                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <form method="POST" action="/admin/posts/comment/{{ $comment->id }}">
                                                @csrf
                                                @method('PATCH')
                                                @if($comment->published)
                                                    <button
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        Published
                                                    </button>
                                                @else
                                                    <button
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-red-800">
                                                        UnPublished
                                                    </button>
                                                @endif
                                            </form>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="/admin/posts/{{$comment->post_id}}/{{$comment->id}}/edit"
                                               class="text-blue-500 hover:text-blue-600">Edit</a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form method="POST" action="/admin/posts/comment/{{ $comment->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-xs text-gray-400">Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </x-admin-settings>
    </x-slot>
</x-layout>

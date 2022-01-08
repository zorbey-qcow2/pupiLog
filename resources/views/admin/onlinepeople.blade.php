<x-layout>
    <x-slot name="content">
        <x-setting heading="Users:">
            <div class="container flex justify-center mx-auto">
                <div class="flex flex-col">
                    <div class="w-full">
                        <div class="p-12 border-b border-gray-200 shadow">
                            <table class="divide-y divide-gray-300" id="dataTable">
                                <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        ID
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Username
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Email
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Joined
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Status
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Last Seen
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Last Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-500">
                                @foreach($users as $user)
                                    <tr class="whitespace-nowrap">
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            {{$user->id}}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="text-sm text-gray-900">
                                                {{$user->username}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="text-sm text-gray-500">
                                                {{$user->email ??= "veri yok"}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            {{$user->created_at}}
                                        </td>

                                        <td class="px-6 py-4 text-center">
                                            @if(Cache::has('user-is-online-' . $user->id))
                                                <span class="px-4 py-1 text-sm text-blue-600 bg-blue-200 rounded-full">Online</span>
                                            @else
                                                <span class="px-4 py-1 text-sm text-red-400 bg-red-200 rounded-full">Offline</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="text-sm text-gray-500">
                                                @if($user->last_seen != null)
                                                    {{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                                                @else
                                                    <span>Veri yok</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="text-sm text-gray-900">
                                                {{$user->last_action}}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </x-setting>
    </x-slot>
</x-layout>

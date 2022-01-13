<x-layout>
    <x-slot name="content">
        <x-usercp-settings heading="Edit Profile:">
            <form method="POST" action="/usercp/edit/{{$user->id}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <x-form.input name="epigram" label="EPIGRAM (MAX 15 char)" :value="old('epigram' , $user->epigram)"/>
                <div class="flex mt-6">
                    <div class="flex-1">
                        <x-form.input name="avatar" type="file" :value="old('avatar')"/>
                    </div>

                    <img src="{{   $user->avatar ? asset('/storage/' . $user->avatar) : '/storage/avatar/avatar.png' }}"
                         alt="" class="rounded-xl ml-6" width="120">
                </div>

                <x-form.submit-button>Update</x-form.submit-button>

            </form>
        </x-usercp-settings>
    </x-slot>
</x-layout>

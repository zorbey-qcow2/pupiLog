<x-layout>
    <x-slot name="content">
        <x-usercp-settings heading="Edit Profile:">
            <form method="POST" action="/admin/posts/update" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <x-form.input name="epigram" :value="old('epigram')"/>
{{--                <x-form.textarea name="excerpt">{{ old('excerpt') }}</x-form.textarea>--}}

                <div class="flex mt-6">
                    <div class="flex-1">
                        <x-form.input name="avatar" type="file" :value="old('avatar')"/>
                    </div>

                    <img src="" alt="" class="rounded-xl ml-6" width="150">
                </div>

                <x-form.submit-button>Update</x-form.submit-button>

            </form>
        </x-usercp-settings>
    </x-slot>
</x-layout>

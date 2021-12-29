<x-layout>
    <x-slot name="content">
        <x-setting heading="Publish New Post">
            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf

                <x-form.input name="title"/>
                <x-form.input name="slug"/>
                <x-form.textarea name="excerpt"/>
                <x-form.textarea name="body"/>
                <x-form.input name="thumbnail" type="file"/>

                <x-form.div>
                    <x-form.label name="category"/>

                    <select name="category_id" id="category_id" class="rounded-xl">

                        @foreach (\App\Models\Category::all() as $category)
                            <option
                                value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ucwords($category->name)}}</option>
                        @endforeach
                    </select>
                    <x-form.error name="category"/>
                </x-form.div>

                <x-form.submit-button>Publish</x-form.submit-button>

            </form>
        </x-setting>
    </x-slot>
</x-layout>

<x-layout>
    <x-slot name="content">
        <x-setting :heading="'Edit Post: ' . $post->title">
            <form method="POST" action="/admin/posts/{{$post->id}}/update" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <x-form.input name="title" :value="old('title',$post->title)"/>
                <x-form.input name="slug" :value="old('slug',$post->slug)"/>
                <x-form.textarea name="excerpt">{{ old('excerpt' , $post->excerpt) }}</x-form.textarea>
                <x-form.textarea name="body">{{ old('body' , $post->body) }}</x-form.textarea>

                <div class="flex mt-6">
                    <div class="flex-1">
                        <x-form.input name="thumbnail" type="file" :value="old('thumbnail',$post->thumbnail)"/>
                    </div>

                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="150">
                </div>

                <x-form.div>
                    <x-form.label name="category"/>

                    <select name="category_id" id="category_id" class="rounded-xl">

                        @foreach (\App\Models\Category::all() as $category)
                            <option
                                value="{{$category->id}}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ucwords($category->name)}}</option>
                        @endforeach
                    </select>
                    <x-form.error name="category"/>
                </x-form.div>

                <x-form.submit-button>Update</x-form.submit-button>

            </form>
        </x-setting>
    </x-slot>
</x-layout>

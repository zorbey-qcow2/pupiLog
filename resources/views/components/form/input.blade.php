@props(['name' , 'type' => 'text' , 'required' => false])
<x-form.div>
    <x-form.label name="{{$name}}"/>
    <input class="border border-gray-200 bg-green-100 p-2 w-full rounded"
           type="{{$type}}"
           name="{{$name}}"
           id="{{$name}}"
           @if($required)
           required
           @endif
        {{ $attributes(['value' => old($name)]) }}
    >
    <x-form.error name="{{$name}}"/>
</x-form.div>

@props(['name'])
<x-form.div>
    <x-form.label name="{{$name}}"/>
    <textarea class="border border-gray-200 p-2 w-full rounded"
              name="{{$name}}"
              id="{{$name}}"
              required
    >{{ $slot ?? old($name) }}</textarea>
    <x-form.error name="{{$name}}"/>
</x-form.div>

@props(['link'])
<a href="{{$link}}"
   class="transition-colors duration-300 relative inline-flex items-center text-lg text-lime-100 hover:text-blue-500">
    <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
        <g fill="none" fill-rule="evenodd">
            <path stroke="#000" stroke-opacity=".012" stroke-width=".5"
                  d="M21 1v20.16H.84V1z">
            </path>
            <path class="fill-current"
                  d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
            </path>
        </g>
    </svg>
    {{$slot}}
</a>

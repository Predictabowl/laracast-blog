@props(["trigger"])

<div  x-data="{ open: false }" x-on:click.away="open=false">

    {{-- Trigger Button --}}
    <div x-on:click="open = !open">
        {{$trigger}}
    </div>

    {{-- Dropdown links --}}
    <div x-show="open" class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl z-50 max-h-52 overflow-auto" style="display: none">
       {{$slot}}
    </div>
</div>
@props(['name', 'label' => '', 'type' => 'text', 'placeholder' => '', 'required' => true, 'rows' => 4])

@php
    $defaults = [
        'name' => $name,
        'id' => $name,
        'type' => $type,
        'class' => 'w-full p-2 border-2 border-neutral-400 outline-none ring-teal-500/50 focus:ring-4 focus:border-teal-400',
        'placeholder' => $placeholder,
        'required' => $required,
        'rows' => $rows
    ];
@endphp

<div class="flex flex-col">
    @if ($label)
        <label class="font-medium" for="{{ $name }}">{{ $label }}</label>
    @endif
    <textarea {{ $attributes($defaults)}} >{{ $slot }}</textarea>

    @error($name)
        <p class="text-sm text-rose-500 mt-0.5">{{ $message }}</p>
    @enderror
</div>
@props(['name', 'label' => '', 'type' => 'text', 'placeholder' => '', 'required' => true, 'step' => null, 'value' => null])

@php
    $defaults = [
        'name' => $name,
        'id' => $name,
        'type' => $type,
        'class' => 'w-full p-2 border-2 border-neutral-400 outline-none ring-teal-500/50 focus:ring-4 focus:border-teal-400',
        'placeholder' => $placeholder,
        'required' => $required,
        'value' => $value ?? old($name)
    ];
    if ($step) {
        $defaults['step'] = $step;
    }
@endphp

<div class="flex flex-col">
    @if ($label)
        <label class="font-medium" for="{{ $name }}">{{ $label }}</label>
    @endif
    <input {{ $attributes($defaults) }} />

    @error($name)
        <p class="text-sm text-rose-500 mt-0.5">{{ $message }}</p>
    @enderror
</div>
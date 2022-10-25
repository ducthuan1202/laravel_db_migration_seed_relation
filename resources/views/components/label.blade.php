@props(['value', 'forID' => 'ok chua'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}

    {{ $forID }}
    
</label>

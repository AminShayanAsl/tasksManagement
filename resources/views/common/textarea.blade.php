<textarea
    @if(isset($name))
        name="{{ $name }}"
    @elseif(isset($wire_model))
        wire:model="{{ $wire_model }}"
    @endif
    placeholder="{{ $placeholder }}"
    class="{{ $class }}"
    {{ $required ?? null }}>{{ $value ?? '' }}</textarea>

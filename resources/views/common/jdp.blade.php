<input
    @if(isset($value))
        value="{{ $value }}"
    @endif
    data-jdp
    data-jdp-min-date="{{ $minDate }}"
    @if(isset($name))
        name="{{ $name }}"
    @elseif(isset($wire_model))
        wire:model="{{ $wire_model }}"
    @endif
    placeholder="{{ $placeholder }}"
    class="{{ $class }}"/>

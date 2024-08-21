<input
    type="{{ $type }}"
    @if(isset($name))
        name="{{ $name }}"
    @elseif(isset($wire_model))
        wire:model="{{ $wire_model }}"
    @endif
    @if(isset($value))
        value="{{ $value }}"
    @endif
    placeholder="{{ $placeholder }}"
    class="{{ $class }}"
    {{ $required ?? null }} />
@if ($type == 'password')
    <div class="pass-eye cursor-pointer border rounded-2 my-3 py-2 px-1"><i class="fa fa-eye-slash text-secondary"></i></div>
@endif

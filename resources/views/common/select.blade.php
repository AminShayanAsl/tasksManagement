<select
    @if(isset($name))
        name="{{ $name }}"
    @elseif(isset($wire_model))
        wire:model="{{ $wire_model }}"
    @endif
    class="{{ $class }}">
    @if($default['key'] == '')
        <option value="{{ $default['key'] }}" selected>{{ $default['value'] }}</option>
    @endif
    @foreach($options as $key => $option)
        @if($default['key'] == $key)
            <option value="{{ $key }}" selected>{{ $option }}</option>
        @else
            <option value="{{ $key }}">{{ $option }}</option>
        @endif
    @endforeach
</select>

@props(['name', 'placeholder', 'value' => null])

<input type="text" name="{{ $name }}" required placeholder="{{ $placeholder }}" 
       class="box-border w-full border border-theme my-5 mx-0 p-3 focus:outline-none focus:outline-theme"
    @if (old($name) !== null) value="{{ old($name) }}" @endif
    @if ($value !== null) value="{{ $value }}" @endif>
@include('_error-msg')

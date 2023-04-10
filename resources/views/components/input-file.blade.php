@props(['name', 'label', 'multiple' => false])

<label for="{{ $name }}" class="custom-photo-upload">
    {{ $label }}
</label>
<input type="file" id="{{ $name }}" name="{{ $name }}" accept="image/*" class="w-full my-5 mx-0 p-3 border-2 border-theme"
    @if ($multiple) {{ 'multiple' }} @endif>
@if ($multiple)
    @include('_error-msg-loop')
@else
    @include('_error-msg')
@endif

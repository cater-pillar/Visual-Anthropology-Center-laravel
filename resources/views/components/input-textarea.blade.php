@props(['name', 'placeholder', 'value' => null])

<textarea name="{{ $name }}" required placeholder="{{ $placeholder }}" cols="30" rows="10" class="w-full my-5 mx-0 p-3 border-2 border-theme">@if ($value !== null){{ $value }}@endif
</textarea>
@include('_error-msg')

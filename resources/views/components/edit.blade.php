@props(['slug', 'model'])

<a href="/{{ $model }}/edit/{{ $slug }}" class="font-bold pr-6 border bg-blue-500 text-white p-1 rounded mr-3">@include('svg/_edit') Edit</a>

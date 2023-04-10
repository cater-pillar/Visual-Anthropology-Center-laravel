@if ($errors->has('slides.*'))
    @foreach ($errors->get('slides.*') as $error)
        <div class="text-red-500 text-xs font-bold -mt-4 mb-4" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000)"
            x-transition>
            {{ $error[0] }}
        </div>
    @endforeach
@endif
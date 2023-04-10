@if (session()->has('success'))
    <div class="box p-3 text-xl text-theme font-bold mx-3 mb-5 md:max-w-2xl md:mx-auto text-center" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000)" x-transition>
        {{ session()->get('success') }}
    </div>
@endif

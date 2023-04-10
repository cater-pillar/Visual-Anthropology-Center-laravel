@props(['slug', 'model'])

<div x-data="{ modalOpen: false, }">

    <button @click="modalOpen = true"
        class="font-bold pr-6 border bg-red-500 text-white p-1 rounded">@include('svg/_delete')Delete</button>
    <div x-cloak x-show="modalOpen" class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="relative box w-full md:w-96 mx-2">
                <div class="p-8">
                    <h2 class="text-lg font-bold mb-4">Delete {{ $model }}</h2>
                    <p class="mb-4">Are you sure you want to permanently delete {{ $model }}?</p>
                    <div class="mx-auto w-fit">
                        <form action="/{{ $model }}/delete/{{ $slug }}" method="post"
                            enctype="multipart/form-data" class="inline-block mr-5">
                            @csrf
                            <x-input-btn text="Delete" />
                        </form>
                        <button @click="modalOpen = false" class="btn-theme p-3">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

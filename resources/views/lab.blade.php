<x-layout>
    <x-slot:title>
        {{ 'Home | Visual Anthropology Center' }}
        </x-slot>
        <x-slot:banner>
            {{ 'OUR LAB' }}
            </x-slot>
            <segment>
                <div class='container md:max-w-6xl'>
                    @if ($galleries->count() == 0)
                    <div class="box text-center my-36 mx-auto p-4">
                        No galleries to show
                    </div>
                    @endif
                    <div class='flex flex-wrap md:mx-auto'>
                        @foreach ($galleries as $gallery)

                            <div class='relative md:w-1/2 px-3 mb-6'>
                                @if(auth()->user()?->is_admin)
                                <div class="flex absolute top-5 right-5">
                                    <x-edit slug="{{ $gallery->slug }}" model="gallery" />
                                    <x-delete slug="{{ $gallery->slug }}" model="gallery" />
                                </div>
                                @endif
                                <a href="/gallery/{{ $gallery->slug }}">
                                    <h3 class="absolute top-1/3 text-center w-full m-0 p-0 text-white text-3xl font-bold drop-shadow-[1px_1px_rgba(0,0,0)]">{!! $gallery->title !!}</h3>
                                    <img src={{ asset("storage/$gallery->cover") }} id={{ $gallery->slug }}
                                        class='select-none'>
                                    <a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </segment>
            @include('_separator')
            <segment id="video">
                <div class="container md:max-w-6xl">
                    @include('_video')
                </div>
            </segment>
</x-layout>

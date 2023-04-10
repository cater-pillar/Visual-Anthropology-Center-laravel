<x-layout>
    <x-slot:title>
        {{ 'Gallery | ' . $gallery->title }}
        </x-slot>
        <x-slot:banner>
            {!! $gallery->title !!}
            </x-slot>
            <div x-data="{
                open: false,
                currentImage: '',
                imageNumber: '',
                imageCount: '{{ count($gallery->slides) - 1 }}'
            }">
                <segment>
                    <div class='container mx-auto md:max-w-6xl relative'>
                        @if(auth()->user()?->is_admin)
                        <div class="flex absolute top-5 right-5">
                            <x-edit slug="{{ $gallery->slug }}" model="gallery" />
                            <x-delete slug="{{ $gallery->slug }}" model="gallery" />
                        </div>
                        @endif
                        @if($gallery->description !== '')
                        <div class="box mx-auto w-60 text-center">
                            {{ $gallery->description }}
                        </div>
                        @endif
                        <div class='flex flex-wrap'>
                            @foreach ($gallery->slides as $index => $slide)
                                <div @click="open = true; 
                             currentImage = '{{ asset("storage/$slide->photo") }}'; 
                             imageNumber = '{{ $index }}'"
                                    class='flex w-72 h-72 justify-center items-center bg-gray-50 hover:bg-gray-200 border-2 border-white shadow my-10 mx-auto transition duration-300'>
                                    <img id={{ 'image_' . $index }} src={{ asset("storage/$slide->photo") }}
                                        class='max-w-8/10 max-h-8/10'>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </segment>
                <div x-cloak x-show="open">
                    <div id='slide' class="flex fixed bg-black bg-opacity-80 text-white inset-0 justify-center items-center z-10">

                        @include('svg/_exit')
                        @include('svg/_prev')
                        @include('svg/_next')

                        <img id='slide-image' class='max-w-9/10 max-h-9/10' x-bind:src='currentImage'>
                    </div>
                </div>
            </div>

</x-layout>

<x-layout>
    <x-slot:title>
        {{ 'Home | Visual Anthropology Center' }}
        </x-slot>
        <x-slot:banner>
            {{ 'DOCUMENTS CAN BE ART AS PIECES OF ART CAN BE DOCUMENTS' }}
            </x-slot>
            <segment>
                <div class='container md:max-w-6xl'>
                    <div class='text-center mx-auto w-40 mb-7'>
                        <a href='/programs'>
                            <h2
                                class='btn-theme p-3'>
                                Programs
                            </h2>
                        </a>
                    </div>
                    @if ($programs->count() == 0)
                    <div class="box text-center my-36 mx mx-auto p-4">
                        No programs to show
                    </div>
                    @endif
                    <div class='flex flex-wrap mb-7'>
                        @foreach ($programs as $index => $program)
                            @if ($index < 4)
                                <div class='w-full md:w-1/3 md:mx-auto p-6 mb-6 text-center'>
                                    <a href="/program/{{ $program->slug }}">
                                        <img src="storage/{{ $program->icon }}" class='w-16 mx-auto select-none'>
                                    </a>
                                    <a href="/program/{{ $program->slug }}">
                                        <h3 class="text-lg font-bold my-4 hover:text-theme-dark"> {{ $program->title }}
                                        </h3>
                                    </a>
                                    <p class="mb-10">{{ $program->extract }}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </segment>
            @include('_separator')
            <segment id="video">
                <div class="container md:max-w-6xl">
                    <div class="text-center mx-auto w-40 mb-10">
                        <a href="/lab">
                            <h2
                                class="btn-theme p-3">
                                LAB</h2>
                        </a>
                    </div>
                    @include('_video')
                </div>
            </segment>
</x-layout>

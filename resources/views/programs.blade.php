<x-layout>
    <x-slot:title>
        {{ 'Home | Visual Anthropology Center' }}
        </x-slot>
        <x-slot:banner>
            {{ 'OUR PROGRAMS' }}
            </x-slot>
            <segment>
                <div class='container md:max-w-4xl'>
                    @if ($programs->count() == 0)
                    <div class="box text-center my-36 mx-auto p-4">
                        No programs to show
                    </div>
                    @endif
                    @foreach ($programs as $program)
                        <div class="relative">
                            <a href="/program/{{ $program->slug }}">
                                <div
                                    class='btn-theme px-3 md:px-12 py-3 md:py-5 block my-10 mx-1'>
                                    @if ($program->poster !== '')
                                        <img src={{ URL::asset('storage/' . $program->poster) }} style="width:100%">
                                    @endif
                                    <p class="mt-3 md:mt-4 text-center md:text-xl font-bold">{{ $program->title }}</p>
                                </div>
                            </a>
                            @if (auth()->user()?->is_admin)
                                <div class="flex absolute top-5 right-5">
                                    <x-edit slug="{{ $program->slug }}" model="program" />
                                    <x-delete slug="{{ $program->slug }}" model="program" />
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </segment>
</x-layout>

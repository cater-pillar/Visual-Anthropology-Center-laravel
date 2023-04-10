<x-layout>
    <x-slot:title>
        {{ 'Program | ' . $program->title }}
        </x-slot>
        <x-slot:banner>
            {{ $program->title }}
            </x-slot>
            <segment>
                <div class='container md:max-w-4xl relative'>
                    @if (auth()->user()?->is_admin)
                        <div class="flex absolute top-5 right-5">
                            <x-edit slug="{{ $program->slug }}" model="program" />
                            <x-delete slug="{{ $program->slug }}" model="program" />
                        </div>
                    @endif
                    @if ($program->poster !== '')
                        <img src={{ asset("storage/$program->poster") }} class="w-full mb-5">
                    @endif
                    @foreach ($program->tabs as $tab)
                        <div x-data="{ open: false }">
                            <div x-on:click="open = ! open"
                                class='flex justify-between py-2 px-4 text-white bg-theme select-none hover:bg-gray-500'
                                :class="open ? '' : 'mb-5'">
                                {{ $tab->title }}
                                <span x-text=" open ? '-' : '+' "></span>
                            </div>
                            <div x-show="open" x-transition class='bg-gray-200 p-2 mb-5 text-gray-700'>
                                {!! $tab->content !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </segment>
            <div class='text-center mt-10'>
                @if ($program->is_active)
                <a href='/apply/{{ $program->slug }}'
                    class='btn-theme p-3'>
                    Apply Now
                </a>              
                @else
                <p class="mx-auto w-72 box p-3">
                    Program is currently not active. Applications are not available.
                </p>
                @endif
            </div>
</x-layout>

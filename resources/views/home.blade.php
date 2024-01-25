<x-layout>
    <x-slot:title>
        {{ 'Home | Visual Anthropology Center' }}
        </x-slot>
        <x-slot:banner>
            {!! "Art can be a document </br> Documents can be art" !!}
            </x-slot>
            <segment>
                <div class='container md:max-w-6xl'>
                    <p class="mt-7 mb-7 text-2xl"><img src={{ URL::asset('storage/images/general/logoOkoCrno.png') }} 
                        class="h-10 inline-block align-bottom mr-2" alt="eye-shaped logo"><b>Visual Anthropology Center (VAC)</b> is a creative hub dedicated to audio-visual research of the contemporary world.</p>

                    <p class="mt-4 mb-10">In our age, ever so overwhelming with visual data, we find it crucially important for <b>documentarists and social scientists to cooperate with visual artists, film and theater-makers</b> in order for their work to be not only relevant but visually enticing as well. VAC is an independent non-profit organization, not a part of any existing institution. We want our unique artistic and scientific approach to stay <b>free and individual</b>, non-biased by existing power structures and political tendencies.</p>
                </div>
                <div class='text-center mx-auto w-40 mb-7'>
                    <a href='/about#our-idea'>
                        <h2
                            class='btn-theme p-3'>
                            Our Idea
                        </h2>
                    </a>
                </div>
                <div class='container md:max-w-6xl'>
                <p class="mt-7 mb-10">We want to contribute to the global consciousness of humanity by <b>creating socially sensitive films, photographs, and other forms of audio-visual art</b>. We want to empower others to do so as well and create an international community of international creative thinkers. That is why we organize <b>international and local schools of visual anthropology</b>, online courses and residency programs.</p>
                </div>
                <div class='text-center mx-auto w-40 mb-7'>
                    <a href='/about#our-space'>
                        <h2
                            class='btn-theme p-3'>
                            Our Space
                        </h2>
                    </a>
                </div>
                <div class='container md:max-w-6xl'>
                <p class="mt-7 mb-10">VAC is based in Belgrade, Serbia. Our core team is constituted of social scientists, filmmakers, ethnomusicologists, performance artists and culture workers. We operate <b>a small community creative center - DC KROV.</b></p>
                </div>
            </segment>
            @include('_separator')
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
                        
                            <h2
                                class="btn-theme p-3">
                                Our Work</h2>
                        
                    </div>
                    <p class="mt-7 mb-10 text-center">The results of our previous local and international programs are available on our <a href='https://www.youtube.com/channel/UCeadgCIuhZ_Zwtv14POprRg'
                        target="_blank" class="underline text-theme">youtube page</a>. Feel free to watch some of our sample works below.</p>

                    @include('_video')
                </div>
            </segment>
</x-layout>

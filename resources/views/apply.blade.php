<x-layout>
    <x-slot:title>
        {{ 'Application | Visual Anthropology Center' }}
        </x-slot>
        <x-slot:banner>
            {{ 'APPLICATION PAGE' }}
            </x-slot>
            <div class="container md:max-w-xl">
                <form action="/application/store" method="POST" enctype="multipart/form-data"
                    class='custom-form'>
                    @csrf
                    <x-input-text name="name" placeholder="Full Name" />
                    <x-input-text name="email" placeholder="Your Email Address" />
                    <label for="program_id">What program are you applying for?</label>
                    <select name="program_id" id="program_id"
                        class='box-border w-full border border-theme my-5 mx-0 p-3 focus:outline-none focus:outline-theme'
                        required>
                        @foreach ($programs as $program)
                            <option value="{{ $program->id }}" {{ $program->slug == $slug ? 'selected' : '' }}>
                                {{ $program->title }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-btn text="Apply" />
                </form>
            </div>
</x-layout>

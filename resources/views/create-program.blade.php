<x-layout>
    <x-slot:title>
        {{ 'Create Program | Visual Anthropology Center' }}
        </x-slot>
        <x-slot:banner>
            {{ 'CREATE PROGRAM' }}
            </x-slot>
            <segment>
                <div class='container md:max-w-xl'>
                    <form action="/program/store" method="post" enctype="multipart/form-data" class="custom-form">
                        @csrf
                        <x-input-text name="title" placeholder="Program Title" />
                        <x-input-file name="icon" label="Set thumbnail icon" />
                        <x-input-file name="poster" label="Set poster photo" />
                        <x-input-textarea name="extract" placeholder="Short Program Description..." />
                        <x-input-tabs number="1" />
                        <x-input-btn text="Create Program" />
                    </form>
                </div>
            </segment>
</x-layout>

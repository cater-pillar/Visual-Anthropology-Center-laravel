<x-layout>
    <x-slot:title>
        {{ 'Create Gallery | Visual Anthropology Center' }}
        </x-slot>
        <x-slot:banner>
            {{ 'CREATE GALLERY' }}
            </x-slot>
            <segment>
                <div class='container md:max-w-xl'>
                    <form action="/gallery/store" method="post" enctype="multipart/form-data" class="custom-form">
                        @csrf
                        <x-input-text name="title" placeholder="Gallery Title" />
                        <x-input-file name="cover" label="Choose a single cover photo" />
                        <x-input-file name="slides[]" label="Select multiple images for the gallery." multiple="true" />
                        <x-input-btn text="Create Gallery" />
                    </form>
                </div>
            </segment>
</x-layout>

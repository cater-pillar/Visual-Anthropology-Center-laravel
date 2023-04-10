<x-layout>
    <x-slot:title>
        {{ 'Edit Gallery | Visual Anthropology Center' }}
        </x-slot>
        <x-slot:banner>
            {{ "EDIT GALLERY | $gallery->title" }}
            </x-slot>
            <segment>
                <div class='container md:max-w-xl'>
                    <form action="/gallery/update/{{ $gallery->slug }}" method="post" enctype="multipart/form-data"
                        class="custom-form">
                        @csrf
                        <x-input-text name="title" placeholder="Gallery Title" :value="$gallery->title" />
                        <img src={{ asset("storage/$gallery->cover") }} class="w-40" />
                        <x-input-file name="cover" label="Change gallery cover" />
                        <x-input-textarea name="description" placeholder="Short Gallery Description..." :value="$gallery->description" />                        
                        <x-input-btn text="Update Gallery" />
                    </form>
                </div>
            </segment>
</x-layout>

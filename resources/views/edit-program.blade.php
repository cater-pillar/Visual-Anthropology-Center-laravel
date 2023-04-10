<x-layout>
    <x-slot:title>
        {{ 'Edit Program | Visual Anthropology Center' }}
        </x-slot>
        <x-slot:banner>
            {{ "EDIT PROGRAM | $program->title" }}
            </x-slot>
            <segment>
                <div class='container md:max-w-xl'>
                    <form action="/program/update/{{ $program->slug }}" method="post" enctype="multipart/form-data"
                        class="custom-form">
                        @csrf
                        <x-input-text name="title" placeholder="Program Title" :value="$program->title" />
                        <x-input-file name="icon" label="Change thumbnail icon" />
                        <x-input-file name="poster" label="Change poster photo" />
                        <x-input-textarea name="extract" placeholder="Short Program Description..." :value="$program->extract" />
                        <input type="checkbox" name="active" id='active' @if ($program->is_active) {{ 'checked' }} @endif >
                        <label for="active">Enable program</label> 
                        <h3 class="mt-6 font-bold text-center">Program Tabs</h3> 
                        @foreach ($program->tabs as $tab)
                            <x-input-text name="tab_title_{{ $tab->id }}" placeholder="Tab Title"
                                :value="$tab->title" />
                            <x-input-textarea name="tab_content_{{ $tab->id }}"
                                placeholder="Short tab Description..." :value="$tab->content" />
                        @endforeach
                        <x-input-tabs number="{{ $program->tabs->max('id') + 1 }}" />
                        <x-input-btn text="Update Program" />
                    </form>
                </div>
            </segment>
</x-layout>

<x-layout>
    <x-slot:title>
        {{ 'Admin Login | Visual Anthropology Center' }}
        </x-slot>
        <x-slot:banner>
            {{ 'ADMIN LOGIN PAGE' }}
            </x-slot>
            <div class="container md:max-w-xl">
                <form action="/session/create" method="POST" enctype="multipart/form-data" class='custom-form'>
                    @csrf
                    <x-input-text name="name" placeholder="Username" />
                    <x-input-text name="password" placeholder="Password" />
                    <x-input-btn text="Login" />
                </form>
            </div>
</x-layout>
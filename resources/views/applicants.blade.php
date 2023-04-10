<x-layout>
    <x-slot:title>
        {{ 'Applicants | Visual Anthropology Center' }}
        </x-slot>
        <x-slot:banner>
            {{ 'APPLICANTS PAGE' }}
            </x-slot>
            <div class="container md:max-w-xl">
                <form action="/applicants" method="GET" enctype="multipart/form-data" class='custom-form'>
                    @csrf
                    <label for="program_id">Select program to get applicants</label>
                    <select name="program_id" id="program_id" class='box-border w-full border border-theme my-5 mx-0 p-3 focus:outline-none focus:outline-theme ' required>
                        @foreach ($programs as $program)
                            <option value="{{ $program->id }}">
                                {{ $program->title }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-btn text="Submit" />
                </form>
                @if ($applicants)
                    @if ($applicants->count() !== 0)
                        <table class="table border-2 border-white shadow bg-gray-100 mx-auto mt-10">
                            <tr class="border-b-2 border-b-theme">
                                <th class="px-4 py-2" >Name</th>
                                <th class="px-4 py-2">Email</th>
                            </tr>
                            @foreach ($applicants as $applicant)
                                <tr class="hover:bg-gray-300 even:bg-gray-200">
                                    <td class="px-4 py-2">{{ $applicant->name }}</td>
                                    <td class="px-4 py-2">{{ $applicant->email }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <div class="box text-center  px-4 py-2 mt-10">{{ 'No applicants to show!' }}</div>
                    @endif
                @endif
            </div>
</x-layout>

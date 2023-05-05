<x-layout>
    <x-slot:title>
        {{ "Trash | $model | Visual Anthropology Center" }}
        </x-slot>
        <x-slot:banner>
            {{ 'TRASHED ' .$model }}
            </x-slot>
            <div class="container md:max-w-xl">
                @if ($items)
                    @if ($items->count() !== 0)
                        <table class="table border-2 border-white shadow bg-gray-100 mx-auto mt-10 text-gray-800">
                            <tr class="border-b-2 border-b-theme">
                                <th class="px-4 py-2" >{{ $model }}</th>
                                <th class="px-4 py-2">Delete Permanently</th>
                                <th class="px-4 py-2">Restore</th>
                            </tr>
                            @foreach ($items as $item)
                                <tr class="hover:bg-gray-300 even:bg-gray-200">
                                    <td class="px-4 py-2">{{ $item->title }}</td>
                                    <td class="px-4 py-2 text-red-600 font-bold text-center hover:bg-red-400">
                                        <x-delete slug="{{ $item->slug }}" model="{{ $model }}" :force="true"/>
                                    </td>
                                    <td class="px-4 py-2 text-green-600 font-bold text-center hover:bg-green-400">
                                        <form action="/{{$model}}/restore/{{ $item->slug }}" method="post">
                                            @csrf
                                            <input type="submit" value="Restore">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <div class="box text-center  px-4 py-2 mt-10">{{ "No $model to show!" }}</div>
                    @endif
                @endif
            </div>
</x-layout>

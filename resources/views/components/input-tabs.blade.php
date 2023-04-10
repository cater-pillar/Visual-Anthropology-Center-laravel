@props(['number'])

<div x-data="{ tabs: [], number: {{ $number }} }" class="mt-4">
    <template x-for="tab in tabs">
        <div>
            <input type="text" x-bind:name="tab.title" x-bind:id="tab.title"
                class="w-full my-5 mx-0 p-3 border-2 border-theme " x-bind:placeholder="'Tab Title ' + tab.number">
            <textarea x-bind:name="tab.content" x-bind:id="tab.content" cols="30" rows="10"
                class="w-full my-5 mx-0 p-3 border-2 border-theme" placeholder="Tab Content..."></textarea>
        </div>
    </template>
    <div class="flex justify-between mt-3 mb-6">
        <button
            x-on:click.prevent="tabs.push({
                                        title: 'tab_title_'+number, 
                                        number: number, 
                                        content: 'tab_content_'+number
                                    }) ; number++"
            class='bg-theme border-2 border-white rounded shadow text-center text-white font-bold p-3 select-none min-w-12 hover:bg-gray-500 transition-all duration-600'>
            Add Tab
        </button>
        <button x-on:click.prevent="if(tabs.length > 0) {tabs.pop() ; number--}"
            class='bg-theme border-2 border-white rounded shadow text-center text-white font-bold p-3 select-none min-w-12 hover:bg-gray-500 transition-all duration-600'>
            Remove Tab
        </button>
    </div>
</div>

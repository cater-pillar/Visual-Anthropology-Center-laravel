

<div x-data="{ modalOpen: false, }">
   
    <button @click="modalOpen = true">Test Modal</button>
    <div x-show="modalOpen" class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="relative bg-white rounded-lg w-1/2">
              <div class="p-8">
                <h2 class="text-lg font-bold mb-4">Modal Title</h2>
                <p class="mb-4">Modal content goes here.</p>
                <button @click="modalOpen = false" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Close Modal</button>
              </div>
            </div>
          </div>
    </div>
</div>
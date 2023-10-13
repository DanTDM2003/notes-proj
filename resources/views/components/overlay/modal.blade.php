@props(['trigger'])

<div x-data="{ open: false }" class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div x-show="open" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div x-show="open" class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <x-panel
              class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
              x-show="open"
              x-transition:enter="transition ease-out duration-300"
              x-transition:enter-start="opacity-10 scale-y-10 -translate-y-3"
              x-transition:enter-end="opacity-100 scale-y-100"
              x-transition:leave="transition ease-in duration-200"
              x-transition:leave-start="opacity-100 scale-y-100"
              x-transition:leave-end="opacity-10 scale-y-10 -translate-y-3"
            >
              <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                        <div class="mt-2">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
              </div>
              
            </x-panel>
        </div>
    </div>
    {{ $trigger }}
</div>
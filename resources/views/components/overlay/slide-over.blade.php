<div x-data="{ open: false }" {{ $attributes(['class' => "absolute"])}}>
    <div x-show="open" class="relative z-50" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
        <!--
          Background backdrop, show/hide based on slide-over state.
      
          Entering: "ease-in-out duration-500"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in-out duration-500"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
      
        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div x-show="open"
                    @click.away="open = false"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-10 scale-x-95 translate-x-full"
                    x-transition:enter-end="opacity-100 scale-x-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-x-100"
                    x-transition:leave-end="opacity-10 scale-x-95 translate-x-full"
                    class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full">

                    
                    <!--
                        Slide-over panel, show/hide based on slide-over state.
            
                        Entering: "transform transition ease-in-out duration-500 sm:duration-700"
                        From: "translate-x-full"
                        To: "translate-x-0"
                        Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
                        From: "translate-x-0"
                        To: "translate-x-full"
                    -->


                    <div class="pointer-events-auto relative w-screen max-w-md">
                        <!--
                        Close button, show/hide based on slide-over state.
            
                        Entering: "ease-in-out duration-500"
                            From: "opacity-0"
                            To: "opacity-100"
                        Leaving: "ease-in-out duration-500"
                            From: "opacity-100"
                            To: "opacity-0"
                        -->
      
                        <div class="flex h-screen flex-col bg-white py-6 shadow-xl">
                            <div class="flex justify-between w-full px-4 sm:px-6">
                                <h2 class="text-base font-semibold leading-6 text-gray-900" id="slide-over-title">Note's information</h2>
                                <a href="/notes" class="text-2xl transition ease-in hover:scale-110"><ion-icon name="home"></ion-icon></a>
                            </div>
                            <div class="relative mt-6 flex-1 px-4 sm:px-6">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ $trigger }}
</div>
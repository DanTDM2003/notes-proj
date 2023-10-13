@include("_header")
<x-layout class="justify-center items-center">
  <div class="relative isolate px-6 pt-14 lg:px-8">
    <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-72">
      {{-- <div class="hidden sm:mb-8 sm:flex sm:justify-center">
        <div class="relative rounded-full px-3 py-1 text-sm leading-6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
          Announcing our next round of funding. <a href="#" class="font-semibold text-indigo-600"><span class="absolute inset-0" aria-hidden="true"></span>Read more <span aria-hidden="true">&rarr;</span></a>
        </div>
      </div> --}}
      <div class="text-center">
        <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Note to success</h1>
        <p class="mt-4 text-lg leading-7 text-gray-600">Note everything you need, we have every feature you want.</p>
        <div class="mt-9 flex items-center justify-center gap-x-6">
          @auth
            <a href="/notes" class="rounded-md bg-teal-500 px-6 py-4 font-semibold text-white shadow-sm hover:bg-teal-400">Get started</a>
          @else
            <a href="/login" class="rounded-md bg-teal-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-teal-400">Get started</a>
          @endauth
        </div>
      </div>
    </div>
  </div>
</x-layout>
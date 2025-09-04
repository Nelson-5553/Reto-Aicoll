<div x-data="{ dangerModalIsOpen: false }">
    <button x-on:click="dangerModalIsOpen = true" type="button"
        class="whitespace-nowrap rounded-sm text-center text-sm font-medium tracking-wide cursor-pointer text-red-500 transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500 active:opacity-100 active:outline-offset-0">
        <x-heroicon-o-trash class="w-6 h-6" />
    </button>
    <div x-cloak x-show="dangerModalIsOpen" x-transition.opacity.duration.200ms
        x-trap.inert.noscroll="dangerModalIsOpen" x-on:keydown.esc.window="dangerModalIsOpen = false"
        x-on:click.self="dangerModalIsOpen = false"
        class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8"
        role="dialog" aria-modal="true" aria-labelledby="dangerModalTitle">
        <!-- Modal Dialog -->
        <div x-show="dangerModalIsOpen"
            x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
            x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
            class="flex max-w-lg flex-col gap-4 overflow-hidden rounded-sm border border-neutral-300 bg-white text-neutral-600">
            <!-- Dialog Header -->
            <div
                class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 px-4 py-2">
                <div class="flex items-center justify-center rounded-full bg-red-500/20 text-red-500 p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <button x-on:click="dangerModalIsOpen = false" aria-label="close modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor"
                        fill="none" stroke-width="1.4" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            {{ $slot }}
        </div>
    </div>
</div>

<nav class="sticky top-0 px-4 py-3 bg-blue-800 shadow z-40">
    <div class="container">
        <div class="sm:flex items-center justify-start gap-x-8 mx-auto max-w-7xl">
            <p class="hidden text-left my-2 mx-0 leading-none md:my-0 banner">Filter view:</p>
            <div class="flex justify-start sm:justify-center gap-x-4 gap-y-2 sm:gap-y-0 dropdown-wrappers">
                <div class="dropdown-wrapper inline-block">
                    <label for="year-nav" class="block mb-0 text-white uppercase text-xs">Year</label>
                    <div class="control relative flex">
                        <div>
                            <div class="selectContainer size-nav py-0 lg:min-w-full">
                                <input placeholder="" id="year-nav">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown-wrapper inline-block">
                    <label for="year-nav" class="block mb-0 text-white uppercase text-xs">Sector</label>
                    <div class="control relative flex">
                        <div>
                            <div class="selectContainer size-nav py-0 lg:min-w-full">
                                <input placeholder="" id="year-nav">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center flex-wrap text-white">
                <div class="hidden lg:block mr-4">
                    <button class="cursor-pointer hover:opacity-80 transition">
                        <div class="flex items-center">
                            <div class="mr-2">
                                <div class="relative" slot="icon"><i
                                        class="fa fa-link text-accent align-middle transition"
                                        aria-hidden="true"></i></div>
                            </div>
                            <p slot="text" class="leading-none align-middle m-0 ">Copy link to dashboard</p>
                        </div>
                    </button>
                </div>
                <div class="hidden md:block">
                    <div class="flex items-center">
                        <div class="mr-2"><i slot="icon" class="fa-hand-point-up fas text-accent align-middle text-white"
                                             aria-hidden="true"></i></div>
                        <p slot="text" class="leading-none align-middle m-0">Hover over a graphic to see more</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

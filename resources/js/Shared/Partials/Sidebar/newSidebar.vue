<template>
    <nav class="mt-5 flex flex-1 flex-col divide-y divide-slate-100 overflow-y-auto" aria-label="Sidebar">
                    <div class="space-y-1 px-2">
                        <!-- Current: "bg-gray-800 text-white", Default: "text-white hover:text-white hover:bg-gray-600" -->
                        <a href="javascript:void(0)"
                            class="bg-gray-900 group
          text-white hover:text-white hover:bg-gray-600 group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md"
                            aria-current="page">
                            <HomeIcon class="mr-4 h-6 w-6 flex-shrink-0 text-white" />
                            Home
                        </a>

                        <a href="javascript:void(0)"
                            class="text-white hover:text-white hover:bg-gray-600 group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md">
                            <!-- Heroicon name: outline/clock -->
                            <svg class="mr-4 h-6 w-6 flex-shrink-0 text-white" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            History
                        </a>
                    </div>
                    <div class="mt-6 pt-6">
                        <div class="space-y-1 px-2">
                            <a href="javascript:void(0)"
                                class="group flex items-center rounded-md px-2 py-2 text-sm font-medium leading-6 text-white hover:bg-gray-600 hover:text-white">
                                <!-- Heroicon name: outline/cog -->
                                <svg class="mr-4 h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.5 12a7.5 7.5 0 0015 0m-15 0a7.5 7.5 0 1115 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077l1.41-.513m14.095-5.13l1.41-.513M5.106 17.785l1.15-.964m11.49-9.642l1.149-.964M7.501 19.795l.75-1.3m7.5-12.99l.75-1.3m-6.063 16.658l.26-1.477m2.605-14.772l.26-1.477m0 17.726l-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205L12 12m6.894 5.785l-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864l-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
                                </svg>
                                Settings
                            </a>

                            <a href="javascript:void(0)"
                                class="group flex items-center rounded-md px-2 py-2 text-sm font-medium leading-6 text-white hover:bg-gray-600 hover:text-white">
                                <!-- Heroicon name: outline/question-mark-circle -->
                                <svg class="mr-4 h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                </svg>
                                Help
                            </a>

                            <a href="javascript:void(0)"
                                class="group flex items-center rounded-md px-2 py-2 text-sm font-medium leading-6 text-white hover:bg-gray-600 hover:text-white">
                                <!-- Heroicon name: outline/shield-check -->
                                <svg class="mr-4 h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                                </svg>
                                Privacy
                            </a>
                        </div>
                    </div>
                </nav>
</template>

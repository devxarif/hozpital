<template>
    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">User profile</button>
<div id="popover-user-profile" role="tooltip" class="inline-block z-10 w-64 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm transition-opacity duration-300 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
    <div class="p-3">
        <div class="flex justify-between items-center mb-2">
            <a href="#">
                <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Jese Leos">
            </a>
            <div>
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-1.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Follow</button>
            </div>
        </div>
        <p class="text-base font-semibold leading-none text-gray-900 dark:text-white">
            <a href="#">Jese Leos</a>
        </p>
        <p class="mb-3 text-sm font-normal">
            <a href="#" class="hover:underline">@jeseleos</a>
        </p>
        <p class="mb-4 text-sm font-light">Open-source contributor. Building <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">flowbite.com</a>.</p>
        <ul class="flex text-sm font-light">
            <li class="mr-2">
                <a href="#" class="hover:underline">
                    <span class="font-semibold text-gray-900 dark:text-white">799</span>
                    <spa>Following
                </spa></a>
            </li>
            <li>
                <a href="#" class="hover:underline">
                    <span class="font-semibold text-gray-900 dark:text-white">3,758</span>
                    <span>Followers</span>
                </a>
            </li>
        </ul>
    </div>
    <div style="position: absolute; left: 0px; transform: translate(0px, 0px);"></div>
</div>


    <div class="bg-gray-100 py-10 h-full w-full">
        <div class="container mb-12 mx-auto px-6 flex flex-col items-start pl-12 md:pl-0 md:items-center">
            <div class="h-0 md:h-12"></div>
            <div class="flex-col md:flex-row flex items-center md:justify-center">
                <!--Code Block for white tooltip starts-->
                <div class="relative mt-20 md:mt-0" @mouseover="showTooltip(1)" @mouseout="hideTooltip(1)">
                    <div class="mr-2 cursor-pointer">
                        <svg aria-haspopup="true" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-info-circle" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#A0AEC0" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <circle cx="12" cy="12" r="9" />
                            <line x1="12" y1="8" x2="12.01" y2="8" />
                            <polyline points="11 12 12 12 12 16 13 16" />
                        </svg>
                    </div>
                    <div id="tooltip1" role="tooltip" class="-mt-20 w-64 absolute transition duration-150 ease-in-out left-0 ml-8 shadow-lg bg-white p-4 rounded">
                        <svg class="absolute left-0 -ml-2 bottom-0 top-0 h-full" width="9px" height="16px" viewBox="0 0 9 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Tooltips-" transform="translate(-874.000000, -1029.000000)" fill="#FFFFFF">
                                    <g id="Group-3-Copy-16" transform="translate(850.000000, 975.000000)">
                                        <g id="Group-2" transform="translate(24.000000, 0.000000)">
                                            <polygon id="Triangle" transform="translate(4.500000, 62.000000) rotate(-90.000000) translate(-4.500000, -62.000000) " points="4.5 57.5 12.5 66.5 -3.5 66.5"></polygon>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <a href="#">
                            <img class="w-10 h-10 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" alt="Jese Leos">
                        </a>
                        <p class="text-xs leading-4 text-gray-600 pb-3 pt-2">Reach out to more prospects at the right moment.</p>
                        <div class="flex justify-between">
                            <div class="flex items-center">
                                <span class="text-xs font-bold text-indigo-700">Step 1 of 4</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-xs text-gray-600 underline mr-2 cursor-pointer">Skip Tour</span>
                                <button class="focus:outline-none bg-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 rounded text-white px-5 py-1 text-xs">Next</button>
                            </div>
                        </div>

                        <!-- <div class="p-3">
                            <div class="flex justify-between items-center mb-2">
                                <a href="#">
                                    <img class="w-10 h-10 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" alt="Jese Leos">
                                </a>
                                <div>
                                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-1.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Follow</button>
                                </div>
                            </div>
                            <p class="text-base font-semibold leading-none text-gray-900 dark:text-white">
                                <a href="#">Jese Leos</a>
                            </p>
                            <p class="mb-3 text-sm font-normal">
                                <a href="#" class="hover:underline">@jeseleos</a>
                            </p>
                            <p class="mb-4 text-sm font-light">Open-source contributor. Building <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">flowbite.com</a>.</p>

                        </div> -->
                    </div>
                </div>
                <!--Code Block for white tooltip ends-->

                <!--Code Block for indigo tooltip starts-->
                <div class="relative my-28 md:my-0 md:mx-64" @mouseover="showTooltip(2)" @mouseout="hideTooltip(2)">
                    <div class="mr-2 cursor-pointer">
                        <svg aria-haspopup="true" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-info-circle" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#A0AEC0" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <circle cx="12" cy="12" r="9" />
                            <line x1="12" y1="8" x2="12.01" y2="8" />
                            <polyline points="11 12 12 12 12 16 13 16" />
                        </svg>
                    </div>
                    <div id="tooltip2" role="tooltip" class="z-20 -mt-20 w-64 absolute transition duration-150 ease-in-out left-0 ml-8 shadow-lg bg-indigo-700 p-4 rounded">
                        <svg class="absolute left-0 -ml-2 bottom-0 top-0 h-full" width="9px" height="16px" viewBox="0 0 9 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Tooltips-" transform="translate(-874.000000, -1029.000000)" fill="#4c51bf">
                                    <g id="Group-3-Copy-16" transform="translate(850.000000, 975.000000)">
                                        <g id="Group-2" transform="translate(24.000000, 0.000000)">
                                            <polygon id="Triangle" transform="translate(4.500000, 62.000000) rotate(-90.000000) translate(-4.500000, -62.000000) " points="4.5 57.5 12.5 66.5 -3.5 66.5"></polygon>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <p class="text-sm font-bold text-white pb-1">Keep track of follow ups</p>
                        <p class="text-xs leading-4 text-white pb-3">Reach out to more prospects at the right moment.</p>
                        <div class="flex justify-between">
                            <div class="flex items-center">
                                <span class="text-xs font-bold text-white">Step 1 of 4</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-xs text-white underline mr-2 cursor-pointer">Skip Tour</span>
                                <button class="bg-white transition duration-150 ease-in-out focus:outline-none hover:bg-gray-200 rounded text-indigo-700 px-5 py-1 text-xs">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Code Block for indigo tooltip ends-->

                <!--Code Block for gray tooltip starts-->
                <div class="relative" @mouseover="showTooltip(3)" @mouseout="hideTooltip(3)">
                    <div class="mr-2 cursor-pointer">
                        <svg aria-haspopup="true" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-info-circle" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#A0AEC0" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <circle cx="12" cy="12" r="9" />
                            <line x1="12" y1="8" x2="12.01" y2="8" />
                            <polyline points="11 12 12 12 12 16 13 16" />
                        </svg>
                    </div>
                    <div id="tooltip3" role="tooltip" class="z-20 -mt-20 w-64 absolute transition duration-150 ease-in-out left-0 ml-8 shadow-lg bg-gray-800 p-4 rounded">
                        <svg class="absolute left-0 -ml-2 bottom-0 top-0 h-full" width="9px" height="16px" viewBox="0 0 9 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Tooltips-" transform="translate(-874.000000, -1029.000000)" fill="#2D3748">
                                    <g id="Group-3-Copy-16" transform="translate(850.000000, 975.000000)">
                                        <g id="Group-2" transform="translate(24.000000, 0.000000)">
                                            <polygon id="Triangle" transform="translate(4.500000, 62.000000) rotate(-90.000000) translate(-4.500000, -62.000000) " points="4.5 57.5 12.5 66.5 -3.5 66.5"></polygon>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <p class="text-sm font-bold text-white pb-1">Keep track of follow ups</p>
                        <p class="text-xs leading-4 text-white pb-3">Reach out to more prospects at the right moment.</p>
                        <div class="flex justify-between">
                            <div class="flex items-center">
                                <span class="text-xs font-bold text-white">Step 1 of 4</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-xs text-white underline mr-2 cursor-pointer">Skip Tour</span>
                                <button class="bg-white transition duration-150 ease-in-out focus:outline-none hover:bg-gray-200 rounded text-gray-600 px-5 py-1 text-xs">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Code Block for gray tooltip ends-->
            </div>
        </div>
    </div>
</template>


<script>
    showTooltip(flag) {
                switch (flag) {
                    case 1:
                        document.getElementById("tooltip1").classList.remove("opacity-0");
                        break;
                    case 2:
                        document.getElementById("tooltip2").classList.remove("opacity-0");
                        break;
                    case 3:
                        document.getElementById("tooltip3").classList.remove("opacity-0");
                        break;
                }
            },
            hideTooltip(flag) {
                switch (flag) {
                    case 1:
                        document.getElementById("tooltip1").classList.add("opacity-0");
                        break;
                    case 2:
                        document.getElementById("tooltip2").classList.add("opacity-0");
                        break;
                    case 3:
                        document.getElementById("tooltip3").classList.add("opacity-0");
                        break;
                }
            },
</script>

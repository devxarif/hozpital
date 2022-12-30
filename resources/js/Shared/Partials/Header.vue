<template>
     <header class="w-full">
          <div class="relative z-10 flex h-16 flex-shrink-0 border-b-2 border-gray-200 bg-white shadow-sm">
            <button type="button" class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden" @click="mobileMenuOpen = true">
              <span class="sr-only">Open sidebar</span>
              <Bars3BottomLeftIcon class="h-6 w-6" aria-hidden="true" />
            </button>
            <div class="flex flex-1 justify-between px-4 sm:px-6 items-center">
               <div class="mr-6">
                    <a href="#">
                        <svg v-if="showToggleSSidebar" @click="toggleSidebarMenu('hide')" class="h-6 w-6 text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 24"><title>bars</title><g fill="none"><g clip-path="url(#1668093471783-6451217_clip0_2_182354)"><path d="M.5 4.5A1.5 1.5 0 0 1 2 3h18a1.5 1.5 0 1 1 0 3H2A1.5 1.5 0 0 1 .5 4.5zm0 7.5c0-.83.672-1.5 1.5-1.5h18c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5H2A1.5 1.5 0 0 1 .5 12zM20 21H2a1.5 1.5 0 1 1 0-3h18c.83 0 1.5.67 1.5 1.5S20.83 21 20 21z" fill="#000"></path></g><defs><clipPath id="1668093471783-6451217_clip0_2_182354"><path fill="#fff" transform="translate(.5)" d="M0 0h21v24H0z"></path></clipPath></defs></g></svg>

                        <svg v-else @click="toggleSidebarMenu('show')" class="h-6 w-6 text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 24"><title>bars-staggered</title><g fill="none"><g clip-path="url(#1668093471782-6019237_clip0_2_182362)"><path d="M.5 4.5A1.5 1.5 0 0 1 2 3h18a1.5 1.5 0 1 1 0 3H2A1.5 1.5 0 0 1 .5 4.5zm3 7.5c0-.83.672-1.5 1.5-1.5h18c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5H5A1.5 1.5 0 0 1 3.5 12zM20 21H2a1.5 1.5 0 1 1 0-3h18c.83 0 1.5.67 1.5 1.5S20.83 21 20 21z" fill="#000"></path></g><defs><clipPath id="1668093471782-6019237_clip0_2_182362"><path fill="#fff" transform="translate(.5)" d="M0 0h24v24H0z"></path></clipPath></defs></g></svg>
                    </a>
               </div>
              <div class="flex flex-1">
                <form class="flex w-full md:ml-0" action="#" method="GET">
                  <label for="search-field" class="sr-only">Search all files</label>
                  <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center">
                      <MagnifyingGlassIcon class="h-5 w-5 flex-shrink-0" aria-hidden="true" />
                    </div>
                    <input name="search-field" id="search-field" class="h-full w-full border-transparent py-2 pl-8 pr-3 text-base text-gray-900 placeholder-gray-500 focus:border-transparent focus:placeholder-gray-400 focus:outline-none focus:ring-0" placeholder="Search" type="search" />
                  </div>
                </form>
              </div>
              <!-- <div class="flex items-center px-6 py-4 md:mx-auto md:max-w-3xl lg:mx-0 lg:max-w-none xl:px-0">
                <div class="w-full">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                        </svg>
                        </div>
                        <input id="search" name="search" class="block w-60 rounded-md border border-gray-300 bg-white py-2 pl-10 pr-3 text-sm placeholder-gray-500 focus:border-indigo-500 focus:text-gray-900 focus:placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm" placeholder="Search" type="search">
                    </div>
                </div>
            </div> -->
              <div class="ml-2 flex items-center space-x-4 sm:ml-6 sm:space-x-6">
                <ul class="flex items-center flex-shrink-0 space-x-10">
                    <li class="relative">
                        <button @click="toggleOrganization = !toggleOrganization" id="dropdownDefault" data-dropdown-toggle="dropdown" class="text-gray-900 focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button">Kodebazar's Organization <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

                        <ul v-if="toggleOrganization" v-click-outside="()=> toggleOrganization =false" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                                aria-label="submenu">
                            <li class="flex">
                                <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                    href="#">
                                    <div class="py-3 px-4 text-sm text-gray-900 dark:text-white">
                                        <div>{{ $page.props.authenticatedUser.name }}</div>
                                        <div class="font-medium truncate">{{ $page.props.authenticatedUser.email }}</div>
                                    </div>
                                </a>
                            </li>
                            <li class="flex">
                                <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                    href="#">
                                    <img class="object-cover w-6 h-6 mr-2" src="http://offday.test/admin/img/default-user.png" alt="" aria-hidden="true">
                                    <span class="text-md">Profile</span>
                                </a>
                            </li>
                            <li class="flex">
                                <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                    href="#">
                                    <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                        </path>
                                        <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span>Manage Organization</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="relative">
                        <button class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-blue"
                            @click="toggleThemeMode">
                            <svg v-if="isDarkMode" xmlns="http://www.w3.org/2000/svg"  class="w-7 h-7" fill="#4B5563" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><path d="M216.7,152.6A91.9,91.9,0,0,1,103.4,39.3h0A92,92,0,1,0,216.7,152.6Z" fill="none" stroke="#4B5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path></svg>

                            <svg v-else xmlns="http://www.w3.org/2000/svg"  class="w-7 h-7" fill="#4B5563" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><circle cx="128" cy="128" r="60" fill="none" stroke="#4B5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></circle><line x1="128" y1="28" x2="128" y2="12" fill="none" stroke="#4B5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line><line x1="198.7" y1="57.3" x2="210" y2="46" fill="none" stroke="#4B5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line><line x1="228" y1="128" x2="244" y2="128" fill="none" stroke="#4B5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line><line x1="198.7" y1="198.7" x2="210" y2="210" fill="none" stroke="#4B5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line><line x1="128" y1="228" x2="128" y2="244" fill="none" stroke="#4B5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line><line x1="57.3" y1="198.7" x2="46" y2="210" fill="none" stroke="#4B5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line><line x1="28" y1="128" x2="12" y2="128" fill="none" stroke="#4B5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line><line x1="57.3" y1="57.3" x2="46" y2="46" fill="none" stroke="#4B5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line></svg>


                        </button>
                    </li>

                    <li class="relative">
                        <button class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-blue"
                            @click="toggleHelpMenu = !toggleHelpMenu">
                            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="#4B5563" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><circle cx="128" cy="128" r="96" fill="none" stroke="#4B5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></circle><polyline points="120 124 128 124 128 176 136 176" fill="none" stroke="#4B5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></polyline><circle cx="126" cy="84" r="16"></circle></svg>
                        </button>

                        <template v-if="toggleHelpMenu">
                            <ul v-click-outside="()=> toggleHelpMenu =false" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                                aria-label="submenu">

                                <li class="flex hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                                    <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md"
                                        href="#">
                                        <span>Help</span>
                                    </a>
                                </li>
                                <li class="flex hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                                    <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md"
                                        href="#">
                                        <span>Documentation</span>
                                    </a>
                                </li>
                                <li class="flex hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                                    <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md"
                                        href="#">
                                        <span>FAQ</span>
                                    </a>
                                </li>
                                <li class="flex hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                                    <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md"
                                        href="#">
                                        <span>Contact Support</span>
                                    </a>
                                </li>
                            </ul>
                        </template>
                    </li>

                    <li class="relative">
                        <button class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-blue"
                            @click="toggleNotificationsMenu = !toggleNotificationsMenu">
                            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="#4B5563" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><line x1="96" y1="228" x2="160" y2="228" fill="none" stroke="#4B5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line><path d="M56.2,104a71.9,71.9,0,0,1,72.3-72c39.6.3,71.3,33.2,71.3,72.9V108c0,35.8,7.5,56.6,14.1,68a8,8,0,0,1-6.9,12H49a8,8,0,0,1-6.9-12c6.6-11.4,14.1-32.2,14.1-68Z" fill="none" stroke="#4B5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path></svg>
                            <span aria-hidden="true"
                                class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"></span>
                        </button>
                        <Transition name="slide-fade">
                            <div class="fixed inset-0 overflow-hidden" v-if="toggleNotificationsMenu">
                                <div class="absolute inset-0 overflow-hidden transition-opacity">
                                    <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                                    <div class="pointer-events-none absolute right-0 inset-y-0 flex max-w-full ltr:pl-10 rtl:pr-10"
                                        v-click-outside="()=> toggleNotificationsMenu = false">
                                        <div class="pointer-events-auto w-screen max-w-xs lg:max-w-lg">
                                            <div class="flex h-full flex-col bg-white shadow-xl">
                                                <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
                                                    <div class="flex items-start justify-between rtl:flex-row-reverse mb-5">
                                                            <h2 class="text-2xl tracking-wide font-bold text-gray-900">
                                                                {{ __('Notifications') }}
                                                            </h2>
                                                            <div class="ml-3 flex h-7 items-center">
                                                                <button type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500"
                                                                    @click="toggleNotificationsMenu = false">
                                                                    <svg class="h-6 w-6" x-description="Heroicon name: outline/x"
                                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor" aria-hidden="true">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                            d="M6 18L18 6M6 6l12 12"></path>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="flex justify-start">
                                                            <div class="divide-y divide-gray-100 dark:divide-gray-700">
                                                                <a href="#" class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                                <div class="flex-shrink-0">
                                                                    <img class="w-11 h-11 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" alt="Jese image">
                                                                    <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-blue-600 rounded-full border border-white dark:border-gray-800">
                                                                    <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
                                                                    </div>
                                                                </div>
                                                                <div class="pl-3 w-full">
                                                                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">New message from <span class="font-semibold text-gray-900 dark:text-white">Jese Leos</span>: "Hey, what's up? All set for the presentation?"</div>
                                                                    <div class="text-xs text-blue-600 dark:text-blue-500">a few moments ago</div>
                                                                </div>
                                                                </a>
                                                                <a href="#" class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                                <div class="flex-shrink-0">
                                                                    <img class="w-11 h-11 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" alt="Joseph image">
                                                                    <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-gray-900 rounded-full border border-white dark:border-gray-800">
                                                                    <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path></svg>
                                                                    </div>
                                                                </div>
                                                                <div class="pl-3 w-full">
                                                                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Joseph Mcfall</span> and <span class="font-medium text-gray-900 dark:text-white">5 others</span> started following you.</div>
                                                                    <div class="text-xs text-blue-600 dark:text-blue-500">10 minutes ago</div>
                                                                </div>
                                                                </a>
                                                                <a href="#" class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                                <div class="flex-shrink-0">
                                                                    <img class="w-11 h-11 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" alt="Bonnie image">
                                                                    <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-red-600 rounded-full border border-white dark:border-gray-800">
                                                                    <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                                                                    </div>
                                                                </div>
                                                                <div class="pl-3 w-full">
                                                                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Bonnie Green</span> and <span class="font-medium text-gray-900 dark:text-white">141 others</span> love your story. See it and view more stories.</div>
                                                                    <div class="text-xs text-blue-600 dark:text-blue-500">44 minutes ago</div>
                                                                </div>
                                                                </a>
                                                                <a href="#" class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                                <div class="flex-shrink-0">
                                                                    <img class="w-11 h-11 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" alt="Leslie image">
                                                                    <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-green-400 rounded-full border border-white dark:border-gray-800">
                                                                    <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                                                    </div>
                                                                </div>
                                                                <div class="pl-3 w-full">
                                                                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Leslie Livingston</span> mentioned you in a comment: <span class="font-medium text-blue-500" href="#">@bonnie.green</span> what do you say?</div>
                                                                    <div class="text-xs text-blue-600 dark:text-blue-500">1 hour ago</div>
                                                                </div>
                                                                </a>
                                                                <a href="#" class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                                <div class="flex-shrink-0">
                                                                    <img class="w-11 h-11 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" alt="Robert image">
                                                                    <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-blue-500 rounded-full border border-white dark:border-gray-800">
                                                                    <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                                                                    </div>
                                                                </div>
                                                                <div class="pl-3 w-full">
                                                                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Robert Brown</span> posted a new video: Glassmorphism - learn how to implement the new design trend.</div>
                                                                    <div class="text-xs text-blue-600 dark:text-blue-500">3 hours ago</div>
                                                                </div>
                                                                </a>
                                                            </div>
                                                            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-8 py-3 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                <svg class="inline w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" points="216 72.005 104 184 48 128.005"/></svg>
                                                                Send Request
                                                            </button>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </Transition>
                    </li>


                    <li class="relative">
                        <button class="align-middle rounded-full focus:shadow-outline-blue focus:outline-none"
                            @click="toggleProfileMenu = !toggleProfileMenu">
                            <img class="object-cover w-10 h-10 rounded-full" :src="role == 'owner' ? currentOrganization.organization_logo: $page.props.authenticatedUser.avatar_url" alt="" aria-hidden="true" />
                        </button>
                        <template v-if="toggleProfileMenu">
                            <ul v-click-outside="()=> toggleProfileMenu =false" class="absolute right-0 w-60 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                                aria-label="submenu">
                                <li class="flex hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200 dark:hover:text-gray-200">
                                    <span class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md" href="#">
                                        <div class="py-3 px-4 text-md font-bold text-gray-900 dark:text-white">
                                            <div>{{ $page.props.authenticatedUser.name }}</div>
                                            <div class="font-medium truncate">{{ $page.props.authenticatedUser.email }}</div>
                                        </div>
                                    </span>
                                </li>
                                <li class="flex hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                                    <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md"
                                        href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3" fill="#4b5563" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><circle cx="128" cy="96" r="64" fill="none" stroke="#4b5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></circle><path d="M31,216a112,112,0,0,1,194,0" fill="none" stroke="#4b5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path></svg>
                                        <span class="text-md font-bold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">Profile</span>
                                    </a>
                                </li>
                                <li class="flex hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                                    <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md"
                                        href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3" fill="#4b5563" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><circle cx="128" cy="128" r="44" fill="none" stroke="#4b5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></circle><path d="M183.7,65.1q3.8,3.5,7.2,7.2l27.3,3.9a103.2,103.2,0,0,1,10.2,24.6l-16.6,22.1s.3,6.8,0,10.2l16.6,22.1a102.2,102.2,0,0,1-10.2,24.6l-27.3,3.9s-4.7,4.9-7.2,7.2l-3.9,27.3a103.2,103.2,0,0,1-24.6,10.2l-22.1-16.6a57.9,57.9,0,0,1-10.2,0l-22.1,16.6a102.2,102.2,0,0,1-24.6-10.2l-3.9-27.3q-3.7-3.5-7.2-7.2l-27.3-3.9a103.2,103.2,0,0,1-10.2-24.6l16.6-22.1s-.2-6.8,0-10.2L27.6,100.8A102.2,102.2,0,0,1,37.8,76.2l27.3-3.9q3.5-3.7,7.2-7.2l3.9-27.3a103.2,103.2,0,0,1,24.6-10.2l22.1,16.6a57.9,57.9,0,0,1,10.2,0l22.1-16.6a102.2,102.2,0,0,1,24.6,10.2Z" fill="none" stroke="#4b5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path></svg>
                                        <span class="text-md font-bold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">Settings</span>
                                    </a>
                                </li>
                                <li class="flex hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                                    <Link href="/logout" method="post" class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md">
                                        <svg class="w-6 h-6 mr-3" xmlns="http://www.w3.org/2000/svg" width="192" height="192" fill="#4b5563" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><polyline points="174 86 216 128 174 170" fill="none" stroke="#4b5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></polyline><line x1="104" y1="128" x2="216" y2="128" fill="none" stroke="#4b5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line><path d="M104,216H48a8,8,0,0,1-8-8V48a8,8,0,0,1,8-8h56" fill="none" stroke="#4b5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path></svg>
                                        <span class="text-md font-bold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">Logout</span>
                                    </Link>
                                </li>
                            </ul>
                        </template>
                    </li>
                </ul>

              </div>
            </div>
          </div>
    </header>
</template>

<script>
    import { Bars3BottomLeftIcon } from '@heroicons/vue/24/outline'
    import { MagnifyingGlassIcon } from '@heroicons/vue/20/solid'

    export default {
        props: {
            showSSidebar: {
                type: Boolean
            }
        },
        components:{
            Bars3BottomLeftIcon,
            MagnifyingGlassIcon
        },
        data() {
            return {
                toggleProfileMenu: false,
                toggleNotificationsMenu: false,
                toggleHelpMenu: false,
                toggleOrganization: false,
                isDarkMode: false,
                role: this.$page.props.authenticatedUser.role,
                currentOrganization: this.$page.props.currentOrganization,

                showToggleSSidebar: this.showSSidebar
            };
        },
        methods: {
            toggleThemeMode() {
                if (this.isDarkMode) {
                    this.isDarkMode = false;
                    document.body.classList.add("theme-dark");
                }
                else {
                    this.isDarkMode = true;
                    document.body.classList.remove("theme-dark");
                }
            },
            toggleSideMenu(){
                alert()
            },
            toggleSidebarMenu(type){
                console.log(type)

                this.showToggleSSidebar = !this.showToggleSSidebar
                this.$emit('toggleSSidebar')
            }
        }
    }
</script>

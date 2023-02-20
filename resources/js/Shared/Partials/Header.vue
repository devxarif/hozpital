<template>
     <header class="w-full">
          <div class="relative z-10 flex h-16 flex-shrink-0 border-b-2 border-gray-200 bg-white shadow-sm">
            <button type="button" class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 md:hidden" @click="mobileMenuOpen = true">
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

                <div class="flex items-center px-6 py-4 md:mx-auto md:max-w-3xl lg:mx-0 lg:max-w-none xl:px-0">
                    <div class="w-full">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                            </svg>
                            </div>
                            <input id="search" name="search" class="block w-60 rounded-md border border-gray-300 bg-white py-2 pl-10 pr-3 text-sm placeholder-gray-500 focus:border-blue-500 focus:text-gray-900 focus:placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm" placeholder="Search" type="search">
                        </div>
                    </div>
                </div>
                <div class="ml-2 flex items-center space-x-4 sm:ml-6 sm:space-x-6">
                  <ul class="flex items-center flex-shrink-0 space-x-3">
                    <Menu as="div" class="relative inline-block text-left">
                        <div>
                        <MenuButton class="inline-flex w-full justify-center rounded-md px-4 py-2 text-sm font-medium text-gray-700 focus:outline-none">
                            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="#4B5563" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><circle cx="128" cy="128" r="96" fill="none" stroke="#4B5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></circle><polyline points="120 124 128 124 128 176 136 176" fill="none" stroke="#4B5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></polyline><circle cx="126" cy="84" r="16"></circle></svg>
                        </MenuButton>
                        </div>

                        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                        <MenuItems class="absolute right-0 z-10 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <div class="py-1">
                                <MenuItem v-slot="{ active }">
                                    <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Help</a>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Documentation</a>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">FAQ</a>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Contact Support</a>
                                </MenuItem>
                            </div>
                        </MenuItems>
                        </transition>
                    </Menu>

                    <li class="relative">
                        <button class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-blue"
                            @click="toggleNotificationsMenu = !toggleNotificationsMenu">
                            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="#4B5563" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><line x1="96" y1="228" x2="160" y2="228" fill="none" stroke="#4B5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line><path d="M56.2,104a71.9,71.9,0,0,1,72.3-72c39.6.3,71.3,33.2,71.3,72.9V108c0,35.8,7.5,56.6,14.1,68a8,8,0,0,1-6.9,12H49a8,8,0,0,1-6.9-12c6.6-11.4,14.1-32.2,14.1-68Z" fill="none" stroke="#4B5563" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path></svg>
                            <span aria-hidden="true"
                                class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full"></span>
                        </button>

                        <Notification :show="toggleNotificationsMenu"  @close-drawer="toggleNotificationsMenu = false"/>
                    </li>

                    <!-- Profile  -->
                    <Menu as="div" class="relative inline-block text-left">
                        <div>
                        <MenuButton class="inline-flex w-full justify-center rounded-md px-4 py-2 text-sm font-medium text-gray-700 focus:outline-none">
                            <img class="object-cover w-10 h-10 rounded-full" :src="role == 'owner' ? currentOrganization.organization_logo: $page.props.authenticatedUser.avatar_url" alt="" aria-hidden="true" />
                        </MenuButton>
                        </div>

                        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                        <MenuItems class="absolute right-0 z-10 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <div class="px-4 py-3">
                            <p class="text-sm">{{ $page.props.authenticatedUser.name }}</p>
                            <p class="truncate text-sm font-medium text-gray-900">{{ $page.props.authenticatedUser.email }}</p>
                            </div>
                            <div class="py-1">
                            <MenuItem v-slot="{ active }">
                                <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Profile</a>
                            </MenuItem>
                            <MenuItem v-slot="{ active }">
                                <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Settings</a>
                            </MenuItem>
                            </div>
                            <div class="py-1">
                                <MenuItem v-slot="{ active }">
                                <Link href="/logout" method="post" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block w-full px-4 py-2 text-left text-sm']">Sign out</Link>
                                </MenuItem>
                            </div>
                        </MenuItems>
                        </transition>
                    </Menu>
                </ul>

              </div>
            </div>
          </div>
    </header>
</template>

<script>
    import { Bars3BottomLeftIcon } from '@heroicons/vue/24/outline'
    import { MagnifyingGlassIcon } from '@heroicons/vue/20/solid'
    import Notification from './HeaderItems/Notification.vue'

    export default {
        props: {
            showSSidebar: {
                type: Boolean
            }
        },
        components:{
            Bars3BottomLeftIcon,
            MagnifyingGlassIcon,
            Notification
        },
        data() {
            return {
                toggleNotificationsMenu: false,
                role: this.$page.props.authenticatedUser.role,
                currentOrganization: this.$page.props.currentOrganization,

                showToggleSSidebar: this.showSSidebar
            };
        },
        methods: {
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

<template>
    <div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex flex-grow flex-col overflow-y-auto border-r border-gray-200 bg-white pt-5">
          <div class="flex flex-shrink-0 items-center px-4">
            <img class="h-8 w-auto" src="admin/img/hozpital_logo.svg" alt="Your Company">
          </div>
          <div class="mt-5 flex flex-grow flex-col">
            <nav class="flex-1 space-y-1 px-2 pb-4">

                <a href="javascript:void(0)" class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                  <svg class="text-gray-500 mr-3 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
                  </svg>
                  Dashboard
                </a>

                <a href="javascript:void(0)" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                  <svg class="text-gray-400 group-hover:text-gray-500 mr-3 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"></path>
                  </svg>
                  Team
                </a>
            </nav>
          </div>
        </div>
      </div> <div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex min-h-0 flex-1 flex-col bg-slate-800">
          <div class="flex flex-1 flex-col overflow-y-auto pt-5 pb-4">
            <div class="flex flex-shrink-0 items-center px-4">
              <img class="h-8 w-auto" src="admin/img/hozpital_logo.svg" alt="Your Company">
            </div>
            <nav class="mt-5 flex-1 space-y-1 px-2">
                <NavItem title="Dashboard" :href="route('dashboard')" :active="route().current('dashboard')">
                    <template v-slot:icon>
                        <HomeIcon class="mr-3 flex-shrink-0 h-7 w-7"/>
                    </template>
                </NavItem>
                <NavItem title="Patient" :href="route('receptionist.patient.index')" :active="route().current('receptionist.patient.index')">
                    <template v-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon mr-3 flex-shrink-0 h-6 w-6" viewBox="0 0 512 512"><title>Person</title><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                    </template>
                </NavItem>
                <DropdownMenu title="Bed" :active="route().current('receptionist.bed.index') || route().current('receptionist.bedType.index') || route().current('receptionist.bedFloor.index') || route().current('receptionist.bedAllotment.index')">
                    <template v-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon mr-3 flex-shrink-0 h-6 w-6" viewBox="0 0 512 512"><title>Bed</title><path d="M384 240H96V136a40.12 40.12 0 0140-40h240a40.12 40.12 0 0140 40v104zM48 416V304a64.19 64.19 0 0164-64h288a64.19 64.19 0 0164 64v112" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M48 416v-8a24.07 24.07 0 0124-24h368a24.07 24.07 0 0124 24v8M112 240v-16a32.09 32.09 0 0132-32h80a32.09 32.09 0 0132 32v16M256 240v-16a32.09 32.09 0 0132-32h80a32.09 32.09 0 0132 32v16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                    </template>
                    <DropdownMenuItem title="Bed List" :href="route('receptionist.bed.index')" :active="route().current('receptionist.bed.index')"/>
                    <DropdownMenuItem title="Bed Type List" :href="route('receptionist.bedType.index')" :active="route().current('receptionist.bedType.index')"/>
                    <DropdownMenuItem title="Bed Floor List" :href="route('receptionist.bedFloor.index')" :active="route().current('receptionist.bedFloor.index')"/>
                    <DropdownMenuItem title="Bed Allotment" :href="route('receptionist.bedAllotment.index')" :active="route().current('receptionist.bedAllotment.index')"/>
                </DropdownMenu>
                <DropdownMenu title="Blood Bank" :active="route().current('receptionist.bloodBank.index') || route().current('receptionist.bloodDonor.index') || route().current('receptionist.bloodDonation.index') ">
                    <template v-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon mr-3 flex-shrink-0 h-6 w-6" viewBox="0 0 512 512"><title>Water</title><path d="M400 320c0 88.37-55.63 144-144 144s-144-55.63-144-144c0-94.83 103.23-222.85 134.89-259.88a12 12 0 0118.23 0C296.77 97.15 400 225.17 400 320z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path d="M344 328a72 72 0 01-72 72" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                    </template>
                    <DropdownMenuItem title="Blood Bank" :href="route('receptionist.bloodBank.index')" :active="route().current('receptionist.bloodBank.index')"/>
                    <DropdownMenuItem title="Blood Donor" :href="route('receptionist.bloodDonor.index')" :active="route().current('receptionist.bloodDonor.index')"/>
                    <DropdownMenuItem title="Blood Donation" :href="route('receptionist.bloodDonation.index')" :active="route().current('receptionist.bloodDonation.index')"/>
                </DropdownMenu>
            </nav>
          </div>
          <div class="flex flex-shrink-0 bg-gray-700 p-4">
            <a href="javascript:void(0)" class="group block w-full flex-shrink-0">
              <div class="flex items-center">
                <div>
                  <img class="inline-block h-9 w-9 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="">
                </div>
                <div class="ml-3">
                  <p class="text-sm font-medium text-white">Tom Cook</p>
                  <p class="text-xs font-medium text-gray-300 group-hover:text-gray-200">View profile</p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>

      <!-- Mobile menu -->
      <TransitionRoot as="template" :show="mobileMenuOpen">
          <Dialog as="div" class="relative z-20 md:hidden" @close="mobileMenuOpen = false">
              <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
              <div class="fixed inset-0 bg-gray-600 bg-opacity-75" />
              </TransitionChild>

              <div class="fixed inset-0 z-40 flex">
              <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
                  <DialogPanel class="relative flex w-full max-w-xs flex-1 flex-col bg-gray-900 pt-5 pb-4">
                  <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
                      <div class="absolute top-1 right-0 -mr-14 p-1">
                      <button type="button" class="flex h-12 w-12 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-white" @click="mobileMenuOpen = false">
                          <XMarkIcon class="h-5 w-5 text-white" aria-hidden="true" />
                          <span class="sr-only">Close sidebar</span>
                      </button>
                      </div>
                  </TransitionChild>
                  <div class="flex flex-shrink-0 items-center px-4">
                      <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=white" alt="Your Company" />
                  </div>
                  <div class="mt-5 h-0 flex-1 overflow-y-auto px-2">
                      <nav class="flex h-full flex-col">
                      <div class="space-y-1">
                          <a href="javascript:void(0)" class="bg-gray-900 text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                              <svg class="mr-4 h-5 w-5 flex-shrink-0 text-blue-300" x-description="Heroicon name: outline/home" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
                              </svg>
                              Dashboard
                          </a>
                          <a href="javascript:void(0)" class="text-white hover:bg-gray-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                              <svg class="mr-4 h-5 w-5 flex-shrink-0 text-blue-300" x-description="Heroicon name: outline/users" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"></path>
                              </svg>
                          Team
                          </a>
                      </div>
                      </nav>
                  </div>
                  </DialogPanel>
              </TransitionChild>
              <div class="w-14 flex-shrink-0" aria-hidden="true">
              </div>
              </div>
          </Dialog>
      </TransitionRoot>
  </template>

  <script>
      import {
          Dialog,
          DialogPanel,
          Menu,
          MenuButton,
          MenuItem,
          MenuItems,
          TransitionChild,
          TransitionRoot,
      } from '@headlessui/vue'
      import NavItem from "@/Shared/Partials/Sidebar/ListItem/NavItem.vue"
      import DropdownMenu from "@/Shared/Partials/Sidebar/ListItem/DropdownMenu.vue"
      import DropdownMenuItem from "@/Shared/Partials/Sidebar/ListItem/DropdownMenuItem.vue"

      import { library } from '@fortawesome/fontawesome-svg-core'
      import { faHome, faCircle } from '@fortawesome/free-solid-svg-icons'
      import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

      library.add(faHome, faCircle)

  export default {
      components: {
          faCircle,
          faHome,
          FontAwesomeIcon,

          NavItem,
          DropdownMenu,
          DropdownMenuItem,


          Dialog,
          DialogPanel,
          Menu,
          MenuButton,
          MenuItem,
          MenuItems,
          TransitionChild,
          TransitionRoot,
      },
      data(){
          return {
              role: this.$page.props.authenticatedUser.role,
              mobileMenuOpen: false,
              open: false
          }
      },
      methods:{
          checkLinkActive (routes){
              return routes.includes(this.$page.component);
          }
      }
  }
  </script>

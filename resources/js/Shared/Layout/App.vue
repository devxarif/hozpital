<template>
    <Head :title="__(title)" v-if="title" />

    <div class="min-h-full">
        <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>
            <div class="fixed inset-0 z-40 flex">
                <div class="relative flex w-full max-w-xs flex-1 flex-col bg-cyan-700 pt-5 pb-4">
                    <div class="absolute top-0 right-0 -mr-12 pt-2">
                        <button type="button"
                            class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                            <span class="sr-only">Close sidebar</span>
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex flex-shrink-0 items-center px-4">
                        <!-- <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=cyan&shade=300"
                            alt="Easywire logo"> -->
                    </div>

                    <nav class="mt-5 h-full flex-shrink-0 divide-y divide-cyan-800 overflow-y-auto"
                        aria-label="Sidebar">
                        <div class="space-y-1 px-2">

                            <a href="javascript:void(0)"
                                class="ext-white hover:text-white hover:bg-gray-600 group flex items-center px-2 py-2 text-base font-medium rounded-md"
                                aria-current="page">

                                <svg class="mr-4 h-6 w-6 flex-shrink-0 text-white" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                                Home
                            </a>

                            <a href="javascript:void(0)"
                                class="text-white hover:text-white hover:bg-gray-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
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
                                    class="group flex items-center rounded-md px-2 py-2 text-base font-medium text-white hover:bg-gray-600 hover:text-white">
                                    <svg class="mr-4 h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.5 12a7.5 7.5 0 0015 0m-15 0a7.5 7.5 0 1115 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077l1.41-.513m14.095-5.13l1.41-.513M5.106 17.785l1.15-.964m11.49-9.642l1.149-.964M7.501 19.795l.75-1.3m7.5-12.99l.75-1.3m-6.063 16.658l.26-1.477m2.605-14.772l.26-1.477m0 17.726l-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205L12 12m6.894 5.785l-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864l-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
                                    </svg>
                                    Settings
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>

                <div class="w-14 flex-shrink-0" aria-hidden="true">
                    <!-- Dummy element to force sidebar to shrink to fit close icon -->
                </div>
            </div>
        </div>

        <!-- Static sidebar for desktop -->
        <Sidebar/>
        <!-- <Sidebar :showSidebar="showSidebar"/> -->
        <!-- <div class="flex flex-1 flex-col" :class="!showSidebar ? 'lg:pl-64':''"> -->
        <div class="flex flex-1 flex-col lg:pl-64">
            <Header/>
            <!-- <Header @updateSidebar="toggleSidebar" /> -->
            <main class="p-8 h-screen">
                <!-- Page header -->
                <!-- <div class="bg-white shadow">
                    <div class="px-4 sm:px-6 lg:mx-auto">
                        <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-gray-200">
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center">
                                    <img class="hidden h-16 w-16 rounded-full sm:block"
                                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.6&w=256&h=256&q=80"
                                        alt="">
                                    <div>
                                        <div class="flex items-center">
                                            <img class="h-16 w-16 rounded-full sm:hidden"
                                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.6&w=256&h=256&q=80"
                                                alt="">
                                            <h1
                                                class="ml-3 text-2xl font-bold leading-7 text-white-900 sm:truncate sm:leading-9">
                                                Good morning, Emilia Birch</h1>
                                        </div>
                                        <dl class="mt-6 flex flex-col sm:ml-3 sm:mt-1 sm:flex-row sm:flex-wrap">
                                            <dt class="sr-only">Company</dt>
                                            <dd
                                                class="flex items-center text-sm font-medium capitalize text-gray-500 sm:mr-6">
                                                <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M4 16.5v-13h-.25a.75.75 0 010-1.5h12.5a.75.75 0 010 1.5H16v13h.25a.75.75 0 010 1.5h-3.5a.75.75 0 01-.75-.75v-2.5a.75.75 0 00-.75-.75h-2.5a.75.75 0 00-.75.75v2.5a.75.75 0 01-.75.75h-3.5a.75.75 0 010-1.5H4zm3-11a.5.5 0 01.5-.5h1a.5.5 0 01.5.5v1a.5.5 0 01-.5.5h-1a.5.5 0 01-.5-.5v-1zM7.5 9a.5.5 0 00-.5.5v1a.5.5 0 00.5.5h1a.5.5 0 00.5-.5v-1a.5.5 0 00-.5-.5h-1zM11 5.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5v1a.5.5 0 01-.5.5h-1a.5.5 0 01-.5-.5v-1zm.5 3.5a.5.5 0 00-.5.5v1a.5.5 0 00.5.5h1a.5.5 0 00.5-.5v-1a.5.5 0 00-.5-.5h-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Duke street studio
                                            </dd>
                                            <dt class="sr-only">Account status</dt>
                                            <dd
                                                class="mt-3 flex items-center text-sm font-medium capitalize text-gray-500 sm:mr-6 sm:mt-0">
                                                <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-green-400"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Verified account
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 flex space-x-3 md:mt-0 md:ml-4">
                                <button type="button"
                                    class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">Add
                                    money</button>
                                <button type="button"
                                    class="inline-flex items-center rounded-md border border-transparent bg-gray-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">Send
                                    money</button>
                            </div>
                        </div>
                    </div>
                </div> -->

                <slot />
            </main>
        </div>
    </div>


<!-- <div class="fixed right-6 bottom-6 group">
    <div class="flex flex-col items-center mb-4 space-y-2">
        <button type="button" class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
            <svg aria-hidden="true" class="w-6 h-6 -ml-px " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"></path></svg>
            <span class="sr-only">Share</span>
        </button>
        <button type="button" class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Print</span>
        </button>
        <button type="button" class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-5L9 4H4zm7 5a1 1 0 00-2 0v1.586l-.293-.293a.999.999 0 10-1.414 1.414l2 2a.999.999 0 001.414 0l2-2a.999.999 0 10-1.414-1.414l-.293.293V9z" fill-rule="evenodd"></path></svg>
            <span class="sr-only">Download</span>
        </button>
        <button type="button" class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 dark:hover:text-white shadow-sm dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 9a2 2 0 012-2h6a2 2 0 012 2v6a2 2 0 01-2 2H9a2 2 0 01-2-2V9z"></path><path d="M5 3a2 2 0 00-2 2v6a2 2 0 002 2V5h8a2 2 0 00-2-2H5z"></path></svg>
            <span class="sr-only">Copy</span>
        </button>
    </div>
    <button v-tooltip="'Quick Menu'" @click="toggleQuickMenu = !toggleQuickMenu" type="button" class="flex items-center justify-center text-white rounded-full w-14 h-14 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800" :class="toggleQuickMenu ? 'bg-red-700 hover:bg-red-800':'bg-blue-700 hover:bg-blue-800'">
        <svg aria-hidden="true" class="w-8 h-8 transition-transform" :class="toggleQuickMenu ? 'group-hover:rotate-45':'group-hover:rotate-90'" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
    </button>
</div> -->

</template>

<script>
    import {
        HomeModernIcon,
        HomeIcon
    } from '@heroicons/vue/24/outline'

    import Header from "../Partials/Header.vue";
    import Sidebar from "../Partials/Sidebar/Sidebar.vue";

    export default {
        props:{
            title: String,
        },
        components: {
            Header,
            Sidebar,
            HomeModernIcon,
            HomeIcon
        },
        data() {
            return {
                showSidebar: true,
                toggleQuickMenu: false,
            }
        },
        methods: {
            toggleSidebar(type){
                this.showSidebar = type
            }
        },
        watch: {
            pageFlashes: {
                handler(flashes) {
                    if (flashes.success) {
                        this.toastSuccess(flashes.success);
                    }
                    if (flashes.error) {
                        this.toastError(flashes.error);
                    }
                    if (flashes.warning) {
                        this.toastWarning(flashes.warning);
                    }
                },
                deep: true,
            },
        },
    }
</script>

<style>
    :deep(.popper) {
        background: #000000;
        padding: 20px;
        border-radius: 20px;
        color: #fff;
        width: 500px;
    }

    :deep(.popper #arrow::before) {
        background: #000000;
    }

    :deep(.popper:hover),
    :deep(.popper:hover > #arrow::before) {
        background: #000000;
    }

    .slide-fade-enter-active {
        transition: all 0.3s ease-in;
    }

    .slide-fade-leave-active {
        transition: all 0.3s cubic-bezier(1, 0.5, 0.8, 1);
    }

    .slide-fade-enter-from,
    .slide-fade-leave-to {
        transform: translateX(30px);
        opacity: 0;
    }
</style>

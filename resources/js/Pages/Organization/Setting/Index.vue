<template>
   <AppLayout>
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200">
        <div class="mb-1 w-full">
            <div class="mb-4">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="#" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
                                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                Employee
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-400 ml-1 md:ml-2 text-sm font-medium"
                                    aria-current="page">Settings</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="sm:flex">
                <div class="hidden sm:flex items-center sm:divide-x sm:divide-gray-100 mb-3 sm:mb-0">
                    <h2 class="text-3xl font-semibold leading-7 text-gray-900 dark:text-gray-200 sm:text-3xl sm:truncate">
                    {{ __('Setting') }}
                </h2>

                </div>
                <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                    <button v-tooltip="'Refresh'" class="w-1/2 text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-blue-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><title>refresh-cw-01</title><g fill="none"><path d="M21 10s-2.005-2.732-3.634-4.362a9 9 0 1 0 2.282 8.862M21 10V4m0 6h-6" stroke="#212121" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></g></svg>
                    </button>
                    <button type="button" data-modal-toggle="add-user-modal"
                        class="w-1/2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium inline-flex items-center justify-center rounded-full text-sm px-3 py-2 text-center sm:w-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-6 w-6"  viewBox="0 0 24 24"><title>check</title><g fill="none"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></g></svg>
                        Apply Leave
                    </button>
                    <button v-tooltip="'Customize Widgets'" class="w-1/2 bg-white border border-gray-300 hover:bg-gray-100 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"><title>Customization</title><g fill="none"><path d="M20.118 18.455H18c-.353-1.286-1.5-2.143-2.912-2.143-1.676 0-3.088 1.371-3.088 3s1.412 3 3.088 3c1.412 0 2.56-.857 2.912-2.143h2.118c.53 0 .882-.428.882-.857 0-.514-.353-.857-.882-.857zm-5.03 2.143c-.706 0-1.323-.6-1.323-1.286s.617-1.286 1.323-1.286 1.324.6 1.324 1.286-.618 1.286-1.324 1.286z" fill="#212121"></path><path d="M10.149 18.312H3.85c-.51 0-.851.5-.851 1 0 .6.426 1 .851 1h6.298c.51 0 .851-.5.851-1 0-.6-.425-1-.851-1z" fill="#212121"></path><path d="M3.851 6.312h6.298c.51 0 .851-.5.851-1s-.425-1-.851-1H3.85c-.51 0-.851.5-.851 1s.426 1 .851 1z" fill="#212121"></path><path d="M15.088 8.312c1.412 0 2.56-.857 2.912-2.143h2.118c.53 0 .882-.428.882-.857s-.441-.857-.882-.857H18c-.353-1.286-1.5-2.143-2.912-2.143-1.676 0-3.088 1.371-3.088 3s1.412 3 3.088 3zm0-4.286c.706 0 1.324.6 1.324 1.286s-.618 1.286-1.324 1.286c-.706 0-1.323-.6-1.323-1.286s.617-1.286 1.323-1.286z" fill="#212121"></path><path d="M3.882 13.17H6c.353 1.2 1.5 2.142 2.912 2.142 1.676 0 3.088-1.371 3.088-3s-1.412-3-3.088-3c-1.412 0-2.56.857-2.912 2.143H3.882a.871.871 0 0 0-.882.857c0 .429.441.857.882.857zm5.03-2.144c.706 0 1.323.6 1.323 1.286s-.617 1.286-1.323 1.286-1.324-.6-1.324-1.286.618-1.286 1.324-1.286z" fill="#212121"></path><path d="M20.14 11.312h-6.28c-.516 0-.86.5-.86 1s.43 1 .86 1h6.28c.516 0 .86-.5.86-1s-.344-1-.86-1z" fill="#212121"></path></g></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap justify-center">
        <div class="lg:w-4/12 block rounded-lg shadow-lg bg-white border-r-2">
            <!-- <div class="flex items-center justify-between m-8 mr-6 sm:my-10">
                <div class="text-4xl font-semibold tracking-tight leading-none">Settings</div>
            </div> -->
            <div class="flex flex-col divide-y border-t border-b">
                <div class="flex px-12 py-5 cursor-pointer bg-blue-50 dark:bg-hover" style="">
                    <!-- <HomeIcon/> -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>settings-03</title><g fill="none"><path d="M15.05 9H5.5a2.5 2.5 0 0 1 0-5h9.55m-6.1 16h9.55a2.5 2.5 0 0 0 0-5H8.95M3 17.5a3.5 3.5 0 1 0 7 0 3.5 3.5 0 0 0-7 0zm18-11a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z" stroke="#212121" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></g></svg>
                    <div class="ml-3">
                        <div class="font-medium leading-6 text-blue-500 dark:text-blue-500"> General </div>
                        <div class="mt-0.5 text-secondary"> Manage your public profile and private information </div>
                    </div>
                </div>
                <div class="flex px-12 py-5 cursor-pointer hover:bg-blue-50 dark:bg-hover" style="">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>settings-01</title><g fill="none"><path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" stroke="#212121" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M18.727 14.727a1.5 1.5 0 0 0 .3 1.655l.055.054a1.816 1.816 0 0 1 0 2.573 1.818 1.818 0 0 1-2.573 0l-.055-.055a1.5 1.5 0 0 0-1.654-.3 1.5 1.5 0 0 0-.91 1.373v.155a1.818 1.818 0 1 1-3.636 0V20.1a1.5 1.5 0 0 0-.981-1.373 1.5 1.5 0 0 0-1.655.3l-.054.055a1.818 1.818 0 0 1-3.106-1.287 1.818 1.818 0 0 1 .533-1.286l.054-.055a1.5 1.5 0 0 0 .3-1.654 1.5 1.5 0 0 0-1.372-.91h-.155a1.818 1.818 0 1 1 0-3.636H3.9a1.5 1.5 0 0 0 1.373-.981 1.5 1.5 0 0 0-.3-1.655l-.055-.054A1.818 1.818 0 1 1 7.491 4.99l.054.054a1.5 1.5 0 0 0 1.655.3h.073a1.5 1.5 0 0 0 .909-1.372v-.155a1.818 1.818 0 0 1 3.636 0V3.9a1.499 1.499 0 0 0 .91 1.373 1.5 1.5 0 0 0 1.654-.3l.054-.055a1.817 1.817 0 0 1 2.573 0 1.819 1.819 0 0 1 0 2.573l-.055.054a1.5 1.5 0 0 0-.3 1.655v.073a1.5 1.5 0 0 0 1.373.909h.155a1.818 1.818 0 0 1 0 3.636H20.1a1.499 1.499 0 0 0-1.373.91z" stroke="#212121" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></g></svg>
                    <div class="ml-3">
                        <div class="font-medium leading-6 hover:text-blue-500 dark:text-blue-500"> System Setup </div>
                        <div class="mt-0.5 text-secondary"> Manage your public profile and private information </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:w-8/12 block p-6 rounded-lg shadow-lg bg-gray-100">
            <h2 class="text-gray-900 text-3xl leading-tight font-medium mb-2">General</h2>

            <form class="mb-4">
                <div class="grid grid-cols-1 gap-4">
                    <div class="mb-4"><label for="plan_name"
                            class="block mb-2 text-md font-medium text-gray-900 dark:text-gray-300">Name <span
                                class="text-red-700">*</span></label><input type="text" id="plan_name"
                            class="bg-gray-50 border text-md rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Name">
                        <!--v-if-->
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">

                    <div class="mb-4"><label for=""
                            class="block mb-2 text-md font-medium text-gray-900 dark:text-gray-300">Leave Balance Day
                            <span class="text-red-700">*</span></label><input type="number" min="1" id="id"
                            class="bg-gray-50 border text-md rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Leave Balance">
                        </div>
                    <div class="mb-4"><label for=""
                            class="block mb-2 text-md font-medium text-gray-900 dark:text-gray-300">Leave Balance Day
                            <span class="text-red-700">*</span></label><input type="number" min="1" id="id"
                            class="bg-gray-50 border text-md rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Leave Balance">
                        </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4"><label for="plan_max_teams"
                            class="block mb-2 text-md font-medium text-gray-900 dark:text-gray-300">Status <span
                                class="text-red-700">*</span></label><label for="checked-toggle"
                            class="inline-flex relative items-center cursor-pointer"><input type="checkbox"
                                id="checked-toggle" class="sr-only peer">
                            <div
                                class="w-11 h-6 bg-gray-200 rounded-full peer dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                        </label></div>
                    <div class="mb-4">
                        <div class="flex items-start mb-6">
                            <div class="flex items-center h-5"><input id="auto_approve" type="checkbox"
                                    class="w-5 h-5 bg-gray-50 rounded border border-gray-300 dark:bg-gray-700 dark:border-gray-600 checked:bg-blue-600 checked:border-blue-600 transition duration-200"
                                    value=""></div><label for="auto_approve"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Auto Approve</label>
                        </div>
                    </div>
                </div><button type="submit"
                    class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-3"><span><svg
                            class="inline w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none"></rect>
                            <polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="24" points="216 72.005 104 184 48 128.005"></polyline>
                        </svg> Save</span></button>
            </form>
        </div>
    </div>




    <!-- <div class="flex flex-wrap">
        <div class="px-2 lg:w-1/4 border-2 ">
            <a href="https://demo.cartify.dev/admin"
                class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                <svg class="mr-3 flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg> Dashboard
            </a>

            <a href="https://demo.cartify.dev/admin/categories"
                class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                <svg class="mr-3 flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                </svg> Categories
            </a>

            <a href="https://demo.cartify.dev/admin/collections"
                class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                <svg class="mr-3 flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                    </path>
                </svg> Collections
            </a>

            <a href="https://demo.cartify.dev/admin/products"
                class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                <svg class="mr-3 flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg> Products
            </a>
        </div>
        <div class="px-2 lg:w-1/2 offset-1">
            <a href="https://demo.cartify.dev/admin"
                class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                <svg class="mr-3 flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg> Dashboard
            </a>

            <a href="https://demo.cartify.dev/admin/categories"
                class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                <svg class="mr-3 flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                </svg> Categories
            </a>

            <a href="https://demo.cartify.dev/admin/collections"
                class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                <svg class="mr-3 flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                    </path>
                </svg> Collections
            </a>

            <a href="https://demo.cartify.dev/admin/products"
                class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                <svg class="mr-3 flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg> Products
            </a>
        </div>
    </div> -->

    <!-- <div class="flex flex-wrap ">
        <div class="lg:w-1/3 pr-4 pl-4">
            Col 4
        </div>
        <div class="lg:w-1/4 pr-4 pl-4">
            Col 3
        </div>
        <div class="lg:w-1/5 pr-4 pl-4">
            Col 2
        </div>
        <div class="lg:w-1/6 pr-4 pl-4">
            Col 1
        </div>
    </div> -->

    <!-- <div class="row">
        <div class="col-md-4">
            Col 4
        </div>
        <div class="col-md-8">
            Col 3
        </div>
    </div> -->
   </AppLayout>
</template>


<script>
    export default {
        components: {

        },
        data() {
            return {

            };
        },
        methods: {


            async loadData() {
            },
        },
        async mounted() {

        },
    };
</script>

<template>
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 mb-5">
        <div class="mb-1 w-full">
            <div class="mb-4">
                <nav class="flex mb-5" >
                    <ol class="inline-flex items-center space-x-1 md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="javascript:void(0)" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
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
                                    aria-current="page">Dashboard</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="sm:flex">
                <div class="hidden sm:flex items-center sm:divide-x sm:divide-gray-100 mb-3 sm:mb-0">
                    <h2 class="text-3xl font-semibold leading-7 text-gray-900  sm:text-3xl sm:truncate">
                    {{ __('Dashboard') }}
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
    <div class="grid grid-cols-3 gap-4 mt-5">
        <!-- New Hires  -->
        <div class="border border-t-4 border-t-blue-500 media-max-w-lg:col-span-2 border-cardBorder shadow-header relative flex flex-col break-words bg-white rounded flex-grow flex-shrink basis-auto">
            <div class="p-4">
                <h5 class="text-gray-700 text-xl mb-5">New Hires</h5>
                <div class="bg-white border-gray-100 rounded mb-[5px]">
                    <ul class="max-w-md max-h-[400px] overflow-auto divide-y divide-gray-200 ">
                        <li v-for="i in 5" :key="i" class="p-3 sm:pb-4 hover:bg-gray-200 cursor-pointer" @mouseover="hover = true" @mouseleave="hover = false">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate ">
                                        Neil Sims
                                    </p>
                                    <p class="text-sm text-gray-500 truncate ">
                                        email@flowbite.com
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                                    <button v-show="hover"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><title>eye</title><g fill="none"><path d="M2.42 12.713c-.136-.215-.204-.323-.242-.49a1.173 1.173 0 0 1 0-.446c.038-.167.106-.274.242-.49C3.546 9.505 6.895 5 12 5s8.455 4.505 9.58 6.287c.137.215.205.323.243.49.029.125.029.322 0 .446-.038.167-.106.274-.242.49C20.455 14.495 17.105 19 12 19c-5.106 0-8.455-4.505-9.58-6.287z" stroke="#212121" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" stroke="#212121" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></g></svg></button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Announcement  -->
        <div class="border border-t-4 border-t-yellow-500 media-max-w-lg:col-span-2 border-cardBorder shadow-header relative flex flex-col break-words bg-white rounded flex-grow flex-shrink basis-auto">
            <div class="p-4">
                <h5 class="text-gray-700 text-xl mb-5">Announcement</h5>
                <div class="bg-white border-gray-100 rounded mb-[5px]">
                    <ul class="max-w-md max-h-[400px] overflow-auto divide-y divide-gray-200 ">
                        <!--  -->
                        <li v-for="i in 5" :key="i" class="p-3 sm:pb-4 hover:bg-gray-200 cursor-pointer" @mouseover="hover = true" @mouseleave="hover = false">
                            <div class="flex items-center space-x-4">
                                <div class="flex-1 min-w-0">
                                    <p class="text-lg font-medium text-gray-900 truncate ">
                                        Monthly Discussion
                                    </p>
                                    <p class="text-md text-gray-500  w-100">
                                        {{ wordLimit('Lorem Ipsum is simply dummy text of the printing and typesetting industry.Printer took a galley of type and scrambled it to make a type specimen book.', 100) }}
                                    </p>
                                    <p class="text-sm text-gray-500 truncate  mt-2">
                                        1 Aug 2022,2.40 PM
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                                    <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Request For Approval  -->
        <div class="border border-t-4 border-t-green-500 media-max-w-lg:col-span-2 border-cardBorder shadow-header relative flex flex-col break-words bg-white rounded flex-grow flex-shrink basis-auto">
            <div class="p-4">
                <div class="flex justify-between items-center">
                    <h5 class="text-gray-700 text-xl mb-5">Request For Approval</h5>
                    <button>
                        Pending <span class="bg-gray-500 text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounde">50</span>
                    </button>
                </div>
                <div class="bg-white border-gray-100 rounded mb-[5px]">
                    <ul class="max-w-md max-h-[400px] overflow-auto divide-y divide-gray-200 ">
                        <li v-for="i in 4" :key="i" class="p-3 sm:pb-4 hover:bg-gray-200 cursor-pointer" @mouseover="hover = true" @mouseleave="hover = false">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate ">
                                        Neil Sims
                                    </p>
                                    <p class="text-sm text-gray-500 truncate ">
                                        email@flowbite.com
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                                    <button v-show="hover"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><title>eye</title><g fill="none"><path d="M2.42 12.713c-.136-.215-.204-.323-.242-.49a1.173 1.173 0 0 1 0-.446c.038-.167.106-.274.242-.49C3.546 9.505 6.895 5 12 5s8.455 4.505 9.58 6.287c.137.215.205.323.243.49.029.125.029.322 0 .446-.038.167-.106.274-.242.49C20.455 14.495 17.105 19 12 19c-5.106 0-8.455-4.505-9.58-6.287z" stroke="#212121" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" stroke="#212121" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></g></svg></button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Upcoming Holidays -->
        <div class="border border-t-4 border-t-purple-500 media-max-w-lg:col-span-2 border-cardBorder shadow-header relative flex flex-col break-words bg-white rounded flex-grow flex-shrink basis-auto">
            <div class="p-4">
                <h5 class="text-gray-700 text-xl mb-5">Upcoming Holidays</h5>
                <div class="bg-white border-gray-100 rounded mb-[5px]">
                    <ul class="max-w-md max-h-[400px] overflow-auto divide-y divide-gray-200 ">
                        <li v-for="i in 4" :key="i" class="p-3 sm:pb-4 hover:bg-gray-200 cursor-pointer" @mouseover="hover = true" @mouseleave="hover = false">
                            <div class="flex items-center space-x-4">
                                <div class="flex-1 min-w-0">
                                    <p class="text-md font-medium text-gray-900 truncate ">
                                        Independent Day
                                    </p>

                                </div>
                                <div class="items-center text-base font-semibold text-gray-900 ">
                                    <p class="text-sm text-gray-500 truncate ">
                                       15-Aug
                                       <span class="block">Wednesday</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Leave Reports -->
        <div class="border border-t-4 border-t-purple-500 media-max-w-lg:col-span-2 border-cardBorder shadow-header relative flex flex-col break-words bg-white rounded flex-grow flex-shrink basis-auto">
            <div class="p-4">
                <h5 class="text-gray-700 text-xl mb-5">Upcoming Holidays</h5>

                <div class="bg-white border-gray-100 rounded mb-[5px]">
                    <ul class="max-w-md max-h-[400px] overflow-auto divide-y divide-gray-200 ">
                        <li v-for="i in 4" :key="i" class="p-3 sm:pb-4 hover:bg-gray-200 cursor-pointer" @mouseover="hover = true" @mouseleave="hover = false">
                            <div class="flex items-center space-x-4">
                                <div class="flex-1 min-w-0">
                                    <p class="text-md font-medium text-gray-900 truncate ">
                                        Independent Day
                                    </p>

                                </div>
                                <div class="items-center text-base font-semibold text-gray-900 ">
                                    <p class="text-sm text-gray-500 truncate ">
                                       15-Aug
                                       <span class="block">Wednesday</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>











































    <div class="page-header mb-[1.875rem] mt-60 pt-60">
        <div class="flex items-center justify-between">
            <div>
                <h2
                    class="text-3xl font-semibold leading-7 text-gray-900  sm:text-3xl sm:truncate">
                    Dashboard
                </h2>
                <ul class="hidden text-[14px] md:text-base font-medium sm:flex flex-wrap">
                    <li><a href="index.html" class="text-[#333333]">Dashboard</a></li>
                    <li><span class="px-2">/</span></li>
                    <li class="text-[#6c757d]">Employeeddd</li>
                </ul>
            </div>
            <div class="flex items-center">
                <div class="view-icons mr-[10px]">
                    <a href="employees.html"
                        class="bg-white inline-block min-w-[40px] text-center text-lg border border-[#e3e3e3] p-1 mr-[5px] text-[#333333]">

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" version="1.2">
                            <path
                                d="M9 2H4c-1.103 0-2 .896-2 2v5c0 1.104.897 2 2 2h5c1.103 0 2-.896 2-2V4c0-1.104-.897-2-2-2zm0 7H4V4h5v5zm11-7h-5a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h5a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm0 7h-5V4h5v5zM9 13H4c-1.103 0-2 .896-2 2v5c0 1.104.897 2 2 2h5c1.103 0 2-.896 2-2v-5c0-1.104-.897-2-2-2zm0 7H4v-5h5v5zm11-7h-5a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h5a2 2 0 0 0 2-2v-5a2 2 0 0 0-2-2zm0 7h-5v-5h5v5z" />
                        </svg>
                    </a>
                    <a href="employees-list.html"
                        class="bg-white inline-block min-w-[40px] text-center text-lg border border-[#e3e3e3] p-1 mr-[5px] text-[#666666]">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M3,8H21a1,1,0,0,0,0-2H3A1,1,0,0,0,3,8Zm18,8H3a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Zm0-5H3a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Z" />
                        </svg>
                    </a>
                </div>
                <a class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-full font-medium text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition sm:text-sm"
                    href="https://demo.cartify.dev/admin/products/create">
                    <span class="mr-3">
                        <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                            stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                    </span>
                    Add Product
                </a>
            </div>
        </div>
    </div>


    <!-- Summary  -->
    <div class="mt-5 grid grid-cols-1 sm:grid-cols-4 gap-3 sm:gap-0 mb-[30px]">
        <div
            class="shadow-header border border-cardBorder relative flex flex-col bg-white rounded sm:rounded-tr-none sm:rounded-br-none break-words">
            <div class="p-4">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-[15px] text-[#1f1f1f]">New Employees</span>
                    <span class="text-[15px] text-success">+10%</span>
                </div>
                <div>
                    <h3 class="text-2xl mb-4">10</h3>
                    <div class="w-full bg-[#e9ecef] rounded-full h-[5px] mb-2">
                        <div class="bg-primary h-[5px] rounded-full" style="width: 70%"></div>
                    </div>
                    <p>Overall Employees 218</p>
                </div>
            </div>
        </div>
        <div class="shadow-header border border-cardBorder relative flex flex-col bg-white break-words">
            <div class="p-4">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-[15px] text-[#1f1f1f]">Earnings</span>
                    <span class="text-[15px] text-success">+12.5%</span>
                </div>
                <div>
                    <h3 class="text-2xl mb-4">$1,42,300</h3>
                    <div class="w-full bg-[#e9ecef] rounded-full h-[5px] mb-2">
                        <div class="bg-primary h-[5px] rounded-full" style="width: 70%"></div>
                    </div>
                    <p>Previous Month <span class="text-muted">$1,15,852</span></p>
                </div>
            </div>
        </div>
        <div class="shadow-header border border-cardBorder relative flex flex-col bg-white break-words">
            <div class="p-4">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-[15px] text-[#1f1f1f]">Expenses</span>
                    <span class="text-[15px] text-danger">-2.8%</span>
                </div>
                <div>
                    <h3 class="text-2xl mb-4">$8,500</h3>
                    <div class="w-full bg-[#e9ecef] rounded-full h-[5px] mb-2">
                        <div class="bg-primary h-[5px] rounded-full" style="width: 70%"></div>
                    </div>
                    <p>Previous Month <span class="text-muted">$7,500</span></p>
                </div>
            </div>
        </div>
        <div
            class="shadow-header border border-cardBorder relative flex flex-col bg-white rounded sm:rounded-tl-none sm:rounded-bl-none break-words">
            <div class="p-4">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-[15px] text-[#1f1f1f]">Profit</span>
                    <span class="text-[15px] text-danger">-75%</span>
                </div>
                <div>
                    <h3 class="text-2xl mb-4">$1,12,000</h3>
                    <div class="w-full bg-[#e9ecef] rounded-full h-[5px] mb-2">
                        <div class="bg-primary h-[5px] rounded-full" style="width: 70%"></div>
                    </div>
                    <p>Previous Month <span class="text-muted">$1,42,000</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs ">
            <div
                class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full  ">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-600 ">
                    Total clients
                </p>
                <p class="my-1 text-lg font-semibold text-gray-700 ">
                    6389
                </p>
                <div class="flex gap-1 mt-1 text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                    <p class="flex gap-2 text-xs">
                        <span class="font-medium"> 10% </span>
                        <span class="text-gray-400"> Since last month </span>
                    </p>
                </div>
            </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs ">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full  ">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-600 ">
                    Account balance
                </p>
                <p class="my-1 text-lg font-semibold text-gray-700 ">
                    $ 46,760.89
                </p>
                <div class="flex gap-1 mt-1 text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                    </svg>
                    <p class="flex gap-2 text-xs">
                        <span class="font-medium"> 67.81% </span>
                        <span class="text-gray-400"> Since last week </span>
                    </p>
                </div>
            </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs ">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full  ">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-600 ">
                    New sales
                </p>
                <p class="my-1 text-lg font-semibold text-gray-700 ">
                    376
                </p>
                <div class="flex gap-1 mt-1 text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                    </svg>
                    <p class="flex gap-2 text-xs">
                        <span class="font-medium"> 67.81% </span>
                        <span class="text-gray-400"> Since last week </span>
                    </p>
                </div>
            </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs ">
            <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full  ">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-600 ">
                    Pending contacts
                </p>
                <p class="my-1 text-lg font-semibold text-gray-700 ">
                    35
                </p>
                <div class="flex gap-1 mt-1 text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                    <p class="flex gap-2 text-xs">
                        <span class="font-medium"> 10% </span>
                        <span class="text-gray-400"> Since last month </span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts  -->
    <div class="grid grid-cols-2 gap-4">
        <div class="block p-6 rounded-lg shadow-lg bg-white">
            <h2 class="text-gray-900 text-3xl leading-tight font-medium mb-2">Bar Chart</h2>
            <BarChart />
        </div>
        <div class="block p-6 rounded-lg shadow-lg bg-white">
            <h2 class="text-gray-900 text-3xl leading-tight font-medium mb-2">Pie Chart</h2>
            <PieChart />
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4 mt-5">
        <div
            class="border media-max-w-lg:col-span-2 border-cardBorder shadow-header relative flex flex-col break-words bg-white rounded flex-grow flex-shrink basis-auto mb-[30px]">
            <div class="p-4">
                <h5 class="text-[#1f1f1f] text-xl mb-5">Statistics</h5>
                <div class="bg-white border border-[#e5e5e5] rounded p-[15px] text-center mb-[5px]">
                    <p class="flex justify-between text-xs mb-[5px]">Today Leave<strong>4 <small>/
                                65</small></strong></p>
                    <div class="w-full bg-[#e9ecef] rounded-full h-1">
                        <div class="bg-primary h-1 rounded-full" style="width: 31%"></div>
                    </div>
                </div>
                <div class="bg-white border border-[#e5e5e5] rounded p-[15px] text-center mb-[5px]">
                    <p class="flex justify-between text-xs mb-[5px]">Pending Invoice <strong>15 <small>/
                                92</small></strong></p>
                    <div class="w-full bg-[#e9ecef] rounded-full h-1">
                        <div class="bg-[#ffbc34] h-1 rounded-full" style="width: 31%"></div>
                    </div>
                </div>
                <div class="bg-white border border-[#e5e5e5] rounded p-[15px] text-center mb-[5px]">
                    <p class="flex justify-between text-xs mb-[5px]">Completed Projects <strong>86 <small>/
                                112</small></strong></p>
                    <div class="w-full bg-[#e9ecef] rounded-full h-1">
                        <div class="bg-success h-1 rounded-full" style="width: 62%"></div>
                    </div>
                </div>
                <div class="bg-white border border-[#e5e5e5] rounded p-[15px] text-center mb-[5px]">
                    <p class="flex justify-between text-xs mb-[5px]">Open Tickets <strong>190 <small>/
                                212</small></strong></p>
                    <div class="w-full bg-[#e9ecef] rounded-full h-1">
                        <div class="bg-danger h-1 rounded-full" style="width: 62%"></div>
                    </div>
                </div>
                <div class="bg-white border border-[#e5e5e5] rounded p-[15px] text-center">
                    <p class="flex justify-between text-xs mb-[5px]">Closed Tickets <strong>22<small>/
                                212</small></strong></p>
                    <div class="w-full bg-[#e9ecef] rounded-full h-1">
                        <div class="bg-[#009efb] h-1 rounded-full" style="width: 22%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="border border-cardBorder shadow-header relative flex flex-col break-words bg-white rounded flex-grow flex-shrink basis-auto mb-[30px]">
            <div class="p-4">
                <h5 class="text-[#1f1f1f] text-xl mb-5">Task Statistics</h5>
                <div class="grid grid-cols-2 gap-[10px] mb-6">
                    <div class="bg-[#f9f9f9] border border-btnBorder p-[5px] text-center">
                        <p class="text-xs leading-normal">Total Tasks</p>
                        <h3 class="text-2xl mb-2">385</h3>
                    </div>
                    <div class="bg-[#f9f9f9] border border-btnBorder p-[5px] text-center">
                        <p class="text-xs leading-normal">Overdue Tasks</p>
                        <h3 class="text-2xl mb-2">19</h3>
                    </div>
                </div>
                <div>
                    <div class="flex items-center w-full bg-[#e9ecef] rounded h-4 overflow-hidden mb-6">
                        <div class="bg-[#7460ee] h-4 flex items-center justify-center" style="width: 30%"><span
                                class="text-white text-xs">30%</span></div>
                        <div class="bg-[#ffbc34] h-4 flex items-center justify-center" style="width: 22%"><span
                                class="text-white text-xs">22%</span></div>
                        <div class="bg-success h-4 flex items-center justify-center" style="width: 24%"><span
                                class="text-white text-xs">24%</span></div>
                        <div class="bg-danger h-4 flex items-center justify-center" style="width: 21%"><span
                                class="text-white text-xs">21%</span></div>
                        <div class="bg-[#009efb] h-4 flex items-center justify-center" style="width: 10%"><span
                                class="text-white text-xs">10%</span></div>
                    </div>
                    <div>
                        <ul>
                            <li class="mb-4">
                                <p class="flex items-center justify-between"><span><i
                                            class="fa fa-dot-circle-o text-[#7460ee] mr-2"></i>Completed
                                        Tasks</span><span>166</span></p>
                            </li>
                            <li class="mb-4">
                                <p class="flex items-center justify-between"><span><i
                                            class="fa fa-dot-circle-o text-[#ffbc34] mr-2"></i>Inprogress
                                        Tasks</span><span>115</span></p>
                            </li>
                            <li class="mb-4">
                                <p class="flex items-center justify-between"><span><i
                                            class="fa fa-dot-circle-o text-success mr-2"></i>On Hold
                                        Tasks</span><span>31</span></p>
                            </li>
                            <li class="mb-4">
                                <p class="flex items-center justify-between"><span><i
                                            class="fa fa-dot-circle-o text-danger mr-2"></i>Pending
                                        Tasks</span><span>47</span></p>
                            </li>
                            <li>
                                <p class="flex items-center justify-between"><span><i
                                            class="fa fa-dot-circle-o text-[#009efb] mr-2"></i>Review
                                        Tasks</span><span>5</span></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="border border-cardBorder shadow-header relative flex flex-col break-words bg-white rounded flex-grow flex-shrink basis-auto mb-[30px]">
            <div class="p-4">
                <h5 class="text-[#1f1f1f] text-xl mb-5">Today Absent <span
                        class="bg-dashboardIconOverlay2 text-danger ml-2 inline-block px-[0.65em] py-[0.35em] text-xs font-bold text-center whitespace-nowrap align-baseline rounded">5</span>
                </h5>
                <div class="border border-[#e5e5e5] p-[15px] mb-[15px]">
                    <div class="flex items-center mb-4">
                        <div class="w-[38px] h-[38px] mr-[10px] whitespace-nowrap">
                            <a href="profile.html" class="w-"><img alt=""
                                    src="https://smarthr-tailwind.dreamguystech.com/orange/src/images/user.jpg"
                                    class="rounded-full"></a>
                        </div>
                        <div>
                            <p class="text-sm">Martin Lewis</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <h6 class="text-xs">4 Mar 2022</h6>
                            <span class="text-sm text-muted">Leave Date</span>
                        </div>
                        <div>
                            <span
                                class="bg-dashboardIconOverlay2 text-danger inline-block px-[0.65em] py-[0.35em] text-xs font-bold text-center whitespace-nowrap align-baseline rounded">Pending</span>
                        </div>
                    </div>
                </div>
                <div class="border border-[#e5e5e5] p-[15px] mb-[15px]">
                    <div class="flex items-center mb-4">
                        <div class="w-[38px] h-[38px] mr-[10px] whitespace-nowrap">
                            <a href="profile.html" class="w-"><img alt=""
                                    src="https://smarthr-tailwind.dreamguystech.com/orange/src/images/user.jpg"
                                    class="rounded-full"></a>
                        </div>
                        <div>
                            <p class="text-sm">Martin Lewis</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <h6 class="text-xs">4 Mar 2022</h6>
                            <span class="text-sm text-muted">Leave Date</span>
                        </div>
                        <div>
                            <span
                                class="bg-dashboardIconOverlay3 text-success1 inline-block px-[0.65em] py-[0.35em] text-xs font-bold text-center whitespace-nowrap align-baseline rounded">Approved</span>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center text-center">
                    <a href="javascript:;"
                        class="border border-tableStripe rounded-[3px] shadow-loadmore block text-sm px-[15px] py-[5px]">Load
                        More</a>
                </div>
            </div>
        </div>
    </div>




    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
        <div
            class="border border-cardBorder shadow-header rounded bg-white p-5 text-center relative overflow-hidden">
            <div class="w-20 h-20 relative mx-auto cursor-pointer">
                <a href="profile.html" class=""><img alt=""
                        src="https://smarthr-tailwind.dreamguystech.com/orange/src/images/profiles/avatar-02.jpg"
                        class="rounded-full hover:shadow-img"></a>
            </div>
            <div class="absolute right-[5px] top-[10px] text-right"
                x-data="{cardAction:false, editmodelOpen:false, deletemodelOpen:false}"
                @click.away="cardAction=false">
                <a href="javascript:;" class="text-[#777777] text-lg inline-block"
                    @click="cardAction = ! cardAction"><i class="material-icons">more_vert</i></a>
                <div class="border border-blackOpacity rounded-[3px] bg-white min-w-[10rem] py-2"
                    x-show="cardAction" style="display: none;">
                    <a class="block clear-both w-full text-left text-[13px] whitespace-nowrap px-[10px] py-[5px] hover:bg-[#e9ecef]"
                        @click="editmodelOpen = ! editmodelOpen" href="javascript:;"><i
                            class="fa fa-pencil mr-[5px]"></i> Edit</a>
                    <a class="block clear-both w-full text-left text-[13px] whitespace-nowrap px-[10px] py-[5px] hover:bg-[#e9ecef]"
                        @click="deletemodelOpen = ! deletemodelOpen" href="javascript:;"><i
                            class="fa fa-trash-o mr-[5px]"></i> Delete</a>
                </div>
                <div x-show="deletemodelOpen"
                    class="fixed top-0 left-0 right-0 w-full text-left h-full outline-none overflow-x-hidden overflow-y-auto z-[9999]"
                    @click.prevent="cardAction=false" aria-labelledby="modal-title" role="dialog" aria-modal="true"
                    style="display: none;">
                    <div class="flex items-center justify-center min-h-screen">
                        <div @click="deletemodelOpen = false" x-show="deletemodelOpen"
                            x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="fixed inset-0 transition-opacity bg-blackOverlay bg-opacity-40"
                            aria-hidden="true" style="display: none;"></div>
                        <div x-show="deletemodelOpen"
                            x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            class="bg-white m-2 media-max-w-xs:w-full sm:mx-auto sm:my-7 sm:min-w-[500px] rounded-[10px] relative z-[9999] transition-all transform"
                            style="display: none;">
                            <div class="p-[30px] text-center">
                                <div class="mb-[30px]">
                                    <h5 class="text-[22px] capitalize mb-[10px]">Delete Employee</h5>
                                    <p class="text-[#929292] text-[15px]">Are you sure want to delete?</p>
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <a href="javascript:;" class="btnPrimary-outline">Delete</a>
                                    <a href="javascript:;" class="btnPrimary-outline"
                                        @click="deletemodelOpen = false">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div x-show="editmodelOpen"
                    class="fixed top-0 left-0 right-0 w-full text-left h-full outline-none overflow-x-hidden overflow-y-auto z-[9999]"
                    @click.prevent="cardAction=false" aria-labelledby="modal-title" role="dialog" aria-modal="true"
                    style="display: none;">
                    <div>
                        <div @click="editmodelOpen = false" x-show="editmodelOpen"
                            x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="fixed inset-0 transition-opacity bg-blackOverlay bg-opacity-40"
                            aria-hidden="true" style="display: none;"></div>
                        <div x-show="editmodelOpen" x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            class="bg-white m-2 sm:mx-auto sm:my-7 sm:max-w-[500px] media-min-w-md:max-w-[800px] rounded-[10px] relative z-[9999] transition-all transform"
                            style="display: none;">
                            <div class="pt-[30px] px-[30px] text-center">
                                <h5 class="text-[22px] capitalize">Edit Employee</h5>
                                <button type="button"
                                    class="bg-[#a0a0a0] w-5 h-5 rounded-full absolute top-[10px] right-[10px] text-white leading-5 z-50"
                                    @click="editmodelOpen = false">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="p-[30px]">
                                <form>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                        <div>
                                            <label>First Name <span class="text-danger">*</span></label>
                                            <input class="block w-full inputStyle" value="John" type="text">
                                        </div>
                                        <div>
                                            <label>Last Name</label>
                                            <input class="block w-full inputStyle" value="Doe" type="text">
                                        </div>
                                        <div>
                                            <label>Username <span class="text-danger">*</span></label>
                                            <input class="block w-full inputStyle" alue="johndoe" type="text">
                                        </div>
                                        <div>
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input class="block w-full inputStyle" value="johndoe@example.com"
                                                type="email">
                                        </div>
                                        <div>
                                            <label>Password</label>
                                            <input class="block w-full inputStyle" value="johndoe" type="password">
                                        </div>
                                        <div>
                                            <label>Confirm Password</label>
                                            <input class="block w-full inputStyle" value="johndoe" type="password">
                                        </div>
                                        <div>
                                            <label>Employee ID <span class="text-danger">*</span></label>
                                            <input class="block w-full inputStyle cursor-not-allowed !bg-[#e9ecef]"
                                                value="FT-0001" type="text" disabled="disabled">
                                        </div>
                                        <div>
                                            <label>Joining Date <span class="text-danger">*</span></label>
                                            <div class="flex">
                                                <div class="w-full datepicker relative form-floating mb-3 z-[9999]">
                                                    <input type="text"
                                                        class="block w-full inputStyle form-icon-trailing"
                                                        placeholder="Select Date">

                                                    <button id="datepicker-toggle-24424" type="button"
                                                        class="datepicker-toggle-button"
                                                        data-mdb-toggle="datepicker">
                                                        <i class="far fa-calendar datepicker-toggle-icon"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label>Phone </label>
                                            <input class="block w-full inputStyle" value="9876543210" type="text">
                                        </div>
                                        <div>
                                            <label class="block text-[15px]">
                                                <span class="text-gray-700 mb-[8px]">Company</span>
                                                <select class="form-select block w-full mt-1 text-[#676767]">
                                                    <option>Global Technologies</option>
                                                    <option>Delta Infotech</option>
                                                    <option>International Software Inc</option>
                                                </select>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="block text-[15px]">
                                                <span class="text-gray-700 mb-[8px]">Department <span
                                                        class="text-danger">*</span></span>
                                                <select class="form-select block w-full mt-1 text-[#676767]">
                                                    <option>Select Department</option>
                                                    <option>Web Development</option>
                                                    <option>IT Management</option>
                                                    <option>Marketing</option>
                                                </select>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="block text-[15px]">
                                                <span class="text-gray-700 mb-[8px]">Designation <span
                                                        class="text-danger">*</span></span>
                                                <select
                                                    class="form-select block w-full mt-1 text-[#676767] outline-none focus:outline-none appearance-none focus:!shadow-select focus:!border-select">
                                                    <option>Select Designation</option>
                                                    <option>Web Designer</option>
                                                    <option>Web Developer</option>
                                                    <option>Android Developer</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="overflow-x-auto mt-[31px] whitespace-nowrap">
                                        <table class="table stripe w-full custom-table">
                                            <thead>
                                                <tr>
                                                    <th>Module Permission</th>
                                                    <th class="text-center">Read</th>
                                                    <th class="text-center">Write</th>
                                                    <th class="text-center">Create</th>
                                                    <th class="text-center">Delete</th>
                                                    <th class="text-center">Import</th>
                                                    <th class="text-center">Export</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Holidays</td>
                                                    <td class="text-center">
                                                        <input checked="" type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Leaves</td>
                                                    <td class="text-center">
                                                        <input checked="" type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input checked="" type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input checked="" type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Clients</td>
                                                    <td class="text-center">
                                                        <input checked="" type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input checked="" type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input checked="" type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Projects</td>
                                                    <td class="text-center">
                                                        <input checked="" type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tasks</td>
                                                    <td class="text-center">
                                                        <input checked="" type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input checked="" type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input checked="" type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input checked="" type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Chats</td>
                                                    <td class="text-center">
                                                        <input checked="" type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input checked="" type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input checked="" type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input checked="" type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Assets</td>
                                                    <td class="text-center">
                                                        <input checked="" type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input checked="" type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input checked="" type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input checked="" type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Timing Sheets</td>
                                                    <td class="text-center">
                                                        <input checked="" type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input checked="" type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input checked="" type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input checked="" type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-10 text-center">
                                        <button class="submit-btn" @click="editmodelOpen = false">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="mt-[10px] text-[#333333] overflow-hidden text-ellipsis whitespace-nowrap text-lg"><a
                    href="profile.html">John Doe</a></h4>
            <div class="text-muted text-[13px]">Wed Designer</div>
        </div>

    </div>
















































































































        <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b  bg-gray-50  ">
                            <th class="px-4 py-3">Client</th>
                            <th class="px-4 py-3">Amount</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y  ">
                        <tr class="text-gray-700 ">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                            alt="" loading="lazy">
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Hans Burger</p>
                                        <p class="text-xs text-gray-600 ">
                                            10x Developer
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                $ 863.45
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full  ">
                                    Approved
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                6/10/2020
                            </td>
                        </tr>

                        <tr class="text-gray-700 ">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;facepad=3&amp;fit=facearea&amp;s=707b9c33066bf8808c934c8ab394dff6"
                                            alt="" loading="lazy">
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Jolina Angelie</p>
                                        <p class="text-xs text-gray-600 ">
                                            Unemployed
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                $ 369.95
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full  ">
                                    Pending
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                6/10/2020
                            </td>
                        </tr>

                        <tr class="text-gray-700 ">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="https://images.unsplash.com/photo-1551069613-1904dbdcda11?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                            alt="" loading="lazy">
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Sarah Curry</p>
                                        <p class="text-xs text-gray-600 ">
                                            Designer
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                $ 86.00
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full  ">
                                    Denied
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                6/10/2020
                            </td>
                        </tr>

                        <tr class="text-gray-700 ">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="https://images.unsplash.com/photo-1551006917-3b4c078c47c9?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                            alt="" loading="lazy">
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Rulia Joberts</p>
                                        <p class="text-xs text-gray-600 ">
                                            Actress
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                $ 1276.45
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full  ">
                                    Approved
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                6/10/2020
                            </td>
                        </tr>

                        <tr class="text-gray-700 ">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="https://images.unsplash.com/photo-1546456073-6712f79251bb?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                            alt="" loading="lazy">
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Wenzel Dashington</p>
                                        <p class="text-xs text-gray-600 ">
                                            Actor
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                $ 863.45
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full  ">
                                    Expired
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                6/10/2020
                            </td>
                        </tr>

                        <tr class="text-gray-700 ">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="https://images.unsplash.com/photo-1502720705749-871143f0e671?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;s=b8377ca9f985d80264279f277f3a67f5"
                                            alt="" loading="lazy">
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Dave Li</p>
                                        <p class="text-xs text-gray-600 ">
                                            Influencer
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                $ 863.45
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full  ">
                                    Approved
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                6/10/2020
                            </td>
                        </tr>

                        <tr class="text-gray-700 ">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                            alt="" loading="lazy">
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Maria Ramovic</p>
                                        <p class="text-xs text-gray-600 ">
                                            Runner
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                $ 863.45
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full  ">
                                    Approved
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                6/10/2020
                            </td>
                        </tr>

                        <tr class="text-gray-700 ">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="https://images.unsplash.com/photo-1566411520896-01e7ca4726af?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                            alt="" loading="lazy">
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Hitney Wouston</p>
                                        <p class="text-xs text-gray-600 ">
                                            Singer
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                $ 863.45
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full  ">
                                    Approved
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                6/10/2020
                            </td>
                        </tr>

                        <tr class="text-gray-700 ">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                            alt="" loading="lazy">
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Hans Burger</p>
                                        <p class="text-xs text-gray-600 ">
                                            10x Developer
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                $ 863.45
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full  ">
                                    Approved
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                6/10/2020
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t  bg-gray-50 sm:grid-cols-9  ">
                <span class="flex items-center col-span-3">
                    Showing 21-30 of 100
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                    <nav aria-label="Table navigation">
                        <ul class="inline-flex items-center">
                            <li>
                                <button
                                    class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                    aria-label="Previous">
                                    <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </li>
                            <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                    1
                                </button>
                            </li>
                            <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                    2
                                </button>
                            </li>
                            <li>
                                <button
                                    class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                                    3
                                </button>
                            </li>
                            <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                    4
                                </button>
                            </li>
                            <li>
                                <span class="px-3 py-1">...</span>
                            </li>
                            <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                    8
                                </button>
                            </li>
                            <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                    9
                                </button>
                            </li>
                            <li>
                                <button
                                    class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                    aria-label="Next">
                                    <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                        <path
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </li>
                        </ul>
                    </nav>
                </span>
            </div>
        </div>

        <!-- Charts -->
        <h2 class="my-6 text-2xl font-semibold text-gray-700 ">
            Charts
        </h2>
        <div class="grid gap-6 mb-8 md:grid-cols-2">
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs ">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <h4 class="mb-4 font-semibold text-gray-800 ">
                    Revenue
                </h4>
                <canvas id="pie" width="429" height="214" style="display: block; height: 286px; width: 572px;"
                    class="chartjs-render-monitor"></canvas>
                <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 ">
                    <div class="flex items-center">
                        <span class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"></span>
                        <span>Shirts</span>
                    </div>
                    <div class="flex items-center">
                        <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
                        <span>Shoes</span>
                    </div>
                    <div class="flex items-center">
                        <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                        <span>Bags</span>
                    </div>
                </div>
            </div>
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs ">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <h4 class="mb-4 font-semibold text-gray-800 ">
                    Traffic
                </h4>
                <canvas id="line" width="429" height="214" style="display: block; height: 286px; width: 572px;"
                    class="chartjs-render-monitor"></canvas>
                <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 ">
                    <div class="flex items-center">
                        <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
                        <span>Organic</span>
                    </div>
                    <div class="flex items-center">
                        <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                        <span>Paid</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4 mb-4">
            <div class="sm:col-span-1  md:col-span-2 lg:col-span-4 xl:col-span-1 ">
                <div class="h-full card">
                    <div class="card-header">
                        <h4 class="font-medium ">Total Visits</h4>
                    </div>
                    <div class="flex flex-col card-body">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <thead class="bg-gray-50 ">
                                            <tr>
                                                <th scope="col"
                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                                                    Channel
                                                </th>
                                                <th scope="col"
                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                                                    Sessions
                                                </th>
                                                <th scope="col"
                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                                                    Prev.Period
                                                </th>
                                                <th scope="col"
                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                                                    % Change
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- 1 -->
                                            <tr
                                                class="bg-white border-b border-dashed  ">
                                                <td class="p-3 text-sm font-medium whitespace-nowrap ">
                                                    <a href="" class="text-blue-500">Organic search</a>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    10853<small class="text-gray-400">(52%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    566<small class="text-gray-400">(92%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    52.80% <i class="ti ti-caret-up text-green-500 text-base"></i>
                                                </td>
                                            </tr>
                                            <!-- 2 -->
                                            <tr
                                                class="bg-white border-b border-dashed  ">
                                                <td class="p-3 text-sm font-medium whitespace-nowrap ">
                                                    <a href="" class="text-blue-500">Direct</a>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    10853<small class="text-gray-400">(52%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    566<small class="text-gray-400">(92%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    52.80% <i class="ti ti-caret-down text-red-500 text-base"></i>
                                                </td>
                                            </tr>
                                            <!-- 3 -->
                                            <tr
                                                class="bg-white border-b border-dashed  ">
                                                <td class="p-3 text-sm font-medium whitespace-nowrap ">
                                                    <a href="" class="text-blue-500">Referal</a>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    10853<small class="text-gray-400">(52%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    566<small class="text-gray-400">(92%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    52.80% <i class="ti ti-caret-up text-green-500 text-base"></i>
                                                </td>
                                            </tr>
                                            <!-- 4 -->
                                            <tr
                                                class="bg-white border-b border-dashed  ">
                                                <td class="p-3 text-sm font-medium whitespace-nowrap ">
                                                    <a href="" class="text-blue-500">Email</a>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    10853<small class="text-gray-400">(52%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    566<small class="text-gray-400">(92%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    52.80% <i class="ti ti-caret-down text-red-500 text-base"></i>
                                                </td>
                                            </tr>
                                            <!-- 5 -->
                                            <tr class="bg-white ">
                                                <td class="p-3 text-sm font-medium whitespace-nowrap ">
                                                    <a href="" class="text-blue-500">Social</a>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    10853<small class="text-gray-400">(52%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    566<small class="text-gray-400">(92%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    52.80% <i class="ti ti-caret-up text-green-500 text-base"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end inner-grid-->
            </div>
            <div class="sm:col-span-1  md:col-span-2 lg:col-span-4 xl:col-span-1 ">
                <div class="h-full card">
                    <div class="card-header">
                        <h4 class="font-medium ">Browser Used By Users</h4>
                    </div>
                    <div class="flex flex-col card-body">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <thead class="bg-gray-50 ">
                                            <tr>
                                                <th scope="col"
                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                                                    Browser
                                                </th>
                                                <th scope="col"
                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                                                    Sessions
                                                </th>
                                                <th scope="col"
                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                                                    Bounce Rate
                                                </th>
                                                <th scope="col"
                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                                                    Transactions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- 1 -->
                                            <tr
                                                class="bg-white border-b border-dashed  ">
                                                <td class="p-3 text-sm font-medium whitespace-nowrap ">
                                                    <img src="assets/images/logos/chrome.png" alt=""
                                                        class="mr-2 h-5 inline-block">Chrome
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    10853<small class="text-gray-400">(52%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    52.80%
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    566 <small class="text-gray-400">(92%)</small>
                                                </td>
                                            </tr>
                                            <!-- 2 -->
                                            <tr
                                                class="bg-white border-b border-dashed  ">
                                                <td class="p-3 text-sm font-medium whitespace-nowrap ">
                                                    <img src="assets/images/logos/in-explorer.png" alt=""
                                                        class="mr-2 h-5 inline-block">Explorer
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    10853<small class="text-gray-400">(52%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    52.80%
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    566 <small class="text-gray-400">(92%)</small>
                                                </td>
                                            </tr>
                                            <!-- 3 -->
                                            <tr
                                                class="bg-white border-b border-dashed  ">
                                                <td class="p-3 text-sm font-medium whitespace-nowrap ">
                                                    <img src="assets/images/logos/safari.png" alt=""
                                                        class="mr-2 h-5 inline-block">Safari
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    10853<small class="text-gray-400">(52%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    52.80%
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    566 <small class="text-gray-400">(92%)</small>
                                                </td>
                                            </tr>
                                            <!-- 4 -->
                                            <tr
                                                class="bg-white border-b border-dashed  ">
                                                <td class="p-3 text-sm font-medium whitespace-nowrap ">
                                                    <img src="assets/images/logos/mozilla.png" alt=""
                                                        class="mr-2 h-5 inline-block">Mozilla
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    10853<small class="text-gray-400">(52%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    52.80%
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    566 <small class="text-gray-400">(92%)</small>
                                                </td>
                                            </tr>
                                            <!-- 5 -->
                                            <tr class="bg-white ">
                                                <td class="p-3 text-sm font-medium whitespace-nowrap ">
                                                    <img src="assets/images/logos/opera.png" alt=""
                                                        class="mr-2 h-5 inline-block">Opera
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    10853<small class="text-gray-400">(52%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    52.80%
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap ">
                                                    566 <small class="text-gray-400">(92%)</small>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end inner-grid-->
            </div>
        </div>
    <!-- <div class="row pt-3">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow-sm">
                <span class="info-box-icon bg-primary"><i class="fa-regular fa-calendar-minus"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ __('Total Expense') }}</span>
                    <span class="info-box-number">{{ currencyPosition(summary.total_expense) }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow-sm">
                <span class="info-box-icon bg-warning"><i class="fa-regular fa-hourglass"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ __('Pending Request') }}</span>
                    <span class="info-box-number">{{ summary.total_pending_leaves }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow-sm">
                <span class="info-box-icon bg-info"><i class="fa-solid fa-people-group nav-icon"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ __('Total Teams') }}</span>
                    <span class="info-box-number">{{ summary.total_teams }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow-sm">
                <span class="info-box-icon bg-success"><i class="fa-solid fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ __('Total Employees') }}</span>
                    <span class="info-box-number">{{ summary.total_employees }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">{{ __('Calendar') }}</h3>
                </div>
                <template v-if="!loading">
                    <div class="card-body">
                        <FullCalendar :options="calendarOptions" />
                    </div>
                    <div class="card-footer row justify-content-between">
                        <span v-for="(event_type,index) in event_types" :key="index">
                            <span class="mr-2 event-size" :style="{
                                    backgroundColor: event_type.color,
                                    border: '2px solid '+ event_type.color
                                }"></span>
                            {{ event_type.name }}
                        </span>
                    </div>
                </template>
                <div class="card-body mx-auto" v-else>
                    <Loading :messageShow="false" size="fa-2x" />
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">{{ __('Pending Request') }}</h3>
                </div>
                <div class="card-body" v-if="!loading">
                    <div class="d-flex flex-wrap col-12">
                        <template v-if="pending_requests && summary.total_pending_leaves">
                            <div v-for="request in pending_requests" :key="request.id"
                                class="col-12 holidayCont officalHCont d-flex justify-content-between align-items-center main-user-fields">
                                <div class="mt-4">
                                    <h6><strong>{{ request.title }}</strong>
                                        <span class="text-danger ml-1">
                                            {{ request.days }} {{ pluralize(request.days, 'Day') }}
                                        </span>
                                    </h6>
                                    <h6 class="d-flex align-items-center">
                                        <span class="m-widget4__sub">
                                            <span class="m-widget4__sm-text mr-1">
                                                <i class="fa-regular fa-calendar-days"></i>
                                                {{ startDate(request.start) }}
                                            </span>
                                            <span class="m-widget4__sm-text ml-1">
                                                <i class="fa-regular fa-calendar-days"></i>
                                                {{ endDate(request.end) }}
                                            </span>
                                        </span>
                                    </h6>
                                    <span :style="{ background: request.color, border: '2px solid '+request.color }"
                                        class="leave-type-color" v-tooltip="'Leave Type'">
                                        {{ request.type }}
                                    </span>
                                </div>
                                <div>
                                    <button @click="statusChange('approved', request.id)" v-tooltip="'Accept Request'" class="btn btn-sm">
                                        <CheckIcon />
                                    </button>
                                    <button @click="statusChange('rejected', request.id)" v-tooltip="'Reject Request'" class="btn btn-sm px-0">
                                        <CrossIcon />
                                    </button>
                                     <button @click="showDetails(request)" v-tooltip="__('Details')" class="btn btn-sm">
                                        <EyeIcon />
                                    </button>
                                </div>
                            </div>
                        </template>
                        <h6 class="text-center m-auto" v-else>{{ __('No Data Found') }}</h6>
                    </div>
                </div>
                <div class="card-body mx-auto" v-else>
                    <Loading :messageShow="false" size="fa-2x" />
                </div>
            </div>

            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">{{ __('Recent Approved Leaves') }}</h3>
                </div>
                <div class="card-body" v-if="!loading">
                    <div class="d-flex flex-wrap col-12">
                        <template v-if="recent_approved_requests && summary.total_approve_leaves">
                        <div v-for="request in recent_approved_requests" :key="request.id"
                            class="col-12 holidayCont officalHCont d-flex justify-content-between align-items-center main-user-fields">
                            <div class="mt-4">
                                <h6><strong>{{ request.title }}</strong>
                                    <span class="text-danger ml-1">
                                        {{ request.days }} {{ pluralize(request.days, 'Day') }}
                                    </span>
                                </h6>
                                <h6 class="d-flex align-items-center">
                                    <span class="m-widget4__sub">
                                        <span class="m-widget4__sm-text mr-1">
                                            <i class="fa-regular fa-calendar-days"></i>
                                            {{ startDate(request.start) }}
                                        </span>
                                        <span class="m-widget4__sm-text ml-1">
                                            <i class="fa-regular fa-calendar-days"></i>
                                            {{ endDate(request.end) }}
                                        </span>
                                    </span>
                                </h6>
                                <span :style="{ background: request.color, border: '2px solid '+request.color }"
                                    class="leave-type-color" v-tooltip="'Leave Type'">
                                    {{ request.type }}
                                </span>
                            </div>
                            <div>
                                <button @click="showDetails(request)" v-tooltip="__('Details')" class="btn btn-sm  pl-0">
                                    <EyeIcon />
                                </button>
                            </div>
                        </div>
                        </template>
                        <h6 class="text-center m-auto" v-else>{{ __('No Data Found') }}</h6>
                    </div>
                </div>
                <div class="card-body mx-auto" v-else>
                    <Loading :messageShow="false" size="fa-2x" />
                </div>
            </div>

              <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">{{ __('Currently Subscribed') }}</h3>
                </div>
                <div class="card-body" v-if="!loading">
                    <div class="d-flex flex-wrap col-12">
                        <table class="table">
                            <tbody>
                                <tr v-if="subscribed_plan.plan">
                                    <th>{{ __('Plan') }}</th>
                                    <td>{{ subscribed_plan.plan.name }}</td>
                                </tr>
                                <tr v-if="subscribed_plan.plan">
                                    <th>{{ __('Subscription Type') }}</th>
                                    <td>
                                        <span v-if="subscribed_plan.plan.interval == 'custom_days'">
                                        {{ subscribed_plan.plan.custom_interval_days }} {{ pluralize(subscribed_plan.remaining_days, 'Day') }}
                                        </span>
                                        <span v-else class="text-capitalize">{{ subscribed_plan.plan.interval }}</span>
                                    </td>
                                </tr>
                                <tr v-if="subscribed_plan.plan && subscribed_plan.plan.interval != 'lifetime'">
                                   <th>{{ __('Expiration Remaining') }}</th>
                                    <td>{{ subscribed_plan.remaining_days }}
                                    <span v-if="subscribed_plan.remaining_days != 'Lifetime'">
                                        {{ pluralize(subscribed_plan.remaining_days, 'Day') }}
                                    </span>
                                    </td>
                                </tr>
                                <tr>
                                   <th width="40%">{{ __('Plan Features') }}</th>
                                    <td>
                                        <Feature :span-text="true" name="Unlimited Employees" :checked="!subscribed_plan.plan.plan_features.is_limited_employee"/>
                                        <Feature :span-text="true" name="Max Employees" :checked="true" :value="subscribed_plan.plan.plan_features.is_limited_employee ? subscribed_plan.plan.plan_features.max_employees : '∞'"/>
                                        <Feature :span-text="true" name="Max Teams" :checked="true" :value="subscribed_plan.plan.plan_features.max_teams"/>
                                        <Feature :span-text="true" name="Max Leave Types" :checked="true" :value="subscribed_plan.plan.plan_features.max_leave_types"/>
                                        <Feature :span-text="true" name="Custom Theme Look" :checked="subscribed_plan.plan.plan_features.custom_theme_look"/>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                     <div class="row justify-content-between">
                            <Link :href="route('organization.billing')" class="btn btn-primary">{{ __('Upgrade Plan') }}</Link>
                       </div>
                </div>
                <div class="card-body mx-auto" v-else>
                    <Loading :messageShow="false" size="fa-2x" />
                </div>
            </div>
        </div>
    </div>

    <div v-if="showModal">
        <transition name="fade">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-dialog d-flex justify-content-center" role="document">
                        <div class="modal-content" v-click-outside="()=> showModal = false">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    {{ __('Leave Request Details') }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" @click="showModal = false">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td width="30%">{{ __('Employee') }}</td>
                                            <td width="70%">
                                                <Link :href="route('organization.employees.show',form.user_id)">
                                                    {{ form.name }}
                                                </Link>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%">{{ __('Leave Type') }}</td>
                                            <td width="70%"><a href="javascript:void(0)">
                                                 <span :style="{ background: form.color, border: '2px solid '+form.color }" class="leave-type-color">
                                            {{ form.type }}
                                        </span>
                                            </a></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">{{ __('Date') }}</td>
                                            <td width="70%">{{ requestFor(form.start, form.end) }}</td>
                                        </tr>
                                        <tr>
                                            <td width="30%">{{ __('Total Days') }}</td>
                                            <td width="70%">{{ form.days }} {{ pluralize(form.days, 'Day') }}</td>
                                        </tr>
                                        <tr>
                                            <td width="30%">{{ __('Status') }}</td>
                                            <td width="70%">
                                                <span class="toCapitalFirst badge" :class="getBadgeType(form.status)">
                                                    {{ form.status }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%">{{ __('Reason') }}</td>
                                            <td width="50%">{{ form.reason }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    @click="showModal = false">{{ __('Close') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div> -->
</template>

<script>
    // import VueApexCharts from "vue3-apexcharts";
    // import FullCalendar from "@fullcalendar/vue3";
    // import dayGridPlugin from "@fullcalendar/daygrid";
    // import interactionPlugin from "@fullcalendar/interaction";
    // import CheckIcon from "../Icons/CheckIcon.vue";
    // import Feature from "../Admin/Plan/Feature.vue";

    export default {
        components: {
            // apexchart: VueApexCharts,
            // FullCalendar,
            // CheckIcon,
            // Feature,
        },
        data() {
            return {
                calendarOptions: {
                    // plugins: [dayGridPlugin, interactionPlugin],
                    // initialView: "dayGridMonth",
                    // events: [],
                },
                summary: {},
                event_types: [],
                pending_requests: [],
                recent_approved_requests: [],
                subscribed_plan: {},
                form: {
                    name: "",
                    user_id: "",
                    type: "",
                    color: "",
                    status: "",
                    start: "",
                    end: "",
                    days: "",
                    reason: "",
                },
                showModal: false,
                loading: true,
                hover: false,

            };
        },
        methods: {
            getBadgeType(status) {
                if (status == "pending") {
                    return "badge-warning";
                } else if (status == "approved") {
                    return "badge-success";
                } else {
                    return "badge-danger";
                }
            },
            startDate(Date) {
                return this.formatTime(Date, "DD MMM, YYYY");
            },
            endDate(Date) {
                return  this.formatTime(Date, "DD MMM, YYYY");
            },
            requestFor(startDate, endDate) {
                const start =  this.formatTime(startDate, "DD MMM, YYYY");
                const end =  this.formatTime(endDate, "DD MMM, YYYY");

                return `${start} - ${end}`;
            },
            showDetails(request) {
                this.form.name = request.title;
                this.form.user_id = request.user_id;
                this.form.type = request.type;
                this.form.color = request.color;
                this.form.status = request.status;
                this.form.start = request.start;
                this.form.end = request.end;
                this.form.days = request.days;
                this.form.reason = request.reason;
                this.showModal = true;
            },
            statusChange(status, id) {
                this.$inertia.post(
                    route("organization.leaveRequests.status"), {
                        id: id,
                        status: status,
                    }, {
                        onSuccess: () => {
                            this.loadData();
                            preserveScroll = false;
                        },
                    }
                );
            },
            async loadData() {
                let response = await axios.get(route("organization.dashboard"));
                this.summary = response.data.summary;
                this.calendarOptions.events = response.data.events;
                this.event_types = response.data.event_types;
                this.pending_requests = response.data.pending_requests;
                this.recent_approved_requests =
                    response.data.recent_approved_requests;
                this.subscribed_plan = response.data.subscribed_plan;
                this.loading = false;
            },
        },
        async mounted() {
            this.loading = true;
            await this.loadData();
        },
    };
</script>

<style scoped>
    .event-size {
        padding: 0px 10px !important;
        border-radius: 5px !important;
    }

    .leave-type-color {
        border-radius: 30px;
        padding: 1px 5px;
        font-weight: 500;
        color: #fff;
    }

    .modal-dialog {
        max-width: 1000px !important;
    }
</style>

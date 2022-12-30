<template>


    <!-- <ol class="flex items-center whitespace-nowrap min-w-0">
        <li class="text-sm"><a class="flex items-center text-gray-500 hover:text-blue-600" href="#">Admin <svg
                    class="flex-shrink-0 mx-3 overflow-visible h-2.5 w-2.5 text-gray-400 dark:text-gray-600"
                    width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                </svg></a></li>
        <li class="text-sm font-semibold text-gray-800 truncate dark:text-gray-200"><span
                class="text-gray-500 hover:text-blue-600"> Dashboard </span></li>
    </ol> -->

    <nav class="flex mb-3">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    Admin
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Dashboard</a>
                </div>
            </li>
        </ol>
    </nav>


    <div class="page-header mb-[1.875rem] pt-12">
        <div class="flex items-center justify-between">
            <div>
                <h2
                    class="text-3xl font-semibold leading-7 text-gray-900 dark:text-gray-200 sm:text-3xl sm:truncate">
                    Dashboard
                </h2>
                <!-- <ul class="hidden text-[14px] md:text-base font-medium sm:flex flex-wrap">
                    <li><a href="index.html" class="text-[#333333]">Dashboard</a></li>
                    <li><span class="px-2">/</span></li>
                    <li class="text-[#6c757d]">Admin</li>
                </ul> -->
            </div>
        </div>
    </div>

    <!-- Summary  -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">

        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                    Subscribers
                </p>
                <p class="my-1 text-lg font-semibold text-gray-700 dark:text-gray-200">
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

        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div
                class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total Earnings
                </p>
                <p class="my-1 text-lg font-semibold text-gray-700 dark:text-gray-200">
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

        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div
                class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                    Organizations
                </p>
                <p class="my-1 text-lg font-semibold text-gray-700 dark:text-gray-200">
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


        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                    Active Subscribers
                </p>
                <p class="my-1 text-lg font-semibold text-gray-700 dark:text-gray-200">
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
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-8 media-max-w-lg:col-span-2 border-cardBorder shadow-header relative flex flex-col break-words bg-white rounded flex-grow flex-shrink basis-auto shadow-md border">
            <div class="p-4">
                <h5 class="text-[#1f1f1f] text-xl mb-5">Yearly Earning</h5>
                <BarChart />
            </div>
        </div>
        <div class="col-span-4 media-max-w-lg:col-span-2 border-cardBorder shadow-header relative flex flex-col break-words bg-white rounded flex-grow flex-shrink basis-auto shadow-md border">
            <div class="p-4">
                <h5 class="text-[#1f1f1f] text-xl mb-5">Expenses per Organization</h5>
                <PieChart />
            </div>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4 mt-5">
        <div
            class="border media-max-w-lg:col-span-2 border-cardBorder shadow-header relative flex flex-col break-words bg-white rounded flex-grow flex-shrink basis-auto mb-[30px]">
            <div class="p-4">
                <h5 class="text-[#1f1f1f] text-xl mb-5">Recent Joined Organizations</h5>
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Client</th>
                            <th class="px-4 py-3">Amount</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <tr class="text-gray-700 dark:text-gray-400">
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
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
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
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
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
        </div>
        <div
            class="border media-max-w-lg:col-span-2 border-cardBorder shadow-header relative flex flex-col break-words bg-white rounded flex-grow flex-shrink basis-auto mb-[30px]">
            <div class="p-4">
                <h5 class="text-[#1f1f1f] text-xl mb-5">Recent Subscribers</h5>
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Client</th>
                            <th class="px-4 py-3">Amount</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <tr class="text-gray-700 dark:text-gray-400">
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
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
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
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
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
        </div>
        <div
            class="border media-max-w-lg:col-span-2 border-cardBorder shadow-header relative flex flex-col break-words bg-white rounded flex-grow flex-shrink basis-auto mb-[30px]">
            <div class="p-4">
                <h5 class="text-[#1f1f1f] text-xl mb-5">Most Subscribed Plan</h5>
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Client</th>
                            <th class="px-4 py-3">Amount</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <tr class="text-gray-700 dark:text-gray-400">
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
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
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
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
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
        </div>
    </div>
















































































































        <!-- Charts -->
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Charts
        </h2>
        <div class="grid gap-6 mb-8 md:grid-cols-2">
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    Revenue
                </h4>
                <canvas id="pie" width="429" height="214" style="display: block; height: 286px; width: 572px;"
                    class="chartjs-render-monitor"></canvas>
                <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
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
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    Traffic
                </h4>
                <canvas id="line" width="429" height="214" style="display: block; height: 286px; width: 572px;"
                    class="chartjs-render-monitor"></canvas>
                <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
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
                        <h4 class="font-medium dark:text-slate-300">Total Visits</h4>
                    </div>
                    <div class="flex flex-col card-body">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <thead class="bg-gray-50 dark:bg-gray-700">
                                            <tr>
                                                <th scope="col"
                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    Channel
                                                </th>
                                                <th scope="col"
                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    Sessions
                                                </th>
                                                <th scope="col"
                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    Prev.Period
                                                </th>
                                                <th scope="col"
                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    % Change
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- 1 -->
                                            <tr
                                                class="bg-white border-b border-dashed dark:bg-gray-800 dark:border-gray-700">
                                                <td
                                                    class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                    <a href="" class="text-blue-500">Organic search</a>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    10853<small class="text-gray-400">(52%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    566<small class="text-gray-400">(92%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    52.80% <i class="ti ti-caret-up text-green-500 text-base"></i>
                                                </td>
                                            </tr>
                                            <!-- 2 -->
                                            <tr
                                                class="bg-white border-b border-dashed dark:bg-gray-800 dark:border-gray-700">
                                                <td
                                                    class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                    <a href="" class="text-blue-500">Direct</a>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    10853<small class="text-gray-400">(52%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    566<small class="text-gray-400">(92%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    52.80% <i class="ti ti-caret-down text-red-500 text-base"></i>
                                                </td>
                                            </tr>
                                            <!-- 3 -->
                                            <tr
                                                class="bg-white border-b border-dashed dark:bg-gray-800 dark:border-gray-700">
                                                <td
                                                    class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                    <a href="" class="text-blue-500">Referal</a>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    10853<small class="text-gray-400">(52%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    566<small class="text-gray-400">(92%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    52.80% <i class="ti ti-caret-up text-green-500 text-base"></i>
                                                </td>
                                            </tr>
                                            <!-- 4 -->
                                            <tr
                                                class="bg-white border-b border-dashed dark:bg-gray-800 dark:border-gray-700">
                                                <td
                                                    class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                    <a href="" class="text-blue-500">Email</a>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    10853<small class="text-gray-400">(52%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    566<small class="text-gray-400">(92%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    52.80% <i class="ti ti-caret-down text-red-500 text-base"></i>
                                                </td>
                                            </tr>
                                            <!-- 5 -->
                                            <tr class="bg-white dark:bg-gray-800">
                                                <td
                                                    class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                    <a href="" class="text-blue-500">Social</a>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    10853<small class="text-gray-400">(52%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    566<small class="text-gray-400">(92%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
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
                        <h4 class="font-medium dark:text-slate-300">Browser Used By Users</h4>
                    </div>
                    <div class="flex flex-col card-body">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <thead class="bg-gray-50 dark:bg-gray-700">
                                            <tr>
                                                <th scope="col"
                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    Browser
                                                </th>
                                                <th scope="col"
                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    Sessions
                                                </th>
                                                <th scope="col"
                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    Bounce Rate
                                                </th>
                                                <th scope="col"
                                                    class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    Transactions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- 1 -->
                                            <tr
                                                class="bg-white border-b border-dashed dark:bg-gray-800 dark:border-gray-700">
                                                <td
                                                    class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                    <img src="assets/images/logos/chrome.png" alt=""
                                                        class="mr-2 h-5 inline-block">Chrome
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    10853<small class="text-gray-400">(52%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    52.80%
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    566 <small class="text-gray-400">(92%)</small>
                                                </td>
                                            </tr>
                                            <!-- 2 -->
                                            <tr
                                                class="bg-white border-b border-dashed dark:bg-gray-800 dark:border-gray-700">
                                                <td
                                                    class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                    <img src="assets/images/logos/in-explorer.png" alt=""
                                                        class="mr-2 h-5 inline-block">Explorer
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    10853<small class="text-gray-400">(52%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    52.80%
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    566 <small class="text-gray-400">(92%)</small>
                                                </td>
                                            </tr>
                                            <!-- 3 -->
                                            <tr
                                                class="bg-white border-b border-dashed dark:bg-gray-800 dark:border-gray-700">
                                                <td
                                                    class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                    <img src="assets/images/logos/safari.png" alt=""
                                                        class="mr-2 h-5 inline-block">Safari
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    10853<small class="text-gray-400">(52%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    52.80%
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    566 <small class="text-gray-400">(92%)</small>
                                                </td>
                                            </tr>
                                            <!-- 4 -->
                                            <tr
                                                class="bg-white border-b border-dashed dark:bg-gray-800 dark:border-gray-700">
                                                <td
                                                    class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                    <img src="assets/images/logos/mozilla.png" alt=""
                                                        class="mr-2 h-5 inline-block">Mozilla
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    10853<small class="text-gray-400">(52%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    52.80%
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    566 <small class="text-gray-400">(92%)</small>
                                                </td>
                                            </tr>
                                            <!-- 5 -->
                                            <tr class="bg-white dark:bg-gray-800">
                                                <td
                                                    class="p-3 text-sm font-medium whitespace-nowrap dark:text-white">
                                                    <img src="assets/images/logos/opera.png" alt=""
                                                        class="mr-2 h-5 inline-block">Opera
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    10853<small class="text-gray-400">(52%)</small>
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    52.80%
                                                </td>
                                                <td
                                                    class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
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
            <div class="info-box shadow-md">
                <span class="info-box-icon bg-primary"><i class="fa-regular fa-money-bill-1"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ __('Total Income') }}</span>
                    <span class="info-box-number">
                        {{ currencyPosition(summary.total_income) }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow-md">
                <span class="info-box-icon bg-warning"><i class="fa-regular fa-building"></i></span>
                <div class="info-box-content">

                    <span class="info-box-text">{{ __('Total Companies') }}</span>
                    <span class="info-box-number">
                        {{ summary.total_companies }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow-md">
                <span class="info-box-icon bg-info"><i class="fa-solid fa-people-group nav-icon"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ __('Total Teams') }}</span>
                    <span class="info-box-number">
                        {{ summary.total_teams }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow-md">
                <span class="info-box-icon bg-success"><i class="fa-solid fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ __('Total Employees') }}</span>
                    <span class="info-box-number">
                        {{ summary.total_employees }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">{{ __('Yearly Earning') }}</h3>
                </div>
                <YearlyEarningChart :data="yearly_earnings" />
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">{{ __('Recent Registered Companies') }}</h3>
                            <div class="card-tools" v-if="!loading">
                                <Link :href="route('companies.index')" class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-arrow-left"></i>
                                {{ __('View All') }}
                                </Link>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0" v-if="!loading">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>{{ __('Company') }}</th>
                                        <th>{{ __('Email') }}</th>
                                        <th>{{ __('Country') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-if="recent_companies && recent_companies.length">
                                        <tr v-for="company in recent_companies" :key="organization.id">
                                            <td>
                                                <Link :href="route('companies.show',organization.user_id)">
                                                    <img :src="organization.avatar" alt="img"
                                                        class="img-circle img-size-32 mr-2">
                                                    {{ organization.name }}
                                                </Link>
                                            </td>
                                            <td>{{ organization.email }}</td>
                                            <td>
                                                {{ organization.country }}
                                            </td>
                                        </tr>
                                    </template>
                                    <tr v-else>
                                        <td colspan="5" class="text-center">
                                            <h6>{{ __('No Data Found') }}</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body mx-auto" v-else>
                            <Loading :messageShow="false" size="fa-2x" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">{{ __('Recent Orders') }}</h3>
                            <div class="card-tools" v-if="!loading">
                                <Link :href="route('orders.index')" class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-arrow-left"></i>
                                {{ __('View All') }}
                                </Link>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0" v-if="!loading">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>{{ __('Order ID') }}</th>
                                        <th>{{ __('Company') }}</th>
                                        <th>{{ __('Plan') }}</th>
                                        <th>{{ __('Amount') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-if="recent_orders && recent_orders.length">
                                        <tr v-for="order in recent_orders" :key="order.id">
                                            <td>
                                                <Link :href="route('orders.show',order.id)" v-tooltip="__('Order Details')">
                                                    #{{ order.order_id }}
                                                </Link>
                                            </td>
                                            <td>
                                                 <Link :href="route('companies.show',order.organization.id)">
                                                    {{ order.organization.name }}
                                                </Link>
                                            </td>
                                            <td>{{ order.plan }}</td>
                                            <td>{{ order.amount }}</td>
                                        </tr>
                                    </template>
                                    <tr v-else>
                                        <td colspan="5" class="text-center">
                                            <h6>{{ __('No Data Found') }}</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body mx-auto" v-else>
                            <Loading :messageShow="false" size="fa-2x" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <CompaniesExpenseChart :data="expense_per_company" />

            <CountriesCompanyChart :data="companies_per_country" />
        </div>
    </div> -->
</template>

<script>
    // import YearlyEarningChart from "./Dashboard/YearlyEarningChart.vue";
    // import CompaniesExpenseChart from "./Dashboard/CompaniesExpenseChart.vue";
    // import CountriesCompanyChart from "./Dashboard/CountriesCompanyChart.vue";
    import BarChart from "@/Shared/Chart/BarChart.vue"
    import PieChart from "@/Shared/Chart/PieChart.vue"

    export default {
        components: {
            BarChart,
            PieChart
            // YearlyEarningChart,
            // CompaniesExpenseChart,
            // CountriesCompanyChart,
        },
        data() {
            return {
                // Summary
                summary: {
                    total_income: 0,
                    total_companies: 0,
                    total_teams: 0,
                    total_employees: 0,
                },

                // Chart
                expense_per_company: {},
                companies_per_country: {},
                yearly_earnings: {},

                // Table
                recent_companies: [],
                recent_orders: [],

                loading: true,
            };
        },
        async mounted() {
            let response = await axios.get(route("admin.dashboard"));
            this.summary = response.data.summary;
            this.expense_per_company = response.data.expense_per_company;
            this.companies_per_country = response.data.companies_per_country;
            this.yearly_earnings = response.data.yearly_earnings;
            this.recent_companies = response.data.recent_companies;
            this.recent_orders = response.data.recent_orders;
            this.loading = false;
        },
    };
</script>

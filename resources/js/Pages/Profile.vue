<template>
    <AppLayout title="Profile">
        <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]">
            <div class="page-content page-min-height">
                <div class="transition-all duration-150 container-fluid">
                    <div class="md:mb-6 mb-4 flex space-x-3 rtl:space-x-reverse">
                        <h2 class="text-3xl font-semibold leading-7 text-gray-900  sm:text-3xl sm:truncate">
                            {{ __('Profile') }}
                        </h2>
                    </div>
                    {{ auth_user }}

                    <div class="space-y-5 profile-page">
                        <div class="relative px-[35px] pb-10 md:pt-10 rounded-lg bg-white lg:flex lg:space-y-0 space-y-6 justify-between items-end z-[1]">
                            <div class="profile-box flex-none md:text-start text-center">
                                <div class="md:flex items-end md:space-x-6 rtl:space-x-reverse gap-3">
                                    <div class="flex-none">
                                        <div
                                            class="md:w-[186px] w-[140px] md:ml-0 md:mr-0 ml-auto mr-auto md:mb-0 mb-4 rounded-full border-4 border-slate-400 relative">
                                            <img :src="auth_user.avatar_url" alt=""
                                                class="object-cover rounded-full h-full w-full">
                                            <a href="/app/profile-setting"
                                                class="absolute right-2 h-8 w-8 bg-slate-50 text-slate-600 rounded-full flex flex-col items-center justify-center bottom-0 shadow-md">
                                                <span>
                                                    <font-awesome-icon icon="fa-solid fa-edit" class="h-4 w-4 text-gray-500"/>
                                                </span>
                                            </a>

                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <div class="text-2xl font-medium text-slate-900 ">
                                            {{ auth_user.name }}
                                        </div>
                                        <div class="text-sm font-light text-slate-600 capitalize">
                                            {{ auth_user.role }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute top-2 right-3">
                                <button type="submit" class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-md px-5 py-3 mb-2 focus:outline-none mt-3">
                                    <font-awesome-icon icon="fa-solid fa-solid fa-cog" class="h-5 w-5 mr-2 text-white"/>
                                    <span>
                                        Go to Settings
                                    </span>
                                </button>
                            </div>
                            <div class="profile-info-500 md:flex justify-start md:text-start text-center gap-12 mr-12">
                                <div>
                                    <div class="text-base text-slate-900 font-medium mb-1"> $32,400
                                    </div>
                                    <div class="text-sm text-slate-600 font-light"> Total Balance </div>
                                </div>
                                <div>
                                    <div class="text-base text-slate-900 font-medium mb-1"> 200 </div>
                                    <div class="text-sm text-slate-600 font-light"> Board Card </div>
                                </div>
                                <div>
                                    <div class="text-base text-slate-900 font-medium mb-1"> 3200 </div>
                                    <div class="text-sm text-slate-600 font-light"> Calender Events
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6">
                            <div class="lg:col-span-4 col-span-12">
                                <div class="card rounded-md bg-white lg:h-full  shadow-base">
                                    <div class="card-body flex flex-col p-6">
                                        <header
                                            class="flex mb-5 items-center border-b border-slate-100 pb-5  -mx-6 px-6">
                                            <div class="flex-1">
                                                <div class="card-title text-slate-900">
                                                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Info</h2>
                                                </div>
                                            </div>
                                        </header>

                                        <div class="card-text h-full">
                                            <ul class="list space-y-8">
                                                <li class="flex space-x-3 rtl:space-x-reverse">
                                                    <div class="flex-none text-2xl text-slate-600">
                                                        <span>
                                                            <font-awesome-icon icon="fa-solid fa-envelope" class="h-6 w-6 text-gray-500"/>
                                                        </span></div>
                                                    <div class="flex-1">
                                                        <div class="uppercase text-xs text-slate-500 mb-1 leading-[12px]">
                                                            EMAIL
                                                        </div>
                                                        <a href="mailto:someone@example.com" class="text-base text-slate-600 ">
                                                            {{ auth_user.email }}
                                                        </a>
                                                    </div>
                                                </li>
                                                <li class="flex space-x-3 rtl:space-x-reverse">
                                                    <div class="flex-none text-2xl text-slate-600">
                                                        <span>
                                                            <font-awesome-icon icon="fa-solid fa-phone" class="h-6 w-6 text-gray-500"/>
                                                        </span>
                                                    </div>
                                                    <div class="flex-1">
                                                        <div class="uppercase text-xs text-slate-500 mb-1 leading-[12px]">
                                                            PHONE
                                                        </div><a href="tel:0189749676767" class="text-base text-slate-600">
                                                            {{ auth_user.phone || '' }}
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="lg:col-span-8 col-span-12 border-gray-200">
                                <div class="card rounded-md bg-white lg:h-full  shadow-base">
                                    <div class="card-body flex flex-col p-6">
                                        <header
                                            class="flex mb-5 items-center border-b border-slate-100 pb-5  -mx-6 px-6">
                                            <div class="flex-1">
                                                <div class="card-title text-slate-900">
                                                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">User Overview</h2>
                                                </div>
                                            </div>
                                        </header>

                                        <div class="card-text h-full">
                                            <!-- <div id="headlessui-menu-items-106" role="menu" tabindex="0" data-headlessui-state="open"
                                                class="md:w-[335px] w-min top-[58px] absolute ltr:right-0 rtl:left-0 origin-top-right rounded bg-white dark:bg-slate-800 dark:border dark:border-slate-700 shadow-dropdown z-[9999]">
                                                <div class="flex justify-between px-4 py-4 border-b border-slate-100 dark:border-slate-600" role="none">
                                                    <div class="text-sm text-slate-800 dark:text-white font-medium leading-6" role="none"> Messages </div>
                                                    <div class="text-slate-800 dark:text-white text-xs md:text-right" role="none"><a href="/app/chat"
                                                            class="underline" role="none">View all</a></div>
                                                </div>
                                                <div class="divide-y divide-slate-100 dark:divide-slate-800" role="none">
                                                    <div class="text-slate-600 dark:text-slate-300 block w-full px-4 py-2 text-sm  cursor-pointer" disabled="false"
                                                        id="headlessui-menu-item-134" role="menuitem" tabindex="-1" data-headlessui-state="">
                                                        <div class="flex ltr:text-left rtl:text-right space-x-3 rtl:space-x-reverse">
                                                            <div class="flex-none">
                                                                <div class="h-8 w-8 bg-white dark:bg-slate-700 rounded-full relative"><span
                                                                        class="bg-secondary-500 w-[10px] h-[10px] rounded-full border border-white dark:border-slate-700  inline-block absolute right-0 top-0"></span><img
                                                                        src="data:image/png;base64,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"
                                                                        alt=""
                                                                        class="block w-full h-full object-cover rounded-full border hover:border-white border-transparent">
                                                                </div>
                                                            </div>
                                                            <div class="flex-1">
                                                                <div class="text-slate-800 dark:text-slate-300 text-sm font-medium mb-1`">Wade Warren</div>
                                                                <div class="text-xs hover:text-[#68768A] text-slate-600 dark:text-slate-300 mb-1">Hi! How are you
                                                                    doing?.....</div>
                                                                <div class="text-slate-400 dark:text-slate-400 text-xs"> 3 min ago </div>
                                                            </div>
                                                            <div class="flex-0"><span
                                                                    class="h-4 w-4 bg-danger-500 border border-white rounded-full text-[10px] flex items-center justify-center text-white">1</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </AppLayout>
</template>

<script>
import { library } from '@fortawesome/fontawesome-svg-core'
import { faEnvelope, faPhone, faCog} from '@fortawesome/free-solid-svg-icons'
library.add(faEnvelope, faPhone, faCog)

export default {

}
</script>

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
                                <Link :href="route('user.profile.setting')" class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-md px-5 py-3 mb-2 focus:outline-none mt-3">
                                    <font-awesome-icon icon="fa-solid fa-solid fa-cog" class="h-5 w-5 mr-2 text-white"/>
                                    <span>
                                        Go to Settings
                                    </span>
                                </Link>
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
                                                <div class="card-title text-slate-900 flex justify-between">
                                                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">My Login Activity</h2>

                                                    <button @click="recognizeModal = true" type="button" class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-md px-4 py-2.5 mb-2 focus:outline-none mt-3">
                                                        Don't recognize a device?
                                                    </button>
                                                </div>
                                            </div>
                                        </header>

                                        <div class="card-text h-full">
                                            <BaseTable :items="activities" >
                                                <template v-slot:head>
                                                    <tr class="divide-x divide-gray-200">
                                                        <th class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Login At</th>
                                                        <th class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Device</th>
                                                        <th class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Platform</th>
                                                        <th class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Browser</th>
                                                        <th class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Location</th>
                                                        <th class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Login Type</th>
                                                    </tr>
                                                </template>
                                                <template v-slot:body>
                                                    <tr v-for="activity in activities.data" :key="activity.id" class="divide-x divide-gray-200">
                                                        <td class="p-4 text-sm text-gray-500 break-all">
                                                            {{ formatTime(activity.created_at,null, 'hh:mm A') }}
                                                        </td>
                                                        <td class="p-4 text-sm text-gray-500 break-all">
                                                            {{ activity.device }}
                                                        </td>
                                                        <td class="p-4 text-sm text-gray-500 break-all">
                                                            {{ activity.platform }}
                                                        </td>
                                                        <td class="p-4 text-sm text-gray-500 break-all">
                                                            {{ activity.browser }}
                                                        </td>
                                                        <td class="p-4 text-sm text-gray-500 break-all">
                                                            {{ activity.location }}
                                                        </td>
                                                        <td class="p-4 text-sm text-gray-500 break-all capitalize">
                                                            {{ activity.login_type }}
                                                        </td>
                                                    </tr>
                                                </template>
                                            </BaseTable>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <ShowRecognizeModal :show="recognizeModal" @close-modal="recognizeModal = false"/>
    </AppLayout>
</template>

<script>
import { library } from '@fortawesome/fontawesome-svg-core'
import { faEnvelope, faPhone, faCog} from '@fortawesome/free-solid-svg-icons'
library.add(faEnvelope, faPhone, faCog)
import ShowRecognizeModal from '@/Shared/Modal/ShowRecognizeModal.vue'

export default {
    props: {
        activities: Array,
    },
    components: {
        ShowRecognizeModal
    },
    data() {
        return {
            recognizeModal: false,
        }
    }
}
</script>

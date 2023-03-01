<template>
    <AppLayout title="Leave Request">

        <!-- Header Part  -->
        <nav class="flex mb-2" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="#" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
                        <font-awesome-icon icon="fa-solid fa-home" class="w-4.5 h-4.5 mr-2.5" />
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <font-awesome-icon icon="fa-solid fa-chevron-right" class="w-3 h-3 text-gray-400" />
                        <a href="#"
                            class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">Leave Request</a>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="mb-4 flex justify-between">
            <h2 class="text-3xl font-semibold leading-7 text-gray-900  sm:text-3xl sm:truncate">
                {{ __('Leave Request') }}
            </h2>

            <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                <BaseButton v-if="filter.keyword && filter.keyword.length" as="link" :href="route('admin.leaveRequest.index')" class="text-white bg-red-600 hover:bg-red-700 px-3 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Clear Filter
                </BaseButton>

                <BaseButton @click="toggleFilter" class="text-whittext-gray-900 bg-white border border-gray-300 hover:bg-gray-100 px-3 py-2">
                    <svg class="mr-2 h-6 w-6" stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                    {{ showFilter ? 'Hide Filter':'Filter' }}
                </BaseButton>

                <BaseButton @click="showCreateDrawer = true" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2.5">
                    <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                   {{ __('Add Leave Request') }}
                </BaseButton>
            </div>
        </div>

        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-100" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <div v-if="showFilter" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 xl:grid-cols-6 gap-5 mb-4 bg-white rounded-lg shadow-xs  items-center p-4">
                <div>
                    <label for="keyword" class="block text-sm font-medium text-gray-700">{{ __('Search') }}</label>
                    <div class="mt-1">
                        <input v-model="filterForm.keyword" type="text" id="keyword" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5" placeholder="User name, email, username">
                    </div>
                </div>
                <div>
                    <label for="admin_leave_type" class="block text-sm font-medium text-gray-700">{{ __('Leave Type') }}</label>
                    <div class="mt-1">
                        <Multiselect id="admin_leave_type" :close-on-select="true" :can-clear="false"
                            :searchable="true" v-model="filterForm.leave_type" :create-option="false"
                            placeholder="Leave Type" :options="leave_types.map(item => ({
                                value: item.id, label: item.name
                            }))"  />
                    </div>
                </div>
                <div>
                    <button @click="filterData" :disabled="loading" type="button" class="text-white bg-blue-600 hover:bg-blue-700 font-medium inline-flex items-center justify-center rounded-lg text-sm px-6 py-2.5 mt-6 text-center sm:w-auto focus:outline-none">
                        <font-awesome-icon icon="fa-solid fa-search" class="h-4 w-4 mr-2"/>
                       {{ __('Search') }}
                    </button>
                </div>
            </div>
        </transition>

        <div>
            <div class="hidden sm:block">
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <button type="button" @click="changeTab('')" :class="['whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', filterForm.status == 'all' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            All
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="filterForm.status == 'all' ? 'bg-blue-100 text-blue-600':'bg-gray-100 text-gray-900'">
                                {{ count_request.all }}
                            </span>
                        </button>

                        <button type="button" @click="changeTab('pending')"  :class="['whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', filterForm.status == 'pending' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                           Pending
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="filterForm.status == 'pending' ? 'bg-blue-100 text-blue-600':'bg-gray-100 text-gray-900'">
                                {{ count_request.pending }}
                            </span>
                        </button>
                        <button type="button" @click="changeTab('approved')"  :class="['whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', filterForm.status == 'approved' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                           Approved
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="filterForm.status == 'approved' ? 'bg-blue-100 text-blue-600':'bg-gray-100 text-gray-900'">
                                {{ count_request.approved }}
                            </span>
                        </button>
                        <button type="button" @click="changeTab('rejected')"  :class="['whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', filterForm.status == 'rejected' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                           Rejected
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="filterForm.status == 'rejected' ? 'bg-blue-100 text-blue-600':'bg-gray-100 text-gray-900'">
                                {{ count_request.rejected }}
                            </span>
                        </button>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Body Part  -->
       <CardSkeleton :show="loading" v-if="loading"/>

       <template v-else-if="!loading && leave_requests && leave_requests.data.length">
            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4 mt-5 mb-60">
               <span v-for="(leave_request, index) in leave_requests.data" :key="index" class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100   ">
                   <div class="flex flex-wrap justify-between items-start">
                        <div class="flex items-center mb-5">
                            <div class="h-10 w-10 flex-shrink-0">
                                <img class="h-10 w-10 rounded-full" :src="leave_request?.user?.avatar_url" :alt="leave_request?.user?.name ?? '-'">
                            </div>
                            <div class="ml-4">
                                <div class="font-medium text-gray-900">{{ leave_request?.user?.name ?? '-' }}</div>
                                <div class="text-gray-600 font-bold capitalize">{{ leave_request?.user?.role ?? '-' }}</div>
                            </div>
                        </div>

                       <Menu as="div" class="relative inline-block text-left">
                           <div>
                               <MenuButton class="flex items-center rounded-full text-gray-400 hover:text-gray-600 focus:outline-none">
                                   <span class="sr-only">Open options</span>
                                   <font-awesome-icon icon="fa-solid fa-ellipsis-vertical" class="h-6 w-6"/>
                               </MenuButton>
                           </div>

                           <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                               <MenuItems class="absolute right-0 z-10 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                   <div class="py-1 text-sm">
                                   <MenuItem v-slot="{ active }">
                                       <a href="javascript:void(0)" @click.prevent="editData(leave_request)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                           <font-awesome-icon icon="fa-solid fa-pen-to-square" class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500"/>
                                           Edit
                                       </a>
                                   </MenuItem>
                                   <MenuItem v-slot="{ active }">
                                       <a href="javascript:void(0)" @click.prevent="editData(leave_request)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                           <font-awesome-icon icon="fa-solid fa-eye" class="mr-3 h-5 w-5 text-sky-500 group-hover:text-sky-500"/>
                                           Details
                                       </a>
                                   </MenuItem>
                                   <MenuItem v-slot="{ active }">
                                       <a href="javascript:void(0)" @click.prevent="deleteData()" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                           <font-awesome-icon icon="fa-solid fa-trash-can" class="mr-3 h-5 w-5 text-red-500 group-hover:text-red-500"/>
                                           Delete
                                       </a>
                                   </MenuItem>
                                   </div>
                               </MenuItems>
                           </transition>
                       </Menu>
                   </div>
                   <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{ leave_request?.leave_type?.name ?? '-' }}</h2>
                   <h2 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">{{ leave_request.days }} {{ pluralize(leave_request.days, 'Day') }}</h2>
                   <p>{{ formateDate(leave_request.start, 'MMMM D') }} - {{ formateDate(leave_request.end, 'MMMM D YYYY') }}</p>
                    <div class="mt-5">
                        <template v-if="leave_request.status == 'pending'">
                            <div class="flex gap-3 text-white">
                                <BaseButton @click.prevent="changeStatus(leave_request.id, 'approved')" class="text-whittext-gray-900 bg-green-500 border border-green-500 hover:bg-green-600 px-3 py-2">
                                    <CheckIcon class="h-5 w-5 mr-2"/>
                                    Approve
                                </BaseButton>
                                <BaseButton @click.prevent="changeStatus(leave_request.id, 'rejected')" class="text-whittext-gray-900 bg-red-500 border border-red-500 hover:bg-red-600 px-3 py-2">
                                    <XMarkIcon class="h-5 w-5 mr-2"/>
                                    Reject
                                </BaseButton>
                            </div>
                        </template>
                        <template v-else-if="leave_request.status == 'approved'">
                            <span class="bg-green-500 text-white text-sm font-medium mr-2 px-3 py-2 rounded-full  ">
                                Approved
                            </span>
                        </template>
                        <template v-else>
                            <span class="bg-red-500 text-white text-sm font-medium mr-2 px-3 py-2 rounded-full  ">
                                Rejected
                            </span>
                        </template>
                    </div>
               </span>
            </div>
           <Pagination :data="leave_requests" v-if="leave_requests && leave_requests.data.length && leave_requests.total > 20" class="mt-5"/>
       </template>

       <NothingFound v-else>
            <BaseButton @click="showCreateDrawer = true" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2">
                <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                {{ __('Add Leave Type') }}
            </BaseButton>
       </NothingFound>

        <CreateLeaveRequest :show="showCreateDrawer" @close-drawer="showCreateDrawer = false" :users="users"/>
        <EditLeaveRequest v-if="showEditDrawer" :show="showEditDrawer" @close-drawer="showEditDrawer = false" :leave_request="editLeaveRequest" :users="users"/>
    </AppLayout>
</template>

<script>
import CreateLeaveRequest from "./Create.vue";
import EditLeaveRequest from "./Edit.vue";
import CardSkeleton from "@/Shared/Skeleton/CardSkeleton.vue";
import { CheckIcon, XMarkIcon, ChevronDownIcon } from '@heroicons/vue/24/outline'

export default {
    components: {
        CreateLeaveRequest,
        EditLeaveRequest,
        CardSkeleton,
        CheckIcon,
        XMarkIcon,
        ChevronDownIcon,
    },
    props: {
        leave_requests:{
            type: Array,
            default: () => []
        },
        leave_types:{
            type: Array,
            default: () => []
        },
        filter:{
            type: Object,
            default: () => []
        },
        users:{
            type: Array,
            default: () => []
        },
        count_request:{
            type: Object,
            default: () => {}
        },
    },
    data() {
        return {
            showCreateDrawer: false,
            showEditDrawer: false,
            editLeaveRequest: '',

            showFilter: false,
            loading: false,

            filterForm: this.$inertia.form({
                keyword: this.filter.keyword,
                status: this.filter.status || "all",
                leave_type: this.filter.leave_type,
            }),
        }
    },
    methods: {
        deleteData(id) {
            this.$swal({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$inertia.delete(route("admin.leaveRequest.destroy", id));
                }
            });
        },
        editData(leave_request){
            this.showEditDrawer = true
            this.editLeaveRequest = leave_request
        },
        filterData(){
            this.loading = true
            this.filterForm.get(route('admin.leaveRequest.index'), {
                onSuccess: () => {
                    this.loading = false
                },
                onError: () => {
                    this.loading = false
                    alert('Something went wrong')
                },
            })
        },
        toggleFilter() {
            this.showFilter = !this.showFilter;
            localStorage.setItem("adminLeaveRequest", this.showFilter);
        },
        async changeTab(tab) {
            this.filterForm.status = tab;
            this.filterForm.get(route("admin.leaveRequest.index"));
        },
        changeStatus(id, status){
            this.$swal({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "success",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: `Yes, ${status == 'approved' ? 'approve':'reject'} it!`,
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$inertia.put(route("admin.leaveRequest.status", id), {
                        status: status
                    });
                }
            });
        }
    },
    created() {
        this.showFilter = localStorage.getItem("adminLeaveRequest") == "true" ? true: false;
    },
};
</script>

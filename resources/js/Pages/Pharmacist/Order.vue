<template>
    <AppLayout title="Announcement">

        <!-- Header Part  -->
        <Breadcrumb>
            <BreadcrumbLink title="Announcement"/>
        </Breadcrumb>

        <div class="mb-4 flex justify-between">
            <h2 class="text-3xl font-semibold leading-7 text-gray-900  sm:text-3xl sm:truncate">
                {{ __('Announcement') }}
            </h2>

            <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                <div class="ml-6 hidden items-center rounded-lg bg-gray-100 p-0.5 sm:flex">
                    <button @click="changeViewType('table')" type="button" class="rounded-md p-1.5 focus:outline-none text-gray-600 hover:bg-white hover:shadow-sm shadow-sm" :class="viewType == 'table' ? 'bg-white':''">
                        <ListIcon/>
                    </button>
                    <button @click="changeViewType('card')" type="button" class="rounded-md p-1.5 focus:outline-none ml-0.5 text-gray-600 hover:bg-white hover:shadow-sm shadow-sm" :class="viewType == 'card' ? 'bg-white':''">
                        <GridIcon/>
                    </button>
                </div>
                <BaseButton @click="showCreateDrawer = true" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2.5">
                    <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                   {{ __('Add Announcement') }}
                </BaseButton>
            </div>
        </div>
        <div>
            <div class="hidden sm:block mb-5">
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8">
                        <button type="button" @click="changeTab('all')" :class="['whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', currentTab == 'all' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            All
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="currentTab == 'all' ? 'bg-blue-100 text-blue-600':'bg-gray-100 text-gray-900'">
                                {{ total_announcements_count }}
                            </span>
                        </button>
                        <button type="button" @click="changeTab('public')" :class="['whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', currentTab == 'public' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            Public
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="currentTab == 'public' ? 'bg-blue-100 text-blue-600':'bg-gray-100 text-gray-900'">
                                {{ public_announcements_count }}
                            </span>
                        </button>
                        <button type="button" @click="changeTab('private')" :class="['whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', currentTab == 'private' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            Private
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="currentTab == 'private' ? 'bg-blue-100 text-blue-600':'bg-gray-100 text-gray-900'">
                                {{ private_announcements_count }}
                            </span>
                        </button>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Body Part  -->
        <CardSkeleton :show="loading" v-if="loading"/>

        <!-- Card View  -->
       <template v-else-if="!loading && announcements && announcements.data.length &&viewType == 'card'">
           <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
               <span v-for="announcement in announcements.data" :key="announcement.id" class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100   ">
                   <div class="flex flex-wrap justify-between items-start">
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{ announcement.title }}</h2>

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
                                       <a href="javascript:void(0)" @click.prevent="editData(announcement)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                           <font-awesome-icon icon="fa-solid fa-pen-to-square" class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500"/>
                                           Edit
                                       </a>
                                   </MenuItem>
                                   <MenuItem v-slot="{ active }">
                                       <a href="javascript:void(0)" @click.prevent="editData(announcement)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                           <font-awesome-icon icon="fa-solid fa-eye" class="mr-3 h-5 w-5 text-sky-500 group-hover:text-sky-500"/>
                                           Details
                                       </a>
                                   </MenuItem>
                                   <MenuItem v-slot="{ active }">
                                       <a href="javascript:void(0)" @click.prevent="deleteData(announcement.id)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                           <font-awesome-icon icon="fa-solid fa-trash-can" class="mr-3 h-5 w-5 text-red-500 group-hover:text-red-500"/>
                                           Delete
                                       </a>
                                   </MenuItem>
                                   </div>
                               </MenuItems>
                           </transition>
                       </Menu>
                   </div>
                   <span :class="announcement.type == 'public' ? 'bg-green-500':'bg-red-500'" class="text-white text-sm font-medium mr-2 px-3 py-2 rounded-full   capitalize">
                        {{ announcement.type }}
                    </span>
                   <p class="my-3 font-normal text-gray-700 ">
                       {{ announcement.description }}
                   </p>
               </span>
           </div>
           <Pagination :data="announcements" v-if="announcements && announcements.data.length && announcements.total > app_setting.rows_per_page" class="mt-5"/>
       </template>

        <!-- Table View  -->
       <div class="flex flex-col mb-5" v-else-if="!loading && announcements && announcements.data.length && viewType == 'table'">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-200">
                            <tr class="divide-x divide-gray-200">
                                <th width="30%" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Title
                                </th>
                                <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Description</th>
                                <th width="10%" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Type</th>
                                <th width="80px" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-6">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="announcement in announcements.data" :key="announcement.id" class="divide-x divide-gray-200">
                                    <td class="p-4 text-sm text-gray-500 break-all">
                                        {{ announcement.title ?? '' }}
                                    </td>
                                    <td class="p-4 text-sm text-gray-500 break-all">
                                        {{ announcement.description }}
                                    </td>
                                    <td class="p-4 text-sm text-gray-500 break-all">
                                        <div class="mt-5">
                                            <span :class="announcement.type == 'public' ? 'bg-green-500':'bg-red-500'" class="text-white text-sm font-medium mr-2 px-3 py-2 rounded-full   capitalize">
                                                {{ announcement.type }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-6">
                                        <Menu as="div" class="inline-block text-left">
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
                                                        <a href="javascript:void(0)" @click.prevent="editData(announcement)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                            <font-awesome-icon icon="fa-solid fa-pen-to-square" class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500"/>
                                                            Edit
                                                        </a>
                                                    </MenuItem>
                                                    <MenuItem v-slot="{ active }">
                                                        <a href="javascript:void(0)" @click.prevent="editData(announcement)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                            <font-awesome-icon icon="fa-solid fa-eye" class="mr-3 h-5 w-5 text-sky-500 group-hover:text-sky-500"/>
                                                            Details
                                                        </a>
                                                    </MenuItem>
                                                    <MenuItem v-slot="{ active }">
                                                        <a href="javascript:void(0)" @click.prevent="deleteData(announcement.id)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                            <font-awesome-icon icon="fa-solid fa-trash-can" class="mr-3 h-5 w-5 text-red-500 group-hover:text-red-500"/>
                                                            Delete
                                                        </a>
                                                    </MenuItem>
                                                    </div>
                                                </MenuItems>
                                            </transition>
                                        </Menu>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                    <Pagination :data="announcements"
                        v-if="announcements && announcements.data.length && announcements.total > app_setting.rows_per_page" class="mt-5" />
                </div>
            </div>
        </div>
        </div>

       <NothingFound v-else>
            <BaseButton @click="showCreateDrawer = true" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2">
                <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                {{ __('Add Announcement') }}
            </BaseButton>
       </NothingFound>
    </AppLayout>
</template>

<script>
import CardSkeleton from "@/Shared/Skeleton/CardSkeleton.vue";

export default {
    components: {
        CardSkeleton,
    },
    props: {
        announcements:{
            type: Array,
            default: () => []
        },
        filter:{
            type: Object,
            default: () => []
        },
        total_announcements_count:{
            type: Number,
            default: 0
        },
        public_announcements_count:{
            type: Number,
            default: 0
        },
        private_announcements_count:{
            type: Number,
            default: 0
        },
    },
    data() {
        return {
            viewType: 'card',
            showCreateDrawer: false,
            showEditDrawer: false,
            editAnnouncement: '',

            showFilter: false,
            loading: false,

            currentTab: this.filter.type || "all",

            filterForm: this.$inertia.form({
                keyword: this.filter.keyword,
            }),
        }
    },
    methods: {
        changeViewType(type){
            this.viewType = type
            localStorage.setItem("adminAnnouncementView", this.viewType);
        },
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
                    this.$inertia.delete(route("admin.announcement.destroy", id));
                }
            });
        },
        editData(announcement){
            this.showEditDrawer = true
            this.editAnnouncement = announcement
        },
        async changeTab(tab) {
            this.currentTab = tab;
            this.$inertia.get(route("admin.announcement.index"), {
                type: this.currentTab
            });
        },
    },
    created() {
        this.showFilter = localStorage.getItem("admin_announcement") == "true" ? true: false;
        this.viewType = localStorage.getItem("adminAnnouncementView") == "card" ? 'card': 'table';
    },
};
</script>

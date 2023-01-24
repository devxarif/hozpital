<template>

    <Head :title="__('Announcement')" />
    <AppLayout>

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
                            class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">Announcement</a>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="mb-4 flex justify-between">
            <h2 class="text-3xl font-semibold leading-7 text-gray-900 dark:text-gray-200 sm:text-3xl sm:truncate">
                {{ __('Announcement') }}
            </h2>

            <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
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
                        <button type="button" @click="changeTab('all')" :class="['whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', currentTab == 'all' ? 'border-indigo-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            All
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="currentTab == 'all' ? 'bg-indigo-100 text-blue-600':'bg-gray-100 text-gray-900'">
                                {{ total_announcements_count }}
                            </span>
                        </button>
                        <button type="button" @click="changeTab('public')" :class="['whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', currentTab == 'public' ? 'border-indigo-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            Public
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="currentTab == 'all' ? 'bg-indigo-100 text-blue-600':'bg-gray-100 text-gray-900'">
                                {{ public_announcements_count }}
                            </span>
                        </button>
                        <button type="button" @click="changeTab('private')" :class="['whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', currentTab == 'private' ? 'border-indigo-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            Private
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="currentTab == 'all' ? 'bg-indigo-100 text-blue-600':'bg-gray-100 text-gray-900'">
                                {{ private_announcements_count }}
                            </span>
                        </button>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Body Part  -->
       <CardSkeleton :show="loading" v-if="loading"/>

       <template v-else-if="!loading && announcements && announcements.data.length">
           <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
               <span v-for="announcement in announcements.data" :key="announcement.id" class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                   <div class="flex flex-wrap justify-between items-start">
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ announcement.title }}</h2>

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
                   <span class="capitalize text-xs font-semibold mr-2 px-2.5 py-0.5 rounded bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900">
                        {{ announcement.type }}
                    </span>
                   <p class="my-3 font-normal text-gray-700 dark:text-gray-400">
                       {{ announcement.description }}
                   </p>
               </span>
           </div>
           <Pagination :data="announcements" v-if="announcements && announcements.data.length && announcements.total > 20" class="mt-5"/>
       </template>

       <NothingFound v-else>
            <BaseButton @click="showCreateDrawer = true" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2">
                <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                {{ __('Add Announcement') }}
            </BaseButton>
       </NothingFound>

        <CreateAnnouncement :show="showCreateDrawer" @close-drawer="showCreateDrawer = false"/>
        <EditAnnouncement :show="showEditDrawer" @close-drawer="showEditDrawer = false" :announcement="editAnnouncement"/>
    </AppLayout>
</template>

<script>
import CreateAnnouncement from "./Create.vue";
import EditAnnouncement from "./Edit.vue";
import CardSkeleton from "@/Shared/Skeleton/CardSkeleton.vue";

export default {
    components: {
        CreateAnnouncement,
        EditAnnouncement,
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
    },
};
</script>

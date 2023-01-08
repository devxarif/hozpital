<template>

    <Head :title="__('Bed')" />
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
                            class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">Bed</a>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="mb-4 flex justify-between">
            <h2 class="text-3xl font-semibold leading-7 text-gray-900 dark:text-gray-200 sm:text-3xl sm:truncate">
                {{ __('Bed') }}
            </h2>

            <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                <button @click="showCreateDrawer = true" type="button" class="w-1/2 text-white bg-blue-600 hover:bg-blue-700 font-medium inline-flex items-center justify-center rounded-full text-sm px-3 py-2 text-center sm:w-auto focus:outline-none">
                    <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                   {{ __('Add Bed') }}
                </button>
                <a href="#"
                    class="w-1/2 text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto focus:outline-none">
                    <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Export
                </a>
            </div>
        </div>

        <div>
            <div class="sm:hidden">
                <label for="tabs" class="sr-only">Select a tab</label>
                <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
                <select id="tabs" name="tabs" class="block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                <option>Applied</option>

                <option>Phone Screening</option>

                <option selected>Interview</option>

                <option>Offer</option>

                <option>Disqualified</option>
                </select>
            </div>
            <div class="hidden sm:block">
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <button type="button" @click="changeTab('all')" :class="['whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', currentTab == 'all' ? 'border-indigo-500 text-indigo-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            All
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="currentTab == 'all' ? 'bg-indigo-100 text-indigo-600':'bg-gray-100 text-gray-900'">
                                52
                            </span>
                        </button>

                        <button v-for="bed_type in bed_types" :key="bed_type.id" type="button" @click="changeTab(bed_type.slug)"  :class="['whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', currentTab == bed_type.slug ? 'border-indigo-500 text-indigo-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            {{ bed_type.name }}
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="currentTab == bed_type.slug ? 'bg-indigo-100 text-indigo-600':'bg-gray-100 text-gray-900'">
                                {{ bed_type.beds_count }}
                            </span>
                        </button>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Body Part  -->
        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4 mt-5">
            <span v-for="bed in beds.data" :key="bed.id" class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="flex flex-wrap justify-between items-start">
                    <div class="relative mb-5">
                        <span>
                            <img class="w-16 h-16 rounded object-cover" alt="Figma logo" :src="bed.image">
                        </span>
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
                                    <a href="javascript:void(0)" @click.prevent="editData(bed)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                        <font-awesome-icon icon="fa-solid fa-pen-to-square" class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500"/>
                                        Edit
                                    </a>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <a href="javascript:void(0)" @click.prevent="editData(bed)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                        <font-awesome-icon icon="fa-solid fa-eye" class="mr-3 h-5 w-5 text-sky-500 group-hover:text-sky-500"/>
                                        Details
                                    </a>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <a href="javascript:void(0)" @click.prevent="deleteData(bed.id)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                        <font-awesome-icon icon="fa-solid fa-trash-can" class="mr-3 h-5 w-5 text-red-500 group-hover:text-red-500"/>
                                        Delete
                                    </a>
                                </MenuItem>
                                </div>
                            </MenuItems>
                        </transition>
                    </Menu>
                </div>
                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ bed.name }}</h2>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    {{ bed.description }}
                </p>
            </span>
        </div>

        <Pagination :data="beds" v-if="beds && beds.data.length" class="mt-5"/>

        <CreateBed :show="showCreateDrawer" @close-drawer="showCreateDrawer = false" :floors="floors"/>
        <EditBed :show="showEditBed" @close-drawer="showEditBed = false" :bed="editBed" :floors="floors"/>
    </AppLayout>
</template>

<script>
import CreateBed from "./Create.vue";
import EditBed from "./Edit.vue";
import Pagination from "@/Shared/Pagination.vue";

export default {
    components: {
        Pagination,
        CreateBed,
        EditBed,
    },
    props: {
        beds:{
            type: Array,
            default: () => []
        },
        bed_types:{
            type: Array,
            default: () => []
        },
        floors: {
            type: Array,
            default: () => []
        }
    },
    data() {
        return {
            showCreateDrawer: false,
            showEditBed: false,
            editBed: '',

            currentTab: "all",
            beds: this.beds,

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
                    this.$inertia.delete(route("admin.bed.destroy", id));
                    this.changeTab(this.currentTab);
                }
            });
        },
        editData(bed){
            this.showEditBed = true
            this.editBed = bed
        },
        async changeTab(tab) {
            this.currentTab = tab;
            let response = await axios.get(
                route("admin.bedtype.bed", {
                    type: tab,
                })
            );

            this.beds = response.data;
        },
    },
    mounted() {
    },
};
</script>

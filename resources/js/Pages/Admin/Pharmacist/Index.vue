<template>

    <Head :title="__('Doctor')" />
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
                            class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">Pharmacist</a>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="mb-4 flex justify-between">
            <h2 class="text-3xl font-semibold leading-7 text-gray-900 dark:text-gray-200 sm:text-3xl sm:truncate">
                {{ __('Pharmacist') }}
            </h2>

            <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                <div class="ml-6 hidden items-center rounded-lg bg-gray-100 p-0.5 sm:flex">
                    <button @click="changeViewType('table')" type="button" class="rounded-md p-1.5 focus:outline-none text-gray-600 hover:bg-white hover:shadow-sm shadow-sm" :class="viewType == 'table' ? 'bg-white':''">
                        <svg class="h-5 w-5" x-description="Heroicon name: mini/bars-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M2 3.75A.75.75 0 012.75 3h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 3.75zm0 4.167a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75zm0 4.166a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75zm0 4.167a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Use list view</span>
                    </button>
                    <button @click="changeViewType('card')" type="button" class="rounded-md p-1.5 focus:outline-none ml-0.5 text-gray-600 hover:bg-white hover:shadow-sm shadow-sm" :class="viewType == 'card' ? 'bg-white':''">
                        <svg class="h-5 w-5" x-description="Heroicon name: mini/squares-2x2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M4.25 2A2.25 2.25 0 002 4.25v2.5A2.25 2.25 0 004.25 9h2.5A2.25 2.25 0 009 6.75v-2.5A2.25 2.25 0 006.75 2h-2.5zm0 9A2.25 2.25 0 002 13.25v2.5A2.25 2.25 0 004.25 18h2.5A2.25 2.25 0 009 15.75v-2.5A2.25 2.25 0 006.75 11h-2.5zm9-9A2.25 2.25 0 0011 4.25v2.5A2.25 2.25 0 0013.25 9h2.5A2.25 2.25 0 0018 6.75v-2.5A2.25 2.25 0 0015.75 2h-2.5zm0 9A2.25 2.25 0 0011 13.25v2.5A2.25 2.25 0 0013.25 18h2.5A2.25 2.25 0 0018 15.75v-2.5A2.25 2.25 0 0015.75 11h-2.5z" clip-rule="evenodd"></path>
                            </svg>
                        <span class="sr-only">Use grid view</span>
                    </button>
                </div>
                <BaseButton v-if="filter.keyword && filter.keyword.length" as="link" :href="route('admin.pharmacist.index')" class="text-white bg-red-600 hover:bg-red-700 px-3 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Clear Filter
                </BaseButton>

                <BaseButton @click="toggleFilter" class="text-whittext-gray-900 bg-white border border-gray-300 hover:bg-gray-100 px-3 py-2">
                    <svg class="mr-2 h-6 w-6" stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                    {{ showFilter ? 'Hide Filter':'Filter' }}
                </BaseButton>
                <Menu as="div" class="relative inline-block text-left">
                    <div>
                        <MenuButton class="flex items-center rounded-lg text-gray-400 hover:text-gray-600 focus:outline-none">
                            <span class="sr-only">Open options</span>
                            <button href="#" class="w-1/2 text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto focus:outline-none">
                                <svg class="mr-2 h-6 w-6" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                Export
                            </button>
                        </MenuButton>
                    </div>

                    <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                        <MenuItems class="absolute right-0 z-10 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <div class="py-1 text-sm">
                                <MenuItem v-slot="{ active }">
                                    <a :href="route('admin.pharmacist.export', 'pdf')" target="_blank" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                        <font-awesome-icon icon="fa-solid fa-file-pdf" class="h-6 w-6 mr-2 text-red-500 group-hover:text-red-500"/>
                                        As PDF
                                    </a>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <a :href="route('admin.pharmacist.export', 'csv')" target="_blank" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                        <font-awesome-icon icon="fa-solid fa-file-csv" class="h-6 w-6 mr-2 text-blue-500 group-hover:text-blue-500"/>
                                        As CSV
                                    </a>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <a :href="route('admin.pharmacist.export', 'xlsx')" target="_blank" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                        <font-awesome-icon icon="fa-solid fa-file-excel" class="h-6 w-6 mr-2 text-green-500 group-hover:text-green-500"/>
                                        As Excel
                                    </a>
                                </MenuItem>
                            </div>
                        </MenuItems>
                    </transition>
                </Menu>
                <BaseButton @click="showCreateDrawer = true" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2.5">
                    <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                   {{ __('Add Pharmacist') }}
                </BaseButton>
            </div>
        </div>

        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-100" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <div v-if="showFilter" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 xl:grid-cols-6 gap-5 mb-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 items-center p-4">
                <div>
                    <label for="keyword" class="block text-sm font-medium text-gray-700">{{ __('Search') }}</label>
                    <div class="mt-1">
                        <input v-model="filterForm.keyword" type="text" id="keyword" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5" placeholder="Pharmacist name, email">
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

        <!-- Body Part  -->
        <CardSkeleton :show="loading" v-if="loading"/>

        <!-- Card View  -->
       <template v-else-if="!loading && pharmacists && pharmacists.data.length && viewType == 'card'">
            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                <span v-for="pharmacist in pharmacists.data" :key="pharmacist.id" class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <div class="flex flex-wrap justify-between items-start">
                        <div class="relative mb-5">
                            <span>
                                <img class="w-16 h-16 rounded object-cover" alt="image" :src="pharmacist.avatar">
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
                                        <a href="javascript:void(0)" @click.prevent="editData(pharmacist)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                            <font-awesome-icon icon="fa-solid fa-pen-to-square" class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500"/>
                                            Edit
                                        </a>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <a href="javascript:void(0)" @click.prevent="editData(pharmacist)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                            <font-awesome-icon icon="fa-solid fa-eye" class="mr-3 h-5 w-5 text-sky-500 group-hover:text-sky-500"/>
                                            Details
                                        </a>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <a href="javascript:void(0)" @click.prevent="deleteData(pharmacist.id)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                            <font-awesome-icon icon="fa-solid fa-trash-can" class="mr-3 h-5 w-5 text-red-500 group-hover:text-red-500"/>
                                            Delete
                                        </a>
                                    </MenuItem>
                                    </div>
                                </MenuItems>
                            </transition>
                        </Menu>
                    </div>
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ pharmacist.user?.name ?? '-' }}</h2>
                    <h6 class="my-1 text-sm font-bold tracking-tight text-gray-900 dark:text-white">{{ pharmacist.user.email ?? '-' }}</h6>
                </span>
            </div>
            <Pagination :data="pharmacists" v-if="pharmacists && pharmacists.data.length && pharmacists.total > 20" class="mt-5"/>
       </template>

        <!-- Table View  -->
        <div class="flex flex-col mb-5 shadow-lg" v-else-if="!loading && pharmacists && pharmacists.data.length && viewType == 'table'">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="w-full divide-y divide-gray-300 table-fixed">
                            <thead class="bg-gray-50">
                            <tr class="divide-x divide-gray-200">
                                <th class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                                <th class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Email</th>
                                <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 break-words">Phone</th>
                                <th width="80px" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-6">Action</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr v-for="pharmacist in pharmacists.data" :key="pharmacist.id" class="divide-x divide-gray-200">
                                    <td class="py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                        <div class="flex items-center" v-if="pharmacist && pharmacist.user">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img class="h-10 w-10 rounded-md" :src="pharmacist.user.avatar_url" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="font-medium text-gray-900">{{ pharmacist.user.name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-4 text-sm text-gray-500 break-all">
                                        {{ pharmacist.user.email ?? 'No email entry' }}
                                    </td>
                                    <td class="p-4 text-sm text-gray-500 break-all">
                                        {{ pharmacist.user.phone ?? 'No phone entry'}}
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
                                                        <a href="javascript:void(0)" @click.prevent="editData(pharmacist)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                            <font-awesome-icon icon="fa-solid fa-pen-to-square" class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500"/>
                                                            Edit
                                                        </a>
                                                    </MenuItem>
                                                    <MenuItem v-slot="{ active }">
                                                        <a href="javascript:void(0)" @click.prevent="editData(pharmacist)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                            <font-awesome-icon icon="fa-solid fa-eye" class="mr-3 h-5 w-5 text-sky-500 group-hover:text-sky-500"/>
                                                            Details
                                                        </a>
                                                    </MenuItem>
                                                    <MenuItem v-slot="{ active }">
                                                        <a href="javascript:void(0)" @click.prevent="deleteData(pharmacist.id)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
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
                        <Pagination :data="pharmacists" v-if="pharmacists && pharmacists.data.length && pharmacists.total > 20"/>
                    </div>
                </div>
            </div>
        </div>

        <NothingFound v-else>
            <BaseButton @click="showCreateDrawer = true" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2">
                <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                {{ __('Add Pharmacist') }}
            </BaseButton>
       </NothingFound>

        <CreatePharmacist v-show="showCreateDrawer" :show="showCreateDrawer" @close-drawer="showCreateDrawer = false"/>
        <EditPharmacist v-show="showEditDrawer" :show="showEditDrawer" @close-drawer="showEditDrawer = false" :pharmacist="editPharmacist"/>
    </AppLayout>
</template>

<script>
    import CreatePharmacist from "./Create.vue";
    import EditPharmacist from "./Edit.vue";
    import CardSkeleton from "@/Shared/Skeleton/CardSkeleton.vue";

    export default {
        components: {
            CreatePharmacist,
            EditPharmacist,
            CardSkeleton,

        },
        props: {
            pharmacists:{
                type: Array,
                default: () => []
            },
            filter:{
                type: Array,
                default: () => []
            },
        },
        data() {
            return {
                viewType: 'table',
                showCreateDrawer: false,
                showEditDrawer: false,
                editPharmacist: '',

                showFilter: false,
                loading: false,

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
                        this.$inertia.delete(route("admin.pharmacist.destroy", id));
                    }
                });
            },
            editData(data){
                this.showEditDrawer = true
                this.editPharmacist = data
            },
            filterData(){
                this.loading = true
                this.filterForm.get(route('admin.pharmacist.index'), {
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
                localStorage.setItem("adminPharmacist", this.showFilter);
            },
            changeViewType(type){
                this.viewType = type
                localStorage.setItem("adminPharmacistView", this.viewType);
            },
        },
        created() {
            this.showFilter = localStorage.getItem("adminPharmacist") == "true" ? true: false;
            this.viewType = localStorage.getItem("adminPharmacistView") == "card" ? 'card': 'table';
        },
    };
</script>

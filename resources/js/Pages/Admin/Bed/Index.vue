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
                <BaseButton v-if="filter.keyword || filter.bed_type || filter.bed_floor || filter.status" as="link" :href="route('admin.bed.index')" class="text-white bg-red-600 hover:bg-red-700 px-3 py-2">
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
                                <a href="javascript:void(0)" @click.prevent="editData(department)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                    <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                                    As PDF
                                </a>
                            </MenuItem>
                            <MenuItem v-slot="{ active }">
                                <a href="javascript:void(0)" @click.prevent="editData(department)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                    <font-awesome-icon icon="fa-solid fa-trash-can" class="h-4 w-4 mr-2 "/>
                                    As Excel
                                </a>
                            </MenuItem>
                            <MenuItem v-slot="{ active }">
                                <a href="javascript:void(0)" @click.prevent="editData(department)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                    <font-awesome-icon icon="fa-solid fa-trash-can" class="h-4 w-4 mr-2 "/>
                                    As CSV
                                </a>
                            </MenuItem>
                            </div>
                        </MenuItems>
                    </transition>
                </Menu>
                <BaseButton @click="showCreateDrawer = true" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2.5">
                    <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                   {{ __('Add Bed') }}
                </BaseButton>
            </div>
        </div>

        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-100" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <div v-if="showFilter" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 xl:grid-cols-6 gap-5 mb-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 items-center p-4">
                <div>
                    <label for="keyword" class="block text-sm font-medium text-gray-700">{{ __('Search') }}</label>
                    <div class="mt-1">
                        <input v-model="filterForm.keyword" type="text" id="keyword" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5" placeholder="Bed number, charge">
                    </div>
                </div>
                <div>
                    <label for="admin_bed_type" class="block text-sm font-medium text-gray-700">{{ __('Bed Type') }}</label>
                    <div class="mt-1">
                        <Multiselect id="admin_bed_type" :close-on-select="true" :can-clear="true"
                            :searchable="true" v-model="filterForm.bed_type" :create-option="false"
                            placeholder="Bed Type" :options="bed_types.map(item => ({
                                value: item.id, label: item.name
                            }))"  />
                    </div>
                </div>
                <div>
                    <label for="admin_bed_floor" class="block text-sm font-medium text-gray-700">{{ __('Floor') }}</label>
                    <div class="mt-1">
                        <Multiselect id="admin_bed_floor" :close-on-select="true" :can-clear="true"
                            :searchable="true" v-model="filterForm.bed_floor" :create-option="false"
                            placeholder="Floor" :options="floors.map(item => ({
                                value: item.id, label: item.name
                            }))"  />
                    </div>
                </div>
                <div>
                    <label for="admin_bed_status" class="block text-sm font-medium text-gray-700">{{ __('Status') }}</label>
                    <div class="mt-1">
                        <Multiselect id="admin_bed_status" :close-on-select="true" :can-clear="true"
                            :searchable="false" v-model="filterForm.status" :create-option="false"
                            placeholder="Status" :options="[{ value: 'alloted', label: 'Alloted' },{ value: 'unalloted', label: 'Unalloted' },]"  />
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
                        <button type="button" @click="changeTab('all')" :class="['whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', currentTab == 'all' ? 'border-indigo-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            All
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="currentTab == 'all' ? 'bg-indigo-100 text-blue-600':'bg-gray-100 text-gray-900'">
                                {{ beds.total }}
                            </span>
                        </button>

                        <button v-for="bed_type in bed_types" :key="bed_type.id" type="button" @click="changeTab(bed_type.slug)"  :class="['whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', currentTab == bed_type.slug ? 'border-indigo-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            {{ bed_type.name }}
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="currentTab == bed_type.slug ? 'bg-indigo-100 text-blue-600':'bg-gray-100 text-gray-900'">
                                {{ bed_type.beds_count }}
                            </span>
                        </button>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Body Part  -->
        <CardSkeleton :show="loading" v-if="loading"/>

        <template v-else-if="!loading && beds && beds.data.length">
            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4 mt-5">
                <span v-for="bed in beds.data" :key="bed.id" class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <div class="flex flex-wrap justify-between items-start">
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ bed.bed_type?.name ?? 'aa' }}</h2>

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
                    <h2 class="my-1 font-bold text-lg tracking-tight text-gray-900 dark:text-white">Bed Number: {{ bed.number }}</h2>
                    <h6 class="my-1 font-bold tracking-tight text-gray-900 dark:text-white" v-if="bed.floor">{{ bed.floor?.name ?? '' }}</h6>
                    <h6 class="my-1 font-bold tracking-tight text-gray-900 dark:text-white" v-if="bed.charge"><span class="text-sm">Charge</span>: $ {{ bed.charge }}</h6>
                    <span class="text-xs font-semibold px-2 py-1 rounded bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900 capitalize">
                        {{ bed.status }}
                    </span>
                    <p class="my-3 font-normal text-gray-700 dark:text-gray-400">
                        {{ bed.description }}
                    </p>
                </span>
            </div>
            <Pagination :data="beds" v-if="beds && beds.data.length && beds.total > 20" class="mt-5"/>
        </template>

        <NothingFound v-else>
            <BaseButton @click="showCreateDrawer = true" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2">
                <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                {{ __('Add Bed') }}
            </BaseButton>
       </NothingFound>

        <CreateBed :show="showCreateDrawer" @close-drawer="closeCreateDrawer"/>
        <EditBed :show="showEditBed" @close-drawer="closeEditDrawer" :bed="editBed"/>
    </AppLayout>
</template>

<script>
    import CreateBed from "./Create.vue";
    import EditBed from "./Edit.vue";
    import CardSkeleton from "@/Shared/Skeleton/CardSkeleton.vue";

    export default {
        components: {
            CreateBed,
            EditBed,
            CardSkeleton,
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
            },
            filter:{
                type: Array,
                default: () => []
            },
        },
        data() {
            return {
                showCreateDrawer: false,
                showEditBed: false,
                editBed: '',

                currentTab: "all",
                beds: this.beds,

                showFilter: false,
                loading: false,

                filterForm: this.$inertia.form({
                    keyword: this.filter.keyword ?? '',
                    bed_type: this.filter.bed_type ?? '',
                    bed_floor: this.filter.bed_floor ?? '',
                    status: this.filter.status ?? '',
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
            filterData(){
                this.loading = true
                this.filterForm.get(route('admin.bed.index'), {
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
                localStorage.setItem("adminBed", this.showFilter);
            },
            closeCreateDrawer(freeze){
                if(!freeze){
                    this.showCreateDrawer = false
                }else{
                    this.showCreateDrawer = true
                }
            },
            closeEditDrawer(freeze){
                if(!freeze){
                    this.showEditDoctor = false
                }else{
                    this.showEditDoctor = true
                }
            },
        },
        created() {
            this.showFilter = localStorage.getItem("adminBed") == "true" ? true: false;
        },
    };
</script>

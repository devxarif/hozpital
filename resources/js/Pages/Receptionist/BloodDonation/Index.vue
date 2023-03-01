<template>
    <AppLayout title="Blood Donation">

        <!-- Header Part  -->
        <Breadcrumb>
            <BreadcrumbLink title="Patient"/>
        </Breadcrumb>
        <nav class="flex mb-2" >
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
                            class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">Blood Donation</a>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="mb-4 flex justify-between">
            <h2 class="text-3xl font-semibold leading-7 text-gray-900  sm:text-3xl sm:truncate">
                {{ __('Blood Donation') }}
            </h2>

            <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                <BaseButton v-if="filter.keyword && filter.keyword.length" as="link" :href="route('receptionist.bloodDonation.index')" class="text-white bg-red-600 hover:bg-red-700 px-3 py-2">
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
                   {{ __('Add Blood Donation') }}
                </BaseButton>
            </div>
        </div>

        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-100" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <div v-if="showFilter" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 xl:grid-cols-6 gap-5 mb-4 bg-white rounded-lg shadow-xs  items-center p-4">
                <div>
                    <label for="keyword" class="block text-sm font-medium text-gray-700">{{ __('Search') }}</label>
                    <div class="mt-1">
                        <input v-model="filterForm.keyword" type="text" id="keyword" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5" placeholder="Donor name, email, phone">
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

       <template v-else-if="!loading && blood_donations && blood_donations.data.length">
            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                <span v-for="blood_donation in blood_donations.data" :key="blood_donation.id" class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100   ">
                    <div class="flex flex-wrap justify-between items-start">
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{ blood_donation.blood_donor?.name }}</h2>

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
                                        <a href="javascript:void(0)" @click.prevent="editData(blood_donation)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                            <font-awesome-icon icon="fa-solid fa-pen-to-square" class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500"/>
                                            Edit
                                        </a>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <a href="javascript:void(0)" @click.prevent="editData(blood_donation)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                            <font-awesome-icon icon="fa-solid fa-eye" class="mr-3 h-5 w-5 text-sky-500 group-hover:text-sky-500"/>
                                            Details
                                        </a>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <a href="javascript:void(0)" @click.prevent="deleteData(blood_donation.id)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                            <font-awesome-icon icon="fa-solid fa-trash-can" class="mr-3 h-5 w-5 text-red-500 group-hover:text-red-500"/>
                                            Delete
                                        </a>
                                    </MenuItem>
                                    </div>
                                </MenuItems>
                            </transition>
                        </Menu>
                    </div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{ blood_donation.blood_donor?.blood_group ?? '' }}</h2>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{ blood_donation.bags }} bags</h2>
                </span>
            </div>
            <Pagination :data="blood_donations" v-if="blood_donations && blood_donations.data.length && blood_donations.total > 20" class="mt-5"/>
       </template>

        <NothingFound v-else>
            <BaseButton @click="showCreateDrawer = true" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2">
                <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                {{ __('Add Bed Donation') }}
            </BaseButton>
       </NothingFound>

        <CreateBloodDonation :show="showCreateDrawer" @close-drawer="showCreateDrawer = false"/>
        <EditBloodDonation :show="showEditDrawer" @close-drawer="showEditDrawer = false" :blood_donation="editBloodDonation"/>
    </AppLayout>
</template>

<script>
    import CreateBloodDonation from "./Create.vue";
    import EditBloodDonation from "./Edit.vue";
    import CardSkeleton from "@/Shared/Skeleton/CardSkeleton.vue";

    export default {
        components: {
            CreateBloodDonation,
            EditBloodDonation,
            CardSkeleton,

        },
        props: {
            blood_donations:{
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
                showEditDrawer: false,
                editBloodDonation: '',

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
                        this.$inertia.delete(route("receptionist.bloodDonation.destroy", id));
                    }
                });
            },
            editData(blood_donation){
                this.showEditDrawer = true
                this.editBloodDonation = blood_donation
            },
            filterData(){
                this.loading = true
                this.filterForm.get(route('receptionist.bloodDonation.index'), {
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
                localStorage.setItem("receptionistBloodDonation", this.showFilter);
            },
        },
        created() {
            this.showFilter = localStorage.getItem("receptionistBloodDonation") == "true" ? true: false;
        },
    };
</script>

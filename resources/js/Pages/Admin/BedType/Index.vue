<template>

    <Head :title="__('Bed Type')" />
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
                            class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">Bed Type</a>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="mb-4 flex justify-between">
            <h2 class="text-3xl font-semibold leading-7 text-gray-900 dark:text-gray-200 sm:text-3xl sm:truncate">
                {{ __('Bed Type') }}
            </h2>

            <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                <button @click="showCreateDrawer = true" type="button" class="w-1/2 text-white bg-blue-600 hover:bg-blue-700 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto focus:outline-none">
                    <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                   {{ __('Add Bed Type') }}
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

        <!-- Body Part  -->
        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            <span v-for="bed_type in bed_types.data" :key="bed_type.id" class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="flex flex-wrap justify-between items-start">
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ bed_type.name }}</h2>
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
                                    <a href="javascript:void(0)" @click.prevent="editData(bed_type)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                        <font-awesome-icon icon="fa-solid fa-pen-to-square" class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500"/>
                                        Edit
                                    </a>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <a href="javascript:void(0)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                        <font-awesome-icon icon="fa-solid fa-eye" class="mr-3 h-5 w-5 text-sky-500 group-hover:text-sky-500"/>
                                        Details
                                    </a>
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <a href="javascript:void(0)" @click.prevent="deleteData(bed_type.id)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                        <font-awesome-icon icon="fa-solid fa-trash-can" class="mr-3 h-5 w-5 text-red-500 group-hover:text-red-500"/>
                                        Delete
                                    </a>
                                </MenuItem>
                                </div>
                            </MenuItems>
                        </transition>
                    </Menu>
                </div>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    {{ bed_type.description }}
                </p>
            </span>
        </div>

        <Pagination :data="bed_types" v-if="bed_types && bed_types.data.length && bed_types.data.length > 20" class="mt-5"/>


        <CreateBedType :show="showCreateDrawer" @close-drawer="showCreateDrawer = false"/>
        <EditBedType :show="showEditBedType" @close-drawer="showEditBedType = false" :type="editBedType"/>
    </AppLayout>
</template>

<script>
    import CreateBedType from "./Create.vue";
    import EditBedType from "./Edit.vue";

    export default {
        components: {
            CreateBedType,
            EditBedType,
        },
        props: {
            bed_types:{
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
                showEditBedType: false,
                editBedType: '',

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
                        this.$inertia.delete(route("admin.bedType.destroy", id));
                    }
                });
            },
            editData(bed){
                this.showEditBedType = true
                this.editBedType = bed
            },
            filterData(){
                this.loading = true
                this.filterForm.get(route('admin.bedType.index'), {
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
                localStorage.setItem("adminBedType", this.showFilter);
            },
        },
        created() {
            this.showFilter = localStorage.getItem("adminBedType") == "true" ? true: false;
        },
    };
</script>

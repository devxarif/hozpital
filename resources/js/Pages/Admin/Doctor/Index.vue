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
                            class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">Doctor</a>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="mb-4 flex justify-between">
            <h2 class="text-3xl font-semibold leading-7 text-gray-900 dark:text-gray-200 sm:text-3xl sm:truncate">
                {{ __('Doctor') }}
            </h2>

            <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                <button @click="showCreateDrawer = true" type="button" class="w-1/2 text-white bg-blue-600 hover:bg-blue-700 font-medium inline-flex items-center justify-center rounded-full text-sm px-3 py-2 text-center sm:w-auto focus:outline-none">
                    <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                   {{ __('Add Doctor') }}
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
            <span v-for="doctor in doctors.data" :key="doctor.id" class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="flex flex-wrap justify-between items-start">
                    <div class="relative mb-5">
                        <span>
                            <img class="w-16 h-16 rounded object-cover" alt="Figma logo" :src="doctor.avatar">
                        </span>
                    </div>
                    <div class="flex gap-2">
                        <button type="button" class="focus:outline-none" @click.prevent="editData(doctor)">
                            <font-awesome-icon icon="fa-solid fa-pen-to-square" class="h-5 w-5 text-blue-500"/>
                        </button>
                        <button type="button" class="focus:outline-none">
                            <font-awesome-icon icon="fa-solid fa-eye" class=" h-5 w-5 text-pink-500"/>
                        </button>
                        <button type="button" class="focus:outline-none" @click.prevent="deleteData(doctor.id)">
                            <font-awesome-icon icon="fa-solid fa-trash-can" class=" h-5 w-5 text-red-500"/>
                        </button>
                    </div>

                </div>
                <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ doctor.user?.name ?? '-' }}</h2>
                <h6 class="my-1 text-sm font-bold tracking-tight text-gray-900 dark:text-white">{{ doctor.user.email ?? '-' }}</h6>
                <span class="text-xs font-semibold mr-2 px-2.5 py-0.5 rounded bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900">
                    {{ doctor.department.name ?? '-' }}
                </span>
            </span>
        </div>

        <Pagination :data="doctors" v-if="doctors && doctors.data.length" class="mt-5"/>

        <CreateDoctor :show="showCreateDrawer" @close-drawer="closeCreateDrawer"/>
        <EditDoctor :show="showEditDoctor" @close-drawer="closeEditDrawer" :doctor="editDoctor"/>
    </AppLayout>
</template>

<script>
    import CreateDoctor from "./Create.vue";
    import EditDoctor from "./Edit.vue";
    import Pagination from "@/Shared/Pagination.vue";

    import { library } from '@fortawesome/fontawesome-svg-core'
    import { faHome, } from '@fortawesome/free-solid-svg-icons'
    library.add(faHome)

    export default {
        components: {
            Pagination,
            CreateDoctor,
            EditDoctor,
            library
        },
        props: {
            doctors:{
                type: Array,
                default: () => []
            }
        },
        data() {
            return {
                showCreateDrawer: false,
                showEditDoctor: false,
                editDoctor: '',
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
                        this.$inertia.delete(route("admin.doctor.destroy", id));
                    }
                });
            },
            editData(data){
                this.showEditDoctor = true
                this.editDoctor = data
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
            }
        },
        mounted() {
        },
    };
</script>

<template>

    <Head :title="__('Feature List')" />

    <AppLayout>
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-3xl font-semibold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    {{ __('Features') }}
                </h2>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <a class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent font-medium text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition sm:text-sm rounded-full"
                    href="https://demo.cartify.dev/admin/products/create">
                    <span class="mr-3">
                        <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                            stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                    </span>
                    Add Product
                </a>
            </div>
        </div>
        <!-- component -->
        <div class="bg-white shadow sm:rounded-lg mt-6 -mx-4 sm:-mx-0 overflow-hidden">
            <div class=" rounded-lg bg-white   shadow-xs overflow-hidden mb-5">
                <div class="p-4">
                    <form class="py-3 grid gap-4 lg:gap-6 xl:gap-6 md:flex xl:flex">
                        <div class="flex-grow-0 md:flex-grow lg:flex-grow xl:flex-grow"><input
                                class="px-3 py-1  leading-5 rounded-md focus:border-gray-200 border-gray-200  focus:ring focus:ring-blue-300    border h-12 text-sm focus:outline-none block w-full bg-gray-100 border-transparent focus:bg-white"
                                type="search" name="search" placeholder="Search by product name"><button type="submit"
                                class="absolute right-0 top-0 mt-5 mr-1"></button></div>
                        <div class="flex-grow-0 md:flex-grow lg:flex-grow xl:flex-grow"><select
                                class="px-2 py-1  rounded-md form-select focus:border-gray-200 border-gray-200  focus:shadow-none focus:ring focus:ring-blue-300    leading-5 border h-12 text-sm focus:outline-none block w-full bg-gray-100 border-transparent focus:bg-white">
                                <option value="All" hidden="">Category</option>
                                <option value="Fish &amp; Meat">Fish &amp; Meat</option>
                            </select></div>
                        <div class="flex-grow-0 md:flex-grow lg:flex-grow xl:flex-grow"><select
                                class="px-2 py-1  rounded-md form-select focus:border-gray-200 border-gray-200  focus:shadow-none focus:ring focus:ring-blue-300    leading-5 border h-12 text-sm focus:outline-none block w-full bg-gray-100 border-transparent focus:bg-white">
                                <option value="All" hidden="">Price</option>
                                <option value="Low">Low to High</option>
                                <option value="High">High to Low</option>
                            </select></div>
                        <div class="w-full md:w-56 lg:w-56 xl:w-56"><button
                                class="align-bottom inline-flex items-center justify-center cursor-pointer leading-5 transition-colors duration-150 font-medium focus:outline-none px-4 py-2 text-sm text-white bg-blue-500 border border-transparent active:bg-blue-600 hover:bg-blue-600 focus:ring focus:ring-purple-300 w-full rounded-md h-12"
                                type="button"><span class="mr-3">
                                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                        stroke-linecap="round" stroke-linejoin="round" class="text-white stroke-current"
                                        height="16" width="16" xmlns="http://www.w3.org/2000/svg">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                </span>Filter</button></div>
                    </form>
                </div>
            </div>
            <div class="px-4 py-6 sm:p-6">
                <div class="overflow-x-auto -mx-4 -my-6 sm:-m-6">
                    <div class="align-middle inline-block min-w-full">
                        <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-slate-50">
                                    <tr>

                                        <th scope="col" width="30%"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Title') }}
                                        </th>
                                        <th scope="col" width="60%"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Description') }}
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Action') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <template v-if="features && features.data.length">
                                        <tr class="relative hover:bg-slate-50" v-for="(feature,index) in features.data" :key="index">
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">

                                                <span class="text-gray-500">{{ feature.title }}</span>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <small>{{ feature.description }}</small>
                                            </td>
                                            <td
                                                class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-right text-gray-900 tabular-nums">
                                                <div class="flex">
                                                    <div class="mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24">
                                                            <path
                                                                d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z" />
                                                        </svg>
                                                    </div>
                                                    <div class=" mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24">
                                                            <path
                                                                d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                                        </svg>
                                                    </div>

                                                    <!-- <button @click="editData(feature)" v-tooltip="__('Edit')"
                                                        class="btn btn-sm pl-0">
                                                        <EditIcon />
                                                    </button>
                                                    <button @click="deleteData(feature.id)" v-tooltip="__('Delete')"
                                                        class="btn btn-sm">
                                                        <DeleteIcon />
                                                    </button> -->
                                                </div>
                                            </td>
                                        </tr>
                                    </template>
                                    <tr v-else>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-center text-base text-gray-600 font-medium"
                                            colspan="20">
                                            <NoDataFound />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <Pagination :data="features" v-if="features && features.data.length"/>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
    <!-- <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Feature List') }}</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-valign-middle">
                        <thead>
                            <tr>
                                <th width="30%">{{ __('Title') }}</th>
                                <th width="60%">{{ __('Description') }}</th>
                                <th width="10%">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-if="features && features.data.length">
                                <tr v-for="(feature,index) in features.data" :key="index">
                                    <td>{{ feature.title }}</td>
                                    <td>{{ feature.description }}</td>
                                    <td class="d-flex">
                                        <button @click="editData(feature)" v-tooltip="__('Edit')"
                                            class="btn btn-sm pl-0">
                                            <EditIcon />
                                        </button>
                                        <button @click="deleteData(feature.id)" v-tooltip="__('Delete')"
                                            class="btn btn-sm">
                                            <DeleteIcon />
                                        </button>
                                    </td>
                                </tr>
                            </template>
                            <tr v-else>
                                <td colspan="5" class="text-center">
                                    <h6>{{ __('No Data Found') }}</h6>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <Pagination :data="features.links" />
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card mt-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span v-if="!isEditMode">{{ __('Feature Create') }}</span>
                        <span v-else>{{ __('Feature Edit') }}</span>
                    </div>
                </div>
                <div class="card-body">
                    <form @submit.prevent="saveData">
                        <div class="mb-3">
                            <Label :name="__('Title')" for="name" />
                            <input v-model="form.title" type="text" class="form-control"
                                :class="{'is-invalid':form.errors.title}" id="name" :placeholder="__('Title')">
                            <ErrorMessage :name="form.errors.title" />
                        </div>
                        <div class="mb-3">
                            <Label :name="__('Description')" />
                            <textarea v-model="form.description" rows="6" class="form-control"  :class="{'is-invalid':form.errors.description}"></textarea>
                            <ErrorMessage :name="form.errors.description"/>
                        </div>
                        <button :disabled="form.processing" type="submit" class="btn btn-primary">
                            <Loading v-if="form.processing" />
                            <span v-else>
                                <i class="fa-solid fa-check mr-1"></i>
                                {{ __('Save') }}
                            </span>
                        </button>
                        <button v-if="isEditMode" @click="cancelEdit" type="button" class="btn btn-danger ml-2">
                            <i class="fa-solid fa-times"></i>
                            {{ __('Cancel') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
</template>


<script>
import Pagination from "../../../Shared/Pagination.vue";

export default {
    props: {
        features: Object,
    },
    components: {
        Pagination,
    },
    data() {
        return {
            isEditMode: false,
            selectedId: null,

            form: this.$inertia.form({
                title: "",
                description: "",
            }),
        };
    },
    methods: {
        saveData() {
            this.isEditMode ? this.updateData() : this.createData();
        },
        createData() {
            this.form.post(route("features.store"), {
                onSuccess: () => this.form.reset(),
            });
        },
        editData(team) {
            this.isEditMode = true;
            this.selectedId = team.id;
            this.form.title = team.title;
            this.form.description = team.description;
        },
        cancelEdit() {
            this.isEditMode = false;
            this.form.reset();
        },
        updateData() {
            this.form.put(route("features.update", this.selectedId), {
                onSuccess: () => {
                    this.isEditMode = false;
                    this.form.reset();
                },
            });
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
                    this.$inertia.delete(route("features.destroy", id));
                }
            });
        },
    },
    mounted() {
        this.checkPagePermission("admin");
    },
};
</script>

<style scoped>
    .avatar-img {
        height: 60px;
        width: 60px;
        object-fit: cover;
    }

    .table-avatar {
        height: 25px;
        width: 25px;
        object-fit: cover;
        border-radius: 50%;
        display: inline;
    }
</style>

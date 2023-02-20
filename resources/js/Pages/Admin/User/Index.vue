<template>
    <Head :title="__('Admin List')"/>
    <AppLayout>
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-3xl font-semibold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Admin
                </h2>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <a @click="showCreateDrawer = true" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent font-medium text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition sm:text-sm rounded-full"
                    href="javascript:void(0)">
                    <span class="mr-3">
                        <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                            stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                    </span>
                    Add User
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
                                <option value="Fruits &amp; Vegetable">Fruits &amp; Vegetable</option>
                                <option value="Fresh Seafood">Fresh Seafood</option>
                                <option value="Cooking Essentials">Cooking Essentials</option>
                                <option value="Breakfast">Breakfast</option>
                                <option value="Drinks">Drinks</option>
                                <option value="Milk &amp; Dairy">Milk &amp; Dairy</option>
                                <option value="Organic Food">Organic Food</option>
                                <option value="Honey">Honey</option>
                                <option value="Sauces &amp; Pickles">Sauces &amp; Pickles</option>
                                <option value="Jam &amp; Jelly">Jam &amp; Jelly</option>
                                <option value="Snacks &amp; Instant">Snacks &amp; Instant</option>
                                <option value="Biscuits &amp; Cakes">Biscuits &amp; Cakes</option>
                                <option value="Household Tools">Household Tools</option>
                                <option value="Baby Care">Baby Care</option>
                                <option value="Pet Care">Pet Care</option>
                                <option value="Beauty &amp; Health">Beauty &amp; Health</option>
                                <option value="Sports &amp; Fitness">Sports &amp; Fitness</option>
                            </select></div>
                        <div class="flex-grow-0 md:flex-grow lg:flex-grow xl:flex-grow"><select
                                class="px-2 py-1  rounded-md form-select focus:border-gray-200 border-gray-200  focus:shadow-none focus:ring focus:ring-blue-300    leading-5 border h-12 text-sm focus:outline-none block w-full bg-gray-100 border-transparent focus:bg-white">
                                <option value="All" hidden="">Price</option>
                                <option value="Low">Low to High</option>
                                <option value="High">High to Low</option>
                            </select></div>
                        <div class="w-full md:w-56 lg:w-56 xl:w-56"><button
                                class="align-bottom inline-flex items-center justify-center cursor-pointer leading-5 transition-colors duration-150 font-medium focus:outline-none px-4 py-2 text-sm text-white bg-blue-500 border border-transparent active:bg-blue-600 hover:bg-blue-600 focus:ring focus:ring-purple-300 w-full rounded-full h-12"
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
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Name') }}
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Email') }}
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Role') }}
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Actions') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <template v-if="admins && admins.data.length">
                                        <tr class="relative hover:bg-slate-50" v-for="(user,index) in admins.data" :key="index">
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <Link :href="route('admins.show',user.id)">
                                                    <div class="flex items-center ">
                                                        <div class="mr-2">
                                                            <img class="w-6 h-6 rounded-full" :src="user.avatar_url"/>
                                                        </div>
                                                        <span class="text-gray-500" v-html="user.name"/>
                                                    </div>
                                                </Link>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <span class="text-gray-500" v-html="user.email"></span>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                Admin
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-right text-gray-900 tabular-nums">
                                                <div class="flex">
                                                    <div class="mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer" @click="editSelectedData(user)">
                                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24">
                                                            <path
                                                                d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z" />
                                                        </svg>
                                                    </div>
                                                    <div class="mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer" @click="deleteSelectedData(user.id)">
                                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24">
                                                            <path
                                                                d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                                        </svg>
                                                    </div>
                                                    <!-- <Link :href="route('admins.show',user.id)" v-tooltip="'Details'" class="btn btn-sm pl-0">
                                                        <EyeIcon/>
                                                    </Link>
                                                    <Link :href="route('admins.edit',user.id)" v-tooltip="'Edit'" class="btn btn-sm">
                                                        <EditIcon/>
                                                    </Link>
                                                    <button @click="deleteSelectedData(user.id)" v-tooltip="'Delete'" class="btn btn-sm">
                                                        <DeleteIcon/>
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

                            <Pagination :data="admins" v-if="admins && admins.data.length" />
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <CreateAdmin :show="showCreateDrawer" @close-drawer="showCreateDrawer = false"/>
        <EditAdmin :show="showEditDrawer" @close-drawer="showEditDrawer = false" :admin="editData"/>

    <!-- <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">{{ __('Admin List') }}</h3>
                        <div>
                            <Link :href="route('admins.create')" class="btn btn-primary">
                                <i class="fa-solid fa-plus"></i>
                                {{ __('Admin Create') }}
                            </Link>
                            <button class="btn btn-secondary ml-2" @click="filteringData">
                                <i class="fa-solid fa-filter"></i>
                                &nbsp;
                                <span v-if="!showFilter">{{ __('Show Filter') }}</span>
                                <span v-else>{{ __('Hide Filter') }}</span>
                            </button>
                            <Link :href="route('admins.index')" class="btn btn-danger ml-2" v-if="search && search.length">
                                <i class="fa-solid fa-times"></i>
                                {{ __('Clear') }}
                            </Link>
                        </div>
                    </div>
                </div>
                <div class="card-body border-bottom" v-if="showFilter">
                    <label>{{ __('Search') }}</label>
                    <input v-model="search" type="text" placeholder="Search.." class="form-control w-25">
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-valign-middle">
                        <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-if="admins && admins.data.length">
                                <tr v-for="(user,index) in admins.data" :key="index">
                                    <td>
                                        <Link :href="route('admins.show',user.id)">
                                            <img :src="user.avatar" alt="img"
                                            class="img-circle img-size-32 mr-2">
                                            <span v-html="user.name"></span>
                                        </Link>
                                    </td>
                                    <td>
                                        <span v-html="user.email"></span>
                                    </td>
                                    <td class="d-flex">
                                        <Link :href="route('admins.show',user.id)" v-tooltip="'Details'" class="btn btn-sm pl-0">
                                            <EyeIcon/>
                                        </Link>
                                        <Link :href="route('admins.edit',user.id)" v-tooltip="'Edit'" class="btn btn-sm">
                                            <EditIcon/>
                                        </Link>
                                        <button @click="deleteSelectedData(user.id)" v-tooltip="'Delete'" class="btn btn-sm">
                                            <DeleteIcon/>
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

                    <Pagination :data="admins" />
                </div>
            </div>
        </div>
    </div> -->
    </AppLayout>
</template>


<script>
import Pagination from "../../../Shared/Pagination.vue";
import debounce from "lodash/debounce";
import { Inertia } from "@inertiajs/inertia";
import CreateAdmin from "./Create.vue";
import EditAdmin from "./Edit.vue";

export default {
    props: {
        admins: Object,
        filters: Object || Array,
    },
    components: {
        Pagination,
        Inertia,
        CreateAdmin,
        EditAdmin
    },
    data() {
        return {
            search: this.filters.search,
            showFilter: false,

            showCreateDrawer: false,
            showEditDrawer: false,
            editData: '',

        };
    },
    methods: {
        deleteSelectedData(id) {
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
                    this.$inertia.delete(route("admins.destroy", id));
                }
            });
        },
        editSelectedData(data){
            this.editData = data
            this.showEditDrawer = true
        },
        filteringData() {
            this.showFilter = !this.showFilter;
            localStorage.setItem("adminUser", this.showFilter);
        },
    },
    watch: {
        search: debounce((value) => {
            Inertia.get(
                "admins",
                { search: value },
                {
                    preserveState: true,
                    replace: true,
                }
            );
        }, 500),
    },
    mounted() {
        this.checkPagePermission("admin");
        this.showFilter = localStorage.getItem("adminUser") == "true" ? true : false;
    },
};
</script>

<style scoped>
.avatar-img {
    height: 60px;
    width: 60px;
    object-fit: cover;
}
</style>

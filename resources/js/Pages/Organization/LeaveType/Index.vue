<template>
    <Head :title="__('Leave Type List')" />

    <AppLayout>
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-3xl font-semibold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    {{ __('Leave Type List') }}
                </h2>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <button type="button" @click="showCreateDrawer()" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent  font-medium text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition sm:text-sm rounded-full"
                    >
                    <span class="mr-3">
                        <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                            stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                    </span>
                    Add Leave Type
                </button>
            </div>
        </div>
        <!-- <div class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <svg class="mb-2 w-10 h-10 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 5a3 3 0 015-2.236A3 3 0 0114.83 6H16a2 2 0 110 4h-5V9a1 1 0 10-2 0v1H4a2 2 0 110-4h1.17C5.06 5.687 5 5.35 5 5zm4 1V5a1 1 0 10-1 1h1zm3 0a1 1 0 10-1-1v1h1z" clip-rule="evenodd"></path><path d="M9 11H3v5a2 2 0 002 2h4v-7zM11 18h4a2 2 0 002-2v-5h-6v7z"></path></svg>
            <a href="#">
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Need a help in Claim?</h5>
            </a>
            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Go to this step by step guideline process on how to certify for your weekly benefits:</p>
            <a href="#" class="inline-flex items-center text-blue-600 hover:underline">
                See our guideline
                <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"></path><path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"></path></svg>
            </a>
        </div> -->

        <div class="bg-white shadow sm:rounded-lg mt-6 -mx-4 sm:-mx-0 overflow-hidden">
            <div class=" rounded-lg bg-white dark:bg-gray-800  shadow-xs overflow-hidden mb-5">
                <div class="p-4">
                    <form class="py-3 grid gap-4 lg:gap-6 xl:gap-6 md:flex xl:flex">
                        <div class="flex-grow-0 md:flex-grow lg:flex-grow xl:flex-grow"><input
                                class="px-3 py-1 dark:text-gray-300 leading-5 rounded-md focus:border-gray-200 border-gray-200 dark:border-gray-600 focus:ring focus:ring-blue-300 dark:focus:border-gray-500 dark:focus:ring-gray-300 dark:bg-gray-700 border h-12 text-sm focus:outline-none block w-full bg-gray-100 border-transparent focus:bg-white"
                                type="search" name="search" placeholder="Search by product name"><button
                                type="submit" class="absolute right-0 top-0 mt-5 mr-1"></button></div>
                        <div class="flex-grow-0 md:flex-grow lg:flex-grow xl:flex-grow"><select
                                class="px-2 py-1 dark:text-gray-300 rounded-md form-select focus:border-gray-200 border-gray-200 dark:border-gray-600 focus:shadow-none focus:ring focus:ring-blue-300 dark:focus:border-gray-500 dark:focus:ring-gray-300 dark:bg-gray-700 leading-5 border h-12 text-sm focus:outline-none block w-full bg-gray-100 border-transparent focus:bg-white">
                                <option value="All" hidden="">Category</option>
                                <option value="Fish &amp; Meat">Fish &amp; Meat</option>
                            </select></div>
                        <div class="flex-grow-0 md:flex-grow lg:flex-grow xl:flex-grow"><select
                                class="px-2 py-1 dark:text-gray-300 rounded-md form-select focus:border-gray-200 border-gray-200 dark:border-gray-600 focus:shadow-none focus:ring focus:ring-blue-300 dark:focus:border-gray-500 dark:focus:ring-gray-300 dark:bg-gray-700 leading-5 border h-12 text-sm focus:outline-none block w-full bg-gray-100 border-transparent focus:bg-white">
                                <option value="All" hidden="">Price</option>
                                <option value="Low">Low to High</option>
                                <option value="High">High to Low</option>
                            </select></div>
                        <div class="w-full md:w-56 lg:w-56 xl:w-56"><button
                                class="align-bottom inline-flex items-center justify-center cursor-pointer leading-5 transition-colors duration-150 font-medium focus:outline-none px-4 py-2 text-sm text-white bg-blue-500 border border-transparent active:bg-blue-600 hover:bg-blue-600 focus:ring focus:ring-purple-300 w-full rounded-full h-12"
                                type="button"><span class="mr-3">
                                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="text-white stroke-current" height="16" width="16"
                                        xmlns="http://www.w3.org/2000/svg">
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
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider tabular-nums">
                                            {{ __('Leave Balance') }}
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider tabular-nums">
                                            {{ __('Options') }}
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Action') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <template v-if="leave_types && leave_types.data.length">
                                        <tr class="relative hover:bg-slate-50" v-for="(leave_type,index) in leave_types.data" :key="index">
                                            <td
                                                class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <span class="w-5 h-5 mr-2 bg-blue-700 rounded-full border-4" :style="{ borderColor: leave_type.color }"></span>
                                                {{ leave_type.name }}
                                            </td>

                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ leave_type.balance }} {{ pluralize(leave_type.balance, 'Day') }}
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <span v-if="leave_type.auto_approve" class="badge badge-pill badge-info mx-1">
                                                {{ __('Allow auto approve') }}
                                                </span>
                                                <span class="badge badge-pill mx-1" :class="leave_type.status ? 'badge-success':'badge-danger'">
                                                    <span v-if="leave_type.status">{{ __('Active') }}</span>
                                                    <span v-else>{{ __('Inactive') }}</span>
                                                </span>
                                            </td>
                                            <td
                                                class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-right text-gray-900 tabular-nums">
                                                <div class="flex">
                                                    <div @click="editData(leave_type)"
                                                        class="cursor-pointer mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24">
                                                            <path
                                                                d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z" />
                                                        </svg>
                                                    </div>
                                                    <div @click="deleteData(leave_type.id)"
                                                        class="cursor-pointer  mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24">
                                                            <path
                                                                d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                                        </svg>
                                                    </div>
                                                </div>

                                                <!-- <Link :href="route('organization.leaveTypes.edit',leave_type.id)" v-tooltip="'Edit'" class="btn btn-sm  pl-0">
                                            <EditIcon/>
                                        </Link>
                                        <button @click="deleteData(leave_type.id)" v-tooltip="'Delete'" class="btn btn-sm">
                                            <DeleteIcon/>
                                        </button> -->
                                            </td>
                                        </tr>
                                    </template>
                                    <!-- <tr v-else>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-center text-base text-gray-600 font-medium"
                                            colspan="20">
                                            <NoDataFound />
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>

                            <Pagination :data="leave_types" v-if="leave_types && leave_types.data.length" />
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>

    <CreateLeaveType v-if="isPermitCreateDrawer" :show="isShowCreateDrawer" @close-drawer="closeDrawer('create')"/>
    <EditLeaveType v-if="isPermitEditDrawer" :show="isShowEditDrawer" @close-drawer="closeDrawer('edit')" :leaveType="editLeaveType"/>
</template>


<script>
    import Pagination from "../../../Shared/Pagination.vue";
    import CreateLeaveType from "./Create.vue";
    import EditLeaveType from "./Edit.vue";

    export default {
        props: {
            leave_types: Array,
        },
        components: {
            Pagination,
            CreateLeaveType,
            EditLeaveType,
        },
        data(){
            return {
                isShowCreateDrawer: false,
                isShowEditDrawer: false,
                isPermitCreateDrawer: false,
                isPermitEditDrawer: false,
                editLeaveType: ''
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
                        this.$inertia.delete(
                            route("organization.leaveTypes.destroy", id)
                        );
                    }
                });
            },
            showCreateDrawer(){
                this.isPermitCreateDrawer = true
                setTimeout(() => {
                    this.isShowCreateDrawer = true
                }, 5);
            },
            closeDrawer(type){
                if (type == "create") {
                    this.isShowCreateDrawer = false
                    setTimeout(() => {
                        this.isPermitCreateDrawer = false
                    }, 500);
                }else{
                    this.isShowEditDrawer = false
                    setTimeout(() => {
                        this.isPermitEditDrawer = false
                    }, 500);
                }
            },
            editData(data){
                console.log(data)

                this.editLeaveType = data
                this.isPermitEditDrawer = true
                setTimeout(() => {
                    this.isShowEditDrawer = true
                }, 5);
            }
        },
        mounted() {
            this.checkPagePermission("owner");
        },
    };
</script>

<style scoped>
    .avatar-img {
        height: 60px;
        width: 60px;
        object-fit: cover;
    }

    .custom-color-box {
        margin-left: 30px;
        width: 10px;
        height: 10px;
        background-color: rgb(255, 8, 51);
    }

    .leave-type-color {
        border-radius: 30px;
        padding: 2px 5px;
            font-weight: 500;
        color: #fff;
    }
</style>

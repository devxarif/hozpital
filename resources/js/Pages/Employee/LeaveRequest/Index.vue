<template>

    <Head :title="__('Leave Requests')" />

    <AppLayout>
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-3xl font-semibold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Leave Request
                </h2>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <button @click="showCreateDrawer()" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent font-medium text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition sm:text-sm rounded-full"
                    href="https://demo.cartify.dev/admin/products/create">
                    <span class="mr-3">
                        <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                            stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                    </span>
                    Add Request
                </button>
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
                                            {{ __('Employee') }}
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Leave Type') }}
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider tabular-nums">
                                            {{ __('Team') }}
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider tabular-nums">
                                            {{ __('Date') }}
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider tabular-nums">
                                            {{ __('Status') }}
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Action') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <template v-if="leaveRequests && leaveRequests.data.length">
                                        <tr class="relative hover:bg-slate-50" v-for="(leaveRequest,index) in leaveRequests.data" :key="index">
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <Link :href="route('organization.employees.show',leaveRequest.employee.user_id)" class="relative">
                                                    <div class="flex items-center ">
                                                        <div class="mr-2">
                                                            <img class="w-6 h-6 rounded-full" :src="leaveRequest.employee.user.avatar"/>
                                                        </div>
                                                        <span class="text-gray-500" v-html="leaveRequest.employee.user.name"/>
                                                    </div>
                                                    <!-- <span class="absolute top-1 right-1">
                                                        <Popper arrow :hover="true" :content="leaveRequest.employee.user.name" >
                                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                                        </Popper>
                                                    </span> -->
                                                </Link>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <span :style="{ background: leaveRequest.leave_type.color, border: '2px solid '+leaveRequest.leave_type.color }" class="leave-type-color">
                                                    {{ leaveRequest.leave_type.name }}
                                                </span>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ leaveRequest.employee.team.name }}
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ startDate(leaveRequest.start) }} - {{ endDate(leaveRequest.end) }}

                                                (<span class="text-danger ml-1">
                                                {{ leaveRequest.days }} {{ pluralize(leaveRequest.days, 'Day') }}
                                                </span>)
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-md font-bold leading-none text-red-100 rounded-full capitalize" :class="getBadgeType(leaveRequest.status)">
                                                    {{ leaveRequest.status }}
                                                </span>
                                            </td>
                                            <td
                                                class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-right text-gray-900 tabular-nums">
                                                <div class="flex">
                                                    <div @click="editData(leaveRequest)" class="mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <svg class="cursor-pointer w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24">
                                                            <path
                                                                d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z" />
                                                        </svg>
                                                    </div>
                                                    <div @click="deleteData(leaveRequest.id)" class="mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <svg class="cursor-pointer w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24">
                                                            <path
                                                                d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                                        </svg>
                                                    </div>
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

                            <Pagination :data="leaveRequests" v-if="leaveRequests && leaveRequests.data.length" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>

    <CreateLeaveRequest v-if="isPermitCreateDrawer" :show="isShowCreateDrawer" @close-drawer="closeDrawer('create')"/>
    <EditLeaveRequest v-if="isPermitEditDrawer" :show="isShowEditDrawer" @close-drawer="closeDrawer('edit')" :leaveRequest="editLeaveRequest"/>

    <!-- <div class="row justify-content-center pt-5">
        <div class="col-12">
            <div class="card">
                 <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">{{ __('Leave Request List') }}</h3>
                        <div>
                            <Link :href="route('employee.leave.request.create')" class="btn btn-primary">
                                <i class="fa-solid fa-plus"></i>
                                 {{ __('Apply for Leave') }}
                            </Link>
                            <button class="btn btn-secondary ml-2" @click="filteringData">
                                <i class="fa-solid fa-filter"></i>
                                &nbsp;
                                <span v-if="!showFilter">{{ __('Show Filter') }}</span>
                                <span v-else>{{ __('Hide Filter') }}</span>
                            </button>
                            <Link :href="route('employee.leave.request.index')" class="btn btn-danger ml-2" v-if="filterForm.status || filterForm.leave_type">
                                <i class="fa-solid fa-times"></i>
                                {{ __('Clear') }}
                            </Link>
                        </div>
                    </div>
                </div>
                <div class="card-body border-bottom d-flex justify-content-between" v-if="showFilter">
                        <div class=" w-25">
                            <label>{{ __('Leave Type') }}</label>
                            <select class="form-control" v-model="filterForm.leave_type" @change="filterData">
                                <option value="">{{ __('All') }}</option>
                                <option :value="leave_type.id" v-for="leave_type in leaveTypes" :key="leave_type.id">
                                    {{ leave_type.name }}
                                </option>
                            </select>
                        </div>
                    <div class="ml-auto w-25">
                        <label>{{ __('Status') }}</label>
                        <select class="form-control" v-model="filterForm.status" @change="filterData">
                            <option value="">{{ __('All') }}</option>
                            <option value="pending">{{ __('Pending') }}</option>
                            <option value="approved">{{ __('Approved') }}</option>
                            <option value="rejected">{{ __('Rejected') }}</option>
                        </select>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-valign-middle">
                        <thead>
                            <tr>
                                <th>{{ __('Leave Type') }}</th>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-if="leaveRequests && leaveRequests.data.length">
                                <tr v-for="(leaveRequest,index) in leaveRequests.data" :key="index">
                                    <td>
                                        <span :style="{ background: leaveRequest.leave_type.color, border: '2px solid '+leaveRequest.leave_type.color }" class="leave-type-color">
                                            {{ leaveRequest.leave_type.name }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ startDate(leaveRequest.start_date) }} - {{ endDate(leaveRequest.end_date) }}

                                         (<span class="text-danger ml-1">
                                        {{ leaveRequest.days }} {{ pluralize(leaveRequest.days, 'Day') }}
                                    </span>)
                                    </td>
                                    <td>
                                        <span class="toCapitalFirst badge" :class="getBadgeType(leaveRequest.status)">
                                            {{ leaveRequest.status }}
                                        </span>
                                    </td>
                                    <td class="d-flex">
                                        <button @click="showDetails(leaveRequest)" v-tooltip="__('Details')" class="btn btn-sm">
                                                <EyeIcon/>
                                        </button>
                                        <template v-if="leaveRequest.status == 'pending'">
                                            <Link :href="route('employee.leave.request.edit', leaveRequest.id)" v-tooltip="__('Edit')" class="btn btn-sm">
                                            <EditIcon/>
                                            </Link>
                                        </template>
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

                    <Pagination :data="leaveRequests.links" />
                </div>
            </div>
        </div>
    </div> -->

    <!-- Details Holiday Modal  -->
    <!-- <div v-if="showModal">
        <transition name="fade">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-dialog d-flex justify-content-center" role="document">
                        <div class="modal-content" v-click-outside="()=> showModal = false">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    {{ __('Leave Request Details') }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" @click="showModal = false">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td width="30%">{{ __('Name') }}</td>
                                            <td width="70%">
                                                <a href="#">
                                                    <span :style="{ background: form.color, border: '2px solid '+form.color }" class="leave-type-color">
                                                    {{ form.type }}
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%">{{ __('Date') }}</td>
                                            <td width="70%">{{ requestFor(form.start, form.end) }}</td>
                                        </tr>
                                        <tr>
                                            <td width="30%">{{ __('Total Days') }}</td>
                                            <td width="70%">{{  form.days }} {{ pluralize(form.days, 'Day') }}</td>
                                        </tr>
                                        <tr>
                                            <td width="30%">{{ __('Status') }}</td>
                                            <td width="70%">
                                                <span class="toCapitalFirst badge" :class="getBadgeType(form.status)">
                                                    {{ form.status }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%">{{ __('Reason') }}</td>
                                            <td width="70%">{{ form.reason }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    @click="showModal = false">{{ __('Close') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div> -->
</template>


<script>
import Pagination from "../../../Shared/Pagination.vue";
import { Inertia } from "@inertiajs/inertia";
import CreateLeaveRequest from "./Create.vue";
import EditLeaveRequest from "./Edit.vue";

export default {
    props: {
        leaveRequests: Array,
        leaveTypes: Array,
        filters: Object,
    },
    components: {
        Pagination,
        Inertia,
        CreateLeaveRequest,
        EditLeaveRequest
    },
    data() {
        return {
            showModal: false,
            form: {
                type: "",
                color: "",
                status: "",
                start: "",
                end: "",
                days: "",
                reason: "",
            },

            showFilter: false,
            filterForm: {
                status: this.filters.status,
                leave_type: this.filters.leave_type,
            },

            isShowCreateDrawer: false,
            isShowEditDrawer: false,
            isPermitCreateDrawer: false,
            isPermitEditDrawer: false,
            editLeaveRequest: ''
        };
    },
    methods: {
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
        getBadgeType(status) {
            if (status == "pending") {
                return "bg-yellow-400";
            } else if (status == "approved") {
                return "bg-green-500";
            } else {
                return "bg-red-600";
            }
        },
        startDate(Date) {
            return this.formateDate(date, "DD MMM, YYYY");
        },
        endDate(Date) {
            return this.formateDate(date, "DD MMM, YYYY");
        },
        requestFor(startDate, endDate) {
            const start = this.formateDate(startDate, "DD MMM, YYYY");
            const end = this.formateDate(endDate, "DD MMM, YYYY");

            return `${start} - ${end}`;
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
                    this.$inertia.delete(route("employee.leave.request.destroy", id));
                }
            });
        },
        editData(data){
            this.editLeaveRequest = data
            this.isPermitEditDrawer = true
            setTimeout(() => {
                this.isShowEditDrawer = true
            }, 5);
        },


        showDetails(request) {
            this.form.type = request.leave_type.name;
            this.form.color = request.leave_type.color;
            this.form.status = request.status;
            this.form.start = request.start;
            this.form.end = request.end;
            this.form.days = request.days;
            this.form.reason = request.reason;
            this.showModal = true;
        },
        filteringData() {
            this.showFilter = !this.showFilter;
            localStorage.setItem("employeeLeaveRequest", this.showFilter);
        },
        filterData() {
            Inertia.get(
                route("employee.leave.request.index"),
                {
                    status: this.filterForm.status,
                    leave_type: this.filterForm.leave_type,
                },
                {
                    preserveState: true,
                    replace: true,
                }
            );
        },
    },
    mounted() {
        this.checkPagePermission("employee");
        this.showFilter =
            localStorage.getItem("employeeLeaveRequest") == "true"
                ? true
                : false;
    },
};
</script>

<style scoped>
    .avatar-img {
        height: 60px;
        width: 60px;
        object-fit: cover;
    }

     .leave-type-color {
        border-radius: 30px;
        padding: 2px 5px;
            font-weight: 500;
        color: #fff;
    }

    .modal-dialog {
        max-width: 1000px !important;
    }

    :deep(.popper) {
        background: #000000;
        padding: 20px;
        border-radius: 20px;
        color: #fff;
        width: 500px;
    }

    :deep(.popper #arrow::before) {
        background: #000000;
    }

    :deep(.popper:hover),
    :deep(.popper:hover > #arrow::before) {
        background: #000000;
    }
</style>

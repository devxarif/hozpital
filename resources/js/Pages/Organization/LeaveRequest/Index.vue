<template>

    <Head :title="__('Leave Request List')" />

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
                    Add Product
                </button>
            </div>
        </div>
        <!-- component -->
        <div class="bg-white shadow sm:rounded-lg mt-6 -mx-4 sm:-mx-0 overflow-hidden">
            <div class=" rounded-lg bg-white dark:bg-gray-800  shadow-xs overflow-hidden mb-5">
                <div class="p-4">
                    <form class="py-3 grid gap-4 lg:gap-6 xl:gap-6 md:flex xl:flex">
                        <div class="flex-grow-0 md:flex-grow lg:flex-grow xl:flex-grow"><input
                                class="px-3 py-1 dark:text-gray-300 leading-5 rounded-md focus:border-gray-200 border-gray-200 dark:border-gray-600 focus:ring focus:ring-blue-300 dark:focus:border-gray-500 dark:focus:ring-gray-300 dark:bg-gray-700 border h-12 text-sm focus:outline-none block w-full bg-gray-100 border-transparent focus:bg-white"
                                type="search" name="search" placeholder="Search by product name"><button type="submit"
                                class="absolute right-0 top-0 mt-5 mr-1"></button></div>
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

                                            <div class="flex items-center">
                                                {{ __('Employee') }}
                                                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                            </div>
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
                                        <tr class="relative hover:bg-slate-50 text-md" v-for="(leaveRequest,index) in leaveRequests.data" :key="index">
                                            <td
                                                class="px-4 sm:px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                                                <Link :href="route('organization.employees.show',leaveRequest.employee.user_id)">
                                                    <div class="flex items-center ">
                                                        <div class="mr-2">
                                                            <img class="w-6 h-6 rounded-full" :src="leaveRequest.employee.user.avatar"/>
                                                        </div>
                                                        <span class="text-gray-500 font-md" v-html="leaveRequest.employee.user.name"/>
                                                    </div>
                                                </Link>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-gray-900">
                                                <span :style="{ background: leaveRequest.leave_type.color, border: '2px solid '+leaveRequest.leave_type.color }" class="leave-type-color">
                                                    {{ leaveRequest.leave_type.name }}
                                                </span>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-gray-900">
                                                {{ leaveRequest.employee.team.name }}
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-gray-900">
                                                {{ startDate(leaveRequest.start) }} - {{ endDate(leaveRequest.end) }}

                                                (<span class="text-danger ml-1">
                                                {{ leaveRequest.days }} {{ pluralize(leaveRequest.days, 'Day') }}
                                                </span>)
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-gray-900">
                                                <span class="inline-flex items-center justify-center px-3 py-2 mr-2 font-bold leading-none text-red-100 rounded-full capitalize" :class="getBadgeType(leaveRequest.status)">
                                                    {{ leaveRequest.status }}
                                                </span>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 flex text-right text-gray-900 tabular-nums">
                                                <Actions :leaveRequest="leaveRequest"/>
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

    <!-- <div class="row justify-content-center pt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">{{ __('Leave Request List') }}</h3>
                        <div>
                            <Link :href="route('organization.leaveRequests.create')" class="btn btn-primary">
                                <i class="fa-solid fa-plus"></i>
                                 {{ __('Create a new request') }}
                            </Link>
                            <button class="btn btn-secondary ml-2" @click="filteringData">
                                <i class="fa-solid fa-filter"></i>
                                &nbsp;
                                <span v-if="!showFilter">{{ __('Show Filter') }}</span>
                                <span v-else>{{ __('Hide Filter') }}</span>
                            </button>
                            <Link v-if="form.status || form.leave_type" :href="route('organization.leaveRequests.index')" class="btn btn-danger ml-2">
                                <i class="fa-solid fa-times"></i>
                                {{ __('Clear') }}
                            </Link>
                        </div>
                    </div>
                </div>
                 <div class="card-body border-bottom d-flex justify-content-between" v-if="showFilter">
                    <div class="w-25">
                        <label>{{ __('Leave Type') }}</label>
                        <select class="form-control" v-model="form.leave_type" @change="filterData">
                            <option value="">{{ __('All') }}</option>
                            <option :value="leave_type.id" v-for="leave_type in leaveTypes" :key="leave_type.id">
                                {{ leave_type.name }}
                            </option>
                        </select>
                    </div>
                    <div class="ml-auto w-25">
                        <label>{{ __('Status') }}</label>
                        <select class="form-control" v-model="form.status" @change="filterData">
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
                                <th>{{ __('Employee') }}</th>
                                <th>{{ __('Leave Type') }}</th>
                                <th>{{ __('Team') }}</th>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-if="leaveRequests && leaveRequests.data.length">
                                <tr v-for="(leaveRequest,index) in leaveRequests.data" :key="index">
                                    <td>
                                        <Link :href="route('organization.employees.show',leaveRequest.employee.user_id)">
                                            <img :src="leaveRequest.employee.user.avatar" alt="img"
                                            class="img-circle img-size-32 mr-2">
                                            {{ leaveRequest.employee.user.name }}
                                        </Link>
                                    </td>
                                    <td>
                                        <span :style="{ background: leaveRequest.leave_type.color, border: '2px solid '+leaveRequest.leave_type.color }" class="leave-type-color">
                                            {{ leaveRequest.leave_type.name }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ leaveRequest.employee.team.name }}
                                    </td>
                                    <td>
                                        {{ startDate(leaveRequest.start) }} - {{ endDate(leaveRequest.end) }}

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
                                       <Actions :leaveRequest="leaveRequest" />
                                       <button @click="showDetails(leaveRequest)" v-tooltip="__('Details')" class="btn btn-sm">
                                            <EyeIcon/>
                                        </button>
                                    </td>
                                </tr>
                            </template>
                            <tr v-else>
                                <td colspan="20" class="text-center">
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
      <div v-if="showModal">
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
                                            <td width="30%">{{ __('Employee') }}</td>
                                            <td width="70%">
                                                <Link :href="route('organization.employees.show',detailForm.user_id)">
                                                    {{ detailForm.employee }}
                                                </Link>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%">{{ __('Leave Type') }}</td>
                                            <td width="70%">
                                                <a href="#">
                                                    <span :style="{ background: detailForm.color, border: '2px solid '+detailForm.color }" class="leave-type-color">
                                                    {{ detailForm.type }}
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%">{{ __('Date') }}</td>
                                            <td width="70%">{{ requestFor(detailForm.start, detailForm.end) }}</td>
                                        </tr>
                                        <tr>
                                            <td width="30%">{{ __('Total Days') }}</td>
                                            <td width="70%">{{ detailForm.days }} {{ pluralize(detailForm.days, 'Day') }}</td>
                                        </tr>
                                        <tr>
                                            <td width="30%">{{ __('Status') }}</td>
                                            <td width="70%">
                                                <span class="toCapitalFirst badge" :class="getBadgeType(detailForm.status)">
                                                    {{ detailForm.status }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%">{{ __('Reason') }}</td>
                                            <td width="50%">{{ detailForm.reason }}</td>
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
    </div>

    <CreateLeaveRequest v-if="isPermitCreateDrawer" :show="isShowCreateDrawer" @close-drawer="closeDrawer('create')"/>
    <EditLeaveRequest v-if="isPermitEditDrawer" :show="isShowEditDrawer" @close-drawer="closeDrawer('edit')" :leaveRequest="editLeaveRequest"/>
</template>


<script>
import Pagination from "@/Shared/Pagination.vue";
import Actions from "@/Shared/Organization/LeaveRequest/Status.vue";
import dayjs from "dayjs";
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
        Actions,
        CreateLeaveRequest,
        EditLeaveRequest,
    },
    data() {
        return {
            showModal: false,
            showFilter: false,
            form: {
                status: this.filters.status,
                leave_type: this.filters.leave_type,
            },

            detailForm: {
                type: "",
                color: "",
                status: "",
                start: "",
                end: "",
                days: "",
                reason: "",
                user_id: "",
                employee: "",
            },

            isShowCreateDrawer: false,
            isShowEditDrawer: false,
            isPermitCreateDrawer: false,
            isPermitEditDrawer: false,
            editLeaveRequest: ''
        };
    },
    methods: {
        statusChange(request_id,status) {
            this.$inertia.post(route("organization.leaveRequests.status"), {
                id: request_id,
                status: status,
            });
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
        startDate(date) {
            return dayjs(date).format("DD MMM, YYYY");
        },
        endDate(date) {
            return dayjs(date).format("DD MMM, YYYY");
        },
        filteringData() {
            this.showFilter = !this.showFilter;
            localStorage.setItem("companyLeaveRequestList", this.showFilter);
        },
        filterData() {
            this.$inertia.get(
                route("organization.leaveRequests.index"),
                {
                    status: this.form.status,
                    leave_type: this.form.leave_type,
                    team: this.form.team,
                },
                {
                    preserveState: true,
                    replace: true,
                }
            );
        },
        showDetails(request) {
            this.detailForm.type = request.leave_type.name;
            this.detailForm.color = request.leave_type.color;
            this.detailForm.status = request.status;
            this.detailForm.start = request.start;
            this.detailForm.end = request.end;
            this.detailForm.days = request.days;
            this.detailForm.reason = request.reason;
            this.detailForm.user_id = request.employee.user_id;
            this.detailForm.employee = request.employee.user.name;
            this.showModal = true;
        },
        requestFor(startDate, endDate) {
            const start = dayjs(startDate).format("DD MMM, YYYY");
            const end = dayjs(endDate).format("DD MMM, YYYY");

            return `${start} - ${end}`;
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
        this.showFilter =
            localStorage.getItem("companyLeaveRequestList") == "true"
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
</style>

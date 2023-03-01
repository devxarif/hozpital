<template>
    <AppLayout title="Order List">
        <div class="page-header mb-[1.875rem]">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-3xl font-semibold leading-7 text-gray-900  sm:text-3xl sm:truncate">
                        {{ __('Plan') }}
                    </h2>
                </div>
                <div class="flex items-center">
                    <a @click="showCreateDrawer = true" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent font-medium text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition sm:text-sm rounded-full"
                        href="#">
                        <span class="mr-3">
                            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em"
                                xmlns="http://www.w3.org/2000/svg">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </span>
                        {{ __('Add Plan') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="page-header mb-[1.875rem]">
            <div class="flex items-center justify-between">
                <div class="flex-1 min-w-0">
                    <div>
                        <h2 class="text-3xl font-semibold leading-7 text-gray-900  sm:text-3xl sm:truncate">
                            {{ __('Orders') }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- component -->
        <div class="bg-white shadow sm:rounded-lg mt-6 -mx-4 sm:-mx-0 overflow-hidden">
            <div class=" rounded-lg bg-white   shadow-xs overflow-hidden mb-5">
                <div class="p-4">
                    <div class="py-3 grid gap-4 lg:gap-6 xl:gap-6 md:flex xl:flex">
                        <div class="card-body border-bottom row" v-if="showFilter">
                            <!-- <div class="col-3">
                                <label>{{ __('Search') }}</label>
                                <input @keyup="searchData" v-model="filterForm.search" type="text"
                                    placeholder="Search order id, transaction id" class="form-control">
                            </div>
                            <div class="col-3">
                                <label>{{ __('Organization') }}</label>
                                <select class="form-control" v-model="filterForm.organization" @change="filterData">
                                    <option value="">{{ __('All') }}</option>
                                    <option :value="organization.id" v-for="organization in organizations" :key="organization.id">
                                        {{ organization.organization_name }}
                                    </option>
                                </select>
                            </div> -->
                            <div class="col-3">
                                <label>{{ __('Plan') }}</label>
                                <select v-model="filterForm.plan" class="form-control" @change="filterData">
                                    <option value="">{{ __('All') }}</option>
                                    <option v-for="plan in plans" :key="plan.id" :value="plan.id">
                                        {{ plan.name }}
                                    </option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label>{{ __('Payment') }}</label>
                                <select class="form-control" v-model="filterForm.payment" @change="filterData">
                                    <option value="">{{ __('All') }}</option>
                                    <option value="paypal">{{ __('Paypal') }}</option>
                                    <option value="stripe">{{ __('Stripe') }}</option>
                                    <option value="flutterwave">{{ __('Flutterwave') }}</option>
                                    <option value="mollie">{{ __('Mollie') }}</option>
                                    <option value="midtrans">{{ __('Midtrans') }}</option>
                                    <option value="paystack">{{ __('Paystack') }}</option>
                                    <option value="razorpay">{{ __('Razorpay') }}</option>
                                    <option value="instamojo">{{ __('Instamojo') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex-grow-0 md:flex-grow lg:flex-grow xl:flex-grow">
                            <input @keyup="searchData" v-model="filterForm.search" class="px-3 py-1  leading-5 rounded-md focus:border-gray-200 border-gray-200  focus:ring focus:ring-blue-300    border h-12 text-sm focus:outline-none block w-full bg-gray-100 border-transparent focus:bg-white"
                                type="search" name="search" placeholder="Search order id, transaction id">
                            <button type="submit" class="absolute right-0 top-0 mt-5 mr-1"></button>
                        </div>
                        <div class="flex-grow-0 md:flex-grow lg:flex-grow xl:flex-grow">
                            <select v-model="filterForm.organization" @change="filterData" class="px-2 py-1  rounded-md form-select focus:border-gray-200 border-gray-200  focus:shadow-none focus:ring focus:ring-blue-300    leading-5 border h-12 text-sm focus:outline-none block w-full bg-gray-100 border-transparent focus:bg-white">
                                <option value="" hidden="">{{ __('Organization') }}</option>
                                <option :value="organization.id" v-for="organization in organizations" :key="organization.id">
                                    {{ organization.organization_name }}
                                </option>
                            </select>
                        </div>
                        <div class="flex-grow-0 md:flex-grow lg:flex-grow xl:flex-grow">
                            <select v-model="filterForm.plan" @change="filterData" class="px-2 py-1  rounded-md form-select focus:border-gray-200 border-gray-200  focus:shadow-none focus:ring focus:ring-blue-300    leading-5 border h-12 text-sm focus:outline-none block w-full bg-gray-100 border-transparent focus:bg-white">
                                <option value="" hidden="">{{ __('Plan') }}</option>
                                <option v-for="plan in plans" :key="plan.id" :value="plan.id">
                                    {{ plan.name }}
                                </option>
                            </select>
                        </div>
                        <div class="flex-grow-0 md:flex-grow lg:flex-grow xl:flex-grow">
                            <select v-model="filterForm.payment" @change="filterData" class="px-2 py-1  rounded-md form-select focus:border-gray-200 border-gray-200  focus:shadow-none focus:ring focus:ring-blue-300    leading-5 border h-12 text-sm focus:outline-none block w-full bg-gray-100 border-transparent focus:bg-white">
                                <option value="" hidden="">{{ __('Payment') }}</option>
                                <option value="paypal">{{ __('Paypal') }}</option>
                                <option value="stripe">{{ __('Stripe') }}</option>
                                <option value="flutterwave">{{ __('Flutterwave') }}</option>
                                <option value="mollie">{{ __('Mollie') }}</option>
                                <option value="midtrans">{{ __('Midtrans') }}</option>
                                <option value="paystack">{{ __('Paystack') }}</option>
                                <option value="razorpay">{{ __('Razorpay') }}</option>
                                <option value="instamojo">{{ __('Instamojo') }}</option>
                            </select>
                        </div>
                        <div class="w-full md:w-56 lg:w-56 xl:w-56 relative">
                            <!-- <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center   " type="button">Dropdown button <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

                            <ul class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md   "
                                aria-label="submenu">
                                <li class="flex"><a
                                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800  "
                                        href="#"><svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg><span>Profile</span></a></li>
                                <li class="flex"><a
                                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800  "
                                        href="#"><svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path
                                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                            </path>
                                            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg><span>Settings</span></a></li>
                                <li class="flex"><a
                                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800  "
                                        href="/logout"><svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path
                                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                            </path>
                                        </svg> Logout </a></li>
                            </ul> -->

                            <button class="align-bottom inline-flex items-center justify-center cursor-pointer leading-5 transition-colors duration-150 font-medium focus:outline-none px-4 py-2 text-sm text-white bg-blue-500 border border-transparent active:bg-blue-600 hover:bg-blue-600 focus:ring focus:ring-purple-300 w-full rounded-full h-12"
                                type="button"><span class="mr-3">
                                    <!-- <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="text-white stroke-current" height="16" width="16"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg> -->
                                </span>
                                Show Filter
                            </button>
                        </div>
                    </div>
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
                                            {{ __('Order ID') }}
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Company') }}
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Amount') }}
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Payment Method') }}
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Plan') }}
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider tabular-nums">
                                            {{ __('Status') }}
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Actions') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <template v-if="orders && orders.data.length">
                                        <tr class="relative hover:bg-slate-50" v-for="(order,index) in orders.data"
                                            :key="index">
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <!-- <span class="bg-yellow-500">sdasdas</span> -->
                                                <span class="absolute inset-0"></span>
                                                <Link :href="route('orders.show',order.id)"
                                                    v-tooltip="__('Order Details')">
                                                    #<span v-html="order.order_id"></span>
                                                </Link>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <div class="flex items-center ">
                                                    <div class="mr-2">
                                                        <img class="w-6 h-6 rounded-full"
                                                            :src="order.organization_logo_url" />
                                                    </div>
                                                    <span class="text-gray-500">{{ order.organization_name }}</span>
                                                </div>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ order.currency_symbol }}&nbsp;{{ order.amount }}
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 capitalize">
                                                {{ order.payment_provider }}
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <b>{{ order.plan.name }}</b>
                                                /
                                                <small
                                                    v-if="order.plan.interval != 'custom_days'">{{ order.plan.interval }}</small>
                                                <small v-else>{{ order.plan.custom_interval_days }}
                                                    {{ __('Days') }}</small>
                                            </td>
                                            <td
                                                class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-right text-gray-900 tabular-nums">
                                                <div class="flex items-center space-x-1">
                                                    <span class="block w-2 h-2 rounded-full bg-blue-500"></span>
                                                    <span>{{ __('Paid') }}</span>
                                                </div>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-right text-gray-900 tabular-nums">
                                                <div class="flex">
                                                    <div class="mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                            <path
                                                                d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z" />
                                                            </svg>
                                                    </div>
                                                    <div class=" mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                            <path
                                                                d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                                            </svg>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </template>
                                    <tr v-else>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-center text-base text-gray-600 font-medium" colspan="20">
                                            <NoDataFound/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <Pagination :data="orders" v-if="orders && orders.data.length"/>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <!-- <div class="row justify-content-center">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">{{ __('Order List') }}</h3>
                            <div>
                                <button class="btn btn-secondary ml-2" @click="filteringData">
                                    <i class="fa-solid fa-filter"></i>
                                    &nbsp;
                                    <span v-if="!showFilter">{{ __('Show Filter') }}</span>
                                    <span v-else>{{ __('Hide Filter') }}</span>
                                </button>
                                <Link
                                    v-if="filterForm.company || filterForm.search || filterForm.payment || filterForm.plan"
                                    :href="route('orders.index')" class="btn btn-danger ml-2">
                                <i class="fa-solid fa-times"></i>
                                {{ __('Clear') }}
                                </Link>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-valign-middle">
                            <thead>
                                <tr>
                                    <th>{{ __('Order ID') }}</th>
                                    <th>{{ __('Transaction ID') }}</th>
                                    <th>{{ __('Company') }}</th>
                                    <th>{{ __('Amount') }}</th>
                                    <th>{{ __('Payment Method') }}</th>
                                    <th>{{ __('Plan') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="orders && orders.data.length">
                                    <tr v-for="(order,index) in orders.data" :key="index">
                                        <td>
                                            <Link :href="route('orders.show',order.id)" v-tooltip="__('Order Details')">
                                            #<span v-html="order.order_id"></span>
                                            </Link>
                                        </td>
                                        <td><span v-html="order.transaction_id"></span></td>
                                        <td>
                                            <b>
                                                <Link :href="route('organizations.show',order.organization_id)">
                                                {{ order.organization_name }}
                                                </Link>
                                                ({{ order.organization_email }})
                                            </b>
                                        </td>
                                        <td>
                                            {{ order.currency_symbol }}&nbsp;{{ order.amount }}
                                        </td>
                                        <td class="text-capitalize">
                                            {{ order.payment_provider }}
                                        </td>
                                        <td v-if="order.plan">
                                            <b>{{ order.plan.name }}</b>
                                            /
                                            <small
                                                v-if="order.plan.interval != 'custom_days'">{{ order.plan.interval }}</small>
                                            <small v-else>{{ order.plan.custom_interval_days }} {{ __('Days') }}</small>
                                        </td>
                                        <td class="d-flex">
                                            <Link :href="route('orders.show',order.id)" v-tooltip="__('Order Details')"
                                                class="btn btn-sm pl-0">
                                            <EyeIcon />
                                            </Link>
                                            <a :href="route('orders.pdf.download', order.id)" v-tooltip="__('Download')"
                                                target="_blank" class="btn btn-sm pl-0 text-secondary">
                                                <i class="fa-solid fa-download fa-2x"></i>
                                            </a>
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

                        <Pagination :data="orders" />
                    </div>
                </div>
            </div>
        </div> -->
    </AppLayout>
</template>


<script>
    import Feature from "@/Shared/Admin/Plan/Feature.vue";
    import debounce from "lodash/debounce";
    import {
        Inertia
    } from "@inertiajs/inertia";

    export default {
        props: {
            organizations: Array,
            plans: Array,
            orders: Array,
            filters: Object || Array,
        },
        components: {
            Feature,
            Inertia,
        },
        data() {
            return {
                showFilter: false,

                form: {
                    order_id: "",
                    payment_method: "",
                    amount: "",
                    currency_symbol: "",
                    plan: {},
                },

                filterForm: {
                    organization: this.filters.organization,
                    search: this.filters.search,
                    payment: this.filters.payment,
                    plan: this.filters.plan,
                },
            };
        },
        methods: {
            filteringData() {
                this.showFilter = !this.showFilter;
                localStorage.setItem("adminOrder", this.showFilter);
            },
            filterData() {
                Inertia.get(
                    route("orders.index"), {
                        organization: this.filterForm.organization,
                        search: this.filterForm.search,
                        payment: this.filterForm.payment,
                        plan: this.filterForm.plan,
                    }, {
                        preserveState: true,
                        replace: true,
                    }
                );
            },
        },
        watch: {
            "filterForm.search": debounce((value) => {
                Inertia.get(
                    route("orders.index"), {
                        search: value
                    }, {
                        preserveState: true,
                        replace: true,
                    }
                );
            }, 500),
        },
        mounted() {
            this.checkPagePermission("admin");
            this.showFilter =
                localStorage.getItem("adminOrder") == "true" ? true : false;
        },
    };
</script>

<style scoped>
    .modal-content {
        width: 750px !important;
    }
</style>

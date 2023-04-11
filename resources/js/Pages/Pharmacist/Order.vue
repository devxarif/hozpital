<template>
    <AppLayout title="Order">

        <!-- Header Part  -->
        <Breadcrumb>
            <BreadcrumbLink title="Order"/>
        </Breadcrumb>

        <div class="mb-4 flex justify-between">
            <h2 class="text-3xl font-semibold leading-7 text-gray-900  sm:text-3xl sm:truncate">
                {{ __('Order') }}
            </h2>
            <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                <!-- Clear Filter -->
                <ClearFilter v-if="filter.keyword && filter.keyword.length"  :href="route('pharmacist.product.index')"/>

                <BaseButton @click="toggleFilter" class="text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 px-3 py-2">
                    <svg class="mr-2 h-6 w-6" stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                    {{ showFilter ? 'Hide Filter':'Filter' }}
                </BaseButton>
                <Menu as="div" class="relative inline-block text-left">
                    <div>
                        <MenuButton class="flex items-center rounded-lg text-gray-400 hover:text-gray-600 focus:outline-none">
                            <span class="sr-only">Open options</span>
                            <button href="javascript:void(0)" class="w-1/2 text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto focus:outline-none">
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
            </div>
        </div>
        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-100" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <div v-if="showFilter" class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 xl:grid-cols-12 gap-5 mb-4 bg-white rounded-lg shadow-xs  items-center p-4">
                <div class="col-span-2">
                    <label for="keyword" class="block text-sm font-medium text-gray-700">{{ __('Search') }}</label>
                    <div class="mt-1">
                        <input v-model="filterForm.keyword" type="text" id="keyword" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5" placeholder="Order No">
                    </div>
                </div>
                <div class="col-span-2">
                    <label for="order_payment_status" class="block text-sm font-medium text-gray-700">{{ __('Payment Status') }}</label>
                    <div class="mt-1">
                        <Multiselect id="order_payment_status" :close-on-select="true" :can-clear="false"
                            :searchable="true" v-model="filterForm.product_category" :create-option="false"
                            placeholder="Payment Status" :options="[
                                {value: 'paid', label: 'Paid'},
                                {value: 'unpaid', label: 'Unpaid'},
                            ]"  />
                    </div>
                </div>
                <div class="col-span-2">
                    <label for="order_user_role" class="block text-sm font-medium text-gray-700">{{ __('User Role') }}</label>
                    <div class="mt-1">
                        <Multiselect id="order_user_role" :close-on-select="true" :can-clear="false"
                            :searchable="true" v-model="filterForm.product_category" :create-option="false"
                            placeholder="User Role" :options="[
                                {value: 'patient', label: 'Patient'},
                                {value: 'doctor', label: 'Doctor'},
                                {value: 'nurse', label: 'Nurse'},
                                {value: 'receptionist', label: 'Receptionist'},
                                {value: 'accountant', label: 'Accountant'},
                                {value: 'pharmacist', label: 'Pharmacist'},
                                {value: 'laboratorist', label: 'Laboratorist'},
                                {value: 'admin', label: 'Admin'},
                            ]"/>
                    </div>
                </div>
                <div class="col-span-3">
                    <label for="pharmacist_product_category" class="block text-sm font-medium text-gray-700">{{ __('Date') }}</label>
                    <div class="mt-1">
                        <Multiselect id="pharmacist_product_category" :close-on-select="true" :can-clear="false"
                            :searchable="true" v-model="filterForm.product_category" :create-option="false"
                            placeholder="Filter by date" :options="filter_by_date.map(item => ({
                                value: item.value, label: item.label
                            }))"  />
                    </div>
                </div>
                <div class="col-span-3">
                    <button @click="filterData" :disabled="loading" type="button" class="text-white bg-blue-600 hover:bg-blue-700 font-medium inline-flex items-center justify-center rounded-lg text-sm px-6 py-2.5 mt-6 text-center sm:w-auto focus:outline-none">
                        <font-awesome-icon icon="fa-solid fa-search" class="h-4 w-4 mr-2"/>
                       {{ __('Search') }}
                    </button>
                </div>
            </div>
        </transition>

        <div>
            <div class="mb-5">
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8">
                        <button type="button" @click="changeTab('all')" :class="['whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', currentTab == 'all' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            All
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="currentTab == 'all' ? 'bg-blue-100 text-blue-600':'bg-gray-100 text-gray-900'">
                                {{ total_orders_count }}
                            </span>
                        </button>
                        <button type="button" @click="changeTab('pending')" :class="['whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', currentTab == 'pending' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            Pending
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="currentTab == 'public' ? 'bg-blue-100 text-blue-600':'bg-gray-100 text-gray-900'">
                                {{ pending_orders_count }}
                            </span>
                        </button>
                        <button type="button" @click="changeTab('confirmed')" :class="['whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', currentTab == '' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            Confirmed
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="currentTab == 'confirmed' ? 'bg-blue-100 text-blue-600':'bg-gray-100 text-gray-900'">
                                {{ confirmed_orders_count }}
                            </span>
                        </button>
                        <button type="button" @click="changeTab('on_the_way')" :class="['whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', currentTab == 'on_the_way' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            On the way
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="currentTab == 'on_the_way' ? 'bg-blue-100 text-blue-600':'bg-gray-100 text-gray-900'">
                                {{ on_the_way_orders_count }}
                            </span>
                        </button>
                        <button type="button" @click="changeTab('delivered')" :class="['whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', currentTab == 'delivered' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            Delivered
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="currentTab == 'delivered' ? 'bg-blue-100 text-blue-600':'bg-gray-100 text-gray-900'">
                                {{ delivered_orders_count }}
                            </span>
                        </button>
                        <button type="button" @click="changeTab('cancelled')" :class="['whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', currentTab == 'cancelled' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            Cancelled
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="currentTab == 'cancelled' ? 'bg-blue-100 text-blue-600':'bg-gray-100 text-gray-900'">
                                {{ cancelled_orders_count }}
                            </span>
                        </button>
                        <button type="button" @click="changeTab('refunded')" :class="['whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', currentTab == 'refunded' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            Refunded
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="currentTab == 'refunded' ? 'bg-blue-100 text-blue-600':'bg-gray-100 text-gray-900'">
                                {{ refunded_orders_count }}
                            </span>
                        </button>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Body Part  -->
        <CardSkeleton :show="loading" v-if="loading"/>

        <!-- Table View  -->
       <div class="flex flex-col mb-5" v-else-if="!loading && orders && orders.data.length">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-200">
                            <tr class="divide-x divide-gray-200">
                                <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Order No</th>
                                <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">User</th>
                                <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Order Date</th>
                                <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Amount</th>
                                <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Order Status</th>
                                <th width="80px" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-6">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="order in orders.data" :key="order.id" class="divide-x divide-gray-200">
                                <!-- {{ order }} -->
                                    <td class="p-4 text-sm text-gray-500 break-all">
                                        #{{ order.order_id ?? '' }}
                                    </td>
                                    <td class="py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                        <div class="flex items-center" v-if="order && order.user">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img class="h-10 w-10 rounded-md" :src="order.user.avatar_url" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="font-medium text-gray-900">{{ order.user.name }}</div>
                                                <span class="text-gray-500 capitalize">{{ order.user.role }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-4 text-sm text-gray-500 break-all">
                                        <p><b>Payment Provider:</b><span class="capitalize ml-2">{{ order.payment_provider }}</span></p>
                                        <p>
                                            <b>Payment Status:</b>
                                            <span class="ml-2 text-md font-bold leading-tight text-green-500 rounded-full">
                                                Paid
                                            </span>
                                            <a href="#" class="text-gray-500 underline ml-2">
                                                Mark as paid
                                            </a>
                                        </p>

                                        <!-- <p v-if="product.product_category && product.product_category.name"><b>Category:</b> {{ product.product_category.name }}</p>
                                        <div class="flex justify-between">
                                            <p v-if="product.buying_price"><b>Buying Price:</b> {{ product.buying_price }}</p>
                                            <p v-if="product.selling_price"><b>Selling Price:</b> {{ product.selling_price }}</p>
                                        </div> -->
                                    </td>
                                    <td class="p-4 text-sm text-gray-500 break-all">
                                        {{ order.amount ?? '' }} {{ order.currency ?? '' }}
                                    </td>
                                    <td class="p-4 text-sm text-gray-500 break-all">
                                        <span :class="getOrderBg(order.order_status)" class="text-white text-sm font-medium mr-2 px-3 py-2 rounded-full   capitalize">
                                            {{ order.order_status == 'on_the_way' ? 'On the way' : order.order_status }}
                                        </span>
                                    </td>
                                    <td class="py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-6">
                                        <Menu as="div" class="inline-block text-left">
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
                                                        <a href="javascript:void(0)" @click.prevent="editData(order)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                            <font-awesome-icon icon="fa-solid fa-pen-to-square" class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500"/>
                                                            Change Order Status
                                                        </a>
                                                    </MenuItem>
                                                    <MenuItem v-slot="{ active }">
                                                        <a href="javascript:void(0)" @click.prevent="editData(order)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                            <font-awesome-icon icon="fa-solid fa-eye" class="mr-3 h-5 w-5 text-sky-500 group-hover:text-sky-500"/>
                                                            Details
                                                        </a>
                                                    </MenuItem>
                                                    <MenuItem v-slot="{ active }">
                                                        <a href="javascript:void(0)" @click.prevent="deleteData(order.id)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                            <font-awesome-icon icon="fa-solid fa-trash-can" class="mr-3 h-5 w-5 text-red-500 group-hover:text-red-500"/>
                                                            Delete
                                                        </a>
                                                    </MenuItem>
                                                    </div>
                                                </MenuItems>
                                            </transition>
                                        </Menu>
                                    </td>
                            </tr>
                        </tbody>
                    </table>
                    <Pagination :data="orders"
                        v-if="orders && orders.data.length && orders.total > app_setting.rows_per_page" class="mt-5" />
                </div>
            </div>
        </div>
        </div>

       <NothingFound v-else/>
    </AppLayout>
</template>

<script>
import CardSkeleton from "@/Shared/Skeleton/CardSkeleton.vue";

export default {
    components: {
        CardSkeleton,
    },
    props: {
        orders:{
            type: Array,
            default: () => []
        },
        filter_by_date:{
            type: Object,
            default: () => []
        },
        filter:{
            type: Object,
            default: () => []
        },
        pending_orders_count:{
            type: Number,
            default: 0
        },
        confirmed_orders_count:{
            type: Number,
            default: 0
        },
        on_the_way_orders_count:{
            type: Number,
            default: 0
        },
        delivered_orders_count:{
            type: Number,
            default: 0
        },
        cancelled_orders_count:{
            type: Number,
            default: 0
        },
        refunded_orders_count:{
            type: Number,
            default: 0
        },
        total_orders_count:{
            type: Number,
            default: 0
        },
    },
    data() {
        return {
            showCreateDrawer: false,
            showEditDrawer: false,
            editAnnouncement: '',

            showFilter: false,
            loading: false,

            currentTab: this.filter.type || "all",

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
                    this.$inertia.delete(route("admin.announcement.destroy", id));
                }
            });
        },
        editData(announcement){
            this.showEditDrawer = true
            this.editAnnouncement = announcement
        },
        async changeTab(tab) {
            this.currentTab = tab;
            this.$inertia.get(route("admin.pharmacy.order"), {
                type: this.currentTab
            });
        },
        toggleFilter() {
            this.showFilter = !this.showFilter;
            localStorage.setItem("admin_pharmacist_order", this.showFilter);
        },
        filterData(){
            this.loading = true
            this.filterForm.get(route('pharmacist.product.index'), {
                onSuccess: () => {
                    this.loading = false
                },
                onError: () => {
                    this.loading = false
                    alert('Something went wrong')
                },
            })
        },
        getOrderBg(status) {
            switch (status) {
                case "pending":
                    return "bg-yellow-500";
                    break;
                case "confirmed":
                    return "bg-green-500";
                    break;
                case "on_the_way":
                    return "bg-blue-500";
                    break;
                case "delivered":
                    return "bg-sky-500";
                    break;
                case "cancelled":
                    return "bg-red-500";
                    break;
                case "refunded":
                    return "bg-red-500";
                    break;
            }
        },
    },
    created() {
        this.showFilter = localStorage.getItem("admin_pharmacist_order") == "true" ? true: false;
    },
};
</script>

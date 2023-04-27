<template>
    <AppLayout title="Billing">

        <!-- Header Part  -->
        <Breadcrumb>
            <BreadcrumbLink title="Billing"/>
        </Breadcrumb>

        <div class="mb-4 flex justify-between">
            <h2 class="text-3xl font-semibold leading-7 text-gray-900  sm:text-3xl sm:truncate">
                {{ __('Billing') }}
            </h2>

            <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                <!-- Clear Filter -->
                <ClearFilter v-if="filter.keyword && filter.keyword.length"  :href="route('admin.billing.index')"/>

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
                                <a href="javascript:void(0)" @click.prevent="editData(income)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                    <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                                    As PDF
                                </a>
                            </MenuItem>
                            <MenuItem v-slot="{ active }">
                                <a href="javascript:void(0)" @click.prevent="editData(income)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                    <font-awesome-icon icon="fa-solid fa-trash-can" class="h-4 w-4 mr-2 "/>
                                    As Excel
                                </a>
                            </MenuItem>
                            <MenuItem v-slot="{ active }">
                                <a href="javascript:void(0)" @click.prevent="editData(income)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
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
                   {{ __('Add Income') }}
                </BaseButton>
            </div>
        </div>

        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-100" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <div v-if="showFilter" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 xl:grid-cols-6 gap-5 mb-4 bg-white rounded-lg shadow-xs  items-center p-4">
                <div class="col-span-1">
                    <label for="keyword" class="block text-sm font-medium text-gray-700">{{ __('Search') }}</label>
                    <div class="mt-1">
                        <input v-model="filterForm.keyword" type="text" id="keyword" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5" placeholder="Invoice No">
                    </div>
                </div>
                <div class="col-span-1">
                    <label for="billing_payment_status" class="block text-sm font-medium text-gray-700">{{ __('Payment Status') }}</label>
                    <div class="mt-1">
                        <Multiselect id="billing_payment_status" :close-on-select="true" :can-clear="false"
                            :searchable="true" v-model="filterForm.payment_status" :create-option="false"
                            placeholder="Payment Status" :options="[
                                {value: 'paid', label: 'Paid'},
                                {value: 'pending', label: 'Pending'},
                            ]"  />
                    </div>
                </div>
                <div class="col-span-">
                    <label for="pharmacist_product_category" class="block text-sm font-medium text-gray-700">{{ __('Filter Date') }}</label>
                    <div class="mt-1">
                        <Multiselect id="pharmacist_product_category" :close-on-select="true" :can-clear="false"
                            :searchable="true" v-model="filterForm.date_type" :create-option="false"
                            placeholder="Filter by date" :options="filter_by_date.map(item => ({
                                value: item.value, label: item.label
                            }))"  />
                    </div>
                </div>
                <div class="col-span-1" v-if="showSingleDate">
                    <label for="billing_payment_status" class="block text-sm font-medium text-gray-700">{{ __('Select Custom Date') }}</label>
                    <div class="mt-1">
                        <Datepicker v-model="filterForm.custom_date" :enableTimePicker="false"
                            @update:modelValue="handleCustomDate" :class="{'is-invalid':errors.custom_date}" :placeholder="__('Select Date')" />
                        <span v-if="errors.custom_date" class="text-red-500 text-sm">{{ errors.custom_date && errors.custom_date[0] }}</span>
                    </div>
                </div>
                <div class="col-span-1" v-if="showDateRange">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Select Custom Range') }}</label>
                    <div class="mt-1">
                        <Datepicker v-model="filterForm.custom_date_range" :enableTimePicker="false"
                            @update:modelValue="handleCustomRangeDate" :class="{'is-invalid':errors.custom_start_date || errors.custom_end_date}" :placeholder="__('Select Date Range')" range multiCalendars />
                        <span v-if="errors.custom_start_date" class="text-red-500 text-sm">This field is required</span>
                        <span v-else-if="errors.custom_end_date" class="text-red-500 text-sm">The end date selection is not correct</span>
                    </div>
                </div>
                <div class="col-span-1">
                    <button @click="filterData" :disabled="loading" type="button" class="text-white bg-blue-600 hover:bg-blue-700 font-medium inline-flex items-center justify-center rounded-lg text-sm px-6 py-2.5 mt-6 text-center sm:w-auto focus:outline-none">
                        <font-awesome-icon icon="fa-solid fa-search" class="h-4 w-4 mr-2"/>
                       {{ __('Search') }}
                    </button>
                </div>
            </div>
        </transition>

        <!-- Body Part  -->
       <CardSkeleton :show="loading" v-if="loading"/>

        <!-- Table View  -->
        <BaseTable v-else-if="!loading && billings && billings.data.length" :items="billings">
            <template v-slot:head>
                <tr class="divide-x divide-gray-200">
                    <th class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Invoice No</th>
                    <th class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Title</th>
                    <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 break-words">Patient</th>
                    <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 break-words">Amount</th>
                    <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 break-words">Date</th>
                    <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 break-words">Status</th>
                    <th width="80px" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-6">Action</th>
                </tr>
            </template>
            <template v-slot:body>
                <tr v-for="billing in billings.data" :key="billing.id" class="divide-x divide-gray-200">
                    <td class="p-4 text-sm text-gray-500 break-all">
                        #{{ billing.invoice_number }}
                    </td>
                    <td class="p-4 text-sm text-gray-500 break-all">
                        {{ billing.title }}
                    </td>
                    <td class="py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                        <div class="flex items-center" v-if="billing.patient && billing.patient.user">
                            <div class="h-10 w-10 flex-shrink-0">
                                <img class="h-10 w-10 rounded-md" :src="billing.patient.user.avatar_url" alt="">
                            </div>
                            <div class="ml-4">
                                <div class="font-medium text-gray-900">{{ billing.patient.user.name }}</div>
                                <div class="font-medium text-gray-900">{{ billing.patient.user.email }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 text-sm text-gray-500 break-all">
                        <p><b>Sub Total:</b><span class="capitalize ml-2">{{ currencyFormat(billing.sub_total) }}</span></p>
                        <p><b>Discount Amount:</b><span class="capitalize ml-2">{{ currencyFormat(billing.discount_amount) }} ({{ billing.discount_percentage }} %)</span></p>
                        <p><b>Total:</b><span class="capitalize ml-2">{{ currencyFormat(billing.total_amount) }}</span></p>
                    </td>
                    <td class="p-4 text-sm text-gray-500 break-all">
                        {{ formatTime(billing.date) }}
                    </td>
                    <td class="p-4 text-sm text-gray-500 break-all">
                        <span :class="billing.status == 'paid' ? 'bg-green-500':'bg-yellow-500'" class="text-white text-sm font-medium mr-2 px-3 py-2 rounded-full   capitalize">
                            {{ billing.status }}
                        </span>
                        <a v-if="billing.status != 'paid'" href="javascript:void(0)" @click="markAsPaid(billing.id)" class="block text-gray-500 underline mt-2">
                            Mark as paid
                        </a>
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
                                        <a href="javascript:void(0)" @click.prevent="editData(billing)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                            <font-awesome-icon icon="fa-solid fa-pen-to-square" class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500"/>
                                            Edit
                                        </a>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <a href="javascript:void(0)" @click.prevent="editData(billing)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                            <font-awesome-icon icon="fa-solid fa-eye" class="mr-3 h-5 w-5 text-sky-500 group-hover:text-sky-500"/>
                                            Details
                                        </a>
                                    </MenuItem>
                                    </div>
                                </MenuItems>
                            </transition>
                        </Menu>
                    </td>
                </tr>
            </template>
        </BaseTable>

       <NothingFound v-else>
            <BaseButton @click="showCreateDrawer = true" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2">
                <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                {{ __('Add Income') }}
            </BaseButton>
       </NothingFound>

        <!-- <CreateIncome :show="showCreateDrawer" @close-drawer="showCreateDrawer = false"/>
        <EditIncome :show="showEditDrawer" @close-drawer="showEditDrawer = false" :income="editIncome"/> -->
    </AppLayout>
</template>

<script>
// import CreateIncome from "./Create.vue";
// import EditIncome from "./Edit.vue";
import CardSkeleton from "@/Shared/Skeleton/CardSkeleton.vue";

export default {
    components: {
        // CreateIncome,
        // EditIncome,
        CardSkeleton,
    },
    props: {
        billings:{
            type: Array,
            default: () => []
        },
        filter:{
            type: Array,
            default: () => []
        },
        filter_by_date:{
            type: Object,
            default: () => []
        },
    },
    data() {
        return {
            // showCreateDrawer: false,
            // showEditDrawer: false,
            // editIncome: '',

            showSingleDate: this.filter.date_type == 'custom_date' ? true : false,
            showDateRange: this.filter.date_type == 'custom_range_date' ? true : false,

            showFilter: false,
            loading: false,

            filterForm: this.$inertia.form({
                keyword: this.filter.keyword,
                payment_status: this.filter.payment_status,
                date_type: this.filter.date_type,
                custom_date: this.filter.custom_date,
                custom_start_date: this.filter.custom_start_date,
                custom_end_date: this.filter.custom_end_date,
                type: this.filter.type || "all"
            }),
            errors: {},
        }
    },
    methods: {
        handleCustomDate(date) {
            const formatTime = this.formatTime(date, "YYYY-MM-DD");
            this.filterForm.custom_date = formatTime;
        },
        handleCustomRangeDate(date) {
            const array_date = Object.keys(date);
            const startDate = date[array_date[0]];
            const endDate = date[array_date[1]];

            if (!endDate) {
                this.errors.custom_end_date = ['The end date selection is not correct'];
            } else {
                this.errors.custom_end_date = null;
            }

            this.filterForm.custom_start_date = this.formatTime(startDate, "YYYY-MM-DD")
            this.filterForm.custom_end_date = this.formatTime(startDate, "YYYY-MM-DD")
        },
        filterData(){
            this.loading = true
            this.filterForm.get(route('admin.billing.index'), {
                onSuccess: () => {
                    this.loading = false
                },
                onError: () => {
                    this.loading = false
                    alert('Something went wrong')
                },
            })
        },
        editData(income){
            this.showEditDrawer = true
            this.editIncome = income
        },
        markAsPaid(bill_id){
            this.$swal({
                title: "Are you sure?",
                text: "You want to mark this bill as paid?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, mark it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$inertia.post(route("admin.billing.mark-as-paid", bill_id));
                }
            });
        },
        toggleFilter() {
            this.showFilter = !this.showFilter;
            localStorage.setItem("adminIncome", this.showFilter);
        },
    },
    computed:{
        showClearFilter(){
            return this.filter.keyword || this.filter.payment_status || this.filter.date_type || this.filter.custom_date || this.filter.custom_start_date || this.filter.custom_end_date
        }
    },
    watch:{
        "filterForm.date_type": function(val){
            if (val == 'custom_date') {
                this.showSingleDate = true;
                this.showDateRange = false;
            }else if(val == 'custom_range_date'){
                this.showSingleDate = false;
                this.showDateRange = true;
            }else{
                this.showSingleDate = false;
                this.showDateRange = false;
            }
        },
    },
    created() {
        this.showFilter = localStorage.getItem("adminIncome") == "true" ? true: false;
    },
};
</script>

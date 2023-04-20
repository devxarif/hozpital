<template>
    <AppLayout title="Income">

        <!-- Header Part  -->
        <Breadcrumb>
            <BreadcrumbLink title="Income"/>
        </Breadcrumb>

        <div class="mb-4 flex justify-between">
            <h2 class="text-3xl font-semibold leading-7 text-gray-900  sm:text-3xl sm:truncate">
                {{ __('Income') }}
            </h2>

            <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                <div class="ml-6 hidden items-center rounded-lg bg-gray-100 p-0.5 sm:flex">
                    <button @click="changeViewType('table')" type="button" class="rounded-md p-1.5 focus:outline-none text-gray-600 hover:bg-white hover:shadow-sm shadow-sm" :class="viewType == 'table' ? 'bg-white':''">
                        <ListIcon/>
                    </button>
                    <button @click="changeViewType('card')" type="button" class="rounded-md p-1.5 focus:outline-none ml-0.5 text-gray-600 hover:bg-white hover:shadow-sm shadow-sm" :class="viewType == 'card' ? 'bg-white':''">
                        <GridIcon/>
                    </button>
                </div>

                <!-- Clear Filter -->
                <ClearFilter v-if="filter.keyword && filter.keyword.length"  :href="route('admin.income.index')"/>

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
                <BaseButton as="link" :href="route('admin.incomeCategory.index')" class="text-white bg-green-600 hover:bg-green-700 px-4 py-2.5">
                    <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                   {{ __('Income Category') }}
                </BaseButton>
                <BaseButton @click="showCreateDrawer = true" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2.5">
                    <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                   {{ __('Add Income') }}
                </BaseButton>
            </div>
        </div>

        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-100" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <div v-if="showFilter" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 xl:grid-cols-6 gap-5 mb-4 bg-white rounded-lg shadow-xs  items-center p-4">
                <div>
                    <label for="keyword" class="block text-sm font-medium text-gray-700">{{ __('Search') }}</label>
                    <div class="mt-1">
                        <input v-model="filterForm.keyword" type="text" id="keyword" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5" placeholder="Invoice no, title">
                    </div>
                </div>
                <div>
                    <label for="admin_income" class="block text-sm font-medium text-gray-700">{{ __('Category') }}</label>
                    <div class="mt-1">
                        <Multiselect id="admin_income" :close-on-select="true" :can-clear="true"
                            :searchable="true" v-model="filterForm.category" :create-option="false"
                            placeholder="Category" :options="incomes_categories.map(item => ({value: item.id, label: item.name}))"/>
                    </div>
                </div>
                <div>
                    <button @click="filterData" :disabled="loading" type="button" class="text-white bg-blue-600 hover:bg-blue-700 font-medium inline-flex items-center justify-center rounded-lg text-sm px-6 py-2.5 mt-6 text-center sm:w-auto focus:outline-none">
                        <font-awesome-icon icon="fa-solid fa-search" class="h-4 w-4 mr-2"/>
                       {{ __('Search') }}
                    </button>
                </div>
            </div>
        </transition>

        <!-- Body Part  -->
       <CardSkeleton :show="loading" v-if="loading"/>

        <!-- Card View  -->
       <template v-else-if="!loading && incomes && incomes.data.length && viewType == 'card'">
           <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
               <span v-for="income in incomes.data" :key="income.id" class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100   ">
                   <div class="flex flex-wrap justify-between items-start">
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{ income.title }}</h2>

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
                                       <a href="javascript:void(0)" @click.prevent="editData(income)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                           <font-awesome-icon icon="fa-solid fa-pen-to-square" class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500"/>
                                           Edit
                                       </a>
                                   </MenuItem>
                                   <MenuItem v-slot="{ active }">
                                       <a href="javascript:void(0)" @click.prevent="editData(income)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                           <font-awesome-icon icon="fa-solid fa-eye" class="mr-3 h-5 w-5 text-sky-500 group-hover:text-sky-500"/>
                                           Details
                                       </a>
                                   </MenuItem>
                                   <MenuItem v-slot="{ active }">
                                       <a href="javascript:void(0)" @click.prevent="deleteData(income.id)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                           <font-awesome-icon icon="fa-solid fa-trash-can" class="mr-3 h-5 w-5 text-red-500 group-hover:text-red-500"/>
                                           Delete
                                       </a>
                                   </MenuItem>
                                   </div>
                               </MenuItems>
                           </transition>
                       </Menu>
                   </div>

                   <div class="mb-3 font-normal text-gray-700 ">
                        <p v-if="income.income_category && income.income_category.name"><b>Category</b>: <span class="capitalize">{{ income.income_category?.name ?? '' }}</span></p>
                        <p v-if="income.invoice_number"><b>Invoice No</b>: #{{ income.invoice_number }}</p>
                        <p v-if="income.amount"><b>Amount</b>: {{ income.amount }}</p>
                        <p v-if="income.date"><b>Date</b>: {{ income.date }}</p>
                        <p v-if="income.attachment">
                            <b>Attachment</b>: <a href="" class="underline cursor-pointer">{{ __('Download') }}</a>
                        </p>
                    </div>
                   <p class="mb-3 font-normal text-gray-700 ">
                       {{ income.description }}
                   </p>
               </span>
           </div>
           <Pagination :data="incomes" v-if="incomes && incomes.data.length && incomes.total > app_setting.rows_per_page" class="mt-5"/>
       </template>

        <!-- Table View  -->
        <BaseTable v-else-if="!loading && incomes && incomes.data.length && viewType == 'table'" :items="incomes">
            <template v-slot:head>
                <tr class="divide-x divide-gray-200">
                    <th class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Invoice No</th>
                    <th class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Title</th>
                    <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 break-words">Category</th>
                    <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 break-words">Amount</th>
                    <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 break-words">Date</th>
                    <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 break-words">Attachment</th>
                    <th width="80px" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-6">Action</th>
                </tr>
            </template>
            <template v-slot:body>
                <tr v-for="income in incomes.data" :key="income.id" class="divide-x divide-gray-200">
                    <td class="p-4 text-sm text-gray-500 break-all">
                        #{{ income.invoice_number }}
                    </td>
                    <td class="p-4 text-sm text-gray-500 break-all">
                        {{ income.title }}
                    </td>
                    <td class="p-4 text-sm text-gray-500 break-all">
                        {{ income.income_category?.name ?? '' }}
                    </td>
                    <td class="p-4 text-sm text-gray-500 break-all">
                        {{ income.amount }}
                    </td>
                    <td class="p-4 text-sm text-gray-500 break-all">
                        {{ income.date }}
                    </td>
                    <td class="p-4 text-sm text-gray-500 break-all">
                        <a href="" class="underline cursor-pointer">{{ __('Download') }}</a>
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
                                        <a href="javascript:void(0)" @click.prevent="editData(income)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                            <font-awesome-icon icon="fa-solid fa-pen-to-square" class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500"/>
                                            Edit
                                        </a>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <a href="javascript:void(0)" @click.prevent="editData(income)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                            <font-awesome-icon icon="fa-solid fa-eye" class="mr-3 h-5 w-5 text-sky-500 group-hover:text-sky-500"/>
                                            Details
                                        </a>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <a href="javascript:void(0)" @click.prevent="deleteData(income.id)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
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
            </template>
        </BaseTable>

       <NothingFound v-else>
            <BaseButton @click="showCreateDrawer = true" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2">
                <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                {{ __('Add Income') }}
            </BaseButton>
       </NothingFound>

        <CreateIncome :show="showCreateDrawer" @close-drawer="showCreateDrawer = false"/>
        <EditIncome :show="showEditDrawer" @close-drawer="showEditDrawer = false" :income="editIncome"/>
    </AppLayout>
</template>

<script>
import CreateIncome from "./Create.vue";
import EditIncome from "./Edit.vue";
import CardSkeleton from "@/Shared/Skeleton/CardSkeleton.vue";

export default {
    components: {
        CreateIncome,
        EditIncome,
        CardSkeleton,
    },
    props: {
        incomes:{
            type: Array,
            default: () => []
        },
        incomes_categories:{
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
            viewType: 'card',
            showCreateDrawer: false,
            showEditDrawer: false,
            editIncome: '',

            showFilter: false,
            loading: false,

            filterForm: this.$inertia.form({
                keyword: this.filter.keyword,
                category: this.filter.category,
            }),
        }
    },
    methods: {
        changeViewType(type){
            this.viewType = type
            localStorage.setItem("adminIncomeViewType", this.viewType);
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
                    this.$inertia.delete(route("admin.income.destroy", id));
                }
            });
        },
        editData(income){
            this.showEditDrawer = true
            this.editIncome = income
        },
        filterData(){
            this.loading = true
            this.filterForm.get(route('admin.income.index'), {
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
            localStorage.setItem("adminIncome", this.showFilter);
        },
    },
    created() {
        this.showFilter = localStorage.getItem("adminIncome") == "true" ? true: false;
        this.viewType = localStorage.getItem("adminIncomeViewType") == "card" ? 'card': 'table';
    },
};
</script>

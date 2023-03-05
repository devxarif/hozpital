<template>
    <AppLayout title="Product">
        <!-- Header Part  -->
        <Breadcrumb>
            <BreadcrumbLink title="Product"/>
        </Breadcrumb>

        <div class="mb-4 flex justify-between">
            <h2 class="text-3xl font-semibold leading-7 text-gray-900  sm:text-3xl sm:truncate">
                {{ __('Product') }}
            </h2>

            <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                <div class="ml-6 hidden items-center rounded-lg bg-gray-100 p-0.5 sm:flex">
                    <button @click="changeViewType('table')" type="button" class="rounded-md p-1.5 focus:outline-none text-gray-600 hover:bg-white hover:shadow-sm shadow-sm" :class="viewType == 'table' ? 'bg-white':''">
                        <GridIcon/>
                    </button>
                    <button @click="changeViewType('card')" type="button" class="rounded-md p-1.5 focus:outline-none ml-0.5 text-gray-600 hover:bg-white hover:shadow-sm shadow-sm" :class="viewType == 'card' ? 'bg-white':''">
                        <ListIcon/>
                    </button>
                </div>

                <!-- Clear Filter -->
                <ClearFilter v-if="filter.keyword && filter.keyword.length" as="link" :href="route('admin.product.index')"/>

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
                <BaseButton @click="showCreateDrawer = true" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2.5">
                    <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                   {{ __('Add Product') }}
                </BaseButton>
            </div>
        </div>

        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-100" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <div v-if="showFilter" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 xl:grid-cols-6 gap-5 mb-4 bg-white rounded-lg shadow-xs  items-center p-4">
                <div>
                    <label for="keyword" class="block text-sm font-medium text-gray-700">{{ __('Search') }}</label>
                    <div class="mt-1">
                        <input v-model="filterForm.keyword" type="text" id="keyword" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2.5" placeholder="Product name">
                    </div>
                </div>
                <div>
                    <label for="admin_product_category" class="block text-sm font-medium text-gray-700">{{ __('Product Category') }}</label>
                    <div class="mt-1">
                        <Multiselect id="admin_product_category" :close-on-select="true" :can-clear="false"
                            :searchable="true" v-model="filterForm.product_category" :create-option="false"
                            placeholder="Product Category" :options="product_categories.map(item => ({
                                value: item.id, label: item.name
                            }))"  />
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

        <div class="mb-5">
            <div class="hidden sm:block">
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <button type="button" @click="changeTab('all')" :class="['whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', filterForm.type == 'all' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            All
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="filterForm.type == 'all' ? 'bg-blue-100 text-blue-600':'bg-gray-100 text-gray-900'">
                                {{ count_request.all }}
                            </span>
                        </button>
                        <button type="button" @click="changeTab('medicine')" :class="['whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', filterForm.type == 'medicine' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            Medicine
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="filterForm.type == 'medicine' ? 'bg-blue-100 text-blue-600':'bg-gray-100 text-gray-900'">
                                {{ count_request.medicine }}
                            </span>
                        </button>
                        <button type="button" @click="changeTab('others')" :class="['whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm focus:outline-none', filterForm.type == 'others' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            Others
                            <span class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block" :class="filterForm.type == 'others' ? 'bg-blue-100 text-blue-600':'bg-gray-100 text-gray-900'">
                                {{ count_request.others }}
                            </span>
                        </button>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Body Part  -->
       <CardSkeleton :show="loading" v-if="loading"/>

        <!-- Card View  -->
       <template v-else-if="!loading && products && products.data.length && viewType == 'card'">
           <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
               <span v-for="product in products.data" :key="product.id" class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100   ">
                   <div class="flex flex-wrap justify-between items-start">
                       <div class="relative mb-5">
                           <span>
                               <img class="w-16 h-16 rounded object-cover" alt="image" :src="product.image">
                           </span>
                       </div>
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
                                       <a href="javascript:void(0)" @click.prevent="editData(product)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                           <font-awesome-icon icon="fa-solid fa-pen-to-square" class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500"/>
                                           Edit
                                       </a>
                                   </MenuItem>
                                   <MenuItem v-slot="{ active }">
                                       <a href="javascript:void(0)" @click.prevent="editData(product)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                           <font-awesome-icon icon="fa-solid fa-eye" class="mr-3 h-5 w-5 text-sky-500 group-hover:text-sky-500"/>
                                           Details
                                       </a>
                                   </MenuItem>
                                   <MenuItem v-slot="{ active }">
                                       <a href="javascript:void(0)" @click.prevent="deleteData(product.id)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                           <font-awesome-icon icon="fa-solid fa-trash-can" class="mr-3 h-5 w-5 text-red-500 group-hover:text-red-500"/>
                                           Delete
                                       </a>
                                   </MenuItem>
                                   </div>
                               </MenuItems>
                           </transition>
                       </Menu>
                    </div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{ product.name }}</h2>
                    <p v-if="product.product_category && product.product_category.name"><b>Category:</b> {{ product.product_category.name }}</p>
                    <div class="flex justify-between">
                        <p v-if="product.buying_price"><b>Buying Price:</b> {{ product.buying_price }}</p>
                        <p v-if="product.selling_price"><b>Selling Price:</b> {{ product.selling_price }}</p>
                    </div>
                    <p v-if="product.quantity"><b>Quantity:</b> {{ product.quantity }}</p>
                    <p v-if="product.expire_date"><b>Expire Date:</b> {{ formateDate(product.expire_date) }}</p>
                    <div class="mt-5">
                        <span :class="product.type == 'medicine' ? 'bg-green-500':'bg-cyan-500'" class="text-white text-sm font-medium mr-2 px-3 py-2 rounded-full   capitalize">
                            {{ product.type }}
                        </span>
                    </div>
               </span>
           </div>
           <Pagination :data="products" v-if="products && products.data.length && products.total > 20" class="my-5"/>
       </template>

        <!-- Table View  -->
        <BaseTable v-else-if="!loading && products && products.data.length && viewType == 'table'" :items="products">
            <template v-slot:head>
                <tr class="divide-x divide-gray-200">
                    <th class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                    <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 break-words">Category</th>
                    <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 break-words">Price</th>
                    <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 break-words">Type</th>
                    <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 break-words">Expire Date</th>
                    <th width="80px" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-6">Action</th>
                </tr>
            </template>
            <template v-slot:body>
                <tr v-for="product in products.data" :key="product.id" class="divide-x divide-gray-200">
                    <td class="py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                        <div class="flex items-center">
                            <img class="h-16 w-16 rounded-md object-cover" :src="product.image" alt="">
                            <div class="ml-4">
                                <div class="font-medium text-gray-900">{{ product.name }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 text-sm text-gray-500 break-all">
                        <a href="">
                            {{ product.product_category.name }}
                        </a>
                    </td>
                    <td class="p-4 text-sm text-gray-500 break-all">
                        <p v-if="product.buying_price"><b>Buying Price:</b> {{ product.buying_price }}</p>
                        <p v-if="product.selling_price"><b>Selling Price:</b> {{ product.selling_price }}</p>
                        <p v-if="product.selling_price"><b>Available Quantity:</b> {{ product.quantity }}</p>
                    </td>
                    <td class="p-4 text-sm text-gray-500 break-all">
                        <span :class="product.type == 'medicine' ? 'bg-green-500':'bg-cyan-500'" class="text-white text-sm font-medium mr-2 px-3 py-2 rounded-full   capitalize">
                            {{ product.type }}
                        </span>
                    </td>
                    <td class="p-4 text-sm text-gray-500 break-all">
                        {{ formateDate(product.expire_date) }}
                    </td>



                    <!-- <div class="flex justify-between">
                        <p v-if="product.buying_price"><b>Buying Price:</b> {{ product.buying_price }}</p>
                        <p v-if="product.selling_price"><b>Selling Price:</b> {{ product.selling_price }}</p>
                    </div>
                    <p v-if="product.quantity"><b>Quantity:</b> {{ product.quantity }}</p>
                    <p v-if="product.expire_date"><b>Expire Date:</b> {{ formateDate(product.expire_date) }}</p>
                    <div class="mt-5">
                        <span :class="product.type == 'medicine' ? 'bg-green-500':'bg-cyan-500'" class="text-white text-sm font-medium mr-2 px-3 py-2 rounded-full   capitalize">
                            {{ product.type }}
                        </span>
                    </div> -->



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
                                        <a href="javascript:void(0)" @click.prevent="editData(product)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                            <font-awesome-icon icon="fa-solid fa-pen-to-square" class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500"/>
                                            Edit
                                        </a>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <a href="javascript:void(0)" @click.prevent="editData(product)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                            <font-awesome-icon icon="fa-solid fa-eye" class="mr-3 h-5 w-5 text-sky-500 group-hover:text-sky-500"/>
                                            Details
                                        </a>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <a href="javascript:void(0)" @click.prevent="deleteData(product.id)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
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
                {{ __('Add Product') }}
            </BaseButton>
       </NothingFound>

        <CreateProductCategory :show="showCreateDrawer" @close-drawer="showCreateDrawer = false"/>
        <EditProductCategory v-if="showEditDrawer" :show="showEditDrawer" @close-drawer="showEditDrawer = false" :product="editProduct"/>
    </AppLayout>
</template>

<script>
import CreateProductCategory from "./Create.vue";
import EditProductCategory from "./Edit.vue";
import CardSkeleton from "@/Shared/Skeleton/CardSkeleton.vue";

export default {
    components: {
        CreateProductCategory,
        EditProductCategory,
        CardSkeleton,
    },
    props: {
        products:{
            type: Array,
            default: () => []
        },
        product_categories:{
            type: Array,
            default: () => []
        },
        count_request:{
            type: Object,
            default: () => {}
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
            editProduct: '',

            showFilter: false,
            loading: false,

            filterForm: this.$inertia.form({
                keyword: this.filter.keyword,
                type: this.filter.type || 'all',
                product_category: this.filter.product_category,
            }),
        }
    },
    methods: {
        changeViewType(type){
            this.viewType = type
            localStorage.setItem("adminProductView", this.viewType);
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
                    this.$inertia.delete(route("admin.product.destroy", id));
                }
            });
        },
        async changeTab(tab) {
            this.filterForm.type = tab;
            this.filterForm.get(route("admin.product.index"));
        },
        editData(product){
            this.showEditDrawer = true
            this.editProduct = product
        },
        filterData(){
            this.loading = true
            this.filterForm.get(route('admin.product.index'), {
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
            localStorage.setItem("adminProduct", this.showFilter);
        },
    },
    created() {
        this.showFilter = localStorage.getItem("adminProduct") == "true" ? true: false;
        this.viewType = localStorage.getItem("adminProductView") == "card" ? 'card': 'table';
    },
};
</script>

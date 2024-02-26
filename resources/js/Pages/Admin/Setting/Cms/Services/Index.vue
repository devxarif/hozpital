<template>
    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
        <div class="space-y-6 sm:space-y-5">
            <div class="flex justify-between">
                <div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Services List</h2>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed publicly so be
                    careful what you share.</p>
                </div>
                <button @click="showCreateDrawer = true" type="button" class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-md text-sm px-3 py-2.5 mb-2   focus:outline-none  mt-3">
                    <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                    {{ __('Add Service') }}
                </button>
            </div>

            <div class="flex flex-col mb-5 shadow-md">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="w-full divide-y divide-gray-300 table-fixed">
                                <thead class="bg-gray-200">
                                    <tr class="divide-x divide-gray-200">
                                        <th class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                                        <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 break-words">Short Description</th>
                                        <th width="80px" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-6">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr v-for="service in data" :key="service.id" class="divide-x divide-gray-200">
                                        <td class="py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                            <div class="flex items-center">
                                                <img class="h-16 w-16 rounded-md object-cover" :src="service.image_url" :alt="service.name+' service image'">
                                                <div class="ml-4">
                                                    <div class="font-medium text-gray-900">{{ service.name }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 text-sm text-gray-500 break-all">
                                            {{ service.short_description }}
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
                                                            <a href="javascript:void(0)" @click.prevent="editData(service)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                                <font-awesome-icon icon="fa-solid fa-pen-to-square" class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500"/>
                                                                Edit
                                                            </a>
                                                        </MenuItem>
                                                        <MenuItem v-slot="{ active }">
                                                            <a href="javascript:void(0)" @click.prevent="editData(service)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                                <font-awesome-icon icon="fa-solid fa-eye" class="mr-3 h-5 w-5 text-sky-500 group-hover:text-sky-500"/>
                                                                Details
                                                            </a>
                                                        </MenuItem>
                                                        <MenuItem v-slot="{ active }">
                                                            <a href="javascript:void(0)" @click.prevent="deleteData(service.id)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
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

                            <!-- <Pagination :data="items" v-if="pagination && items && items.data.length && items.total > app_setting.rows_per_page"/> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <CreateService v-show="showCreateDrawer" :show="showCreateDrawer" @close-drawer="showCreateDrawer = false"/>
    <!-- <EditPatient v-show="showEditDrawer && editPatient" :show="showEditDrawer" @close-drawer="showEditDrawer = false" :patient="editPatient"/> -->
</template>


<script>
import CreateService from "./Create.vue";
    // import EditPatient from "./Edit.vue";
export default {
    components: {
        CreateService,
        // EditPatient,
    },
    props: {
        data: Object,
    },
    data() {
        return {
            services: this.data,
            showCreateDrawer: false,
            showEditDrawer: false,
            form: this.$inertia.form({
                flw_public_key: 'sadasd',
                // flw_secret: this.data.flw_secret,
                // flw_secret_hash: this.data.flw_secret_hash,
                // flw_conversion_rate: this.data.flw_conversion_rate,
                // flw_active: this.data.flw_active ? 1 : 0,
                // provider: "flutterwave",
            }),
        };
    },
    methods: {
        // statusChange(event) {
        //     if (event.target.checked == true) {
        //         this.form.flw_active = 1;
        //     } else {
        //         this.form.flw_active = 0;
        //     }
        // },
        // updateData() {
        //     this.form.put(route("admin.settings.payment.update"));
        // },
    },
    watch: {
        data: {
            handler() {
                this.services = this.data;
                // this.form.flw_public_key = this.data.flw_public_key;
                // this.form.flw_secret = this.data.flw_secret;
                // this.form.flw_secret_hash = this.data.flw_secret_hash;
                // this.form.flw_conversion_rate = this.data.flw_conversion_rate;
                // this.form.flw_active = this.data.flw_active ? 1 : 0;
            },
            deep: true,
        },
    },
};
</script>

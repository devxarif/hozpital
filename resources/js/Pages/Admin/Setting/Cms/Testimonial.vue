<template>
    <form @submit.prevent="updateData" class="space-y-8 divide-y divide-gray-200">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div class="space-y-6 sm:space-y-5">
                <div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Testimonial List</h2>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed publicly so be
                        careful what you share.</p>
                </div>

                <div class="flex flex-col mb-5 shadow-md">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="w-full divide-y divide-gray-300 table-fixed">
                                    <thead class="bg-gray-200">
                                        <tr class="divide-x divide-gray-200">
                                            <th class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                                            <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 break-words">Description</th>
                                            <th width="80px" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-6">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        <tr class="divide-x divide-gray-200">
                                            <td class="py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                                <div class="flex items-center">
                                                    <img class="h-16 w-16 rounded-md object-cover" src="" alt="">
                                                    <div class="ml-4">
                                                        <div class="font-medium text-gray-900">Hello</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-4 text-sm text-gray-500 break-all">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, iure dicta neque fugiat placeat quis! Molestias eum porro provident. Et eius, labore ut quo pariatur maxime sed at magnam aut.
                                            </td>
                                            <!-- <td class="py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-6">
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
                                                                <a href="javascript:void(0)" @click.prevent="editData(department)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                                    <font-awesome-icon icon="fa-solid fa-pen-to-square" class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500"/>
                                                                    Edit
                                                                </a>
                                                            </MenuItem>
                                                            <MenuItem v-slot="{ active }">
                                                                <a href="javascript:void(0)" @click.prevent="editData(department)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                                    <font-awesome-icon icon="fa-solid fa-eye" class="mr-3 h-5 w-5 text-sky-500 group-hover:text-sky-500"/>
                                                                    Details
                                                                </a>
                                                            </MenuItem>
                                                            <MenuItem v-slot="{ active }">
                                                                <a href="javascript:void(0)" @click.prevent="deleteData(department.id)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                                    <font-awesome-icon icon="fa-solid fa-trash-can" class="mr-3 h-5 w-5 text-red-500 group-hover:text-red-500"/>
                                                                    Delete
                                                                </a>
                                                            </MenuItem>
                                                            </div>
                                                        </MenuItems>
                                                    </transition>
                                                </Menu>
                                            </td> -->
                                        </tr>
                                        <!-- <tr v-for="department in departments.data" :key="department.id" class="divide-x divide-gray-200">
                                            <td class="py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                                <div class="flex items-center">
                                                    <img class="h-16 w-16 rounded-md object-cover" :src="department.image" alt="">
                                                    <div class="ml-4">
                                                        <div class="font-medium text-gray-900">{{ department.name }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-4 text-sm text-gray-500 break-all">
                                                {{ department.description }}
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
                                                                <a href="javascript:void(0)" @click.prevent="editData(department)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                                    <font-awesome-icon icon="fa-solid fa-pen-to-square" class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500"/>
                                                                    Edit
                                                                </a>
                                                            </MenuItem>
                                                            <MenuItem v-slot="{ active }">
                                                                <a href="javascript:void(0)" @click.prevent="editData(department)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                                    <font-awesome-icon icon="fa-solid fa-eye" class="mr-3 h-5 w-5 text-sky-500 group-hover:text-sky-500"/>
                                                                    Details
                                                                </a>
                                                            </MenuItem>
                                                            <MenuItem v-slot="{ active }">
                                                                <a href="javascript:void(0)" @click.prevent="deleteData(department.id)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                                    <font-awesome-icon icon="fa-solid fa-trash-can" class="mr-3 h-5 w-5 text-red-500 group-hover:text-red-500"/>
                                                                    Delete
                                                                </a>
                                                            </MenuItem>
                                                            </div>
                                                        </MenuItems>
                                                    </transition>
                                                </Menu>
                                            </td>
                                        </tr> -->
                                    </tbody>
                                </table>

                                <!-- <Pagination :data="items" v-if="pagination && items && items.data.length && items.total > app_setting.rows_per_page"/> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <Label name="Public Key" id="flw_public_key" :hasError="form.errors.flw_public_key"/>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <div class="max-w-lg rounded-md shadow-sm">
                                <BaseInput v-model="form.flw_public_key" placeholder="Public Key" id="flw_public_key" :hasError="form.errors.flw_public_key"/>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <Label name="Conversion Rate" id="flw_conversion_rate" :hasError="form.errors.flw_conversion_rate"/>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <div class="flex max-w-lg rounded-md shadow-sm">
                                <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 p-2.5 text-gray-500 sm:text-sm">1 USD</span>
                                <input type="text" id="username" autocomplete="off" class="block w-full min-w-0 flex-1 border-0 p-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6" v-model="form.flw_conversion_rate">
                                <span class="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 p-2.5 text-gray-500 sm:text-sm">NGN</span>
                            </div>
                            <ErrorMessage :name="form.errors.flw_conversion_rate" />
                        </div>
                    </div> -->
                    <!-- <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <Label name="Status" id="flw_status" :hasError="form.errors.flw_active"/>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <label for="checked-toggle" class="inline-flex relative items-center cursor-pointer">
                                <input @change="statusChange" v-model="form.flw_active" type="checkbox" id="checked-toggle"
                                    class="sr-only peer" :checked="form.flw_active">
                                <div
                                    class="w-11 h-6 bg-gray-200 rounded-full peer   peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                </div>
                            </label>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <button :disabled="form.processing" type="submit"
                    class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-md px-5 py-2.5 mb-2   focus:outline-none  mt-3">
                    <Loading v-if="form.processing" :messageShow="false" />
                    <span v-else>
                        <svg class="inline w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none" />
                            <polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="24" points="216 72.005 104 184 48 128.005" /></svg>
                        {{ __('Save') }}
                    </span>
                </button>
            </div>
        </div>
    </form>
</template>


<script>
export default {
    props: {
        data: Object,
    },
    data() {
        return {
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

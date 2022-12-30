<template>
    <Head :title="__('Admin List')"/>
    <AppLayout>


        <!-- <button type="button"
            class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center gap-2 h-[2.375rem] w-[2.375rem] rounded-full font-medium bg-white text-gray-700 align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-xs dark:bg-gray-800 dark:hover:bg-slate-800 dark:text-gray-400 dark:hover:text-white dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800"
            data-hs-offcanvas="#hs-offcanvas-right">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 16 16">
                <path
                    d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z" />
                <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            </svg>
        </button>

        <div id="hs-offcanvas-right"
        class="hs-offcanvas hs-offcanvas-open:translate-x-0 translate-x-full fixed top-0 right-0 transition-all duration-300 transform h-full max-w-xs w-full z-[60] bg-white border-l dark:bg-gray-800 dark:border-gray-700"
        tabindex="-1">
        <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
            <h3 class="font-bold text-gray-800 dark:text-white">
                Offcanvas title
            </h3>
            <button type="button"
                class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white text-sm dark:text-gray-500 dark:hover:text-gray-400 dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800"
                data-hs-offcanvas="#hs-offcanvas-right">
                <span class="sr-only">Close modal</span>
                <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                        fill="currentColor" />
                </svg>
            </button>
        </div>
        <div class="p-4">
            <p class="text-gray-800 dark:text-gray-400">
                Some text as placeholder. In real life you can have the
                elements you have chosen. Like, text, images, lists, etc.
            </p>
        </div>
    </div> -->

        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-3xl font-semibold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Roles
                </h2>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <a @click="showCreateDrawer" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent font-medium text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition sm:text-sm rounded-full"
                    href="javascript:void(0)">
                    <span class="mr-3">
                        <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                            stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                    </span>
                    Add Role
                </a>
            </div>
        </div>
        <!-- component -->
        <div class="bg-white shadow sm:rounded-lg mt-6 -mx-4 sm:-mx-0 overflow-hidden">
            <div class="px-4 py-6 sm:p-6">
                <div class="overflow-x-auto -mx-4 -my-6 sm:-m-6">
                    <div class="align-middle inline-block min-w-full">
                        <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-slate-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" width="10%">
                                            {{ __('Name') }}
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" width="40%">
                                            {{ __('Description') }}
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" width="50%">
                                            {{ __('Permissions') }}
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" width="10%">
                                            {{ __('Actions') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <template v-if="roles && roles.data.length">
                                        <tr class="relative hover:bg-slate-50" v-for="(role,index) in roles.data" :key="index">
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <span :style="{ background: role.color, border: '2px solid '+role.color }" class="leave-type-color">
                                                    {{ role.name }}
                                                </span>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 text-sm text-gray-900">
                                                <span class="text-sm break-words">
                                                    {{ role.description }}
                                                </span>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <button @click="permissionShow(role.id)" :class="show == role.id ? 'hidden' : ''"
                                                    type="button" class="group relative">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" /></svg>
                                                </button>
                                                <button @click="permissionHide(role.id)" :class="hide == role.id ? '' : 'hidden'"
                                                    type="button" class="group relative">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                                </button>
                                                <div :class="hide == role.id ? '' : 'hidden'" class="flex flex-wrap gap-2 text-center">
                                                    <template v-if="role.permissions.length > 0">
                                                        <span v-for="per in role.permissions" :key="per.id" class="bg-blue-500 text-white text-sm py-0.5 dark:bg-blue-200 dark:text-blue-800 p-1  rounded font-bold">{{ per.name }}</span>
                                                    </template>
                                                    <template v-else>
                                                        <div class="bg-blue-500 text-white p-1 px-3 rounded font-bold">
                                                            No Permission
                                                        </div>
                                                    </template>
                                                </div>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-right text-gray-900 tabular-nums">
                                                <div class="flex">
                                                    <div class="mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer" @click="editSelectedData(role.id)">
                                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24">
                                                            <path
                                                                d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z" />
                                                        </svg>
                                                    </div>
                                                    <div class="mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer" @click="deleteSelectedData(role.id)">
                                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
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

                            <Pagination :data="roles" v-if="roles && roles.data.length" />
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <CreateRole v-if="isPermitCreateDrawer" :show="isShowCreateDrawer" @close-drawer="closeDrawer('create')" :permissions="permissions" />
        <EditRole v-if="isPermitEditDrawer" :show="isShowEditDrawer" @close-drawer="closeDrawer('edit')" :role="editRole" :permissions="editPermissions"/>
    </AppLayout>
</template>


<script>
import Pagination from "../../../Shared/Pagination.vue";
import { Inertia } from "@inertiajs/inertia";
import CreateRole from "./Create.vue";
import EditRole from "./Edit.vue";

export default {
    props: {
        roles: Object,
        permissions: Array,
        filters: Object || Array,
    },
    components: {
        Pagination,
        Inertia,
        CreateRole,
        EditRole
    },
    data() {
        return {
            isPermitCreateDrawer: false,
            isPermitEditDrawer: false,
            isShowCreateDrawer: false,
            isShowEditDrawer: false,
            show: "",
            hide: "",
            editRole: '',
            editPermissions: '',
        };
    },
    methods: {
         permissionShow(id) {
            this.show = id;
            this.hide = id;
        },
        permissionHide() {
            this.show = "";
            this.hide = "";
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
        async editSelectedData(id){
            let response = await axios.get(route('roles.edit', id));
            this.editRole = response.data.role
            this.editPermissions = response.data.permissions
            this.isPermitEditDrawer = true
            setTimeout(() => {
                this.isShowEditDrawer = true
            }, 5);
        },
        deleteSelectedData(id) {
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
                    this.$inertia.delete(route("roles.destroy", id));
                }
            });
        },
    },
    mounted() {
        this.checkPagePermission("admin");
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
</style>

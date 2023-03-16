<template>
    <SettingLayout title="Roles & Permission">
        <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-1">
            <div class="bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <form @submit.prevent="updateData" class="space-y-8 divide-y divide-gray-200">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div class="space-y-6 sm:space-y-5">
                            <div class="flex justify-between">
                                <div>
                                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Roles & Permission</h2>
                                    <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed publicly so be careful what you share.</p>
                                </div>
                                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                    <button @click="showCreateDrawer = true" type="button" class="relative inline-flex items-center rounded-md border border-gray-300 bg-blue-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-blue-700 focus:z-10 focus:outline-none focus:ring-1">
                                        <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                                        {{ __('Add Role') }}
                                    </button>
                                </div>
                            </div>
                            <div class="sm:border-t sm:border-gray-200 sm:pt-5">
                                <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                                    <span v-for="role in roles" :key="role.id" class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100">
                                        <h2 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">{{ role.name }}</h2>
                                        <p class="mb-3 font-normal text-gray-700 ">
                                            {{ role.description }}
                                        </p>

                                        <div class="flex gap-3 mt-4">
                                            <a v-tooltip="'View Permissions'" href="javascript:void(0)" @click.prevent="detailsData(role)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center py-2']">
                                                <font-awesome-icon icon="fa-solid fa-eye" class=" h-5 w-5 text-sky-500 group-hover:text-sky-500" />
                                            </a>
                                            <a v-tooltip="'Edit'" href="javascript:void(0)" @click.prevent="editData(role)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center py-2']">
                                                <font-awesome-icon icon="fa-solid fa-pen-to-square" class=" h-5 w-5 text-blue-500 group-hover:text-blue-500" />
                                            </a>
                                            <a v-tooltip="'Delete'" href="javascript:void(0)" @click.prevent="deleteData(role.id)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center py-2']">
                                                <font-awesome-icon icon="fa-solid fa-trash-can" class=" h-5 w-5 text-red-500 group-hover:text-red-500" />
                                            </a>
                                        </div>

                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <CreateRole :show="showCreateDrawer" @close-drawer="cshowCreateDrawer = false" :permissions="permissions" />
        <EditRole v-if="showEditDrawer" :show="showEditDrawer" @close-drawer="showEditDrawer = false" :role="editRole" :permissions="editPermissions"/>
        <ShowPermissionModal :show="showPermissionDetailsModal" @close-modal="showPermissionDetailsModal = false" :permissions="permissions" :role="role"/>
    </SettingLayout>
</template>

<script>
import SettingLayout from "@/Shared/Layout/Setting.vue";
import CreateRole from "./Create.vue";
import EditRole from "./Edit.vue";
import ShowPermissionModal from './PermissionModal.vue'

export default {
    components: {
        SettingLayout,
        CreateRole,
        ShowPermissionModal,
        EditRole
    },
    props: {
        roles: {
            type: Array,
            required: true,
        }
    },
    data() {
        return {
            showCreateDrawer: false,
            showEditDrawer: false,
            showPermissionDetailsModal: false,
            editRole: '',
            editPermissions: '',

            permissions: [],
            role: [],
        };
    },
    methods: {
        async editData(id){
            let response = await axios.get(route('admin.settings.roles.edit', id));
            console.log(response)
            this.editRole = response.data.role
            this.editPermissions = response.data.permissions
            this.showEditDrawer = true
        },
        detailsData(role) {
            this.showPermissionDetailsModal = true;

            const groupBy = (array, key) => {
                return array.reduce((result, currentValue) => {
                    (result[currentValue[key]] =
                        result[currentValue[key]] || []).push(currentValue);
                    return result;
                }, {});
            };

            this.permissions = groupBy(role.permissions, "group_name");
            this.role = role;
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
                    this.$inertia.delete(route("admin.settings.roles.destroy", id));
                }
            });
        },
    },
};
</script>

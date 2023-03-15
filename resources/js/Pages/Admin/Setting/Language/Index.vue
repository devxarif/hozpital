<template>
    <SettingLayout title="Languages">
        <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-1">
            <div class="bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <form @submit.prevent="updateData" class="space-y-8 divide-y divide-gray-200">
                    <!-- To change language key phrases, go your language directory e.g. for English language go edit file /application/language/English/app_files/system_lang.php -->

                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div class="space-y-6 sm:space-y-5">
                            <div class="flex justify-between">
                                <div>
                                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Languages</h2>
                                    <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed publicly so be careful what you share.</p>
                                </div>
                                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                    <button @click="showCreateDrawer = true" type="button" class="relative inline-flex items-center rounded-md border border-gray-300 bg-blue-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-blue-700 focus:z-10 focus:outline-none focus:ring-1">
                                        <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                                        {{ __('Add Language') }}
                                    </button>
                                </div>
                            </div>





                            <div class="sm:border-t sm:border-gray-200 sm:pt-5">
                                <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                                    <template v-for="language in languages" :key="language.id">
                                        <span class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100">
                                           <div class="flex justify-between">
                                                <div>
                                                    <img class="h-10 w-10 rounded-lg" :src="`/assets/img/flags/${language.country_code}.svg`" alt="">
                                                    <h2 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">{{ language.name }} ({{ language.language_code }})</h2>
                                                </div>
                                                <div class="text-sm">
                                                    <label class="relative inline-flex items-center mb-4 cursor-pointer">
                                                        <input @change="changeStatus" :value="language.id" :checked="language.status" type="checkbox" class="sr-only peer">
                                                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-green-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-green-600"></div>
                                                    </label>
                                                </div>
                                           </div>

                                            <div class="flex gap-3 mt-4">
                                                <a v-tooltip="'Edit'" href="javascript:void(0)" @click.prevent="editData(language)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center py-2']">
                                                    <font-awesome-icon icon="fa-solid fa-pen-to-square" class=" h-5 w-5 text-blue-500 group-hover:text-blue-500" />
                                                </a>
                                                <a v-tooltip="'Delete'" href="javascript:void(0)" @click.prevent="deleteData(language.id)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center py-2']">
                                                    <font-awesome-icon icon="fa-solid fa-trash-can" class=" h-5 w-5 text-red-500 group-hover:text-red-500" />
                                                </a>
                                                <a v-tooltip="'Translate Language'" href="javascript:void(0)" @click.prevent="deleteData(language.id)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center py-2']">
                                                    <font-awesome-icon icon="fa-solid fa-language" class=" h-5 w-5 text-sky-500 group-hover:text-sky-500" />
                                                </a>
                                            </div>
                                        </span>
                                    </template>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <CreateLanguage :show="showCreateDrawer" @close-drawer="showCreateDrawer = false"/>
        <!--
        <EditRole v-if="showEditDrawer" :show="showEditDrawer" @close-drawer="showEditDrawer = false" :role="editRole" :permissions="editPermissions"/>
        <ShowPermissionModal :show="showPermissionDetailsModal" @close-modal="showPermissionDetailsModal = false" :permissions="permissions" :role="role"/> -->
    </SettingLayout>
</template>

<script>
import SettingLayout from "@/Shared/Layout/Setting.vue";
import CreateLanguage from "./Create.vue";
// import EditRole from "./Edit.vue";
// import ShowPermissionModal from './PermissionModal.vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faLanguage} from '@fortawesome/free-solid-svg-icons'
library.add(faLanguage)

export default {
    components: {
        SettingLayout,
        CreateLanguage,
        // ShowPermissionModal,
        // EditRole
    },
    props: {
        languages: {
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

            langId: '',
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

        changeStatus(e){
            console.log(e.target.checked)
            console.log(e.target.value)
            // console.log(id)

            this.$inertia.post(route('admin.settings.language.status'), {
                status: e.target.checked,
                id: e.target.value
            })
        },





        saveData() {
            this.isEditMode ? this.updateData() : this.createData();
        },
        createData() {
            this.form.post(route("admin.setting.languages.store"), {
                onSuccess: () => this.form.reset(),
            });
        },
        editLanguage(language) {
            this.isEditMode = true;
            this.selectedId = language.id;
            this.form.name = language.name;
            this.form.code = language.code;
        },
        cancelEdit() {
            this.isEditMode = false;
            this.form.reset();
        },
        updateData() {
            this.form.put(route("admin.setting.languages.update", this.selectedId), {
                onSuccess: () => {
                    this.isEditMode = false;
                    this.form.reset();
                },
            });
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
                    this.$inertia.delete(route("admin.settings.languages.destroy", id));
                }
            });
        },
        languageStatusUpdate(id) {
            this.$inertia.put(route("admin.setting.languages.status.update", id));
        },
        statusChange(event) {
            this.form.status = event.target.checked;
        },
        setDefaultLanguage() {
            this.$inertia.put(
                route("admin.setting.languages.set.default", this.default_language)
            );
        },
        languageAutoComplete(){
            let objects = Object.keys(this.langInfos);
            for (let i = 0; i < objects.length; i++) {
                if (this.langInfos[objects[i]]['name'] == this.form.name) {
                    this.form.code = this.langInfos[objects[i]]['code'];
                }
            }
        },
    },
};
</script>

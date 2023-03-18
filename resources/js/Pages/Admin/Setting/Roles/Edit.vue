<template>
    <Transition name="slide-fade">
        <div class="fixed inset-0 overflow-hidden z-50" v-if="show">
        <div class="absolute inset-0 overflow-hidden transition-opacity">
            <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition delay-250"></div>
            <div class="pointer-events-none absolute right-0 inset-y-0 flex max-w-full ltr:pl-10 rtl:pr-10"
                v-click-outside="()=> $emit('close-drawer')">
                <div class="pointer-events-auto w-screen max-w-5xl lg:max-w-5xl">
                    <div class="flex h-full flex-col bg-white shadow-xl">
                        <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
                            <div class="flex items-start justify-between rtl:flex-row-reverse mb-5">
                                <h2 class="text-2xl tracking-wide font-bold text-gray-900">
                                    {{ __('Role Create') }}
                                </h2>
                                <div class="ml-3 flex h-7 items-center">
                                    <button type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500"
                                        @click="$emit('close-drawer')">
                                        <svg class="h-6 w-6" x-description="Heroicon name: outline/x"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <form class="mb-4" @submit.prevent="saveData">
                                <div class="mb-4">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <Label name="Name" id="admin_name" :hasError="form.errors.name"/>
                                            <BaseInput v-model="form.name" placeholder="Enter Name" id="admin_name" :hasError="form.errors.name"/>
                                        </div>
                                        <div>
                                            <Label name="Color" id="admin_color" :hasError="form.errors.color"/>
                                            <div class="flex items-center">
                                                <BaseInput :className="form.errors.color ? 'border-red-600':''" v-model="form.color" placeholder="Select Color" id="leave_type_color"/>
                                                <div class="relative ml-3">
                                                    <button type="button" @click="isOpenColorPicker = !isOpenColorPicker"
                                                        class="w-10 h-10 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow"
                                                        :style="`background: ${form.color}; color: white`"
                                                    >
                                                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M15.584 10.001L13.998 8.417 5.903 16.512 5.374 18.626 7.488 18.097z"/><path d="M4.03,15.758l-1,4c-0.086,0.341,0.015,0.701,0.263,0.949C3.482,20.896,3.738,21,4,21c0.081,0,0.162-0.01,0.242-0.03l4-1 c0.176-0.044,0.337-0.135,0.465-0.263l8.292-8.292l1.294,1.292l1.414-1.414l-1.294-1.292L21,7.414 c0.378-0.378,0.586-0.88,0.586-1.414S21.378,4.964,21,4.586L19.414,3c-0.756-0.756-2.072-0.756-2.828,0l-2.589,2.589l-1.298-1.296 l-1.414,1.414l1.298,1.296l-8.29,8.29C4.165,15.421,4.074,15.582,4.03,15.758z M5.903,16.512l8.095-8.095l1.586,1.584 l-8.096,8.096l-2.114,0.529L5.903,16.512z"/></svg>
                                                    </button>

                                                    <div v-if="isOpenColorPicker" class="origin-top-right absolute right-16 mt-2 w-40 rounded-md shadow-lg" v-click-outside="()=> isOpenColorPicker = false">
                                                        <div class="rounded-md bg-white shadow-xs px-4 py-3">
                                                            <div class="flex flex-wrap -mx-2">
                                                                <ColorPicker
                                                                theme="dark"
                                                                :color="form.color"
                                                                :sucker-hide="true"
                                                                @changeColor="changeColor"
                                                                @openSucker="openSucker"
                                                                :colors-default="swatches"
                                                            />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <ErrorMessage :name="form.errors.color"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <Label name="Description" id="admin_role_description" :hasError="form.errors.name"/>
                                    <BaseTextarea v-model="form.description" placeholder="Enter Description" id="admin_role_description" :hasError="form.errors.description"/>
                                </div>
                                <div class="mb-4" v-if="root && root.children">
                                    <Label name="Permissions" id="admin_name" :hasError="form.errors.name"/>
                                    <x-item :item="root" @change="onChange"></x-item>
                                    <table class="w-full text-sm text-left text-gray-500 ">
                                        <tbody>
                                            <tr class="bg-white   border-b" v-for="group in root.children" :key="group">
                                                <th class="px-6 text-lg border-r">
                                                    <x-item :item="group" @change="onChange"></x-item>
                                                </th>
                                                <th class="px-6 ml-6 p-1" v-for="item in group.children" :key="item">
                                                    <x-item :item="item" @childData="getValue" @change="onChange"></x-item>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <ErrorMessage :name="form.errors.role_permissions" />
                                </div>
                                <button :disabled="form.processing"  type="submit"
                                    class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 mb-2   focus:outline-none  mt-3">
                                    <Loading v-if="form.processing" :messageShow="false" />
                                    <span v-else>
                                        <svg class="inline w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" points="216 72.005 104 184 48 128.005"/></svg>
                                        {{ __('Save') }}
                                    </span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </Transition>
</template>

<script>
import XItem from "./Input.vue";
import { ColorPicker } from 'vue-color-kit'
import 'vue-color-kit/dist/vue-color-kit.css'

export default {
    components:{
        XItem,
        ColorPicker
    },
    props: {
        show: {
            type: Boolean,
            default: false
        },
        permissions:{
            type: Array,
        },
        role: {
            type: Object,
        },
    },
    data() {
        return {
            root: null,
            groups: [],
            form: this.$inertia.form({
                role_permissions: [],
                name: this.role.name,
                color: this.role.color,
                description: this.role.description,
            }),

            isOpenColorPicker: false,
            isSucking: true,
            swatches: [
                '#FF1900',
                '#2E81FF',
                '#FFE623',
                '#00FF00',
                '#f3722c',
                '#1BC7B1',
                '#FC3CAD',
                '#577590',
                '#00BEFF',
                '#4a4e69',
                '#c9ada7',
                '#8E00A7',
                '#000000',
                '#FFFFFF',
            ]
        };
    },
    methods: {
        onChange(node, checked) {
            node.checked = checked;
            this.updateChildren(node, checked);
            this.updateTree();

            if (node.children) {
                // check item children availabe . if item has children then it is all button or group button
                node.children.forEach((element) => {
                    if (element.children) {
                        // it is all button
                        element.children.forEach((element) => {
                            if (checked) {
                                // permission add
                                var check = this.form.role_permissions.includes(element.name);
                                if (!check) {
                                    this.form.role_permissions.push(element.name);
                                }
                            } else {
                                // permission remove
                                var pers = this.form.role_permissions;
                                pers.forEach(function (value, key) {
                                    if (element.name == value) {
                                        pers.splice(key, 1);
                                    }
                                });
                                this.form.role_permissions = pers;
                            }
                        });
                    } else {
                        // it is group button
                        if (checked) {
                            // permission add
                            var check = this.form.role_permissions.includes(element.name);
                            if (!check) {
                                this.form.role_permissions.push(element.name);
                            }
                        } else {
                            // permission remove
                            var pers = this.form.role_permissions;
                            pers.forEach(function (value, key) {
                                if (element.name == value) {
                                    pers.splice(key, 1);
                                }
                            });
                            this.form.role_permissions = pers;
                        }
                    }
                });
            }
        },
        updateChildren(node, checked) {
            if (!node.children) return;
            node.children.forEach((child) => {
                child.checked = checked;
                this.updateChildren(child, checked);
            });
        },
        updateTree() {
            (function update(node) {
                if (!node.children) return;
                node.children.forEach(update);
                node.checked = node.children.every((child) => child.checked);
            })(this.root);
        },
        // get single value
        getValue(item, checked) {
            if (checked) {
                var check = this.form.role_permissions.includes(item.name);
                if (!check) {
                    this.form.role_permissions.push(item.name);
                }
            } else {
                var pers = this.form.role_permissions;
                pers.forEach(function (value, key) {
                    if (item.name == value) {
                        pers.splice(key, 1);
                    }
                });
                this.form.role_permissions = pers;
            }
        },
        saveData() {
            this.form.put(route("admin.settings.roles.update", this.role.id), {
                onSuccess: () => {
                    this.form.reset(),
                    this.$emit('close-drawer')
                },
            });
        },
        changeColor(color) {
            this.form.color = color.hex
        },
    },
    watch: {
        role: {
            handler() {
                this.form.name = this.role.name
            },
            deep: true,
        },
        permissions: {
            handler() {
                this.form.role_permissions = this.permissions
            },
            deep: true,
        },



    },
     mounted(){
        Array.from(this.role.permissions).forEach((element) =>
            this.form.role_permissions.push(element.name)
        );

        for (const [key, value] of Object.entries(this.permissions)) {
            this.groups.push({
                id: 2,
                name: key,
                items: value,
            });
        }
        // data formate create for group
        this.root = {
            name: "Select All",
            checked: false,
            children: this.groups.map((group) => ({
                name: group.name,
                checked: false,
                children: group.items.map((item) => ({
                    item,
                    id: item.id,
                    name: item.name,
                    checked: this.form.role_permissions.includes(item.name) ? true :
                        false,
                })),
            })),
        };
        this.updateTree();
    }
};
</script>

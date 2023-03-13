<template>
    <div v-if="show" class="bg-gray-500 bg-opacity-80 transition-opacity fixed inset-0 overflow-y-auto overflow-x-hidden top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center flex w-full p-4">
        <div class="relative w-full h-full max-w-7xl md:h-auto" v-click-outside="()=> $emit('close-modal')">
            <div class="relative bg-white rounded-lg shadow ">
                <button @click="$emit('close-modal')" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  " data-modal-hide="authentication-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900">{{ role.name }} Permissions ({{ role.permissions.length }})</h3>

                    <template v-if="Object.keys(permissions).length > 0">
                        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                            <span v-for="(permission, index) in permissions" :key="index" class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 capitalize">
                                <div class="flex flex-wrap justify-between items-start">
                                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ index }}</h2>
                                </div>
                                <ul class="p-3 list-disc list-inside rtl:text-right text-left text-md font-bold">
                                    <li v-for="(per, innerIndex) in permission" :key="innerIndex">
                                    {{ per.name.split(".").pop() }}
                                    </li>
                                </ul>
                            </span>
                        </div>
                    </template>
                    <template v-else>
                        <div class="bg-pink-500 text-white p-1 px-3 rounded font-bold">
                            No Permission Found
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
    </template>

    <script>
        export default {
            props: {
                show: {
                    type: Boolean,
                    default: false
                },
                permissions: {
                    type: Array,
                    default: false
                },
                role: {
                    type: Object,
                    default: false
                },
            },
            data() {
                return {
                    form: this.$inertia.form({
                        name: '',
                        description: "",
                    }),
                };
            },
            methods: {
                saveData() {
                    this.form.post(route("admin.bedType.store"), {
                        onSuccess: () => {
                            this.form.reset(),
                            this.$emit('close-modal', true)
                        },
                    });
                }
            },
            mounted() {
                this.checkPagePermission('admin')
            }
        };
    </script>

<template>
<Transition name="slide-fade">
    <div class="fixed inset-0 overflow-hidden z-50" v-if="show">
        <div class="absolute inset-0 overflow-hidden transition-opacity">
            <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div class="pointer-events-none absolute right-0 inset-y-0 flex max-w-full ltr:pl-10 rtl:pr-10"
                v-click-outside="()=> $emit('close-drawer')">
                <div class="pointer-events-auto w-screen max-w-xs lg:max-w-2xl">
                    <div class="flex h-full flex-col bg-white shadow-xl">
                        <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
                            <div class="flex items-start justify-between rtl:flex-row-reverse mb-5">
                                <h2 class="text-2xl tracking-wide font-bold text-gray-900">
                                    {{ __('Announcement Create') }}
                                </h2>
                                <div class="ml-3 flex h-7 items-center">
                                    <button type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500 focus:outline-none"
                                        @click="$emit('close-drawer')">
                                        <svg class="h-6 w-6"
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
                                    <Label :name="__('Title')" id="announcement_name" :hasError="form.errors.title"/>
                                    <BaseInput v-model="form.title" placeholder="Name" id="announcement_name" :hasError="form.errors.title"/>
                                </div>
                                <div class="mb-4">
                                    <Label :name="__('Type')" :hasError="form.errors.type" :required="false"/>
                                    <div class="flex gap-2">
                                        <label for="announcement_public" class="w-full rounded-lg flex items-center pl-4 border border-gray-200 dark:border-gray-700   py-3 text-sm font-medium text-gray-700 gap-2">
                                            <input id="announcement_public" value="public" v-model="form.type" type="radio" class="h-4 w-4 border-gray-300 text-blue-600 focus:outline-none">
                                            <span>{{ __('Public') }}</span>
                                        </label>
                                        <label for="announcement_private" class="w-full rounded-lg flex items-center pl-4 border border-gray-200 dark:border-gray-700 py-3 text-sm font-medium text-gray-700 gap-2">
                                            <input id="announcement_private" value="private" v-model="form.type" type="radio" class="h-4 w-4 border-gray-300 text-blue-600 focus:outline-none">
                                            <span>{{ __('Private') }}</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <Label :name="__('Description')" id="announcement_description" :hasError="form.errors.description" :required="false"/>
                                    <BaseTextarea v-model="form.description" placeholder="Description" id="announcement_description" :hasError="form.errors.description"/>
                                </div>
                                <button :disabled="form.processing"  type="submit"
                                    class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 font-medium rounded-lg text-md px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-3">
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
    export default {
        props: {
            show: {
                type: Boolean,
                default: false
            }
        },
        data() {
            return {
                form: this.$inertia.form({
                    title: '',
                    description: "",
                    type: "public",
                }),
            };
        },
        methods: {
            saveData() {
                this.form.post(route("admin.announcement.store"), {
                    onSuccess: () => {
                        this.form.reset(),
                        this.$emit('close-drawer')
                    },
                });
            }
        },
        mounted() {
            this.checkPagePermission('admin')
        }
    };
</script>

<template>
    <Transition name="slide-fade">
        <div class="fixed inset-0 overflow-hidden z-50" v-if="show">
            <div class="absolute inset-0 overflow-hidden transition-opacity">
                <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition delay-250"></div>
                <div class="pointer-events-none absolute right-0 inset-y-0 flex max-w-full ltr:pl-10 rtl:pr-10"
                    v-click-outside="()=> $emit('close-drawer')">
                    <div class="pointer-events-auto w-screen max-w-5xl lg:max-w-2xl">
                        <div class="flex h-full flex-col bg-white shadow-xl">
                            <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
                                <div class="flex items-start justify-between rtl:flex-row-reverse mb-5">
                                    <h2 class="text-2xl tracking-wide font-bold text-gray-900">
                                        {{ __('Language Create') }}
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
                                        <label for="lang_name" class="block text-sm font-medium text-gray-700">{{ __('Language Name') }}</label>
                                        <div class="mt-1">
                                            <Multiselect id="lang_name" :close-on-select="true" :can-clear="true"
                                                :searchable="true" v-model="form.name" :create-option="false"
                                                placeholder="Select Language Name" :options="langInfos.map(item => ({
                                                    value: item.name, label: item.name
                                                }))"  />
                                            <ErrorMessage :name="form.errors.name" />
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="lang_code" class="block text-sm font-medium text-gray-700">{{ __('Language Code') }}</label>
                                        <div class="mt-1">
                                            <Multiselect id="lang_code" :close-on-select="true" :can-clear="true"
                                                :searchable="true" v-model="form.language_code" :create-option="false"
                                                placeholder="Select Language Code" :options="langInfos.map(item => ({
                                                    value: item.code, label: item.code
                                                }))"  />
                                            <ErrorMessage :name="form.errors.language_code" />
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="country_code" class="block text-sm font-medium text-gray-700">{{ __('Country') }}</label>
                                        <div class="mt-1">
                                            <Multiselect id="country_code" :close-on-select="true" :can-clear="true"
                                                :searchable="true" v-model="form.country_code" :create-option="false"
                                                placeholder="Select Language Code" :options="countries.map(item => ({
                                                    value: item.sortname, label: item.name
                                                }))"  />
                                            <ErrorMessage :name="form.errors.country_code" />
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <label for="lang_code" class="block text-sm font-medium text-gray-700">{{ __('Status') }}</label>
                                            <div class="relative flex items-center border-2 rounded p-3 h-11 border-gray-200 dark:border-zinc-700 focus:ring-primary-600 focus:border-primary-600">
                                                <div class="flex items-center h-5">
                                                    <input v-model="form.status" value="1" id="status_language" type="checkbox" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300 rounded" wire:model.defer="is_active">
                                                </div>
                                                <div class="ml-2 text-xs">
                                                    <label for="status_language" class="font-medium text-xs cursor-pointer text-gray-500 dark:text-gray-200">Enable language</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="lang_code" class="block text-sm font-medium text-gray-700">{{ __('Direction') }}</label>
                                            <div class="relative flex items-center border-2 rounded p-3 h-11 border-gray-200 dark:border-zinc-700 focus:ring-primary-600 focus:border-primary-600">
                                                <div class="flex items-center h-5">
                                                    <input v-model="form.force_rtl" value="1"  id="rtl_direction" type="checkbox" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300 rounded">
                                                </div>
                                                <div class="ml-2 text-xs">
                                                    <label for="rtl_direction" class="font-medium text-xs cursor-pointer text-gray-500 dark:text-gray-200">Enable rtl direction</label>
                                                </div>
                                            </div>
                                        </div>
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

export default {
    components:{

    },
    props: {
        show: {
            type: Boolean,
            default: false
        },
        langInfos: {
            type: Array,
            default: []
        },
        countries: {
            type: Array,
            default: []
        },
    },
    data() {
        return {
            form: this.$inertia.form({
                name: "",
                language_code: "",
                country_code: "",
                status: false,
                force_rtl: false,
            })
        };
    },
    methods: {
        saveData() {
            this.form.post(route("admin.settings.languages.store"), {
                onSuccess: () => {
                    this.form.reset(),
                    this.$emit('close-drawer')
                },
            });
        },
        languageAutoComplete(){
            this.langInfos.find(function (item) {
                if (item.name == this.form.name) {
                    this.form.language_code = item.code;
                }
            });
        },
    },
    mounted(){

    }
};
</script>

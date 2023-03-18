<template>
    <SettingLayout title="General">
        <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-1">
            <div class="bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <form @submit.prevent="updateData" class="space-y-8 divide-y divide-gray-200">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div class="space-y-6 sm:space-y-5">
                            <div>
                                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Custom CSS & JS Setting</h2>

                                <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed publicly so be careful what you share.</p>
                            </div>
                            {{ data }}
                            <div class="space-y-6 sm:space-y-5">
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Header custom style css (before the head end)</label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <codemirror
                                            v-model="form.custom_css"
                                            placeholder="Code goes here..."
                                            :style="{ height: '300px' }"
                                            :autofocus="true"
                                            :indent-with-tab="true"
                                            :tab-size="2"
                                            :extensions="extensions"
                                        />
                                        <p class="mt-3">Write css styles without style tag like,&nbsp;<code class="text-red-500"> body {background: red}</code></p>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Header custom script (before the head end)</label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                            <codemirror
                                                v-model="form.custom_header_script"
                                                placeholder="Code goes here..."
                                                :style="{ height: '300px' }"
                                                :autofocus="true"
                                                :indent-with-tab="true"
                                                :tab-size="2"
                                                :extensions="extensions"
                                            />
                                        <p class="mt-3">Write javascript code without script tag like,&nbsp;<code class="text-red-500"> console.log('something')</code></p>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Footer custom script (before body end)</label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                            <codemirror
                                                v-model="form.custom_footer_script"
                                                placeholder="Code goes here..."
                                                :style="{ height: '300px' }"
                                                :autofocus="true"
                                                :indent-with-tab="true"
                                                :tab-size="2"
                                                :extensions="extensions"
                                            />
                                            <p class="mt-3">Write javascript code without script tag like,&nbsp;<code class="text-red-500"> console.log('something')</code></p>
                                    </div>
                                </div>

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
            </div>
        </div>
    </SettingLayout>
</template>

<script>
import SettingLayout from "@/Shared/Layout/Setting.vue";
import { EditorState } from '@codemirror/state'
import { Codemirror } from 'vue-codemirror'
import { javascript } from '@codemirror/lang-javascript'
import { oneDark } from '@codemirror/theme-one-dark'

export default {
    components: {
        SettingLayout,
        EditorState,
        Codemirror,
        javascript,
        oneDark
    },
    props:{
        custom_css: String,
        custom_header_script: String,
        custom_footer_script: String,
    },
    data() {
        return {
            form: this.$inertia.form({
                custom_css: this.custom_css,
                custom_header_script: this.custom_header_script,
                custom_footer_script: this.custom_footer_script,
            }),

            log: console.log,

            extensions: [
                javascript(),
                oneDark
            ],
        };
    },
    methods: {
        updateData() {
            this.form.put(route("admin.settings.customCssJs.update"),{
                preserveScroll: true,
            });
        },
    },
};
</script>

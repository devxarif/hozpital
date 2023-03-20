<template>
    <SettingLayout title="General">
        <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-1">
            <div class="bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <form @submit.prevent="saveData" class="space-y-8 divide-y divide-gray-200">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div class="space-y-6 sm:space-y-5">
                            <div>
                                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Basic Setting</h2>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed
                                    publicly so be careful what you share.</p>
                            </div>
                            <div class="space-y-6 sm:space-y-5">
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Hospital Name" id="app_name" :hasError="form.errors.app_name" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg rounded-md shadow-sm">
                                            <BaseInput v-model="form.app_name" placeholder="Hospital Name"
                                                id="app_name" :hasError="form.errors.app_name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-center sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <div>
                                        <Label name="Dark Logo" id="logo" :hasError="form.errors.logo" />
                                        <small class="-mt-2 block text-gray-500">For White Background Logo</small>
                                    </div>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <input ref="dark_logo" @change="onDarkLogoChange"  accept="image/jpeg, image/jpg, image/png, image/svg+xml" type="file" hidden>
                                        <div class="flex items-center">
                                            <span class="text-center h-24 w-40 overflow-hidden rounded-md bg-gray-100">
                                                <img class="mx-auto h-20 w-full" :src="app_dark_logo_preview"
                                                    alt="Your Company">
                                            </span>
                                            <button @click="$refs.dark_logo.click()" type="button"
                                                class="ml-5 rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Change</button>
                                        </div>
                                        <ErrorMessage :name="form.errors.app_dark_logo" />
                                        <small>Recommended Size - 150 x 55, accept only jpeg, jpg, png & svg format</small>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-center sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <div>
                                        <Label name="Light Logo" id="logo" :hasError="form.errors.logo" />
                                        <small class="-mt-2 block text-gray-500">For Dark Background Logo</small>
                                    </div>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <input ref="light_logo" @change="onLightLogoChange"  accept="image/jpeg, image/jpg, image/png, image/svg+xml" type="file" hidden>
                                        <div class="flex items-center">
                                            <span class="text-center h-24 w-40 overflow-hidden rounded-md bg-gray-800">
                                                <img class="mx-auto h-20 w-full" :src="app_light_logo_preview"
                                                    alt="Your Company">
                                            </span>
                                            <button @click="$refs.light_logo.click()" type="button"
                                                class="ml-5 rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Change</button>
                                        </div>
                                        <ErrorMessage :name="form.errors.app_light_logo" />
                                        <small>Recommended Size - 150 x 55, accept only jpeg, jpg, png & svg format</small>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-center sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Favicon" id="logo" :hasError="form.errors.logo" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <input ref="favicon" @change="onFaviconChange"  accept="image/png, image/svg+xml" type="file" hidden>
                                        <div class="flex items-center">
                                            <span class="h-20 w-20 overflow-hidden rounded-md bg-gray-50">
                                                <img class="h-20 w-full"  :src="app_favicon_preview"
                                                    alt="Your Company">
                                            </span>
                                            <button @click="$refs.favicon.click()" type="button" class="ml-5 rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Change</button>
                                        </div>
                                        <ErrorMessage :name="form.errors.app_favicon" />
                                        <small>Recommended Size - 32 x 32, accept only png & svg format</small>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Copyright Text" id="app_copyright" :hasError="form.errors.app_copyright" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg rounded-md shadow-sm">
                                            <BaseInput v-model="form.app_copyright" placeholder="Hospital Name"
                                                id="app_copyright" :hasError="form.errors.app_copyright" />
                                        </div>
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

    export default {
        components: {
            SettingLayout,
        },
        props:{
            setting: Object,
        },
        data() {
            return {
                form: this.$inertia.form({
                    app_name: this.setting.app_name,
                    app_copyright: this.setting.app_copyright,
                    app_dark_logo: '',
                    app_light_logo: '',
                    app_favicon: '',
                }),

                app_dark_logo_preview: this.setting.app_dark_logo,
                app_light_logo_preview: this.setting.app_light_logo,
                app_favicon_preview: this.setting.app_favicon,
            };
        },
        methods: {
            saveData() {
                this.form.post(route("admin.settings.general.update"), {
                    preserveScroll: true,
                });

                // var href = document.getElementById('favicon').href;
                document.getElementById('favicon').src = this.app_favicon_preview;
            },
            onDarkLogoChange(e) {
                const file = e.target.files[0];
                this.app_dark_logo_preview = URL.createObjectURL(file);
                this.form.app_dark_logo = file;
            },
            onLightLogoChange(e) {
                const file = e.target.files[0];
                this.app_light_logo_preview = URL.createObjectURL(file);
                this.form.app_light_logo = file;
            },
            onFaviconChange(e) {
                const file = e.target.files[0];
                this.app_favicon_preview = URL.createObjectURL(file);
                this.form.app_favicon = file;
            },
        }
    };
</script>

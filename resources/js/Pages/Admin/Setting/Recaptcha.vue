<template>
    <SettingLayout title="Recaptcha">
        <div class="grid gap-6 md:grid-cols-12 xl:grid-cols-12">
            <div class="col-span-8 bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <form @submit.prevent="updateData" class="space-y-8 divide-y divide-gray-200">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div class="space-y-6 sm:space-y-5">
                            <div>
                                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Recaptcha Setting</h2>

                                <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed publicly so be careful what you share.</p>
                            </div>
                            <div class="space-y-6 sm:space-y-5">
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Recaptcha Site key" id="recaptcha_site_key" :hasError="form.errors.recaptcha_site_key"/>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg rounded-md shadow-sm">
                                            <BaseInput v-model="form.recaptcha_site_key" placeholder="Recaptcha Site key" id="recaptcha_site_key" :hasError="form.errors.recaptcha_site_key"/>
                                            <ErrorMessage :name="form.errors.recaptcha_site_key" />
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Status" id="recaptcha_active" :hasError="form.errors.recaptcha_active"/>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <label for="checked-toggle" class="inline-flex relative items-center cursor-pointer">
                                            <input @change="statusChange" v-model="form.recaptcha_active" type="checkbox" id="checked-toggle" class="sr-only peer" :checked="form.recaptcha_active">
                                            <div
                                                class="w-11 h-6 bg-gray-200 rounded-full peer   peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                            </div>
                                        </label>
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
            <div class="col-span-4 bg-white w-full p-6 rounded-lg border border-gray-8 mb-5 h-auto">
                <form class="divide-y divide-gray-200" @submit.prevent="testMailSend">
                    <div class="divide-y divide-gray-200 sm:space-y-5">
                        <div class="space-y-6 sm:space-y-5">
                            <div>
                                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Test recaptcha configuration</h2>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">Test your recaptcha by refreshing the page or click the button below.</p>
                            </div>

                            <div class="border-t sm:border-gray-200 sm:pt-5">
                                <div class="mb-3">
                                    <vue-recaptcha ref="recaptcha" :sitekey="recaptcha_site_key" @verify="verifyRecaptcha" @expired="expiredRecaptcha"  @error="errorRecaptcha" />
                                </div>

                                <a :href="route('admin.settings.recaptcha')"
                                    class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-md px-5 py-2.5 mb-2   focus:outline-none ">
                                    <span>
                                        {{ __('Refresh & Check') }}
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </SettingLayout>
</template>

<script>
import SettingLayout from "@/Shared/Layout/Setting.vue";
import { VueRecaptcha } from 'vue-recaptcha';

export default {
    components: {
        SettingLayout,
        VueRecaptcha
    },
    props: {
        recaptcha_site_key: String,
        recaptcha_active: Boolean,
    },
    data() {
        return {
            form: this.$inertia.form({
                recaptcha_site_key: this.recaptcha_site_key,
                recaptcha_active: this.recaptcha_active ? true : false,
            }),
        };
    },
    methods: {
        updateData() {
            this.form.put(route("admin.settings.recaptcha.update"), {
                preserveScroll: true,
                onSuccess: () => {
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                },
                onError: () => {
                    this.toastError('Recaptcha Configuration Failed');
                },
            });
        },
        verifyRecaptcha(){
            this.toastSuccess('Recaptcha Configuration Verified Successfully');
        },
        expiredRecaptcha(){
            this.toastError('Recaptcha Connection Expired');
        },
        errorRecaptcha(){
            this.toastError('Recaptcha Configuration Failed');
        }
    },
};
</script>

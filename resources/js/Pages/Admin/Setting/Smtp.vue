<template>
    <Head :title="__('SMTP')" />

    <SettingLayout>
        <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-1 mt-6">
            <div
                class="bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <form class="space-y-8 divide-y divide-gray-200" @submit.prevent="saveSetting">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div class="space-y-6 sm:space-y-5">
                            <div>
                                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">SMTP
                                    Setting</h2>

                                <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed
                                    publicly so be careful what you share.</p>
                            </div>

                            <div class="space-y-6 sm:space-y-5 border-t sm:border-gray-200 sm:pt-5">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <Label :name="__('Mail Driver')" :hasError="form.errors.type"/>
                                        <BaseInput  modelValue="smtp" :disabled="true"/>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <Label id="mail_driver" :name="__('Mail Driver')" :hasError="form.errors.host"/>
                                        <BaseInput v-model="form.host" placeholder="Title" id="mail_driver" :hasError="form.errors.host"/>
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <Label :name="__('Mail Port')" :hasError="form.errors.port"/>
                                        <Multiselect :close-on-select="true" :can-clear="true"
                                        :searchable="true" v-model="form.port" :create-option="false"
                                        placeholder="Select Mail Port" :options="[
                                            {label: 587, value: 587},
                                            {label: 465, value: 465},
                                            {label: 25, value: 25},
                                            {label: 2525, value: 2525},
                                        ]"  />
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <Label :name="__('Mail Encryption')" :hasError="form.errors.host"/>
                                        <div class="flex gap-2">
                                            <label for="tls" class="w-full rounded-lg flex items-center pl-4 border border-gray-200  py-3 text-sm font-medium text-gray-700 gap-2">
                                                <input id="tls" value="tls" v-model="form.encryption" type="radio" class="h-4 w-4 border-gray-300 text-blue-600 focus:outline-none">
                                                <span>{{ __('TLS') }}</span>
                                            </label>
                                            <label for="ssl" class="w-full rounded-lg flex items-center pl-4 border border-gray-200  py-3 text-sm font-medium text-gray-700 gap-2">
                                                <input id="ssl" value="ssl" v-model="form.encryption" type="radio" class="h-4 w-4 border-gray-300 text-blue-600 focus:outline-none">
                                                <span>{{ __('SSL') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <Label id="mail_username" :name="__('Mail Username')" :hasError="form.errors.username"/>
                                        <BaseInput v-model="form.username" placeholder="Title" id="mail_username" :hasError="form.errors.username"/>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <Label id="mail_password" :name="__('Mail Password')" :hasError="form.errors.username"/>
                                        <BaseInput v-model="form.username" placeholder="Title" id="mail_password" :hasError="form.errors.username"/>
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <Label id="mail_from_address" :name="__('Mail From Address')" :hasError="form.errors.from_address"/>
                                        <BaseInput v-model="form.from_address" placeholder="Title" id="mail_from_address" :hasError="form.errors.from_address"/>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <Label id="mail_from_name" :name="__('Mail From Name')" :hasError="form.errors.from_name"/>
                                        <BaseInput v-model="form.from_name" placeholder="Title" id="mail_from_name" :hasError="form.errors.from_name"/>
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
            <div
                class="bg-white w-full p-6 rounded-lg border border-gray-8   mb-5">
                <form class="space-y-8 divide-y divide-gray-200" @submit.prevent="testMailSend">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div class="space-y-6 sm:space-y-5">
                            <div>
                                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Send Test Mail</h2>

                                <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed
                                    publicly so be careful what you share.</p>
                            </div>

                            <div class="border-t sm:border-gray-200 sm:pt-5">
                                <div class="grid grid-cols-9 gap-6 justify-center  ">
                                    <div class="col-span-6 sm:col-span-3">
                                        <Label id="send_email" :name="__('Email Address')" :hasError="testMailForm.errors.type"/>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <BaseInput v-model="testMailForm.email" placeholder="Email Address" id="send_email" :hasError="testMailForm.errors.email"/>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <button :disabled="testMailForm.processing" type="submit"
                                            class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-md px-5 py-2.5 mb-2   focus:outline-none ">
                                            <Loading v-if="testMailForm.processing" :messageShow="false" />
                                            <span v-else>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="inline w-5 h-5 mr-2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                                </svg>
                                                {{ __('Send') }}
                                            </span>
                                        </button>
                                    </div>
                                </div>
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

    export default {
        props: {
            data: Object,
        },
        components: {
            SettingLayout
        },
        data() {
            return {
                form: this.$inertia.form({
                    type: this.data.type,
                    host: this.data.host,
                    port: this.data.port,
                    password: this.data.password,
                    username: this.data.username,
                    encryption: this.data.encryption,
                    from_name: this.data.from_name,
                    from_address: this.data.from_address,
                }),

                testMailForm: this.$inertia.form({
                    email: "",
                }),
            };
        },
        methods: {
            saveSetting() {
                this.form.put(route("admin.settings.smtp.update"));
            },
            testMailSend() {
                this.testMailForm.post(route("admin.settings.send.test.email"), {
                    onSuccess: () => {
                        this.form.reset();
                    },
                });
            },
        },
    };
</script>

<style scoped>
    .mail-address-width {
        min-width: 400px;
    }
</style>

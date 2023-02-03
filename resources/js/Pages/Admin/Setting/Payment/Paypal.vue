<template>
    <form @submit.prevent="updateData" class="space-y-8 divide-y divide-gray-200">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div class="space-y-6 sm:space-y-5">
                <div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Paypal Payment</h2>

                    <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed publicly so be
                        careful what you share.</p>
                </div>

                <div class="space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="username"
                            class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">{{ __('Paypal Mode') }}</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <div class="flex max-w-lg rounded-md shadow-sm">
                                <div class="w-full bg-gray-100 p-2 rounded-lg">
                                    <div
                                        class="account-switcher relative flex after:absolute candidate after:transition-all duration-300 after:rounded-lg">
                                        <div class="w-full rounded-xl"
                                            :class="form.paypal_mode == 'live' ? 'bg-blue-500 text-white shadow-md ':'text-gray-800'">
                                            <input type="radio" id="radio1" name="radio" class="hidden" checked>
                                            <label for="radio1"
                                                class="relative z-50 rounded-md transition-all duration-300 w-full py-2 gap-2 flex items-center justify-center cursor-pointer"
                                                @click="changeModeType('live')">
                                                <UserIcon class="h-5 w-5" />
                                                <span>Live</span>
                                            </label>
                                        </div>
                                        <div class="w-full rounded-xl"
                                            :class="form.paypal_mode == 'sandbox' ? 'bg-blue-500 text-white shadow-md ':'text-gray-800'">
                                            <input type="radio" id="radio2" name="radio" class="hidden">
                                            <label for="radio2"
                                                class="relative z-50 rounded-md transition-all duration-300 flex w-full py-2 gap-2 items-center justify-center cursor-pointer"
                                                @click="changeModeType('sandbox')">
                                                <UsersIcon class="h-5 w-5" />
                                                <span>Sandbox</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="username"
                            class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">{{ __('Client ID') }}
                            (Live)</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <div class="flex max-w-lg rounded-md shadow-sm">
                                <input v-model="form.paypal_live_client_id" type="text"
                                    class="block w-full min-w-0 flex-1 rounded-md border-gray-300 sm:text-sm">
                                <ErrorMessage :name="form.errors.paypal_live_client_id" />
                            </div>
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="username"
                            class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">{{ __('Client Secret') }}
                            (Live)</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <div class="flex max-w-lg rounded-md shadow-sm">
                                <input  v-model="form.paypal_live_client_secret" type="text"
                                    class="block w-full min-w-0 flex-1 rounded-md border-gray-300 sm:text-sm">
                                <ErrorMessage :name="form.errors.paypal_live_client_secret" />
                            </div>
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="username"
                            class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">{{ __('Client ID') }}
                            (Sandbox)</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <div class="flex max-w-lg rounded-md shadow-sm">
                                <input v-model="form.paypal_sandbox_client_id" type="text"
                                    class="block w-full min-w-0 flex-1 rounded-md border-gray-300 sm:text-sm">
                                <ErrorMessage :name="form.errors.paypal_sandbox_client_id" />
                            </div>
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="username"
                            class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">{{ __('Client Secret') }}
                            (Sandbox)</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <div class="flex max-w-lg rounded-md shadow-sm">
                                <input v-model="form.paypal_sandbox_client_secret" type="text"
                                    class="block w-full min-w-0 flex-1 rounded-md border-gray-300 sm:text-sm">
                                 <ErrorMessage :name="form.errors.paypal_sandbox_client_secret" />
                            </div>
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="username"
                            class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">{{ __('Status') }}</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <label for="checked-toggle" class="inline-flex relative items-center cursor-pointer">
                                <input @change="statusChange" v-model="form.paypal_active" type="checkbox" id="checked-toggle"
                                    class="sr-only peer" :checked="form.paypal_active">
                                <div
                                    class="w-11 h-6 bg-gray-200 rounded-full peer dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
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
                    class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-md px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-3">
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
</template>

<script>
export default {
    props: {
        data: Object,
    },
    data(){
        return {
            form: this.$inertia.form({
                paypal_live_client_id: this.data.paypal_live_client_id,
                paypal_live_client_secret: this.data.paypal_live_client_secret,
                paypal_sandbox_client_id: this.data.paypal_sandbox_client_id,
                paypal_sandbox_client_secret:
                    this.data.paypal_sandbox_client_secret,
                paypal_active: this.data.paypal_active ? 1 : 0,
                paypal_mode: this.data.paypal_mode,
                provider: "paypal",
            }),
        }
    },
    methods: {
        modeChange(event) {
            if (event.target.checked == true) {
                this.form.paypal_mode = 1;
            } else {
                this.form.paypal_mode = 0;
            }
        },
        statusChange(event) {
            if (event.target.checked == true) {
                this.form.paypal_active = 1;
            } else {
                this.form.paypal_active = 0;
            }
        },
        updateData() {
            this.form.put(route("admin.settings.payment.update"));
        },
        changeModeType(type) {
            if (type != this.form.paypal_mode) {
                this.form.paypal_mode = type;
            }
        },
    },
    watch: {
        data: {
            handler() {
                this.form.paypal_live_client_id =
                    this.data.paypal_live_client_id;
                this.form.paypal_live_client_secret =
                    this.data.paypal_live_client_secret;
                this.form.paypal_sandbox_client_id =
                    this.data.paypal_sandbox_client_id;
                this.form.paypal_sandbox_client_secret =
                    this.data.paypal_sandbox_client_secret;
                this.form.paypal_active = this.data.paypal_active ? 1 : 0;
                this.form.paypal_mode = this.data.paypal_mode;
            },
            deep: true,
        },
    }
}
</script>

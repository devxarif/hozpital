<template>

    <Head :title="__('Application')" />

    <SettingLayout>
        <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-12 mt-6">
            <div class="col-span-4 bg-white w-full p-6 rounded-lg border border-gray-8 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="overflow-hidden bg-white shadow sm:rounded-md">
                    <ul role="list" class="space-y-1 shadow-lg">
                        <li class="overflow-hidden rounded-md px-3.5 py-3.5 sm:px-6 text-sm border border-gray-100 cursor-pointer" :class="{'bg-blue-500 text-white': currentTab == 'paypal'}" @click="changeTab('paypal')">{{ __('Paypal') }}</li>
                        <li class="overflow-hidden rounded-md px-3.5 py-3.5 sm:px-6 text-sm border border-gray-100 cursor-pointer" :class="{'bg-blue-500 text-white': currentTab == 'stripe'}" @click="changeTab('stripe')">{{ __('Stripe') }}</li>
                        <li class="overflow-hidden rounded-md px-3.5 py-3.5 sm:px-6 text-sm border border-gray-100 cursor-pointer" :class="{'bg-blue-500 text-white': currentTab == 'razorpay'}" @click="changeTab('razorpay')">{{ __('Razorpay') }}</li>
                        <li class="overflow-hidden rounded-md px-3.5 py-3.5 sm:px-6 text-sm border border-gray-100 cursor-pointer" :class="{'bg-blue-500 text-white': currentTab == 'flutterwave'}" @click="changeTab('flutterwave')">{{ __('Flutterwave') }}</li>
                        <li class="overflow-hidden rounded-md px-3.5 py-3.5 sm:px-6 text-sm border border-gray-100 cursor-pointer" :class="{'bg-blue-500 text-white': currentTab == 'mollie'}" @click="changeTab('mollie')">{{ __('Mollie') }}</li>
                        <li class="overflow-hidden rounded-md px-3.5 py-3.5 sm:px-6 text-sm border border-gray-100 cursor-pointer" :class="{'bg-blue-500 text-white': currentTab == 'paystack'}"  @click="changeTab('paystack')">{{ __('PayStack') }}</li>
                        <li class="overflow-hidden rounded-md px-3.5 py-3.5 sm:px-6 text-sm border border-gray-100 cursor-pointer" :class="{'bg-blue-500 text-white': currentTab == 'instamojo'}" @click="changeTab('instamojo')">{{ __('Instamojo') }}</li>
                        <li class="overflow-hidden rounded-md px-3.5 py-3.5 sm:px-6 text-sm border border-gray-100 cursor-pointer" :class="{'bg-blue-500 text-white': currentTab == 'midtrans'}" @click="changeTab('midtrans')">{{ __('Midtrans') }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-span-8 bg-white w-full p-6 rounded-lg border border-gray-8 dark:border-gray-700 dark:hover:bg-gray-700">
                <form class="space-y-8 divide-y divide-gray-200">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div class="space-y-6 sm:space-y-5">
                            <div>
                                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Paypal Payment</h2>

                                <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed publicly so be careful what you share.</p>
                            </div>

                            <div class="space-y-6 sm:space-y-5">
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">{{ __('Paypal Mode') }}</label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="flex max-w-lg rounded-md shadow-sm">
                                            <div class="w-full bg-gray-100 p-2 rounded-lg">
                                                <div class="account-switcher relative flex after:absolute candidate after:transition-all duration-300 after:rounded-lg">
                                                    <div class="w-full rounded-xl" :class="form.request_for == 'me' ? 'bg-blue-500 text-white shadow-md ':'text-gray-800'">
                                                        <input type="radio" id="radio1" name="radio" class="hidden" checked>
                                                        <label for="radio1" class="relative z-50 rounded-md transition-all duration-300 w-full py-2 gap-2 flex items-center justify-center cursor-pointer" @click="changeLeaveRequestFor('me')">
                                                            <UserIcon class="h-5 w-5"/>
                                                            <span>Live</span>
                                                        </label>
                                                    </div>
                                                    <div class="w-full rounded-xl" :class="form.request_for == 'others' ? 'bg-blue-500 text-white shadow-md ':'text-gray-800'">
                                                        <input type="radio" id="radio2" name="radio" class="hidden">
                                                        <label for="radio2" class="relative z-50 rounded-md transition-all duration-300 flex w-full py-2 gap-2 items-center justify-center cursor-pointer" @click="changeLeaveRequestFor('others')">
                                                            <UsersIcon class="h-5 w-5"/>
                                                            <span>Sandbox</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">{{ __('Paypal Client ID') }}  (Live)</label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="flex max-w-lg rounded-md shadow-sm">
                                            <input type="text" name="username" id="username" autocomplete="username" class="block w-full min-w-0 flex-1 rounded-md border-gray-300 sm:text-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">{{ __('Paypal Secret Key') }}  (Live)</label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="flex max-w-lg rounded-md shadow-sm">
                                            <input type="text" name="username" id="username" autocomplete="username" class="block w-full min-w-0 flex-1 rounded-md border-gray-300 sm:text-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">{{ __('Paypal Client ID') }}  (Sandbox)</label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="flex max-w-lg rounded-md shadow-sm">
                                            <input type="text" name="username" id="username" autocomplete="username" class="block w-full min-w-0 flex-1 rounded-md border-gray-300 sm:text-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">{{ __('Paypal Secret Key') }}  (Sandbox)</label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="flex max-w-lg rounded-md shadow-sm">
                                            <input type="text" name="username" id="username" autocomplete="username" class="block w-full min-w-0 flex-1 rounded-md border-gray-300 sm:text-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">{{ __('Paypal Status') }}</label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="flex max-w-lg rounded-md shadow-sm">
                                            <label for="checked-toggle" class="inline-flex relative items-center cursor-pointer">
                                            <input v-model="form.status"  type="checkbox" id="checked-toggle" class="sr-only peer" checked>
                                            <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                        </label>
                                            <!-- <input type="text" name="username" id="username" autocomplete="username" class="block w-full min-w-0 flex-1 rounded-md border-gray-300 sm:text-sm"> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-5">
                        <div class="flex justify-end">
                            <button :disabled="form.processing" type="submit" class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-md px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-3">
                                <Loading v-if="form.processing" :messageShow="false" />
                                <span v-else>
                                    <svg class="inline w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" points="216 72.005 104 184 48 128.005"/></svg>
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
import { UserIcon, UsersIcon } from '@heroicons/vue/24/outline'

export default {
    components: {
        SettingLayout,
        UserIcon,
        UsersIcon
    },
    data() {
        return {
            currentTab: "paypal",

            form: this.$inertia.form({
                title: '',
                request_for: 'me',
                status: false

            }),
        };
    },
    methods: {
        async changeTab(tab) {
            localStorage.setItem("currentTab", tab);
            this.currentTab = tab;
            // let response = await axios.get(
            //     route("settings.payment.data", {
            //         provider: tab,
            //     })
            // );

            // this.paymentData = response.data;
        },
    },
    mounted() {
        let tab = localStorage.getItem("currentTab") || "paypal";
        this.currentTab = tab;
        this.changeTab(tab);
    },
};
</script>

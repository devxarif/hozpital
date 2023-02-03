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
            <div v-if="currentTab == 'paypal'" class="col-span-8 bg-white w-full p-6 rounded-lg border border-gray-8 dark:border-gray-700 dark:hover:bg-gray-700">
                <Paypal :data="paymentData"/>
            </div>
            <div v-if="currentTab == 'stripe'" class="col-span-8 bg-white w-full p-6 rounded-lg border border-gray-8 dark:border-gray-700 dark:hover:bg-gray-700">
                <Stripe :data="paymentData"/>
            </div>
            <div v-if="currentTab == 'razorpay'" class="col-span-8 bg-white w-full p-6 rounded-lg border border-gray-8 dark:border-gray-700 dark:hover:bg-gray-700">
                <Razorpay :data="paymentData"/>
            </div>
            <div v-if="currentTab == 'flutterwave'" class="col-span-8 bg-white w-full p-6 rounded-lg border border-gray-8 dark:border-gray-700 dark:hover:bg-gray-700">
                <Flutterwave :data="paymentData"/>
            </div>
            <div v-if="currentTab == 'mollie'" class="col-span-8 bg-white w-full p-6 rounded-lg border border-gray-8 dark:border-gray-700 dark:hover:bg-gray-700">
                <Mollie :data="paymentData"/>
            </div>
            <div v-if="currentTab == 'paystack'" class="col-span-8 bg-white w-full p-6 rounded-lg border border-gray-8 dark:border-gray-700 dark:hover:bg-gray-700">
                <Paystack :data="paymentData"/>
            </div>
            <div v-if="currentTab == 'instamojo'" class="col-span-8 bg-white w-full p-6 rounded-lg border border-gray-8 dark:border-gray-700 dark:hover:bg-gray-700">
                <Instamojo :data="paymentData"/>
            </div>
            <div v-if="currentTab == 'midtrans'" class="col-span-8 bg-white w-full p-6 rounded-lg border border-gray-8 dark:border-gray-700 dark:hover:bg-gray-700">
                <Midtrans :data="paymentData"/>
            </div>
        </div>
    </SettingLayout>
</template>

<script>
import SettingLayout from "@/Shared/Layout/Setting.vue";
import { UserIcon, UsersIcon } from '@heroicons/vue/24/outline'
import Paypal from './Payment/Paypal.vue';
import Stripe from './Payment/Stripe.vue';
import Razorpay from './Payment/Razorpay.vue';
import Flutterwave from './Payment/Flutterwave.vue';
import Mollie from './Payment/Mollie.vue';
import Paystack from './Payment/Paystack.vue';
import Instamojo from './Payment/Instamojo.vue';
import Midtrans from './Payment/Midtrans.vue';

export default {
    components: {
        SettingLayout,
        UserIcon,
        UsersIcon,
        Paypal,
        Stripe,
        Razorpay,
        Paystack,
        Mollie,
        Flutterwave,
        Instamojo,
        Midtrans,
    },
    data() {
        return {
            currentTab: "paypal",
            paymentData: {},
        };
    },
    methods: {
        async changeTab(tab) {
            localStorage.setItem("currentTab", tab);
            this.currentTab = tab;
            let response = await axios.get(
                route("admin.settings.payment.data", {
                    provider: tab,
                })
            );

            this.paymentData = response.data;
        },
    },
    mounted() {
        let tab = localStorage.getItem("currentTab") || "paypal";
        this.currentTab = tab;
        this.changeTab(tab);
    },
};
</script>

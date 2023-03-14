<template>
    <SettingLayout title="Payment">
        <div class="">
            <div class="hidden sm:block mb-3">
                <div class="border-b-2 border-gray-200">
                    <nav class="flex space-x-8" aria-label="Tabs">
                        <Li @click="changeTab('paypal')" :class="['cursor-pointer group inline-flex items-center py-4 px-1 border-b-2 font-medium text-md', currentTab == 'paypal' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            <span>{{ __('Paypal') }}</span>
                        </Li>
                        <Li @click="changeTab('stripe')" :class="['cursor-pointer group inline-flex items-center py-4 px-1 border-b-2 font-medium text-md', currentTab == 'stripe' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            <span>{{ __('Stripe') }}</span>
                        </Li>
                        <Li @click="changeTab('razorpay')" :class="['cursor-pointer group inline-flex items-center py-4 px-1 border-b-2 font-medium text-md', currentTab == 'razorpay' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            <span>{{ __('Razorpay') }}</span>
                        </Li>
                        <Li @click="changeTab('flutterwave')" :class="['cursor-pointer group inline-flex items-center py-4 px-1 border-b-2 font-medium text-md', currentTab == 'flutterwave' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            <span>{{ __('Flutterwave') }}</span>
                        </Li>
                        <Li @click="changeTab('mollie')" :class="['cursor-pointer group inline-flex items-center py-4 px-1 border-b-2 font-medium text-md', currentTab == 'mollie' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            <span>{{ __('Mollie') }}</span>
                        </Li>
                        <Li @click="changeTab('paystack')" :class="['cursor-pointer group inline-flex items-center py-4 px-1 border-b-2 font-medium text-md', currentTab == 'paystack' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            <span>{{ __('PayStack') }}</span>
                        </Li>
                        <Li @click="changeTab('instamojo')" :class="['cursor-pointer group inline-flex items-center py-4 px-1 border-b-2 font-medium text-md', currentTab == 'instamojo' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            <span>{{ __('Instamojo') }}</span>
                        </Li>
                        <Li @click="changeTab('midtrans')" :class="['cursor-pointer group inline-flex items-center py-4 px-1 border-b-2 font-medium text-md', currentTab == 'midtrans' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                            <span>{{ __('Midtrans') }}</span>
                        </Li>
                    </nav>
                </div>
            </div>
            <div v-if="currentTab == 'paypal'" class="col-span-8 bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <Paypal :data="paymentData"/>
            </div>
            <div v-if="currentTab == 'stripe'" class="col-span-8 bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <Stripe :data="paymentData"/>
            </div>
            <div v-if="currentTab == 'razorpay'" class="col-span-8 bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <Razorpay :data="paymentData"/>
            </div>
            <div v-if="currentTab == 'flutterwave'" class="col-span-8 bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <Flutterwave :data="paymentData"/>
            </div>
            <div v-if="currentTab == 'mollie'" class="col-span-8 bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <Mollie :data="paymentData"/>
            </div>
            <div v-if="currentTab == 'paystack'" class="col-span-8 bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <Paystack :data="paymentData"/>
            </div>
            <div v-if="currentTab == 'instamojo'" class="col-span-8 bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <Instamojo :data="paymentData"/>
            </div>
            <div v-if="currentTab == 'midtrans'" class="col-span-8 bg-white w-full p-6 rounded-lg border border-gray-8  ">
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

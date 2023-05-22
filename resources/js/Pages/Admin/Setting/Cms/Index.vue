<template>
    <SettingLayout title="Payment">
        <div class="hidden sm:block mb-3">
            <div class="border-b-2 border-gray-200">
                <nav class="flex space-x-8" aria-label="Tabs">
                    <li @click="changeTab('aa')" :class="['cursor-pointer group inline-flex items-center py-4 px-1 border-b-2 font-medium text-md', currentTab == 'aa' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                        <span>aaa</span>
                    </li>
                    <!-- <li v-for="(payment, index) in payment_nav" :key="index" @click="changeTab(payment.name)" :class="['cursor-pointer group inline-flex items-center py-4 px-1 border-b-2 font-medium text-md', currentTab == payment.name ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                        <span>{{ __(payment.title) }}</span>
                    </li> -->
                </nav>
            </div>
        </div>
        <!-- v-if="currentTab == payment.name" -->
        <div  class="col-span-8 bg-white w-full p-6 rounded-lg border border-gray-8 ">
            <!-- <component :is="payment.component" :data="paymentData"/> -->
        </div>
    </SettingLayout>
</template>

<script>
import SettingLayout from "@/Shared/Layout/Setting.vue";
import { UserIcon, UsersIcon } from '@heroicons/vue/24/outline'
// import Paypal from './Payment/Paypal.vue';
// import Stripe from './Payment/Stripe.vue';
// import Razorpay from './Payment/Razorpay.vue';
// import Flutterwave from './Payment/Flutterwave.vue';
// import Mollie from './Payment/Mollie.vue';
// import Paystack from './Payment/Paystack.vue';
// import Instamojo from './Payment/Instamojo.vue';
// import Midtrans from './Payment/Midtrans.vue';

export default {
    components: {
        SettingLayout,
        UserIcon,
        UsersIcon,
        // Paypal,
        // Stripe,
        // Razorpay,
        // Paystack,
        // Mollie,
        // Flutterwave,
        // Instamojo,
        // Midtrans,
    },
    data() {
        return {
            currentTab: "paypal",
            paymentData: {},
        };
    },
    // methods: {
    //     async changeTab(tab) {
    //         localStorage.setItem("currentTab", tab);
    //         this.currentTab = tab;
    //         let response = await axios.get(
    //             route("admin.settings.payment.data", {
    //                 provider: tab,
    //             })
    //         );

    //         this.paymentData = response.data;
    //     },
    // },
    mounted() {
        // let tab = localStorage.getItem("currentTab") || "paypal";
        // this.currentTab = tab;
        // this.changeTab(tab);
    },
};
</script>

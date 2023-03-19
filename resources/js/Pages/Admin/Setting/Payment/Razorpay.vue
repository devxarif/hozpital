<template>
    <form @submit.prevent="updateData" class="space-y-8 divide-y divide-gray-200">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div class="space-y-6 sm:space-y-5">
                <div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Razorpay Payment</h2>

                    <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed publicly so be
                        careful what you share.</p>
                </div>

                <div class="space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <Label name="Key ID" id="razorpay_key" :hasError="form.errors.razorpay_key"/>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <div class="max-w-lg rounded-md shadow-sm">
                                <BaseInput v-model="form.razorpay_key" placeholder="Public Key" id="razorpay_key" :hasError="form.errors.razorpay_key"/>
                                <ErrorMessage :name="form.errors.razorpay_key" />
                            </div>
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <Label name="Key Secret" id="razorpay_secret" :hasError="form.errors.razorpay_secret"/>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <div class="max-w-lg rounded-md shadow-sm">
                                <BaseInput v-model="form.razorpay_secret" placeholder="Public Key" id="razorpay_secret" :hasError="form.errors.razorpay_secret"/>
                                <ErrorMessage :name="form.errors.razorpay_secret" />
                            </div>
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <Label name="Conversion Rate" id="razorpay_conversion_rate" :hasError="form.errors.razorpay_conversion_rate"/>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <div class="flex max-w-lg rounded-md shadow-sm">
                                <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 p-2.5 text-gray-500 sm:text-sm">1 USD</span>
                                <input type="text" id="username" autocomplete="off" class="block w-full min-w-0 flex-1 border-0 p-2.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6" v-model="form.razorpay_conversion_rate">
                                <span class="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 p-2.5 text-gray-500 sm:text-sm">INR</span>
                            </div>
                            <ErrorMessage :name="form.errors.razorpay_conversion_rate" />
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <Label name="Status" id="razorpay_status" :hasError="form.errors.razorpay_active"/>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <label for="checked-toggle" class="inline-flex relative items-center cursor-pointer">
                                <input @change="statusChange" v-model="form.razorpay_active" type="checkbox" id="checked-toggle"
                                    class="sr-only peer" :checked="form.razorpay_active">
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
</template>

<script>
export default {
    props: {
        data: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                razorpay_key: this.data.razorpay_key,
                razorpay_secret: this.data.razorpay_secret,
                razorpay_conversion_rate: this.data.razorpay_conversion_rate,
                razorpay_active: this.data.razorpay_active ? 1 : 0,
                provider: "razorpay",
            }),
        };
    },
    methods: {
        statusChange(event) {
            if (event.target.checked == true) {
                this.form.razorpay_active = 1;
            } else {
                this.form.razorpay_active = 0;
            }
        },
        updateData() {
            this.form.put(route("admin.settings.payment.update"));
        },
    },
    watch: {
        data: {
            handler() {
                this.form.razorpay_key = this.data.razorpay_key;
                this.form.razorpay_secret = this.data.razorpay_secret;
                this.form.razorpay_conversion_rate = this.data.razorpay_conversion_rate;
                this.form.razorpay_active = this.data.razorpay_active ? 1 : 0;
            },
            deep: true,
        },
    },
};
</script>

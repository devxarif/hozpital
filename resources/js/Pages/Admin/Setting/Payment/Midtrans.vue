<template>
    <form @submit.prevent="updateData" class="space-y-8 divide-y divide-gray-200">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div class="space-y-6 sm:space-y-5">
                <div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Midtrans Payment</h2>

                    <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed publicly so be
                        careful what you share.</p>
                </div>

                <div class="space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <Label name="Midtrans Live Mode" id="midtrans_mode" :hasError="form.errors.midtrans_mode"/>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <label for="midtrans_mode" class="inline-flex relative items-center cursor-pointer">
                                <input @change="modeChange" v-model="form.midtrans_mode" type="checkbox" id="midtrans_mode" class="sr-only peer" :checked="form.midtrans_mode">
                                <div
                                    class="w-11 h-6 bg-gray-200 rounded-full peer   peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <Label name="Merchant ID" id="midtrans_id" :hasError="form.errors.midtrans_id"/>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <div class="max-w-lg rounded-md shadow-sm">
                                <BaseInput v-model="form.midtrans_id" placeholder="Merchant ID" id="midtrans_id" :hasError="form.errors.midtrans_id"/>
                                <ErrorMessage :name="form.errors.midtrans_id" />
                            </div>
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <Label name="Client Key" id="midtrans_key" :hasError="form.errors.midtrans_key"/>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <div class="max-w-lg rounded-md shadow-sm">
                                <BaseInput v-model="form.midtrans_key" placeholder="Client Key" id="midtrans_key" :hasError="form.errors.midtrans_key"/>
                                <ErrorMessage :name="form.errors.midtrans_key" />
                            </div>
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <Label name="Secret Key" id="midtrans_secret" :hasError="form.errors.midtrans_secret"/>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <div class="max-w-lg rounded-md shadow-sm">
                                <BaseInput v-model="form.midtrans_secret" placeholder="Secret Key" id="midtrans_secret" :hasError="form.errors.midtrans_secret"/>
                                    <ErrorMessage :name="form.errors.midtrans_secret" />
                                </div>
                            </div>
                        </div>
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <Label name="Status" id="midtrans_status" :hasError="form.errors.midtrans_active"/>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <label for="midtrans_status" class="inline-flex relative items-center cursor-pointer">
                                <input @change="statusChange" v-model="form.midtrans_active" type="checkbox" id="midtrans_status"
                                    class="sr-only peer" :checked="form.midtrans_active">
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
                midtrans_id: this.data.midtrans_id,
                midtrans_key: this.data.midtrans_key,
                midtrans_secret: this.data.midtrans_secret,
                midtrans_active: this.data.midtrans_active ? true : false,
                midtrans_mode: this.data.midtrans_mode ? true : false,
                provider: "midtrans",
            }),
        };
    },
    methods: {
        statusChange(event) {
            if (event.target.checked == true) {
                this.form.midtrans_active = true;
            } else {
                this.form.midtrans_active = false;
            }
        },
        modeChange(event) {
            if (event.target.checked == true) {
                this.form.midtrans_mode = true;
            } else {
                this.form.midtrans_mode = false;
            }
        },
        updateData() {
            this.form.put(route("admin.settings.payment.update"));
        }
    },
    watch: {
        data: {
            handler() {
                this.form.midtrans_id = this.data.midtrans_id;
                this.form.midtrans_key = this.data.midtrans_key;
                this.form.midtrans_secret = this.data.midtrans_secret;
                this.form.midtrans_active = this.data.midtrans_active ? true : false;
                this.form.midtrans_mode = this.data.midtrans_mode ? true : false;
            },
            deep: true,
        },
    },
};
</script>


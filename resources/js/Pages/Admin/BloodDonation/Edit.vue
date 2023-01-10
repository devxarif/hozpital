<template>
    <Transition name="slide-fade">
        <div class="fixed inset-0 overflow-hidden z-50" v-if="show">
            <div class="absolute inset-0 overflow-hidden transition-opacity">
                <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                <div class="pointer-events-none absolute right-0 inset-y-0 flex max-w-full ltr:pl-10 rtl:pr-10"
                    v-click-outside="()=> $emit('close-drawer')">
                    <div class="pointer-events-auto w-screen max-w-xs lg:max-w-2xl">
                        <div class="flex h-full flex-col bg-white shadow-xl">
                            <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
                                <div class="flex items-start justify-between rtl:flex-row-reverse mb-5">
                                    <h2 class="text-2xl tracking-wide font-bold text-gray-900">
                                        {{ __('Blood Donation Update') }}
                                    </h2>

                                    <div class="ml-3 flex h-7 items-center">
                                        <button type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500"
                                            @click="$emit('close-drawer')">
                                            <svg class="h-6 w-6" x-description="Heroicon name: outline/x"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <form class="mb-4" @submit.prevent="saveData">
                                    <div class="mb-4">
                                        <Label :name="__('Blood Donor')" id="donor_blood_donor" :hasError="form.errors.name"/>
                                        <BaseSelect v-model:value="form.blood_donor" :hasError="form.errors.blood_donor" class="w-3/2" id="donor_blood_donor" :showMessage="false">
                                            <option value="" hidden>{{ __('Select Blood Donor') }}</option>
                                            <option :selected="donor.id == form.blood_donor" :value="donor.id" v-for="donor in donors" :key="donor.id">{{ donor.name }} - {{ donor.blood_group }}</option>
                                        </BaseSelect>
                                    </div>
                                    <div class="mb-4">
                                        <Label :name="__('Bags')" id="donor_bags" :hasError="form.errors.bags"/>
                                        <BaseInput v-model="form.bags" placeholder="Bags" id="donor_bags" :hasError="form.errors.bags" type="number"/>
                                    </div>
                                    <button :disabled="form.processing"  type="submit"
                                        class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-3">
                                        <Loading v-if="form.processing" :messageShow="false" />
                                        <span v-else>
                                            <svg class="inline w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" points="216 72.005 104 184 48 128.005"/></svg>
                                            {{ __('Save') }}
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Transition>
</template>

<script>
export default {
    props: {
        blood_donation: {
            type: Object,
            required: true,
        },
        show: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            form: this.$inertia.form({
                blood_donor: this.blood_donation.blood_donor_id,
                bags: this.blood_donation.bags,
            }),

            donors: []
        };
    },
    watch: {
        blood_donation: {
            handler() {
                this.form.blood_donor = this.blood_donation.blood_donor_id
                this.form.bags = this.blood_donation.bags
            },
            deep: true,
        },
    },
    methods: {
        saveData() {
            this.form.put(route("admin.bloodDonation.update", this.blood_donation.id), {
                onSuccess: () => {
                    this.form.reset(),
                    this.$emit('close-drawer')
                },
            });
        },
        async loadBloodDonors(){
            let response = await axios.get(route("fetch.bloodDonors"));

            this.donors = response.data;
        }
    },
    mounted(){
        this.checkPagePermission('admin')
        this.loadBloodDonors()

    }
};
</script>

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
                                        {{ __('Blood Bank Update') }}
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
                                    <Label :name="__('Blood Group')" id="blood_bank_name" :hasError="form.errors.blood_group"/>
                                    <BaseInput :disabled="true" v-model="form.blood_group" placeholder="Name" id="blood_bank_name" :hasError="form.errors.blood_group"/>
                                    <span class="text-red-500 text-sm">Note: You cannot update the blood group field</span>
                                </div>
                                <div class="mb-4">
                                    <Label :name="__('Bags')" id="blood_bank_bags" :hasError="form.errors.bags" :required="false"/>
                                    <BaseTextarea v-model="form.bags" placeholder="Bags" id="blood_bank_bags" :hasError="form.errors.bags"/>
                                </div>
                                <button :disabled="form.processing"  type="submit"
                                    class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 mb-2   focus:outline-none  mt-3">
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
        blood_bank: {
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
                blood_group: this.blood_bank.blood_group,
                bags: this.blood_bank.bags,
                _method: 'PUT'
            }),
        };
    },
    watch: {
        blood_bank: {
            handler() {
                this.form.blood_group = this.blood_bank.blood_group
                this.form.bags = this.blood_bank.bags
            },
            deep: true,
        },
    },
    methods: {
        updateData() {
            this.form.put(route("laboratorist.bloodBank.update", this.blood_bank.id), {
                onSuccess: () => {
                    this.form.reset(),
                    this.$emit('close-drawer')
                }
            });
        },
        saveData() {
            this.form.post(route("laboratorist.bloodBank.update", this.blood_bank.id), {
                onSuccess: () => {
                    this.form.reset(),
                    this.$emit('close-drawer')
                },
            });
        }
    },
    mounted(){
        this.checkPagePermission('laboratorist')
    }
};
</script>

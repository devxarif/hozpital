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
                                    {{ __('Blood Donor Create') }}
                                </h2>
                                <div class="ml-3 flex h-7 items-center">
                                    <button type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500 focus:outline-none"
                                        @click="$emit('close-drawer')">
                                        <svg class="h-6 w-6"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <form class="mb-4" @submit.prevent="saveData">
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="mb-4">
                                        <Label :name="__('Name')" id="donor_name" :hasError="form.errors.name"/>
                                        <BaseInput v-model="form.name" placeholder="Name" id="donor_name" :hasError="form.errors.name"/>
                                    </div>
                                    <div class="mb-4">
                                        <Label :name="__('Email')" id="donor_email" :hasError="form.errors.email"/>
                                        <BaseInput v-model="form.email" placeholder="Email" id="donor_email" :hasError="form.errors.email"/>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="mb-4">
                                        <Label :name="__('Phone Number')" id="donor_phone" :hasError="form.errors.phone"/>
                                        <BaseInput v-model="form.phone" placeholder="Phone Number" id="donor_phone" :hasError="form.errors.phone"/>
                                    </div>
                                    <div class="mb-4">
                                        <Label :name="__('Age')" id="donor_age" :hasError="form.errors.age" :required="false"/>
                                        <BaseInput v-model="form.age" placeholder="Age" id="donor_age" :hasError="form.errors.age" type="number" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="mb-4">
                                        <Label :name="__('Gender')" :hasError="form.errors.gender"/>
                                        <div class="flex gap-2">
                                            <label for="donor_male" class="w-full rounded-lg flex items-center pl-4 border border-gray-200    py-3 text-sm font-medium text-gray-700 gap-2">
                                                <input id="donor_male" value="male" v-model="form.gender" name="gender" type="radio" class="h-4 w-4 border-gray-300 text-blue-600 focus:outline-none">
                                                <span>{{ __('Male') }}</span>
                                            </label>
                                            <label for="donor_female" class="w-full rounded-lg flex items-center pl-4 border border-gray-200  py-3 text-sm font-medium text-gray-700 gap-2">
                                                <input id="donor_female" value="female" v-model="form.gender" name="gender" type="radio" class="h-4 w-4 border-gray-300 text-blue-600 focus:outline-none">
                                                <span>{{ __('Female') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <Label :name="__('Blood Group')" id="donor_blood_group" :hasError="form.errors.blood_group"/>
                                        <BaseSelect v-model:value="form.blood_group" :hasError="form.errors.blood_group" class="w-3/2" id="donor_blood_group" :showMessage="false">
                                            <option value="" hidden>{{ __('Select Blood Group') }}</option>
                                            <option :selected="form.blood_group == 'A+'" value="A+">A+</option>
                                            <option :selected="form.blood_group == 'A-'" value="A-">A-</option>
                                            <option :selected="form.blood_group == 'B+'" value="B+">B+</option>
                                            <option :selected="form.blood_group == 'B-'" value="B-">B-</option>
                                            <option :selected="form.blood_group == 'AB+'" value="AB+">AB+</option>
                                            <option :selected="form.blood_group == 'AB-'" value="AB-">AB-</option>
                                            <option :selected="form.blood_group == 'O+'" value="O+">O+</option>
                                            <option :selected="form.blood_group == 'O-'" value="O-">O-</option>
                                        </BaseSelect>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <Label :name="__('Address')" id="donor_address" :hasError="form.errors.address" :required="false"/>
                                    <BaseTextarea v-model="form.address" placeholder="Address" id="donor_address" :hasError="form.errors.address"/>
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
            show: {
                type: Boolean,
                default: false
            }
        },
        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: "",
                    phone: "",
                    age: "",
                    gender: "male",
                    blood_group: "A+",
                    address: "",
                }),
            };
        },
        methods: {
            saveData() {
                this.form.post(route("admin.bloodDonor.store"), {
                    onSuccess: () => {
                        this.form.reset(),
                        this.$emit('close-drawer')
                    },
                });
            }
        },
        mounted() {
            this.checkPagePermission('admin')
        }
    };
</script>

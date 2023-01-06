<template>
<Transition name="slide-fade">
    <div class="fixed inset-0 overflow-hidden z-50" v-if="show">
        <div class="absolute inset-0 overflow-hidden transition-opacity">
            <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div class="pointer-events-none absolute right-0 inset-y-0 flex max-w-6xl ltr:pl-10 rtl:pr-10" v-click-outside="()=> $emit('close-drawer')">
                <div class="pointer-events-auto w-screen max-w-5xl">
                    <div class="flex h-full flex-col bg-white shadow-xl">
                        <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
                            <div class="flex items-start justify-between rtl:flex-row-reverse mb-5">
                                <h2 class="text-2xl tracking-wide font-bold text-gray-900">
                                    {{ __('Patient Create') }}
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
                                <div class="grid grid-cols-3 gap-2">
                                    <div class="mb-4">
                                        <Label :name="__('Name')" id="patient_name" :hasError="form.errors.name"/>
                                        <BaseInput v-model="form.name" placeholder="Name" id="patient_name" :hasError="form.errors.name"/>
                                    </div>
                                    <div class="mb-4">
                                        <Label :name="__('Email')" id="patient_email" :hasError="form.errors.email"/>
                                        <BaseInput v-model="form.email" placeholder="Email Address" id="patient_email" :hasError="form.errors.email"/>
                                    </div>
                                    <div class="mb-4">
                                        <label for="patient_password">
                                            <div class="flex justify-between ">
                                                <span class="text-md font-medium" :class="['block mb-2 text-md font-medium', form.errors.password ? 'text-red-600 dark:text-red-600':'text-gray-900 dark:text-gray-300']">
                                                    {{ __('Password') }}
                                                    <span class="text-red-700">*</span>
                                                </span>
                                                <button type="button" class="underline focus:outline-none text-xs" @click.prevent="generatePassword()">Generate random password</button>
                                            </div>
                                        </label>
                                        <div class="relative">
                                            <BaseInput v-model="form.password" placeholder="Password" id="patient_password" :hasError="form.errors.password" :type="passwordFieldType"/>
                                            <span class="absolute inset-y-0 right-0 pr-2 flex items-center cursor-pointer"
                                                @click="switchVisibility" v-if="form.password">
                                                <EyeShowIcon v-if="passwordFieldType == 'text'"/>
                                                <EyeHideIcon v-else/>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="mb-4">
                                        <Label :name="__('Phone')" id="patient_phone" :hasError="form.errors.phone" :required="false"/>
                                        <BaseInput v-model="form.phone" placeholder="Phone Number" id="patient_phone" :hasError="form.errors.phone"/>
                                    </div>
                                    <div class="mb-4">
                                        <Label :name="__('Gender')" :hasError="form.errors.email" :required="false"/>
                                        <div class="flex gap-2">
                                            <label for="patient_male" class="w-full rounded-lg flex items-center pl-4 border border-gray-200 dark:border-gray-700   py-3 ml-2 text-sm font-medium text-gray-700 gap-2">
                                                <input id="patient_male" value="male" v-model="form.gender" name="gender" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:outline-none">
                                                <span>{{ __('Male') }}</span>
                                            </label>
                                            <label for="patient_female" class="w-full rounded-lg flex items-center pl-4 border border-gray-200 dark:border-gray-700 py-3 ml-2 text-sm font-medium text-gray-700 gap-2">
                                                <input id="patient_female" value="female" v-model="form.gender" name="gender" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:outline-none">
                                                <span>{{ __('Female') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-2">
                                    <div class="mb-4">
                                        <Label :name="__('Birth Date')" id="patient_age" :hasError="form.errors.age" :required="false"/>
                                        <!-- <BaseInput v-model="form.age" placeholder="Age" id="patient_age" :hasError="form.errors.age"/> -->
                                        <Datepicker v-model="form.birth_date" :enableTimePicker="false" class="bg-gray-50 border text-md rounded-lg block w-full p-1 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white"
                                            @update:modelValue="handleCustomDate" :class="{'is-invalid': form.errors.birth_date}" :placeholder="__('Select Date')" :default-value="new Date()"
      :disabled-date="disabledAfterToday" />
                                        <!-- <span v-if="errors.birth_date" class="invalid-feedback">{{ errors.birth_date && errors.birth_date[0] }}</span> -->
                                    </div>
                                    <div class="mb-4">
                                        <Label :name="__('Age')" id="patient_age" :hasError="form.errors.age" :required="false"/>
                                        <BaseInput v-model="form.age" placeholder="Age" id="patient_age" :hasError="form.errors.age"/>
                                    </div>
                                    <div class="mb-4">
                                        <Label :name="__('Blood Group')" id="patient_blood_group" :hasError="form.errors.blood_group" :required="false"/>
                                        <BaseSelect v-model:value="form.blood_group" :hasError="form.errors.blood_group" class="w-3/2" id="patient_blood_group" :showMessage="false">
                                            <option value="" hidden>{{ __('Select Blood Group') }}</option>
                                            <option :selected="form.blood_group == 'A+'" value="A+">A+</option>
                                            <option :selected="form.blood_group == 'A-'" value="A-">A-</option>
                                            <option :selected="form.blood_group == 'B+'" value="B+">B+</option>
                                            <option :selected="form.blood_group == 'B-'" value="B-">B-</option>
                                            <option :selected="form.blood_group == 'AB+'" value="AB+">AB+</option>
                                            <option :selected="form.blood_group == 'AB+'" value="AB-">AB-</option>
                                            <option :selected="form.blood_group == 'O+'" value="O+">O+</option>
                                            <option :selected="form.blood_group == 'O-'" value="O-">O-</option>
                                        </BaseSelect>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <Label :name="__('Address')" id="patient_address" :hasError="form.errors.address" :required="false"/>
                                    <BaseTextarea v-model="form.address" placeholder="Address" id="patient_address" :hasError="form.errors.address"/>
                                </div>
                                <div class="mb-4">
                                    <Label :name="__('Image')" id="patient_create_image" :hasError="form.errors.image" :required="false"/>
                                    <div class="flex justify-center items-center w-full" v-if="!previewImage">
                                        <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-60 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                                <input id="dropzone-file" type="file" class="hidden" @change="onFileChange" accept="image/svg+xml, image/jpeg, image/jpg/ image/png">
                                                <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload image</span></p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or JPEG (MAX. 5MB)</p>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="relative" v-if="previewImage">
                                        <img :src="previewImage" class="h-60 w-full rounded-lg object-cover" alt="image description">
                                        <button @click="removeImage" type="button" class="absolute top-2 right-2 text-white bg-red-700 focus:ring-4 focus:ring-red-300 rounded-lg px-5 py-2.5 dark:bg-red-600 focus:outline-none dark:focus:ring-red-800">
                                            <font-awesome-icon icon="fa-solid fa-trash-can" class=" h-5 w-5"/>
                                        </button>
                                    </div>
                                    <ErrorMessage :name="form.errors.image"/>
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
import EyeHideIcon from '@/Shared/Icons/EyeHideIcon.vue';
import EyeShowIcon from '@/Shared/Icons/EyeShowIcon.vue';
import { library } from '@fortawesome/fontawesome-svg-core'
import { faHome } from '@fortawesome/free-solid-svg-icons'
import Datepicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
import dayjs from "dayjs";

export default {
    components:{
        EyeHideIcon,
        EyeShowIcon,
        library,
        faHome,
        Datepicker
    },
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
                password: "",
                address: "",
                avatar: '',
                gender: 'male',
                birth_date: '',
                age: '',
                blood_group: 'A+',
            }),

            previewImage: null,
            passwordFieldType: 'password',
        };
    },
    methods: {
        onFileChange(e) {
            const file = e.target.files[0];
            this.form.avatar = file
            this.previewImage = URL.createObjectURL(file);
        },
        removeImage(){
            this.previewImage = null;
            this.form.avatar = null
        },
        saveData() {
            this.form.post(route("admin.patient.store"), {
                onSuccess: () => {
                    this.form.reset(),
                    this.removeImage()
                    this.$emit('close-drawer')
                },
            });
        },
        switchVisibility() {
            this.passwordFieldType = this.passwordFieldType === "password" ? "text" : "password";
        },
        generatePassword(){
            this.form.password = null
            var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            var passwordLength = 12;

            for (var i = 0; i <= passwordLength; i++) {
                var randomNumber = Math.floor(Math.random() * chars.length);
                this.form.password += chars.substring(randomNumber, randomNumber +1);
            }
        },
        generateEmail(){
            var text = "";
            var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            for( var i=0; i < 15; i++ )
                text += possible.charAt(Math.floor(Math.random() * possible.length));

            return text + '@mail.com';
        },
        handleCustomDate(date) {
            const formatTime = dayjs(date).format("YYYY-MM-DD");
            this.form.birth_date = formatTime;
        },
        disabledAfterToday(date) {
            console.log(date)
            const today = new Date();
            // today.setHours(0, 0, 0, 0);
            return date > today
        },
    },
    mounted() {
        this.checkPagePermission('admin')
    }
};
</script>

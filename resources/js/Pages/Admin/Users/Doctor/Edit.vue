<template>
<Transition name="slide-fade">
    <div class="fixed inset-0 overflow-hidden z-50" v-if="show">
        <div class="absolute inset-0 overflow-hidden transition-opacity">
            <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div class="pointer-events-none absolute right-0 inset-y-0 flex max-w-2xl ltr:pl-10 rtl:pr-10" v-click-outside="()=> $emit('close-drawer', freezeEditDrawer)">
                <div class="pointer-events-auto w-screen max-w-md lg:max-w-2xl">
                    <div class="flex h-full flex-col bg-white shadow-xl">
                        <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
                            <div class="flex items-start justify-between rtl:flex-row-reverse mb-5">
                                <h2 class="text-2xl tracking-wide font-bold text-gray-900">
                                    {{ __('Doctor Update') }}
                                </h2>
                                <div class="ml-3 flex h-7 items-center">
                                    <button type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500 focus:outline-none"
                                        @click="$emit('close-drawer', freezeEditDrawer)">
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
                                        <Label name="Name" id="doctor_name" :hasError="form.errors.name"/>
                                        <BaseInput v-model="form.name" placeholder="Name" id="doctor_name" :hasError="form.errors.name"/>
                                    </div>
                                    <div class="mb-4">
                                        <Label name="Email" id="doctor_email" :hasError="form.errors.email"/>
                                        <BaseInput v-model="form.email" placeholder="Email Address" id="doctor_email" :hasError="form.errors.email"/>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="doctor_password">
                                        <div class="flex justify-between ">
                                            <span class="text-md font-medium" :class="['block mb-2 text-md font-medium', form.errors.password ? 'text-red-600 ':'text-gray-900 ']">{{ __('Change Password') }}</span>
                                            <button type="button" class="underline focus:outline-none text-xs" @click.prevent="generatePassword()">Generate random password</button>
                                        </div>
                                    </label>
                                    <div class="relative">
                                        <BaseInput v-model="form.password" placeholder="Password" id="doctor_password" :hasError="form.errors.password" :type="passwordFieldType"/>
                                        <span class="absolute inset-y-0 right-0 pr-2 flex items-center cursor-pointer"
                                            @click="switchVisibility" v-if="form.password">
                                            <EyeShowIcon v-if="passwordFieldType == 'text'"/>
                                            <EyeHideIcon v-else/>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <Label name="Department" id="doctor_name" :hasError="form.errors.department"/>
                                    <div class="flex items-center">
                                        <BaseSelect v-model:value="form.department" :hasError="form.errors.department" class="w-3/2" :showMessage="false">
                                            <option value="" hidden>{{ __('Select Department') }}</option>
                                            <option :value="department.id" v-for="department in departments" :key="department.id" :selected="department.id == form.department">{{ department.name }}</option>
                                        </BaseSelect>
                                        <button @click="showDepartmentModal()" type="button" class="ml-1 flex items-center justify-center rounded-full relative hover:bg-gray-500/5 focus:outline-none disabled:opacity-70 disabled:cursor-not-allowed disabled:pointer-events-none text-primary-500 focus:bg-primary-500/10 w-10 h-10 -my-2" wire:click="mountFormComponentAction('data.shop_customer_id', 'createOption')">
                                            <font-awesome-icon icon="fa-solid fa-plus" class="h-5 w-5"/>
                                        </button>
                                    </div>
                                    <ErrorMessage :name="form.errors.department"/>
                                </div>
                                <div class="mb-4">
                                    <Label name="Image" id="department_image" :hasError="form.errors.image" :required="false"/>
                                    <div class="flex justify-center items-center w-full" v-if="!previewImage">
                                        <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-60 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer   hover:bg-gray-100   ">
                                            <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                                <input id="dropzone-file" type="file" class="hidden" @change="onFileChange" accept="image/svg+xml, image/jpeg, image/jpg/ image/png">
                                                <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                                <p class="mb-2 text-sm text-gray-500 "><span class="font-semibold">Click to upload image</span></p>
                                                <p class="text-xs text-gray-500 ">SVG, PNG, JPG or JPEG (MAX. 5MB)</p>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="relative" v-if="previewImage">
                                        <img :src="previewImage" class="h-60 w-full rounded-lg object-cover" alt="image description">
                                        <button @click="removeImage" type="button" class="absolute top-2 right-2 text-white bg-red-700 focus:ring-4 focus:ring-red-300 rounded-lg px-5 py-2.5  focus:outline-none ">
                                            <font-awesome-icon icon="fa-solid fa-trash-can" class=" h-5 w-5"/>
                                        </button>
                                    </div>
                                    <ErrorMessage :name="form.errors.image"/>
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

<CreateDepartmentModal :show="showCreateDepartmentModal" @close-modal="closeDepartmentModal"/>
</template>

<script>
import EyeHideIcon from '@/Shared/Icons/EyeHideIcon.vue';
import EyeShowIcon from '@/Shared/Icons/EyeShowIcon.vue';
import { library } from '@fortawesome/fontawesome-svg-core'
import { faHome } from '@fortawesome/free-solid-svg-icons'
import CreateDepartmentModal from './CreateDepartmentModal.vue'

export default {
    components:{
        EyeHideIcon,
        EyeShowIcon,
        library,
        faHome,
        CreateDepartmentModal
    },
    props: {
        show: {
            type: Boolean,
            default: false
        },
        doctor:{
            type: Object,
            required: true,
        }
    },
    watch: {
        doctor: {
            handler() {
                this.form.name = this.doctor.user?.name ?? ''
                this.form.email = this.doctor.user?.email ?? ''
                this.form.department = this.doctor.department_id ?? ''
                this.previewImage = this.doctor.avatar
            },
            deep: true,
        },
    },
    data() {
        return {
            form: this.$inertia.form({
                name: this.doctor.user?.name ?? '',
                email: this.doctor.user?.email ?? '',
                password: "",
                department: this.doctor.department_id ?? '',
                avatar: '',
                _method: 'PUT'
            }),

            previewImage: this.doctor.avatar,
            passwordFieldType: 'password',
            showCreateDepartmentModal: false,
            freezeEditDrawer: false,
            departments: [],
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
            this.form.post(route("admin.doctor.update", this.doctor.id), {
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
        showDepartmentModal() {
            this.freezeEditDrawer = true;
            this.showCreateDepartmentModal = true
        },
        async closeDepartmentModal(fetched = false) {
            if (fetched) {
                await this.loadDepartments()
                this.form.department = this.departments[0]?.id ?? ''
            }

            this.showCreateDepartmentModal = false

            setTimeout(() => {
                this.freezeEditDrawer = false
            }, 500);
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
        async loadDepartments(){
            let response = await axios.get(route("fetch.departments"));

            console.log(response.data)
            this.departments = response.data;
        }


    },
    mounted() {
        this.checkPagePermission('admin')
        this.loadDepartments()
    }
};
</script>

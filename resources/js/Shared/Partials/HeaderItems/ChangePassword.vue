<template>
    <Transition name="slide-fade">
        <div class="fixed inset-0 overflow-hidden z-50" v-if="show">
            <div class="absolute inset-0 overflow-hidden transition-opacity">
                <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                <div class="pointer-events-none absolute right-0 inset-y-0 flex max-w-full ltr:pl-10 rtl:pr-10"
                    v-click-outside="()=> $emit('close-drawer')">
                    <div class="pointer-events-auto w-screen max-w-xs lg:max-w-xl">
                        <div class="flex h-full flex-col bg-white shadow-xl">
                            <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
                                <div class="flex items-start justify-between rtl:flex-row-reverse mb-5">
                                    <h2 class="text-2xl tracking-wide font-bold text-gray-900">
                                        {{ __('Change Password') }}
                                    </h2>
                                    <div class="ml-3 flex h-7 items-center">
                                        <button type="button"
                                            class="-m-2 p-2 text-gray-400 hover:text-gray-500 focus:outline-none"
                                            @click="$emit('close-drawer')">
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <form class="mb-4" @submit.prevent="updateData">
                                    <div class="mb-4">
                                        <Label name="Current Password" id="current_password" :hasError="form.errors.current_password"/>
                                        <div class="relative">
                                            <BaseInput :type="currentPasswordFieldType" v-model="form.current_password" placeholder="Current Password" id="current_password" :hasError="form.errors.current_password"/>
                                            <span class="absolute inset-y-0 right-0 pr-2 flex items-center cursor-pointer"
                                                @click="switchVisibility('current_password')" v-if="form.current_password">
                                                <EyeShowIcon v-if="currentPasswordFieldType == 'text'"/>
                                                <EyeHideIcon v-else/>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <Label name="New Password" id="password" :hasError="form.errors.password"/>
                                        <div class="relative">
                                            <BaseInput :type="passwordFieldType" v-model="form.password" placeholder="New Password" id="password" :hasError="form.errors.password"/>
                                            <span class="absolute inset-y-0 right-0 pr-2 flex items-center cursor-pointer"
                                                @click="switchVisibility('password')" v-if="form.password">
                                                <EyeShowIcon v-if="passwordFieldType == 'text'"/>
                                                <EyeHideIcon v-else/>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <Label name="Confirm Password" id="password_confirmation" :hasError="form.errors.password_confirmation"/>
                                        <div class="relative">
                                            <BaseInput :type="confirmPasswordFieldType" v-model="form.password_confirmation" placeholder="Confirm Password" id="password_confirmation" :hasError="form.errors.password_confirmation"/>
                                            <span class="absolute inset-y-0 right-0 pr-2 flex items-center cursor-pointer"
                                                @click="switchVisibility('confirm_password')" v-if="form.password_confirmation">
                                                <EyeShowIcon v-if="confirmPasswordFieldType == 'text'"/>
                                                <EyeHideIcon v-else/>
                                            </span>
                                        </div>
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
import { library } from '@fortawesome/fontawesome-svg-core'
import { faEye, faEyeSlash } from '@fortawesome/free-solid-svg-icons'
library.add(faEye, faEyeSlash)
import EyeHideIcon from '@/Shared/Icons/EyeHideIcon.vue';
import EyeShowIcon from '@/Shared/Icons/EyeShowIcon.vue';

export default {
    props: {
        show: {
            type: Boolean,
            default: false
        }
    },
    components: {
        EyeHideIcon,
        EyeShowIcon
    },
    data() {
        return {
            form: this.$inertia.form({
                current_password: null,
                password: null,
                password_confirmation: null,
            }),

            passwordFieldType: 'password',
            currentPasswordFieldType: 'password',
            confirmPasswordFieldType: 'password',
        };
    },
    methods: {
        updateData() {
            this.form.post(route("user.password.update"), {
                onSuccess: () => {
                    this.form.reset(),
                    this.$emit('close-drawer')
                },
            });
        },
        switchVisibility(type) {
            switch (type) {
                case 'current_password':
                    this.currentPasswordFieldType = this.currentPasswordFieldType == "password" ? "text" : "password";
                    break;
                case 'password':
                    this.passwordFieldType = this.passwordFieldType == "password" ? "text" : "password";
                    break;
                case 'confirm_password':
                    this.confirmPasswordFieldType = this.confirmPasswordFieldType == "password" ? "text" : "password";
                    break;
            }
        },
    }
};
</script>

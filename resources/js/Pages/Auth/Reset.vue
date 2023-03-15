<template>
    <section class="bg-gray-100 ">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a class="flex justify-center items-center mb-4 font-semibold lg:mb-4" href="/login">
                <img alt="app logo" src="/assets/img/hozpital_red_logo.svg" class="h-20 w-auto">
            </a>
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0  ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-2xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                        Reset your password
                    </h1>

                    <span class="text-xs font-normal text-gray-600 ">To reset your current password, please check your email and input a valid code and password</span>

                    <form class="space-y-4 md:space-y-6" @submit.prevent="resetPassword">
                        <div>
                            <label for="code" class="block mb-2 text-sm font-medium text-gray-900 ">Code</label>
                            <input v-model="form.code" type="text" id="code" :class="['border sm:text-sm text-gray-900 rounded-lg block w-full p-2.5', form.errors.code ? 'bg-white border-red-600 focus:ring-red-600 focus:border-red-600':'bg-white border-gray-300 focus:ring-blue-600 focus:border-blue-600']" placeholder="xxxx">
                            <ErrorMessage :name="form.errors.code" />
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">New Password</label>
                            <div class="relative">
                                <input :disabled="!form.code" v-model="form.password" :type="passwordFieldType" id="password" :class="['disabled:opacity-100 disabled:cursor-not-allowed border sm:text-sm text-gray-900 rounded-lg block w-full p-2.5', form.errors.password ? 'bg-white border-red-600 focus:ring-red-600 focus:border-red-600':'bg-white border-gray-300 focus:ring-blue-600 focus:border-blue-600']" placeholder="New Password">
                                <span class="absolute inset-y-0 right-0 pr-2 flex items-center cursor-pointer" @click="switchVisibility" v-if="form.password">
                                    <EyeShowIcon v-if="passwordFieldType == 'text'"/>
                                    <EyeHideIcon v-else/>
                                </span>
                            </div>
                            <ErrorMessage :name="form.errors.password" />
                        </div>

                        <button :disabled="form.processing" type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 text-center disabled:opacity-25 disabled:cursor-not-allowed">
                            <Loading v-if="form.processing" :messageShow="false" />
                            <span v-else>Send Reset Code</span>
                        </button>
                    </form>
                    <p class="text-sm font-light text-gray-500 ">
                        Already have an account? <Link :href="route('login')" class="font-medium text-blue-600 hover:underline ">Sign in</Link>
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import EyeHideIcon from '@/Shared/Icons/EyeHideIcon.vue';
import EyeShowIcon from '@/Shared/Icons/EyeShowIcon.vue';

export default {
    components:{
        EyeHideIcon,
        EyeShowIcon
    },
    props: {
        username: String,
    },
    data() {
        return {
            form: this.$inertia.form({
                username: this.username,
                code: "",
                password: "",
            }),

            passwordFieldType: 'password',
        };
    },
    computed: {
        disabledButton() {
            return this.form.username;
        },
    },
    methods: {
        resetPassword() {
            this.form.post(route("password.reset"));
        },
        switchVisibility() {
            this.passwordFieldType = this.passwordFieldType === "password" ? "text" : "password";
        }
    },
    watch: {
        pageFlashes: {
            handler(flashes) {
                if (flashes.success) {
                    this.toastSuccess(flashes.success);
                }
                if (flashes.error) {
                    this.toastError(flashes.error);
                }
                if (flashes.warning) {
                    this.toastWarning(flashes.warning);
                }
            },
            deep: true,
        },
    },
}
</script>

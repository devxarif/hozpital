<template>
    <section class="bg-gray-100 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
                Tracking
            </a>
            <div class="w-full bg-white rounded-lg shadow-xl dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-2xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Reset your password
                    </h1>

                    <span class="text-xs font-normal text-gray-600 ">To reset your current password, please check your email and input a valid code and password</span>

                    <form class="space-y-4 md:space-y-6" @submit.prevent="resetPassword">
                        <div>
                            <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code</label>
                            <input v-model="form.code" type="text" id="code" :class="['border sm:text-sm text-gray-900 rounded-lg block w-full p-2.5', form.errors.code ? 'bg-white border-red-600 focus:ring-red-600 focus:border-red-600 dark:bg-red-600 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-blue-500':'bg-white border-gray-300 focus:ring-blue-600 focus:border-blue-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']" placeholder="xxxx">
                            <ErrorMessage :name="form.errors.code" />
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <div class="relative">
                                <input :disabled="!form.code" v-model="form.password" :type="passwordFieldType" id="password" :class="['border sm:text-sm text-gray-900 rounded-lg block w-full p-2.5', form.errors.password ? 'bg-white border-red-600 focus:ring-red-600 focus:border-red-600 dark:bg-red-600 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-blue-500':'bg-white border-gray-300 focus:ring-blue-600 focus:border-blue-600 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']" placeholder="New Password">
                                <span class="absolute inset-y-0 right-0 pr-2 flex items-center cursor-pointer" @click="switchVisibility" v-if="form.password">
                                <svg v-if="passwordFieldType == 'text'" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>

                                <svg v-else class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" /></svg>
                                </span>
                            </div>
                            <ErrorMessage :name="form.errors.password" />
                        </div>

                        <button :disabled="form.processing" type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <Loading v-if="form.processing" :messageShow="false" />
                            <span v-else>Send Reset Code</span>
                        </button>
                    </form>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Already have an account? <Link :href="route('login')" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Sign in</Link>
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
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

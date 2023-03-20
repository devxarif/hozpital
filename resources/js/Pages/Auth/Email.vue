<template>
    <section class="bg-gray-100 ">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <Link class="flex justify-center items-center mb-4 font-semibold lg:mb-4" :href="route('login')">
                <img alt="app logo" :src="$page.props.setting.app_dark_logo" class="h-20 w-auto">
            </Link>
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0  ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-2xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                        Reset your password
                    </h1>
                    <span class="text-xs font-normal text-gray-600 ">Enter your valid username or email address and we will send you a password reset code.</span>

                    <form class="space-y-4 md:space-y-6" @submit.prevent="sendCode">
                        <div>
                            <Label name="Account" id="twitter_status" :hasError="form.errors.twitter_active"/>
                            <input v-model="form.username" type="text" id="username" :class="['border sm:text-sm text-gray-900 rounded-lg block w-full p-2.5', form.errors.username ? 'bg-white border-red-600 focus:ring-red-600 focus:border-red-600      ':'bg-white border-gray-300 focus:ring-blue-600 focus:border-blue-600']" placeholder="Username or Email Address">
                            <ErrorMessage :name="form.errors.username" />
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
export default {
    data() {
        return {
            form: this.$inertia.form({
                username: "",
            }),
        };
    },
    computed: {
        disabledButton() {
            return this.form.username;
        },
    },
    methods: {
        sendCode() {
            this.form.post(route("password.email.send.code"));
        },
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

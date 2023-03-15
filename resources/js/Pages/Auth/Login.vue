<template>
    <div class="flex flex-col min-h-screen bg-white ">
        <main class="bg-gray-50">
            <div class="flex flex-col justify-center items-center py-8 px-6 mx-auto md:h-screen">
                <a class="flex justify-center items-center mb-4 font-semibold lg:mb-4" href="/login">
                    <img alt="app logo" src="/assets/img/hozpital_red_logo.svg" class="h-20 w-auto">
                </a>
                <div class="justify-center items-center w-full bg-white rounded-lg shadow lg:flex md:mt-0 lg:max-w-screen-sm xl:p-0 ">
                    <div class="p-6 w-full sm:p-8 lg:p-10">
                        <h1 class="mb-3 text-2xl font-bold text-gray-900 lg:text-3xl">
                            Sign in to your account
                        </h1>
                        <p class="mb-3 text-gray-500 ">
                            Join our community of designers and developers to get access to hundreds of UI components, plugins, resources, and design systems.
                        </p>
                        <div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Sign in with</p>

                            <div class="mt-1 grid grid-cols-4 gap-2">
                                <div>
                                    <a href="javascript:void(0)"
                                        class="inline-flex w-full justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-500 shadow-sm hover:bg-gray-50">
                                        <span class="sr-only">Sign in with Google</span>
                                        <GoogleIcon/>
                                    </a>
                                </div>
                                <div>
                                    <a href="javascript:void(0)"
                                        class="inline-flex w-full justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-500 shadow-sm hover:bg-gray-50">
                                        <span class="sr-only">Sign in with Facebook</span>
                                        <FacebookIcon/>
                                    </a>
                                </div>

                                <div>
                                    <a href="javascript:void(0)"
                                        class="inline-flex w-full justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-500 shadow-sm hover:bg-gray-50">
                                        <span class="sr-only">Sign in with Twitter</span>
                                        <TwitterIcon/>
                                    </a>
                                </div>
                                <div>
                                    <a href="javascript:void(0)"
                                        class="inline-flex w-full justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-500 shadow-sm hover:bg-gray-50">
                                        <span class="sr-only">Sign in with Linkedin</span>
                                        <LinkedinIcon/>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="relative mt-6">
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="bg-white px-2 text-gray-500">Or continue with</span>
                            </div>
                        </div>
                    </div>
                        <form class="mt-4" @submit.prevent="login">
                            <div class="mb-4">
                                <label for="account" class="block mb-2 text-sm font-medium text-gray-900">
                                    Account
                                </label>
                                <input v-model="form.username" type="text" id="account" placeholder="Username or Email Address" :class="['text-gray-900 bg-gray-50 block w-full p-2.5 border sm:text-sm rounded-lg', form.errors.username ? 'border-red-500 focus:ring-red-500 focus:border-red-500':'border-gray-300 focus:ring-blue-500 focus:border-blue-500']">
                                <ErrorMessage :name="form.errors.username" />
                            </div>
                            <div class="mb-4">
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">
                                    Password
                                </label>
                                <div class="relative">
                                    <input v-model="form.password" :type="passwordFieldType" id="password" placeholder="Password" :class="['text-gray-900 bg-gray-50 block w-full p-2.5 border sm:text-sm rounded-lg', form.errors.password ? 'border-red-500 focus:ring-red-500 focus:border-red-500':'border-gray-300 focus:ring-blue-500 focus:border-blue-500']">
                                    <span class="absolute inset-y-0 right-0 pr-2 flex items-center cursor-pointer" @click="switchVisibility" v-if="form.password">
                                        <EyeShowIcon v-if="passwordFieldType == 'text'" />
                                        <EyeHideIcon v-else />
                                    </span>
                                </div>
                                <ErrorMessage :name="form.errors.password" />
                            </div>

                            <div class="flex items-start mb-4">
                                <div class="text-sm">
                                    <label class="relative inline-flex items-center mb-4 cursor-pointer">
                                        <input v-model="form.remember" type="checkbox" value="1" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                                        <span class="ml-3 text-sm font-medium text-gray-900">Remember me</span>
                                    </label>
                                </div>
                                <Link :href="route('password.email')" class="ml-auto text-sm text-blue-700  hover:underline">Forgot Password?</Link>
                            </div>
                            <button :disabled="form.processing || nullField" class="text-white font-medium rounded-lg text-base px-5 py-3 w-full sm:w-auto text-center mb-6 bg-blue-700 disabled:opacity-25 disabled:cursor-not-allowed" type="submit">
                                <span class="flex justify-center items-center">
                                    <Loading v-if="form.processing" message="Signing in..." />
                                    <span v-else>Sign in to your account</span>
                                </span>
                            </button>
                            <div class="text-sm font-medium text-gray-500">Not registered?
                                <a class="ml-1 text-blue-700 hover:underline " href="/register/">
                                    Sign up as a patient
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="justify-center items-center w-full rounded-lg mt-3 lg:max-w-screen-sm">
                    <div class="border-gray-50 my-2 w-full ">
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                            Demo account login credentials
                        </h1>
                        <div class="items-center grid grid-cols-3 gap-2">
                            <button @click="roleLogin('admin','password')" type="button"
                                class="block px-4 py-2 mt-1 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray"><small>Log
                                    in Via Admin</small>
                            </button>
                            <button @click="roleLogin('doctor@mail.com', 'password')" type="button"
                                class="block px-4 py-2 mt-1 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg  hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray"><small>Log
                                    in Via Doctor</small>
                            </button>
                            <button @click="roleLogin('patient@mail.com', 'password')" type="button"
                                class="block px-4 py-2 mt-1 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg  hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray"><small>Log
                                    in Via Patient</small>
                            </button>
                            <button @click="roleLogin('nurse@mail.com', 'password')" type="button"
                                class="block px-4 py-2 mt-1 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg  hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray"><small>Log
                                    in Via Nurse</small>
                            </button>
                            <button @click="roleLogin('accountant@mail.com', 'password')" type="button"
                                class="block px-4 py-2 mt-1 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg  hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray"><small>Log
                                    in Via Accountant</small>
                            </button>
                            <button @click="roleLogin('receptionist@mail.com', 'password')" type="button"
                                class="block px-4 py-2 mt-1 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg  hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray"><small>Log
                                    in Via Recetionist</small>
                            </button>
                            <button @click="roleLogin('pharmacist@mail.com', 'password')" type="button"
                                class="block px-4 py-2 mt-1 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg  hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray"><small>Log
                                    in Via Pharmacist</small>
                            </button>
                            <button @click="roleLogin('laboratorist@mail.com', 'password')" type="button"
                                class="block px-4 py-2 mt-1 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg  hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray"><small>Log
                                    in Via Laboratorist</small>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
    import EyeHideIcon from '@/Shared/Icons/EyeHideIcon.vue';
    import EyeShowIcon from '@/Shared/Icons/EyeShowIcon.vue';
    import GoogleIcon from '@/Shared/Icons/GoogleIcon.vue';
    import FacebookIcon from '@/Shared/Icons/FacebookIcon.vue';
    import TwitterIcon from '@/Shared/Icons/TwitterIcon.vue';
    import LinkedinIcon from '@/Shared/Icons/LinkedinIcon.vue';

    export default {
        components: {
            EyeHideIcon,
            EyeShowIcon,
            GoogleIcon,
            FacebookIcon,
            TwitterIcon,
            LinkedinIcon,
        },
        data() {
            return {
                form: this.$inertia.form({
                    username: null,
                    password: null,
                    remember: 0,
                }),

                passwordFieldType: 'password',
            };
        },
        methods: {
            login() {
                this.form.post("/login");
            },
            roleLogin(username, password) {
                this.form.username = username;
                this.form.password = password;
                this.login();
            },
            switchVisibility() {
                this.passwordFieldType = this.passwordFieldType === "password" ? "text" : "password";
            }
        },
        computed:{
            nullField(){
                return !this.form.username || !this.form.password;
                return true;
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

<template>
        <section class="bg-gray-100 ">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="javascript:void(0)" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 ">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg"
                    alt="logo">
                Tracking
            </a>
            <div
                class="w-full bg-white rounded-lg shadow-xl md:mt-0 sm:max-w-md xl:p-0  ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                        Sign in to your account
                    </h1>

                    <div class="mt-1 grid grid-cols-5 gap-3">
                        <div>
                            <a href="/auth/facebook/redirect"
                                class="w-full inline-flex justify-center py-3 rounded-sm bg-[#f7f7f7] hover:bg-[#eeeded] text-sm font-medium">
                                <svg width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.995 1.67a8.325 8.325 0 1 0 0 16.65 8.325 8.325 0 0 0 0-16.65Z"
                                        fill="#039BE5">
                                    </path>
                                    <path
                                        d="M11.122 12.201h2.154l.339-2.188H11.12V8.817c0-.91.297-1.716 1.148-1.716h1.367v-1.91c-.24-.032-.748-.103-1.708-.103-2.004 0-3.178 1.058-3.178 3.469v1.456H6.69V12.2h2.06v6.016c.408.061.82.103 1.245.103.383 0 .758-.035 1.127-.085V12.2Z"
                                        fill="#fff"></path>
                                </svg>
                            </a>
                        </div>

                        <div>
                            <a href="/auth/google/redirect"
                                class="w-full inline-flex justify-center py-3  rounded-sm bg-[#f7f7f7] hover:bg-[#eeeded] text-sm font-medium">
                                <svg width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18.171 8.368h-.67v-.035H10v3.333h4.709A4.998 4.998 0 0 1 5 10a5 5 0 0 1 5-5c1.275 0 2.434.48 3.317 1.266l2.357-2.357A8.295 8.295 0 0 0 10 1.667a8.334 8.334 0 1 0 8.171 6.7Z"
                                        fill="#FFC107"></path>
                                    <path
                                        d="M2.628 6.121 5.366 8.13A4.998 4.998 0 0 1 10 4.999c1.275 0 2.434.482 3.317 1.267l2.357-2.357A8.295 8.295 0 0 0 10 1.667 8.329 8.329 0 0 0 2.628 6.12Z"
                                        fill="#FF3D00"></path>
                                    <path
                                        d="M10 18.333a8.294 8.294 0 0 0 5.587-2.163l-2.579-2.183A4.963 4.963 0 0 1 10 15a4.998 4.998 0 0 1-4.701-3.311L2.58 13.783A8.327 8.327 0 0 0 10 18.333Z"
                                        fill="#4CAF50"></path>
                                    <path
                                        d="M18.171 8.368H17.5v-.034H10v3.333h4.71a5.017 5.017 0 0 1-1.703 2.321l2.58 2.182c-.182.166 2.746-2.003 2.746-6.17 0-.559-.057-1.104-.162-1.632Z"
                                        fill="#1976D2"></path>
                                </svg>
                            </a>
                        </div>

                        <div>
                            <a href="/auth/twitter/redirect"
                                class="w-full inline-flex justify-center py-3  rounded-sm bg-[#f7f7f7] hover:bg-[#eeeded] text-sm font-medium">
                                <svg fill="#1da1f2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 27" width="20px"
                                    height="20px">
                                    <path
                                        d="M 25.855469 5.574219 C 24.914063 5.992188 23.902344 6.273438 22.839844 6.402344 C 23.921875 5.75 24.757813 4.722656 25.148438 3.496094 C 24.132813 4.097656 23.007813 4.535156 21.8125 4.769531 C 20.855469 3.75 19.492188 3.113281 17.980469 3.113281 C 15.082031 3.113281 12.730469 5.464844 12.730469 8.363281 C 12.730469 8.773438 12.777344 9.175781 12.867188 9.558594 C 8.503906 9.339844 4.636719 7.246094 2.046875 4.070313 C 1.59375 4.847656 1.335938 5.75 1.335938 6.714844 C 1.335938 8.535156 2.261719 10.140625 3.671875 11.082031 C 2.808594 11.054688 2 10.820313 1.292969 10.425781 C 1.292969 10.449219 1.292969 10.46875 1.292969 10.492188 C 1.292969 13.035156 3.101563 15.15625 5.503906 15.640625 C 5.0625 15.761719 4.601563 15.824219 4.121094 15.824219 C 3.78125 15.824219 3.453125 15.792969 3.132813 15.730469 C 3.800781 17.8125 5.738281 19.335938 8.035156 19.375 C 6.242188 20.785156 3.976563 21.621094 1.515625 21.621094 C 1.089844 21.621094 0.675781 21.597656 0.265625 21.550781 C 2.585938 23.039063 5.347656 23.90625 8.3125 23.90625 C 17.96875 23.90625 23.25 15.90625 23.25 8.972656 C 23.25 8.742188 23.246094 8.515625 23.234375 8.289063 C 24.261719 7.554688 25.152344 6.628906 25.855469 5.574219">
                                    </path>
                                </svg>
                            </a>
                        </div>

                        <div>
                            <a href="/auth/linkedin/redirect"
                                class="w-full inline-flex justify-center py-3  rounded-sm bg-[#f7f7f7] hover:bg-[#eeeded] text-sm font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                                    viewBox="0 0 48 48" style=" fill:#000000;">
                                    <path fill="#0078d4"
                                        d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5V37z">
                                    </path>
                                    <path
                                        d="M30,37V26.901c0-1.689-0.819-2.698-2.192-2.698c-0.815,0-1.414,0.459-1.779,1.364c-0.017,0.064-0.041,0.325-0.031,1.114L26,37h-7V18h7v1.061C27.022,18.356,28.275,18,29.738,18c4.547,0,7.261,3.093,7.261,8.274L37,37H30z M11,37V18h3.457C12.454,18,11,16.528,11,14.499C11,12.472,12.478,11,14.514,11c2.012,0,3.445,1.431,3.486,3.479C18,16.523,16.521,18,14.485,18H18v19H11z"
                                        opacity=".05"></path>
                                    <path
                                        d="M30.5,36.5v-9.599c0-1.973-1.031-3.198-2.692-3.198c-1.295,0-1.935,0.912-2.243,1.677c-0.082,0.199-0.071,0.989-0.067,1.326L25.5,36.5h-6v-18h6v1.638c0.795-0.823,2.075-1.638,4.238-1.638c4.233,0,6.761,2.906,6.761,7.774L36.5,36.5H30.5z M11.5,36.5v-18h6v18H11.5z M14.457,17.5c-1.713,0-2.957-1.262-2.957-3.001c0-1.738,1.268-2.999,3.014-2.999c1.724,0,2.951,1.229,2.986,2.989c0,1.749-1.268,3.011-3.015,3.011H14.457z"
                                        opacity=".07"></path>
                                    <path fill="#fff"
                                        d="M12,19h5v17h-5V19z M14.485,17h-0.028C12.965,17,12,15.888,12,14.499C12,13.08,12.995,12,14.514,12c1.521,0,2.458,1.08,2.486,2.499C17,15.887,16.035,17,14.485,17z M36,36h-5v-9.099c0-2.198-1.225-3.698-3.192-3.698c-1.501,0-2.313,1.012-2.707,1.99C24.957,25.543,25,26.511,25,27v9h-5V19h5v2.616C25.721,20.5,26.85,19,29.738,19c3.578,0,6.261,2.25,6.261,7.274L36,36L36,36z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>


                    <div class="w-full flex items-center justify-between">
                        <hr class="w-full bg-gray-400" />
                        <p class="text-base font-medium leading-4 px-2.5 text-gray-500">OR</p>
                        <hr class="w-full bg-gray-400" />
                    </div>
                    <form class="space-y-4 md:space-y-6" @submit.prevent="login">
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Account</label>
                            <input v-model="form.username" type="email" name="email" id="email"
                                :class="['border sm:text-sm text-gray-900 rounded-lg block w-full p-2.5', form.errors.username ? 'bg-white border-red-600 focus:ring-red-600 focus:border-red-600      ':'bg-white border-gray-300 focus:ring-blue-600 focus:border-blue-600      ']"
                                placeholder="Username or Email Address">
                            <ErrorMessage :name="form.errors.username" />
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                            <div class="relative">
                                <input v-model="form.password" :type="passwordFieldType" name="password" id="password"
                                    placeholder="Password"
                                    :class="['border text-gray-900 sm:text-sm rounded-lg block w-full p-2.5', form.errors.username ? 'bg-white border-red-600 focus:ring-red-600 focus:border-red-600      ':'bg-white border-gray-300 focus:ring-blue-600 focus:border-blue-600      ']">
                                <span class="absolute inset-y-0 right-0 pr-2 flex items-center cursor-pointer"
                                    @click="switchVisibility" v-if="form.password">
                                    <svg v-if="passwordFieldType == 'text'" class="w-6 h-6" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>

                                    <svg v-else class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                        </svg>
                                </span>
                            </div>
                            <ErrorMessage :name="form.errors.password" />
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300    ">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 ">Remember me</label>
                                </div>
                            </div>
                            <Link :href="route('password.email')"
                                class="text-sm font-medium text-blue-600 hover:underline ">Forgot
                            password?</Link>
                        </div>
                        <button :disabled="form.processing" type="submit"
                            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center   ">
                            <Loading v-if="form.processing" :messageShow="false" />
                            <span v-else>Sign in</span>
                        </button>
                    </form>
                    <p class="text-sm font-light text-gray-500 ">
                        Don’t have an account yet? <a href="javascript:void(0)"
                            class="font-medium text-blue-600 hover:underline ">Sign up</a>
                    </p>
                </div>
            </div>

            <div class="border-gray-50 my-5">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                    Demo account login credentials
                </h1>
                <div class="flex items-center gap-3">
                    <button @click="roleLogin('admin','password')" type="button"
                        class="block px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray"><small>Log
                            in Via Admin</small>
                    </button>
                    <button @click="roleLogin('doctor@mail.com', 'password')" type="button"
                        class="block px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg  hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray"><small>Log
                            in Via Doctor</small>
                    </button>
                    <button @click="roleLogin('patient@mail.com', 'password')" type="button"
                        class="block px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg  hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray"><small>Log
                            in Via Patient</small>
                    </button>
                    <button @click="roleLogin('nurse@mail.com', 'password')" type="button"
                        class="block px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg  hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray"><small>Log
                            in Via Nurse</small>
                    </button>
                    <button @click="roleLogin('accountant@mail.com', 'password')" type="button"
                        class="block px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg  hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray"><small>Log
                            in Via Accountant</small>
                    </button>
                    <button @click="roleLogin('receptionist@mail.com', 'password')" type="button"
                        class="block px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg  hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray"><small>Log
                            in Via Recetionist</small>
                    </button>
                    <button @click="roleLogin('pharmacist@mail.com', 'password')" type="button"
                        class="block px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg  hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray"><small>Log
                            in Via Pharmacist</small>
                    </button>
                    <!-- <button @click="roleLogin('owner@mail.com', 'password')"  type="button" class="block px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray"><small>Log in Via Owner</small>
                        </button>
                        <button @click="roleLogin('employee@mail.com', 'password')" type="button" class="block px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg  hover:bg-gray-700 focus:outline-none focus:shadow-outline-gray"><small>Log in Via Employee</small>
                        </button> -->
                </div>
            </div>
        </div>
        <footer
            class="p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 ">
            <span class="text-sm text-gray-500 sm:text-center ">© 2022 <a href="https://flowbite.com/"
                    class="hover:underline">Flowbite™</a>. All Rights Reserved.
            </span>
            <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500  sm:mt-0">
                <li>
                    <a href="javascript:void(0)" class="mr-4 hover:underline md:mr-6 ">Help</a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="mr-4 hover:underline md:mr-6">Cookie Policy</a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="mr-4 hover:underline md:mr-6">Terms & Condition</a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="hover:underline">Contact</a>
                </li>
            </ul>
        </footer>
    </section>
</template>

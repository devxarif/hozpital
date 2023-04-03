<template>
    <ProfileSettingLayout title="Profile Setting">
        <div class="flex p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div>
                You can have only one active social login at a time. If you want to change your social login, please disable the current one first.
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-1">
            <div class="bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div class="space-y-6 sm:space-y-5">
                        <div>
                            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Social Login</h2>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed
                                publicly so be careful what you share.</p>
                        </div>
                        <div v-if="flash?.success" class="flex p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <div>
                                {{ flash?.success }}
                            </div>
                        </div>
                        <div v-if="flash?.error" class="flex p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <div>
                                {{ flash?.error }}
                            </div>
                        </div>

                        <!-- Google -->
                        <div class="space-y-6 sm:space-y-5">
                            <div class="flex justify-between items-center sm:border-t sm:border-gray-200 sm:pt-5">
                                <div class="flex gap-2 items-center">
                                    <GoogleIcon height="40px" width="40px"/>
                                    <span class="text-md">Google</span>
                                </div>
                                <div>
                                    <span class="inline-flex items-center text-sm font-normal mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300" :class="auth_user.provider == 'google' ? 'bg-green-100 text-green-800':'bg-red-100 text-red-800'">
                                        <span class="w-2.5 h-2.5 mr-1 rounded-full" :class="auth_user.provider == 'google' ? 'bg-green-500':'bg-red-500'"></span>
                                        {{ auth_user.provider == 'google' ? 'Enabled' : 'Disabled' }}
                                    </span>
                                </div>
                                <div>
                                    <template v-if="!auth_user.provider">
                                        <button @click.prevent="linkSocialLogin('google')" type="button" class="text-white justify-center flex items-center bg-blue-500 hover:bg-blue-600 focus:ring-4 font-medium rounded-lg text-md px-5 py-2.5 mb-2 focus:outline-none  mt-3">
                                            <span>
                                                {{ __('Connect') }}
                                            </span>
                                        </button>
                                    </template>
                                    <template v-else-if="auth_user.provider && auth_user.provider != 'google'">
                                        <button disabled type="button" class="text-white justify-center flex items-center bg-blue-700 font-medium rounded-lg text-md px-5 py-2.5 mb-2 focus:outline-none mt-3 disabled:opacity-50 disabled:cursor-not-allowed">
                                            <span>
                                                {{ __('Connect') }}
                                            </span>
                                        </button>
                                    </template>
                                    <template v-else>
                                        <button @click.prevent="linkSocialLogin('google')" type="button" class="text-white justify-center flex items-center bg-red-500 hover:bg-red-600 focus:ring-4 font-medium rounded-lg text-md px-5 py-2.5 mb-2 focus:outline-none  mt-3">
                                            <span>
                                                {{ __('Disconnect') }}
                                            </span>
                                        </button>
                                    </template>


                                </div>
                            </div>
                        </div>

                        <!-- Facebook -->
                        <div class="space-y-6 sm:space-y-5">
                            <div class="flex justify-between items-center sm:border-t sm:border-gray-200 sm:pt-5">
                                <div class="flex gap-2 items-center">
                                    <FacebookIcon height="40px" width="40px"/>
                                    <span class="text-md">Facebook</span>
                                </div>
                                <div>
                                    <span class="inline-flex items-center text-sm font-normal mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300" :class="auth_user.provider == 'facebook' ? 'bg-green-100 text-green-800':'bg-red-100 text-red-800'">
                                        <span class="w-2.5 h-2.5 mr-1 rounded-full" :class="auth_user.provider == 'facebook' ? 'bg-green-500':'bg-red-500'"></span>
                                        {{ auth_user.provider == 'facebook' ? 'Enabled' : 'Disabled' }}
                                    </span>
                                </div>
                                <div>
                                    <template v-if="!auth_user.provider">
                                        <button @click.prevent="linkSocialLogin('facebook')" type="button" class="text-white justify-center flex items-center bg-blue-500 hover:bg-blue-600 focus:ring-4 font-medium rounded-lg text-md px-5 py-2.5 mb-2 focus:outline-none  mt-3">
                                            <span>
                                                {{ __('Connect') }}
                                            </span>
                                        </button>
                                    </template>
                                    <template v-else-if="auth_user.provider && auth_user.provider != 'facebook'">
                                        <button disabled type="button" class="text-white justify-center flex items-center bg-blue-700 font-medium rounded-lg text-md px-5 py-2.5 mb-2 focus:outline-none mt-3 disabled:opacity-50 disabled:cursor-not-allowed">
                                            <span>
                                                {{ __('Connect') }}
                                            </span>
                                        </button>
                                    </template>
                                    <template v-else>
                                        <button @click.prevent="linkSocialLogin('facebook')" type="button" class="text-white justify-center flex items-center bg-red-500 hover:bg-red-600 focus:ring-4 font-medium rounded-lg text-md px-5 py-2.5 mb-2 focus:outline-none  mt-3">
                                            <span>
                                                {{ __('Disconnect') }}
                                            </span>
                                        </button>
                                    </template>
                                </div>
                            </div>
                        </div>

                        <!-- Twitter -->
                        <div class="space-y-6 sm:space-y-5">
                            <div class="flex justify-between items-center sm:border-t sm:border-gray-200 sm:pt-5">
                                <div class="flex gap-2 items-center">
                                    <TwitterIcon height="40px" width="40px"/>
                                    <span class="text-md">Twitter</span>
                                </div>
                                <div>
                                    <span class="inline-flex items-center text-sm font-normal mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300" :class="auth_user.provider == 'twitter' ? 'bg-green-100 text-green-800':'bg-red-100 text-red-800'">
                                        <span class="w-2.5 h-2.5 mr-1 rounded-full" :class="auth_user.provider == 'twitter' ? 'bg-green-500':'bg-red-500'"></span>
                                        {{ auth_user.provider == 'twitter' ? 'Enabled' : 'Disabled' }}
                                    </span>
                                </div>
                                <div>
                                    <template v-if="!auth_user.provider">
                                        <button @click.prevent="linkSocialLogin('twitter')" type="button" class="text-white justify-center flex items-center bg-blue-500 hover:bg-blue-600 focus:ring-4 font-medium rounded-lg text-md px-5 py-2.5 mb-2 focus:outline-none  mt-3">
                                            <span>
                                                {{ __('Connect') }}
                                            </span>
                                        </button>
                                    </template>
                                    <template v-else-if="auth_user.provider && auth_user.provider != 'twitter'">
                                        <button disabled type="button" class="text-white justify-center flex items-center bg-blue-700 font-medium rounded-lg text-md px-5 py-2.5 mb-2 focus:outline-none mt-3 disabled:opacity-50 disabled:cursor-not-allowed">
                                            <span>
                                                {{ __('Connect') }}
                                            </span>
                                        </button>
                                    </template>
                                    <template v-else>
                                        <button @click.prevent="linkSocialLogin('twitter')" type="button" class="text-white justify-center flex items-center bg-red-500 hover:bg-red-600 focus:ring-4 font-medium rounded-lg text-md px-5 py-2.5 mb-2 focus:outline-none  mt-3">
                                            <span>
                                                {{ __('Disconnect') }}
                                            </span>
                                        </button>
                                    </template>
                                </div>
                            </div>
                        </div>

                        <!-- Linkedin -->
                        <div class="space-y-6 sm:space-y-5">
                            <div class="flex justify-between items-center sm:border-t sm:border-gray-200 sm:pt-5">
                                <div class="flex gap-2 items-center">
                                    <LinkedinIcon height="40px" width="40px"/>
                                    <span class="text-md">Linkedin</span>
                                </div>
                                <div>
                                    <span class="inline-flex items-center text-sm font-normal mr-2 px-2.5 py-1.5 rounded-full dark:bg-red-900 dark:text-red-300" :class="auth_user.provider == 'linkedin' ? 'bg-green-100 text-green-800':'bg-red-100 text-red-800'">
                                        <span class="w-2.5 h-2.5 mr-1 rounded-full" :class="auth_user.provider == 'linkedin' ? 'bg-green-500':'bg-red-500'"></span>
                                        {{ auth_user.provider == 'linkedin' ? 'Enabled' : 'Disabled' }}
                                    </span>
                                </div>
                                <div>
                                    <template v-if="!auth_user.provider">
                                        <button @click.prevent="linkSocialLogin('linkedin')" type="button" class="text-white justify-center flex items-center bg-blue-500 hover:bg-blue-600 focus:ring-4 font-medium rounded-lg text-md px-5 py-2.5 mb-2 focus:outline-none  mt-3">
                                            <span>
                                                {{ __('Connect') }}
                                            </span>
                                        </button>
                                    </template>
                                    <template v-else-if="auth_user.provider && auth_user.provider != 'linkedin'">
                                        <button disabled type="button" class="text-white justify-center flex items-center bg-blue-700 font-medium rounded-lg text-md px-5 py-2.5 mb-2 focus:outline-none mt-3 disabled:opacity-50 disabled:cursor-not-allowed">
                                            <span>
                                                {{ __('Connect') }}
                                            </span>
                                        </button>
                                    </template>
                                    <template v-else>
                                        <button @click.prevent="linkSocialLogin('linkedin')" type="button" class="text-white justify-center flex items-center bg-red-500 hover:bg-red-600 focus:ring-4 font-medium rounded-lg text-md px-5 py-2.5 mb-2 focus:outline-none  mt-3">
                                            <span>
                                                {{ __('Disconnect') }}
                                            </span>
                                        </button>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ProfileSettingLayout>
</template>

<script>
import GoogleIcon from '@/Shared/Icons/GoogleIcon.vue';
import FacebookIcon from '@/Shared/Icons/FacebookIcon.vue';
import TwitterIcon from '@/Shared/Icons/TwitterIcon.vue';
import LinkedinIcon from '@/Shared/Icons/LinkedinIcon.vue';
import ProfileSettingLayout from "@/Shared/Layout/ProfileSetting.vue";

export default {
    components: {
        ProfileSettingLayout,
        GoogleIcon,
        FacebookIcon,
        TwitterIcon,
        LinkedinIcon,
    },
    data() {
        return {
            flash: this.$page.props?.flash || {},
        };
    },
    methods: {
        saveData() {
            this.form.post(route("admin.settings.general.update"), {
                preserveScroll: true,
                onSuccess: () => {
                    if (this.form.app_favicon) {
                        window.location.reload();
                    }
                },
            });
        },
        async linkSocialLogin(provider) {
            if (this.auth_user.provider && this.auth_user.provider_id) {
                await this.$inertia.post(route('user.profile.socialLogin.unlink'));
                window.location.reload();
            }else{
                window.location.href = `/auth/${provider}/redirect`;
            }
        },
    }
};
</script>

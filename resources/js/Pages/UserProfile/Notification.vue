<template>
    <ProfileSettingLayout title="Profile Setting">
        <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-1">
            <div class="bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <form @submit.prevent="saveData" class="space-y-8 divide-y divide-gray-200">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div class="space-y-6 sm:space-y-5">
                            <div>
                                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Notification</h2>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed
                                    publicly so be careful what you share.</p>
                            </div>
                            <div class="space-y-6 sm:space-y-5">
                                <div class="flex justify-between sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5 w-full">
                                    <div class="">
                                        <span class="text-lg">Enable Two Factor Authentication</span>
                                        <small class="mt-2 block text-gray-500">For White Background Logo</small>
                                    </div>
                                    <Switch @change="updateStatus" v-model="enabled"
                                    :class="[enabled ? 'bg-blue-600' : 'bg-gray-200', 'relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2']">
                                        <span
                                            :class="[enabled ? 'translate-x-5' : 'translate-x-0', 'pointer-events-none relative inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out']">
                                            <span
                                                :class="[enabled ? 'opacity-0 ease-out duration-100' : 'opacity-100 ease-in duration-200', 'absolute inset-0 flex h-full w-full items-center justify-center transition-opacity']">
                                                <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
                                                    <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <span
                                                :class="[enabled ? 'opacity-100 ease-in duration-200' : 'opacity-0 ease-out duration-100', 'absolute inset-0 flex h-full w-full items-center justify-center transition-opacity']">
                                                <svg class="h-3 w-3 text-blue-600" fill="currentColor" viewBox="0 0 12 12">
                                                    <path
                                                        d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z" />
                                                </svg>
                                            </span>
                                        </span>
                                    </Switch>
                                </div>
                                <div class="flex justify-between sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5 w-full">
                                    <div class="">
                                        <span class="text-lg">Enable Two Factor Authentication</span>
                                        <small class="mt-2 block text-gray-500">For White Background Logo</small>
                                    </div>
                                    <Switch @change="updateStatus" v-model="enabled"
                                    :class="[enabled ? 'bg-blue-600' : 'bg-gray-200', 'relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2']">
                                        <span
                                            :class="[enabled ? 'translate-x-5' : 'translate-x-0', 'pointer-events-none relative inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out']">
                                            <span
                                                :class="[enabled ? 'opacity-0 ease-out duration-100' : 'opacity-100 ease-in duration-200', 'absolute inset-0 flex h-full w-full items-center justify-center transition-opacity']">
                                                <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
                                                    <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <span
                                                :class="[enabled ? 'opacity-100 ease-in duration-200' : 'opacity-0 ease-out duration-100', 'absolute inset-0 flex h-full w-full items-center justify-center transition-opacity']">
                                                <svg class="h-3 w-3 text-blue-600" fill="currentColor" viewBox="0 0 12 12">
                                                    <path
                                                        d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z" />
                                                </svg>
                                            </span>
                                        </span>
                                    </Switch>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </ProfileSettingLayout>
</template>

<script>
    import ProfileSettingLayout from "@/Shared/Layout/ProfileSetting.vue";
    import { Switch } from '@headlessui/vue'

    export default {
        components: {
            ProfileSettingLayout,
            Switch
        },
        data() {
            return {
                form: this.$inertia.form({
                    app_name: 'as',
                }),

                enabled: false,
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
            async updateStatus(){
                // if (!this.loading) {
                //     this.loading = true;

                    // let response = await axios.put(route('doctor.appointmentSchedule.status', this.schedule.id))
                    console.log(12)
                //     this.enabled = !this.enabled
                //     this.loading = false;
                // }
            }
        }
    };
</script>

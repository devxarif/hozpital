<template>

    <Head :title="__('Application')" />

    <SettingLayout>
        <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-1 mt-6">
            <div class="bg-white w-full p-6 rounded-lg border border-gray-8 dark:border-gray-700 dark:hover:bg-gray-700">

                <form class="space-y-8 divide-y divide-gray-200">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div class="space-y-6 sm:space-y-5">
                    <div>
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Basic Setting</h2>

                        <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed publicly so be careful what you share.</p>
                    </div>

                    <div class="space-y-6 sm:space-y-5">
                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Username</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <div class="flex max-w-lg rounded-md shadow-sm">
                            <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">workcation.com/</span>
                            <input type="text" name="username" id="username" autocomplete="username" class="block w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            </div>
                        </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">About</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <textarea id="about" name="about" rows="3" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></textarea>
                            <p class="mt-2 text-sm text-gray-500">Write a few sentences about yourself.</p>
                        </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-center sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <div class="flex items-center">
                            <span class="h-12 w-12 overflow-hidden rounded-full bg-gray-100">
                                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </span>
                            <button type="button" class="ml-5 rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Change</button>
                            </div>
                        </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Cover photo</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <div class="flex max-w-lg justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-medium text-blue-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 hover:text-blue-500">
                                    <span>Upload a file</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>

                </div>

                <div class="pt-5">
                    <div class="flex justify-end">
                    <button type="button" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Cancel</button>
                    <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Save</button>
                    </div>
                </div>
                </form>

                <!-- <form class="mb-4">
                    <div class="mb-4">
                        <Label :name="__('Title')" id="holiday_title" :hasError="form.errors.title"/>
                        <BaseInput v-model="form.title" placeholder="Title" id="holiday_title" :hasError="form.errors.title"/>
                    </div>


                    <button :disabled="form.processing"  type="submit"
                        class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 font-medium rounded-lg text-md px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-3">
                        <Loading v-if="form.processing" :messageShow="false" />
                        <span v-else>
                            <svg class="inline w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" points="216 72.005 104 184 48 128.005"/></svg>
                            {{ __('Save') }}
                        </span>
                    </button>
                </form> -->
            </div>
        </div>
    </SettingLayout>
</template>

<script>
import SettingLayout from "@/Shared/Layout/Setting.vue";

export default {
    props: {
        // setting: Object,
        // sms_settings: Object,
    },
    components: {
        SettingLayout,

        // BrandInfo,
        // SocialMedia,
        // SMS,
        // RingIcon,
        // TwitterIcon,
        // PhoneIcon,
    },
    data() {
        return {
            currentTab: "brand_info",

            form: this.$inertia.form({
                title: '',
                color: '#ff0000',
            }),
        };
    },
    methods: {
        async changeTab(tab) {
            localStorage.setItem("generalCurrentTab", tab);
            this.currentTab = tab;
        },
    },
    mounted() {
        let tab = localStorage.getItem("generalCurrentTab") || "brand_info";
        this.currentTab = tab;
        this.changeTab(tab);
    },
};
</script>

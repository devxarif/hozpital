<template>
    <SettingLayout title="General">
        <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-1">
            <div class="bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <form @submit.prevent="updateData" class="space-y-8 divide-y divide-gray-200">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div class="space-y-6 sm:space-y-5">
                            <div>
                                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Basic Setting</h2>

                                <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed
                                    publicly so be careful what you share.</p>
                            </div>

                            <div class="space-y-6 sm:space-y-5">
                                <div
                                    class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Hospital Name" id="app_name" :hasError="form.errors.app_name" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg rounded-md shadow-sm">
                                            <BaseInput v-model="form.app_name" placeholder="Hospital Name"
                                                id="app_name" :hasError="form.errors.app_name" />
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="about"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">About</label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <textarea id="about" name="about" rows="3"
                                            class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></textarea>
                                        <p class="mt-2 text-sm text-gray-500">Write a few sentences about yourself.</p>
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:items-center sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Logo" id="logo" :hasError="form.errors.logo" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="flex items-center">
                                            <span class="h-20 w-20 overflow-hidden rounded-md bg-gray-50">
                                                <img class="h-20 w-full" src="/assets/img/hozpital_logo.svg"
                                                    alt="Your Company">
                                            </span>
                                            <button type="button"
                                                class="ml-5 rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Change</button>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:items-center sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Favicon" id="logo" :hasError="form.errors.logo" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="flex items-center">
                                            <span class="h-20 w-20 overflow-hidden rounded-md bg-gray-50">
                                                <img class="h-20 w-full" src="/assets/img/hozpital_logo.svg"
                                                    alt="Your Company">
                                            </span>
                                            <button type="button"
                                                class="ml-5 rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Change</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="pt-5">
                        <div class="flex justify-end">
                            <button type="button"
                                class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Cancel</button>
                            <button type="submit"
                                class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-1 mt-5">
            <div class="bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <form @submit.prevent="updateData" class="space-y-8 divide-y divide-gray-200">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div class="space-y-6 sm:space-y-5">
                            <div>
                                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Basic Setting</h2>

                                <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed
                                    publicly so be careful what you share.</p>
                            </div>

                            <div class="space-y-6 sm:space-y-5">
                                <div
                                    class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Hospital Name" id="app_name" :hasError="form.errors.app_name" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg rounded-md shadow-sm">
                                            <BaseInput v-model="form.app_name" placeholder="Hospital Name"
                                                id="app_name" :hasError="form.errors.app_name" />
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="about"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">About</label>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <textarea id="about" name="about" rows="3"
                                            class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"></textarea>
                                        <p class="mt-2 text-sm text-gray-500">Write a few sentences about yourself.</p>
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:items-center sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Logo" id="logo" :hasError="form.errors.logo" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="flex items-center">
                                            <span class="h-20 w-20 overflow-hidden rounded-md bg-gray-50">
                                                <img class="h-20 w-full" src="/assets/img/hozpital_logo.svg"
                                                    alt="Your Company">
                                            </span>
                                            <button type="button"
                                                class="ml-5 rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Change</button>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:items-center sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Favicon" id="logo" :hasError="form.errors.logo" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="flex items-center">
                                            <span class="h-20 w-20 overflow-hidden rounded-md bg-gray-50">
                                                <img class="h-20 w-full" src="/assets/img/hozpital_logo.svg"
                                                    alt="Your Company">
                                            </span>
                                            <button type="button"
                                                class="ml-5 rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Change</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="pt-5">
                        <div class="flex justify-end">
                            <button type="button"
                                class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Cancel</button>
                            <button type="submit"
                                class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </SettingLayout>
</template>

<script>
    import SettingLayout from "@/Shared/Layout/Setting.vue";

    export default {
        components: {
            SettingLayout,
        },
        data() {
            return {
                form: this.$inertia.form({
                    title: ''
                }),
            };
        },
        methods: {

        },
        mounted() {

        },
    };
</script>

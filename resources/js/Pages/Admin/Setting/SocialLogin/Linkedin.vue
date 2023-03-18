<template>
    <form @submit.prevent="updateData" class="space-y-8 divide-y divide-gray-200">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div class="space-y-6 sm:space-y-5">
                <div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Linkedin Login</h2>

                    <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed publicly so be
                        careful what you share.</p>
                </div>

                <div class="space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <Label name="Client ID" id="linkedin_id" :hasError="form.errors.linkedin_id"/>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <div class="max-w-lg rounded-md shadow-sm">
                                <BaseInput v-model="form.linkedin_id" placeholder="Client ID" id="linkedin_id" :hasError="form.errors.linkedin_id"/>
                                <ErrorMessage :name="form.errors.linkedin_id" />
                            </div>
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <Label name="Client Secret" id="linkedin_secret" :hasError="form.errors.linkedin_secret"/>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <div class="max-w-lg rounded-md shadow-sm">
                                <BaseInput v-model="form.linkedin_secret" placeholder="Client Secret" id="linkedin_secret" :hasError="form.errors.linkedin_secret"/>
                                <ErrorMessage :name="form.errors.linkedin_secret" />
                            </div>
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <Label name="Status" id="linkedin_active" :hasError="form.errors.linkedin_active"/>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <label for="linkedin_status" class="inline-flex relative items-center cursor-pointer">
                                <input @change="statusChange" v-model="form.linkedin_active" type="checkbox" id="linkedin_status" class="sr-only peer" :checked="form.linkedin_active">
                                <div
                                    class="w-11 h-6 bg-gray-200 rounded-full peer   peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <button :disabled="form.processing" type="submit"
                    class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-md px-5 py-2.5 mb-2   focus:outline-none  mt-3">
                    <Loading v-if="form.processing" :messageShow="false" />
                    <span v-else>
                        <svg class="inline w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none" />
                            <polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="24" points="216 72.005 104 184 48 128.005" /></svg>
                        {{ __('Save') }}
                    </span>
                </button>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    props: {
        data: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                linkedin_id: this.data.linkedin_id,
                linkedin_secret: this.data.linkedin_secret,
                linkedin_active: this.data.linkedin_active ? true: false,
                provider: "linkedin",
            }),
        };
    },
    methods: {
        statusChange(event) {
            if (event.target.checked == true) {
                this.form.linkedin_active = true;
            } else {
                this.form.linkedin_active = false;
            }
        },
        updateData() {
            this.form.put(route("admin.settings.socialLogin.update"), {
                preserveScroll: true
            });
        },
    },
    watch: {
        data: {
            handler() {
                this.form.linkedin_id = this.data.linkedin_id;
                this.form.linkedin_secret = this.data.linkedin_secret;
                this.form.linkedin_active = this.data.linkedin_active ? true: false;
            },
            deep: true,
        },
    },
};
</script>

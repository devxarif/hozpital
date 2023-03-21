<template>
    <SettingLayout title="General">
        <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-1">
            <div class="bg-white w-full p-6 rounded-lg border border-gray-8  ">
                {{ form }}
                <form @submit.prevent="saveData" class="space-y-8 divide-y divide-gray-200">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div class="space-y-6 sm:space-y-5">
                            <div>
                                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">System Setting</h2>

                                <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed publicly so be careful what you share.</p>
                            </div>

                            <div class="space-y-6 sm:space-y-5">
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Rows Per Page" id="rows_per_page" :hasError="form.errors.rows_per_page" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg rounded-md shadow-sm">
                                            <Multiselect id="rows_per_page" :close-on-select="true" :can-clear="true"
                                            :searchable="true" v-model="form.rows_per_page" :create-option="false"
                                            placeholder="Select Default Language" :options="data.all_rows_per_page.map(item => ({
                                                value: item.value, label: item.label
                                            }))"  />
                                            <ErrorMessage :name="form.errors.rows_per_page"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Start Day of Week" id="start_day_of_week" :hasError="form.errors.start_day_of_week" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg rounded-md shadow-sm">
                                            <Multiselect id="start_day_of_week" :close-on-select="true" :can-clear="true"
                                            :searchable="true" v-model="form.start_day_of_week" :create-option="false"
                                            placeholder="Select Default Language" :options="data.week_days.map(item => ({
                                                value: item.value, label: item.label
                                            }))"  />
                                            <ErrorMessage :name="form.errors.start_day_of_week"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Default Language" id="default_language" :hasError="form.errors.app_name" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg rounded-md shadow-sm">
                                            <Multiselect id="default_language" :close-on-select="true" :can-clear="true"
                                            :searchable="true" v-model="form.default_language" :create-option="false"
                                            placeholder="Select Default Language" :options="data.languages.map(item => ({
                                                value: item.language_code, label: item.name
                                            }))"  />
                                            <ErrorMessage :name="form.errors.default_language"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Timezone" id="timezone" :hasError="form.errors.app_name" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg rounded-md shadow-sm">
                                            <Multiselect id="timezone" :close-on-select="true" :can-clear="true"
                                            :searchable="true" v-model="form.timezone" :create-option="false"
                                            placeholder="Select Timezone" :options="data.all_timezones.map(item => ({
                                                value: item.value, label: item.label
                                            }))"  />
                                            <ErrorMessage :name="form.errors.timezone"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Date Format" id="date_format" :hasError="form.errors.app_name" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg rounded-md shadow-sm">
                                            <Multiselect id="date_format" :close-on-select="true" :can-clear="true"
                                            :searchable="true" v-model="form.date_format" :create-option="false"
                                            placeholder="Select Date Format" :options="data.all_date_formats.map(item => ({
                                                value: item.value, label: item.label
                                            }))"  />
                                            <ErrorMessage :name="form.errors.date_format"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Time Format" id="time_format" :hasError="form.errors.app_name" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg rounded-md shadow-sm">
                                            <Multiselect id="time_format" :close-on-select="true" :can-clear="true"
                                            :searchable="true" v-model="form.time_format" :create-option="false"
                                            placeholder="Select Date Format" :options="all_time_formats.map(item => ({
                                                value: item.value, label: item.label
                                            }))"  />
                                            <ErrorMessage :name="form.errors.time_format"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Decimal Places" id="decimal_places" :hasError="form.errors.app_name" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg rounded-md shadow-sm">
                                            <Multiselect id="decimal_places" :close-on-select="true" :can-clear="true"
                                            :searchable="true" v-model="form.decimal_places" :create-option="false"
                                            placeholder="Select Decimal Places" :options="data.decimal_places_options.map(item => ({
                                                value: item.value, label: item.label
                                            }))"  />
                                            <ErrorMessage :name="form.errors.decimal_places"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Decimal Separator" id="decimal_separator" :hasError="form.errors.app_name" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg rounded-md shadow-sm">
                                            <Multiselect id="decimal_separator" :close-on-select="true" :can-clear="true"
                                            :searchable="true" v-model="form.decimal_separator" :create-option="false"
                                            placeholder="Select Decimal Separator" :options="data.decimal_separator_options.map(item => ({
                                                value: item.value, label: item.label
                                            }))"  />
                                            <ErrorMessage :name="form.errors.decimal_separator"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Thousand Separator" id="thousand_separator" :hasError="form.errors.app_name" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg rounded-md shadow-sm">
                                            <Multiselect id="thousand_separator" :close-on-select="true" :can-clear="true"
                                            :searchable="true" v-model="form.thousand_separator" :create-option="false"
                                            placeholder="Select Thousand Separator" :options="data.thousand_separator_options.map(item => ({
                                                value: item.value, label: item.label
                                            }))"  />
                                            <ErrorMessage :name="form.errors.thousand_separator"/>
                                        </div>
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
    props: {
        data: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                rows_per_page: this.data.rows_per_page,
                start_day_of_week: this.data.start_day_of_week,
                default_language: this.data.default_language,
                timezone: this.data.timezone,
                date_format: this.data.date_format,
                time_format: this.data.time_format,
                thousand_separator: this.data.thousand_separator,
                decimal_separator: this.data.decimal_separator,
                decimal_places: this.data.decimal_places,
            }),

            all_time_formats: [
                { value: 'h:i A', label: '12 Hour' },
                { value: 'H:i', label: '24 Hour' },
            ],

            // 'default_language' => 'en',
            // 'timezone' => config('app.timezone'),
            // 'date_format' => 'd-m-Y',
            // 'thousand_separator' => ',',

    //         '' => 'en',
    // '' => 'UTC',
    // '' => 'd-m-Y',
    // '' => ',',


        };
    },
    methods: {
        saveData() {
            this.form.post(route("admin.settings.system.update"), {
                preserveScroll: true,
                onSuccess: () => {
                    if (this.form.app_favicon) {
                        window.location.reload();
                    }
                },
            });
        },
    },
    mounted() {

    },
};
</script>

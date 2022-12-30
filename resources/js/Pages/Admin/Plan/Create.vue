<template>
<Transition name="slide-fade">
    <div class="fixed inset-0 overflow-hidden z-50" v-if="show">
        <div class="absolute inset-0 overflow-hidden transition-opacity">
            <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div class="pointer-events-none absolute right-0 inset-y-0 flex max-w-full ltr:pl-10 rtl:pr-10"
                v-click-outside="()=> $emit('close-drawer')">
                <div class="pointer-events-auto w-screen max-w-xs lg:max-w-2xl">
                    <div class="flex h-full flex-col bg-white shadow-xl">
                        <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
                            <div class="flex items-start justify-between rtl:flex-row-reverse mb-5">
                                <h2 class="text-2xl tracking-wide font-bold text-gray-900">
                                    {{ __('Plan Create') }}
                                </h2>
                                <div class="ml-3 flex h-7 items-center">
                                    <button type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500"
                                        @click="$emit('close-drawer')">
                                        <svg class="h-6 w-6" x-description="Heroicon name: outline/x"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <form class="mb-4" @submit.prevent="createData">
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="mb-4">
                                        <Label :name="__('Name')" id="plan_name" :hasError="form.errors.name"/>
                                        <BaseInput v-model="form.name" placeholder="Name" id="plan_name" :hasError="form.errors.name"/>
                                    </div>
                                    <div class="mb-4">
                                        <Label :name="__('Plan Type')" :hasError="form.errors.type"/>
                                        <BaseSelect v-model:value="form.type" :hasError="form.errors.type">
                                            <option value="paid">{{ __('Paid') }}</option>
                                            <option value="free">{{ __('Free') }}</option>
                                        </BaseSelect>
                                    </div>
                                </div>
                                <div class="grid gap-4" :class="showCustomIntervalField ? 'grid-cols-3':'grid-cols-2'">
                                    <div class="mb-4">
                                        <Label :name="__('Price')" id="plan_price" :hasError="form.errors.price"/>
                                        <BaseInput v-model="form.price" placeholder="Price" id="plan_price" :hasError="form.errors.price"/>
                                    </div>
                                    <div class="mb-4">
                                        <Label :name="__('Subscription Type')" :hasError="form.errors.interval"/>
                                        <BaseSelect v-model:value="form.interval" :hasError="form.errors.interval">
                                            <option value="monthly">{{ __('Monthly') }}</option>
                                            <option value="yearly">{{ __('Yearly') }}</option>
                                            <option value="custom_days">{{ __('Custom Days') }}</option>
                                            <option value="lifetime">{{ __('Lifetime') }}</option>
                                        </BaseSelect>
                                    </div>
                                    <div class="mb-4" v-if="showCustomIntervalField">
                                        <Label :name="__('Number of Days')"  id="plan_custom_days"/>
                                        <BaseInput v-model="form.custom_interval_days" placeholder="Days" id="plan_custom_days" type="number" min="1"/>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="mb-4">
                                        <Label :name="__('Employee Adding Type')" id="plan_employee_adding_type" :hasError="form.errors.is_limited_employee"/>
                                        <BaseSelect v-model:value="form.is_limited_employee" id="plan_employee_adding_type" :hasError="form.errors.is_limited_employee">
                                            <option value="1">{{ __('Limited Employee') }}</option>
                                            <option value="0">{{ __('Unlimited Employee') }}</option>
                                        </BaseSelect>
                                    </div>
                                    <div class="mb-4">
                                        <Label :name="__('Max Employees')" id="plan_max_employees" :hasError="form.errors.max_employees"/>
                                        <BaseInput v-model="form.max_employees" placeholder="Price" id="plan_max_employees" :hasError="form.errors.max_employees"/>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="mb-4">
                                        <Label :name="__('Max Teams')" id="plan_max_teams" :hasError="form.errors.max_teams"/>
                                        <BaseInput v-model="form.max_teams" placeholder="Max Teams" id="plan_max_teams" :hasError="form.errors.max_teams"/>
                                    </div>
                                    <div class="mb-4">
                                        <Label :name="__('Max Leave Types')" id="plan_leave_types" :hasError="form.errors.max_leave_types"/>
                                        <BaseInput v-model="form.max_leave_types" placeholder="Max Leave Types" id="plan_leave_types" :hasError="form.errors.max_leave_types"/>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="mb-4">
                                        <Label :name="__('Status')" id="plan_max_teams" :hasError="form.errors.status"/>
                                        <label for="checked-toggle" class="inline-flex relative items-center cursor-pointer">
                                            <input checked @change="statusChange" type="checkbox" id="checked-toggle" class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                        </label>
                                    </div>
                                </div>
                                <button :disabled="form.processing"  type="submit"
                                    class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-3">
                                    <Loading v-if="form.processing" :messageShow="false" />
                                    <span v-else>
                                        <svg class="inline w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" points="216 72.005 104 184 48 128.005"/></svg>
                                        {{ __('Save') }}
                                    </span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</Transition>
</template>

<script>
    export default {
        props: {
            show: {
                type: Boolean,
                default: false
            }
        },
        data() {
            return {
                form: this.$inertia.form({
                    name: null,
                    type: "paid",
                    price: null,
                    interval: "monthly",
                    custom_interval_days: 15,
                    status: 1,

                    // plan features
                    is_limited_employee: 1,
                    max_employees: 10,
                    max_teams: 3,
                    max_leave_types: 3,
                    // custom_theme_look: 0,
                }),

                showCustomIntervalField: false,
                showMaxEmployeeField: true,
            };
        },
        watch: {
            "form.interval": function (val) {
                if (val == "custom_days") {
                    this.showCustomIntervalField = true;
                } else {
                    this.showCustomIntervalField = false;
                }
            },
            "form.is_limited_employee": function (val) {
                if (val == 1) {
                    this.showMaxEmployeeField = true;
                } else {
                    this.showMaxEmployeeField = false;
                }
            },
        },
        methods: {
            createData() {
                this.form.post(route("plans.store"), {
                    onSuccess: () => {
                        this.form.reset(),
                        this.$emit('close-drawer')

                    },
                });
            },
            statusChange(event) {
                this.form.status = event.target.checked;
            },
            customLookStatusChange(event) {
                this.form.custom_theme_lookup = event.target.checked;
            },
        },
        mounted() {
            this.checkPagePermission('admin')
        }
    };
</script>

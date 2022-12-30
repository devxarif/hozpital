<template>
     <Transition name="slide-fade">
         <div class="fixed inset-0 overflow-hidden z-50" v-if="show">
            <div class="absolute inset-0 overflow-hidden transition-opacity">
                <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                <div class="pointer-events-none absolute right-0 inset-y-0 flex max-w-full ltr:pl-10 rtl:pr-10"
                    v-click-outside="()=> $emit('close-drawer')">
                    <div class="pointer-events-auto w-screen max-w-xs lg:max-w-4xl">
                        <div class="flex h-full flex-col bg-white shadow-xl">
                            <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
                                <div class="flex items-start justify-between rtl:flex-row-reverse mb-5">
                                        <h2 class="text-2xl tracking-wide font-bold text-gray-900">
                                            {{ __('Leave Request Create') }}
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
                                        <div class="mb-4">
                                            <Label :name="__('Leave Type')" id="plan_name" :hasError="form.errors.name"/>
                                            <ul class="grid grid-cols-4 gap-3 mx-auto">
                                                <li class="relative" v-for="(i, index) in 4">
                                                    <input class="sr-only peer" type="radio" value="yes" name="answer" :id="index">
                                                    <label class="flex p-5 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-blue-500 peer-checked:ring-2 peer-checked:border-transparent" :for="index">Yes</label>

                                                    <div class="absolute hidden w-5 h-5 peer-checked:block top-5 right-3">
                                                    <CheckIcon stroke="blue"/>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div class="mb-4">
                                                <Label :name="__('Employee')" id="plan_name" :hasError="form.errors.name"/>
                                                <BaseInput v-model="form.name" placeholder="Name" id="plan_name" :hasError="form.errors.name"/>
                                            </div>
                                            <div class="mb-4">
                                                <Label :name="__('Leave Type')" :hasError="form.errors.type"/>
                                                <BaseSelect v-model:value="form.type" :hasError="form.errors.type">
                                                    <option value="paid">{{ __('Paid') }}</option>
                                                    <option value="free">{{ __('Free') }}</option>
                                                </BaseSelect>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div class="mb-4">
                                                <Label :name="__('Start Date')" id="plan_name" :hasError="form.errors.name"/>
                                                <BaseInput v-model="form.name" placeholder="Name" id="plan_name" :hasError="form.errors.name"/>
                                            </div>
                                            <div class="mb-4">
                                                <Label :name="__('End Date')" id="plan_name" :hasError="form.errors.name"/>
                                                <BaseInput v-model="form.name" placeholder="Name" id="plan_name" :hasError="form.errors.name"/>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 gap-4">
                                            <div class="mb-4">
                                                <Label :name="__('Reason')" id="plan_name" :hasError="form.errors.name"/>
                                                <!-- <BaseInput v-model="form.name" placeholder="Name" id="plan_name" :hasError="form.errors.name"/> -->
                                                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."></textarea>

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

                                       <div>
                                        <Label :name="__('Max Employees')" id="plan_max_employees" :hasError="form.errors.max_employees"/>
                                        <div class="grid grid-cols-3 gap-4">

                                            <div class="flex items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
                                                <div class="flex items-center h-5">
                                                    <input id="helper-radio" aria-describedby="helper-radio-text" type="radio" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                </div>
                                                <div class="m-2 text-sm">
                                                    <label for="helper-radio" class="font-bold text-gray-900 dark:text-gray-300">Free shipping via Flowbite</label>
                                                    <p id="helper-radio-text" class="text-xs font-normal text-gray-500 dark:text-gray-300">For orders shipped from $25 in books or $29 in other categories</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
                                                <div class="flex items-center h-5">
                                                    <input id="helper-radio" aria-describedby="helper-radio-text" type="radio" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                </div>
                                                <div class="m-2 text-sm">
                                                    <label for="helper-radio" class="font-bold text-gray-900 dark:text-gray-300">Free shipping via Flowbite</label>
                                                    <p id="helper-radio-text" class="text-xs font-normal text-gray-500 dark:text-gray-300">For orders shipped from $25 in books or $29 in other categories</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
                                                <div class="flex items-center h-5">
                                                    <input id="helper-radio" aria-describedby="helper-radio-text" type="radio" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                </div>
                                                <div class="m-2 text-sm">
                                                    <label for="helper-radio" class="font-bold text-gray-900 dark:text-gray-300">Free shipping via Flowbite</label>
                                                    <p id="helper-radio-text" class="text-xs font-normal text-gray-500 dark:text-gray-300">For orders shipped from $25 in books or $29 in other categories</p>
                                                </div>
                                            </div>

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
    <!-- <Head :title="__('Create Leave Request')" />
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">{{ __('Create Leave Request') }}</h3>
                        <Link :href="route('organization.leaveRequests.index')" class="btn btn-primary">
                        <i class="fa-solid fa-arrow-left"></i>
                        {{ __('Back') }}
                        </Link>
                    </div>
                </div>
                <div class="card-body row justify-content-center">
                    <div class="col-lg-6">
                        <form @submit.prevent="createData">
                        <div class="mb-3 row">
                             <div class="col-md-6">
                                 <Label :name="__('Employee')" />
                                <select v-model="form.employee_id" id="company" class="form-control"
                                    :class="{'is-invalid':form.errors.employee_id}">
                                    <option value="" class="d-none">{{ __('Select Employee') }}</option>
                                    <option :value="employeesUser.id" v-for="employeesUser in employeesUsers" :key="employeesUser.id">
                                        {{ employeesUser.user.name }}
                                    </option>
                                </select>
                                <ErrorMessage :name="form.errors.employee_id" />
                            </div>
                            <div class="col-md-6">
                                 <Label :name="__('Leave Type')" />
                                <select @change="checkLeaveTypeBalance" v-model="form.leave_type_id" id="company" class="form-control" :disabled="!form.employee_id"
                                    :class="{'is-invalid':form.errors.leave_type_id}">
                                    <option value="" class="d-none">{{ __('Select Leave Type') }}</option>
                                    <option :value="leaveType.id" v-for="leaveType in leaveTypes" :key="leaveType.id">
                                        {{ leaveType.name }}
                                    </option>
                                </select>
                                <ErrorMessage :name="form.errors.leave_type_id" />
                                <template v-if="showLeaveTypeBalance">
                                    <strong :class="!leaveTypeBalance.remaining_days ? 'text-danger':'text-secondary'" v-if="leaveTypeBalance">{{ __('Leave Type Balance') }}: {{ leaveTypeBalance.remaining_days }}/{{ leaveTypeBalance.total_days }}</strong>
                                </template>
                            </div>
                        </div>
                         <div class="mb-3 row">
                            <div class="col-md-6">
                                <Label :name="__('Start Date')" />
                                <Datepicker v-model="form.start" :enableTimePicker="false"
                                    @update:modelValue="handleStartDate" :class="{'is-invalid':form.errors.start}"/>
                                <ErrorMessage :name="form.errors.start"/>
                            </div>
                            <div class="col-md-6">
                                <Label :name="__('End Date')" />
                                <Datepicker v-model="form.end" :enableTimePicker="false"
                                    @update:modelValue="handleEndDate" :class="{'is-invalid':form.errors.end}"/>
                                <ErrorMessage :name="form.errors.end"/>
                            </div>
                            <template v-if="diffBetweenDays">
                                <strong class="ml-1" :class="leaveTypeBalance.remaining_days < diffBetweenDays ? 'text-danger':'text-secondary'" v-if="leaveTypeBalance">{{ __('Number of Days') }}: {{ diffBetweenDays }}</strong>
                            </template>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-lg-12">
                                <Label :name="__('Reason')" :required="false" />
                                <textarea class="form-control" v-model="form.reason" :class="{'is-invalid':form.errors.reason}" rows="5"></textarea>
                                <ErrorMessage :name="form.errors.reason" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-lg-6">
                                <Label :name="__('Status')" :required="false"/> <br>
                                <div class="form-check form-check-inline">
                                    <input v-model="form.status" class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="pending" value="pending">
                                    <label class="form-check-label" for="pending">{{ __('Pending') }}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input v-model="form.status" class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="approved" value="approved">
                                    <label class="form-check-label" for="approved">{{ __('Approve') }}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input v-model="form.status" class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="rejected" value="rejected">
                                    <label class="form-check-label" for="rejected">{{ __('Reject') }}</label>
                                </div>
                                <ErrorMessage :name="form.errors.end" className="block text-danger"/>
                            </div>
                        </div>
                        <button :disabled="submitButtonDisabled" type="submit" class="btn btn-primary">
                            <Loading v-if="form.processing"/>
                            <span v-else>
                                <i class="fa-solid fa-check mr-1"></i>
                                {{ __('Save') }}
                            </span>
                        </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</template>

<script>
import Datepicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
import dayjs from "dayjs";

export default {
    props: {
        leaveTypes: {
            type: Array,
            required: true,
        },
        employeesUsers: {
            type: Array,
            required: true,
        },
        show: {
            type: Boolean,
            default: false
        }
    },
    components: {
        Datepicker,
    },
    data() {
        return {
            form: this.$inertia.form({
                leave_type_id: "",
                employee_id: "",
                start: "",
                end: "",
                reason: "",
                status: "pending",
            }),

            leaveTypeBalance: {},
            showLeaveTypeBalance: false,
            diffBetweenDays: 0,
            auth_user: this.$page.props.authenticatedUser,
        };
    },
    methods: {
        createData() {
            this.form.post(route("organization.leaveRequests.store"));
        },
        statusChange(event) {
            this.form.status = event.target.checked;
        },
        handleStartDate(startDate) {
            const formatTime = dayjs(startDate).format("YYYY-MM-DD");

            if(this.form.end){
                let dateCheck = this.checkDateValidity(formatTime, this.form.end);

                if(!dateCheck){
                    this.form.end = ''
                    return this.toastError("End date must be grater than start date")
                }
            }

            this.form.start = formatTime;
        },
        handleEndDate(endDate) {
            const formatTime = dayjs(endDate).format("YYYY-MM-DD");

            if(this.form.start){
                let dateCheck = this.checkDateValidity(this.form.start, formatTime);

                if(!dateCheck){
                    this.form.end = ''
                    return this.toastError("End date must be grater than start date")
                }
            }

            this.form.end = formatTime;
        },
        async checkLeaveTypeBalance() {
            let response = await axios.get(
                route("organization.employee.leave.type.balance"),
                {
                    params: {
                        employee_id: this.form.employee_id,
                        leave_type_id: this.form.leave_type_id,
                    },
                }
            );

            this.leaveTypeBalance = response.data;
            this.showLeaveTypeBalance = true;
        },
    },
    computed: {
        dates() {
            return `${this.form.start}|${this.form.end}`;
        },
        submitButtonDisabled() {
            return (
                this.form.processing ||
                !this.leaveTypeBalance.remaining_days ||
                this.leaveTypeBalance.remaining_days < this.diffBetweenDays
            );
        },
    },
    watch: {
        async dates(newVal) {
            const [start, end] = newVal.split("|");

            if (start && end) {
                let response = await axios.get(
                    route("difference.between.days"),
                    {
                        params: {
                            start: this.form.start,
                            end: this.form.end,
                            organization_id: this.auth_user.organization.id,
                        },
                    }
                );

                this.diffBetweenDays = response.data.final_days_count;
            }
        },
    },
    mounted() {
        this.checkPagePermission("owner");
    },
};
</script>

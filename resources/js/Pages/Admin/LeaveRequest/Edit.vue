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
                                        {{ __('Leave Request Update') }}
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
                                <form class="mb-4" @submit.prevent="saveData">
                                    <div class="mb-4">
                                        <Label name="Create A Leave Request')" :hasError="form.errors.request_for" :required="false"/>
                                        <div class="w-full bg-gray-200 p-2 rounded-lg">
                                            <div class="account-switcher relative flex after:absolute candidate after:transition-all duration-300 after:rounded-lg">
                                                <div class="w-full rounded-xl" :class="form.request_for == 'me' ? 'bg-gray-800 text-white shadow':'text-gray-800'">
                                                    <input type="radio" id="radio1" name="radio" class="hidden" checked>
                                                    <label for="radio1" class="relative z-50 rounded-md transition-all duration-300 w-full py-3 gap-2 flex items-center justify-center cursor-pointer" @click="changeLeaveRequestFor('me')">
                                                        <UserIcon class="h-5 w-5"/>
                                                        <span>For Me</span>
                                                    </label>
                                                </div>
                                                <div class="w-full rounded-xl" :class="form.request_for == 'others' ? 'bg-gray-800 text-white shadow':'text-gray-800'">
                                                    <input type="radio" id="radio2" name="radio" class="hidden">
                                                    <label for="radio2" class="relative z-50 rounded-md transition-all duration-300 flex w-full py-3 gap-2 items-center justify-center cursor-pointer" @click="changeLeaveRequestFor('others')">
                                                        <UsersIcon class="h-5 w-5"/>
                                                        <span>For Staffs</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4" v-show="form.request_for == 'others'">
                                        <Label name="Staff" id="admin_leave_request" :hasError="form.errors.user"/>
                                        <div class="flex items-center">
                                            <Multiselect @change="changeUser" id="admin_leave_request" :close-on-select="true" :can-clear="true"
                                            :searchable="true" v-model="form.user" :create-option="false"
                                            placeholder="Select Staff" :options="users.map(item => ({
                                                value: item.id, label: item.name
                                            }))"  />
                                        </div>
                                        <ErrorMessage :name="form.errors.user"/>
                                    </div>
                                    <template v-if="form.request_for == 'others' && form.user">
                                        <div class="mb-4">
                                            <Label name="Select Leave Type" id="leave_type" :hasError="form.errors.leave_type"/>
                                            <div class="grid grid-cols-4 gap-2 mx-auto">
                                                <div class="relative" v-for="(leave_type_balance, index) in leave_types_balances" :key="index">
                                                    <input @change="leaveTypeChange" class="sr-only peer" type="radio" :value="leave_type_balance.leave_type_id" :id="leave_type_balance?.leave_type?.slug || 'leave_type_me'" v-model="form.leave_type">
                                                    <label class="flex p-2 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-blue-500 peer-checked:ring-2 peer-checked:border-transparent flex-col peer-checked:shadow-xl" :for="leave_type_balance?.leave_type?.slug || 'leave_type_me'">
                                                        <span class="text-lg font-bold">{{ leave_type_balance.leave_type.name }}</span>
                                                        <ul class="text-sm">
                                                            <li><span class="text-md font-medium">Total Days</span> : {{ leave_type_balance.total_days }}</li>
                                                            <li><span class="text-md font-medium">Remaining</span> : {{ leave_type_balance.remaining_days }}</li>
                                                        </ul>
                                                    </label>
                                                    <template v-if="leave_type_balance.leave_type">
                                                    </template>
                                                </div>
                                            </div>
                                            <ErrorMessage :name="form.errors.leave_type"/>
                                        </div>
                                    </template>
                                    <template v-if="form.request_for == 'me' && leave_types_balances.length">
                                        <div class="mb-4">
                                            <Label name="Select Leave Type" id="leave_type" :hasError="form.errors.leave_type"/>
                                            <div class="grid grid-cols-4 gap-2 mx-auto">
                                                <div class="relative" v-for="(leave_type_balance, index) in leave_types_balances" :key="index">
                                                    <input @change="leaveTypeChange" class="sr-only peer" type="radio" :value="leave_type_balance.leave_type_id" :id="leave_type_balance?.leave_type?.slug || 'leave_type_others'" v-model="form.leave_type">
                                                    <label class="flex p-2 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-blue-500 peer-checked:ring-2 peer-checked:border-transparent flex-col peer-checked:shadow-xl" :for="leave_type_balance?.leave_type?.slug || 'leave_type_others'">
                                                        <span class="text-lg font-bold">{{ leave_type_balance.leave_type.name }}</span>
                                                        <ul class="text-sm">
                                                            <li><span class="text-md font-medium">Total Days</span> : {{ leave_type_balance.total_days }}</li>
                                                            <li><span class="text-md font-medium">Remaining</span> : {{ leave_type_balance.remaining_days }}</li>
                                                        </ul>
                                                    </label>
                                                    <template v-if="leave_type_balance.leave_type">
                                                    </template>
                                                </div>
                                            </div>
                                            <ErrorMessage :name="form.errors.leave_type"/>
                                        </div>
                                    </template>
                                    <div class="grid grid-cols-2 gap-2">
                                        <div class="mb-4">
                                            <Label name="Start Date" id="start_date" :hasError="form.errors.start"/>
                                            <Datepicker v-model="form.start" :enableTimePicker="false" class="border-none bg-gray-50 border text-md rounded-lg block w-full p-1    border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500    "
                                                @update:modelValue="handleStartDate" :placeholder="__('Select Date')" :default-value="new Date()" />
                                            <ErrorMessage :name="form.errors.start"/>
                                            <template v-if="diffBetweenDays">
                                                <strong class="ml-1" :class="countBetweenDays()">{{ __('Number of Days') }}: {{ diffBetweenDays }}</strong>
                                            </template>
                                        </div>
                                        <div class="mb-4">
                                            <Label name="End Date" id="end_date" :hasError="form.errors.end"/>
                                            <Datepicker v-model="form.end" :enableTimePicker="false" class="border-none bg-gray-50 border text-md rounded-lg block w-full p-1    border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500    "
                                                @update:modelValue="handleEndDate" :placeholder="__('Select Date')" :default-value="new Date()" />
                                            <ErrorMessage :name="form.errors.end"/>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <Label name="Reason" id="leave_reason" :hasError="form.errors.reason" :required="false"/>
                                        <BaseTextarea v-model="form.reason" placeholder="Reason" id="leave_reason" :hasError="form.errors.description"/>
                                        <ErrorMessage :name="form.errors.reason"/>
                                    </div>
                                    <div class="mb-4">
                                        <Label name="Status" :hasError="form.errors.status" :required="false"/>
                                        <div class="flex gap-2">
                                            <label for="status_pending" class="w-full rounded-lg flex items-center pl-4 border border-gray-200  py-3 text-sm font-medium text-gray-700 gap-2">
                                                <input id="status_pending" value="pending" v-model="form.status" type="radio" class="h-4 w-4 border-gray-300 text-blue-600 focus:outline-none">
                                                <span>{{ __('Pending') }}</span>
                                            </label>
                                            <label for="status_approve" class="w-full rounded-lg flex items-center pl-4 border border-gray-200  py-3 text-sm font-medium text-gray-700 gap-2">
                                                <input id="status_approve" value="approved" v-model="form.status" type="radio" class="h-4 w-4 border-gray-300 text-blue-600 focus:outline-none">
                                                <span>{{ __('Approve') }}</span>
                                            </label>
                                            <label for="status_reject" class="w-full rounded-lg flex items-center pl-4 border border-gray-200  py-3 text-sm font-medium text-gray-700 gap-2">
                                                <input id="status_reject" value="rejected" v-model="form.status" type="radio" class="h-4 w-4 border-gray-300 text-blue-600 focus:outline-none">
                                                <span>{{ __('Reject') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <button :disabled="form.processing"  type="submit"
                                        class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 font-medium rounded-lg text-md px-5 py-2.5 mb-2   focus:outline-none  mt-3">
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
import { UserIcon, UsersIcon } from '@heroicons/vue/24/outline'

export default {
    props: {
        leave_request: {
            type: Object,
            required: true,
        },
        show: {
            type: Boolean,
            default: false
        },
        users: {
            type: Array,
            default: () => []
        },
    },
    components: {
        UserIcon,
        UsersIcon
    },
    data() {
        return {
            form: this.$inertia.form({
                leave_type: this.leave_request.leave_type_id,
                user: this.leave_request.user_id,
                start: this.leave_request.start,
                end: this.leave_request.end,
                reason: this.leave_request.reason,
                request_for: this.$page.props.authenticatedUser.id == this.leave_request.user_id ? 'me':'others',
                status: this.leave_request.status,
            }),

            diffBetweenDays: 0,
            leave_types_balances: []

        };
    },
    methods: {
        saveData() {
            let leave_type = this.leave_types_balances.find(leave_balance => leave_balance.leave_type_id == this.form.leave_type)
            let isBigBetweenDays = leave_type.remaining_days < this.diffBetweenDays ? false:true

            if (!isBigBetweenDays) {
                this.toastError('Between days cannot be grater than the remainging days')
                return ;
            }

            this.form.put(route("admin.leaveRequest.update", this.leave_request.id), {
                onSuccess: () => {
                    this.form.reset(),
                    this.$emit('close-drawer')
                },
            });
        },
        statusChange(event) {
            this.form.status = event.target.checked;
        },
        leaveTypeChange(event) {
            this.form.leave_type = event.target.value;
        },
        changeLeaveRequestFor(type) {
            if (type != this.form.request_for) {
                this.form.request_for = type;

                if (this.form.request_for == 'me') {
                    this.loadLeaveTypesBalance()
                }else if(this.form.request_for == 'others'){
                    this.loadLeaveTypesBalance(this.form.user)
                }
            }
        },
        changeUser() {
            if (this.form.user) {
                this.loadLeaveTypesBalance(this.form.user)
            }
        },
        handleStartDate(startDate) {
            const formatTime = this.formateDate(startDate, "YYYY-MM-DD");

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
            const formatTime = this.formateDate(endDate, "YYYY-MM-DD");

            if(this.form.start){
                let dateCheck = this.checkDateValidity(this.form.start, formatTime);

                if(!dateCheck){
                    this.form.end = ''
                    return this.toastError("End date must be grater than start date")
                }
            }

            this.form.end = formatTime;
        },
        async loadLeaveTypesBalance(user){
            let response = await axios.get(route("fetch.leaveTypesBalance"), {
                params: {
                    user_id: user || null,
                }
            });
            this.leave_types_balances = response.data;
        },
        countBetweenDays(){
            if (this.diffBetweenDays && this.form.leave_type) {
                let leave_type = this.leave_types_balances.find(leave_balance => leave_balance.leave_type_id == this.form.leave_type)
                return leave_type.remaining_days < this.diffBetweenDays ? 'text-red-500':''
            }
        }
    },
    computed: {
        dates() {
            return `${this.form.start}|${this.form.end}`;
        }
    },
    watch: {
        leave_request: {
            handler() {
                this.form.leave_type = this.leave_request.leave_type_id
                this.form.user = this.leave_request.user_id
                this.form.start = this.leave_request.start
                this.form.end = this.leave_request.end
                this.form.reason = this.leave_request.reason
                this.form.request_for = this.$page.props.authenticatedUser.id == this.leave_request.user_id ? 'me':'others'
                this.form.status = this.leave_request.status
            },
            deep: true,
        },
        async dates(newVal) {
            const [start, end] = newVal.split("|");

            if (start && end) {
                let response = await axios.get(route("difference.between.days"),{
                    params: {
                        start: this.form.start,
                        end: this.form.end,
                    },
                });

                this.diffBetweenDays = response.data.final_days_count;
            }
        }
    },
    mounted(){
        this.checkPagePermission('admin')

        if (this.$page.props.authenticatedUser.id == this.leave_request.user_id) {
            this.loadLeaveTypesBalance()
        }else{
            this.loadLeaveTypesBalance(this.leave_request.user_id)
        }
    }
};
</script>

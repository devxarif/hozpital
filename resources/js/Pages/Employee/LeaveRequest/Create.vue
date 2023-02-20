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
                                        <div class="grid grid-cols-4 gap-3 mx-auto" v-if="leaveTypeLoading">
                                            <div role="status" class="animate-pulse" v-for="i in 3" :key="i">
                                                <label class="flex p-5 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-blue-500 peer-checked:ring-2 peer-checked:border-transparent flex-col peer-checked:shadow-xl">
                                                    <div class="h-2.5 bg-gray-200 rounded-full   mb-4"></div>
                                                    <div class="h-2 bg-gray-200 rounded-full  max-w-[300px] mb-2.5"></div>
                                                    <div class="h-2 bg-gray-200 rounded-full  max-w-[300px] mb-2.5"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-4 gap-3 mx-auto" v-else>
                                            <div class="relative" v-for="(leave_type, index) in leave_types" :key="leave_type.id">
                                                <input @change="leaveTypeChange" class="sr-only peer" type="radio" :value="leave_type.id" :id="index" v-model="form.leave_type_id">
                                                <label class="flex p-5 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-blue-500 peer-checked:ring-2 peer-checked:border-transparent flex-col peer-checked:shadow-xl" :for="index">
                                                    <span class="text-lg font-bold mt-2">{{ leave_type.name }}</span>
                                                    <ul class="text-sm mt-2">
                                                        <li><span class="text-md font-medium">Balance</span> : {{ leave_type.balance }} Days</li>
                                                        <li><span class="text-md font-medium">Used</span> : {{ leave_type.used_days }} Days</li>
                                                        <li><span class="text-md font-medium">Available</span> : {{ leave_type.remaining_days }} Days</li>
                                                    </ul>
                                                </label>

                                                <span class="absolute top-1 right-1">
                                                    <Popper arrow :hover="true" :content="leave_type.description" >
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                                    </Popper>
                                                </span>
                                            </div>
                                        </div>
                                        <ErrorMessage :name="form.errors.leave_type_id"/>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="mb-4">
                                            <Label :name="__('Start Date')" id="request_start" :hasError="form.errors.start"/>
                                            <Datepicker v-model="form.start" :enableTimePicker="false" @update:modelValue="handleStartDate" :class="{'border-red-600':form.errors.start}"/>
                                            <ErrorMessage :name="form.errors.start"/>
                                        </div>
                                        <div class="mb-4">
                                            <Label :name="__('End Date')" id="request_end" :hasError="form.errors.end"/>
                                            <Datepicker v-model="form.end" :enableTimePicker="false" @update:modelValue="handleEndDate" :class="{'border-red-600':form.errors.end}"/>
                                            <ErrorMessage :name="form.errors.end"/>
                                        </div>
                                    </div>
                                    <template v-if="diffBetweenDays">
                                        <strong class="ml-1" :class="leaveTypeBalance.remaining_days < diffBetweenDays ? 'text-danger':'text-secondary'" v-if="leaveTypeBalance">{{ __('Number of Days') }}: {{ diffBetweenDays }}</strong>
                                    </template>
                                    <div class="grid grid-cols-1 gap-4">
                                        <div class="mb-4">
                                            <Label :name="__('Reason')" id="reason" :hasError="form.errors.reason"/>
                                            <BaseTextarea v-model="form.reason" placeholder="Reason" id="reason" :hasError="form.errors.reason"/>
                                        </div>
                                    </div>

                                    <div class="flex justify-between">
                                        <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-8 py-3 text-center mb-2  ">
                                            <svg class="inline w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clipRule="evenodd" /></svg>
                                            Close
                                        </button>
                                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-8 py-3 text-center mr-2 mb-2   ">
                                            <svg class="inline w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" points="216 72.005 104 184 48 128.005"/></svg>
                                            Send Request
                                        </button>
                                    </div>

                                    <!-- <button type="submit"
                                        class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 mb-2   focus:outline-none  mt-3 ">


                                        <Loading v-if="form.processing" :messageShow="false" />
                                        <span v-else>
                                            <svg class="inline w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" points="216 72.005 104 184 48 128.005"/></svg>
                                            {{ __('Save') }}
                                        </span>
                                    </button> -->

                                    <!-- :class="['text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 mb-2   focus:outline-none  mt-3 ', submitButtonDisabled ? 'cursor-not-allowed':'']" -->
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
                                   :class="{'border-red-600':form.errors.employee_id}">
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
                                   :class="{'border-red-600':form.errors.leave_type_id}">
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
                                   @update:modelValue="handleStartDate" :class="{'border-red-600':form.errors.start}"/>
                               <ErrorMessage :name="form.errors.start"/>
                           </div>
                           <div class="col-md-6">
                               <Label :name="__('End Date')" />
                               <Datepicker v-model="form.end" :enableTimePicker="false"
                                   @update:modelValue="handleEndDate" :class="{'border-red-600':form.errors.end}"/>
                               <ErrorMessage :name="form.errors.end"/>
                           </div>
                           <template v-if="diffBetweenDays">
                               <strong class="ml-1" :class="leaveTypeBalance.remaining_days < diffBetweenDays ? 'text-danger':'text-secondary'" v-if="leaveTypeBalance">{{ __('Number of Days') }}: {{ diffBetweenDays }}</strong>
                           </template>
                       </div>
                       <div class="mb-3 row">
                           <div class="col-lg-12">
                               <Label :name="__('Reason')" :required="false" />
                               <textarea class="form-control" v-model="form.reason" :class="{'border-red-600':form.errors.reason}" rows="5"></textarea>
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
        Datepicker
    },
    data() {
        return {
            form: this.$inertia.form({
                leave_type_id: "",
                start: "",
                end: "",
                reason: "",
                status: "pending",
            }),

            leaveTypeBalance: {},
            showLeaveTypeBalance: false,
            diffBetweenDays: 0,
            auth_user: this.$page.props.authenticatedUser,
            leave_types: [],


            leaveTypeLoading: false,
        };
    },
    methods: {
        createData() {
            this.form.post(route("employee.leave.request.store"),   {
                onSuccess: () => {
                    this.$emit('close-drawer')
                    this.form.reset();
                },
            },);
        },
        async loadData(){
            this.leaveTypeLoading = true;
            let response = await axios.get(route('fetch.company.leaveTypes', this.auth_user.employee.organization_id));

            this.leave_types = response.data

            setTimeout(() => {
                this.leaveTypeLoading = false;
            }, 500);

            console.log(response)
        },
        leaveTypeChange(event) {
            this.form.leave_type_id = event.target.value;
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
            const formatTime = this.formateDate(startDate, "YYYY-MM-DD");

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
            console.log(this.leaveTypeBalance.remaining_days, this.diffBetweenDays)
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
                            organization_id: this.auth_user.employee.organization_id,
                        },
                    }
                );

                console.log(response)
                this.diffBetweenDays = response.data.final_days_count;
            }
        },
    },
    mounted() {
        this.checkPagePermission("employee");
        this.loadData();
    },
    };
</script>

<style scoped>
  :deep(.popper) {
    background: #000000;
    padding: 20px;
    border-radius: 20px;
    color: #fff;
    width: 500px;
  }

  :deep(.popper #arrow::before) {
    background: #000000;
  }

  :deep(.popper:hover),
  :deep(.popper:hover > #arrow::before) {
    background: #000000;
  }
</style>

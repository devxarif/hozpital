<template>

    <Head :title="__('Company Holidays')" />

    <AppLayout title="Announcement">
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-3xl font-semibold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    {{ __('Leave Type List') }}
                </h2>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <button type="button" @click="showCreateDrawer()" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent  font-medium text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition sm:text-sm rounded-full"
                    >
                    <span class="mr-3">
                        <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                            stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                    </span>
                    Add Leave Type
                </button>
            </div>
        </div>
        <div class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md  ">
            <svg class="mb-2 w-10 h-10 text-gray-500 " aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 5a3 3 0 015-2.236A3 3 0 0114.83 6H16a2 2 0 110 4h-5V9a1 1 0 10-2 0v1H4a2 2 0 110-4h1.17C5.06 5.687 5 5.35 5 5zm4 1V5a1 1 0 10-1 1h1zm3 0a1 1 0 10-1-1v1h1z" clip-rule="evenodd"></path><path d="M9 11H3v5a2 2 0 002 2h4v-7zM11 18h4a2 2 0 002-2v-5h-6v7z"></path></svg>
            <a href="javascript:void(0)">
                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 ">Need a help in Claim?</h5>
            </a>
            <p class="mb-3 font-normal text-gray-500 ">Go to this step by step guideline process on how to certify for your weekly benefits:</p>
            <a href="javascript:void(0)" class="inline-flex items-center text-blue-600 hover:underline">
                See our guideline
                <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"></path><path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"></path></svg>
            </a>
        </div>

        <div class="bg-white shadow sm:rounded-lg mt-6 -mx-4 sm:-mx-0 overflow-hidden">
            <div class=" rounded-lg bg-white   shadow-xs overflow-hidden mb-5">
                <div class="p-4">
                    <form class="py-3 grid gap-4 lg:gap-6 xl:gap-6 md:flex xl:flex">
                        <div class="flex-grow-0 md:flex-grow lg:flex-grow xl:flex-grow"><input
                                class="px-3 py-1  leading-5 rounded-md focus:border-gray-200 border-gray-200  focus:ring focus:ring-blue-300    border h-12 text-sm focus:outline-none block w-full bg-gray-100 border-transparent focus:bg-white"
                                type="search" name="search" placeholder="Search by product name"><button
                                type="submit" class="absolute right-0 top-0 mt-5 mr-1"></button></div>
                        <div class="flex-grow-0 md:flex-grow lg:flex-grow xl:flex-grow"><select
                                class="px-2 py-1  rounded-md form-select focus:border-gray-200 border-gray-200  focus:shadow-none focus:ring focus:ring-blue-300    leading-5 border h-12 text-sm focus:outline-none block w-full bg-gray-100 border-transparent focus:bg-white">
                                <option value="All" hidden="">Category</option>
                                <option value="Fish &amp; Meat">Fish &amp; Meat</option>
                            </select></div>
                        <div class="flex-grow-0 md:flex-grow lg:flex-grow xl:flex-grow"><select
                                class="px-2 py-1  rounded-md form-select focus:border-gray-200 border-gray-200  focus:shadow-none focus:ring focus:ring-blue-300    leading-5 border h-12 text-sm focus:outline-none block w-full bg-gray-100 border-transparent focus:bg-white">
                                <option value="All" hidden="">Price</option>
                                <option value="Low">Low to High</option>
                                <option value="High">High to Low</option>
                            </select></div>
                        <div class="w-full md:w-56 lg:w-56 xl:w-56"><button
                                class="align-bottom inline-flex items-center justify-center cursor-pointer leading-5 transition-colors duration-150 font-medium focus:outline-none px-4 py-2 text-sm text-white bg-blue-500 border border-transparent active:bg-blue-600 hover:bg-blue-600 focus:ring focus:ring-purple-300 w-full rounded-full h-12"
                                type="button"><span class="mr-3">
                                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="text-white stroke-current" height="16" width="16"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                </span>Filter</button></div>
                    </form>
                </div>
            </div>
            <div class="px-4 py-6 sm:p-6">
                <div class="overflow-x-auto -mx-4 -my-6 sm:-m-6">
                    <div class="align-middle inline-block min-w-full">
                        <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <!-- {{ holidays }} -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>

    <!-- <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span>{{ __('Official Holiday List') }}</span>
                        <div>
                            <button @click="showCalendarModal = true" class="btn btn-info" type="button">
                               <i class="fa-regular fa-calendar"></i>
                                {{ __('Calendar View') }}
                            </button>
                            <button @click="showModal = true" class="btn btn-primary ml-1" type="button">
                                <i class="fa-solid fa-plus"></i>
                                {{ __('Create Holiday Request') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap col-12">
                        <template v-if="holidays && holidays.length">
                            <div v-for="holiday in holidays" :key="holiday.id"
                                class="col-12 col-md-6 holidayCont officalHCont d-flex justify-content-between align-items-center main-user-fields">
                                <div class="mt-4">
                                    <h6><strong>{{ holiday.title }}</strong>
                                        <span class="text-danger ml-1">
                                            {{ holiday.days }} {{ pluralize(holiday.days, 'Day') }}
                                        </span>
                                    </h6>
                                    <h6 class="d-flex align-items-center">
                                        <span class="m-widget4__sub">
                                            <span class="m-widget4__sm-text mr-1">
                                                <i class="fa-regular fa-calendar-days"></i>
                                                {{ holiday.format_start_date }}
                                            </span>

                                            <span class="m-widget4__sm-text ml-1">
                                                <i class="fa-regular fa-calendar-days"></i>
                                                {{ holiday.format_end_date }}
                                            </span>
                                        </span>
                                    </h6>
                                </div>
                            </div>
                        </template>
                        <div v-else class="col-12 text-center">
                            <h6 class="text-center">{{ __('No Data Found') }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Create or Edit Holiday Modal  -->
    <!-- <div v-if="showModal">
        <transition name="fade">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <span>{{ __('Holiday Request Create') }}</span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" @click="showModal = false">&times;</span>
                                </button>
                            </div>
                            <form @submit.prevent="saveData">
                                <div class="modal-body">
                                    <div class="mb-3 row">
                                        <div class="col-md-12">
                                            <Label :name="__('Title')" />
                                            <input v-model="form.title" type="text" class="form-control"
                                                :class="{'is-invalid':form.errors.title}" id="name">
                                            <ErrorMessage :name="form.errors.title" />
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
                                    </div>
                                    <div class="mb-3">
                                        <div class="col-md-12">
                                            <Label :name="__('Note')"/>
                                            <textarea v-model="form.note" rows="5" class="form-control"
                                                :class="{'is-invalid':form.errors.note}">
                                            </textarea>
                                            <ErrorMessage :name="form.errors.note"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        @click="showModal = false">{{ __('Close') }}</button>
                                    <button :disabled="form.processing" type="submit" class="btn btn-primary">
                                        <Loading v-if="form.processing"/>
                                        <span v-else>
                                            <i class="fa-solid fa-check mr-1"></i>
                                            {{ __('Save') }}
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div> -->

    <!-- Holiday Calendar Modal  -->
    <!-- <div v-if="showCalendarModal">
        <transition name="fade">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" v-click-outside="()=> showCalendarModal = false">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    {{ __('Official Holiday Calendar') }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" @click="showCalendarModal = false">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <FullCalendar :options="calendarOptions" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div> -->
</template>

<script>
// import FullCalendar from "@fullcalendar/vue3";
// import dayGridPlugin from "@fullcalendar/daygrid";
// import interactionPlugin from "@fullcalendar/interaction";
// import Datepicker from "@vuepic/vue-datepicker";
// import "@vuepic/vue-datepicker/dist/main.css";

// import FullCalendar from '@fullcalendar/vue3'
// import dayGridPlugin from '@fullcalendar/daygrid'
// import timeGridPlugin from '@fullcalendar/timegrid'
// import listPlugin from '@fullcalendar/list'
// import interactionPlugin from '@fullcalendar/interaction'
export default {
    props: {
        user: Object,
        organization: Object,
        holidays: Array,
    },
    components: {
        // FullCalendar,
    },
    data() {
        return {
            // calendarOptions: {
            //     plugins: [dayGridPlugin, interactionPlugin],
            //     initialView: "dayGridMonth",
            //     events: this.holidays,
            // },

            form: this.$inertia.form({
                organization_id: this.organization.id,
                title: "",
                start: "",
                end: "",
                color: "#ff0000",
                note: "",
            }),

            showModal: false,
            showCalendarModal: false,
            holiday_id: null,
        };
    },
    methods: {
        saveData() {
            this.form.post(route("employee.holiday.request.create"), {
                onSuccess: () => {
                    this.showModal = false;
                    this.form.reset();
                },
            });
        },
        handleStartDate(startDate) {
            const formatTime = this.formateDate(startDate, "YYYY-MM-DD");

            if(this.form.end){
                let dateCheck = this.checkDateValidity(formatTime, this.form.end, true);

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
                let dateCheck = this.checkDateValidity(this.form.start, formatTime, true);

                if(!dateCheck){
                    this.form.end = ''
                    return this.toastError("End date must be grater than start date")
                }
            }

            this.form.end = formatTime;
        }
    },
    mounted(){
        this.checkPagePermission('employee')
    }
};
</script>

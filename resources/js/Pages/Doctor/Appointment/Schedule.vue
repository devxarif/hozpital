<template>

    <Head :title="__('Appointment Schedule')" />
    <AppLayout>

        <!-- Header Part  -->
        <nav class="flex mb-2" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="#" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
                        <font-awesome-icon icon="fa-solid fa-home" class="w-4.5 h-4.5 mr-2.5" />
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <font-awesome-icon icon="fa-solid fa-chevron-right" class="w-3 h-3 text-gray-400" />
                        <a href="#"
                            class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">Appointment
                            Schedule</a>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="mb-4 flex justify-between">
            <h2 class="text-3xl font-semibold leading-7 text-gray-900 dark:text-gray-200 sm:text-3xl sm:truncate">
                {{ __('Appointment Schedule') }}
            </h2>
        </div>




        <div class="bg-white rounded-lg border border-gray-200 shadow-md  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 focus:outline-none mb-5">


            <div id="accordion-color" data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white">

                <!-- <div class="mx-auto max-w-7xl px-6 mt-5" v-for="(schedule,index) in schedules" :key="index">
                    <h2 id="accordion-color-heading-1">
                        <span type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400  dark:hover:bg-gray-800">
                            <span class="capitalize">{{ schedule.name }}</span>

                            <Switch  :class="[schedule.status ? 'bg-blue-600' : 'bg-gray-200', 'relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2']">
                                <span class="sr-only">Use setting</span>
                                <span :class="[schedule.status ? 'translate-x-5' : 'translate-x-0', 'pointer-events-none relative inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out']">
                                <span :class="[schedule.status ? 'opacity-0 ease-out duration-100' : 'opacity-100 ease-in duration-200', 'absolute inset-0 flex h-full w-full items-center justify-center transition-opacity']" aria-hidden="true">
                                    <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
                                    <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <span :class="[schedule.status ? 'opacity-100 ease-in duration-200' : 'opacity-0 ease-out duration-100', 'absolute inset-0 flex h-full w-full items-center justify-center transition-opacity']" aria-hidden="true">
                                    <svg class="h-3 w-3 text-blue-600" fill="currentColor" viewBox="0 0 12 12">
                                    <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z" />
                                    </svg>
                                </span>
                                </span>
                            </Switch>
                        </span>
                    </h2>
                    <div id="accordion-color-body-1" aria-labelledby="accordion-color-heading-1">
                        <div class="p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                            <div>
                                <div class="grid grid-cols-12 gap-2" v-for="(medicine, index) in form.medicines" :key="index">
                                    <div class="mb-4 col-span-4">
                                        <Datepicker v-model="time" @update:modelValue="handleStartDate" time-picker placeholder="Start Time" class="border border-gray-100 rounded-lg" />
                                    </div>
                                    <div class="mb-4 col-span-4">
                                        <Datepicker v-model="time" @update:modelValue="handleStartDate" time-picker placeholder="End Time" class="border border-gray-100 rounded-lg"/>
                                    </div>
                                    <div class="mb-4 col-span-3">
                                        <Multiselect id="doctor_patient" :close-on-select="true" :can-clear="true" :searchable="true" v-model="form.patient" :create-option="false" placeholder="Difference" :options="diff_times.map(item => ({
                                                value: item, label: item
                                            }))"  />
                                    </div>

                                    <div class="mb-4 col-span-1 flex items-center">
                                        <button v-if="index == 0" @click="addMore" type="button" class="inline-flex items-center rounded-full border border-transparent bg-blue-600 p-1 text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 ml-2">
                                            <font-awesome-icon icon="fa-solid fa-plus" class="h-5 w-5"/>
                                        </button>
                                        <button v-else  @click="removeField(index)" type="button" class="inline-flex items-center rounded-full border border-transparent bg-red-600 p-1 text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 ml-2">
                                            <font-awesome-icon icon="fa-solid fa-trash-can" class="h-5 w-5"/>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> -->
                <div class="mx-auto max-w-7xl px-6 mt-5">
                    <SingleSchedule v-for="(schedule,index) in schedules" :key="index" :schedule="schedule" :diff_times="diff_times"/>

                    <!-- <h2 id="accordion-color-heading-1">
                        <span type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400  dark:hover:bg-gray-800">
                            <span>Sunday</span>

                            <Switch @click="enabled = !enabled" v-model="enabled" :class="[enabled ? 'bg-blue-600' : 'bg-gray-200', 'relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2']">
                                <span class="sr-only">Use setting</span>
                                <span :class="[enabled ? 'translate-x-5' : 'translate-x-0', 'pointer-events-none relative inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out']">
                                <span :class="[enabled ? 'opacity-0 ease-out duration-100' : 'opacity-100 ease-in duration-200', 'absolute inset-0 flex h-full w-full items-center justify-center transition-opacity']" aria-hidden="true">
                                    <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
                                    <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <span :class="[enabled ? 'opacity-100 ease-in duration-200' : 'opacity-0 ease-out duration-100', 'absolute inset-0 flex h-full w-full items-center justify-center transition-opacity']" aria-hidden="true">
                                    <svg class="h-3 w-3 text-blue-600" fill="currentColor" viewBox="0 0 12 12">
                                    <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z" />
                                    </svg>
                                </span>
                                </span>
                            </Switch>
                        </span>
                    </h2>
                    <div id="accordion-color-body-1" aria-labelledby="accordion-color-heading-1">
                        <div class="p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                            <div>
                                <div class="grid grid-cols-12 gap-2" v-for="(medicine, index) in form.medicines" :key="index">
                                    <div class="mb-4 col-span-4">
                                        <Datepicker v-model="time" @update:modelValue="handleStartDate" time-picker placeholder="Start Time" class="border border-gray-100 rounded-lg" />
                                    </div>
                                    <div class="mb-4 col-span-4">
                                        <Datepicker v-model="time" @update:modelValue="handleStartDate" time-picker placeholder="End Time" class="border border-gray-100 rounded-lg"/>
                                    </div>
                                    <div class="mb-4 col-span-3">
                                        <Multiselect id="doctor_patient" :close-on-select="true" :can-clear="true" :searchable="true" v-model="form.patient" :create-option="false" placeholder="Difference" :options="diff_times.map(item => ({
                                                value: item, label: item
                                            }))"  />
                                    </div>

                                    <div class="mb-4 col-span-1 flex items-center">
                                        <button v-if="index == 0" @click="addMore" type="button" class="inline-flex items-center rounded-full border border-transparent bg-blue-600 p-1 text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 ml-2">
                                            <font-awesome-icon icon="fa-solid fa-plus" class="h-5 w-5"/>
                                        </button>
                                        <button v-else  @click="removeField(index)" type="button" class="inline-flex items-center rounded-full border border-transparent bg-red-600 p-1 text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 ml-2">
                                            <font-awesome-icon icon="fa-solid fa-trash-can" class="h-5 w-5"/>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div>



            </div>

        </div>



        <!-- Body Part  -->
        <!-- <CardSkeleton :show="loading" v-if="loading"/>

       <template v-else-if="!loading && departments && departments.data.length">
           <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
               <span v-for="department in departments.data" :key="department.id" class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                   <div class="flex flex-wrap justify-between items-start">
                       <div class="relative mb-5">
                           <span>
                               <img class="w-16 h-16 rounded object-cover" alt="Figma logo" :src="department.image">
                           </span>
                       </div>


                   </div>
               </span>
           </div>
       </template> -->
    </AppLayout>
</template>

<script>
    import CardSkeleton from "@/Shared/Skeleton/CardSkeleton.vue";
    import SingleSchedule from "./SingleSchedule.vue"
    import { Switch } from '@headlessui/vue'

    export default {
        components: {
            CardSkeleton,
            SingleSchedule,
        },
        props: {
            schedules: {
                type: Array,
                default: () => []
            },
            diff_times: {
                type: Array,
                default: () => []
            }
        },
        data() {
            return {
                loading: false,
                enabled: false,
                time: '',

                form: this.$inertia.form({
                    medicines: [{
                        medicine: '',
                        frequency: '',
                        days: '',
                    }],
                }),
            }
        },
        methods: {
            handleStartDate(time) {
                this.time = time.hours+':'+time.minutes
                console.log(time.hours, time.minutes)
                // const formatTime = this.formateDate(date, "YYYY-MM-DD");
                // this.form.start = formatTime;
            },
            addMore() {
                this.form.medicines.push({
                    medicine: '',
                    frequency: '',
                    days: '',
                });
            },
            removeField(index) {
                this.form.medicines.splice(index, 1);
            },
        },
        created() {

        },
    };
</script>

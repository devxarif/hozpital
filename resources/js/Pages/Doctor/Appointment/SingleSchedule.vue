<template>
    <div class="mb-3">
        <h2 id="accordion-color-heading-1">
            <span type="button"
                class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-300 rounded-t-xl focus:ring-4 focus:ring-blue-200     ">
                <span class="capitalize text-lg font-bold text-gray-900">{{ schedule.name }}</span>

                <span class="flex justify-center items-center">
                    <svg v-if="loading" class="inline mx-2 w-6 h-6 text-gray-200 animate-spinfill-blue-600  justify-center items-center" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <Switch @change="updateStatus" v-model="enabled"
                    :class="[enabled ? 'bg-blue-600' : 'bg-gray-200', 'relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2']">
                        <span
                            :class="[enabled ? 'translate-x-5' : 'translate-x-0', 'pointer-events-none relative inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out']">
                            <span
                                :class="[enabled ? 'opacity-0 ease-out duration-100' : 'opacity-100 ease-in duration-200', 'absolute inset-0 flex h-full w-full items-center justify-center transition-opacity']">
                                <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
                                    <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <span
                                :class="[enabled ? 'opacity-100 ease-in duration-200' : 'opacity-0 ease-out duration-100', 'absolute inset-0 flex h-full w-full items-center justify-center transition-opacity']">
                                <svg class="h-3 w-3 text-blue-600" fill="currentColor" viewBox="0 0 12 12">
                                    <path
                                        d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z" />
                                </svg>
                            </span>
                        </span>
                    </Switch>
                </span>
            </span>
        </h2>
        <div id="accordion-color-body-1" v-show="enabled">
            <div class="p-5 font-light border border-b-0 border-gray-300  ">
                <div>
                    <div class="grid grid-cols-12 gap-2" v-for="(slot, index) in form.slots" :key="index">
                        <div class="mb-4 col-span-4">
                            <Datepicker v-model="form.slots[index].start" time-picker placeholder="Start Time" class="border border-gray-100 rounded-lg" />
                        </div>
                        <div class="mb-4 col-span-4">
                            <Datepicker v-model="form.slots[index].end" time-picker placeholder="End Time" class="border border-gray-100 rounded-lg" />
                        </div>
                        <div class="mb-4 col-span-3">
                            <Multiselect id="doctor_patient" :close-on-select="true" :can-clear="true"
                                :searchable="true" v-model="form.slots[index].diff_time" :create-option="false"
                                placeholder="Difference" :options="diff_times.map(item => ({
                                    value: item, label: item
                                }))" />
                        </div>
                        <div class="mb-4 col-span-1 flex items-center">
                            <button v-if="index == 0" @click="addMore" type="button"
                                class="inline-flex items-center rounded-full border border-transparent bg-blue-600 p-1 text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 ml-2">
                                <font-awesome-icon icon="fa-solid fa-plus" class="h-5 w-5" />
                            </button>
                            <button v-else @click="removeField(index)" type="button"
                                class="inline-flex items-center rounded-full border border-transparent bg-red-600 p-1 text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-offset-2 ml-2">
                                <font-awesome-icon icon="fa-solid fa-trash-can" class="h-5 w-5" />
                            </button>
                        </div>
                    </div>
                    <div class="mx-auto text-center flex justify-center gap-2">
                        <button v-if="form.slots && form.slots.length" @click.prevent="saveData" :disabled="form.processing" type="button"
                            class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-md px-4 py-2   focus:outline-none  mt-3">
                            <Loading v-if="form.processing" :messageShow="false" />
                            <span v-else>
                                <svg class="inline w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" points="216 72.005 104 184 48 128.005"/></svg>
                                {{ __('Save') }}
                            </span>
                        </button>
                        <button v-else @click="addMore" type="button"
                                class="inline-flex items-center rounded-full border border-transparent bg-blue-600 px-4 py-2 text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 mx-2">
                                <font-awesome-icon icon="fa-solid fa-plus" class="h-5 w-5 pr-2" />
                                <p>Add Slot</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import CardSkeleton from "@/Shared/Skeleton/CardSkeleton.vue";
import { Switch } from '@headlessui/vue'

export default {
    components: {
        CardSkeleton,
        Switch,
    },
    props: {
        schedule: {
            type: Object,
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
            enabled: this.schedule.status || false,

            form: this.$inertia.form({
                slots: this.schedule.appointment_slots ? this.schedule.appointment_slots : [{
                    start: {hours: "09", minutes: "00"},
                    end: {hours: "17", minutes: "00"},
                    diff_time: 30,
                }]
            })
        }
    },
    methods: {
        handleStartTime(time) {
            this.form.slots[this.index].start = time.hours + ':' + time.minutes
        },
        handleEndTime(time) {
            console.log(time)
            this.form.slots[this.index].end = time.hours + ':' + time.minutes

            // this.time = time.hours + ':' + time.minutes
            // const formatTime = this.formatTime(date, "YYYY-MM-DD");
            // this.form.start = formatTime;
        },
        addMore() {
            this.form.slots.push({
                start: {hours: "09", minutes: "00"},
                end: {hours: "17", minutes: "00"},
                diff_time: 30,
            });
        },
        removeField(index) {
            this.form.slots.splice(index, 1);
        },
        saveData(){
            this.form.put(route("doctor.appointmentSchedule.update", this.schedule.id), {
                onSuccess: () => {
                    this.form.reset()
                    window.location.reload()
                }
            });
        },
        async updateStatus(){
            // if (!this.loading) {
            //     this.loading = true;

                let response = await axios.put(route('doctor.appointmentSchedule.status', this.schedule.id))
                console.log(response)
            //     this.enabled = !this.enabled
            //     this.loading = false;
            // }
        }
    },
    watch: {
        enabled: {
            async handler(val) {
                await axios.put(route('doctor.appointmentSchedule.status', this.schedule.id), {
                    status: val
                })
            },
            deep: true,
        },
    },
    created() {

    },
};
</script>

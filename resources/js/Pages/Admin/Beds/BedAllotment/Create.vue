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
                                    {{ __('Bed Assign Create') }}
                                </h2>
                                <div class="ml-3 flex h-7 items-center">
                                    <button type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500 focus:outline-none"
                                        @click="$emit('close-drawer')">
                                        <svg class="h-6 w-6"
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
                                    <Label :name="__('Available Beds')" id="bed_create" :hasError="form.errors.bed" className="flex mb-2 text-sm font-medium gap-1">
                                        <InfoIcon className="w-4 h-4" v-tooltip="'Floor - Bed Type - Bed Number - Charge'"/>
                                    </Label>
                                    <div class="flex items-center">
                                        <Multiselect id="bed_create" :close-on-select="true" :can-clear="true"
                                        :searchable="true" v-model="form.bed" :create-option="false"
                                        placeholder="Select Bed" :options="beds.map(item => ({
                                            value: item.id, label: item.id+' '+item?.floor?.name+' - '+item?.bed_type?.name+' - '+item.number+' - $'+item.charge
                                        }))"  />
                                    </div>
                                    <ErrorMessage :name="form.errors.bed"/>
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="mb-4">
                                        <Label name="Available Patient" id="patient_create" :hasError="form.errors.patient" :required="false"/>
                                        <Multiselect id="patient_create" :close-on-select="true" :can-clear="true"
                                            :searchable="true" v-model="form.patient" :create-option="false"
                                            placeholder="Select Patient" :options="patients.map(item => ({
                                                value: item.id, label: item?.user?.name
                                            }))" />
                                        <ErrorMessage :name="form.errors.patient"/>
                                    </div>
                                    <div class="mb-4">
                                        <Label name="Doctor" id="doctor_create" :hasError="form.errors.doctor" :required="false"/>
                                        <Multiselect id="doctor_create" :close-on-select="true" :can-clear="true"
                                            :searchable="true" v-model="form.doctor" :create-option="false"
                                            placeholder="Select Doctor" :options="doctors.map(item => ({
                                                value: item.id, label: item?.user?.name
                                            }))" />
                                        <ErrorMessage :name="form.errors.doctor"/>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="mb-4">
                                        <Label :name="__('Allotment Time')" id="start_date" :hasError="form.errors.allotment_time"/>
                                        <Datepicker v-model="form.allotment_time" :enableTimePicker="true" class="border-none bg-gray-50 border text-md rounded-lg block w-full p-1 border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500    "
                                            @update:modelValue="handleStartDate" :placeholder="__('Select Allotment Time')" :default-value="new Date()" />
                                        <ErrorMessage :name="form.errors.allotment_time"/>
                                    </div>
                                    <div class="mb-4">
                                        <Label :name="__('Discharge TIme')" id="end_date" :hasError="form.errors.discharge_time" :required="false"/>
                                        <Datepicker v-model="form.discharge_time" :enableTimePicker="true" class="border-none bg-gray-50 border text-md rounded-lg block w-full p-1    border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500    "
                                            @update:modelValue="handleEndDate" :placeholder="__('Select Discharge Time')" :default-value="new Date()" />
                                        <ErrorMessage :name="form.errors.discharge_time"/>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <Label :name="__('Description')" id="bed_allotment_description" :hasError="form.errors.description" :required="false"/>
                                    <BaseTextarea v-model="form.description" placeholder="Description" id="bed_allotment_description" :hasError="form.errors.description"/>
                                </div>
                                <button :disabled="form.processing"  type="submit"
                                    class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 mb-2   focus:outline-none  mt-3">
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
    import InfoIcon from "@/Shared/Icons/InfoIcon.vue"

    export default {
        components:{
            InfoIcon
        },
        props: {
            show: {
                type: Boolean,
                default: false
            },
            doctors: {
                type: Boolean,
                default: false
            },
            bed_id: {
                type: Number,
                default: ""
            },
        },
        data() {
            return {
                form: this.$inertia.form({
                    bed: this.bed_id || "",
                    patient: "",
                    doctor: "",
                    allotment_time: "",
                    discharge_time: "",
                    description: "",
                }),

                patients: [],
            };
        },
        watch: {
            'form.bed': {
                async handler(val) {
                    let response = await axios.get(route('bed.availablePatients', val))
                    console.log(response.data)
                    this.patients = response.data
                },
                deep: true,
            },
            bed_id: {
                async handler(val) {
                    this.form.bed = val
                },
                deep: true,
            },
        },
        methods: {
            saveData() {
                this.form.post(route("admin.bedAllotment.store"), {
                    onSuccess: () => {
                        this.form.reset(),
                        this.$emit('close-drawer')
                    },
                });
            },
            handleStartDate(startDate) {
                const formatTime = this.formateDate(startDate, "YYYY-MM-DD HH:mm");

                if(this.form.discharge_time){
                    let dateCheck = this.checkDateValidity(formatTime, this.form.discharge_time);

                    if(!dateCheck){
                        this.form.discharge_time = ''
                        return this.toastError("Allotment date date must be grater than discharge date")
                    }
                }

                this.form.allotment_time = formatTime;
            },
            handleEndDate(endDate) {
                const formatTime = this.formateDate(endDate, "YYYY-MM-DD HH:mm");

                if(this.form.allotment_time){
                    let dateCheck = this.checkDateValidity(this.form.allotment_time, formatTime);

                    if(!dateCheck){
                        this.form.discharge_time = ''
                        return this.toastError("Allotment date date must be grater than discharge date")
                    }
                }

                this.form.discharge_time = formatTime;
            },
            async loadBeds(){
                // Fetches bed beds
                let bed = await axios.get(route("fetch.beds"));
                this.beds = bed.data;
            },
        },
        mounted() {
            this.checkPagePermission('admin')
            this.loadBeds()
        }
    };
</script>

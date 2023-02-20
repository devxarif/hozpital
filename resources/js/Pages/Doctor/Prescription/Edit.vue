<template>
    <Transition name="slide-fade">
        <div class="fixed inset-0 overflow-hidden z-50" v-if="show">
            <div class="absolute inset-0 overflow-hidden transition-opacity">
                <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                <div class="pointer-events-none absolute right-0 inset-y-0 flex max-w-full ltr:pl-10 rtl:pr-10"
                    v-click-outside="()=> $emit('close-drawer')">
                    <div class="pointer-events-auto w-screen max-w-xs lg:max-w-6xl">
                        <div class="flex h-full flex-col bg-white shadow-xl">
                            <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
                                <div class="flex items-start justify-between rtl:flex-row-reverse mb-5">
                                    <h2 class="text-2xl tracking-wide font-bold text-gray-900">
                                        {{ __('Prescription Update') }}
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
                                    <div class="grid grid-cols-2 gap-2">
                                        <div class="mb-4">
                                            <Label :name="__('Patient')" id="prescription_name" :hasError="form.errors.name"/>
                                            <div class="flex items-center">
                                                <Multiselect id="doctor_patient" :close-on-select="true" :can-clear="true"
                                                :searchable="true" v-model="form.patient" :create-option="false"
                                                placeholder="Select Patient" :options="patients.map(item => ({
                                                    value: item.id, label: item.user.name
                                                }))"  />
                                                <button @click="showDepartmentModal()" type="button" class="inline-flex items-center rounded-full border border-transparent bg-blue-600 p-1 text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 ml-2">
                                                    <font-awesome-icon icon="fa-solid fa-plus" class="h-5 w-5"/>
                                                </button>
                                            </div>
                                            <ErrorMessage :name="form.errors.patient"/>
                                        </div>
                                        <div class="mb-4">
                                            <Label :name="__('Date')" id="income_date" :hasError="form.errors.date"/>
                                            <Datepicker v-model="form.date" :enableTimePicker="false" class="border-none bg-gray-50 border text-md rounded-lg block w-full p-1    border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500    "
                                                @update:modelValue="handleDate" :placeholder="__('Select Date')" :default-value="new Date()" />
                                            <ErrorMessage :name="form.errors.date"/>
                                        </div>
                                    </div>
                                    <div>
                                        <Label :name="__('Medicine')" id="prescription_note" :hasError="form.errors.case" :required="false"/>
                                        <div class="grid grid-cols-12 gap-4" v-for="(medicine, index) in form.medicines" :key="index">
                                            <div class="mb-4 col-span-4">
                                                <div class="rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                                                    <label :for="'name_'+index" class="block text-xs font-medium text-gray-900">Medicine Name</label>
                                                    <input v-model="form.medicines[index].medicine" type="text" :id="'name_'+index" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="mb-4 col-span-4">
                                                <div class="rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                                                    <label :for="'feed_'+index" class="block text-xs font-medium text-gray-900">Frequency / Feeding Rules</label>
                                                    <input v-model="form.medicines[index].frequency" type="text" :id="'feed_'+index" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="E.g: 1+1+1 (After Meal)">
                                                </div>
                                            </div>
                                            <div class="mb-4 col-span-3">
                                                <div class="rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                                                    <label :for="'days_'+index" class="block text-xs font-medium text-gray-900">Days</label>
                                                    <input v-model="form.medicines[index].days" type="text" :id="'days_'+index" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="E.g: 7 days">
                                                </div>
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
                                    <div class="grid grid-cols-2 gap-2">
                                        <div class="mb-4">
                                            <Label :name="__('Case')" id="prescription_note" :hasError="form.errors.case" :required="false"/>
                                            <QuillEditor theme="snow" v-model:content="form.case" contentType="html" class="h-40 rounded-md"/>
                                        </div>
                                        <div class="mb-4">
                                            <Label :name="__('Note')" id="prescription_note" :hasError="form.errors.note" :required="false"/>
                                            <QuillEditor theme="snow" v-model:content="form.note" contentType="html" class="h-40 rounded-md"/>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <Label :name="__('Advice')" id="prescription_note" :hasError="form.errors.advice" :required="false"/>
                                        <QuillEditor theme="snow" v-model:content="form.advice" contentType="html" class="h-60 rounded-md"/>
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
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';

export default {
    props: {
        prescription: {
            type: Object,
            required: true,
        },
        show: {
            type: Boolean,
            default: false
        }
    },
     components: {
        QuillEditor
    },
    data() {
        return {
            form: this.$inertia.form({
                patient: this.prescription.patient_id,
                date: this.prescription.date,
                case: this.prescription.case,
                note: this.prescription.note,
                advice: this.prescription.advice,
                medicines: this.prescription.medicines && this.prescription.medicines.length ? this.prescription.medicines : [{
                    medicine: '',
                    frequency: '',
                    days: '',
                }],
                _method: 'PUT'
            }),

            patients:[]
        };
    },
    watch: {
        prescription: {
            handler() {
                this.form.patient = this.prescription.patient_id
                this.form.date = this.prescription.date
                this.form.case = this.prescription.case
                this.form.note = this.prescription.note
                this.form.advice = this.prescription.advice
                this.form.medicines = this.prescription.medicines && this.prescription.medicines.length ? this.prescription.medicines :  [{
                    medicine: '',
                    frequency: '',
                    days: '',
                }]
            },
            deep: true,
        },
    },
    methods: {
        saveData() {
            this.form.post(route("doctor.prescription.update", this.prescription.id), {
                onSuccess: () => {
                    this.form.reset(),
                    this.$emit('close-drawer')
                },
            });
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
         handleDate(date) {
            const formatTime = this.formateDate(date, "YYYY-MM-DD");
            this.form.date = formatTime;
        },
        async loadPatients(){
            let response = await axios.get(route("fetch.patients"));

            this.patients = response.data;
        }
    },
    mounted(){
        this.checkPagePermission('doctor')
        this.loadPatients()
    }
};
</script>

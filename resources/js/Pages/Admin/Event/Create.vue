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
                                    {{ __('Event Create') }}
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
                                    <Label :name="__('Title')" id="event_title" :hasError="form.errors.title"/>
                                    <BaseInput v-model="form.title" placeholder="Title" id="event_title" :hasError="form.errors.title"/>
                                </div>
                                <div class="mb-4">
                                    <Label :name="__('Calendar Color')" id="leave_type_color" :hasError="form.errors.color"/>
                                    <div class="flex items-center">
                                        <BaseInput v-model="form.color" placeholder="Select Color" id="leave_type_color"/>
                                        <div class="relative ml-3">
                                            <button type="button" @click="isOpenColorPicker = !isOpenColorPicker"
                                                class="w-10 h-10 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow"
                                                :style="`background: ${form.color}; color: white`"
                                            >
                                                <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M15.584 10.001L13.998 8.417 5.903 16.512 5.374 18.626 7.488 18.097z"/><path d="M4.03,15.758l-1,4c-0.086,0.341,0.015,0.701,0.263,0.949C3.482,20.896,3.738,21,4,21c0.081,0,0.162-0.01,0.242-0.03l4-1 c0.176-0.044,0.337-0.135,0.465-0.263l8.292-8.292l1.294,1.292l1.414-1.414l-1.294-1.292L21,7.414 c0.378-0.378,0.586-0.88,0.586-1.414S21.378,4.964,21,4.586L19.414,3c-0.756-0.756-2.072-0.756-2.828,0l-2.589,2.589l-1.298-1.296 l-1.414,1.414l1.298,1.296l-8.29,8.29C4.165,15.421,4.074,15.582,4.03,15.758z M5.903,16.512l8.095-8.095l1.586,1.584 l-8.096,8.096l-2.114,0.529L5.903,16.512z"/></svg>
                                            </button>

                                            <div v-if="isOpenColorPicker" class="origin-top-right absolute right-16 mt-2 w-40 rounded-md shadow-lg" v-click-outside="()=> isOpenColorPicker = false">
                                                <div class="rounded-md bg-white shadow-xs px-4 py-3">
                                                    <div class="flex flex-wrap -mx-2">
                                                        <ColorPicker
                                                        theme="dark"
                                                        :color="form.color"
                                                        :sucker-hide="true"
                                                        @changeColor="changeColor"
                                                        @openSucker="openSucker"
                                                        :colors-default="swatches"
                                                    />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ErrorMessage :name="form.errors.color"/>
                                </div>

                                <div class="grid grid-cols-2 gap-2">
                                    <div class="mb-4">
                                        <Label :name="__('Start Date')" id="start_date" :hasError="form.errors.start"/>
                                        <Datepicker v-model="form.start" :enableTimePicker="false" class="border-none bg-gray-50 border text-md rounded-lg block w-full p-1 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            @update:modelValue="handleStartDate" :placeholder="__('Select Date')" :default-value="new Date()" />
                                        <ErrorMessage :name="form.errors.start"/>
                                    </div>
                                    <div class="mb-4">
                                        <Label :name="__('End Date')" id="end_date" :hasError="form.errors.end"/>
                                        <Datepicker v-model="form.end" :enableTimePicker="false" class="border-none bg-gray-50 border text-md rounded-lg block w-full p-1 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            @update:modelValue="handleEndDate" :placeholder="__('Select Date')" :default-value="new Date()" />
                                        <ErrorMessage :name="form.errors.end"/>
                                    </div>
                                </div>


                                <button :disabled="form.processing"  type="submit"
                                    class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 font-medium rounded-lg text-md px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-3">
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
    import { ColorPicker } from 'vue-color-kit'
    import 'vue-color-kit/dist/vue-color-kit.css'
    import Datepicker from "@vuepic/vue-datepicker";
    import "@vuepic/vue-datepicker/dist/main.css";
    import dayjs from "dayjs";

    export default {
        props: {
            show: {
                type: Boolean,
                default: false
            },
            calendar: {
                type: Object,
                default: {start: null, end: null}
            },
        },
        components: {
            ColorPicker,
            Datepicker

        },
        data() {
            return {
                form: this.$inertia.form({
                    title: '',
                    start: this.calendar.start,
                    end: this.calendar.end,
                    color: '#ff0000',
                }),

                isOpenColorPicker: false,
                isSucking: true,
                swatches: [
                    '#FF1900',
                    '#2E81FF',
                    '#FFE623',
                    '#00FF00',
                    '#f3722c',
                    '#1BC7B1',
                    '#FC3CAD',
                    '#577590',
                    '#00BEFF',
                    '#4a4e69',
                    '#c9ada7',
                    '#8E00A7',
                    '#000000',
                    '#FFFFFF',
                ]
            };
        },
        methods: {
            saveData() {
                this.form.post(route("admin.event.store"), {
                    onSuccess: () => {
                        this.form.reset(),
                        this.$emit('close-drawer')
                    },
                });
            },
            changeColor(color) {
                this.form.color = color.hex
            },
            handleStartDate(date) {
                const formatTime = dayjs(date).format("YYYY-MM-DD");
                this.form.start = formatTime;
            },
            handleEndDate(date) {
                const formatTime = dayjs(date).format("YYYY-MM-DD");
                this.form.end = formatTime;
            },
        },
        watch: {
            calendar: {
                handler() {
                    this.form.start = this.calendar.start ?? ''
                    this.form.end = this.calendar.end ?? ''
                },
                deep: true,
            },
        },
        mounted() {
            this.checkPagePermission('admin')
        }
    };

</script>

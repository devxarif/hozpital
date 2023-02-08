<template>
<Transition name="slide-fade">
    <div class="fixed inset-0 overflow-hidden z-50" v-if="show">
        <div class="absolute inset-0 overflow-hidden transition-opacity">
            <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div class="pointer-events-none absolute right-0 inset-y-0 flex max-w-full ltr:pl-10 rtl:pr-10"
                v-click-outside="()=> $emit('close-drawer')">
                <div class="pointer-events-auto w-screen max-w-xs lg:max-w-3xl">
                    <div class="flex h-full flex-col bg-white shadow-xl">
                        <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
                            <div class="flex items-start justify-between rtl:flex-row-reverse mb-5">
                                <h2 class="text-2xl tracking-wide font-bold text-gray-900">
                                    {{ __('Expense Create') }}
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
                                    <Label :name="__('Expense Category')" id="expense_category_name" :hasError="form.errors.expense_category"/>
                                    <div class="flex items-center">
                                        <Multiselect id="admin_expense_category" :close-on-select="true" :can-clear="true"
                                        :searchable="true" v-model="form.expense_category" :create-option="false"
                                        placeholder="Select Expense Category" :options="expense_categories.map(item => ({
                                            value: item.id, label: item.name
                                        }))"  />
                                        <button @click="showDepartmentModal()" type="button" class="inline-flex items-center rounded-full border border-transparent bg-blue-600 p-1 text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 ml-2">
                                            <font-awesome-icon icon="fa-solid fa-plus" class="h-5 w-5"/>
                                        </button>
                                    </div>
                                    <ErrorMessage :name="form.errors.expense_category"/>
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="mb-4">
                                        <Label :name="__('Title')" id="expense_name" :hasError="form.errors.title"/>
                                        <BaseInput v-model="form.title" placeholder="Title" id="expense_name" :hasError="form.errors.title"/>
                                    </div>
                                    <div class="mb-4">
                                        <Label :name="__('Invoice Number')" id="expense_invoice_number" :hasError="form.errors.invoice_number" :required="false"/>
                                        <BaseInput v-model="form.invoice_number" placeholder="Invoice Number" id="expense_invoice_number" :hasError="form.errors.invoice_number"/>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="mb-4">
                                        <Label :name="__('Amount')" id="expense_amount" :hasError="form.errors.amount"/>
                                        <BaseInput v-model="form.amount" placeholder="Amount" id="expense_amount" :hasError="form.errors.amount"/>
                                    </div>
                                    <div class="mb-4">
                                        <Label :name="__('Date')" id="expense_date" :hasError="form.errors.date" :required="false"/>
                                        <Datepicker v-model="form.date" :enableTimePicker="false" class="border-none bg-gray-50 border text-md rounded-lg block w-full p-1 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            @update:modelValue="handleDate" :placeholder="__('Select Date')" :default-value="new Date()" />
                                        <ErrorMessage :name="form.errors.date"/>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <Label :name="__('Description')" id="expense_description" :hasError="form.errors.description" :required="false"/>
                                    <BaseTextarea v-model="form.description" placeholder="Description" id="expense_description" :hasError="form.errors.description"/>
                                </div>
                                <div class="mb-4">
                                    <Label :name="__('Attachment')" id="attachment_image" :hasError="form.errors.attachment" :required="false"/>
                                    <BaseInput v-model="form.attachment" @change="onFileChange" className="text-sm p-0" placeholder="Name" id="expense_amount" :hasError="form.errors.attachment" type="file"/>
                                    <ErrorMessage :name="form.errors.attachment"/>
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
import Datepicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
import dayjs from "dayjs";

export default {
    props: {
        show: {
            type: Boolean,
            default: false
        }
    },
    components:{
        Datepicker
    },
    data() {
        return {
            form: this.$inertia.form({
                title: '',
                expense_category: "",
                invoice_number: '',
                amount: '',
                date: '',
                description: '',
                attachment: '',
            }),

            expense_categories: []
        };
    },
    methods: {
        onFileChange(e) {
            const file = e.target.files[0];
            this.form.attachment = file
        },
        saveData() {
            this.form.post(route("admin.expense.store"), {
                onSuccess: () => {
                    this.form.reset(),
                    this.$emit('close-drawer')
                },
            });
        },
        handleDate(date) {
            const formatTime = dayjs(date).format("YYYY-MM-DD");
            this.form.date = formatTime;
        },
        async loadExpenseCategories(){
            let response = await axios.get(route("fetch.expenseCategories"));
            this.expense_categories = response.data;
        }
    },
    mounted() {
        this.checkPagePermission('admin')
        this.loadExpenseCategories()
    }
};
</script>

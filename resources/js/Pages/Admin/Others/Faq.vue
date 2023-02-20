<template>
    <Head :title="__('Faq List')" />

    <AppLayout>
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-3xl font-semibold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Orders
                </h2>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <a class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent font-medium text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition sm:text-sm rounded-full"
                    href="https://demo.cartify.dev/admin/products/create">
                    <span class="mr-3">
                        <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                            stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                    </span>
                    Add Product
                </a>
            </div>
        </div>
        <!-- component -->
        <div class="bg-white shadow sm:rounded-lg mt-6 -mx-4 sm:-mx-0 overflow-hidden">
            <div class=" rounded-lg bg-white   shadow-xs overflow-hidden mb-5">
                <div class="p-4">
                    <form class="py-3 grid gap-4 lg:gap-6 xl:gap-6 md:flex xl:flex">
                        <div class="flex-grow-0 md:flex-grow lg:flex-grow xl:flex-grow"><input
                                class="px-3 py-1  leading-5 rounded-md focus:border-gray-200 border-gray-200  focus:ring focus:ring-blue-300    border h-12 text-sm focus:outline-none block w-full bg-gray-100 border-transparent focus:bg-white"
                                type="search" name="search" placeholder="Search by product name"><button type="submit"
                                class="absolute right-0 top-0 mt-5 mr-1"></button></div>
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
                                        stroke-linecap="round" stroke-linejoin="round" class="text-white stroke-current"
                                        height="16" width="16" xmlns="http://www.w3.org/2000/svg">
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
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-slate-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Order ID') }}
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Company') }}
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider tabular-nums">
                                            {{ __('Status') }}
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Actions') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <template>
                                        <tr class="relative hover:bg-slate-50">
                                            <td
                                                class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <span class="absolute inset-0"></span>
                                                <Link href="#"
                                                    v-tooltip="__('Order Details')">
                                                #<span>1</span>
                                                </Link>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <div class="flex items-center ">
                                                    <div class="mr-2">
                                                        <img class="w-6 h-6 rounded-full" src="#" />
                                                    </div>
                                                    <span class="text-gray-500">Data</span>
                                                </div>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                Data
                                            </td>
                                            <td
                                                class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-right text-gray-900 tabular-nums">
                                                <div class="flex items-center space-x-1">
                                                    <span class="block w-2 h-2 rounded-full bg-blue-500"></span>
                                                    <span>{{ __('Paid') }}</span>
                                                </div>
                                            </td>
                                            <td
                                                class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-right text-gray-900 tabular-nums">
                                                <div class="flex">
                                                    <div class="mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24">
                                                            <path
                                                                d="M22,7.24a1,1,0,0,0-.29-.71L17.47,2.29A1,1,0,0,0,16.76,2a1,1,0,0,0-.71.29L13.22,5.12h0L2.29,16.05a1,1,0,0,0-.29.71V21a1,1,0,0,0,1,1H7.24A1,1,0,0,0,8,21.71L18.87,10.78h0L21.71,8a1.19,1.19,0,0,0,.22-.33,1,1,0,0,0,0-.24.7.7,0,0,0,0-.14ZM6.83,20H4V17.17l9.93-9.93,2.83,2.83ZM18.17,8.66,15.34,5.83l1.42-1.41,2.82,2.82Z" />
                                                        </svg>
                                                    </div>
                                                    <div class=" mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24">
                                                            <path
                                                                d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </template>
                                    <!-- <tr v-else>
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-center text-base text-gray-600 font-medium"
                                            colspan="20">
                                            <NoDataFound />
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>

                            <!-- <Pagination :data="orders" v-if="orders && orders.data.length" /> -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">{{ __('Faq List') }}</h3>
                        <button @click="showModal = true" class="btn btn-primary">
                            <i class="fa-solid fa-plus"></i>
                            {{ __('Create') }}
                        </button>
                    </div>
                </div>
                <div class="card-body" v-if="faqs && faqs.length">
                    <SingleAccordian v-for="faq in faqs" :key="faq.id" :faq="faq" @edit="editData"/>
                </div>
                <div class="card-body text-center" v-else>
                    <h6>{{ __('No Data Found') }}</h6>
                </div>
            </div>
        </div>
   </div>

      <!-- Create or Edit Faq Modal  -->
    <div v-if="showModal">
        <transition name="fade">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <span v-if="!editMode">{{ __('Create Faq') }}</span>
                                    <span v-else>{{ __('Edit Faq') }}</span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" @click="showModal = false">&times;</span>
                                </button>
                            </div>
                            <form @submit.prevent="saveData">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <Label :name="__('Question')" />
                                            <input v-model="form.question" type="text" class="form-control"
                                                :class="{'is-invalid':form.errors.question}" id="name">
                                            <ErrorMessage :name="form.errors.question" />
                                        </div>
                                        <div class="col-md-12">
                                            <Label :name="__('Answer')" />
                                            <textarea rows="10" v-model="form.answer" class="form-control"
                                                :class="{'is-invalid':form.errors.answer}" ></textarea>
                                            <ErrorMessage :name="form.errors.answer" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        @click="showModal = false">{{ __('Close') }}</button>
                                    <button :disabled="form.processing" type="submit" class="btn btn-primary">
                                        <Loading v-if="form.processing" />
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
    </div>
</template>

<script>
import SingleAccordian from "../../../Shared/Admin/Faq/SingleAccordian.vue";

export default {
    components: {
        SingleAccordian,
    },
    props: {
        faqs: {
            type: Array,
        },
    },
    data() {
        return {
            form: this.$inertia.form({
                question: "",
                answer: "",
            }),

            editMode: false,
            showModal: false,
            faq_id: null,
        };
    },
    methods: {
        saveData() {
            if (!this.editMode) {
                this.form.post(
                    route("faqs.store"),
                    {
                        onSuccess: () => {
                            this.showModal = false;
                            this.form.reset();
                        },
                    },
                    {
                        preserveScroll: true,
                        preserveState: true,
                    }
                );
            } else {
                this.form.put(
                    route("faqs.update", this.faq_id),
                    {
                        onSuccess: () => {
                            this.showModal = false;
                            this.form.reset();
                        },
                    },
                    {
                        preserveScroll: false,
                        preserveState: true,
                    }
                );
            }
        },
        editData(faq) {
            this.form.clearErrors();
            this.editMode = true;
            this.form.reset();
            this.faq_id = faq.id;
            this.form.question = faq.question;
            this.form.answer = faq.answer;
            this.showModal = true;
        },
    },
};
</script>

<style scoped>
.modal-content {
    width: 700px !important;
}
</style>

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
                                        {{ __('Product Category Update') }}
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
                                    <div class="mb-2">
                                        <Label :name="__('Product Type')" id="productCategory_name" :hasError="form.errors.name"/>
                                        <div class="w-full bg-gray-200 p-2 rounded-lg">
                                            <div class="account-switcher relative flex after:absolute candidate after:transition-all duration-300 after:rounded-lg">
                                                <div class="w-full rounded-xl" :class="form.type == 'medicine' ? 'bg-gray-800 text-white shadow':'text-gray-800'">
                                                    <input type="radio" id="radio1" name="radio" class="hidden" checked>
                                                    <label for="radio1" class="relative z-50 rounded-md transition-all duration-300 w-full py-3 gap-2 flex items-center justify-center cursor-pointer" @click="changeProductType('medicine')">
                                                        <span>Medicine</span>
                                                    </label>
                                                </div>
                                                <div class="w-full rounded-xl" :class="form.type == 'others' ? 'bg-gray-800 text-white shadow':'text-gray-800'">
                                                    <input type="radio" id="radio2" name="radio" class="hidden">
                                                    <label for="radio2" class="relative z-50 rounded-md transition-all duration-300 flex w-full py-3 gap-2 items-center justify-center cursor-pointer" @click="changeProductType('others')">
                                                        <span>Others</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <Label :name="__('Name')" id="productCategory_name" :hasError="form.errors.name"/>
                                        <BaseInput v-model="form.name" placeholder="Name" id="productCategory_name" :hasError="form.errors.name"/>
                                    </div>
                                    <div class="grid grid-cols-2 gap-2">
                                        <div class="mb-4">
                                            <Label :name="__('Category')" id="product_category" :hasError="form.errors.product_category"/>
                                            <Multiselect id="product_category" :close-on-select="true" :can-clear="true"
                                            :searchable="true" v-model="form.product_category" :create-option="false"
                                            placeholder="Select Category" :options="product_categories.map(item => ({
                                                value: item.id, label: item.name
                                            }))"/>
                                            <ErrorMessage :name="form.errors.product_category"/>
                                        </div>
                                        <div class="mb-4">
                                            <Label :name="__('Manufacture')" id="manufacture" :hasError="form.errors.manufacture"/>
                                            <Multiselect id="manufacture" :close-on-select="true" :can-clear="true"
                                            :searchable="true" v-model="form.manufacture" :create-option="false"
                                            placeholder="Select Manufacture" :options="manufactures.map(item => ({
                                                value: item.id, label: item.name+' - '+item.email+' - '+item.phone
                                            }))"/>
                                            <ErrorMessage :name="form.errors.manufacture"/>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-2">
                                        <div class="mb-4">
                                            <Label :name="__('Buying Price')" id="buying_price" :hasError="form.errors.buying_price" :required="false"/>

                                            <div class="relative mt-1 rounded-md shadow-sm">
                                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                    <span class="text-gray-500 sm:text-sm">$</span>
                                                </div>

                                                <input v-model="form.buying_price" type="number" id="buying_price" class="block w-full border-gray-300 pl-7 pr-12 focus:border-blue-500 focus:ring-blue-500 sm:text-sm text-md p-2.5 bg-gray-50 border rounded-lg   " placeholder="0" min="0">

                                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                                    <span class="text-gray-500 sm:text-sm" id="price-currency">USD</span>
                                                </div>
                                            </div>
                                            <ErrorMessage :name="form.errors.buying_price"/>
                                        </div>
                                        <div class="mb-4">
                                            <Label :name="__('Selling Price')" id="selling_price" :hasError="form.errors.selling_price"/>
                                            <div class="relative mt-1 rounded-md shadow-sm">
                                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                    <span class="text-gray-500 sm:text-sm">$</span>
                                                </div>

                                                <input v-model="form.selling_price" type="number" id="selling_price" class="block w-full border-gray-300 pl-7 pr-12 focus:border-blue-500 focus:ring-blue-500 sm:text-sm  text-md p-2.5 bg-gray-50 border rounded-lg   " placeholder="0" min="0">

                                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                                    <span class="text-gray-500 sm:text-sm" id="price-currency">USD</span>
                                                </div>
                                            </div>
                                            <ErrorMessage :name="form.errors.selling_price"/>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-2">
                                        <div class="mb-4">
                                            <Label :name="__('Quantity')" id="quantity" :hasError="form.errors.quantity"/>
                                            <BaseInput v-model="form.quantity" placeholder="Quantity" id="quantity" :hasError="form.errors.quantity" type="number" />
                                        </div>
                                        <div class="mb-4">
                                            <Label :name="__('Expired Date')" id="expire_date" :hasError="form.errors.expire_date" :required="false"/>
                                            <Datepicker v-model="form.expire_date" :enableTimePicker="false" class="border-none bg-gray-50 border text-sm rounded-lg block w-full p-1    border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500    "
                                                @update:modelValue="handleExpiredDate" :placeholder="__('Select Date')" :default-value="new Date()" />
                                            <ErrorMessage :name="form.errors.expire_date"/>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <Label :name="__('Thumnail')" id="productCategory_image" :hasError="form.errors.image" :required="false"/>
                                        <div class="flex justify-center items-center w-full" v-if="!previewImage">
                                            <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-40 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer   hover:bg-gray-100   ">
                                                <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                                    <input id="dropzone-file" type="file" class="hidden" @change="onFileChange" accept="image/svg+xml, image/jpeg, image/jpg/ image/png">
                                                    <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                                    <p class="mb-4 text-sm text-gray-500 "><span class="font-semibold">Click to upload image</span></p>
                                                    <p class="text-xs text-gray-500 ">SVG, PNG, JPG or JPEG (MAX. 5MB)</p>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="relative" v-if="previewImage">
                                            <img :src="previewImage" class="h-60 w-full rounded-lg object-cover" alt="image description">
                                            <button @click="removeImage" type="button" class="absolute top-2 right-2 text-white bg-red-700 focus:ring-4 focus:ring-red-300 rounded-lg px-5 py-2.5  focus:outline-none ">
                                                <font-awesome-icon icon="fa-solid fa-trash-can" class=" h-5 w-5"/>
                                            </button>
                                        </div>
                                        <ErrorMessage :name="form.errors.image"/>
                                    </div>
                                    <div class="mb-4">
                                        <Label :name="__('Short Description')" id="short_description" :hasError="form.errors.short_description" :required="false"/>
                                        <BaseTextarea v-model="form.short_description" placeholder="Short Description" id="short_description" :hasError="form.errors.short_description"/>
                                    </div>
                                    <div class="mb-4">
                                        <Label :name="__('Description')" id="productCategory_description" :hasError="form.errors.description" :required="false"/>
                                        <QuillEditor theme="snow" v-model:content="form.description" contentType="html" class="h-60 rounded-md"/>
                                    </div>
                                    <button :disabled="form.processing"  type="submit"
                                        class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 mb-4   focus:outline-none  mt-3">
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
        product: {
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
                type: this.product.type,
                product_category: this.product.product_category_id,
                manufacture: this.product.manufacture_id,
                buying_price: this.product.buying_price,
                selling_price: this.product.selling_price,
                quantity: this.product.quantity,
                expire_date: this.product.expire_date,
                name: this.product.name,
                image: '',
                description: this.product.description,
                short_description: this.product.short_description,
                _method: 'PUT'
            }),

            previewImage: this.product.image,
            product_categories: [],
            manufactures: [],
        };
    },
    watch: {
        product: {
            handler() {
                this.previewImage = this.product.image
                this.form.type = this.product.type
                this.form.product_category = this.product.product_category_id
                this.form.manufacture = this.product.manufacture_id
                this.form.buying_price = this.product.buying_price
                this.form.selling_price = this.product.selling_price
                this.form.quantity = this.product.quantity
                this.form.expire_date = this.product.expire_date
                this.form.name = this.product.name
                this.form.description = this.product.description
                this.form.short_description = this.product.short_description
            },
            deep: true,
        }
    },
    methods: {
        onFileChange(e) {
            const file = e.target.files[0];
            this.form.image = file
            this.previewImage = URL.createObjectURL(file);
        },
        removeImage(){
            this.previewImage = null;
            this.form.image = null
        },
        saveData() {
            this.form.post(route("pharmacist.product.update", this.product.id), {
                onSuccess: () => {
                    this.form.reset(),
                    this.removeImage()
                    this.$emit('close-drawer')
                },
            });
        },
        handleExpiredDate(date) {
            const formatTime = this.formateDate(date, "YYYY-MM-DD");
            this.form.expire_date = formatTime;
        },
        changeProductType(type) {
            if (type != this.form.type) {
                this.form.type = type;
            }
        },
        async loadProductCategories(){
            let response = await axios.get(route("fetch.productCategories"))
            this.product_categories = response.data
        },
        async loadManufactures(){
            let response = await axios.get(route("fetch.manufactures"))
            this.manufactures = response.data
        },
    },
    watch: {
        'form.buying_price': {
            handler(val) {
                if (val < 0) {
                    this.form.buying_price = 0
                }
            },
            deep: true,
        },
        'form.selling_price': {
            handler(val) {
                if (val < 0) {
                    this.form.selling_price = 0
                }
            },
            deep: true,
        },
        'form.quantity': {
            handler(val) {
                if (val < 0) {
                    this.form.quantity = 0
                }
            },
            deep: true,
        },
    },
    mounted(){
        this.checkPagePermission('pharmacist')
        this.loadProductCategories()
        this.loadManufactures()
    }
};
</script>

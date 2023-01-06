<template>
<div v-if="show" class="bg-gray-500 bg-opacity-80 transition-opacity fixed inset-0 overflow-y-auto overflow-x-hidden top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center flex w-full p-4">
    <div class="relative w-full h-full max-w-xl md:h-auto" >
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button @click="$emit('close-modal')" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Department Create</h3>
                <form class="mb-4" @submit.prevent="createData">
                    <div class="mb-4">
                        <Label :name="__('Name')" id="department_name" :hasError="form.errors.name"/>
                        <BaseInput v-model="form.name" placeholder="Name" id="department_name" :hasError="form.errors.name"/>
                    </div>
                    <div class="mb-4">
                        <Label :name="__('Description')" id="department_description" :hasError="form.errors.description" :required="false"/>
                        <BaseTextarea v-model="form.description" placeholder="Description" id="department_description" :hasError="form.errors.description"/>
                    </div>
                    <div class="mb-4">
                        <Label :name="__('Image')" id="departmentt_image" :hasError="form.errors.image" :required="false"/>
                        <div class="flex justify-center items-center w-full" v-if="!previewDepartmentImage">
                            <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-60 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                    <input id="dropzone-file" type="file" class="hidden" @change="onFileChange" accept="image/svg+xml, image/jpeg, image/jpg/ image/png">
                                    <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload image</span></p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or JPEG (MAX. 5MB)</p>
                                </div>
                            </label>
                        </div>
                        <div class="relative" v-if="previewDepartmentImage">
                            <img :src="previewDepartmentImage" class="h-60 w-full rounded-lg object-cover" alt="image description">
                            <button @click="removeImage" type="button" class="absolute top-2 right-2 text-white bg-red-700 focus:ring-4 focus:ring-red-300 rounded-lg px-5 py-2.5 dark:bg-red-600 focus:outline-none dark:focus:ring-red-800">
                                <font-awesome-icon icon="fa-solid fa-trash-can" class=" h-5 w-5"/>
                            </button>
                        </div>
                        <ErrorMessage :name="form.errors.image"/>
                    </div>
                    <button :disabled="form.processing"  type="submit"
                        class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-3">
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
</template>

<script>
    export default {
        props: {
            show: {
                type: Boolean,
                default: false
            }
        },
        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    description: "",
                    image: '',
                }),

                previewDepartmentImage: null,
            };
        },
        methods: {
            onFileChange(e) {
                const file = e.target.files[0];
                this.form.image = file
                this.previewDepartmentImage = URL.createObjectURL(file);
            },
            removeImage(){
                this.previewDepartmentImage = null;
                this.form.image = null
            },
            createData() {
                this.form.post(route("admin.department.store"), {
                    onSuccess: () => {
                        this.form.reset(),
                        this.removeImage()
                        this.$emit('close-modal', true)
                    },
                });
            }
        },
        mounted() {
            this.checkPagePermission('admin')
        }
    };
</script>

<template>
<div v-if="show" class="bg-gray-500 bg-opacity-80 transition-opacity fixed inset-0 overflow-y-auto overflow-x-hidden top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center flex w-full p-4">
    <div class="relative w-full h-full max-w-2xl md:h-auto" v-click-outside="()=> $emit('close-modal')">
        <div class="relative bg-white rounded-lg shadow ">
            <button @click="$emit('close-modal')" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  " data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 ">Pharmacist Bulk Import</h3>
                <form class="mb-4" @submit.prevent="saveData">
                    <div class="rounded-md bg-yellow-50 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z" clip-rule="evenodd" />
                            </svg>
                            </div>
                            <div class="ml-3 flex-1 md:flex md:justify-between">
                                <p class="text-sm text-yellow-700">
                                    Before importing, please download the example file and match the fields structure. If any field data is missing, the system will generate it
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="my-4">
                        <Label name="Example File" id="department_name" :hasError="form.errors.name"/>
                        <a href="/assets/dummy/staff_example.xlsx" class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 mb-2   focus:outline-none  mt-3">
                            <span>
                                <font-awesome-icon icon="fa-solid fa-download" class="h-4 w-4 mr-2"/>
                                {{ __('Download Example File') }}
                            </span>
                        </a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                    </div>

                    <div class="my-10">
                        <Label name="Choose File (.csv, .xlsx, .xls)" :hasError="form.errors.file" :required="false"/>
                        <div class="flex justify-center items-center w-full" v-if="!previewDemoFile">
                            <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-60 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer   hover:bg-gray-100   ">
                                <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                    <input id="dropzone-file" type="file" class="hidden" @change="onFileChange" accept=".pdf,.csv,.xlsx,.xls">
                                    <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                    <p class="mb-2 text-sm text-gray-500 "><span class="font-semibold">Click to upload file</span></p>
                                    <p class="text-xs text-gray-500 ">.csv, .xlsx, .xls</p>
                                </div>
                            </label>
                        </div>
                        <div class="relative" v-if="previewDemoFile">
                            <div class="text-center">
                                <img :src="previewDemoFile" class="mx-auto h-40 w-40 rounded-lg object-cover" alt="file">
                                <p>{{ fileName }}</p>
                                <p>{{ fileSize }}</p>
                            </div>
                            <button @click="removeFile" type="button" class="absolute top-2 right-2 text-white bg-red-700 focus:ring-4 focus:ring-red-300 rounded-lg px-5 py-2.5  focus:outline-none ">
                                <font-awesome-icon icon="fa-solid fa-trash-can" class=" h-5 w-5"/>
                            </button>
                        </div>
                        <ErrorMessage :name="form.errors.file"/>
                    </div>
                    <button :disabled="form.processing"  type="submit"
                        class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 mb-2   focus:outline-none  mt-3">
                        <Loading v-if="form.processing" :messageShow="false" />
                        <span v-else>
                            <svg class="inline w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" points="216 72.005 104 184 48 128.005"/></svg>
                            {{ __('Import') }}
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import { library } from '@fortawesome/fontawesome-svg-core'
import { faDownload } from '@fortawesome/free-solid-svg-icons'
library.add(faDownload)

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
                file: '',
            }),

            fileName: '',
            fileSize: '',
            previewDemoFile: '',
        };
    },
    methods: {
        onFileChange(e) {
            let file = e.target.files[0];
            let fileSize = file.size/1024/1024;

            this.fileName = file.name;
            this.fileSize = fileSize.toFixed(3)+' MB';

            this.form.file = file
            this.previewDemoFile = '/assets/img/sample_file.png';
        },
        removeFile(){
            this.previewDemoFile = null;
            this.form.file = null
        },
        saveData() {
            this.form.post(route("admin.pharmacist.import"), {
                onSuccess: () => {
                    this.form.reset(),
                    this.removeFile()
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

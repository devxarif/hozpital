<template>
    <SettingLayout title="SEO">
        <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-1">
            <div class="bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div class="space-y-6 sm:space-y-5">
                        <div class="mb-5">
                            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">SEO</h2>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed
                                publicly so be careful what you share.</p>
                        </div>
                        <div class="space-y-6 sm:space-y-5">
                           <div class=" sm:border-t sm:border-gray-200">
                                <BaseTable :items="seo_data" :pagination="false" className="mt-5">
                                    <template v-slot:head>
                                        <tr class="divide-x divide-gray-200">
                                            <th width="15%" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">{{ __('Page Image') }}</th>
                                            <th width="25%" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">{{ __('Page Name') }}</th>
                                            <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 break-words">{{ __('SEO Content') }}</th>
                                            <th width="80px" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-6">{{ __('Action') }}</th>
                                        </tr>
                                    </template>
                                    <template v-slot:body>
                                        <tr v-for="seo in seo_data" :key="seo.id" class="divide-x divide-gray-200">
                                            <td class="py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                                <img class="h-28 w-28 rounded-md object-cover" :src="seo.image" alt="">
                                            </td>
                                            <td class="py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                                <div class="font-medium text-gray-900">{{ seo.page_name }}</div>
                                            </td>
                                            <td class="p-4 text-sm text-gray-500 break-all">
                                                <div class="mb-2">
                                                    <b>{{ __('Meta Title') }}: </b> {{ seo.title }}
                                                </div>
                                                <div class="mb-2">
                                                    <b>{{ __('Meta Description') }}: </b> {{ seo.description }}
                                                </div>
                                                <div>
                                                    <b>{{ __('Meta Keywords') }}: </b> {{ seo.keywords }}
                                                </div>
                                            </td>
                                            <td class="py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-6 text-center">
                                                <button type="button" @click="editContent(seo)" class="focus: outline-none">
                                                    <font-awesome-icon icon="fa-solid fa-pen-to-square" class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500"/>
                                                </button>
                                            </td>
                                        </tr>
                                    </template>
                                </BaseTable>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- <div class="row justify-content-center">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('SEO') }}</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table id="customers-table" class="table"
                            role="grid">
                            <thead>
                                <tr role="row">
                                    <th width="25%">{{ __('Page Name') }}</th>
                                    <th>{{ __('SEO Content') }}</th>
                                    <th width="5%">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row" class="odd" v-for="seo in seo_data" :key="seo.id">
                                    <td class="sorting_1">
                                        {{ seo.page_name }}
                                    </td>
                                    <td>
                                        <div class="mb-2">
                                            <b>{{ __('Meta Title') }}: </b> {{ seo.title }}
                                        </div>
                                        <div class="mb-2">
                                            <b>{{ __('Meta Description') }}: </b> {{ seo.description }}
                                        </div>
                                        <div>
                                            <b>{{ __('Meta Keywords') }}: </b> {{ seo.keywords }}
                                        </div>
                                    </td>
                                    <td>
                                        <button @click="editContent(seo)" type="button" v-tooltip="__('Edit')" class="btn btn-sm  pl-0">
                                            <EditIcon/>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> -->
            <!-- Details Holiday Modal  -->
        <!-- <div v-if="showModal">
            <transition name="fade">
                <div class="modal-mask">
                    <div class="modal-wrapper">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                    {{ form.page_name }} - {{ __('SEO') }}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" @click="showModal = false">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form @submit.prevent="saveData">
                                        <div class="mb-3 row">
                                            <div class="form-group col-md-12">
                                                <Label name="__('Title')" for="title"/>
                                                <input v-model="form.title" type="text" class="form-control" :class="{'is-invalid':form.errors.title}" id="title" :placeholder="__('Name')">
                                                <ErrorMessage :name="form.errors.title"/>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <Label name="__('Keywords')" for="email"/>
                                                <input v-model="form.keywords" type="text" class="form-control" :class="{'is-invalid':form.errors.keywords}" id="title" :placeholder="__('Keywords')">
                                                <ErrorMessage :name="form.errors.keywords"/>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <Label name="__('Description')" for="email"/>
                                                <textarea v-model="form.description" class="form-control" rows="5" :class="{'is-invalid':form.errors.description}" :placeholder="__('Description')"></textarea>
                                                <ErrorMessage :name="form.errors.description"/>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            <Loading v-if="form.processing" message="Saving..."/>
                                            <span v-else>
                                                <i class="fa-solid fa-check mr-1"></i>
                                                {{ __('Save') }}
                                            </span>
                                        </button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        @click="showModal = false">{{ __('Close') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </div> -->

        <EditSeoContent :show="showEditDrawer" @close-drawer="showEditDrawer = false" :seo="editSeoContent"/>
    </SettingLayout>
</template>

<script>
import SettingLayout from "@/Shared/Layout/Setting.vue";
import EditSeoContent from "./Edit.vue";

export default {
    components: {
        SettingLayout,
        EditSeoContent
    },
    props: {
        seo_data: Array
    },
    data() {
        return {
            showModal: false,
            form: this.$inertia.form({
                id: '',
                page_name: '',
                title: '',
                description: '',
                keywords: '',
            }),

            showEditDrawer: false,
            editSeoContent: ''
        }
    },
    methods: {
        editContent(seo) {
            this.editSeoContent = seo
            this.showEditDrawer = true
        },
        saveData(){
            this.form.put(route('settings.seo.update', this.form.id), {
                onSuccess: () => {
                    this.showModal = false;
                }
            });
        }
    }
};
</script>

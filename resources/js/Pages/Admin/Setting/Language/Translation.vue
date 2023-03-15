<template>
    <SettingLayout title="Languages" :sidebar="false">
        <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-1">
            <div class="bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div class="space-y-6 sm:space-y-5">
                        <div class="flex justify-between">
                            <div>
                                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{ lang.name }} Language Translation</h2>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed publicly so be careful what you share.</p>
                            </div>
                            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                <Link  :href="route('admin.settings.languages.index')" class="relative inline-flex items-center rounded-md border border-gray-300 bg-gray-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-gray-700 focus:z-10 focus:outline-none focus:ring-1">
                                    <font-awesome-icon icon="fa-solid fa-arrow-left" class="h-4 w-4 mr-2"/>
                                    {{ __('Back to language list') }}
                                </Link>
                            </div>
                        </div>

                        <!-- <Label :name="__('Name')" id="leave_type_name"/> -->
                        <div class="sm:border-t sm:border-gray-200 sm:pt-5">
                            <div class="grid gap-6 md:grid-cols-12 xl:grid-cols-12">
                                <div class="mb-2 col-span-6">
                                    <h2 class="text-xl font-bold">English Text</h2>
                                </div>
                                <div class="mb-2 col-span-6">
                                    <h2 class="text-xl font-bold">Translation Text</h2>
                                </div>
                            </div>
                            <div class="grid gap-6 md:grid-cols-12 xl:grid-cols-12" v-for="(translation, key) in translations" :key="key">
                                <div class="mb-2 col-span-6">
                                    <BaseInput placeholder="Name" id="leave_type_name" :modelValue="key" :disabled="true"/>
                                </div>
                                <div class="mb-2 col-span-6">
                                    <BaseInput placeholder="Name" id="leave_type_name" v-model="translationsData[key]"/>
                                </div>
                            </div>
                            <!-- <tr v-for="(translation, key) in translations" :key="key">
                            <td class="text-capitalize">{{ replace(key,'_',' ') }}</td>
                                <td>
                                    <span class="d-flex">
                                        <input type="text" class="form-control" style="width:100%" v-model="translationsData[key]">
                                        <button type="button" @click="translateIt(key)" class="btn btn-sm ml-1 bg-info">
                                            <span >{{ __('Translate') }}</span>
                                        </button>
                                    </span>
                                </td>
                            </tr> -->


                            <!-- <template v-for="language in languages" :key="language.id">
                                <span class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100">
                                    <div class="flex justify-between">
                                        <div>
                                            <img class="h-10 w-10 rounded-lg" :src="`/assets/img/flags/${language.country_code.toLowerCase()}.svg`" alt="">
                                            <h2 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">{{ language.name }} ({{ language.language_code }})</h2>
                                        </div>
                                        <div class="text-sm">
                                            <label class="relative inline-flex items-center mb-4 cursor-pointer">
                                                <input @change="changeStatus" :value="language.id" :checked="language.status" type="checkbox" class="sr-only peer">
                                                <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-green-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-green-600"></div>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="flex gap-3 mt-4">
                                        <a v-tooltip="'Edit'" href="javascript:void(0)" @click.prevent="editData(language)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center py-2']">
                                            <font-awesome-icon icon="fa-solid fa-pen-to-square" class=" h-5 w-5 text-blue-500 group-hover:text-blue-500" />
                                        </a>
                                        <a v-tooltip="'Delete'" href="javascript:void(0)" @click.prevent="deleteData(language.id)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center py-2']">
                                            <font-awesome-icon icon="fa-solid fa-trash-can" class=" h-5 w-5 text-red-500 group-hover:text-red-500" />
                                        </a>
                                        <Link v-tooltip="'Translate Language'" :href="route('admin.settings.language.translation', language.language_code)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center py-2']">
                                            <font-awesome-icon icon="fa-solid fa-language" class=" h-5 w-5 text-sky-500 group-hover:text-sky-500" />
                                        </Link>
                                    </div>
                                </span>
                            </template> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <Head :title="__('Translate Language')"/>

        <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">{{ __('Translate Language') }} <span class="badge badge-pill bg-primary">{{ translations.length }}</span></h3>
                                <Link :href="route('admin.settings.languages.index')" class="btn btn-primary">
                                <i class="fa-solid fa-arrow-left"></i>
                                    {{ __('Back') }}
                                </Link>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <form @submit.prevent="saveData" autocomplete="off" class="pb-5">
                                <table class="table table-striped table-bordered mt-0 pt-0" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="48%">{{ __('English Text') }}</th>
                                            <th width="48%">
                                                <span class="d-flex justify-content-between">
                                                    <span>{{ __('Translation Text') }}</span>
                                                </span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(translation, key) in translations" :key="key">
                                            <td class="text-capitalize">{{ replace(key,'_',' ') }}</td>
                                            <td>
                                                <span class="d-flex">
                                                    <input type="text" class="form-control" style="width:100%" v-model="translationsData[key]">
                                                    <button type="button" @click="translateIt(key)" class="btn btn-sm ml-1 bg-info">
                                                        <span >{{ __('Translate') }}</span>
                                                    </button>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button :disabled="loading" type="submit" class="lang-btn btn btn-primary">
                                    <Loading v-if="loading" message="Saving..."/>
                                <span v-else>
                                    <i class="fa-solid fa-check"></i>
                                    {{ __('Save') }}
                                </span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </SettingLayout>

</template>


<script>
import SettingLayout from "@/Shared/Layout/Setting.vue";
import { library } from '@fortawesome/fontawesome-svg-core'
import { faArrowLeft} from '@fortawesome/free-solid-svg-icons'
library.add(faArrowLeft)

export default {
    components: {
        SettingLayout,

    },
    props: {
        lang: Array,
        translations: Array,
    },
    data() {
        return {
            translationsData: this.translations,
            loading: false,
        };
    },
    methods: {
        saveData() {
            this.loading = true;
            this.$inertia.put(
                route("languages.translation.update", this.lang.id),
                {
                    translations: this.translationsData,
                },
                {
                    onSuccess: () => {
                        this.loading = false;
                    },
                }
            );
        },
        replace(st, rep, repWith) {
            const result = st.split(rep).join(repWith);
            return result;
        },
        async translateIt(key) {
            try {
                let response = await axios.get(route("languages.translate"), {
                    params: {
                        key: key,
                        code: this.lang.code,
                    },
                });

                this.translationsData[key] = response.data;
            } catch (error) {
                //
            }
        },
    },
    mounted() {
        this.checkPagePermission("admin");
    },
};
</script>

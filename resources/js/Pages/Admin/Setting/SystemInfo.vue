<template>
    <SettingLayout title="General">
        <!-- Application Information -->
        <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-1 mb-5">
            <div class="bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div class="space-y-6 sm:space-y-5">
                        <div>
                            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Application Information</h2>
                        </div>

                        <div class="space-y-6 sm:space-y-5 sm:border-t sm:border-gray-200">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        <tr>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Current Version</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">
                                                    {{ data.app_version }}
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Server Information -->
        <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-1 mb-5">
            <div class="bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div class="space-y-6 sm:space-y-5">
                        <div>
                            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Server Information</h2>
                        </div>

                        <div class="space-y-6 sm:space-y-5 sm:border-t sm:border-gray-200">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead>
                                        <tr>
                                            <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Name</th>
                                            <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Current Version</th>
                                            <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Required Version	</th>
                                            <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        <tr>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">PHP version</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ data.current_php_version }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ data.minimum_php_version }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <font-awesome-icon v-if="data.matched_php_requirement" icon="fa-solid fa-check-circle" class="h-6 w-6 text-green-500"/>
                                                <font-awesome-icon v-else icon="fa-solid fa-xmark-circle" class="h-6 w-6 text-red-500"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Laravel version</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ data.current_laravel_version }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                -
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <font-awesome-icon v-if="data.matched_php_requirement" icon="fa-solid fa-check-circle" class="h-6 w-6 text-green-500"/>
                                                <font-awesome-icon v-else icon="fa-solid fa-xmark-circle" class="h-6 w-6 text-red-500"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">MYSQL</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ data.current_mysql_version }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ data.minimum_mysql_version }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <font-awesome-icon v-if="data.matched_mysql_requirement" icon="fa-solid fa-check-circle" class="h-6 w-6 text-green-500"/>
                                                <font-awesome-icon v-else icon="fa-solid fa-xmark-circle" class="h-6 w-6 text-red-500"/>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PHP.ini Configuration -->
        <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-1 mb-5">
            <div class="bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div class="space-y-6 sm:space-y-5">
                        <div>
                            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">php.ini Configuration</h2>
                        </div>

                        <div class="space-y-6 sm:space-y-5 sm:border-t sm:border-gray-200">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead>
                                        <tr>
                                            <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Config Name</th>
                                            <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Current</th>
                                            <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Recommended</th>
                                            <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        <tr>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">file_uploads</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ data.php_ini.file_uploads ? __('On') : __('Off') }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ __('On') }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <font-awesome-icon v-if="data.php_ini.file_uploads" icon="fa-solid fa-check-circle" class="h-6 w-6 text-green-500"/>
                                                <font-awesome-icon v-else icon="fa-solid fa-xmark-circle" class="h-6 w-6 text-red-500"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">max_file_uploads</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ data.php_ini.max_file_uploads }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">20+</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <font-awesome-icon v-if="data.php_ini.matched_upload_max_filesize" icon="fa-solid fa-check-circle" class="h-6 w-6 text-green-500"/>
                                                <font-awesome-icon v-else icon="fa-solid fa-xmark-circle" class="h-6 w-6 text-red-500"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">upload_max_filesize</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ data.php_ini.upload_max_filesize }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">128M+</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <font-awesome-icon v-if="data.php_ini.matched_post_max_size" icon="fa-solid fa-check-circle" class="h-6 w-6 text-green-500"/>
                                                <font-awesome-icon v-else icon="fa-solid fa-xmark-circle" class="h-6 w-6 text-red-500"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">post_max_size</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ data.php_ini.post_max_size }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">128M+</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <font-awesome-icon v-if="data.php_ini.file_uploads" icon="fa-solid fa-check-circle" class="h-6 w-6 text-green-500"/>
                                                <font-awesome-icon v-else icon="fa-solid fa-xmark-circle" class="h-6 w-6 text-red-500"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">allow_url_fopen</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ data.php_ini.allow_url_fopen ? __('On') : __('Off') }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ __('On') }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <font-awesome-icon v-if="data.php_ini.allow_url_fopen" icon="fa-solid fa-check-circle" class="h-6 w-6 text-green-500"/>
                                                <font-awesome-icon v-else icon="fa-solid fa-xmark-circle" class="h-6 w-6 text-red-500"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">max_execution_time</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ data.php_ini.max_execution_time == '-1' ? __('Unlimited') : data.php_ini.max_execution_time }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">600+</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <font-awesome-icon v-if="data.php_ini.max_execution_time == '-1' || data.php_ini.max_execution_time >= 600" icon="fa-solid fa-check-circle" class="h-6 w-6 text-green-500"/>
                                                <font-awesome-icon v-else icon="fa-solid fa-xmark-circle" class="h-6 w-6 text-red-500"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">max_input_time</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ data.php_ini.max_input_time == '-1' ? __('Unlimited') : data.php_ini.max_input_time }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">120+</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <font-awesome-icon v-if="data.php_ini.max_input_time == '-1' || data.php_ini.max_input_time >= 120" icon="fa-solid fa-check-circle" class="h-6 w-6 text-green-500"/>
                                                <font-awesome-icon v-else icon="fa-solid fa-xmark-circle" class="h-6 w-6 text-red-500"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">max_input_vars</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ data.php_ini.max_input_vars }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">1000+</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <font-awesome-icon v-if="data.php_ini.max_input_vars >= 1000" icon="fa-solid fa-check-circle" class="h-6 w-6 text-green-500"/>
                                                <font-awesome-icon v-else icon="fa-solid fa-xmark-circle" class="h-6 w-6 text-red-500"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">memory_limit</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ data.php_ini.memory_limit == '-1' ? __('Unlimited') : data.php_ini.memory_limit }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">256M+</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <font-awesome-icon v-if="data.php_ini.matched_memory_limit" icon="fa-solid fa-check-circle" class="h-6 w-6 text-green-500"/>
                                                <font-awesome-icon v-else icon="fa-solid fa-xmark-circle" class="h-6 w-6 text-red-500"/>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Extension Information -->
        <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-1 mb-5">
            <div class="bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div class="space-y-6 sm:space-y-5">
                        <div>
                            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Extension Configuration</h2>
                        </div>

                        <div class="space-y-6 sm:space-y-5 sm:border-t sm:border-gray-200">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead>
                                        <tr>
                                            <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Extension Name</th>
                                            <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        <tr v-for="(extension_permission, index) in data.extension_permissions" :key="index">
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ index }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <font-awesome-icon v-if="extension_permission" icon="fa-solid fa-check-circle" class="h-6 w-6 text-green-500"/>
                                                <font-awesome-icon v-else icon="fa-solid fa-xmark-circle" class="h-6 w-6 text-red-500"/>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filesystem Permissions -->
        <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-1 mb-5">
            <div class="bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div class="space-y-6 sm:space-y-5">
                        <div>
                            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Filesystem Permissions</h2>
                        </div>

                        <div class="space-y-6 sm:space-y-5 sm:border-t sm:border-gray-200">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead>
                                        <tr>
                                            <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Extension Name</th>
                                            <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        <tr v-for="(filePath, index) in data.fileSystemPermissions" :key="filePath">
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ index }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <font-awesome-icon v-if="filePath" icon="fa-solid fa-check-circle" class="h-6 w-6 text-green-500"/>
                                                <font-awesome-icon v-else icon="fa-solid fa-xmark-circle" class="h-6 w-6 text-red-500"/>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </SettingLayout>
</template>


<script>
import SettingLayout from "@/Shared/Layout/Setting.vue";
import { library } from '@fortawesome/fontawesome-svg-core'
import { faCheckCircle, faXmarkCircle} from '@fortawesome/free-solid-svg-icons'
library.add(faCheckCircle, faXmarkCircle)

export default {
    components: {
        SettingLayout,
    },
    props:{
        data: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                title: ''
            }),
        };
    },
    methods: {

    },
    mounted() {

    },
};
</script>

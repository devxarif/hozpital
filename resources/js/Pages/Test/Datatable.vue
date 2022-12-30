<template>
    <AppLayout>
        <div class="grid grid-cols-1 gap-4 mt-5">
            <div class="block p-6 rounded-lg shadow-lg bg-white">
                <h2 class="text-gray-900 text-3xl leading-tight font-medium mb-2">Contact Messages</h2>

                <div class="mb-4 max-w-xs">
                    <input type="search" v-model="params.search" aria-label="Search" placeholder="Search..."
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                </div>

                <div class="overflow-hidden bg-white shadow-md sm:rounded-lg">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto -my-2 sm:-mx-6 lg:-mx-8">
                            <div class="inline-block py-2 min-w-full align-middle sm:px-6 lg:px-8">
                                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">

                                    <table class="min-w-full divide-y divide-gray-200 table-fixed">
                                        <thead class="bg-indigo-500">
                                            <tr>
                                                <!-- <th scope="col" class="py-3 px-6">
                                                    <div class="flex items-center">
                                                        Name
                                                        <a href="javascript:void(0)" @click="sort('name')"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                                    </div>
                                                </th> -->
                                                <th scope="col"
                                                    class="w-3/12 text-xs font-semibold tracking-wider text-left text-white uppercase">
                                                    <span class="inline-flex py-3 px-6 w-full justify-between"
                                                        @click="sort('name')">Name

                                                        <svg v-if="params.field === 'name' && params.direction === 'asc'"
                                                            xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path
                                                                d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                                                        </svg>

                                                        <svg v-if="params.field === 'name' && params.direction === 'desc'"
                                                            xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path
                                                                d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                                                        </svg>
                                                    </span>
                                                </th>
                                                <th scope="col"
                                                    class="w-3/12 text-xs font-semibold tracking-wider text-left text-white uppercase">
                                                    <span class="inline-flex py-3 px-6 w-full justify-between"
                                                        @click="sort('city')">City

                                                        <svg v-if="params.field === 'city' && params.direction === 'asc'"
                                                            xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path
                                                                d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                                                        </svg>

                                                        <svg v-if="params.field === 'city' && params.direction === 'desc'"
                                                            xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path
                                                                d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                                                        </svg>
                                                    </span>
                                                </th>
                                                <th scope="col"
                                                    class="py-3 px-6 w-3/12 text-xs font-semibold tracking-wider text-left text-white uppercase">
                                                    Postcode
                                                </th>
                                                <th scope="col"
                                                    class="py-3 px-6 w-3/12 text-xs font-semibold tracking-wider text-left text-white uppercase">
                                                    Phone
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr v-for="(contact, index) in contacts.data" :key="contact.id">
                                                <td class="py-4 px-6 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 w-10 h-10">
                                                            <img class="w-10 h-10 rounded-full"
                                                                :src="contact.profile_photo_url" alt="" />
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-semibold text-gray-900">
                                                                {{ contact.name }}
                                                            </div>
                                                            <div class="text-sm text-gray-500">
                                                                {{ contact.email }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap">
                                                    {{ contact.city }}
                                                </td>
                                                <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap">
                                                    {{ contact.postcode }}
                                                </td>
                                                <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap">
                                                    {{ contact.phone }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <Pagination :data="contacts" />

            </div>
        </div>
    </AppLayout>
</template>


<script>
    import Pagination from "@/Shared/Pagination.vue";
    import {
        pickBy,
        throttle
    } from 'lodash';

    export default {
        components: {
            Pagination,
        },
        props: {
            contacts: Object,
            filters: Object,
        },
        data() {
            return {
                params: {
                    search: this.filters.search,
                    field: this.filters.field,
                    direction: this.filters.direction,
                },
            };
        },
        methods: {
            sort(field) {
                this.params.field = field;
                this.params.direction = this.params.direction === 'asc' ? 'desc' : 'asc';
            },
        },
        watch: {
            params: {
                handler: throttle(function () {
                    let params = pickBy(this.params);

                    this.$inertia.get(this.route('contacts'), params, {
                        replace: true,
                        preserveState: true
                    });
                }, 150),
                deep: true,
            },
        },
    };
</script>

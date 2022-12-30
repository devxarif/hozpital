<template>
    <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
        <div class="sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    {{ __('Showing') }}
                    <span class="font-medium">{{ data.from }}</span>
                    {{ __('to') }}
                    <span class="font-medium">{{ data.to }}</span>
                    {{ __('of') }}
                    <span class="font-medium">{{ data.total }}</span>
                    {{ __('results') }}
                </p>
            </div>
            <div>
                <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm">
                    <template v-for="(link,index) in data.links" :key="index">
                        <template v-if="link.url">
                            <Link :href="link.url" v-html="link.label" :class="['relative inline-flex items-center border py-2 px-4 focus:z-20 text-sm font-medium', link.active ? 'bg-blue-50 text-blue-600 ' : 'border-gray-300 bg-white text-gray-500 hover:bg-gray-50 focus:z-20']" class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20"/>
                        </template>
                        <template v-else>
                            <a href="#" v-html="link.label" class="cursor-not-allowed relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20"></a>
                        </template>
                    </template>
                </nav>
            </div>
        </div>
    </div>
    <!-- <div>
                <p class="text-sm text-gray-700">
                    {{ __('Showing') }}
                    <span class="font-medium">{{ data.from }}</span>
                    {{ __('to') }}
                    <span class="font-medium">{{ data.to }}</span>
                    {{ __('of') }}
                    <span class="font-medium">{{ data.total }}</span>
                    {{ __('results') }}
                </p>
            </div>
            <div>
                <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm">
                    <template v-for="(link,index) in data.links" :key="index">
                        <template v-if="link.url">
                            <Link :href="link.url" v-html="link.label" :class="['relative inline-flex items-center border py-2 px-4 focus:z-20 text-sm font-medium', link.active ? 'border-blue-500 bg-blue-50 text-blue-600 z-10':'border-gray-300 bg-white text-gray-500 hover:bg-gray-50 focus:z-20']" class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20"/>
                        </template>
                        <template v-else>
                            <a href="#" class="cursor-not-allowed relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20">2</a>
                        </template>
                    </template>
                </nav>
            </div> -->
    <!-- <nav class="mx-auto text-center">
        <ul class="inline-flex -space-x-px">
            <template v-for="(link,index) in data.links" :key="index">
                <template v-if="link.url">
                    <li>
                        <Link :href="link.url" v-html="link.label" :class="['py-2 px-3', link.active ? 'bg-blue-50 border border-gray-300 hover:bg-blue-100 dark:border-gray-700 dark:bg-gray-700 dark:text-white text-blue-700 hover:text-blue-700': 'bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white       text-gray-500']" />
                    </li>
                </template>
                <template v-else>
                    <li>
                        <a href="#" class="cursor-not-allowed py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" v-html="link.label"></a>
                    </li>
                </template>
            </template>
        </ul>
    </nav> -->
    <!-- <nav>
        <ul class="pagination justify-content-center">
            <template v-for="(link,index) in links">
                <template v-if="link.url">
                    <li class="page-item" :class="{'active':link.active}" :key="index">
                        <Link class="page-link d-inline" :href="link.url" v-html="link.label" />
                    </li>
                </template>
                <template v-else>
                    <li class="page-item disabled" :key="index" style="margin-top:-7px">
                        <a class="page-link" href="#" v-html="link.label" />
                    </li>
                </template>
            </template>
        </ul>
    </nav> -->
</template>

<script>
    export default {
        props: {
            data: {
                type: Array,
                required: true,
            },
        },
    };
</script>

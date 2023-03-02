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
                            <a href="javascript:void(0)" v-html="link.label" class="cursor-not-allowed relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20"></a>
                        </template>
                    </template>
                </nav>
            </div>
        </div>
    </div>
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

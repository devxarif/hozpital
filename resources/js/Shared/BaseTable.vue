<template>
   <div class="flex flex-col mb-5 shadow-md" :class="className">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="w-full divide-y divide-gray-300 table-fixed">
                        <thead class="bg-gray-200">
                            <slot name="head"/>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <slot name="body"/>
                        </tbody>
                    </table>

                    <Pagination :data="items" v-if="pagination && items && items.data.length && items.total > app_setting.rows_per_page"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        items: {
            type: Array,
            required: false
        },
        pagination: {
            type: Boolean,
            default: true
        },
        className:{
            type: String,
            default: ''
        }
    }
}
</script>

<style>

</style>

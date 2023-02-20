<template id="x-item">
    <!-- <div class="flex items-center mb-4">
        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500   focus:ring-2  ">
        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 ">View</label>
    </div> -->
    <label class="flex items-center">
        <input :checked="item.checked" @change="$emit('change', item, $event.target.checked)"
            @click="getValue(item, $event.target.checked)" :id="convertToSlug(item.name)"
           class="w-4 h-4 form-check-input appearance-none border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 my-1 align-top bg-no-repeat bg-center bg-contain float-left cursor-pointer" type="checkbox" value="">
        <label :for="convertToSlug(item.name)"
            class="py-4 ml-2 w-full font-medium text-gray-900 ">
            {{ removeDot(ucf(item.name)) }}
        </label>
    </label>
</template>

<script>
export default {
    template: "#x-item",
    props: ["item"],
    data() {
        return {
            data: [],
        };
    },
    methods: {
        getValue(item, checked) {
            this.$emit("childData", item, checked);
        },
        convertToSlug(text) {
            return text
                .toLowerCase()
                .replace(/ /g, "-")
                .replace(/[^\w-]+/g, "");
        },
        // first latter uppercase
        ucf(str) {
            const final = str.charAt(0).toUpperCase() + str.slice(1);
            return final;
        },
        // remove dot from permission name
        removeDot(text) {
            return text.replace(/\./g, " ");
        },
    },
};
</script>

<style>

</style>

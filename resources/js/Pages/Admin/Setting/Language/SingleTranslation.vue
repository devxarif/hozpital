<template>
    <div class="mb-2 col-span-6">
        <label for="username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">{{ label }}</label>
        <!-- <BaseInput placeholder="Name" id="leave_type_name" :modelValue="label" :disabled="true" /> -->
    </div>
    <div class="mb-2 col-span-6">
        <input type="text" class="bg-gray-50 border rounded-lg block w-full text-md p-2.5 border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500" placeholder="Name" v-model.lazy="translation"/>
    </div>
</template>

<script>
export default {
    props: {
        label: {
            type: String,
            required: true,
        },
        value: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            translation: this.value,
        };
    },
    watch: {
        translation: {
            async handler() {
                try {
                    let response = await axios.put(route('admin.settings.language.translation.update', {
                        key: this.label,
                        value: this.translation
                    }))

                    console.log(response.data)
                } catch (error) {
                    this.toastError('Translation data saved failed')
                }

                // this.form.name = this.language.name
                // this.form.language_code = this.language.language_code
                // this.form.country_code = this.language.country_code
                // this.form.status = this.language.status ? true : false
                // this.form.force_rtl = this.language.force_rtl ? true : false
            },
            deep: true,
        },
    },
}
</script>

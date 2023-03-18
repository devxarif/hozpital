<template>
    <Transition name="slide-fade">
        <div class="fixed inset-0 overflow-hidden z-50" v-if="show">
            <div class="absolute inset-0 overflow-hidden transition-opacity">
                <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                <div class="pointer-events-none absolute right-0 inset-y-0 flex max-w-full ltr:pl-10 rtl:pr-10"
                    v-click-outside="()=> $emit('close-drawer')">
                    <div class="pointer-events-auto w-screen max-w-xs lg:max-w-2xl">
                        <div class="flex h-full flex-col bg-white shadow-xl">
                            <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
                                <div class="flex items-start justify-between rtl:flex-row-reverse mb-5">
                                    <h2 class="text-2xl tracking-wide font-bold text-gray-900">
                                        {{ __('Manufacture Update') }}
                                    </h2>

                                    <div class="ml-3 flex h-7 items-center">
                                        <button type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500"
                                            @click="$emit('close-drawer')">
                                            <svg class="h-6 w-6" x-description="Heroicon name: outline/x"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <form class="mb-4" @submit.prevent="saveData">
                                    <div class="mb-4">
                                        <Label name="Name" id="manufacture_name" :hasError="form.errors.name"/>
                                        <BaseInput v-model="form.name" placeholder="Name" id="manufacture_name" :hasError="form.errors.name"/>
                                    </div>
                                    <div class="mb-4">
                                        <Label name="Email" id="manufacture_email" :hasError="form.errors.email"/>
                                        <BaseInput v-model="form.email" placeholder="Email" id="manufacture_email" :hasError="form.errors.email"/>
                                    </div>
                                    <div class="mb-4">
                                        <Label name="Phone Number" id="manufacture_phone" :hasError="form.errors.phone"/>
                                        <BaseInput v-model="form.phone" placeholder="Phone Number" id="manufacture_phone" :hasError="form.errors.phone"/>
                                    </div>
                                    <div class="mb-4">
                                        <Label name="Note" id="manufacture_note" :hasError="form.errors.note" :required="false"/>
                                        <BaseTextarea v-model="form.note" placeholder="Note" id="manufacture_note" :hasError="form.errors.note"/>
                                    </div>
                                    <div class="mb-4">
                                        <Label name="Address" id="manufacture_address" :hasError="form.errors.address" :required="false"/>
                                        <BaseTextarea v-model="form.address" placeholder="Address" id="manufacture_address" :hasError="form.errors.address"/>
                                    </div>
                                    <button :disabled="form.processing"  type="submit"
                                        class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 mb-2   focus:outline-none  mt-3">
                                        <Loading v-if="form.processing" :messageShow="false" />
                                        <span v-else>
                                            <svg class="inline w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" points="216 72.005 104 184 48 128.005"/></svg>
                                            {{ __('Save') }}
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Transition>
</template>

<script>
export default {
    props: {
        manufacture: {
            type: Object,
            required: true,
        },
        show: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            form: this.$inertia.form({
                name: this.manufacture.name,
                email: this.manufacture.email,
                phone: this.manufacture.phone,
                note: this.manufacture.note,
                address: this.manufacture.address,
            }),
        };
    },
    watch: {
        manufacture: {
            handler() {
                this.form.name = this.manufacture.name,
                this.form.email = this.manufacture.email,
                this.form.phone = this.manufacture.phone,
                this.form.note = this.manufacture.note,
                this.form.address = this.manufacture.address
            },
            deep: true,
        },
    },
    methods: {
        saveData() {
            this.form.put(route("admin.manufacture.update", this.manufacture.id), {
                onSuccess: () => {
                    this.form.reset(),
                    this.$emit('close-drawer')
                },
            });
        }
    },
    mounted(){
        this.checkPagePermission('admin')
    }
};
</script>

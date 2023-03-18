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
                                        {{ __('Bed Update') }}
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
                                        <Label name="Select Bed Type" id="bed_type" :hasError="form.errors.bed_type"/>
                                        <div class="grid grid-cols-3 gap-3 mx-auto">
                                            <div class="relative" v-for="bed_type in bed_types" :key="bed_type.id">
                                                <input :checked="bed_type.id == form.bed_type" @change="bedTypeChange" class="sr-only peer" type="radio" :value="bed_type.id" :id="bed_type.slug" v-model="form.bed_type">
                                                <label class="flex p-2 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-blue-500 peer-checked:ring-2 peer-checked:border-transparent flex-col peer-checked:shadow-xl" :for="bed_type.slug">
                                                    <span class="text-lg font-bold">{{ bed_type.name }}</span>
                                                    <ul class="text-sm">
                                                        <li><span class="text-md font-medium">Total Beds</span> : {{ bed_type.beds_count }}</li>
                                                    </ul>
                                                </label>
                                            </div>
                                        </div>
                                        <ErrorMessage :name="form.errors.bed_type"/>
                                    </div>
                                    <div class="grid grid-cols-2 gap-2">
                                        <div class="mb-4">
                                            <Label name="Floor" id="bed_floor" :hasError="form.errors.floor"/>
                                            <Multiselect id="bed_floor" :close-on-select="true" :can-clear="true"
                                        :searchable="true" v-model="form.floor" :create-option="false"
                                        placeholder="Select Floor" :options="floors.map(item => ({
                                            value: item.id, label: item.name
                                        }))"  />
                                            <ErrorMessage :name="form.errors.floor"/>
                                        </div>
                                        <div class="mb-4">
                                            <Label name="Bed Number" id="bed_number" :hasError="form.errors.number"/>
                                            <BaseInput v-model="form.number" placeholder="Number" id="bed_number" :hasError="form.errors.number"/>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-2">
                                        <div class="mb-4">
                                            <Label name="Charge ($)" id="bed_charge" :hasError="form.errors.charge" :required="false" />
                                            <BaseInput v-model="form.charge" placeholder="Bed Charge" id="bed_charge" :hasError="form.errors.charge"/>
                                        </div>
                                        <div class="mb-4">
                                            <Label name="Status" :hasError="form.errors.status" :required="false"/>
                                            <div class="flex gap-2">
                                                <label for="patient_male" class="w-full rounded-lg flex items-center pl-4 border border-gray-200  py-3 ml-2 text-sm font-medium text-gray-700 gap-2 focus:outline-none">
                                                    <input id="patient_male" value="alloted" v-model="form.status" name="status" type="radio" class="h-4 w-4 border-gray-300 text-blue-600 focus:outline-none">
                                                    <span>{{ __('Alloted') }}</span>
                                                </label>
                                                <label for="patient_female" class="w-full rounded-lg flex items-center pl-4 border border-gray-200  py-3 ml-2 text-sm font-medium text-gray-700 gap-2 focus:outline-none">
                                                    <input id="patient_female" value="available" v-model="form.status" name="status" type="radio" class="h-4 w-4 border-gray-300 text-blue-600 focus:outline-none">
                                                    <span>{{ __('Available') }}</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <Label name="Description" id="bed_description" :hasError="form.errors.description" :required="false"/>
                                        <BaseTextarea v-model="form.description" placeholder="Description" id="bed_description" :hasError="form.errors.description"/>
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
        bed: {
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
                bed_type: this.bed.bed_type_id,
                description:  this.bed.description,
                floor: this.bed.bed_floor_id,
                number: this.bed.number,
                charge: this.bed.charge,
                status: this.bed.status,
            }),

            bed_types: [],
            floors: []
        };
    },
    watch: {
        bed: {
            handler() {
                this.form.bed_type = this.bed.bed_type_id
                this.form.description = this.bed.description
                this.form.floor = this.bed.bed_floor_id
                this.form.number = this.bed.number
                this.form.charge = this.bed.charge
                this.form.status = this.bed.status
            },
            deep: true,
        },
    },
    methods: {
        bedTypeChange(event) {
            this.form.bed_type = event.target.value;
        },
        saveData() {
            this.form.put(route("admin.bed.update", this.bed.id), {
                onSuccess: () => {
                    this.form.reset(),
                    this.$emit('close-drawer')
                },
            });
        },
        async loadData(){
            // Fetches bed types
            let bed_type_response = await axios.get(route("fetch.bedTypes"));
            this.bed_types = bed_type_response.data;

            // Fetches bed floors
            let bed_floor = await axios.get(route("fetch.bedFloors"));
            this.floors = bed_floor.data;
        },
    },
    created(){
        this.checkPagePermission('admin')
        this.loadData()
    }
};
</script>

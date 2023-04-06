<template>
    <ProfileSettingLayout title="Profile Setting">

        <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-1">
            <div class="bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <form @submit.prevent="saveData" class="space-y-8 divide-y divide-gray-200">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div class="space-y-6 sm:space-y-5">
                            <div>
                                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Personal information</h2>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed
                                    publicly so be careful what you share.</p>
                            </div>
                            <div class="space-y-6 sm:space-y-5">
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Name" id="name" :hasError="form.errors.name" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg rounded-md shadow-sm">
                                            <BaseInput v-model="form.name" placeholder="Name"
                                                id="name" :hasError="form.errors.name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Email Address" id="email" :hasError="form.errors.email" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg rounded-md shadow-sm">
                                            <BaseInput v-model="form.email" placeholder="Email Address"
                                                id="email" :hasError="form.errors.email" />
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Username" id="username" :hasError="form.errors.username" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg rounded-md shadow-sm">
                                            <BaseInput v-model="form.username" placeholder="Username"
                                                id="username" :hasError="form.errors.username" />
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Phone Number" id="phone" :hasError="form.errors.phone" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg rounded-md shadow-sm">
                                            <BaseInput v-model="form.phone" placeholder="Phone Number"
                                                id="phone" :hasError="form.errors.phone" />
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Address" id="address" :hasError="form.errors.address" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg rounded-md shadow-sm">
                                            <BaseTextarea v-model="form.address" placeholder="Address" id="address" :hasError="form.errors.address"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Blood Group" id="patient_blood_group" :hasError="form.errors.blood_group" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg rounded-md shadow-sm">
                                            <BaseSelect v-model:value="form.blood_group" :hasError="form.errors.blood_group" class="w-3/2" id="patient_blood_group" :showMessage="false">
                                                <option value="" hidden>{{ __('Select Blood Group') }}</option>
                                                <option :selected="form.blood_group == 'A+'" value="A+">A+</option>
                                                <option :selected="form.blood_group == 'A-'" value="A-">A-</option>
                                                <option :selected="form.blood_group == 'B+'" value="B+">B+</option>
                                                <option :selected="form.blood_group == 'B-'" value="B-">B-</option>
                                                <option :selected="form.blood_group == 'AB+'" value="AB+">AB+</option>
                                                <option :selected="form.blood_group == 'AB+'" value="AB-">AB-</option>
                                                <option :selected="form.blood_group == 'O+'" value="O+">O+</option>
                                                <option :selected="form.blood_group == 'O-'" value="O-">O-</option>
                                            </BaseSelect>
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Gender" id="gender" :hasError="form.errors.gender" />
                                    <div class="flex gap-2">
                                        <label for="patient_male" class="w-full rounded-lg flex items-center pl-4 border border-gray-200  py-3 text-sm font-medium text-gray-700 gap-2">
                                            <input id="patient_male" value="male" v-model="form.gender" name="gender" type="radio" class="h-4 w-4 border-gray-300 text-blue-600 focus:outline-none">
                                            <span>{{ __('Male') }}</span>
                                        </label>
                                        <label for="patient_female" class="w-full rounded-lg flex items-center pl-4 border border-gray-200 py-3 text-sm font-medium text-gray-700 gap-2">
                                            <input id="patient_female" value="female" v-model="form.gender" name="gender" type="radio" class="h-4 w-4 border-gray-300 text-blue-600 focus:outline-none">
                                            <span>{{ __('Female') }}</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Birth Date" id="birth_date" :hasError="form.errors.birth_date" />
                                    <div>
                                        <Datepicker v-model="form.birth_date" :enableTimePicker="false" class="border-none bg-gray-50 border text-md rounded-lg block w-full p-1   "
                                                @update:modelValue="handleCustomDate" :class="{'is-invalid': form.errors.birth_date}" :placeholder="__('Select Date')" :default-value="new Date()" :disabled-date="disabledAfterToday" />
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <Label name="Age" id="age" :hasError="form.errors.age" />
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <div class="max-w-lg rounded-md shadow-sm">
                                            <BaseInput v-model="form.age" placeholder="Age" id="patient_age" :hasError="form.errors.age"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:grid sm:grid-cols-3 sm:items-center sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                                    <div>
                                        <Label name="Profile Image" id="logo" :hasError="form.errors.avatar" />
                                    </div>
                                    <div class="mt-1 sm:col-span-2 sm:mt-0">
                                        <input ref="avatar" @change="onAvatarChange"  accept="image/jpeg, image/jpg, image/png, image/svg+xml" type="file" hidden>
                                        <div class="flex items-center">
                                            <span class="text-center h-24 w-40 overflow-hidden rounded-md bg-gray-100">
                                                <img class="mx-auto h-20 w-full object-cover" :src="avatar_preview"
                                                    alt="Your avatar">
                                            </span>
                                            <button @click="$refs.avatar.click()" type="button"
                                                class="ml-5 rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Change</button>
                                        </div>
                                        <ErrorMessage :name="form.errors.avatar" />
                                        <small>Accept format only jpeg, jpg, png & svg </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-5">
                        <div class="flex justify-end">
                            <button :disabled="form.processing" type="submit"
                                class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-md px-5 py-2.5 mb-2   focus:outline-none  mt-3">
                                <Loading v-if="form.processing" :messageShow="false" />
                                <span v-else>
                                    <svg class="inline w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                        <rect width="256" height="256" fill="none" />
                                        <polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="24" points="216 72.005 104 184 48 128.005" /></svg>
                                    {{ __('Save') }}
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </ProfileSettingLayout>
</template>

<script>
import ProfileSettingLayout from "@/Shared/Layout/ProfileSetting.vue";

export default {
    props:{
        data: Object,
    },
    components: {
        ProfileSettingLayout,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: this.data?.name ?? '',
                email: this.data?.email ?? '',
                username: this.data?.username ?? '',
                avatar: '',
                phone: this.data?.contact_info?.phone ?? '',
                address: this.data?.contact_info?.address ?? '',
                gender: this.data?.patient?.gender ?? '',
                birth_date: this.data?.patient?.birth_date ?? '',
                age: this.data?.patient?.age ?? '',
                blood_group: this.data?.patient?.blood_group ?? '',
            }),

            avatar_preview: this.data.avatar_url,
        };
    },
    methods: {
        saveData() {
            this.form.post(route("user.profile.setting.update"), {
                preserveScroll: true,
                onSuccess: () => {
                    if (this.form.app_favicon) {
                        window.location.reload();
                    }
                },
            });
        },
        onAvatarChange(e) {
            const file = e.target.files[0];
            this.avatar_preview = URL.createObjectURL(file);
            this.form.avatar = file;
        },
        handleCustomDate(date) {
            const formatTime = this.formatTime(date, "YYYY-MM-DD");
            this.form.birth_date = formatTime;
        },
        disabledAfterToday(date) {
            console.log(date)
            const today = new Date();
            // today.setHours(0, 0, 0, 0);
            return date > today
        },
    }
};
</script>

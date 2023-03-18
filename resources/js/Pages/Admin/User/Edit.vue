<template>
    <Transition name="slide-fade">
        <div class="fixed inset-0 overflow-hidden z-50" v-if="show">
        <div class="absolute inset-0 overflow-hidden transition-opacity">
            <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition ease-in-out delay-250"></div>
            <div class="pointer-events-none absolute right-0 inset-y-0 flex max-w-full ltr:pl-10 rtl:pr-10"
                v-click-outside="()=> $emit('close-drawer')">
                <div class="pointer-events-auto w-screen max-w-xs lg:max-w-2xl">
                    <div class="flex h-full flex-col bg-white shadow-xl">
                        <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
                            <div class="flex items-start justify-between rtl:flex-row-reverse mb-5">
                                <h2 class="text-2xl tracking-wide font-bold text-gray-900">
                                    {{ __('Admin Edit') }}
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
                            <form class="mb-4" @submit.prevent="updateData">
                                <div class="mb-4">
                                    <Label name="Name" id="admin_name" :hasError="form.errors.name"/>
                                    <BaseInput v-model="form.name" placeholder="Name" id="admin_name" :hasError="form.errors.name"/>
                                </div>
                                <div class="mb-4">
                                    <Label name="Email Address" id="admin_email" :hasError="form.errors.email"/>
                                    <BaseInput v-model="form.email" placeholder="Email" id="admin_email" :hasError="form.errors.email"/>
                                </div>
                                <div class="mb-4">
                                    <Label name="Change Password" id="admin_password" :hasError="form.errors.password"/>
                                    <BaseInput type="password" v-model="form.password" placeholder="Password" id="admin_password" :hasError="form.errors.password"/>
                                </div>
                                <div class="mb-4">
                                    <Label name="Avatar" id="plan_name" :hasError="form.errors.avatar"/>
                                    <div class="flex justify-center items-center w-full" v-if="!previewImage">
                                        <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-60 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer   hover:bg-gray-100   ">
                                            <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                                <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                                <p class="mb-2 text-sm text-gray-500 "><span class="font-semibold">Click to upload image</span></p>
                                                <p class="text-xs text-gray-500 ">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                            </div>
                                            <input id="dropzone-file" type="file" class="hidden" @change="onFileChange" accept="image/svg+xml, image/jpeg, image/jpg/ image/png">
                                        </label>
                                    </div>
                                    <div class="relative" v-if="previewImage">
                                        <img :src="previewImage" class="h-60 w-full rounded-lg object-cover" alt="image description">
                                        <button @click="removeImage" type="button" class="absolute top-2 right-2 text-white bg-red-700 focus:ring-4 focus:ring-red-300 rounded-lg px-5 py-2.5  focus:outline-none ">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="#ffffff">
                                                <path
                                                    d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <ErrorMessage :name="form.errors.avatar"/>
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
    <!-- <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">{{ __('Admin Edit') }}</h3>
                        <Link :href="route('admins.index')" class="btn btn-primary">
                        <i class="fa-solid fa-arrow-left"></i>
                        {{ __('Back') }}
                        </Link>
                    </div>
                </div>
                <div class="card-body row justify-content-center">
                    <div class="col-lg-6">
                        <form @submit.prevent="updateData">
                        <div class="mb-3">
                            <Label name="Name')" for="name"/>
                            <input v-model="form.name" type="text" class="form-control" :class="{'is-invalid':form.errors.name}" id="name" :placeholder="__('Name')">
                            <ErrorMessage :name="form.errors.name"/>
                        </div>
                        <div class="mb-3">
                            <Label name="Email address')" for="email"/>
                            <input v-model="form.email" type="email" class="form-control" :class="{'is-invalid':form.errors.email}" id="email" :placeholder="__('Email address')">
                            <ErrorMessage :name="form.errors.email"/>
                        </div>
                        <div class="mb-3">
                            <Label name="Change Password')" :required="false" for="password"/>
                            <input v-model="form.password" type="password" class="form-control" :class="{'is-invalid':form.errors.password}" id="password"  :placeholder="__('Password')">
                            <ErrorMessage :name="form.errors.password"/>
                        </div>
                        <div class="mb-3">
                            <Label name="Change Avatar')" :required="false"/>
                            <input accept="image/jpeg, image/jpg/ image/png" class="form-control border-0 p-0" type="file" @input="form.avatar = $event.target.files[0]" :class="{'is-invalid':form.errors.avatar}"/>
                            <ErrorMessage :name="form.errors.avatar"/>
                        </div>
                        <button :disabled="form.processing" type="submit" class="btn btn-primary">
                            <Loading v-if="form.processing"/>
                            <span v-else>
                                <i class="fa-solid fa-check mr-1"></i>
                                {{ __('Save') }}
                            </span>
                        </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</template>

<script>
export default {
    props: {
        admin: {
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
                name: this.admin.name,
                email: this.admin.email,
                password: null,
                avatar: null,
                _method: "PUT",
            }),

            previewImage: null,
        };
    },
    methods: {
        updateData() {
            this.form.post(route("admins.update", this.admin.id),{
                onSuccess: () => {
                    this.form.reset(),
                    this.removeImage()
                    this.$emit('close-drawer')
                },
            });
        },
        onFileChange(e) {
            const file = e.target.files[0];
            this.form.avatar = file
            this.previewImage = URL.createObjectURL(file);
        },
        removeImage(){
            this.previewImage = null;
            this.form.avatar = null
        }
    },
     mounted(){
        this.checkPagePermission('admin')
    },
    watch: {
        admin: {
            handler() {
                this.form.name= this.admin.name
                this.form.email= this.admin.email
                this.previewImage= this.admin.avatar_url
            },
            deep: true,
        },
    },
};
</script>

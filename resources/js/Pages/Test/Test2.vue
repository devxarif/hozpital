<template>
    <AppLayout title="Announcement">
        <div class="grid grid-cols-1 gap-4 mt-5">
            <div class="block p-6 rounded-lg shadow-lg bg-white">
                <h2 class="text-gray-900 text-3xl leading-tight font-medium mb-2">Intus Form</h2>
                {{ form }}
                <form @submit.prevent="submit">
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                        <input type="name" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Enter Name" v-model="form.name">
                        <ErrorMessage :name="form.errors.name"/>
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                        <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Enter Email" v-model="form.email">
                        <ErrorMessage :name="form.errors.email"/>
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Phone</label>
                        <input type="number" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Enter Phone" v-model="form.phone">
                        <ErrorMessage :name="form.errors.phone"/>
                    </div>

                    <div class="mb-6">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">Your message</label>
                        <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 " placeholder="Leave a message" v-model="form.message"></textarea>
                        <ErrorMessage :name="form.errors.message"/>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                </form>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import intus from "intus";
import {isRequired, isEmail} from "intus/rules";
import {useForm} from "@inertiajs/inertia-vue3"
import useValidatedForm from "@/useValidatedForm"


const form = useValidatedForm(
    useForm({
      name: "",
      email: "",
      phone: "",
      message: ""
    }),
    {
        name: [isRequired()],
        email: [isRequired(), isEmail()],
        phone: [],
        message: [isRequired()],
    }
);


function submit() {
    alert('validation passes');
}
</script>
<!--
<template>
    <AppLayout title="Announcement">
        <div class="container mx-auto mb-5">
            <div class="grid grid-cols-1 gap-4 mt-5">
                <div class="block p-6 rounded-lg shadow-lg bg-white">
                    <h2 class="text-gray-900 text-3xl leading-tight font-medium mb-2">Intus Form</h2>
                    {{ form }}
                    <form @submit.prevent="submitForm">
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                            <input type="name" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Enter Name" v-model="form.name">
                            <ErrorMessage :name="form.errors.name"/>
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                            <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Enter Email" v-model="form.email">
                            <ErrorMessage :name="form.errors.email"/>
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Phone</label>
                            <input type="number" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Enter Phone" v-model="form.phone">
                            <ErrorMessage :name="form.errors.phone"/>
                        </div>

                        <div class="mb-6">
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">Your message</label>
                            <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 " placeholder="Leave a message" v-model="form.message"></textarea>
                            <ErrorMessage :name="form.errors.message"/>
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>


<script>
    import intus from "intus";
    import {isRequired, isEmail, isNumeric} from "intus/rules";
    import useValidatedForm from "@/useValidatedForm";

    const form = useValidatedForm(
        this.$inertia.form({
            name: "",
            email: "",
            phone: "",
            message: ""
        }),
        {
            name: [isRequired()],
            email: [isRequired(), isEmail()],
            phone: [isRequired(), isNumeric()],
            message: [isRequired()],
        }
    )

    export default {
        components: {
            intus,
            isRequired,
            isEmail,
            useValidatedForm
        },
        data() {
            return {
                form: this.$inertia.form({
                    name: "",
                    email: "",
                    phone: "",
                    message: ""
                })
            };
        },
        methods: {
            submitForm(){
                this.form.clearErrors();

                const validation = intus.validate(this.form.data(), {
                    name: [isRequired()],
                    email: [isRequired(), isEmail()],
                    phone: [isRequired(), isNumeric()],
                    message: [isRequired()],
                });

                console.log(validation.errors())

                if (validation.passes()) {
                    alert('validation passed')
                } else {
                    this.form.setError(validation.errors());
                }
            }
        }
    };
</script>
 -->

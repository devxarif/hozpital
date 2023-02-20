<template>
    <Transition name="slide-fade">
        <div class="fixed inset-0 overflow-hidden z-50" v-if="show">
            <div class="absolute inset-0 overflow-hidden transition-opacity">
                <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                <div class="pointer-events-none absolute right-0 inset-y-0 flex max-w-full ltr:pl-10 rtl:pr-10"
                    v-click-outside="()=> $emit('close-drawer')">
                    <div class="pointer-events-auto w-screen max-w-xs lg:max-w-xl">
                        <div class="flex h-full flex-col bg-white shadow-xl">
                            <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
                                <div class="flex items-start justify-between rtl:flex-row-reverse mb-5">
                                    <h2 class="text-2xl tracking-wide font-bold text-gray-900">
                                        {{ __('Notifications') }} (10)
                                    </h2>
                                    <div class="ml-3 flex h-7 items-center">
                                        <button type="button"
                                            class="-m-2 p-2 text-gray-400 hover:text-gray-500 focus:outline-none"
                                            @click="$emit('close-drawer')">
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex justify-start">
                                    <div class="divide-y divide-gray-100">
                                        <a href="#" class="flex py-3 px-4 hover:bg-gray-100">
                                            <div class="flex-shrink-0">
                                                <img class="w-11 h-11 rounded-full"
                                                    src="https://flowbite.com/docs/images/people/profile-picture-1.jpg"
                                                    alt="Jese image">
                                                <div
                                                    class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-blue-600 rounded-full border border-white">
                                                    <svg class="w-3 h-3 text-white" aria-hidden="true"
                                                        fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                                                        </path>
                                                        <path
                                                            d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="pl-3 w-full">
                                                <div class="text-gray-500 text-sm mb-1.5">New
                                                    message from <span
                                                        class="font-semibold text-gray-900">Jese
                                                        Leos</span>: "Hey, what's up? All set for the
                                                    presentation?"</div>
                                                <div class="text-xs text-blue-600">a few
                                                    moments ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="flex py-3 px-4 hover:bg-gray-100">
                                            <div class="flex-shrink-0">
                                                <img class="w-11 h-11 rounded-full"
                                                    src="https://flowbite.com/docs/images/people/profile-picture-1.jpg"
                                                    alt="Joseph image">
                                                <div
                                                    class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-gray-900 rounded-full border border-white">
                                                    <svg class="w-3 h-3 text-white" aria-hidden="true"
                                                        fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="pl-3 w-full">
                                                <div class="text-gray-500 text-sm mb-1.5">
                                                    <span class="font-semibold text-gray-900">Joseph
                                                        Mcfall</span> and <span
                                                        class="font-medium text-gray-900">5
                                                        others</span> started following you.</div>
                                                <div class="text-xs text-blue-600">10 minutes
                                                    ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="flex py-3 px-4 hover:bg-gray-100">
                                            <div class="flex-shrink-0">
                                                <img class="w-11 h-11 rounded-full"
                                                    src="https://flowbite.com/docs/images/people/profile-picture-1.jpg"
                                                    alt="Bonnie image">
                                                <div
                                                    class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-red-600 rounded-full border border-white">
                                                    <svg class="w-3 h-3 text-white" aria-hidden="true"
                                                        fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="pl-3 w-full">
                                                <div class="text-gray-500 text-sm mb-1.5">
                                                    <span class="font-semibold text-gray-900">Bonnie
                                                        Green</span> and <span
                                                        class="font-medium text-gray-900">141
                                                        others</span> love your story. See it and view more
                                                    stories.</div>
                                                <div class="text-xs text-blue-600">44 minutes
                                                    ago</div>
                                            </div>
                                        </a>
                                        <a href="#" class="flex py-3 px-4 hover:bg-gray-100">
                                            <div class="flex-shrink-0">
                                                <img class="w-11 h-11 rounded-full"
                                                    src="https://flowbite.com/docs/images/people/profile-picture-1.jpg"
                                                    alt="Leslie image">
                                                <div
                                                    class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-green-400 rounded-full border border-white">
                                                    <svg class="w-3 h-3 text-white" aria-hidden="true"
                                                        fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="pl-3 w-full">
                                                <div class="text-gray-500 text-sm mb-1.5">
                                                    <span class="font-semibold text-gray-900">Leslie
                                                        Livingston</span> mentioned you in a comment: <span
                                                        class="font-medium text-blue-500" href="#">@bonnie.green</span>
                                                    what do you say?</div>
                                                <div class="text-xs text-blue-600">1 hour ago
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="flex py-3 px-4 hover:bg-gray-100">
                                            <div class="flex-shrink-0">
                                                <img class="w-11 h-11 rounded-full"
                                                    src="https://flowbite.com/docs/images/people/profile-picture-1.jpg"
                                                    alt="Robert image">
                                                <div
                                                    class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-blue-500 rounded-full border border-white">
                                                    <svg class="w-3 h-3 text-white" aria-hidden="true"
                                                        fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="pl-3 w-full">
                                                <div class="text-gray-500 text-sm mb-1.5">
                                                    <span class="font-semibold text-gray-900">Robert
                                                        Brown</span> posted a new video: Glassmorphism - learn
                                                    how to implement the new design trend.</div>
                                                <div class="text-xs text-blue-600">3 hours
                                                    ago</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
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
            show: {
                type: Boolean,
                default: false
            }
        },
        data() {
            return {
                toggleNotificationsMenu: false,
            };
        },
        methods: {

        },
        mounted() {

        }
    };
</script>

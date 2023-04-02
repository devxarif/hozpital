<template>
    <div v-if="show" class="bg-gray-500 bg-opacity-80 transition-opacity fixed inset-0 overflow-y-auto overflow-x-hidden top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center flex w-full p-4">
        <div class="relative w-full h-full max-w-xl md:h-auto" >
            <div class="relative bg-white rounded-lg shadow" v-click-outside="()=> $emit('close-modal')">
                <button @click="$emit('close-modal')" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  " data-modal-hide="authentication-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900">Let's secure your account!</h3>
                    <p>If you see unusual activity on your account - we highly suggest to change password of your account. Upon changing your password you will be logged out of all devices except the one you’re using right now.</p>

                    <button @click="togglePasswordMenu = true" type="button"
                        class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 mb-2   focus:outline-none  mt-3">
                        <span>
                            {{ __('Change Password') }}
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Change Password -->
    <ChangePassword :show="togglePasswordMenu"  @close-drawer="togglePasswordMenu = false"/>
</template>

<script>
    import ChangePassword from '@/Shared/Partials/HeaderItems/ChangePassword.vue'

    export default {
        props: {
            show: {
                type: Boolean,
                default: false
            }
        },
        components: {
            ChangePassword
        },
        data() {
            return {
                togglePasswordMenu: false
            }
        },
        mounted() {
            this.checkPagePermission('admin')
        }
    };
</script>

<template>
    <AppLayout title="Blood Bank">

        <!-- Header Part  -->
        <Breadcrumb>
            <BreadcrumbLink title="Patient"/>
        </Breadcrumb>
        <nav class="flex mb-2" >
            <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="javascript:void(0)" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
                        <font-awesome-icon icon="fa-solid fa-home" class="w-4.5 h-4.5 mr-2.5" />
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <font-awesome-icon icon="fa-solid fa-chevron-right" class="w-3 h-3 text-gray-400" />
                        <a href="javascript:void(0)"
                            class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">Blood Bank</a>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="mb-4 flex justify-between">
            <h2 class="text-3xl font-semibold leading-7 text-gray-900  sm:text-3xl sm:truncate">
                {{ __('Blood Bank') }}
            </h2>
        </div>

        <!-- Body Part  -->
        <template v-if="blood_banks && blood_banks.length">
            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                <span v-for="blood_bank in blood_banks" :key="blood_bank.id" class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100   ">
                    <div class="flex flex-wrap justify-between items-start">
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{ blood_bank.blood_group }}</h2>

                        <Menu as="div" class="relative inline-block text-left">
                            <div>
                                <MenuButton class="flex items-center rounded-full text-gray-400 hover:text-gray-600 focus:outline-none">
                                    <span class="sr-only">Open options</span>
                                    <font-awesome-icon icon="fa-solid fa-ellipsis-vertical" class="h-6 w-6"/>
                                </MenuButton>
                            </div>

                            <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                <MenuItems class="absolute right-0 z-10 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                    <div class="py-1 text-sm">
                                    <MenuItem v-slot="{ active }">
                                        <a href="javascript:void(0)" @click.prevent="editData(blood_bank)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                            <font-awesome-icon icon="fa-solid fa-pen-to-square" class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500"/>
                                            Edit
                                        </a>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <a href="javascript:void(0)" @click.prevent="editData(blood_bank)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                            <font-awesome-icon icon="fa-solid fa-eye" class="mr-3 h-5 w-5 text-sky-500 group-hover:text-sky-500"/>
                                            Details
                                        </a>
                                    </MenuItem>
                                    </div>
                                </MenuItems>
                            </transition>
                        </Menu>
                    </div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{ blood_bank.bags }}</h2>
                </span>
            </div>
        </template>

        <NothingFound v-else>
            <BaseButton @click="showCreateDrawer = true" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2">
                <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                {{ __('Add Bed Bank') }}
            </BaseButton>
       </NothingFound>

        <EditBloodBank :show="showEditDrawer" @close-drawer="showEditDrawer = false" :blood_bank="editBloodBank"/>
    </AppLayout>
</template>

<script>
import EditBloodBank from "./Edit.vue";
import CardSkeleton from "@/Shared/Skeleton/CardSkeleton.vue";

export default {
    components: {
        EditBloodBank,
        CardSkeleton,
    },
    props: {
        blood_banks:{
            type: Array,
            default: () => []
        },
        filter:{
            type: Array,
            default: () => []
        },
    },
    data() {
        return {
            showEditDrawer: false,
            editBloodBank: '',
        }
    },
    methods: {
        editData(blood_bank){
            this.showEditDrawer = true
            this.editBloodBank = blood_bank
        }
    }
};
</script>

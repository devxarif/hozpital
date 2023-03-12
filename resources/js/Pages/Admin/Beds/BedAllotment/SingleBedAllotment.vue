<template>
    <!-- @mouseover="showDetails = true" @mouseleave="showDetails = false" -->
    <span @mouseover="showDetails = true" @mouseleave="showDetails = false"
        class="relative cursor-pointer block p-3 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100">
        <div class="flex flex-wrap justify-between items-start">
            <AllotedBedIcon v-if="bed.status == 'alloted'" class="h-12 w-12" />
            <AvailableBedIcon v-else class="h-12 w-12" />

            <Menu as="div" class="relative inline-block text-left">
                <div>
                    <MenuButton
                        class="flex items-center rounded-full text-gray-400 hover:text-gray-600 focus:outline-none">
                        <span class="sr-only">Open options</span>
                        <font-awesome-icon icon="fa-solid fa-ellipsis-vertical" class="h-6 w-6" />
                    </MenuButton>
                </div>

                <transition enter-active-class="transition ease-out duration-100"
                    enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100"
                    leave-active-class="transition ease-in duration-75"
                    leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                    <MenuItems
                        class="absolute right-0 z-10 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <div class="py-1 text-sm">
                            <MenuItem v-slot="{ active }" v-if="bed.status == 'free'">
                            <a href="javascript:void(0)" @click.prevent="assignBed(bed)"
                                :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                <font-awesome-icon icon="fa-solid fa-user-plus"
                                    class="mr-3 h-5 w-5 text-purple-500 group-hover:text-purple-500" />
                                Assign to Patient
                            </a>
                            </MenuItem>
                            <MenuItem v-slot="{ active }">
                            <a href="javascript:void(0)" @click.prevent="editData(bed)"
                                :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                <font-awesome-icon icon="fa-solid fa-pen-to-square"
                                    class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500" />
                                Edit
                            </a>
                            </MenuItem>
                            <MenuItem v-slot="{ active }">
                            <a href="javascript:void(0)" @click.prevent="editData(bed)"
                                :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                <font-awesome-icon icon="fa-solid fa-eye"
                                    class="mr-3 h-5 w-5 text-sky-500 group-hover:text-sky-500" />
                                Details
                            </a>
                            </MenuItem>
                            <MenuItem v-slot="{ active }">
                            <a href="javascript:void(0)" @click.prevent="deleteData(bed.id)"
                                :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                <font-awesome-icon icon="fa-solid fa-trash-can"
                                    class="mr-3 h-5 w-5 text-red-500 group-hover:text-red-500" />
                                Delete
                            </a>
                            </MenuItem>
                        </div>
                    </MenuItems>
                </transition>
            </Menu>
        </div>
        <h2 class="my-1 font-bold text-lg tracking-tight text-gray-900 ">Bed Number: {{ bed.number }}</h2>
        <template v-if="bed.status == 'alloted'">
            <p v-if="bed.bed && bed.bed.patient && bed.bed_allotment.patient.user">
                Patient: <b>{{ bed?.bed_allotment?.patient?.user?.name ?? 'N/A' }}</b>
            </p>
            <p v-if="bed.bed_allotment && bed.bed_allotment.allotment_time">
                Allotment Time: <b>{{ formateDate(bed?.bed_allotment?.allotment_time, 'MMMM D, YYYY HH:mm') }}</b>
            </p>
            <p v-if="bed.bed_allotment && bed.bed_allotment.discharge_time">
                Discharge Time: <b>{{ formateDate(bed?.bed_allotment?.discharge_time, 'MMMM D, YYYY HH:mm') }}</b>
            </p>
        </template>

        <span v-if="bed.status == 'free'"
            class="text-xs font-semibold px-2 py-1 rounded bg-green-100 text-green-800   capitalize">
            Available
        </span>

        <div v-if="showDetails" data-popover id="popover-user-profile" role="tooltip"
            class="top-0 -right-72 absolute z-10  inline-block w-64 text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-400 rounded-lg shadow-xl  dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
            <div class="p-3">
                <p class="text-base font-semibold leading-none text-gray-900 dark:text-white">
                    Patient: Ariful Islam Arif
                </p>
                <p class="text-base font-semibold leading-none text-gray-900 dark:text-white">
                    Consultant: Ariful Islam Arif
                </p>
                <p class="text-base font-semibold leading-none text-gray-900 dark:text-white">
                    Bed No: 896
                </p>
                <p class="text-base font-semibold leading-none text-gray-900 dark:text-white">
                    Bed No: 896
                </p>
                <!-- <p class="mb-3 text-sm font-normal">
                </p>
                <p class="mb-4 text-sm font-light">Open-source contributor. Building <a href="#"
                        class="text-blue-600 dark:text-blue-500 hover:underline">flowbite.com</a>.</p>
                <ul class="flex text-sm font-light">
                    <li class="mr-2">
                        <a href="#" class="hover:underline">
                            <span class="font-semibold text-gray-900 dark:text-white">799</span>
                            <span>Following</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">
                            <span class="font-semibold text-gray-900 dark:text-white">3,758</span>
                            <span>Followers</span>
                        </a>
                    </li>
                </ul> -->
            </div>
            <!-- <div data-popper-arrow class="absolute"></div> -->
        </div>
    </span>
</template>

<div class="bed_detail_popover" style="display: none">
    Bed No. : TF - 107<br>Patient Id : 13<br>Admission Date : 02/07/2022 05:00 PM<br>Phone : 876645456<br>Gender : Female<br>Guardian Name : Martin Jobs<br>Consultant : Amit  Singh                                    </div>

<script>
import AllotedBedIcon from "@/Shared/Icons/AllotedBedIcon.vue";
import AvailableBedIcon from "@/Shared/Icons/AvailableBedIcon.vue";

export default {
    props:{
        bed: {
            type: Object,
            required: true
        }
    },
    components:{
        AllotedBedIcon,
        AvailableBedIcon
    },
    data() {
        return {
            showDetails: false
        }
    },
}
</script>

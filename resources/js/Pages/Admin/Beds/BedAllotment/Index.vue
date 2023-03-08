<template>
    <AppLayout title="Bed Allocation">

        <!-- Header Part  -->
        <Breadcrumb>
            <BreadcrumbLink title="Bed Allocation"/>
        </Breadcrumb>

        <div class="flex justify-between">
            <h2 class="text-3xl font-semibold leading-7 text-gray-900  sm:text-3xl sm:truncate">
                {{ __('Bed Allocation') }}
            </h2>
            <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                <Menu as="div" class="relative inline-block text-left">
                    <div>
                        <MenuButton class="flex items-center rounded-lg text-gray-400 hover:text-gray-600 focus:outline-none">
                            <span class="sr-only">Open options</span>
                            <button href="javascript:void(0)" class="w-1/2 text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto focus:outline-none">
                                <svg class="mr-2 h-6 w-6" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                Export
                            </button>
                        </MenuButton>
                    </div>

                    <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                        <MenuItems class="absolute right-0 z-10 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <div class="py-1 text-sm">
                            <MenuItem v-slot="{ active }">
                                <a href="javascript:void(0)" @click.prevent="editData(department)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                    <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                                    As PDF
                                </a>
                            </MenuItem>
                            <MenuItem v-slot="{ active }">
                                <a href="javascript:void(0)" @click.prevent="editData(department)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                    <font-awesome-icon icon="fa-solid fa-trash-can" class="h-4 w-4 mr-2 "/>
                                    As Excel
                                </a>
                            </MenuItem>
                            <MenuItem v-slot="{ active }">
                                <a href="javascript:void(0)" @click.prevent="editData(department)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                    <font-awesome-icon icon="fa-solid fa-trash-can" class="h-4 w-4 mr-2 "/>
                                    As CSV
                                </a>
                            </MenuItem>
                            </div>
                        </MenuItems>
                    </transition>
                </Menu>
                <BaseButton @click="showCreateDrawer = true" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2.5">
                    <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                   {{ __('Add Bed Assign') }}
                </BaseButton>
            </div>

        </div>
        <div>
             <span class="mr-5"><AllotedBedIcon class="h-12 w-12 inline"/> = Alloted</span>
             <span><FreeBedIcon class="h-12 w-12 inline"/> = Free</span>
        </div>

        <div class="mt-5">
            <span v-for="(bed_floors, i) in beds" :key="i" class="mb-3 block p-4 bg-gray-100 rounded-lg border">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900  mb-3">{{ getBedFloor(i).name }}</h2>

                <div v-for="(bed_types, j) in bed_floors" :key="j" class="mb-2 block p-4 bg-white rounded-lg border border-gray-200">
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900 ">{{ getBedType(j).name }}</h2>

                    <div class="grid gap-6 md:grid-cols-3 xl:grid-cols-5 mt-2">
                        <span v-for="(bed, k) in bed_types" :key="k" class="cursor-pointer block p-3 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100">
                            <div class="flex flex-wrap justify-between items-start">
                                <AllotedBedIcon v-if="bed.status == 'alloted'" class="h-12 w-12"/>
                                <FreeBedIcon v-else class="h-12 w-12"/>

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
                                            <MenuItem v-slot="{ active }" v-if="bed.status == 'free'">
                                                <a href="javascript:void(0)" @click.prevent="assignBed(bed)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                    <font-awesome-icon icon="fa-solid fa-user-plus" class="mr-3 h-5 w-5 text-purple-500 group-hover:text-purple-500"/>
                                                    Assign to Patient
                                                </a>
                                            </MenuItem>
                                            <MenuItem v-slot="{ active }">
                                                <a href="javascript:void(0)" @click.prevent="editData(bed)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                    <font-awesome-icon icon="fa-solid fa-pen-to-square" class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500"/>
                                                    Edit
                                                </a>
                                            </MenuItem>
                                            <MenuItem v-slot="{ active }">
                                                <a href="javascript:void(0)" @click.prevent="editData(bed)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                    <font-awesome-icon icon="fa-solid fa-eye" class="mr-3 h-5 w-5 text-sky-500 group-hover:text-sky-500"/>
                                                    Details
                                                </a>
                                            </MenuItem>
                                            <MenuItem v-slot="{ active }">
                                                <a href="javascript:void(0)" @click.prevent="deleteData(bed.id)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                    <font-awesome-icon icon="fa-solid fa-trash-can" class="mr-3 h-5 w-5 text-red-500 group-hover:text-red-500"/>
                                                    Delete
                                                </a>
                                            </MenuItem>
                                            </div>
                                        </MenuItems>
                                    </transition>
                                </Menu>
                            </div>
                            <h2 class="my-1 font-bold text-lg tracking-tight text-gray-900 ">Bed Number: {{ bed.number }}</h2>
                            <template v-if="bed.status == 'alloted'" >
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





                            <span v-if="bed.status == 'free'" class="text-xs font-semibold px-2 py-1 rounded bg-green-100 text-green-800   capitalize">
                               Available
                            </span>
                        </span>
                    </div>
                </div>
            </span>
        </div>

        <CreateBedAllotment :show="showCreateDrawer" @close-drawer="showCreateDrawer = false" :doctors="doctors" :bed_id="bed_id"/>
        <EditBedAllotment :show="showEditDrawer && editBedAllotment" @close-drawer="showEditDrawer = false" :bed="editBedAllotment" :doctors="doctors"/>
    </AppLayout>
</template>

<script>
    import CreateBedAllotment from "./Create.vue";
    import EditBedAllotment from "./Edit.vue";
    import CardSkeleton from "@/Shared/Skeleton/CardSkeleton.vue";
    import AllotedBedIcon from "@/Shared/Icons/AllotedBedIcon.vue";
    import FreeBedIcon from "@/Shared/Icons/FreeBedIcon.vue";
    import { library } from '@fortawesome/fontawesome-svg-core'
    import { faUserPlus } from '@fortawesome/free-solid-svg-icons'
    library.add(faUserPlus)

    export default {
        components: {
            CreateBedAllotment,
            EditBedAllotment,
            CardSkeleton,
            AllotedBedIcon,
            FreeBedIcon,
            faUserPlus,
        },
        props: {
            beds:{
                type: Array,
                default: () => []
            },
            types:{
                type: Array,
                default: () => []
            },
            floors: {
                type: Array,
                default: () => []
            },
            doctors: {
                type: Array,
                default: () => []
            },
        },
        data() {
            return {
                showCreateDrawer: false,
                showEditDrawer: false,
                editBedAllotment: '',
                bed_id: '',

                beds: this.beds,

                showFilter: false,
                loading: false,
            }
        },
        methods: {
            deleteData(id) {
                this.$swal({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.$inertia.delete(route("admin.bed.destroy", id));
                    }
                });
            },
            editData(bed){
                // alert()
                // console.log(bed)
                this.editBedAllotment = bed
                this.showEditDrawer = true
            },
            toggleFilter() {
                this.showFilter = !this.showFilter;
                localStorage.setItem("adminBed", this.showFilter);
            },
            assignBed(bed){
                if(bed.status == 'free'){
                    this.bed_id = bed.id
                    this.showCreateDrawer = true
                }
            },
            getBedType(id){
                return this.types.find(type => type.id == id)
            },
            getBedFloor(id){
                return this.floors.find(floor => floor.id == id)
            },
        },
        created() {
            this.showFilter = localStorage.getItem("adminBed") == "true" ? true: false;
        },
    };
</script>

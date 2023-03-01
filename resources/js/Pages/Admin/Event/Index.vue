<template>
    <AppLayout title="Event">

        <!-- Header Part  -->
        <Breadcrumb>
            <BreadcrumbLink title="Event"/>
        </Breadcrumb>

        <div class="mb-4 flex justify-between">
            <h2 class="text-3xl font-semibold leading-7 text-gray-900  sm:text-3xl sm:truncate">
                {{ __('Event') }}
            </h2>

            <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                <BaseButton @click="changeViewType" class="text-whittext-gray-900 bg-white border border-gray-300 hover:bg-gray-100 px-3 py-2">
                    <template v-if="viewType == 'card'">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon mr-2 flex-shrink-0 h-6 w-6" viewBox="0 0 512 512"><title>Calendar Number</title><rect x="48" y="80" width="416" height="384" rx="48" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M128 48v32M384 48v32M464 160H48M304 260l43.42-32H352v168M191.87 306.63c9.11 0 25.79-4.28 36.72-15.47a37.9 37.9 0 0011.13-27.26c0-26.12-22.59-39.9-47.89-39.9-21.4 0-33.52 11.61-37.85 18.93M149 374.16c4.88 8.27 19.71 25.84 43.88 25.84 28.59 0 52.12-15.94 52.12-43.82 0-12.62-3.66-24-11.58-32.07-12.36-12.64-31.25-17.48-41.55-17.48"/></svg>
                        Calendar View
                    </template>
                    <template v-else>
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon mr-2 flex-shrink-0 h-6 w-6" viewBox="0 0 512 512"><title>Albums</title><rect x="64" y="176" width="384" height="256" rx="28.87" ry="28.87" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M144 80h224M112 128h288"/></svg>
                        Card View
                    </template>
                </BaseButton>
                <BaseButton @click="showCreateDrawer = true" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2.5">
                    <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                   {{ __('Add Event') }}
                </BaseButton>
            </div>
        </div>

        <!-- Body Part  -->
       <CardSkeleton :show="loading" v-if="loading"/>

       <template v-else-if="!loading && events && events.length && viewType == 'card'">
           <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
               <span v-for="event in events" :key="event.id" class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100   ">
                   <div class="flex flex-wrap justify-between items-start">
                    <h2 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">{{ event.title }}</h2>

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
                                       <a href="javascript:void(0)" @click.prevent="editData(event)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                           <font-awesome-icon icon="fa-solid fa-pen-to-square" class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500"/>
                                           Edit
                                       </a>
                                   </MenuItem>
                                   <MenuItem v-slot="{ active }">
                                       <a href="javascript:void(0)" @click.prevent="editData()" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                           <font-awesome-icon icon="fa-solid fa-eye" class="mr-3 h-5 w-5 text-sky-500 group-hover:text-sky-500"/>
                                           Details
                                       </a>
                                   </MenuItem>
                                   <MenuItem v-slot="{ active }">
                                       <a href="javascript:void(0)" @click.prevent="deleteData(event.id)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                           <font-awesome-icon icon="fa-solid fa-trash-can" class="mr-3 h-5 w-5 text-red-500 group-hover:text-red-500"/>
                                           Delete
                                       </a>
                                   </MenuItem>
                                   </div>
                               </MenuItems>
                           </transition>
                       </Menu>
                   </div>
                   <p class="mb-3 font-normal text-gray-700 ">
                       {{ event.format_start_date }} - {{ event.format_end_date }}
                   </p>
                   <h2 class="mb-2 text-2xl font-bold tracking-tight text-blue-600 ">{{ event.days }} Days</h2>
               </span>
           </div>
       </template>
       <template v-else-if="!loading && events && events.length && viewType == 'calendar'">
            <div class="mb-4 bg-white rounded-lg shadow-xs  items-center p-4">
                <FullCalendar :options="calendarOptions" />
            </div>
       </template>

       <NothingFound v-else>
            <BaseButton @click="showCreateDrawer = true" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2">
                <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                {{ __('Add Event') }}
            </BaseButton>
       </NothingFound>


       <CreateEvent :show="showCreateDrawer" @close-drawer="showCreateDrawer = false, calendar.start = null, calendar.end = null" :calendar="calendar"/>
       <EditEvent :show="showEditDrawer" @close-drawer="showEditDrawer = false" :event="editEvent"/>
    </AppLayout>
</template>

<script>
import CreateEvent from "./Create.vue";
import EditEvent from "./Edit.vue";
import CardSkeleton from "@/Shared/Skeleton/CardSkeleton.vue";

import '@fullcalendar/core/vdom'
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import listPlugin from '@fullcalendar/list'
import interactionPlugin from '@fullcalendar/interaction'

export default {
    components: {
        CreateEvent,
        EditEvent,
        CardSkeleton,
        FullCalendar
    },
    props: {
        events:{
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
            showCreateDrawer: false,
            showEditDrawer: false,
            editEvent: '',

            loading: false,

            viewType: 'calendar',

            calendarOptions: {
                plugins: [dayGridPlugin, interactionPlugin, listPlugin],
                initialView: "dayGridMonth",
                height: 800,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek,listMonth'
                },
                events: this.events,
                selectable: true,
                editable: true,
                eventClick: this.eventClick,
                select: this.selectCalendar,
                eventResize: this.eventResized,
                eventDrop: this.eventDropped,
            },

            filterForm: this.$inertia.form({
                keyword: this.filter.keyword,
            }),

            form: this.$inertia.form({
                id: '',
                start: '',
                end: '',
                type: 'api',
            }),

            calendar: this.$inertia.form({
                start: '',
                end: '',
            }),
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
                    this.$inertia.delete(route("admin.event.destroy", id));
                }
            });
        },
        editData(event){
            console.log(event);
            this.showEditDrawer = true
            this.editEvent = event
        },
        filterData(){
            this.loading = true
            this.filterForm.get(route('admin.event.index'), {
                onSuccess: () => {
                    this.loading = false
                },
                onError: () => {
                    this.loading = false
                    alert('Something went wrong')
                },
            })
        },
        changeViewType() {
            if (this.viewType == 'card') {
                this.viewType = 'calendar'
            }else{
                this.viewType = 'card'
            }
        },
        eventDropped(arg){
            let event = arg.event

            this.form.id = event.id
            this.form.title = event.title
            this.form.start = event.startStr
            this.form.end = event.endStr || event.startStr
            this.updateData()
        },
        eventResized(arg){
            let event = arg.event

            this.form.id = event.id
            this.form.title = event.title
            this.form.start = event.startStr
            this.form.end = event.endStr || event.startStr
            this.updateData()
        },
        selectCalendar(arg){
            this.calendar.start = arg.startStr
            this.calendar.end = arg.endStr
            this.showCreateDrawer = true
        },
        eventClick(arg){
            let event = arg.event

            this.editEvent = {
                id: event.id,
                title: event.title,
                start: event.startStr,
                end: event.endStr,
                color: event.color,
            }

            this.showEditDrawer = true
        },
        async updateData(){
            let response = await axios.put(route('admin.event.update', this.form.id), this.form)
            console.log(response)
        }
    }
};
</script>

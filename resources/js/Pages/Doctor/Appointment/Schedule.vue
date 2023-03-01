<template>
    <AppLayout title="Appointment Schedule">

        <!-- Header Part  -->
        <nav class="flex mb-2" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="#" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
                        <font-awesome-icon icon="fa-solid fa-home" class="w-4.5 h-4.5 mr-2.5" />
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <font-awesome-icon icon="fa-solid fa-chevron-right" class="w-3 h-3 text-gray-400" />
                        <a href="#"
                            class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">Appointment
                            Schedule</a>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="mb-4 flex justify-between">
            <h2 class="text-3xl font-semibold leading-7 text-gray-900  sm:text-3xl sm:truncate">
                {{ __('Appointment Schedule') }}
            </h2>
        </div>

        <div class="bg-white rounded-lg border border-gray-200 shadow-md     focus:outline-none mb-5">
            <div id="accordion-color" data-active-classes="bg-blue-100  text-blue-600 ">
                <div class="mx-auto max-w-7xl px-6 mt-5">
                    <template v-for="schedule in schedules" :key="schedule.id" >
                        <SingleSchedule :schedule="schedule" :diff_times="diff_times"/>
                    </template>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
    import CardSkeleton from "@/Shared/Skeleton/CardSkeleton.vue";
    import SingleSchedule from "./SingleSchedule.vue"

    export default {
        components: {
            CardSkeleton,
            SingleSchedule,
        },
        props: {
            schedules: {
                type: Array,
                default: () => []
            },
            diff_times: {
                type: Array,
                default: () => []
            }
        },
        created() {

        },
    };
</script>

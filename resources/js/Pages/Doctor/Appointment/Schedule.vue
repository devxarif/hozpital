<template>
    <AppLayout title="Appointment Schedule">

        <!-- Header Part  -->
        <Breadcrumb>
            <BreadcrumbLink title="Appointment Schedule"/>
        </Breadcrumb>

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

<template>

    <Head title="Dashboard" />

    <AppLayout title="Announcement">
        <AdminDashboard v-if="role == 'admin'"/>
        <OwnerDashboard v-else-if="role == 'owner'"/>
        <EmployeeDashboard v-else/>
    </AppLayout>
</template>

<script>
    import LanguageSelector from '@/Shared/Partials/LanguageSelector.vue'
    import BarChart from "@/Shared/Chart/BarChart.vue";
    import PieChart from "@/Shared/Chart/PieChart.vue";
    import AdminDashboard from "@/Shared/Admin/Dashboard.vue";
    import OwnerDashboard from "@/Shared/Organization/Dashboard.vue";
    import EmployeeDashboard from "@/Shared/Employee/Dashboard.vue";

    export default {
        components: {
            LanguageSelector,
            BarChart,
            PieChart,
            AdminDashboard,
            OwnerDashboard,
            EmployeeDashboard
        },
        data(){
            return {
                role: this.$page.props.authenticatedUser.role,
            }
        }
    }
</script>

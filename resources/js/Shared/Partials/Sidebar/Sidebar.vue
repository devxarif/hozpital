<template>
    <div class="hidden lg:fixed lg:inset-y-0 lg:flex lg:w-64 lg:flex-col">
        <div class="flex flex-grow flex-col overflow-y-auto bg-gray-800 pt-5 pb-4">
            <AdminSidebar v-if="role == 'admin'"/>
            <DoctorSidebar v-else-if="role == 'doctor'"/>
            <PatientSidebar v-else-if="role == 'patient'"/>
            <NurseSidebar v-else-if="role == 'nurse'"/>
            <AccountantSidebar v-else-if="role == 'accountant'"/>
            <ReceptionistSidebar v-else-if="role == 'receptionist'"/>
            <PharmacistSidebar v-else-if="role == 'pharmacist'"/>
            <LaboratoristSidebar v-else-if="role == 'laboratorist'"/>
        </div>
    </div>
    <!-- <div class="hidden lg:fixed lg:inset-y-0 lg:flex lg:w-64 lg:flex-col" v-if="!showSidebar">
        <div class="flex flex-grow flex-col overflow-y-auto bg-gray-800 pt-5 pb-4">
            <AdminSidebar v-if="role == 'admin'"/>
            <DoctorSidebar v-else-if="role == 'doctor'"/>
            <PatientSidebar v-else-if="role == 'patient'"/>
            <NurseSidebar v-else-if="role == 'nurse'"/>
            <AccountantSidebar v-else-if="role == 'accountant'"/>
            <ReceptionistSidebar v-else-if="role == 'receptionist'"/>
            <PharmacistSidebar v-else-if="role == 'pharmacist'"/>
            <LaboratoristSidebar v-else-if="role == 'laboratorist'"/>
        </div>
    </div> -->
</template>

<script>
import AdminSidebar from "./AdminSidebar.vue"
import DoctorSidebar from "./DoctorSidebar.vue"
import PatientSidebar from "./PatientSidebar.vue"
import NurseSidebar from "./NurseSidebar.vue"
import AccountantSidebar from "./AccountantSidebar.vue"
import ReceptionistSidebar from "./ReceptionistSidebar.vue"
import PharmacistSidebar from "./PharmacistSidebar.vue"
import LaboratoristSidebar from "./LaboratoristSidebar.vue"

export default {
    components: {
        AdminSidebar,
        DoctorSidebar,
        PatientSidebar,
        NurseSidebar,
        AccountantSidebar,
        ReceptionistSidebar,
        PharmacistSidebar,
        LaboratoristSidebar,
    },
    props:{
        showSidebar:{
            type: Boolean,
            default: true,
        }
    },
    data(){
        return {
            role: this.$page.props.authenticatedUser.role,
        }
    },
    mounted(){
        console.log(this.showSidebar)
    }
}
</script>

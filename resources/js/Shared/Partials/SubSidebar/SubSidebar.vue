<template>
    <AdminSubSidebar v-if="role == 'admin'"/>
    <OrganizationSubSidebar v-else-if="role == 'owner'"/>
    <EmployeeSubSidebar v-else/>
</template>

<script>
import AdminSubSidebar from "./AdminSubSidebar.vue"
import OrganizationSubSidebar from "./OrganizationSubSidebar.vue"
import EmployeeSubSidebar from "./EmployeeSubSidebar.vue"

export default {
    components: {
        AdminSubSidebar,
        OrganizationSubSidebar,
        EmployeeSubSidebar
    },
    data(){
        return {
            role: this.$page.props.authenticatedUser.role,
        }
    }
}
</script>

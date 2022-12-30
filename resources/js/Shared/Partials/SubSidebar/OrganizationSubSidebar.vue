<template>
    <aside class="w-60 overflow-y-auto bg-white lg:block h-screen border-r-2">
        <div class="pb-4 text-gray-500 dark:text-gray-400">
            <ul class="mt-2">
                <SubNavItem title="Department" :active="true" :href="route('organization.departments.index')"/>
                <SubNavItem title="Designation" href="#"/>
                <SubNavItem title="Organization 3" href="#"/>
            </ul>
        </div>
    </aside>
</template>


<script>
import SubNavItem from "@/Shared/Partials/SubNavItem.vue"

export default {
    components: {
        SubNavItem,
    },
    data(){
        return {

        }
    },
    methods:{
        // checkLinkActive (routes){
        //     return routes.includes(this.$page.component);
        // }
    }
}
</script>

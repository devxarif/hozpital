<template>
    <aside class="w-60 overflow-y-auto bg-white lg:block h-screen border-r-2">
        <div class="pb-4 text-gray-500 dark:text-gray-400">
            <ul class="mt-2">
                <!-- {{ $page.url }} -->
                <template v-if="$page.component == 'Dashboard'">
                    <SubNavItem title="Admin Dashboard" :active="true"/>
                    <SubNavItem title="Admin Dashboard 2"/>
                    <SubNavItem title="Admin Dashboard 3"/>

                </template>
                <template v-if="$page.component == 'Admin/Plan/Index'">
                    <SubNavItem title="Admin Plan"/>
                    <SubNavItem title="Admin Plan 2"/>
                    <SubNavItem title="Admin Plan 3"/>
                </template>
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

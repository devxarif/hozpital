<template>
    <aside class="w-60 overflow-y-auto bg-white lg:block h-screen border-r-2">
        <div class="pb-4 text-gray-500 dark:text-gray-400">
            <ul class="mt-2">
                <!-- <a href="#" class="relative text-blue-500 group flex items-center pl-6 my-2 text-lg font-bold">
                    <span class="absolute left-0 w-1 bg-blue-500 rounded-tr-xl h-6"></span>
                    Employee
                </a>
                <a href="#" class="text-gray-400 group flex items-center pl-6 text-lg font-medium hover:text-gray-900 my-2">
                    Jobs
                </a> -->
                <!-- <SubNavItem title="Employee" :active="true"/>
                <SubNavItem title="Employee 2"/>
                <SubNavItem title="Employee 3"/> -->
                <SubNavItem title="Employee" :active="true"/>
                <SubNavItem title="Employee 2"/>
                <SubNavItem title="Employee 3"/>
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

<template>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <h1>Sample Layout</h1>

        <div class="flex flex-col flex-1 w-full">
            <h1>Sample Layout</h1>
            <main class="h-full overflow-y-auto">
               <slot/>
            </main>
        </div>
    </div>
</template>

<script>
import Header from "../Partials/Header.vue";
import Sidebar from "../Partials/Sidebar/Sidebar.vue";

export default {
    components: {
        Header,
        Sidebar
    },
    data() {
        return {
        };
    },
    methods: {
    },
}
</script>

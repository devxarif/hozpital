<template>
    <SettingLayout title="Payment">
        <!-- <div class="hidden sm:block mb-3">
            <div class="border-b-2 border-gray-200">
                <nav class="flex space-x-8" aria-label="Tabs">
                    <li @click="changeTab('section')" :class="['cursor-pointer group inline-flex items-center py-4 px-1 border-b-2 font-medium text-md', currentTab == 'section' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                        <span>Website Sections</span>
                    </li>
                    <li @click="changeTab('service')" :class="['cursor-pointer group inline-flex items-center py-4 px-1 border-b-2 font-medium text-md', currentTab == 'service' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                        <span>Services</span>
                    </li>
                    <li @click="changeTab('testimonial')" :class="['cursor-pointer group inline-flex items-center py-4 px-1 border-b-2 font-medium text-md', currentTab == 'testimonial' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                        <span>Testimonial</span>
                    </li>
                    <li @click="changeTab('partners')" :class="['cursor-pointer group inline-flex items-center py-4 px-1 border-b-2 font-medium text-md', currentTab == 'partners' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                        <span>Partners</span>
                    </li>
                    <li @click="changeTab('news')" :class="['cursor-pointer group inline-flex items-center py-4 px-1 border-b-2 font-medium text-md', currentTab == 'news' ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                        <span>News</span>
                    </li>
                </nav>
            </div>
        </div> -->
        <div class="hidden sm:block mb-3">
            <div class="border-b-2 border-gray-200">
                <nav class="flex space-x-8" aria-label="Tabs">
                    <li v-for="(website, index) in website_nav" :key="index" @click="changeTab(website.name)" :class="['cursor-pointer group inline-flex items-center py-4 px-1 border-b-2 font-medium text-md', currentTab == website.name ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                        <span>{{ __(website.title) }}</span>
                    </li>
                </nav>
            </div>
        </div>
        <template v-for="(website, index) in website_contents" :key="index">
            <div v-if="currentTab == website.name" class="col-span-8 bg-white w-full p-6 rounded-lg border border-gray-8 ">
                <component :is="website.component" :data="websiteData"/>
            </div>
        </template>
    </SettingLayout>
</template>

<script>
import SettingLayout from "@/Shared/Layout/Setting.vue";
import { UserIcon, UsersIcon } from '@heroicons/vue/24/outline'
import Service from './Service.vue';
// import Section from './Section.vue';

export default {
    components: {
        SettingLayout,
        UserIcon,
        UsersIcon,
    },
    data() {
        return {
            currentTab: "website_sections",
            websiteData: {},

            website_nav: [
                {
                    name: "website_sections",
                    title: "Website Sections",
                },
                {
                    name: "service",
                    title: "Services",
                },
                {
                    name: "testimonial",
                    title: "Testimonial",
                },
                {
                    name: "partners",
                    title: "Partners",
                },
                {
                    name: "news",
                    title: "News",
                },
            ],

            website_contents: [
                {
                    name: "website_sections",
                    title: "Website Sections",
                    component: Service,
                },
                {
                    name: "service",
                    title: "Services",
                     component: Service,
                },
                {
                    name: "testimonial",
                    title: "Testimonial",
                     component: Service,
                },
                {
                    name: "partners",
                    title: "Partners",
                     component: Service,
                },
                {
                    name: "news",
                    title: "News",
                     component: Service,
                }
            ],
        };
    },
    methods: {
        async changeTab(tab) {
            localStorage.setItem("websiteCurrentTab", tab);
            this.currentTab = tab;
            let response = await axios.get(
                route("admin.settings.payment.data", {
                    provider: tab,
                })
            );

            // this.websiteData = response.data;
        },
    },
    mounted() {
        let tab = localStorage.getItem("websiteCurrentTab") || "website_sections";
        this.currentTab = tab;
        // this.changeTab(tab);
    },
};
</script>

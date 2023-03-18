<template>
    <SettingLayout title="Social Login">
        <div class="hidden sm:block mb-3">
            <div class="border-b-2 border-gray-200">
                <nav class="flex space-x-8" aria-label="Tabs">
                    <li v-for="(social, index) in social_nav" :key="index" @click="changeTab(social.name)" :class="['cursor-pointer group inline-flex items-center py-4 px-1 border-b-2 font-medium text-md', currentTab == social.name ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                        <span>{{ __(social.title) }}</span>
                    </li>
                </nav>
            </div>
        </div>
        <template v-for="(social, index) in social_contents" :key="index">
            <div v-if="currentTab == social.name" class="col-span-8 bg-white w-full p-6 rounded-lg border border-gray-8 ">
                <component :is="social.component" :data="socialData"/>
            </div>
        </template>
    </SettingLayout>
</template>

<script>
import SettingLayout from "@/Shared/Layout/Setting.vue";
import { UserIcon, UsersIcon } from '@heroicons/vue/24/outline'
import Google from './SocialLogin/Google.vue';
import Facebook from './SocialLogin/Facebook.vue';
import Twitter from './SocialLogin/Twitter.vue';
import Linkedin from './SocialLogin/Linkedin.vue';

export default {
    components: {
        SettingLayout,
        UserIcon,
        UsersIcon,
        Google,
    },
    data() {
        return {
            currentTab: "google",
            socialData: {},

            social_nav: [
                {
                    name: "google",
                    title: "Google",
                },
                {
                    name: "facebook",
                    title: "Facebook",
                },
                {
                    name: "twitter",
                    title: "Twitter",
                },
                {
                    name: "linkedin",
                    title: "Linkedin",
                }
            ],

            social_contents: [
                {
                    name: "google",
                    title: "Google",
                    component: Google,
                },
                {
                    name: "facebook",
                    title: "Facebook",
                    component: Facebook,
                },
                {
                    name: "twitter",
                    title: "Twitter",
                    component: Twitter,
                },
                {
                    name: "linkedin",
                    title: "Linkedin",
                    component: Linkedin,
                },
            ],
        };
    },
    methods: {
        async changeTab(tab) {
            localStorage.setItem("currentSocialLoginTab", tab);
            this.currentTab = tab;
            let response = await axios.get(
                route("admin.settings.socialLogin.data", {
                    provider: tab,
                })
            );

            this.socialData = response.data;
        },
    },
    mounted() {
        let tab = localStorage.getItem("currentSocialLoginTab") || "google";
        this.currentTab = tab;
        this.changeTab(tab);
    },
};
</script>

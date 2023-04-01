<template>
    <AppLayout :title="title">
        <Breadcrumb>
            <BreadcrumbLink title="Patient"/>
        </Breadcrumb>

        <div class="mb-10 flex justify-between">
            <h2 class="text-3xl font-semibold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                {{ __(title) }}
            </h2>
        </div>

        <div class="grid grid-cols-12 gap-3">
            <ol v-if="sidebar" class="col-span-2 text-sm font-medium">
                <li class="mb-1" v-for="(sidebar, index) in sidebars" :key="index">
                    <template v-if="sidebar.route">
                        <Link :href="route(sidebar.route)" class="items-center p-2.5 flex bg-white border border-gray-200 rounded-lg" :class="route().current(sidebar.route) ? 'bg-blue-500 text-white shadow-sm':''">
                            <font-awesome-icon :icon="sidebar.icon" class="h-4 w-4 mr-2" :class="route().current(sidebar.route) ? 'bg-blue-500 text-white':''"/>
                            <span>{{ __(sidebar.title) }}</span>
                        </Link>
                    </template>
                    <template v-else>
                        <a :href="sidebar.link" target="_blank" class="items-center p-2.5 flex bg-white border border-gray-200 rounded-lg">
                            <font-awesome-icon :icon="sidebar.icon" class="h-4 w-4 mr-2"/>
                            <span>{{ __(sidebar.title) }}</span>
                        </a>
                    </template>
                </li>
            </ol>

            <div :class="sidebar ? 'col-span-10':'col-span-12'">
                <slot/>
            </div>
        </div>
    </AppLayout>
</template>

<!-- <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="296b26bf-fd4e-497a-b724-1f0d15271a4f";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script> -->

<script>
import { library } from '@fortawesome/fontawesome-svg-core'
import { faCog, faMoneyCheck, faEnvelope, faShieldHalved, faLanguage, faDollarSign, faScrewdriverWrench, faBell, faBars , faShuffle, faCookieBite, faMedal, faTasks, faRobot, faG, faUpload, faHistory, faInfo} from '@fortawesome/free-solid-svg-icons'
library.add(faCog, faMoneyCheck, faEnvelope, faShieldHalved, faLanguage, faDollarSign, faScrewdriverWrench, faBell, faBars, faShuffle, faCookieBite, faMedal, faTasks, faRobot, faG, faUpload, faHistory, faInfo)

export default {
    props:{
        title: {
            type: String,
            default: "General"
        },
        sidebar: {
            type: Boolean,
            default: true
        }
    },
    data() {
        return {
            sidebars: [
                {
                    title: 'Personal Information',
                    icon: 'fa-solid fa-cog',
                    route: 'user.profile.setting'
                },
                {
                    title: 'Security',
                    icon: 'fa-solid fa-lock',
                    route: 'user.profile.security'
                },
                {
                    title: 'Notification',
                    icon: 'fa-solid fa-bell',
                    route: 'admin.settings.general'
                },
                {
                    title: 'Social logins',
                    icon: 'fa-solid fa-bell',
                    route: 'admin.settings.general'
                },
                {
                    title: 'Account Activity',
                    icon: 'fa-solid fa-bars',
                    route: 'user.profile.security'
                },
                // {
                //     title: 'System',
                //     icon: 'fa-solid fa-screwdriver-wrench',
                //     route: 'admin.settings.system'
                // },
                // {
                //     title: 'Website CMS',
                //     icon: 'fa-solid fa-tasks',
                //     route: 'admin.settings.smtp'
                // },
                // {
                //     title: 'Payment',
                //     icon: 'fa-solid fa-money-check',
                //     route: 'admin.settings.payment'
                // },
                // {
                //     title: 'Email Template',
                //     icon: 'fa-solid fa-envelope',
                //     route: 'admin.settings.smtp'
                // },
                // {
                //     title: 'Notification Template',
                //     icon: 'fa-solid fa-bell',
                //     route: 'admin.settings.smtp'
                // },
                // {
                //     title: 'Menus & Pages',
                //     icon: 'fa-solid fa-bars',
                //     route: 'admin.settings.smtp'
                // },
                // {
                //     title: 'Custom CSS & JS',
                //     icon: 'fa-solid fa-shuffle',
                //     route: 'admin.settings.customCssJs'
                // },
                // {
                //     title: 'Cookies Alert',
                //     icon: 'fa-solid fa-cookie-bite',
                //     route: 'admin.settings.cookiesAlert'
                // },
                // {
                //     title: 'SEO',
                //     icon: 'fa-solid fa-medal',
                //     route: 'admin.settings.seo'
                // },
                // {
                //     title: 'Recaptcha',
                //     icon: 'fa-solid fa-robot',
                //     route: 'admin.settings.recaptcha'
                // },
                // {
                //     title: 'Social Login',
                //     icon: 'fa-solid fa-g',
                //     route: 'admin.settings.socialLogin'
                // },
                // {
                //     title: 'SMTP',
                //     icon: 'fa-solid fa-envelope',
                //     route: 'admin.settings.smtp'
                // },
                // {
                //     title: 'Roles & Permission',
                //     icon: 'fa-solid fa-shield-halved',
                //     route: 'admin.settings.roles.index'
                // },
                // {
                //     title: 'Language',
                //     icon: 'fa-solid fa-language',
                //     route: 'admin.settings.languages.index'
                // },
                // {
                //     title: 'Currency',
                //     icon: 'fa-solid fa-dollar-sign',
                //     route: 'admin.settings.roles.index'
                // },
                // {
                //     title: 'Log Viewer',
                //     icon: 'fa-solid fa-history',
                //     link: '/log-viewer'
                // },
                // {
                //     title: 'Upgrade System',
                //     icon: 'fa-solid fa-upload',
                //     route: 'admin.settings.roles.index'
                // },
                // {
                //     title: 'System Info',
                //     icon: 'fa-solid fa-info',
                //     route: 'admin.settings.systemInfo'
                // },
            ]
        };
    }
};
</script>

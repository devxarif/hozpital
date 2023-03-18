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
            <ol v-if="sidebar" class="col-span-2">
                <li class="mb-1" v-for="(sidebar, index) in sidebars" :key="index">
                    <Link :href="route(sidebar.route)" class="items-center p-3 flex bg-white border border-gray-200 rounded-lg shadow-sm" :class="route().current(sidebar.route) ? 'text-blue-500 font-bold':''">
                        <font-awesome-icon :icon="sidebar.icon" class="h-5 w-5 mr-2" :class="route().current(sidebar.route) ? 'text-blue-500':''"/>
                        <span>{{ __(sidebar.title) }}</span>
                    </Link>
                </li>
            </ol>

            <div :class="sidebar ? 'col-span-10':'col-span-12'">
                <slot/>
            </div>
        </div>
    </AppLayout>
</template>


<script>
import { library } from '@fortawesome/fontawesome-svg-core'
import { faCog, faMoneyCheck, faEnvelope, faShieldHalved, faLanguage, faDollarSign, faScrewdriverWrench, faBell, faBars , faShuffle, faCookieBite, faMedal, faTasks, faRobot, faG, faUpload} from '@fortawesome/free-solid-svg-icons'
library.add(faCog, faMoneyCheck, faEnvelope, faShieldHalved, faLanguage, faDollarSign, faScrewdriverWrench, faBell, faBars, faShuffle, faCookieBite, faMedal, faTasks, faRobot, faG, faUpload)

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
                    title: 'General',
                    icon: 'fa-solid fa-cog',
                    route: 'admin.settings.general'
                },
                {
                    title: 'System',
                    icon: 'fa-solid fa-screwdriver-wrench',
                    route: 'admin.settings.system'
                },
                {
                    title: 'Payment',
                    icon: 'fa-solid fa-money-check',
                    route: 'admin.settings.payment'
                },
                {
                    title: 'Email Template',
                    icon: 'fa-solid fa-envelope',
                    route: 'admin.settings.smtp'
                },
                {
                    title: 'Notification Template',
                    icon: 'fa-solid fa-bell',
                    route: 'admin.settings.smtp'
                },
                {
                    title: 'Menus & Pages',
                    icon: 'fa-solid fa-bars',
                    route: 'admin.settings.smtp'
                },
                {
                    title: 'Custom CSS & JS',
                    icon: 'fa-solid fa-shuffle',
                    route: 'admin.settings.smtp'
                },
                {
                    title: 'Cookies Alert',
                    icon: 'fa-solid fa-cookie-bite',
                    route: 'admin.settings.smtp'
                },
                {
                    title: 'SEO',
                    icon: 'fa-solid fa-medal',
                    route: 'admin.settings.smtp'
                },
                {
                    title: 'Website CMS',
                    icon: 'fa-solid fa-tasks',
                    route: 'admin.settings.smtp'
                },
                {
                    title: 'Recaptcha',
                    icon: 'fa-solid fa-robot',
                    route: 'admin.settings.recaptcha'
                },
                {
                    title: 'Social Login',
                    icon: 'fa-solid fa-g',
                    route: 'admin.settings.socialLogin'
                },
                {
                    title: 'SMTP',
                    icon: 'fa-solid fa-envelope',
                    route: 'admin.settings.smtp'
                },
                {
                    title: 'Roles & Permission',
                    icon: 'fa-solid fa-shield-halved',
                    route: 'admin.settings.roles.index'
                },
                {
                    title: 'Language',
                    icon: 'fa-solid fa-language',
                    route: 'admin.settings.languages.index'
                },
                {
                    title: 'Currency',
                    icon: 'fa-solid fa-dollar-sign',
                    route: 'admin.settings.roles.index'
                },
                {
                    title: 'Log',
                    icon: 'fa-solid fa-dollar-sign',
                    route: 'admin.settings.roles.index'
                },
                {
                    title: 'Upgrade System',
                    icon: 'fa-solid fa-upload',
                    route: 'admin.settings.roles.index'
                },
            ]
        };
    }
};
</script>

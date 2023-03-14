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
            <ol class="col-span-2">
                <li class="mb-1" v-for="(sidebar, index) in sidebars" :key="index">
                    <Link :href="route(sidebar.route)" class="items-center p-3 flex bg-white border border-gray-200 rounded-lg shadow-sm" :class="route().current(sidebar.route) ? 'text-blue-500 font-bold':''">
                        <font-awesome-icon :icon="sidebar.icon" class="h-5 w-5 mr-2" :class="route().current(sidebar.route) ? 'text-blue-500':''"/>
                        <span>{{ __(sidebar.title) }}</span>
                    </Link>
                </li>
            </ol>

            <div class="col-span-10">
                <slot/>
            </div>
        </div>
    </AppLayout>
</template>


<script>
import { library } from '@fortawesome/fontawesome-svg-core'
import { faCog, faMoneyCheck, faEnvelope, faShieldHalved } from '@fortawesome/free-solid-svg-icons'
library.add(faCog, faMoneyCheck, faEnvelope, faShieldHalved)

export default {
    props:{
        title: {
            type: String,
            default: "General"
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
                    title: 'Payment',
                    icon: 'fa-solid fa-money-check',
                    route: 'admin.settings.payment'
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
                }
            ]
        };
    }
};
</script>

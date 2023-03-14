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
                <li class="mb-1">
                    <Link :href="route('admin.settings.general')" class="items-center p-3 flex bg-white border border-gray-200 rounded-lg shadow-sm" :class="route().current('admin.settings.general') ? 'text-blue-500 font-bold':''">
                        <font-awesome-icon icon="fa-solid fa-cog" class="h-5 w-5 mr-2" :class="route().current('admin.settings.general') ? 'text-blue-500':''"/>
                        <span>General</span>
                    </Link>
                </li>
                <li class="mb-1">
                    <Link :href="route('admin.settings.payment')" class="items-center p-3 flex bg-white border border-gray-200 rounded-lg shadow-sm" :class="route().current('admin.settings.payment') ? 'text-blue-500 font-bold':''">
                        <font-awesome-icon icon="fa-solid fa-money-check" class="h-5 w-5 mr-2" :class="route().current('admin.settings.payment') ? 'text-blue-500':''"/>
                        <span>Payment</span>
                    </Link>
                </li>
                <li class="mb-1">
                    <Link :href="route('admin.settings.smtp')" class="items-center p-3 flex bg-white border border-gray-200 rounded-lg shadow-sm" :class="route().current('admin.settings.smtp') ? 'text-blue-500 font-bold':''">
                        <font-awesome-icon icon="fa-solid fa-envelope" class="h-5 w-5 mr-2" :class="route().current('admin.settings.smtp') ? 'text-blue-500':''"/>
                        <span>SMTP</span>
                    </Link>
                </li>
                <li class="mb-1">
                    <Link :href="route('admin.settings.roles.index')" class="items-center p-3 flex bg-white border border-gray-200 rounded-lg shadow-sm" :class="route().current('admin.settings.roles.index') ? 'text-blue-500 font-bold':''">
                        <font-awesome-icon icon="fa-solid fa-shield-halved" class="h-5 w-5 mr-2" :class="route().current('admin.settings.roles.index') ? 'text-blue-500':''"/>
                        <span>Roles & Permission</span>
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

        };
    },
    methods: {

    }
};
</script>

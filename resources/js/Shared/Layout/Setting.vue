<template>
    <AppLayout :title="title">
        <Breadcrumb>
            <BreadcrumbLink title="Patient"/>
        </Breadcrumb>

        <div class="mb-4 flex justify-between">
            <h2 class="text-3xl font-semibold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                General
            </h2>
        </div>
        <div class="hidden sm:block">
            <div class="border-b-2 border-gray-200">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <Link :href="route('admin.settings.general')" :class="['group inline-flex items-center py-4 px-1 border-b-2 font-medium text-md', route().current('admin.settings.general') ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                        <svg :class="route().current('admin.settings.general') ? 'text-blue-500':'text-gray-400 group-hover:text-gray-500'" class="-ml-0.5 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M7 8a3 3 0 100-6 3 3 0 000 6zM14.5 9a2.5 2.5 0 100-5 2.5 2.5 0 000 5zM1.615 16.428a1.224 1.224 0 01-.569-1.175 6.002 6.002 0 0111.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 017 18a9.953 9.953 0 01-5.385-1.572zM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 00-1.588-3.755 4.502 4.502 0 015.874 2.636.818.818 0 01-.36.98A7.465 7.465 0 0114.5 16z" />
                        </svg>
                        <span>General</span>
                    </Link>
                    <Link :href="route('admin.settings.payment')" :class="['group inline-flex items-center py-4 px-1 border-b-2 font-medium text-md', route().current('admin.settings.payment') ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                        <svg :class="route().current('admin.settings.payment') ? 'text-blue-500':'text-gray-400 group-hover:text-gray-500'" class="-ml-0.5 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M7 8a3 3 0 100-6 3 3 0 000 6zM14.5 9a2.5 2.5 0 100-5 2.5 2.5 0 000 5zM1.615 16.428a1.224 1.224 0 01-.569-1.175 6.002 6.002 0 0111.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 017 18a9.953 9.953 0 01-5.385-1.572zM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 00-1.588-3.755 4.502 4.502 0 015.874 2.636.818.818 0 01-.36.98A7.465 7.465 0 0114.5 16z" />
                        </svg>
                        <span>Payment</span>
                    </Link>
                    <Link :href="route('admin.settings.smtp')" :class="['group inline-flex items-center py-4 px-1 border-b-2 font-medium text-md', route().current('admin.settings.smtp') ? 'border-blue-500 text-blue-600':'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200' ]">
                        <svg :class="route().current('admin.settings.smtp') ? 'text-blue-500':'text-gray-400 group-hover:text-gray-500'" class="-ml-0.5 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M7 8a3 3 0 100-6 3 3 0 000 6zM14.5 9a2.5 2.5 0 100-5 2.5 2.5 0 000 5zM1.615 16.428a1.224 1.224 0 01-.569-1.175 6.002 6.002 0 0111.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 017 18a9.953 9.953 0 01-5.385-1.572zM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 00-1.588-3.755 4.502 4.502 0 015.874 2.636.818.818 0 01-.36.98A7.465 7.465 0 0114.5 16z" />
                        </svg>
                        <span>SMTP</span>
                    </Link>
                </nav>
            </div>
        </div>

        <slot/>
    </AppLayout>
</template>


<script>
export default {
    props:{
        title: {
            type: String,
            default: ""
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

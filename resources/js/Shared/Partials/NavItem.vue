<template>
    <!-- group flex items-center px-3 py-2 text-sm font-medium rounded-md text-slate-300 hover:bg-slate-700 hover:text-white -->
    <!-- <li class="relative px-6 py-2 hover:bg-blue-100 rounded-xl">
        <span v-if="active" class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg px-6"></span>
        <Link :href="href" :class="['inline-flex items-center w-full text-md font-bold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200', active ? 'dark:text-gray-100 text-gray-800':'']">
            <slot name="icon"/>
            <span class="ml-4">{{ title }}</span>
        </Link>
    </li> -->
    <!-- <li class="relative px-6 py-2 hover:bg-blue-100 rounded-xl">
        <span v-if="active" class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg px-6"></span>
        <Link :href="href" :class="['inline-flex items-center w-full text-md font-bold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200', active ? 'dark:text-gray-100 text-gray-800':'']">
            <slot name="icon"/>
            <span class="ml-4">{{ title }}</span>
        </Link>
    </li> -->

    <!-- <li :class="['relative px-6 py-2 rounded-full hover:bg-blue-100 hover:text-blue-500 dark:text-gray-500', active ? 'text-blue-500 bg-blue-100':'']">
        <span v-if="active" class="absolute inset-y-3 left-0 w-1 bg-blue-700 rounded-tr-lg"></span>
        <Link :href="href" :class="['inline-flex items-center w-full text-md transition-colors duration-150', active ? 'font-bold':'font-semibold']">
            <slot name="icon"/>
            <span class="ml-4">{{ title }}</span>
        </Link>
    </li> -->
    <!-- <Link :href="href" class="text-indigo-100 hover:bg-gray-900 hover:text-white group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium">
        <slot name="icon"/>
        <span class="mt-2">{{ title }}</span>
    </Link> -->

    <!-- active ? 'bg-blue-500':'' -->
    <Link :href="href" :class="['hover:text-white group p-3 rounded-md flex flex-col items-center font-medium', active ? 'bg-blue-500 text-white text-sm':'text-slate-400 text-xs']">
        <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
        stroke="currentColor" aria-hidden="true" class="text-indigo-200 group-hover:text-white h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25">
            </path>
        </svg> -->
        <slot name="icon"/>
        <span class="mt-2">{{ title }}</span>
    </Link>



    <!-- <Link :href="route('dashboard')" class="text-white hover:bg-blue-500 hover:text-white group p-3 rounded-md flex flex-col items-center text-sm font-medium bg-blue-500">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
        stroke="currentColor" aria-hidden="true" class="text-indigo-200 group-hover:text-white h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25">
            </path>
        </svg>
        <span class="mt-2">Dashboard</span>
    </Link>
    <Link :href="route('dashboard')" class="text-slate-400 hover:text-white group p-3 rounded-md flex flex-col items-center text-sm font-medium">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
        stroke="currentColor" aria-hidden="true" class="text-slate-400 group-hover:text-white h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25">
            </path>
        </svg>
        <span class="mt-2">Dashboard</span>
    </Link> -->

</template>

<script>
export default {
    props: {
        title: {
            type: String,
            required: true,
        },
        href: {
            type: String,
            required: true,
        },
        active:{
            type: Boolean,
            required: true,
        }
    }
};
</script>

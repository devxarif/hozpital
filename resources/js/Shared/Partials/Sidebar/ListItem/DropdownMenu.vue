<template>
    <div class="space-y-1">
        <button type="button" class="bg-slate-50 text-gray-900 group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium focus:outline-none" @click="open = !open">
            <slot name="icon"/>
            <span class="flex-1">{{ title }}</span>
            <div class="menu-arrow transform transition-all duration-300 rtl:rotate-180"><span>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" class="iconify iconify--heroicons-outline" :class="{ 'rotate-90': open, '': !(open) }"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5l7 7l-7 7"></path></svg>
            </span></div>
        </button>
        <transition
            enter-active-class="transition ease-out duration-5000"
            enter-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"

            leave-active-class="transition ease-in duration-75"
            leave-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
        >
            <div class="space-y-1" v-show="open">
                <slot/>

            </div>
        </transition>
    </div>
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
    },
    data(){
        return {
            open: false
        }
    },
}
</script>

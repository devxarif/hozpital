<template>
    <div class="space-y-1">
        <button type="button" :class="['group w-full flex items-center px-3 py-2.5 text-left text-sm font-medium focus:outline-none rounded-lg', active ? 'bg-blue-500 text-white':'text-gray-300 hover:bg-gray-700 hover:text-white']"
         @click="open = !open">
            <slot name="icon"/>
            <span class="flex-1">{{ title }}</span>
            <div class="menu-arrow transform transition-all duration-300 rtl:rotate-180"><span>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" class="iconify iconify--heroicons-outline" :class="{ 'rotate-90': open, '': !(open) }"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5l7 7l-7 7"></path></svg>
            </span></div>
        </button>
        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
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
            default: 'Title',
        },
        href: {
            type: String,
            default: '/',
        },
        active:{
            type: Boolean,
            default: false,
        },
        open:{
            type: Boolean,
            required: false,
        },
    },
    data(){
        return {
            open: this.active ?? false,
        }
    },
}
</script>

<template>
    <svg xmlns="http://www.w3.org/2000/svg" :class="[className, active ? 'text-white':'text-slate-400 group-hover:text-white']" :fill="fill" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><circle cx="136" cy="116" r="32" fill="none" :stroke="stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></circle><line x1="32" y1="108" x2="56" y2="108" fill="none" :stroke="stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line><line x1="32" y1="68" x2="56" y2="68" fill="none" :stroke="stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line><line x1="32" y1="148" x2="56" y2="148" fill="none" :stroke="stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line><line x1="32" y1="188" x2="56" y2="188" fill="none" :stroke="stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line><rect x="40" y="48" width="192" height="160" rx="8" transform="translate(264 -8) rotate(90)" fill="none" :stroke="stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></rect><path d="M92,167.2a60,60,0,0,1,88,0" fill="none" :stroke="stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path></svg>
</template>

<script>
export default {
   props: {
       fill: {
           type: String,
           default:"currentColor"
       },
       stroke: {
           type: String,
           default:"currentColor"
       },
       active:{
            type: Boolean,
            required: true,
        },
       className:{
           type: String,
           default: "w-6 h-6"
       }
   }
}
</script>

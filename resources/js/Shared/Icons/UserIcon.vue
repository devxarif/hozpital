<template>
    <svg xmlns="http://www.w3.org/2000/svg" :class="[className, active ? 'text-white':'text-slate-400 group-hover:text-white']" :fill="fill" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><circle cx="128" cy="96" r="64" fill="none" :stroke="stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></circle><path d="M31,216a112,112,0,0,1,194,0" fill="none" :stroke="stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path></svg>
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

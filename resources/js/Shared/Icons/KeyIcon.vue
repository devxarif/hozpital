<template>
    <svg xmlns="http://www.w3.org/2000/svg" :class="[className, active ? 'text-white':'text-slate-400 group-hover:text-white']" :fill="fill" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><path d="M93.2,122.8A70.3,70.3,0,0,1,88,96a72,72,0,1,1,72,72,70.3,70.3,0,0,1-26.8-5.2h0L120,176H96v24H72v24H32V184l61.2-61.2Z" fill="none" :stroke="stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path><circle cx="180" cy="76" r="16"></circle></svg>
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

<template>
    <svg xmlns="http://www.w3.org/2000/svg" :class="[className, active ? 'text-white':'text-slate-400 group-hover:text-white']" :fill="fill" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><rect x="40" y="88" width="176" height="128" rx="8" fill="none" :stroke="stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></rect><path d="M92,88V52a36,36,0,0,1,72,0V88" fill="none" :stroke="stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path><circle cx="128" cy="152" r="16"></circle></svg>
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

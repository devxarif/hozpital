<template>
    <div class="flex flex-shrink-0 items-center px-4">
       <Link :href="route('dashboard')">
            <img class="h-16 w-auto" :src="$page.props.setting.app_light_logo" alt="app_logo">
       </Link>
    </div>
</template>

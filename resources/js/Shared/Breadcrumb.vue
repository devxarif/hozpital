<template>
 <nav class="flex mb-2" >
        <ol class="inline-flex items-center space-x-1 md:space-x-2">
            <li class="inline-flex items-center">
                <Link :href="route('dashboard')" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
                    <font-awesome-icon icon="fa-solid fa-home" class="w-4.5 h-4.5 mr-2.5" />
                    Dashboard
                </Link>
            </li>
            <slot/>
        </ol>
    </nav>
</template>

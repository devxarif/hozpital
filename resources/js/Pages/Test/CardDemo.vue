<template>
      <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            <span v-for="i in 10" :key="i" class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="flex flex-wrap justify-between items-start">
                    <div class="relative mb-5"><span><img class="w-16 h-16 rounded object-cover"
                                alt="image" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                               ></span>
                    </div>

                    <div class="flex gap-2">
                        <button class="">
                            <font-awesome-icon icon="fa-solid fa-pen-to-square" class=" h-5 w-5 text-blue-500" />
                        </button>
                        <button class="">
                            <font-awesome-icon icon="fa-solid fa-eye" class=" h-5 w-5 text-pink-500"/>
                        </button>
                        <button type="submit">
                            <font-awesome-icon icon="fa-solid fa-trash-can" class=" h-5 w-5 text-red-500"/>
                        </button>
                    </div>
                    <span class="text-xs font-semibold mr-2 px-2.5 py-0.5 rounded bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900">Free</span>
                </div>
                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Tailwind CSS Figma</h2>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Use this free Figma design system with variants and auto-layout based on the utility classes from Tailwind CSS.</p>
            </span>
        </div>
</template>

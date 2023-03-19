<template>
   <div class="flex flex-col mb-5 shadow-lg">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="w-full divide-y divide-gray-300 table-fixed">
                        <thead class="bg-gray-200">
                            <slot name="head"/>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <slot name="body"/>
                        </tbody>
                    </table>

                    <Pagination :data="items" v-if="items && items.data.length && items.total > 20"/>
                </div>
            </div>
        </div>
    </div>
   <!-- <div class="flex flex-col mb-5 shadow-lg">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="w-full divide-y divide-gray-300 table-fixed">
                        <thead class="bg-gray-200">
                        <tr class="divide-x divide-gray-200">
                            <th class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                            <th class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Email</th>
                            <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 break-words">Phone</th>
                            <th width="80px" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-6">Action</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="accountant in accountants.data" :key="accountant.id" class="divide-x divide-gray-200">
                                <td class="py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                    <div class="flex items-center" v-if="accountant && accountant.user">
                                        <div class="h-10 w-10 flex-shrink-0">
                                            <img class="h-10 w-10 rounded-md" :src="accountant.user.avatar_url" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="font-medium text-gray-900">{{ accountant.user.name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4 text-sm text-gray-500 break-all">
                                    {{ accountant.user.email ?? 'No email entry' }}
                                </td>
                                <td class="p-4 text-sm text-gray-500 break-all">
                                    {{ accountant.user.phone ?? 'No phone entry'}}
                                </td>
                                <td class="py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-6">
                                    <Menu as="div" class="inline-block text-left">
                                        <div>
                                            <MenuButton class="flex items-center rounded-full text-gray-400 hover:text-gray-600 focus:outline-none">
                                                <span class="sr-only">Open options</span>
                                                <font-awesome-icon icon="fa-solid fa-ellipsis-vertical" class="h-6 w-6"/>
                                            </MenuButton>
                                        </div>

                                        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                            <MenuItems class="absolute right-0 z-10 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                                <div class="py-1 text-sm">
                                                <MenuItem v-slot="{ active }">
                                                    <a href="javascript:void(0)" @click.prevent="editData(accountant)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                        <font-awesome-icon icon="fa-solid fa-pen-to-square" class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500"/>
                                                        Edit
                                                    </a>
                                                </MenuItem>
                                                <MenuItem v-slot="{ active }">
                                                    <a href="javascript:void(0)" @click.prevent="editData(accountant)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                        <font-awesome-icon icon="fa-solid fa-eye" class="mr-3 h-5 w-5 text-sky-500 group-hover:text-sky-500"/>
                                                        Details
                                                    </a>
                                                </MenuItem>
                                                <MenuItem v-slot="{ active }">
                                                    <a href="javascript:void(0)" @click.prevent="deleteData(accountant.id)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                        <font-awesome-icon icon="fa-solid fa-trash-can" class="mr-3 h-5 w-5 text-red-500 group-hover:text-red-500"/>
                                                        Delete
                                                    </a>
                                                </MenuItem>
                                                </div>
                                            </MenuItems>
                                        </transition>
                                    </Menu>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> -->
</template>

<script>
export default {
    props: {
        items: {
            type: Array,
            required: false
        }
    }
}
</script>

<style>

</style>

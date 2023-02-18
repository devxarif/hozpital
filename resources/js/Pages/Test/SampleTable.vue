<template>

    <div class="flex flex-col mb-5"
        v-else-if="!loading && departments && departments.data.length && viewType == 'table'">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr class="divide-x divide-gray-200">
                                <th class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name
                                </th>
                                <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Description</th>
                                <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                                <th class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-6">Role
                                </th>
                                <th class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-6">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr class="divide-x divide-gray-200" v-for="i in 20" :key="i">
                                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0">
                                            <img class="h-10 w-10 rounded-md"
                                                src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="font-medium text-gray-900">Lindsay Walton</div>
                                            <div class="text-gray-500">lindsay.walton@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap p-4 text-sm text-gray-500">Front-end Developer</td>
                                <td class="whitespace-nowrap p-4 text-sm text-gray-500">lindsay.walton@example.com</td>
                                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-6">Member</td>
                                <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-6">
                                    <Menu as="div" class="relative inline-block text-left">
                                        <div>
                                            <MenuButton
                                                class="flex items-center rounded-full text-gray-400 hover:text-gray-600 focus:outline-none">
                                                <span class="sr-only">Open options</span>
                                                <font-awesome-icon icon="fa-solid fa-ellipsis-vertical"
                                                    class="h-6 w-6" />
                                            </MenuButton>
                                        </div>

                                        <transition enter-active-class="transition ease-out duration-100"
                                            enter-from-class="transform opacity-0 scale-95"
                                            enter-to-class="transform opacity-100 scale-100"
                                            leave-active-class="transition ease-in duration-75"
                                            leave-from-class="transform opacity-100 scale-100"
                                            leave-to-class="transform opacity-0 scale-95">
                                            <MenuItems
                                                class="absolute right-0 z-10 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                                <div class="py-1 text-sm">
                                                    <MenuItem v-slot="{ active }">
                                                    <a href="javascript:void(0)" @click.prevent="editData(department)"
                                                        :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                        <font-awesome-icon icon="fa-solid fa-pen-to-square"
                                                            class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500" />
                                                        Edit
                                                    </a>
                                                    </MenuItem>
                                                    <MenuItem v-slot="{ active }">
                                                    <a href="javascript:void(0)" @click.prevent="editData(department)"
                                                        :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                        <font-awesome-icon icon="fa-solid fa-eye"
                                                            class="mr-3 h-5 w-5 text-sky-500 group-hover:text-sky-500" />
                                                        Details
                                                    </a>
                                                    </MenuItem>
                                                    <MenuItem v-slot="{ active }">
                                                    <a href="javascript:void(0)"
                                                        @click.prevent="deleteData(department.id)"
                                                        :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                        <font-awesome-icon icon="fa-solid fa-trash-can"
                                                            class="mr-3 h-5 w-5 text-red-500 group-hover:text-red-500" />
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
                    <Pagination :data="departments"
                        v-if="departments && departments.data.length && departments.total > 20" class="mt-5" />
                </div>
            </div>
        </div>
    </div>













    <div class="flex flex-col mb-5 shadow-lg" v-else-if="!loading && departments && departments.data.length && viewType == 'table'">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="w-full divide-y divide-gray-300 table-fixed">
                            <thead class="bg-gray-50">
                            <tr class="divide-x divide-gray-200">
                                <th class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                                <th class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900 break-words">Description</th>
                                <th width="80px" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-6">Action</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr class="divide-x divide-gray-200" v-for="i in 20" :key="i">
                                    <td class="py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img class="h-10 w-10 rounded-md" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="font-medium text-gray-900">Lindsay Walton</div>
                                                <div class="text-gray-500">lindsay.walton@example.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-4 text-sm text-gray-500 break-all">
                                    <span> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam hic voluptas voluptates sed laboriosam? Qui, doloribus eum nobis suscipit blanditiis voluptatibus quas quis cumque quisquam itaque, vel, dolorum quaerat maxime.</span>
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
                                                        <a href="javascript:void(0)" @click.prevent="editData(department)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                            <font-awesome-icon icon="fa-solid fa-pen-to-square" class="mr-3 h-5 w-5 text-blue-500 group-hover:text-blue-500"/>
                                                            Edit
                                                        </a>
                                                    </MenuItem>
                                                    <MenuItem v-slot="{ active }">
                                                        <a href="javascript:void(0)" @click.prevent="editData(department)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
                                                            <font-awesome-icon icon="fa-solid fa-eye" class="mr-3 h-5 w-5 text-sky-500 group-hover:text-sky-500"/>
                                                            Details
                                                        </a>
                                                    </MenuItem>
                                                    <MenuItem v-slot="{ active }">
                                                        <a href="javascript:void(0)" @click.prevent="deleteData(department.id)" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'group flex items-center px-4 py-2']">
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
                        <Pagination :data="departments" v-if="departments && departments.data.length && departments.total > 20" class="mt-5"/>
                    </div>
                </div>
            </div>
        </div>










</template>

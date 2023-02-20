<template>
        <transition enter-active-class="transition ease-out duration-200" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-200" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 xl:grid-cols-6 gap-5 mb-4 bg-white rounded-lg shadow-xs  items-center p-4">
                <div class="relative h-15">
                    <input id="itmName" name="itmName" type="text"
                        class="peer rounded-lg  pt-[21px] px-3 pb-[6px] w-full border text-dark placeholder-transparent focus:outline-none      border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500    "
                        placeholder="Employee Name">
                    <label for="itmName"
                        class="absolute left-3 top-1 opacity-100 text-xs transition-all peer-placeholder-shown:text-base peer-placeholder-shown:opacity-[0.4] peer-placeholder-shown:top-3 peer-focus:top-1 peer-focus:opacity-100 peer-focus:text-xs  text-gray-900 ">Search</label>
                </div>
                <div class="relative h-15">
                    <label class="absolute font-light text-xs px-3 top-1 text-gray-900 ">Role</label>
                    <select
                        class="rounded-lg form-select  appearance-none shadow-transparent focus:outline-none focus:shadow-transparent outline-none w-full pt-5 pb-2 px-3     border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500    ">
                        <option value="">Select Role</option>
                        <option value="">Employee</option>
                        <option value="1">Manager</option>
                    </select>
                </div>
                <div>
                    <div class="flex items-center justify-center ">
                        <div class="datepicker relative w-full h-[50px]">
                            <input type="text"
                                class="block w-full !h-full inputStyle form-icon-trailing    border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500    "
                                placeholder="From">

                            <button id="datepicker-toggle-682660" type="button" class="datepicker-toggle-button"
                                data-mdb-toggle="datepicker">
                                <i class="far fa-calendar datepicker-toggle-icon"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="button" class="text-white bg-blue-600 hover:bg-blue-700 font-medium inline-flex items-center justify-center rounded-lg text-sm px-6 py-4 text-center sm:w-auto focus:outline-none">
                        <font-awesome-icon icon="fa-solid fa-plus" class="h-4 w-4 mr-2"/>
                       {{ __('Search') }}
                    </button>
                </div>
            </div>
        </transition>
</template>

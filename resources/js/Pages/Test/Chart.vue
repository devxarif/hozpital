<template>
    <AppLayout>
        <h1>Role Permission</h1>

        <div class="mb-4">
            <Label :name="__('Calendar Color')" id="leave_type_color"/>

            <div class="ml-3 mt-5">
                <div class="flex items-center">
                    <input type="text" class="bg-gray-50 border text-md rounded-lg block w-1/2 p-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="color">

                    <div class="relative ml-3">
                        <button type="button" @click="isOpen = !isOpen"
                            class="w-10 h-10 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow"
                            :style="`background: ${color}; color: white`"
                        >
                            <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M15.584 10.001L13.998 8.417 5.903 16.512 5.374 18.626 7.488 18.097z"/><path d="M4.03,15.758l-1,4c-0.086,0.341,0.015,0.701,0.263,0.949C3.482,20.896,3.738,21,4,21c0.081,0,0.162-0.01,0.242-0.03l4-1 c0.176-0.044,0.337-0.135,0.465-0.263l8.292-8.292l1.294,1.292l1.414-1.414l-1.294-1.292L21,7.414 c0.378-0.378,0.586-0.88,0.586-1.414S21.378,4.964,21,4.586L19.414,3c-0.756-0.756-2.072-0.756-2.828,0l-2.589,2.589l-1.298-1.296 l-1.414,1.414l1.298,1.296l-8.29,8.29C4.165,15.421,4.074,15.582,4.03,15.758z M5.903,16.512l8.095-8.095l1.586,1.584 l-8.096,8.096l-2.114,0.529L5.903,16.512z"/></svg>
                        </button>

                        <div v-if="isOpen" class="origin-top-right absolute right-16 mt-2 w-40 rounded-md shadow-lg">
                            <div class="rounded-md bg-white shadow-xs px-4 py-3">
                                <div class="flex flex-wrap -mx-2">
                                    <ColorPicker
                                    theme="dark"
                                    :color="color"
                                    :sucker-hide="true"
                                    :sucker-canvas="suckerCanvas"
                                    :sucker-area="suckerArea"
                                    @changeColor="changeColor"
                                    @openSucker="openSucker"
                                />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="mb-5">
            <div class="flex items-center">
                <div>
                    <label for="colorSelected" class="block font-bold mb-1">Select Color</label>
                    <input id="colorSelected" type="text" placeholder="Pick a color"
                        class="border border-transparent shadow px-4 py-2 leading-normal text-gray-700 bg-white rounded-md focus:outline-none focus:shadow-outline" :value="color">
                </div>
                <div class="relative ml-3 mt-8">
                    <button type="button" @click="isOpen = !isOpen"
                        class="w-10 h-10 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow"
                        :style="`background: ${color}; color: white`"
                    >
                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M15.584 10.001L13.998 8.417 5.903 16.512 5.374 18.626 7.488 18.097z"/><path d="M4.03,15.758l-1,4c-0.086,0.341,0.015,0.701,0.263,0.949C3.482,20.896,3.738,21,4,21c0.081,0,0.162-0.01,0.242-0.03l4-1 c0.176-0.044,0.337-0.135,0.465-0.263l8.292-8.292l1.294,1.292l1.414-1.414l-1.294-1.292L21,7.414 c0.378-0.378,0.586-0.88,0.586-1.414S21.378,4.964,21,4.586L19.414,3c-0.756-0.756-2.072-0.756-2.828,0l-2.589,2.589l-1.298-1.296 l-1.414,1.414l1.298,1.296l-8.29,8.29C4.165,15.421,4.074,15.582,4.03,15.758z M5.903,16.512l8.095-8.095l1.586,1.584 l-8.096,8.096l-2.114,0.529L5.903,16.512z"/></svg>
                    </button>

                    <div v-if="isOpen" class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg">
                        <div class="rounded-md bg-white shadow-xs px-4 py-3">
                            <div class="flex flex-wrap -mx-2">
                                <ColorPicker
                                theme="dark"
                                :color="color"
                                :sucker-hide="true"
                                :sucker-canvas="suckerCanvas"
                                :sucker-area="suckerArea"
                                @changeColor="changeColor"
                                @openSucker="openSucker"
                            />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- <div class="mb-5">
            <div class="flex items-center">
                <div>
                    <label for="colorSelected" class="block font-bold mb-1">Select Color</label>
                    <input id="colorSelected" type="text" placeholder="Pick a color"
                        class="border border-transparent shadow px-4 py-2 leading-normal text-gray-700 bg-white rounded-md focus:outline-none focus:shadow-outline" :value="color">
                </div>
                <div class="relative ml-3 mt-8">
                    <button type="button" @click="isOpen = !isOpen"
                        class="w-10 h-10 rounded-full focus:outline-none focus:shadow-outline inline-flex p-2 shadow"
                        :style="`background: ${color}; color: white`"
                    >
                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M15.584 10.001L13.998 8.417 5.903 16.512 5.374 18.626 7.488 18.097z"/><path d="M4.03,15.758l-1,4c-0.086,0.341,0.015,0.701,0.263,0.949C3.482,20.896,3.738,21,4,21c0.081,0,0.162-0.01,0.242-0.03l4-1 c0.176-0.044,0.337-0.135,0.465-0.263l8.292-8.292l1.294,1.292l1.414-1.414l-1.294-1.292L21,7.414 c0.378-0.378,0.586-0.88,0.586-1.414S21.378,4.964,21,4.586L19.414,3c-0.756-0.756-2.072-0.756-2.828,0l-2.589,2.589l-1.298-1.296 l-1.414,1.414l1.298,1.296l-8.29,8.29C4.165,15.421,4.074,15.582,4.03,15.758z M5.903,16.512l8.095-8.095l1.586,1.584 l-8.096,8.096l-2.114,0.529L5.903,16.512z"/></svg>
                    </button>

                    <div v-if="isOpen" class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg">
                        <div class="rounded-md bg-white shadow-xs px-4 py-3">
                            <div class="flex flex-wrap -mx-2">
                                <ColorPicker
                                theme="dark"
                                :color="color"
                                :sucker-hide="true"
                                :sucker-canvas="suckerCanvas"
                                :sucker-area="suckerArea"
                                @changeColor="changeColor"
                                @openSucker="openSucker"
                            />
                            <template v-for="(color, index) in colors" :key="index">
                                <div
                                    class="px-2"
                                >
                                    <template v-if="colorSelected === color">
                                        <div
                                            class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white"
                                            :style="`background: ${color}; box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.2);`"
                                        ></div>
                                    </template>

                                    <template v-if="colorSelected != color">
                                        <div
                                            @click="colorSelected = color"
                                            @keydown.enter="colorSelected = color"
                                            role="checkbox"
                                              tabindex="0"
                                              :aria-checked="colorSelected"
                                            class="w-8 h-8 inline-flex rounded-full cursor-pointer border-4 border-white focus:outline-none focus:shadow-outline"
                                            :style="`background: ${color};`"
                                        ></div>
                                    </template>
                                </div>
                            </template>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

    <!-- <div class="flex flex-wrap items-stretch w-full mb-4 relative">
        <input type="text" class="flex-shrink flex-grow  leading-normal w-px flex-1 border h-10 border-grey-light rounded rounded-r-none px-3 relative" placeholder="Recipient's username" :value="color">
        <div class="flex -mr-px">
            <span class="flex items-center leading-normal bg-grey-lighter rounded rounded-l-none border border-l-0 border-grey-light px-3 whitespace-no-wrap text-grey-dark text-sm" :style="{background: color}">Color</span>
        </div>
       <div class="absolute top-10 right-0">
            <ColorPicker
                theme="dark"
                :color="color"
                :sucker-hide="true"
                :sucker-canvas="suckerCanvas"
                :sucker-area="suckerArea"
                @changeColor="changeColor"
                @openSucker="openSucker"
            />
       </div>
    </div> -->

            <span :style="{background: color}">Current Color</span>




        <!-- <h1>Role Permission</h1>
        <span v-can="'user.list'" class="bg-blue-400 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">View User List</span> |
        <span v-can="'user.create'" class="bg-blue-400 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">Create User</span> |
        <span v-can="'user.delete'" class="bg-blue-400 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">Delete User</span> -->

        <div class="grid grid-cols-2 gap-4 mt-5">
            <div class="block p-6 rounded-lg shadow-lg bg-white">
                <h2 class="text-gray-900 text-3xl leading-tight font-medium mb-2">Bar Chart</h2>
                <BarChart/>
            </div>
            <div class="block p-6 rounded-lg shadow-lg bg-white">
                <h2 class="text-gray-900 text-3xl leading-tight font-medium mb-2">Pie Chart</h2>
                <PieChart/>
            </div>
        </div>
    </AppLayout>
</template>


<script>
    // import VueApexCharts from "vue3-apexcharts";
    import BarChart from "@/Shared/Chart/BarChart.vue";
    import PieChart from "@/Shared/Chart/PieChart.vue";


import { ColorPicker } from 'vue-color-kit'
  import 'vue-color-kit/dist/vue-color-kit.css'
    export default {
        components: {
            // apexchart: VueApexCharts,
            BarChart,
            PieChart,


            ColorPicker
        },
        data() {
            return {
                color: '#59c7f9',
                suckerCanvas: null,
                suckerArea: [],
                isSucking: false,



                isOpen: false,
				colors: ['#2196F3', '#009688', '#9C27B0', '#FFEB3B', '#afbbc9', '#4CAF50', '#2d3748', '#f56565', '#ed64a6'],
				colorSelected: '#2196F3'



            };
        },
        methods: {
            changeColor(color) {
                this.color = color.hex
                // const { r, g, b, a } = color.rgba
                // this.color = `rgba(${r}, ${g}, ${b}, ${a})`
            },
            openSucker(isOpen) {
                if (isOpen) {
                // ... canvas be created
                // this.suckerCanvas = canvas
                // this.suckerArea = [x1, y1, x2, y2]
                } else {
                // this.suckerCanvas && this.suckerCanvas.remove
                }
            },
        }
    };
</script>

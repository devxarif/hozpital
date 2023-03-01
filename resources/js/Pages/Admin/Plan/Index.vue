<template>
    <AppLayout title="Plan">

        <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
            <div class="mb-1 w-full">
                <div class="mb-4">
                    <nav class="flex mb-5" >
                        <ol class="inline-flex items-center space-x-1 md:space-x-2">
                            <li class="inline-flex items-center">
                                <a href="#" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
                                    <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                        </path>
                                    </svg>
                                    Home
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <a href="#"
                                        class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">Users</a>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-gray-400 ml-1 md:ml-2 text-sm font-medium"
                                        aria-current="page">List</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                    <h2 class="text-3xl font-semibold leading-7 text-gray-900  sm:text-3xl sm:truncate">
                        {{ __('Plan') }}
                    </h2>
                </div>
                <div class="sm:flex">
                    <div class="hidden sm:flex items-center sm:divide-x sm:divide-gray-100 mb-3 sm:mb-0">
                        <form class="lg:pr-3" action="#" method="GET">
                            <label for="users-search" class="sr-only">Search</label>
                            <div class="mt-1 relative lg:w-64 xl:w-96">
                                <input type="text" name="email" id="users-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                                    placeholder="Search for users">
                            </div>
                        </form>
                        <div class="flex space-x-1 pl-0 sm:pl-2 mt-3 sm:mt-0">
                            <a href="#"
                                class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href="#"
                                class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href="#"
                                class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href="#"
                                class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                        <button type="button" data-modal-toggle="add-user-modal"
                            class="w-1/2 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium inline-flex items-center justify-center rounded-full text-sm px-3 py-2 text-center sm:w-auto">
                            <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Add user
                        </button>
                        <a href="#"
                            class="w-1/2 text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-blue-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                            <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Export
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="align-middle inline-block min-w-full">
                    <div class="shadow overflow-hidden">
                        <table class="table-fixed min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                                class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-blue-200 h-4 w-4 rounded">
                                            <label for="checkbox-all" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                        Name
                                    </th>
                                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                        Position
                                    </th>
                                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                        Country
                                    </th>
                                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                        Status
                                    </th>
                                    <th scope="col" class="p-4">
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="hover:bg-gray-100">
                                    <td class="p-4 w-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-1" aria-describedby="checkbox-1" type="checkbox"
                                                class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-blue-200 h-4 w-4 rounded">
                                            <label for="checkbox-1" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="p-4 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                                        <img class="h-10 w-10 rounded-full"
                                            src="https://demo.themesberg.com/windster/images/users/neil-sims.png"
                                            alt="Neil Sims avatar">
                                        <div class="text-sm font-normal text-gray-500">
                                            <div class="text-base font-semibold text-gray-900">Neil Sims</div>
                                            <div class="text-sm font-normal text-gray-500">neil.sims@windster.com</div>
                                        </div>
                                    </td>
                                    <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">Front-end
                                        developer</td>
                                    <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">United States
                                    </td>
                                    <td class="p-4 whitespace-nowrap text-base font-normal text-gray-900">
                                        <div class="flex items-center">
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Active
                                        </div>
                                    </td>
                                    <td class="p-4 whitespace-nowrap space-x-2">
                                        <button type="button" data-modal-toggle="user-modal"
                                            class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium rounded-full text-sm inline-flex items-center px-6 py-4 text-center">
                                            <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Edit user
                                        </button>
                                        <button type="button" data-modal-toggle="delete-user-modal"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm inline-flex items-center px-4 py-4 text-center">
                                            <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Delete user
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="page-header mb-[1.875rem]">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-3xl font-semibold leading-7 text-gray-900  sm:text-3xl sm:truncate">
                        {{ __('Plan') }}
                    </h2>
                </div>
                <div class="flex items-center">
                    <div class="view-icons mr-[10px]">
                        <a href="employees.html" class="bg-white inline-block min-w-[40px] text-center text-lg border border-[#e3e3e3] p-1 mr-[5px] text-[#333333]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" version="1.2">
                            <path
                                d="M9 2H4c-1.103 0-2 .896-2 2v5c0 1.104.897 2 2 2h5c1.103 0 2-.896 2-2V4c0-1.104-.897-2-2-2zm0 7H4V4h5v5zm11-7h-5a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h5a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm0 7h-5V4h5v5zM9 13H4c-1.103 0-2 .896-2 2v5c0 1.104.897 2 2 2h5c1.103 0 2-.896 2-2v-5c0-1.104-.897-2-2-2zm0 7H4v-5h5v5zm11-7h-5a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h5a2 2 0 0 0 2-2v-5a2 2 0 0 0-2-2zm0 7h-5v-5h5v5z" />
                            </svg>
                        </a>
                        <a href="employees-list.html"
                            class="bg-white inline-block min-w-[40px] text-center text-lg border border-[#e3e3e3] p-1 mr-[5px] text-[#666666]">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M3,8H21a1,1,0,0,0,0-2H3A1,1,0,0,0,3,8Zm18,8H3a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Zm0-5H3a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Z" />
                            </svg>
                        </a>
                    </div>
                    <a @click="showCreateDrawer = true" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent font-medium text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition sm:text-sm rounded-full"
                        href="#">
                        <span class="mr-3">
                            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em"
                                xmlns="http://www.w3.org/2000/svg">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </span>
                        {{ __('Add Plan') }}
                    </a>
                </div>
            </div>
        </div> -->

        <div class="lg:grid lg:grid-cols-4 sm:gap-6 xl:gap-10 lg:space-y-0 mt-10">
            <div class="flex flex-col mx-auto relative overflow-hidden p-4 w-full max-w-sm bg-white rounded-lg border shadow-md  " v-for="plan in plans" :key="plan.id">
                <h5 class="mb-4 text-xl font-medium text-gray-500 ">
                    {{ plan.name }}
                    <span v-if="plan.default"
                        class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-blue-600 rounded-full">{{ __('Default') }}</span>
                </h5>

                <div class="flex items-baseline text-gray-900 ">
                    <span class="text-3xl font-semibold">{{ $page.props.setting.app_currency_symbol }}</span>
                    <span class="text-5xl font-extrabold tracking-tight">{{ plan.price }}</span>
                    <span class="ml-1 text-xl font-normal text-gray-500 ">
                        <template v-if="plan.interval != 'custom_days'">
                            /{{ plan.interval }}
                        </template>
                        <template v-else>
                            /{{ plan.custom_interval_days }} {{ __('Days') }}
                        </template>
                    </span>
                </div>

                <ul role="list" class="my-7 space-y-5">
                    <Feature name="Unlimited Employees" :checked="!plan.plan_features.is_limited_employee" />
                    <Feature name="Max Employees" :checked="true"
                        :value="plan.plan_features.is_limited_employee ? plan.plan_features.max_employees : '∞'" />
                    <Feature name="Max Teams" :checked="true" :value="plan.plan_features.max_teams" />
                    <Feature name="Max Leave Types" :checked="true" :value="plan.plan_features.max_leave_types" />
                    <Feature name="Custom Theme Look" :checked="plan.plan_features.custom_theme_look" />
                </ul>
                <div class="flex gap-2">
                    <button @click="editData(plan)" type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">
                        {{ __('Edit') }}
                    </button>
                    <button @click="deleteData(plan.id)" :disabled="plan.default" type="button" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">
                        {{ __('Delete') }}
                    </button>
                </div>
                <!-- <div class=" d-flex justify-content-between">
                    <Link :href="route('plans.edit', plan.id)" class="btn btn-primary">
                    <i class="fas fa-edit"></i>
                    {{ __('Edit') }}
                    </Link>
                    <button @click="deleteData(plan.id)" class="btn btn-danger w-100-p" v-if="!plan.default">
                        <i class="fas fa-trash"></i>
                        {{ __('Delete') }}
                    </button>
                </div> -->
            </div>
        </div>

        <CreatePlan :show="showCreateDrawer" @close-drawer="showCreateDrawer = false"/>
        <EditPlan :show="showEditPlan" @close-drawer="showEditPlan = false" :plan="editPlan"/>
    </AppLayout>
</template>

<script>
    import Feature from "@/Shared/Admin/Plan/Feature.vue";
    import CreatePlan from "./Create.vue";
    import EditPlan from "./Edit.vue";

    export default {
        components: {
            Feature,
            CreatePlan,
            EditPlan,
        },
        props: {
            plans: {
                type: Array,
                required: true,
            },
        },
        data() {
            return {
                showCreateDrawer: false,
                showEditPlan: false,
                editPlan: '',

                default_plan_id: 1,
            }
        },
        methods: {
            deleteData(id) {
                this.$swal({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.$inertia.delete(route("plans.destroy", id));
                    }
                });
            },
            editData(plan){
                this.showEditPlan = true
                this.editPlan = plan
            }
        },
        mounted() {
            this.checkPagePermission('admin')

            this.plans.find((plan) => {
                if (plan.default) {
                    this.default_plan_id = plan.id;
                }
            });
        },
    };
</script>

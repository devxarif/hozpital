<template>
    <SettingLayout title="Languages">
        <div class="grid gap-6 md:grid-cols-1 xl:grid-cols-1">
            <div class="bg-white w-full p-6 rounded-lg border border-gray-8  ">
                <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                    <div class="space-y-6 sm:space-y-5">
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">User Login Activity</h2>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed publicly so be careful what you share.</p>

                        <div class="sm:border-t sm:border-gray-200 sm:pt-5">
                            <BaseTable :items="activities" v-if="activities && activities.data.length" >
                                <template v-slot:head>
                                    <tr class="divide-x divide-gray-200">
                                        <th class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">User</th>
                                        <th class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Login At</th>
                                        <th class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">User Agent</th>
                                        <th width="150px" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6">Login Type</th>
                                    </tr>
                                </template>
                                <template v-slot:body>
                                    <tr v-for="activity in activities.data" :key="activity.id" class="divide-x divide-gray-200">
                                        <td class="p-4 text-sm text-gray-500 break-all">
                                            <div class="flex items-center" v-if="activity && activity.user">
                                                <div class="h-10 w-10 flex-shrink-0">
                                                    <img class="h-10 w-10 rounded-md" :src="activity.user.avatar_url" alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="font-medium text-gray-900">{{ activity.user.name }}</div>
                                                    <div class="text-sm text-gray-500">{{ activity.user.email }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 text-sm text-gray-500 break-all">
                                            {{ formatTime(activity.created_at) }}
                                        </td>
                                        <td class="p-4 text-sm text-gray-500 break-all">
                                            <span class="block"><b>Device:</b> {{ activity.device }}</span>
                                            <span class="block"><b>Platform:</b> {{ activity.platform }}</span>
                                            <span class="block"><b>Browser:</b> {{ activity.location }}</span>
                                            <span class="block"><b>Location:</b> {{ activity.device }}</span>
                                        </td>
                                        <td class="p-4 text-sm text-gray-500 break-all capitalize">
                                            {{ activity.login_type }}
                                        </td>
                                    </tr>
                                </template>
                            </BaseTable>
                            <NothingFound v-else message="No user login activity found"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </SettingLayout>
</template>

<script>
import SettingLayout from "@/Shared/Layout/Setting.vue";

export default {
    components: {
        SettingLayout,
    },
    props: {
        activities: Array,
    },
    data() {
        return {

        };
    },
    methods: {

    },
};
</script>

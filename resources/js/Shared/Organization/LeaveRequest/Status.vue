<template>
    <!-- <button v-if="leaveRequest.status == 'pending' || leaveRequest.status == 'rejected'" @click="statusChange('approved')" v-tooltip="__('Accept Request')" class="btn btn-sm">
        <CheckIcon/>
    </button>
    <button v-if="leaveRequest.status == 'pending' || leaveRequest.status == 'approved'" @click="statusChange('rejected')" v-tooltip="__('Reject Request')" class="btn btn-sm ">
        <CrossIcon/>
    </button>
    <button v-if="leaveRequest.status == 'pending'" @click="editData(leaveRequest.id)" v-tooltip="__('Edit')" class="btn btn-sm">
        <EditIcon/>
    </button> -->
    <!-- {{ loading }} -->
    <button v-if="leaveRequest.status == 'pending' || leaveRequest.status == 'rejected'"
        @click="statusChange('approved')" type="button"
        class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2">
        <LoadingIcon v-if="loading && loading == 'approved'"/>
        <p class="text-center inline-flex items-center" v-else>
            <svg class="mr-1 w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                <rect width="256" height="256" fill="none" />
                <polyline fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"
                    points="216 72.005 104 184 48 128.005" /></svg>
            Approve
        </p>
    </button>
    <button v-if="leaveRequest.status == 'pending' || leaveRequest.status == 'approved'"
        @click="statusChange('rejected')" type="button"
        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm text-center inline-flex items-center px-5 py-2.5">
        <LoadingIcon v-if="loading && loading == 'rejected'"/>
        <p class="text-center inline-flex items-center" v-else>
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="mr-1 w-5 h-5 bi bi-x-lg" viewBox="0 0 16 16">
            <path
                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
            </svg>
            Reject
        </p>
    </button>
</template>

<script>
    export default {
        props: {
            leaveRequest: {
                type: Object,
                required: true,
            },
        },
        data(){
            return {
                loading: '',
            }
        },
        methods: {
            statusChange(status) {
                if(!this.loading){
                    this.loading = status
                    this.$inertia.post(route("organization.leaveRequests.status"), {
                        id: this.leaveRequest.id,
                        status: status,
                    },{
                        onSuccess: () => {
                            this.loading = ""
                        }
                    });
                }
            },
            editData(leaveRequestId) {
                this.$inertia.get(
                    route("organization.leaveRequests.edit", leaveRequestId)
                );
            }
        },
    };
</script>

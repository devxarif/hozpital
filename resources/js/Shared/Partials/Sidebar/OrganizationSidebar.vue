<template>
    <div class="hidden w-30 overflow-y-auto bg-slate-700 md:block">
        <div class="flex w-full flex-col items-center py-6">
            <div class="flex flex-shrink-0 items-center">
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=white" alt="Your Company">
            </div>
            <div class="mt-6 w-full flex-1 space-y-1 px-2">
                <div class="w-full flex-1 space-y-1 px-2">
                    <NavItem title="Dashboard" :href="route('dashboard')" :active="checkLinkActive('Dashboard')">
                    <template v-slot:icon>
                        <svg class="w-6 h-6" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </template>
                </NavItem>
                <NavItem title="Organization" :href="route('organization.employees.index')" component="Dashboard">
                    <template v-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><title>ic24-company</title><g fill="currentColor"><path fill-rule="evenodd" d="M11 2a3 3 0 0 1 3 3v1.17c.313-.11.65-.17 1-.17h4a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V5a3 3 0 0 1 3-3h6zm0 2H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h7V5a1 1 0 0 0-1-1zm8 4h-4a1 1 0 0 0-1 1v11h5a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1zM9 14a1 1 0 0 1 0 2H7a1 1 0 0 1 0-2h2zm9 0a1 1 0 0 1 0 2h-2a1 1 0 0 1 0-2h2zm-9-4a1 1 0 0 1 0 2H7a1 1 0 0 1 0-2h2zm9 0a1 1 0 0 1 0 2h-2a1 1 0 0 1 0-2h2zM9 6a1 1 0 1 1 0 2H7a1 1 0 1 1 0-2h2z"></path></g></svg>
                        <!-- <HomeIcon :active="checkLinkActive('Employee/Leave/Index')"/> -->
                    </template>
                </NavItem>
                <NavItem title="Reports" :href="route('organization.reports.index')" :active="checkLinkActive(['Organization/Reports/Index','Organization/Reports/EmployeeLeaveBalance','Organization/Reports/EmployeeLeaveHistory','Organization/Reports/TeamLeaveBalance','Organization/Reports/TeamLeaveHistory'])">
                    <template v-slot:icon>
                        <svg class="w-6 h-6" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 53 53"><path d="M49.5 44.74h-3.12v-27a1 1 0 0 0-1-1h-6.05a1 1 0 0 0-1 1v27H34V23.3a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v21.44h-4.3V30.86a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v13.88h-3.29V11.07a1 1 0 0 0-2 0v34.67a1 1 0 0 0 1 1H49.39a1 1 0 0 0 0-2zm-9.17-26h4.05v26h-4.05zM28 24.3h4v20.44h-4zm-12.35 7.56h4v12.88h-4zM3.5 14.89h1.8a1 1 0 1 0 0-2H3.5a1 1 0 0 0 0 2zm0 5.99h1.8a1 1 0 1 0 0-2H3.5a1 1 0 0 0 0 2zm0 5.98h1.8a1 1 0 1 0 0-2H3.5a1 1 0 0 0 0 2zm0 5.99h1.8a1 1 0 0 0 0-2H3.5a1 1 0 0 0 0 2zm0 5.99h1.8a1 1 0 0 0 0-2H3.5a1 1 0 0 0 0 2zm0 5.99h1.8a1 1 0 0 0 0-2H3.5a1 1 0 0 0 0 2z"/><path d="M15.12 21.88a1 1 0 0 0-.79 1.18 1 1 0 0 0 1 .81h.19c.63-.13 14.58-3 24.32-13.52l-.07.93a1 1 0 0 0 .93 1.06h.07a1 1 0 0 0 1-.94L42 7.31a1 1 0 0 0-1.16-1.06l-4 .66a1 1 0 1 0 .32 2l1.44-.23C29.31 19 15.27 21.86 15.12 21.88Z"/></svg>
                    </template>
                </NavItem>
                <NavItem title="Leave Type" :href="route('organization.leaveTypes.index')" :active="checkLinkActive(['Organization/LeaveType/Index','Organization/LeaveType/Create','Organization/LeaveType/Edit'])">
                    <template v-slot:icon>
                        <svg class="w-6 h-6" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M2.5,8.86l9,5.2a1,1,0,0,0,1,0l9-5.2A1,1,0,0,0,22,8a1,1,0,0,0-.5-.87l-9-5.19a1,1,0,0,0-1,0l-9,5.19A1,1,0,0,0,2,8,1,1,0,0,0,2.5,8.86ZM12,4l7,4-7,4L5,8Zm8.5,7.17L12,16,3.5,11.13a1,1,0,0,0-1.37.37,1,1,0,0,0,.37,1.36l9,5.2a1,1,0,0,0,1,0l9-5.2a1,1,0,0,0,.37-1.36A1,1,0,0,0,20.5,11.13Zm0,4L12,20,3.5,15.13a1,1,0,0,0-1.37.37,1,1,0,0,0,.37,1.36l9,5.2a1,1,0,0,0,1,0l9-5.2a1,1,0,0,0,.37-1.36A1,1,0,0,0,20.5,15.13Z"/></svg>
                    </template>
                </NavItem>
                <NavItem title="Leave Request" :href="route('organization.leaveRequests.index')" :active="checkLinkActive(['Organization/LeaveRequest/Index','Organization/LeaveRequest/Create','Organization/LeaveRequest/Edit'])">
                    <template v-slot:icon>
                        <svg class="w-6 h-6" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" width="32" height="32" enable-background="new 0 0 32 32" version="1" viewBox="0 0 32 32"><path d="M26.857,31.89H3c-1.654,0-3-1.346-3-3V5.032c0-1.654,1.346-3,3-3h16.214c0.553,0,1,0.448,1,1s-0.447,1-1,1H3c-0.551,0-1,0.449-1,1V28.89c0,0.551,0.449,1,1,1h23.857c0.552,0,1-0.449,1-1V12.675c0-0.552,0.447-1,1-1s1,0.448,1,1V28.89C29.857,30.544,28.512,31.89,26.857,31.89z M24.482,23.496c-0.002,0-0.003,0-0.005,0L5.192,23.407c-0.553-0.002-0.998-0.452-0.996-1.004c0.002-0.551,0.45-0.996,1-0.996c0.001,0,0.003,0,0.004,0l19.286,0.089c0.552,0.002,0.998,0.452,0.995,1.004C25.479,23.051,25.032,23.496,24.482,23.496z M15.251,18.415c-0.471,0-0.781-0.2-0.957-0.366c-0.297-0.28-0.709-0.931-0.14-2.151l0.63-1.35c0.516-1.104,1.596-2.646,2.459-3.51L26,2.281c0.003-0.002,0.005-0.004,0.007-0.006c0.002-0.002,0.004-0.004,0.006-0.006l0.451-0.451c1.168-1.169,2.979-1.262,4.036-0.207c0,0,0,0,0,0c1.056,1.055,0.963,2.866-0.207,4.036c0,0-0.536,0.552-0.586,0.586l-8.635,8.635c-0.85,0.85-2.345,1.964-3.405,2.538l-1.218,0.657C15.969,18.322,15.572,18.415,15.251,18.415z M26.714,4.396l-8.056,8.057c-0.699,0.7-1.644,2.047-2.061,2.942L16.4,15.815l0.316-0.17c0.885-0.479,2.233-1.482,2.942-2.192l8.057-8.057L26.714,4.396z M28.163,3.016l0.932,0.932c0.2-0.356,0.177-0.737-0.009-0.923C28.881,2.82,28.499,2.83,28.163,3.016z"/></svg>
                    </template>
                </NavItem>
                <NavItem title="Holidays" :href="route('organization.holidays.index')" :active="checkLinkActive(['Organization/Holidays'])">
                    <template v-slot:icon>
                        <svg class="w-6 h-6" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"><g data-name="Your Icons"><path d="M38.36,18.29A11.55,11.55,0,0,0,40,12.35V11.9A3.91,3.91,0,0,0,36.1,8H29.9A5,5,0,0,0,25,4H23a5,5,0,0,0-4.9,4H11.9A3.91,3.91,0,0,0,8,11.9v.45a11.55,11.55,0,0,0,1.64,5.94L8,34A9,9,0,0,0,16.9,44H31.1A9,9,0,0,0,40,34ZM23,6h2a3,3,0,0,1,2.83,2H20.17A3,3,0,0,1,23,6ZM10,11.9A1.9,1.9,0,0,1,11.9,10H36.1A1.9,1.9,0,0,1,38,11.9v.45A9.65,9.65,0,0,1,28.35,22H27V18a3,3,0,0,0-3-3,3,3,0,0,0-3,3v4H19.65a10.16,10.16,0,0,1-1.23-.08,9.56,9.56,0,0,1-6.91-4.39h0A9.55,9.55,0,0,1,10,12.35ZM25,24v1a1,1,0,0,1-2,0V18a1,1,0,0,1,1-1,1,1,0,0,1,.71.31A.93.93,0,0,1,25,18v6ZM36.31,39.68A7,7,0,0,1,31.1,42H16.9a7,7,0,0,1-7-7.74l1.47-13.68c.05.06.12.11.18.17l.32.29c.23.21.47.4.71.59l.35.26q.43.3.9.57l.21.13a12.9,12.9,0,0,0,1.19.56l.33.12q.47.16.93.3l.43.11c.31.07.62.13.93.17l.41.07a12.08,12.08,0,0,0,1.35.08H21v1a3,3,0,0,0,6,0V24h1.35a12.08,12.08,0,0,0,1.35-.08l.41-.07a9.32,9.32,0,0,0,.92-.17l.44-.11c.31-.09.62-.19.92-.3l.34-.12a11.61,11.61,0,0,0,1.18-.56l.23-.14a10.23,10.23,0,0,0,.89-.56l.35-.26c.24-.19.48-.38.7-.58l.34-.3c0-.06.12-.11.17-.17l1.47,13.68A7,7,0,0,1,36.31,39.68Z"/><path d="M31.5,28.92h-15a3.47,3.47,0,0,0-3.44,2.87,3.06,3.06,0,0,0-.06.63v4.16a3.5,3.5,0,0,0,3.5,3.5h15a3.5,3.5,0,0,0,3.5-3.5V32.42a3.17,3.17,0,0,0,0-.59A3.49,3.49,0,0,0,31.5,28.92Zm-15,2h15A1.48,1.48,0,0,1,32.91,32H15.09A1.47,1.47,0,0,1,16.5,30.92Zm15,7.16h-15a1.5,1.5,0,0,1-1.5-1.5V34H33v2.58A1.5,1.5,0,0,1,31.5,38.08Z"/></g></svg>
                    </template>
                </NavItem>

                <NavItem title="Employees" :href="route('organization.employees.index')" :active="checkLinkActive(['Organization/Employees'])">
                    <template v-slot:icon>
                        <svg class="w-6 h-6" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z"/></svg>
                    </template>
                </NavItem>
                <!-- <NavItem title="Teams" :href="route('organization.teams.index')" :active="checkLinkActive(['Organization/Teams'])">
                    <template v-slot:icon>
                        <svg class="w-6 h-6" fill="currentcolor" stroke-width="5" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 64 64" viewBox="0 0 64 64"><path d="M52.7,36.3c-1-0.3-1.9-0.6-2.5-0.9c0,0,0,0,0,0c3.4-2.7,5.8-7.2,5.8-13.3C56,15.4,50.5,10,43.8,10c-1-5.8-6-10-11.8-10
                            c-5.8,0-10.7,4.3-11.8,10C13.5,10,8,15.4,8,21.9c0,5.1,2.1,10.4,5.8,13.4c0,0-0.1,0.1-0.1,0.1c-0.6,0.3-1.5,0.6-2.4,0.9
                            C7.1,37.7,0,40.1,0,48.3v5.4c0,1.1,0.9,2,2,2h6.2C8.1,56.4,8,57.2,8,58v4c0,1.1,0.9,2,2,2h44c1.1,0,2-0.9,2-2v-4
                            c0-0.8-0.1-1.6-0.2-2.3H62c1.1,0,2-0.9,2-2v-5.4C64,40.1,56.9,37.7,52.7,36.3z M52,22.1c0,5-2.6,10.4-7,11.6c0.6-2.1,1-4.3,1-6.7
                            c0-5-2.6-9.4-6.6-11.8c1.3-0.7,2.8-1.2,4.3-1.2C48.3,14,52,17.6,52,22.1z M22,27c0-5.5,4.5-10,10-10s10,4.5,10,10c0,7.4-5,15-10,15
                            S22,34.4,22,27z M32,4c3.8,0,7.1,2.8,7.8,6.6c-1.7,0.6-3.3,1.5-4.7,2.7c-1-0.2-2.1-0.4-3.1-0.4c-1.1,0-2.1,0.1-3.1,0.4
                            c-1.3-1.2-2.9-2.2-4.7-2.7C24.9,6.8,28.2,4,32,4z M12,21.9c0-4.4,3.7-7.9,8.3-7.9c1.5,0,3,0.4,4.3,1.2C20.6,17.6,18,22,18,27
                            c0,2.4,0.4,4.6,1,6.7C14.6,32.4,12,27,12,21.9z M4,51.7v-3.4c0-4.9,3.7-6.6,8.6-8.2c1.1-0.4,2.1-0.7,2.9-1.1
                            c0.8-0.4,1.5-0.9,2.1-1.6c1,0.3,2.1,0.5,3.3,0.6c1.1,1.9,2.4,3.6,3.9,4.9c-0.2,0.1-0.4,0.2-0.6,0.3c-0.7,0.3-1.8,0.7-3,1.1
                            c-3.6,1.2-8.9,2.9-11.5,7.4H4z M60,51.7h-5.6c-2.6-4.4-7.6-6.1-10.7-7.1c-1.1-0.3-2.2,0.2-2.5,1.3c-0.3,1,0.2,2.2,1.3,2.5
                            c5.1,1.7,9.6,3.7,9.6,9.6v2H12v-2c0-6,4.5-8,10.4-9.9c1.4-0.4,2.5-0.8,3.4-1.3c0.9-0.4,1.7-1,2.3-1.7c1.3,0.6,2.6,0.9,3.9,0.9
                            c4.1,0,8.4-3.1,11.2-8c1.1,0,2.2-0.2,3.3-0.6c0.6,0.7,1.3,1.2,2.1,1.6c0.8,0.4,1.8,0.7,2.9,1.1c4.8,1.6,8.6,3.3,8.6,8.2V51.7z"/></svg>
                    </template>
                </NavItem> -->
                <NavItem title="Billing" :href="route('organization.billing')" :active="checkLinkActive(['Organization/Billing'])">
                    <template v-slot:icon>
                        <svg class="w-6 h-6" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80"><path d="M75 56.136h-.013c0-.278-.045-.557-.162-.818L66 35.632V18h-8V5H37v13H14v17.632L5.175 55.318c-.117.261-.162.54-.162.818H5V75h70V56.136zM54 9v17H41V9h13zM18 22h19v4h-2v4h25v-4h-2v-4h4v12.06H18V22zm-.705 16.06h45.41l7.206 16.076H10.09l7.206-16.075zM9 71V58.136h62V71H9z"/><path d="M29 62.97h22v4H29zM21 26h9v4h-9zM20 44h40v4H20z"/></svg>
                    </template>
                </NavItem>
                <NavItem title="Settings" :href="route('organization.settings.general')" :active="checkLinkActive(['Organization/Settings'])">
                    <template v-slot:icon>
                        <svg class="w-6 h-6" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24"><path d="M19.9 12.66a1 1 0 0 1 0-1.32l1.28-1.44a1 1 0 0 0 .12-1.17l-2-3.46a1 1 0 0 0-1.07-.48l-1.88.38a1 1 0 0 1-1.15-.66l-.61-1.83a1 1 0 0 0-.95-.68h-4a1 1 0 0 0-1 .68l-.56 1.83a1 1 0 0 1-1.15.66L5 4.79a1 1 0 0 0-1 .48L2 8.73a1 1 0 0 0 .1 1.17l1.27 1.44a1 1 0 0 1 0 1.32L2.1 14.1a1 1 0 0 0-.1 1.17l2 3.46a1 1 0 0 0 1.07.48l1.88-.38a1 1 0 0 1 1.15.66l.61 1.83a1 1 0 0 0 1 .68h4a1 1 0 0 0 .95-.68l.61-1.83a1 1 0 0 1 1.15-.66l1.88.38a1 1 0 0 0 1.07-.48l2-3.46a1 1 0 0 0-.12-1.17ZM18.41 14l.8.9-1.28 2.22-1.18-.24a3 3 0 0 0-3.45 2L12.92 20h-2.56L10 18.86a3 3 0 0 0-3.45-2l-1.18.24-1.3-2.21.8-.9a3 3 0 0 0 0-4l-.8-.9 1.28-2.2 1.18.24a3 3 0 0 0 3.45-2L10.36 4h2.56l.38 1.14a3 3 0 0 0 3.45 2l1.18-.24 1.28 2.22-.8.9a3 3 0 0 0 0 3.98Zm-6.77-6a4 4 0 1 0 4 4 4 4 0 0 0-4-4Zm0 6a2 2 0 1 1 2-2 2 2 0 0 1-2 2Z"/></svg>
                    </template>
                </NavItem>
                </div>
                <!-- <a href="#" class="text-indigo-100 hover:bg-indigo-800 hover:text-white group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium"><svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true" class="text-indigo-300 group-hover:text-white h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25">
                        </path>
                    </svg><span class="mt-2">Home</span>
                </a>
                <a href="#"
                    class="text-indigo-100 hover:bg-indigo-800 hover:text-white group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium"><svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true" class="text-indigo-300 group-hover:text-white h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z">
                        </path>
                    </svg><span class="mt-2">All Files</span>
                </a> -->
            </div>
        </div>
    </div>

    <TransitionRoot as="template" :show="mobileMenuOpen">
        <Dialog as="div" class="relative z-20 md:hidden" @close="mobileMenuOpen = false">
          <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
            <div class="fixed inset-0 bg-gray-600 bg-opacity-75" />
          </TransitionChild>

          <div class="fixed inset-0 z-40 flex">
            <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
              <DialogPanel class="relative flex w-full max-w-xs flex-1 flex-col bg-indigo-700 pt-5 pb-4">
                <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
                  <div class="absolute top-1 right-0 -mr-14 p-1">
                    <button type="button" class="flex h-12 w-12 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-white" @click="mobileMenuOpen = false">
                      <XMarkIcon class="h-6 w-6 text-white" aria-hidden="true" />
                      <span class="sr-only">Close sidebar</span>
                    </button>
                  </div>
                </TransitionChild>
                <div class="flex flex-shrink-0 items-center px-4">
                  <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=white" alt="Your Company" />
                </div>
                <div class="mt-5 h-0 flex-1 overflow-y-auto px-2">
                  <nav class="flex h-full flex-col">
                    <div class="space-y-1">
                      <!-- <a v-for="item in sidebarNavigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-indigo-800 text-white' : 'text-indigo-100 hover:bg-indigo-800 hover:text-white', 'group py-2 px-3 rounded-md flex items-center text-sm font-medium']" :aria-current="item.current ? 'page' : undefined">
                        <component :is="item.icon" :class="[item.current ? 'text-white' : 'text-indigo-300 group-hover:text-white', 'mr-3 h-6 w-6']" aria-hidden="true" />
                        <span>{{ item.name }}</span>
                      </a> -->

                      <a href="#" class="text-indigo-100 hover:bg-indigo-800 hover:text-white group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium"><svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" aria-hidden="true" class="text-indigo-300 group-hover:text-white h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25">
                            </path>
                        </svg><span class="mt-2">Home</span>
                    </a>




                    </div>
                  </nav>
                </div>
              </DialogPanel>
            </TransitionChild>
            <div class="w-14 flex-shrink-0" aria-hidden="true">
              <!-- Dummy element to force sidebar to shrink to fit close icon -->
            </div>
          </div>
        </Dialog>
    </TransitionRoot>
</template>

<script>
    import {
        Dialog,
        DialogPanel,
        TransitionChild,
        TransitionRoot,
    } from '@headlessui/vue'
    import NavItem from "@/Shared/Partials/NavItem.vue"
    import HomeIcon from "@/Shared/Icons/HomeIcon.vue"

    export default {
        components: {
            NavItem,
            HomeIcon,
            Dialog,
            DialogPanel,
            TransitionRoot,
            TransitionChild
        },
        data(){
            return {
                role: this.$page.props.authenticatedUser.role,
                mobileMenuOpen: false
            }
        },
        methods:{
            checkLinkActive (routes){
                return routes.includes(this.$page.component);
            }
        }
    }
    </script>

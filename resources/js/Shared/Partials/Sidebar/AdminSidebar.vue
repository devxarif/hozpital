<template>
  <div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
      <!-- Sidebar component, swap this element with another sidebar if you like -->
      <div class="flex flex-grow flex-col overflow-y-auto border-r border-gray-200 bg-white pt-5">
        <div class="flex flex-shrink-0 items-center px-4">
          <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&amp;shade=600" alt="Your Company">
        </div>
        <div class="mt-5 flex flex-grow flex-col">
          <nav class="flex-1 space-y-1 px-2 pb-4">

              <a href="#" class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <svg class="text-gray-500 mr-3 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
                </svg>
                Admin Dashboard
              </a>

              <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <svg class="text-gray-400 group-hover:text-gray-500 mr-3 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"></path>
                </svg>
                Team
              </a>
          </nav>
        </div>
      </div>
    </div> <div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
      <!-- Sidebar component, swap this element with another sidebar if you like -->
      <div class="flex min-h-0 flex-1 flex-col bg-slate-800">
        <div class="flex flex-1 flex-col overflow-y-auto pt-5 pb-4">
          <div class="flex flex-shrink-0 items-center px-4">
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&amp;shade=500" alt="Your Company">
          </div>
          <nav class="mt-5 flex-1 space-y-1 px-2">

                <!-- <a href="#" class="bg-slate-50 text-gray-900 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium">
                    <HomeIcon class="text-gray-900 mr-3 flex-shrink-0 h-5 w-5"/>
                    Admin Dashboard
                </a>
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium">
                    <HomeIcon class="text-gray-300 mr-3 flex-shrink-0 h-4 w-4"/>
                    Admin Dashboard
                </a> -->

                <NavItem title="Admin Dashboard" :href="route('dashboard')" :active="route().current('dashboard')">
                    <template v-slot:icon>
                        <HomeIcon class="mr-3 flex-shrink-0 h-7 w-7"/>
                    </template>
                </NavItem>
                <!-- <DropdownMenu title="Dropdown">
                    <template v-slot:icon>
                        <font-awesome-icon icon="fa-solid fa-home" class="mr-3 flex-shrink-0 h-5 w-5"/>
                    </template>
                    <DropdownMenuItem title="Overview"/>
                    <DropdownMenuItem title="Members"/>
                    <DropdownMenuItem title="Calendar"/>
                    <DropdownMenuItem title="Settings"/>
                </DropdownMenu> -->


                <!-- Users  -->
                <NavItem title="Patient" :href="route('admin.patient.index')" :active="route().current('admin.patient.index')">
                    <template v-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon mr-3 flex-shrink-0 h-6 w-6" viewBox="0 0 512 512"><title>Person</title><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                    </template>
                </NavItem>
                 <DropdownMenu title="Doctor" :active="route().current('admin.department.index') || route().current('admin.doctor.index')">
                    <template v-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon mr-3 flex-shrink-0 h-6 w-6" viewBox="0 0 512 512"><title>Briefcase</title><rect x="32" y="128" width="448" height="320" rx="48" ry="48" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path d="M144 128V96a32 32 0 0132-32h160a32 32 0 0132 32v32M480 240H32M320 240v24a8 8 0 01-8 8H200a8 8 0 01-8-8v-24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                    </template>
                    <DropdownMenuItem title="Department List" :href="route('admin.department.index')" :active="route().current('admin.department.index')"/>
                    <DropdownMenuItem title="Doctor List" :href="route('admin.doctor.index')" :active="route().current('admin.doctor.index')"/>
                </DropdownMenu>

                <DropdownMenu title="Staff" :active="route().current('admin.nurse.index') || route().current('admin.accountant.index') || route().current('admin.receptionist.index') || route().current('admin.laboratorist.index') || route().current('admin.pharmacist.index')">
                    <template v-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon mr-3 flex-shrink-0 h-6 w-6" viewBox="0 0 512 512"><title>People</title><path d="M402 168c-2.93 40.67-33.1 72-66 72s-63.12-31.32-66-72c-3-42.31 26.37-72 66-72s69 30.46 66 72z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M336 304c-65.17 0-127.84 32.37-143.54 95.41-2.08 8.34 3.15 16.59 11.72 16.59h263.65c8.57 0 13.77-8.25 11.72-16.59C463.85 335.36 401.18 304 336 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path d="M200 185.94c-2.34 32.48-26.72 58.06-53 58.06s-50.7-25.57-53-58.06C91.61 152.15 115.34 128 147 128s55.39 24.77 53 57.94z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M206 306c-18.05-8.27-37.93-11.45-59-11.45-52 0-102.1 25.85-114.65 76.2-1.65 6.66 2.53 13.25 9.37 13.25H154" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32"/></svg>
                    </template>
                    <DropdownMenuItem title="Nurse List" :href="route('admin.nurse.index')" :active="route().current('admin.nurse.index')"/>
                    <DropdownMenuItem title="Accountant List" :href="route('admin.accountant.index')" :active="route().current('admin.accountant.index')"/>
                    <DropdownMenuItem title="Receptionist List" :href="route('admin.receptionist.index')" :active="route().current('admin.receptionist.index')"/>
                    <DropdownMenuItem title="Laboratorist List" :href="route('admin.laboratorist.index')" :active="route().current('admin.laboratorist.index')"/>
                    <DropdownMenuItem title="Pharmacist List" :href="route('admin.pharmacist.index')" :active="route().current('admin.pharmacist.index')"/>
                </DropdownMenu>

                <!-- Pharmacy  -->
                <DropdownMenu title="Medicine" :active="route().current('admin.medicine.index') || route().current('admin.medicineCategory.index') || route().current('admin.manufacture.index')">
                    <template v-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon mr-3 flex-shrink-0 h-6 w-6" viewBox="0 0 512 512"><title>Medkit</title><rect x="32" y="112" width="448" height="352" rx="48" ry="48" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path d="M144 112V80a32 32 0 0132-32h160a32 32 0 0132 32v32M256 208v160M336 288H176" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                    </template>
                    <DropdownMenuItem title="Medicine List" :href="route('admin.medicine.index')" :active="route().current('admin.medicine.index')"/>
                    <DropdownMenuItem title="Medicine Category List" :href="route('admin.medicineCategory.index')" :active="route().current('admin.medicineCategory.index')"/>
                    <DropdownMenuItem title="Manufacture List" :href="route('admin.manufacture.index')" :active="route().current('admin.manufacture.index')"/>
                </DropdownMenu>

                <!-- Bed  -->
                <DropdownMenu title="Bed" :active="route().current('admin.bed.index') || route().current('admin.bedType.index') || route().current('admin.bedFloor.index') || route().current('admin.bedAllotment.index')">
                    <template v-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon mr-3 flex-shrink-0 h-6 w-6" viewBox="0 0 512 512"><title>Bed</title><path d="M384 240H96V136a40.12 40.12 0 0140-40h240a40.12 40.12 0 0140 40v104zM48 416V304a64.19 64.19 0 0164-64h288a64.19 64.19 0 0164 64v112" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M48 416v-8a24.07 24.07 0 0124-24h368a24.07 24.07 0 0124 24v8M112 240v-16a32.09 32.09 0 0132-32h80a32.09 32.09 0 0132 32v16M256 240v-16a32.09 32.09 0 0132-32h80a32.09 32.09 0 0132 32v16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                    </template>
                    <DropdownMenuItem title="Bed List" :href="route('admin.bed.index')" :active="route().current('admin.bed.index')"/>
                    <DropdownMenuItem title="Bed Type List" :href="route('admin.bedType.index')" :active="route().current('admin.bedType.index')"/>
                    <DropdownMenuItem title="Bed Floor List" :href="route('admin.bedFloor.index')" :active="route().current('admin.bedFloor.index')"/>
                    <DropdownMenuItem title="Bed Allotment" :href="route('admin.bedAllotment.index')" :active="route().current('admin.bedAllotment.index')"/>
                </DropdownMenu>

                <!-- Human Resources  -->
                <DropdownMenu title="Leave" :active="false">
                    <template v-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon mr-3 flex-shrink-0 h-6 w-6" viewBox="0 0 512 512"><title>Airplane</title><path d="M407.72 224c-3.4 0-14.79.1-18 .3l-64.9 1.7a1.83 1.83 0 01-1.69-.9L193.55 67.56a9 9 0 00-6.66-3.56H160l73 161a2.35 2.35 0 01-2.26 3.35l-121.69 1.8a8.06 8.06 0 01-6.6-3.1l-37-45c-3-3.9-8.62-6-13.51-6H33.08c-1.29 0-1.1 1.21-.75 2.43l19.84 71.42a16.3 16.3 0 010 11.9L32.31 333c-.59 1.95-.52 3 1.77 3H52c8.14 0 9.25-1.06 13.41-6.3l37.7-45.7a8.19 8.19 0 016.6-3.1l120.68 2.7a2.7 2.7 0 012.43 3.74L160 448h26.64a9 9 0 006.65-3.55L323.14 287c.39-.6 2-.9 2.69-.9l63.9 1.7c3.3.2 14.59.3 18 .3C452 288.1 480 275.93 480 256s-27.88-32-72.28-32z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                    </template>
                    <DropdownMenuItem title="Leave Type" :href="route('admin.leaveType.index')" :active="route().current('admin.leaveType.index')"/>
                    <DropdownMenuItem title="Leave Request" :href="route('admin.leaveRequest.index')" :active="route().current('admin.leaveRequest.index')"/>
                </DropdownMenu>
                <NavItem title="Attendance" :href="route('dashboard')" :active="false">
                    <template v-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon mr-3 flex-shrink-0 h-6 w-6" viewBox="0 0 512 512"><title>Checkbox</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M352 176L217.6 336 160 272"/><rect x="64" y="64" width="384" height="384" rx="48" ry="48" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/></svg>
                    </template>
                </NavItem>
                <NavItem title="Holidays" :href="route('admin.holiday.index')" :active="route().current('admin.holiday.index')">
                    <template v-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon  mr-3 flex-shrink-0 h-6 w-6" viewBox="0 0 512 512"><title>Calendar Number</title><rect x="48" y="80" width="416" height="384" rx="48" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M128 48v32M384 48v32M464 160H48M304 260l43.42-32H352v168M191.87 306.63c9.11 0 25.79-4.28 36.72-15.47a37.9 37.9 0 0011.13-27.26c0-26.12-22.59-39.9-47.89-39.9-21.4 0-33.52 11.61-37.85 18.93M149 374.16c4.88 8.27 19.71 25.84 43.88 25.84 28.59 0 52.12-15.94 52.12-43.82 0-12.62-3.66-24-11.58-32.07-12.36-12.64-31.25-17.48-41.55-17.48"/></svg>
                    </template>
                </NavItem>
                <NavItem title="Event" :href="route('admin.event.index')" :active="route().current('admin.event.index')">
                    <template v-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon  mr-3 flex-shrink-0 h-6 w-6" viewBox="0 0 512 512"><title>Calendar Number</title><rect x="48" y="80" width="416" height="384" rx="48" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M128 48v32M384 48v32M464 160H48M304 260l43.42-32H352v168M191.87 306.63c9.11 0 25.79-4.28 36.72-15.47a37.9 37.9 0 0011.13-27.26c0-26.12-22.59-39.9-47.89-39.9-21.4 0-33.52 11.61-37.85 18.93M149 374.16c4.88 8.27 19.71 25.84 43.88 25.84 28.59 0 52.12-15.94 52.12-43.82 0-12.62-3.66-24-11.58-32.07-12.36-12.64-31.25-17.48-41.55-17.48"/></svg>
                    </template>
                </NavItem>

                <!-- Blood  -->
                <DropdownMenu title="Blood Bank" :active="route().current('admin.bloodBank.index') || route().current('admin.bloodDonor.index') || route().current('admin.bloodDonation.index') ">
                    <template v-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon mr-3 flex-shrink-0 h-6 w-6" viewBox="0 0 512 512"><title>Water</title><path d="M400 320c0 88.37-55.63 144-144 144s-144-55.63-144-144c0-94.83 103.23-222.85 134.89-259.88a12 12 0 0118.23 0C296.77 97.15 400 225.17 400 320z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path d="M344 328a72 72 0 01-72 72" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                    </template>
                    <DropdownMenuItem title="Blood Bank" :href="route('admin.bloodBank.index')" :active="route().current('admin.bloodBank.index')"/>
                    <DropdownMenuItem title="Blood Donor" :href="route('admin.bloodDonor.index')" :active="route().current('admin.bloodDonor.index')"/>
                    <DropdownMenuItem title="Blood Donation" :href="route('admin.bloodDonation.index')" :active="route().current('admin.bloodDonation.index')"/>
                </DropdownMenu>

                <!-- Finance  -->
                <DropdownMenu title="Finance" :active="route().current('admin.bloodBank.index') || route().current('admin.bloodDonor.index') || route().current('admin.bloodDonation.index') ">
                    <template v-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon mr-3 flex-shrink-0 h-6 w-6" viewBox="0 0 512 512"><title>Wallet</title><rect x="48" y="144" width="416" height="288" rx="48" ry="48" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path d="M411.36 144v-30A50 50 0 00352 64.9L88.64 109.85A50 50 0 0048 159v49" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path d="M368 320a32 32 0 1132-32 32 32 0 01-32 32z"/></svg>
                    </template>
                    <DropdownMenuItem title="Income Category List" href="/" :active="false"/>
                    <DropdownMenuItem title="Income List" href="/" :active="false"/>
                    <DropdownMenuItem title="Expense Category List" href="/" :active="false"/>
                    <DropdownMenuItem title="Expense List" href="/" :active="false"/>
                </DropdownMenu>

                <NavItem title="Report" :href="route('dashboard')" :active="false">
                    <template v-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon mr-3 flex-shrink-0 h-6 w-6" viewBox="0 0 512 512"><title>Stats Chart</title><rect x="64" y="320" width="48" height="160" rx="8" ry="8" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><rect x="288" y="224" width="48" height="256" rx="8" ry="8" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><rect x="400" y="112" width="48" height="368" rx="8" ry="8" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><rect x="176" y="32" width="48" height="448" rx="8" ry="8" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                    </template>
                </NavItem>
                <NavItem title="Announcement" :href="route('admin.announcement.index')" :active="route().current('admin.announcement.index')">
                    <template v-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon mr-3 flex-shrink-0 h-6 w-6" viewBox="0 0 512 512"><title>Notifications</title><path d="M427.68 351.43C402 320 383.87 304 383.87 217.35 383.87 138 343.35 109.73 310 96c-4.43-1.82-8.6-6-9.95-10.55C294.2 65.54 277.8 48 256 48s-38.21 17.55-44 37.47c-1.35 4.6-5.52 8.71-9.95 10.53-33.39 13.75-73.87 41.92-73.87 121.35C128.13 304 110 320 84.32 351.43 73.68 364.45 83 384 101.61 384h308.88c18.51 0 27.77-19.61 17.19-32.57zM320 384v16a64 64 0 01-128 0v-16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                    </template>
                </NavItem>
                <NavItem title="Settings" :href="route('admin.settings.general')" :active="false">
                    <template v-slot:icon>

                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon mr-3 flex-shrink-0 h-6 w-6" viewBox="0 0 512 512"><title>Settings</title><path d="M262.29 192.31a64 64 0 1057.4 57.4 64.13 64.13 0 00-57.4-57.4zM416.39 256a154.34 154.34 0 01-1.53 20.79l45.21 35.46a10.81 10.81 0 012.45 13.75l-42.77 74a10.81 10.81 0 01-13.14 4.59l-44.9-18.08a16.11 16.11 0 00-15.17 1.75A164.48 164.48 0 01325 400.8a15.94 15.94 0 00-8.82 12.14l-6.73 47.89a11.08 11.08 0 01-10.68 9.17h-85.54a11.11 11.11 0 01-10.69-8.87l-6.72-47.82a16.07 16.07 0 00-9-12.22 155.3 155.3 0 01-21.46-12.57 16 16 0 00-15.11-1.71l-44.89 18.07a10.81 10.81 0 01-13.14-4.58l-42.77-74a10.8 10.8 0 012.45-13.75l38.21-30a16.05 16.05 0 006-14.08c-.36-4.17-.58-8.33-.58-12.5s.21-8.27.58-12.35a16 16 0 00-6.07-13.94l-38.19-30A10.81 10.81 0 0149.48 186l42.77-74a10.81 10.81 0 0113.14-4.59l44.9 18.08a16.11 16.11 0 0015.17-1.75A164.48 164.48 0 01187 111.2a15.94 15.94 0 008.82-12.14l6.73-47.89A11.08 11.08 0 01213.23 42h85.54a11.11 11.11 0 0110.69 8.87l6.72 47.82a16.07 16.07 0 009 12.22 155.3 155.3 0 0121.46 12.57 16 16 0 0015.11 1.71l44.89-18.07a10.81 10.81 0 0113.14 4.58l42.77 74a10.8 10.8 0 01-2.45 13.75l-38.21 30a16.05 16.05 0 00-6.05 14.08c.33 4.14.55 8.3.55 12.47z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                    </template>
                </NavItem>
          </nav>
        </div>
        <div class="flex flex-shrink-0 bg-gray-700 p-4">
          <a href="#" class="group block w-full flex-shrink-0">
            <div class="flex items-center">
              <div>
                <img class="inline-block h-9 w-9 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="">
              </div>
              <div class="ml-3">
                <p class="text-sm font-medium text-white">Tom Cook</p>
                <p class="text-xs font-medium text-gray-300 group-hover:text-gray-200">View profile</p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <!-- Mobile menu -->
    <TransitionRoot as="template" :show="mobileMenuOpen">
        <Dialog as="div" class="relative z-20 md:hidden" @close="mobileMenuOpen = false">
            <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
            <div class="fixed inset-0 bg-gray-600 bg-opacity-75" />
            </TransitionChild>

            <div class="fixed inset-0 z-40 flex">
            <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
                <DialogPanel class="relative flex w-full max-w-xs flex-1 flex-col bg-gray-900 pt-5 pb-4">
                <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
                    <div class="absolute top-1 right-0 -mr-14 p-1">
                    <button type="button" class="flex h-12 w-12 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-white" @click="mobileMenuOpen = false">
                        <XMarkIcon class="h-5 w-5 text-white" aria-hidden="true" />
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
                        <a href="#" class="bg-gray-900 text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <svg class="mr-4 h-5 w-5 flex-shrink-0 text-indigo-300" x-description="Heroicon name: outline/home" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
                            </svg>
                            Dashboard
                        </a>
                        <a href="#" class="text-white hover:bg-gray-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <svg class="mr-4 h-5 w-5 flex-shrink-0 text-indigo-300" x-description="Heroicon name: outline/users" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"></path>
                            </svg>
                        Team
                        </a>
                    </div>
                    </nav>
                </div>
                </DialogPanel>
            </TransitionChild>
            <div class="w-14 flex-shrink-0" aria-hidden="true">
            </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script>
    import {
        Dialog,
        DialogPanel,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        TransitionChild,
        TransitionRoot,
    } from '@headlessui/vue'
    import NavItem from "@/Shared/Partials/Sidebar/ListItem/NavItem.vue"
    import DropdownMenu from "@/Shared/Partials/Sidebar/ListItem/DropdownMenu.vue"
    import DropdownMenuItem from "@/Shared/Partials/Sidebar/ListItem/DropdownMenuItem.vue"

    import { library } from '@fortawesome/fontawesome-svg-core'
    import { faHome, faCircle } from '@fortawesome/free-solid-svg-icons'
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

    library.add(faHome, faCircle)

    import HomeIcon from '@/Shared/Icons/HomeIcon.vue'


export default {
    components: {
        faCircle,
        faHome,
        FontAwesomeIcon,

        HomeIcon,

        NavItem,
        DropdownMenu,
        DropdownMenuItem,


        Dialog,
        DialogPanel,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        TransitionChild,
        TransitionRoot,
    },
    data(){
        return {
            role: this.$page.props.authenticatedUser.role,
            mobileMenuOpen: false,
            open: false
        }
    },
    methods:{
        checkLinkActive (routes){
            return true;
            // let param_type = typeof routes;

            // if(param_type == 'string'){
            //     return route().current(routes)
            // }else{
            //     var isCurrent = false

            //     routes.each(function(route){
            //         var isCurrent = route().current(route)
            //     })


            // }

            // return routes.includes(this.$page.component);
        }
    },
    mounted(){
        this.checkLinkActive(['asdas','asdas'])
    //    let lists = routes.includes(this.$page.component)
        // let lists = ['home', 'about','contact'];

        // console.log(lists.includes('Home'))
    }
}
</script>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Scripts -->
    </head>
    <body class="font-sans antialiased">
        <div class="bg-gray-50">
            <div class="mx-auto max-w-7xl py-12 px-4 sm:px-6 lg:flex lg:items-center lg:justify-between lg:py-16 lg:px-8">
              <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                <span class="block">Ready to dive in?</span>
                <span class="block text-blue-600">Start your free trial today.</span>
              </h2>
              <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                  <a href="javascript:void(0)" class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-5 py-3 text-base font-medium text-white hover:bg-blue-700">Get started</a>
                </div>
                <div class="ml-3 inline-flex rounded-md shadow">
                  <a href="javascript:void(0)" class="inline-flex items-center justify-center rounded-md border border-transparent bg-white px-5 py-3 text-base font-medium text-blue-600 hover:bg-blue-50">Learn more</a>
                </div>
              </div>
            </div>
          </div>



        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        You're logged in!
                    </div>

                    <div class="mb-4 border-b border-gray-200 ">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                            data-tabs-toggle="#myTabContent" role="tablist">
                            <li class="mr-2" role="presentation">
                                <button
                                    class="inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg hover:text-blue-600"
                                    id="profile-tab" data-tabs-target="#profile" type="button" role="tab"
                                    aria-controls="profile" aria-selected="true">Profile</button>
                            </li>
                            <li class="mr-2" role="presentation">
                                <button
                                    class="inline-block p-4 text-gray-500 border-b-2 border-transparent border-gray-100 rounded-t-lg hover:text-gray-600 hover:border-gray-300"
                                    id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                                    aria-controls="dashboard" aria-selected="false">Dashboard</button>
                            </li>
                            <li class="mr-2" role="presentation">
                                <button
                                    class="inline-block p-4 text-gray-500 border-b-2 border-transparent border-gray-100 rounded-t-lg hover:text-gray-600 hover:border-gray-300"
                                    id="settings-tab" data-tabs-target="#settings" type="button" role="tab"
                                    aria-controls="settings" aria-selected="false">Settings</button>
                            </li>
                            <li role="presentation">
                                <button
                                    class="inline-block p-4 text-gray-500 border-b-2 border-transparent border-gray-100 rounded-t-lg hover:text-gray-600 hover:border-gray-300"
                                    id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab"
                                    aria-controls="contacts" aria-selected="false">Contacts</button>
                            </li>
                        </ul>
                    </div>
                    <div id="myTabContent">
                        <div class="p-4 rounded-lg bg-gray-50 " id="profile" role="tabpanel"
                            aria-labelledby="profile-tab">
                            <p class="text-sm text-gray-500 ">This is some placeholder content the <strong
                                    class="font-medium text-gray-800 ">Profile tab's associated
                                    content</strong>. Clicking another tab will toggle the visibility of this one for the
                                next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                        </div>
                        <div class="hidden p-4 rounded-lg bg-gray-50 " id="dashboard" role="tabpanel"
                            aria-labelledby="dashboard-tab">
                            <p class="text-sm text-gray-500 ">This is some placeholder content the <strong
                                    class="font-medium text-gray-800 ">Dashboard tab's associated
                                    content</strong>. Clicking another tab will toggle the visibility of this one for the
                                next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                        </div>
                        <div class="hidden p-4 rounded-lg bg-gray-50 " id="settings" role="tabpanel"
                            aria-labelledby="settings-tab">
                            <p class="text-sm text-gray-500 ">This is some placeholder content the <strong
                                    class="font-medium text-gray-800 ">Settings tab's associated
                                    content</strong>. Clicking another tab will toggle the visibility of this one for the
                                next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                        </div>
                        <div class="hidden p-4 rounded-lg bg-gray-50 " id="contacts" role="tabpanel"
                            aria-labelledby="contacts-tab">
                            <p class="text-sm text-gray-500 ">This is some placeholder content the <strong
                                    class="font-medium text-gray-800 ">Contacts tab's associated
                                    content</strong>. Clicking another tab will toggle the visibility of this one for the
                                next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                        </div>
                    </div>
        <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
    </body>
</html>

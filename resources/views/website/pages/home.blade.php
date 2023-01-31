@extends('website.layout.app')

@section('main')
     <!-- Hero Sections -->
     <div class="lg:relative">
        <div class="mx-auto w-full max-w-7xl pt-16 pb-20 text-center lg:py-48 lg:text-left">
            <div class="px-6 sm:px-8 lg:w-1/2 xl:pr-16">
                <h1
                    class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl md:text-6xl lg:text-5xl xl:text-6xl">
                    <span class="block xl:inline">Data to enrich your</span>
                    <span class="block text-indigo-600 xl:inline">online business</span>
                </h1>
                <p class="mx-auto mt-3 max-w-md text-lg text-gray-500 sm:text-xl md:mt-5 md:max-w-3xl">Anim
                    aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo.
                    Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
                <div class="mt-10 sm:flex sm:justify-center lg:justify-start">
                    <div class="rounded-md shadow">
                        <a href="#"
                            class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 md:py-4 md:px-10 md:text-lg">Get
                            started</a>
                    </div>
                    <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                        <a href="#"
                            class="flex w-full items-center justify-center rounded-md border border-transparent bg-white px-8 py-3 text-base font-medium text-indigo-600 hover:bg-gray-50 md:py-4 md:px-10 md:text-lg">Live
                            demo</a>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="relative h-64 w-full sm:h-72 md:h-96 lg:absolute lg:inset-y-0 lg:right-0 lg:h-full lg:w-1/2">
            <img class="absolute inset-0 h-full w-full object-cover"
                src="https://media.istockphoto.com/id/512278456/photo/group-of-doctors-at-the-hospital.jpg?s=170667a&w=0&k=20&c=XKMi1xsHzVJ8JJzQZfGYJooqBJitZT0MDs4W4usP4eg="
                alt="">
        </div>
    </div>

     <!-- Our Department Sections -->
     <div class="relative bg-gray-50 px-6 pt-16 pb-20 lg:px-8 lg:pt-24 lg:pb-28">
        <div class="absolute inset-0">
            <div class="h-1/3 bg-white sm:h-2/3"></div>
        </div>
        <div class="relative mx-auto max-w-7xl">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Resposible
                    Departments</h2>
                <p class="mx-auto mt-3 max-w-2xl text-xl text-gray-500 sm:mt-4">Lorem ipsum dolor sit amet
                    consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed.</p>
            </div>
            <div class="mx-auto mt-12 grid max-w-lg gap-5 lg:max-w-none lg:grid-cols-3">
                <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
                    <div class="flex-shrink-0">
                        <img class="h-48 w-full object-cover"
                            src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                            alt="">
                    </div>
                    <div class="flex flex-1 flex-col justify-between bg-white p-6">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-indigo-600">
                                <a href="#" class="hover:underline">Article</a>
                            </p>
                            <a href="#" class="mt-2 block">
                                <p class="text-xl font-semibold text-gray-900">Boost your conversion rate
                                </p>
                                <p class="mt-3 text-base text-gray-500">Lorem ipsum dolor sit amet
                                    consectetur adipisicing elit. Architecto accusantium praesentium eius,
                                    ut atque fuga culpa, similique sequi cum eos quis dolorum.</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
                    <div class="flex-shrink-0">
                        <img class="h-48 w-full object-cover"
                            src="https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                            alt="">
                    </div>
                    <div class="flex flex-1 flex-col justify-between bg-white p-6">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-indigo-600">
                                <a href="#" class="hover:underline">Video</a>
                            </p>
                            <a href="#" class="mt-2 block">
                                <p class="text-xl font-semibold text-gray-900">How to use search engine
                                    optimization to drive sales</p>
                                <p class="mt-3 text-base text-gray-500">Lorem ipsum dolor sit amet
                                    consectetur adipisicing elit. Velit facilis asperiores porro quaerat
                                    doloribus, eveniet dolore. Adipisci tempora aut inventore optio animi.,
                                    tempore temporibus quo laudantium.</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
                    <div class="flex-shrink-0">
                        <img class="h-48 w-full object-cover"
                            src="https://images.unsplash.com/photo-1492724441997-5dc865305da7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                            alt="">
                    </div>
                    <div class="flex flex-1 flex-col justify-between bg-white p-6">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-indigo-600">
                                <a href="#" class="hover:underline">Case Study</a>
                            </p>
                            <a href="#" class="mt-2 block">
                                <p class="text-xl font-semibold text-gray-900">Improve your customer
                                    experience</p>
                                <p class="mt-3 text-base text-gray-500">Lorem ipsum dolor sit amet
                                    consectetur adipisicing elit. Sint harum rerum voluptatem quo recusandae
                                    magni placeat saepe molestiae, sed excepturi cumque corporis perferendis
                                    hic.</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Our Team Sections -->
    <div class="mx-auto max-w-7xl py-8 px-6 text-center lg:px-8 lg:py-8">
        <div class="space-y-12">
            <div class="space-y-5 sm:mx-auto sm:max-w-xl sm:space-y-4 lg:max-w-5xl">
                <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">OUR SPECIALISTS</h2>
                <p class="text-xl text-gray-500">We have all the professional specialists in our
                    hospital</p>
            </div>
            <ul role="list"
                class="mx-auto space-y-16 sm:grid sm:grid-cols-2 sm:gap-16 sm:space-y-0 lg:max-w-5xl lg:grid-cols-3">
                <li>
                    <div class="space-y-6">
                        <img class="mx-auto h-60 w-60 xl:h-60 xl:w-56"
                            src="https://templates.envytheme.com/bexi/default/assets/images/team/team-1.jpg"
                            alt="">
                        <div class="space-y-2">
                            <div class="space-y-1 text-lg font-medium leading-6">
                                <h3>Glenn Arredondo</h3>
                                <p class="text-indigo-600">Family Physicians</p>
                            </div>
                            <ul role="list" class="flex justify-center space-x-5">
                                <li>
                                    <a href="#" class="text-gray-400 hover:text-gray-500">
                                        <span class="sr-only">Twitter</span>
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                            aria-hidden="true">
                                            <path
                                                d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-400 hover:text-gray-500">
                                        <span class="sr-only">LinkedIn</span>
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.338 16.338H13.67V12.16c0-.995-.017-2.277-1.387-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248H8.014v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092v4.711zM5.005 6.575a1.548 1.548 0 11-.003-3.096 1.548 1.548 0 01.003 3.096zm-1.337 9.763H6.34v-8.59H3.667v8.59zM17.668 1H2.328C1.595 1 1 1.581 1 2.298v15.403C1 18.418 1.595 19 2.328 19h15.34c.734 0 1.332-.582 1.332-1.299V2.298C19 1.581 18.402 1 17.668 1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="space-y-6">
                        <img class="mx-auto h-60 w-60 xl:h-60 xl:w-60"
                            src="https://templates.envytheme.com/bexi/default/assets/images/team/team-3.jpg"
                            alt="">
                        <div class="space-y-2">
                            <div class="space-y-1 text-lg font-medium leading-6">
                                <h3>Christopher Perreault</h3>
                                <p class="text-indigo-600">Medicine Specialists</p>
                            </div>
                            <ul role="list" class="flex justify-center space-x-5">
                                <li>
                                    <a href="#" class="text-gray-400 hover:text-gray-500">
                                        <span class="sr-only">Twitter</span>
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                            aria-hidden="true">
                                            <path
                                                d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-gray-400 hover:text-gray-500">
                                        <span class="sr-only">LinkedIn</span>
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.338 16.338H13.67V12.16c0-.995-.017-2.277-1.387-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248H8.014v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092v4.711zM5.005 6.575a1.548 1.548 0 11-.003-3.096 1.548 1.548 0 01.003 3.096zm-1.337 9.763H6.34v-8.59H3.667v8.59zM17.668 1H2.328C1.595 1 1 1.581 1 2.298v15.403C1 18.418 1.595 19 2.328 19h15.34c.734 0 1.332-.582 1.332-1.299V2.298C19 1.581 18.402 1 17.668 1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <!-- More people... -->
            </ul>
        </div>
    </div>

     <!-- Category Sections -->
     <section aria-labelledby="category-heading" class="pt-8 sm:pt-32 xl:mx-auto xl:max-w-7xl xl:px-8">
        <div class="px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8 xl:px-0">
          <h2 id="category-heading" class="text-2xl font-bold tracking-tight text-gray-900">Shop by Category</h2>
          <a href="#" class="hidden text-sm font-semibold text-indigo-600 hover:text-indigo-500 sm:block">
            Browse all categories
            <span aria-hidden="true"> →</span>
          </a>
        </div>

        <div class="mt-4 flow-root">
          <div class="-my-2">
            <div class="relative box-content h-80 overflow-x-auto py-2 xl:overflow-visible">
              <div class="min-w-screen-xl absolute flex space-x-8 px-4 sm:px-6 lg:px-8 xl:relative xl:grid xl:grid-cols-5 xl:gap-x-8 xl:space-x-0 xl:px-0">

                  <a href="#" class="relative flex h-80 w-56 flex-col overflow-hidden rounded-lg p-6 hover:opacity-75 xl:w-auto">
                    <span aria-hidden="true" class="absolute inset-0">
                      <img src="https://tailwindui.com/img/ecommerce-images/home-page-01-category-01.jpg" alt="" class="h-full w-full object-cover object-center">
                    </span>
                    <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                    <span class="relative mt-auto text-center text-xl font-bold text-white">New Arrivals</span>
                  </a>

                  <a href="#" class="relative flex h-80 w-56 flex-col overflow-hidden rounded-lg p-6 hover:opacity-75 xl:w-auto">
                    <span aria-hidden="true" class="absolute inset-0">
                      <img src="https://tailwindui.com/img/ecommerce-images/home-page-01-category-02.jpg" alt="" class="h-full w-full object-cover object-center">
                    </span>
                    <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                    <span class="relative mt-auto text-center text-xl font-bold text-white">Productivity</span>
                  </a>

                  <a href="#" class="relative flex h-80 w-56 flex-col overflow-hidden rounded-lg p-6 hover:opacity-75 xl:w-auto">
                    <span aria-hidden="true" class="absolute inset-0">
                      <img src="https://tailwindui.com/img/ecommerce-images/home-page-01-category-04.jpg" alt="" class="h-full w-full object-cover object-center">
                    </span>
                    <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                    <span class="relative mt-auto text-center text-xl font-bold text-white">Workspace</span>
                  </a>

                  <a href="#" class="relative flex h-80 w-56 flex-col overflow-hidden rounded-lg p-6 hover:opacity-75 xl:w-auto">
                    <span aria-hidden="true" class="absolute inset-0">
                      <img src="https://tailwindui.com/img/ecommerce-images/home-page-01-category-05.jpg" alt="" class="h-full w-full object-cover object-center">
                    </span>
                    <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                    <span class="relative mt-auto text-center text-xl font-bold text-white">Accessories</span>
                  </a>

                  <a href="#" class="relative flex h-80 w-56 flex-col overflow-hidden rounded-lg p-6 hover:opacity-75 xl:w-auto">
                    <span aria-hidden="true" class="absolute inset-0">
                      <img src="https://tailwindui.com/img/ecommerce-images/home-page-01-category-03.jpg" alt="" class="h-full w-full object-cover object-center">
                    </span>
                    <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                    <span class="relative mt-auto text-center text-xl font-bold text-white">Sale</span>
                  </a>

              </div>
            </div>
          </div>
        </div>

        <div class="mt-6 px-4 sm:hidden">
          <a href="#" class="block text-sm font-semibold text-indigo-600 hover:text-indigo-500">
            Browse all categories
            <span aria-hidden="true"> →</span>
          </a>
        </div>
      </section>

    <!-- Product Sections -->
    <section aria-labelledby="category-heading" class="pt-8 sm:pt-32 xl:mx-auto xl:max-w-7xl xl:px-8">
        <div class="px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8 xl:px-0">
          <h2 id="category-heading" class="text-2xl font-bold tracking-tight text-gray-900">Shop by Category</h2>
          <a href="#" class="hidden text-sm font-semibold text-indigo-600 hover:text-indigo-500 sm:block">
            Browse all categories
            <span aria-hidden="true"> →</span>
          </a>
        </div>
        <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 class="text-xl font-bold text-gray-900">Customers also bought</h2>

        <div class="mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
            <div>
            <div class="relative">
                <div class="relative h-72 w-full overflow-hidden rounded-lg">
                <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-related-product-01.jpg" alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls." class="h-full w-full object-cover object-center">
                </div>
                <div class="relative mt-4">
                <h3 class="text-sm font-medium text-gray-900">Zip Tote Basket</h3>
                <p class="mt-1 text-sm text-gray-500">White and black</p>
                </div>
                <div class="absolute inset-x-0 top-0 flex h-72 items-end justify-end overflow-hidden rounded-lg p-4">
                <div aria-hidden="true" class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
                <p class="relative text-lg font-semibold text-white">$140</p>
                </div>
            </div>
            <div class="mt-6">
                <a href="#" class="relative flex items-center justify-center rounded-md border border-transparent bg-gray-100 py-2 px-8 text-sm font-medium text-gray-900 hover:bg-gray-200">Add to bag<span class="sr-only">, Zip Tote Basket</span></a>
            </div>
            </div>

            <!-- More products... -->
        </div>
        </div>
    </section>

    <!-- Gradient Feature Section -->
    <div class="bg-gradient-to-r from-purple-800 to-indigo-700">
        <div class="mx-auto max-w-4xl py-16 px-6 sm:pt-20 sm:pb-24 lg:max-w-7xl lg:px-8 lg:pt-24">
            <h2 class="text-3xl font-bold tracking-tight text-white">Inbox support built for efficiency</h2>
            <p class="mt-4 max-w-3xl text-lg text-purple-200">Ac tincidunt sapien vehicula erat auctor
                pellentesque rhoncus. Et magna sit morbi lobortis. Blandit aliquam sit nisl euismod mattis
                in.</p>
            <div
                class="mt-12 grid grid-cols-1 gap-x-6 gap-y-12 sm:grid-cols-2 lg:mt-16 lg:grid-cols-4 lg:gap-x-8 lg:gap-y-16">
                <div>
                    <div>
                        <span
                            class="flex h-12 w-12 items-center justify-center rounded-md bg-white bg-opacity-10">
                            <!-- Heroicon name: outline/inbox -->
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
                            </svg>
                        </span>
                    </div>
                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-white">Unlimited Inboxes</h3>
                        <p class="mt-2 text-base text-purple-200">Ac tincidunt sapien vehicula erat auctor
                            pellentesque rhoncus. Et magna sit morbi lobortis.</p>
                    </div>
                </div>

                <div>
                    <div>
                        <span
                            class="flex h-12 w-12 items-center justify-center rounded-md bg-white bg-opacity-10">
                            <!-- Heroicon name: outline/users -->
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                        </span>
                    </div>
                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-white">Manage Team Members</h3>
                        <p class="mt-2 text-base text-purple-200">Ac tincidunt sapien vehicula erat auctor
                            pellentesque rhoncus. Et magna sit morbi lobortis.</p>
                    </div>
                </div>

                <div>
                    <div>
                        <span
                            class="flex h-12 w-12 items-center justify-center rounded-md bg-white bg-opacity-10">
                            <!-- Heroicon name: outline/trash -->
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </span>
                    </div>
                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-white">Spam Report</h3>
                        <p class="mt-2 text-base text-purple-200">Ac tincidunt sapien vehicula erat auctor
                            pellentesque rhoncus. Et magna sit morbi lobortis.</p>
                    </div>
                </div>

                <div>
                    <div>
                        <span
                            class="flex h-12 w-12 items-center justify-center rounded-md bg-white bg-opacity-10">
                            <!-- Heroicon name: outline/pencil-square -->
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </span>
                    </div>
                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-white">Compose in Markdown</h3>
                        <p class="mt-2 text-base text-purple-200">Ac tincidunt sapien vehicula erat auctor
                            pellentesque rhoncus. Et magna sit morbi lobortis.</p>
                    </div>
                </div>

                <div>
                    <div>
                        <span
                            class="flex h-12 w-12 items-center justify-center rounded-md bg-white bg-opacity-10">
                            <!-- Heroicon name: outline/document-chart-bar -->
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                        </span>
                    </div>
                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-white">Team Reporting</h3>
                        <p class="mt-2 text-base text-purple-200">Ac tincidunt sapien vehicula erat auctor
                            pellentesque rhoncus. Et magna sit morbi lobortis.</p>
                    </div>
                </div>

                <div>
                    <div>
                        <span
                            class="flex h-12 w-12 items-center justify-center rounded-md bg-white bg-opacity-10">
                            <!-- Heroicon name: outline/arrow-uturn-left -->
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                            </svg>
                        </span>
                    </div>
                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-white">Saved Replies</h3>
                        <p class="mt-2 text-base text-purple-200">Ac tincidunt sapien vehicula erat auctor
                            pellentesque rhoncus. Et magna sit morbi lobortis.</p>
                    </div>
                </div>

                <div>
                    <div>
                        <span
                            class="flex h-12 w-12 items-center justify-center rounded-md bg-white bg-opacity-10">
                            <!-- Heroicon name: outline/chat-bubble-left-ellipsis -->
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                            </svg>
                        </span>
                    </div>
                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-white">Email Commenting</h3>
                        <p class="mt-2 text-base text-purple-200">Ac tincidunt sapien vehicula erat auctor
                            pellentesque rhoncus. Et magna sit morbi lobortis.</p>
                    </div>
                </div>

                <div>
                    <div>
                        <span
                            class="flex h-12 w-12 items-center justify-center rounded-md bg-white bg-opacity-10">
                            <!-- Heroicon name: outline/heart -->
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </span>
                    </div>
                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-white">Connect with Customers</h3>
                        <p class="mt-2 text-base text-purple-200">Ac tincidunt sapien vehicula erat auctor
                            pellentesque rhoncus. Et magna sit morbi lobortis.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats section -->
    <div class="relative bg-gray-900">
        <div class="absolute inset-x-0 bottom-0 h-80 xl:top-0 xl:h-full">
            <div class="h-full w-full xl:grid xl:grid-cols-2">
                <div class="h-full xl:relative xl:col-start-2">
                    <img class="h-full w-full object-cover opacity-25 xl:absolute xl:inset-0"
                        src="https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2830&q=80&sat=-100"
                        alt="People working on laptops">
                    <div aria-hidden="true"
                        class="absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-gray-900 xl:inset-y-0 xl:left-0 xl:h-full xl:w-32 xl:bg-gradient-to-r">
                    </div>
                </div>
            </div>
        </div>
        <div
            class="mx-auto max-w-4xl px-6 lg:max-w-7xl lg:px-8 xl:grid xl:grid-flow-col-dense xl:grid-cols-2 xl:gap-x-8">
            <div class="relative pt-12 pb-64 sm:pt-24 sm:pb-64 xl:col-start-1 xl:pb-24">
                <h2 class="text-base font-semibold">
                    <span
                        class="bg-gradient-to-r from-purple-300 to-indigo-300 bg-clip-text text-transparent">Valuable
                        Metrics</span>
                </h2>
                <p class="mt-3 text-3xl font-bold tracking-tight text-white">Get actionable data that will
                    help grow your business</p>
                <p class="mt-5 text-lg text-gray-300">Rhoncus sagittis risus arcu erat lectus bibendum. Ut
                    in adipiscing quis in viverra tristique sem. Ornare feugiat viverra eleifend fusce orci
                    in quis amet. Sit in et vitae tortor, massa. Dapibus laoreet amet lacus nibh integer
                    quis. Eu vulputate diam sit tellus quis at.</p>
                <div class="mt-12 grid grid-cols-1 gap-y-12 gap-x-6 sm:grid-cols-2">
                    <p>
                        <span class="block text-2xl font-bold text-white">8K+</span>
                        <span class="mt-1 block text-base text-gray-300"><span
                                class="font-medium text-white">Companies</span> use laoreet amet lacus nibh
                            integer quis.</span>
                    </p>

                    <p>
                        <span class="block text-2xl font-bold text-white">25K+</span>
                        <span class="mt-1 block text-base text-gray-300"><span
                                class="font-medium text-white">Countries around the globe</span> lacus nibh
                            integer quis.</span>
                    </p>

                    <p>
                        <span class="block text-2xl font-bold text-white">98%</span>
                        <span class="mt-1 block text-base text-gray-300"><span
                                class="font-medium text-white">Customer satisfaction</span> laoreet amet
                            lacus nibh integer quis.</span>
                    </p>

                    <p>
                        <span class="block text-2xl font-bold text-white">12M+</span>
                        <span class="mt-1 block text-base text-gray-300"><span
                                class="font-medium text-white">Issues resolved</span> lacus nibh integer
                            quis.</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-white">
        <div
            class="mx-auto max-w-4xl py-16 px-6 sm:py-24 lg:flex lg:max-w-7xl lg:items-center lg:justify-between lg:px-8">
            <h2 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                <span class="block">Ready to get started?</span>
                <span
                    class="-mb-1 block bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text pb-1 text-transparent">Get
                    in touch or create an account.</span>
            </h2>
            <div class="mt-6 space-y-4 sm:flex sm:space-y-0 sm:space-x-5">
                <a href="#"
                    class="flex items-center justify-center rounded-md border border-transparent bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-3 text-base font-medium text-white shadow-sm hover:from-purple-700 hover:to-indigo-700">Learn
                    more</a>
                <a href="#"
                    class="flex items-center justify-center rounded-md border border-transparent bg-indigo-50 px-4 py-3 text-base font-medium text-indigo-800 shadow-sm hover:bg-indigo-100">Get
                    started</a>
            </div>
        </div>
    </div>
@endsection

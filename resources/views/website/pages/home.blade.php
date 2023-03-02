@extends('website.layout.app')

@section('main')
     <!-- Hero Sections -->
     <div class="lg:relative">
        <div class="mx-auto w-full max-w-7xl pt-16 pb-20 text-center lg:py-48 lg:text-left">
            <div class="px-6 sm:px-8 lg:w-1/2 xl:pr-16">
                <h1
                    class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl md:text-6xl lg:text-5xl xl:text-6xl">
                    <span class="block xl:inline">Data to enrich your</span>
                    <span class="block text-blue-600 xl:inline">online business</span>
                </h1>
                <p class="mx-auto mt-3 max-w-md text-lg text-gray-500 sm:text-xl md:mt-5 md:max-w-3xl">Anim
                    aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo.
                    Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
                <div class="mt-10 sm:flex sm:justify-center lg:justify-start">
                    <div class="rounded-md shadow">
                        <a href="javascript:void(0)"
                            class="flex w-full items-center justify-center rounded-md border border-transparent bg-blue-600 px-8 py-3 text-base font-medium text-white hover:bg-blue-700 md:py-4 md:px-10 md:text-lg">Get
                            started</a>
                    </div>
                    <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                        <a href="javascript:void(0)"
                            class="flex w-full items-center justify-center rounded-md border border-transparent bg-white px-8 py-3 text-base font-medium text-blue-600 hover:bg-gray-50 md:py-4 md:px-10 md:text-lg">Live
                            demo</a>
                    </div>
                </div>
                <div>
                    <dl class="mt-16 grid max-w-xl grid-cols-1 gap-8 sm:mt-20 sm:grid-cols-2 xl:mt-16">

                        <div class="flex flex-col gap-y-3 border-l border-gray-900/10 pl-6">
                          <dt class="text-sm leading-6 text-gray-600">Creators on the platform</dt>
                          <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">8,000+</dd>
                        </div>

                        <div class="flex flex-col gap-y-3 border-l border-gray-900/10 pl-6">
                          <dt class="text-sm leading-6 text-gray-600">Flat platform fee</dt>
                          <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">3%</dd>
                        </div>

                        <div class="flex flex-col gap-y-3 border-l border-gray-900/10 pl-6">
                          <dt class="text-sm leading-6 text-gray-600">Uptime guarantee</dt>
                          <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">99.9%</dd>
                        </div>

                        <div class="flex flex-col gap-y-3 border-l border-gray-900/10 pl-6">
                          <dt class="text-sm leading-6 text-gray-600">Paid out to creators</dt>
                          <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">$70M</dd>
                        </div>

                    </dl>
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





    <!-- Services Sections -->
    <div class="relative bg-gray-100 py-16">
        <div class="mx-auto max-w-md px-6 text-center sm:max-w-3xl lg:max-w-7xl lg:px-8">
              <div class="mx-auto max-w-md px-6 text-center sm:max-w-3xl lg:max-w-7xl lg:px-8">
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">WHY CHOOSE US</p>
                <p class="mx-auto mt-5 max-w-prose text-xl text-gray-500">We have been providing services to patients for over 20 years. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat.

                </p>
                <div class="mt-20">
                  <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="pt-6">
                      <div class="flow-root rounded-lg bg-gray-50 px-6 pb-8">
                        <div class="-mt-6">
                          <div>
                            <span class="inline-flex items-center justify-center rounded-xl bg-blue-500 p-3 shadow-lg">
                              <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                              </svg>
                            </span>
                          </div>
                          <h3 class="mt-8 text-lg font-semibold leading-8 tracking-tight text-gray-900">Push to Deploy</h3>
                          <p class="mt-5 text-base leading-7 text-gray-600">Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.</p>
                        </div>
                      </div>
                    </div>

                    <div class="pt-6">
                      <div class="flow-root rounded-lg bg-gray-50 px-6 pb-8">
                        <div class="-mt-6">
                          <div>
                            <span class="inline-flex items-center justify-center rounded-xl bg-blue-500 p-3 shadow-lg">
                              <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                              </svg>
                            </span>
                          </div>
                          <h3 class="mt-8 text-lg font-semibold leading-8 tracking-tight text-gray-900">SSL Certificates</h3>
                          <p class="mt-5 text-base leading-7 text-gray-600">Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.</p>
                        </div>
                      </div>
                    </div>

                    <div class="pt-6">
                      <div class="flow-root rounded-lg bg-gray-50 px-6 pb-8">
                        <div class="-mt-6">
                          <div>
                            <span class="inline-flex items-center justify-center rounded-xl bg-blue-500 p-3 shadow-lg">
                              <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                              </svg>
                            </span>
                          </div>
                          <h3 class="mt-8 text-lg font-semibold leading-8 tracking-tight text-gray-900">Modern Technology</h3>
                          <p class="mt-5 text-base leading-7 text-gray-600">Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.</p>
                        </div>
                      </div>
                    </div>

                    <div class="pt-6">
                      <div class="flow-root rounded-lg bg-gray-50 px-6 pb-8">
                        <div class="-mt-6">
                          <div>
                            <span class="inline-flex items-center justify-center rounded-xl bg-blue-500 p-3 shadow-lg">
                              <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                              </svg>
                            </span>
                          </div>
                          <h3 class="mt-8 text-lg font-semibold leading-8 tracking-tight text-gray-900">Professional Doctors</h3>
                          <p class="mt-5 text-base leading-7 text-gray-600">Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.</p>
                        </div>
                      </div>
                    </div>

                    <div class="pt-6">
                      <div class="flow-root rounded-lg bg-gray-50 px-6 pb-8">
                        <div class="-mt-6">
                          <div>
                            <span class="inline-flex items-center justify-center rounded-xl bg-blue-500 p-3 shadow-lg">
                              <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12a7.5 7.5 0 0015 0m-15 0a7.5 7.5 0 1115 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077l1.41-.513m14.095-5.13l1.41-.513M5.106 17.785l1.15-.964m11.49-9.642l1.149-.964M7.501 19.795l.75-1.3m7.5-12.99l.75-1.3m-6.063 16.658l.26-1.477m2.605-14.772l.26-1.477m0 17.726l-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205L12 12m6.894 5.785l-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864l-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
                              </svg>
                            </span>
                          </div>
                          <h3 class="mt-8 text-lg font-semibold leading-8 tracking-tight text-gray-900">Powerful API</h3>
                          <p class="mt-5 text-base leading-7 text-gray-600">Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.</p>
                        </div>
                      </div>
                    </div>

                    <div class="pt-6">
                      <div class="flow-root rounded-lg bg-gray-50 px-6 pb-8">
                        <div class="-mt-6">
                          <div>
                            <span class="inline-flex items-center justify-center rounded-xl bg-blue-500 p-3 shadow-lg">
                              <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 17.25v-.228a4.5 4.5 0 00-.12-1.03l-2.268-9.64a3.375 3.375 0 00-3.285-2.602H7.923a3.375 3.375 0 00-3.285 2.602l-2.268 9.64a4.5 4.5 0 00-.12 1.03v.228m19.5 0a3 3 0 01-3 3H5.25a3 3 0 01-3-3m19.5 0a3 3 0 00-3-3H5.25a3 3 0 00-3 3m16.5 0h.008v.008h-.008v-.008zm-3 0h.008v.008h-.008v-.008z" />
                              </svg>
                            </span>
                          </div>
                          <h3 class="mt-8 text-lg font-semibold leading-8 tracking-tight text-gray-900">Database Backups</h3>
                          <p class="mt-5 text-base leading-7 text-gray-600">Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>

     <!-- Our Department Sections -->
     <div class="relative bg-white px-6 pt-16 pb-20 lg:px-8 lg:pt-24 lg:pb-28">
        {{-- <div class="absolute inset-0">
            <div class="h-1/3 bg-white sm:h-2/3"></div>
        </div> --}}
        <div class="relative mx-auto max-w-7xl">
            <div class="px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8 xl:px-0">
                <div>
                    <h2 class="text-5xl font-bold tracking-tight text-gray-900 sm:text-4xl">Our Departments</h2>
                    <p class="mx-auto mt-3 max-w-2xl text-xl text-gray-500 sm:mt-4">Our hospital has all kinds of departments, so you can get all kinds of treatment</p>
                </div>
                <a href="javascript:void(0)" class="text-md font-semibold text-blue-600 hover:text-blue-500 sm:block">
                  View All
                    {{-- <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                        </svg>
                    </span> --}}
                </a>
            </div>
            <div class="mx-auto mt-12 grid max-w-lg gap-5 lg:max-w-none lg:grid-cols-3">
                @foreach ($departments as $department)
                    <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
                        <div class="flex-shrink-0">
                            <img class="h-48 w-full object-cover"
                                src="{{ $department->image }}"
                                alt="{{ $department->title }}">
                        </div>
                        <div class="flex flex-1 flex-col justify-between bg-white p-6">
                            <div class="flex-1">
                                <a href="javascript:void(0)" class="mt-2 block">
                                    <p class="text-xl font-semibold text-gray-900">{{ $department->name }}</p>
                                    <p class="mt-3 text-base text-gray-500">{{ $department->description }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Our Team Sections -->
    <div class="relative bg-gray-50 px-6 pt-16 pb-20 lg:px-8 lg:pt-24 lg:pb-28">
        <div class="relative mx-auto max-w-7xl">
            <div class="px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8 xl:px-0">
                <div>
                    <h2 class="text-5xl font-bold tracking-tight text-gray-900 sm:text-4xl">Our Specialists</h2>
                    <p class="mx-auto mt-3 max-w-2xl text-xl text-gray-500 sm:mt-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed</p>
                </div>
                <a href="javascript:void(0)" class="text-md font-semibold text-blue-600 hover:text-blue-500 sm:block">
                    View All
                </a>
            </div>
            <div class="mx-auto mt-12">
                <ul role="list"
                class="mx-auto sm:grid sm:grid-cols-3 sm:gap-16 sm:space-y-0 lg:grid-cols-4">
                    <li>
                        <div class="space-y-6">
                            <img class="mx-auto h-60 w-60 xl:h-60 xl:w-56"
                                src="https://templates.envytheme.com/bexi/default/assets/images/team/team-1.jpg"
                                alt="">
                            <div class="space-y-2">
                                <div class="space-y-1 text-lg font-medium leading-6">
                                    <h3>Glenn Arredondo</h3>
                                    <p class="text-blue-600">Family Physicians</p>
                                </div>
                                <ul role="list" class="flex justify-center space-x-5">
                                    <li>
                                        <a href="javascript:void(0)" class="text-gray-400 hover:text-gray-500">
                                            <span class="sr-only">Twitter</span>
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                                aria-hidden="true">
                                                <path
                                                    d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="text-gray-400 hover:text-gray-500">
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
                            <img class="mx-auto h-60 w-60 xl:h-60 xl:w-56"
                                src="https://templates.envytheme.com/bexi/default/assets/images/team/team-1.jpg"
                                alt="">
                            <div class="space-y-2">
                                <div class="space-y-1 text-lg font-medium leading-6">
                                    <h3>Glenn Arredondo</h3>
                                    <p class="text-blue-600">Family Physicians</p>
                                </div>
                                <ul role="list" class="flex justify-center space-x-5">
                                    <li>
                                        <a href="javascript:void(0)" class="text-gray-400 hover:text-gray-500">
                                            <span class="sr-only">Twitter</span>
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                                aria-hidden="true">
                                                <path
                                                    d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="text-gray-400 hover:text-gray-500">
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
                            <img class="mx-auto h-60 w-60 xl:h-60 xl:w-56"
                                src="https://templates.envytheme.com/bexi/default/assets/images/team/team-1.jpg"
                                alt="">
                            <div class="space-y-2">
                                <div class="space-y-1 text-lg font-medium leading-6">
                                    <h3>Glenn Arredondo</h3>
                                    <p class="text-blue-600">Family Physicians</p>
                                </div>
                                <ul role="list" class="flex justify-center space-x-5">
                                    <li>
                                        <a href="javascript:void(0)" class="text-gray-400 hover:text-gray-500">
                                            <span class="sr-only">Twitter</span>
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                                aria-hidden="true">
                                                <path
                                                    d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="text-gray-400 hover:text-gray-500">
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
                            <img class="mx-auto h-60 w-60 xl:h-60 xl:w-56"
                                src="https://templates.envytheme.com/bexi/default/assets/images/team/team-1.jpg"
                                alt="">
                            <div class="space-y-2">
                                <div class="space-y-1 text-lg font-medium leading-6">
                                    <h3>Glenn Arredondo</h3>
                                    <p class="text-blue-600">Family Physicians</p>
                                </div>
                                <ul role="list" class="flex justify-center space-x-5">
                                    <li>
                                        <a href="javascript:void(0)" class="text-gray-400 hover:text-gray-500">
                                            <span class="sr-only">Twitter</span>
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                                aria-hidden="true">
                                                <path
                                                    d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="text-gray-400 hover:text-gray-500">
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
                </ul>
            </div>
        </div>
    </div>

     <!-- Category Sections -->
     <div class="relative bg-white px-6 pt-16 pb-20 lg:px-8 lg:pt-24 lg:pb-28">
        <div class="relative mx-auto max-w-7xl">
            <div class="px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8 xl:px-0">
                <div>
                    <h2 class="text-5xl font-bold tracking-tight text-gray-900 sm:text-4xl">Shop by Category</h2>
                    <p class="mx-auto mt-3 max-w-2xl text-xl text-gray-500 sm:mt-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed</p>
                </div>
                <a href="javascript:void(0)" class="text-md font-semibold text-blue-600 hover:text-blue-500 sm:block">
                    Browse all categories
                </a>
            </div>
            <div class="mx-auto mt-12">
                <div class="mt-4 flow-root">
                    <div class="-my-2">
                    <div class="relative box-content h-80 overflow-x-auto py-2 xl:overflow-visible">
                        <div class="min-w-screen-xl absolute flex space-x-8 px-4 sm:px-6 lg:px-8 xl:relative xl:grid xl:grid-cols-5 xl:gap-x-8 xl:space-x-0 xl:px-0">

                            <a href="javascript:void(0)" class="relative flex h-80 w-56 flex-col overflow-hidden rounded-lg p-6 hover:opacity-75 xl:w-auto">
                            <span aria-hidden="true" class="absolute inset-0">
                                <img src="https://tailwindui.com/img/ecommerce-images/home-page-01-category-01.jpg" alt="" class="h-full w-full object-cover object-center">
                            </span>
                            <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                            <span class="relative mt-auto text-center text-xl font-bold text-white">New Arrivals</span>
                            </a>

                            <a href="javascript:void(0)" class="relative flex h-80 w-56 flex-col overflow-hidden rounded-lg p-6 hover:opacity-75 xl:w-auto">
                            <span aria-hidden="true" class="absolute inset-0">
                                <img src="https://tailwindui.com/img/ecommerce-images/home-page-01-category-02.jpg" alt="" class="h-full w-full object-cover object-center">
                            </span>
                            <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                            <span class="relative mt-auto text-center text-xl font-bold text-white">Productivity</span>
                            </a>

                            <a href="javascript:void(0)" class="relative flex h-80 w-56 flex-col overflow-hidden rounded-lg p-6 hover:opacity-75 xl:w-auto">
                            <span aria-hidden="true" class="absolute inset-0">
                                <img src="https://tailwindui.com/img/ecommerce-images/home-page-01-category-04.jpg" alt="" class="h-full w-full object-cover object-center">
                            </span>
                            <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                            <span class="relative mt-auto text-center text-xl font-bold text-white">Workspace</span>
                            </a>

                            <a href="javascript:void(0)" class="relative flex h-80 w-56 flex-col overflow-hidden rounded-lg p-6 hover:opacity-75 xl:w-auto">
                            <span aria-hidden="true" class="absolute inset-0">
                                <img src="https://tailwindui.com/img/ecommerce-images/home-page-01-category-05.jpg" alt="" class="h-full w-full object-cover object-center">
                            </span>
                            <span aria-hidden="true" class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                            <span class="relative mt-auto text-center text-xl font-bold text-white">Accessories</span>
                            </a>

                            <a href="javascript:void(0)" class="relative flex h-80 w-56 flex-col overflow-hidden rounded-lg p-6 hover:opacity-75 xl:w-auto">
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
            </div>
        </div>
    </div>
    <!-- Product Sections -->
    <div class="relative bg-gray-50 px-6 pt-16 pb-20 lg:px-8 lg:pt-24 lg:pb-28">
        <div class="relative mx-auto max-w-7xl">
            <div class="px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8 xl:px-0">
                <div>
                    <h2 class="text-5xl font-bold tracking-tight text-gray-900 sm:text-4xl">Shop by Category</h2>
                    <p class="mx-auto mt-3 max-w-2xl text-xl text-gray-500 sm:mt-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed</p>
                </div>
                <a href="javascript:void(0)" class="text-md font-semibold text-blue-600 hover:text-blue-500 sm:block">
                    Browse all categories
                </a>
            </div>
            <div class="mx-auto mt-12">
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
                            <a href="javascript:void(0)" class="relative flex items-center justify-center rounded-md border border-transparent bg-gray-100 py-2 px-8 text-sm font-medium text-gray-900 hover:bg-gray-200">Add to cart<span class="sr-only">, Zip Tote Basket</span></a>
                        </div>
                    </div>

                    <!-- More products... -->
                </div>
            </div>
        </div>
    </div>
@endsection

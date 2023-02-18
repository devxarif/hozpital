<template>
    <div class="min-h-screen">
        <div class="relative flex flex-col lg:flex-row">
            <div class="hidden h-screen lg:relative w-full lg:block shadow-inner "><img alt="login background"
                    sizes="100vw"
                    src="" decoding="async" data-nimg="fill" class=" object-cover" loading="lazy"
                    style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent">
                <div class="absolute w-full inset-y-0 flex flex-col justify-center text-center px-6">
                    <h1
                        class="mt-4 text-4xl tracking-tight font-extrabold text-white sm:mt-5 sm:leading-none lg:mt-6 lg:text-5xl xl:text-6xl">
                        <span class="md:block">Why choose MezoHub ?</span> </h1>
                    <div class="mx-auto max-w-2xl py-24 px-4 sm:px-6 sm:py-32 lg:max-w-7xl lg:px-8">
                        <div class="grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-4">
                            <div>
                                <div class="flex justify-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                        class="text-white w-10 h-10">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg></div>
                                <h3 class="mt-6 text-sm font-bold text-white">5 min Server provisioning</h3>
                                <p class="mt-2 text-sm text-white">MezoHub can create a server with all configurations
                                    and settings super fast in approx 5 min.</p>
                            </div>
                            <div>
                                <div class="flex justify-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                        class="text-white w-10 h-10">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z">
                                        </path>
                                    </svg></div>
                                <h3 class="mt-6 text-sm font-bold text-white">Fast Customer Support</h3>
                                <p class="mt-2 text-sm text-white">Never worry about any issue because we are always an
                                    email away and reply you in an hour.</p>
                            </div>
                            <div>
                                <div class="flex justify-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                        class="text-white w-10 h-10">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z">
                                        </path>
                                    </svg></div>
                                <h3 class="mt-6 text-sm font-bold text-white">Teams support</h3>
                                <p class="mt-2 text-sm text-white">If you want to share any server or project with your
                                    team mate or friend, we provide teams feature for that.</p>
                            </div>
                            <div>
                                <div class="flex justify-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                        class="text-white w-10 h-10">
                                        <path stroke-linecap="round"
                                            d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25">
                                        </path>
                                    </svg></div>
                                <h3 class="mt-6 text-sm font-bold text-white">Free Sub domain</h3>
                                <p class="mt-2 text-sm text-white">You want to deploy project but don't have any domain
                                    to setup ? We provide you a MezoHub sub-domain to get started.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative h-screen z-10 flex flex-col b py-10 px-4 shadow-2xl justify-center md:px-20 xl:px-28">
                <div class="mx-auto w-full max-w-md sm:px-4 md:w-96 md:max-w-sm md:px-0">
                    <div class="flex flex-col"><a class=" text-4xl text-center" href="/"><span
                                class=" font-semibold ">Mezohub</span>.com</a>
                        <div class="mt-20">
                            <h2 class="text-lg font-semibold text-gray-900">Get started for free</h2>
                            <p class="mt-2 text-sm text-gray-700">Already registered?
                                <!-- --> <a class="font-medium text-blue-600 hover:underline" href="/login">Sign in</a>
                                <!-- -->to your account.</p>
                        </div>
                    </div><span></span><span></span>
                    <form class="mt-10 grid grid-cols-1 gap-y-8 gap-x-6 sm:grid-cols-2">
                        <div class="col-span-full">
                            <div class=""><label for="name"
                                    class="mb-3 block text-sm font-medium text-gray-700">Name</label><input id="name"
                                    type="text" name="name" autocomplete="given-name"
                                    class="block w-full appearance-none rounded-md border border-gray-200 bg-gray-50 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-blue-500 sm:text-sm"
                                    value=""></div><span></span>
                        </div>
                        <div class="col-span-full">
                            <div class="col-span-full"><label for="email"
                                    class="mb-3 block text-sm font-medium text-gray-700">Email address</label><input
                                    id="email" type="email" name="email" autocomplete="email"
                                    class="block w-full appearance-none rounded-md border border-gray-200 bg-gray-50 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-blue-500 sm:text-sm"
                                    value=""></div><span></span>
                        </div>
                        <div class="col-span-full">
                            <div class="col-span-full"><label for="password"
                                    class="mb-3 block text-sm font-medium text-gray-700">Password</label><input
                                    id="password" type="password" name="password" autocomplete="new-password"

                                    class="block w-full appearance-none rounded-md border border-gray-200 bg-gray-50 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-blue-500 sm:text-sm"
                                    value=""></div><span></span>
                        </div>
                        <div class="col-span-full">
                            <div class="col-span-full"><label for="password_confirmation"
                                    class="mb-3 block text-sm font-medium text-gray-700">Password
                                    Confirmation</label><input id="password_confirmation" type="password"
                                    name="password_confirmation" autocomplete="confirm-password"
                                    class="block w-full appearance-none rounded-md border border-gray-200 bg-gray-50 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-blue-500 sm:text-sm"
                                    value=""></div><span></span>
                        </div>
                        <div class="col-span-full"><button
                                class="group inline-flex items-center justify-center rounded-full py-2 px-4 text-sm font-semibold focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 bg-blue-600 text-white hover:text-slate-100 hover:bg-blue-500 active:bg-blue-800 active:text-blue-100 focus-visible:outline-blue-600 w-full"
                                type="submit"><span>Sign up <span aria-hidden="true">→</span></span></button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

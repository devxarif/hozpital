<template>

<div class="flex flex-col min-h-screen bg-white dark:bg-gray-900">
    <main class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col justify-center items-center py-8 px-6 mx-auto md:h-screen"><a
                class="flex justify-center items-center mb-8 text-3xl font-semibold lg:mb-10 dark:text-white"
                href="/"><span
                    style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;"><span
                        style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;"><img
                            alt="" aria-hidden="true"
                            src="data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%2740%27%20height=%2742%27/%3e"
                            style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;"></span><img
                        alt="Flowbite logo" srcset="/images/logo.svg 1x, /images/logo.svg 2x" src="/images/logo.svg"
                        decoding="async" data-nimg="intrinsic"
                        style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: contain;"></span><span
                    class="ml-3">Flowbite</span></a>
            <div
                class="justify-center items-center w-full bg-white rounded-lg shadow lg:flex md:mt-0 lg:max-w-screen-sm xl:p-0 dark:bg-gray-800">
                <div class="p-6 w-full sm:p-8 lg:p-10">
                    <h1 class="mb-3 text-2xl font-bold text-gray-900 lg:text-3xl dark:text-white">Sign in to your
                        account</h1>
                    <p class="mb-3 text-gray-500 dark:text-gray-400">Join our community of designers and developers to
                        get access to hundreds of UI components, plugins, resources, and design systems.</p>
                    <form class="mt-8">
                        <div class="mb-6"><label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                email</label><input required="" type="email" name="email" id="email"
                                placeholder="name@company.com"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value=""></div>
                        <div class="mb-6"><label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                password</label><input required="" type="password" name="password" id="password"
                                placeholder=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value=""></div>
                        <div class="flex items-start mb-6">
                            <div class="flex items-center h-5"><input id="remember" aria-describedby="remember"
                                    name="remember" type="checkbox"
                                    class="w-4 h-4 bg-gray-50 rounded border-gray-300 focus:ring-3 focus:ring-blue-300 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                            </div>
                            <div class="ml-3 text-sm"><label for="remember"
                                    class="font-medium text-gray-900 dark:text-white">Remember me</label></div><a
                                class="ml-auto text-sm text-blue-700 dark:text-blue-500 hover:underline"
                                href="/forgot-password/">Forgot Password?</a>
                        </div>
                        <div class="mb-6">
                            <div>
                                <div class="grecaptcha-badge" data-style="bottomright"
                                    style="width: 256px; height: 60px; display: block; transition: right 0.3s ease 0s; position: fixed; bottom: 14px; right: -186px; box-shadow: gray 0px 0px 5px; border-radius: 2px; overflow: hidden;">
                                    <div class="grecaptcha-logo"><iframe title="reCAPTCHA"
                                            src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LcKn58eAAAAAFD-lFXQHCSkdJ9V76lq3KLyNygU&amp;co=aHR0cHM6Ly9mbG93Yml0ZS5jb206NDQz&amp;hl=en&amp;type=image&amp;v=5qcenVbrhOy8zihcc2aHOWD4&amp;theme=light&amp;size=invisible&amp;badge=bottomright&amp;cb=csawew12x67u"
                                            width="256" height="60" role="presentation" name="a-fkn8ah03ml8"
                                            frameborder="0" scrolling="no"
                                            sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe>
                                    </div>
                                    <div class="grecaptcha-error"></div><textarea id="g-recaptcha-response"
                                        name="g-recaptcha-response" class="g-recaptcha-response"
                                        style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"
                                        data-gramm="false" wt-ignore-input="true"></textarea>
                                </div><iframe style="display: none;"></iframe>
                            </div>
                        </div><button
                            class="text-white font-medium rounded-lg text-base px-5 py-3 w-full sm:w-auto text-center mb-6 bg-blue-700"
                            type="submit"><span class="flex justify-center items-center">Sign in to
                                account</span></button>
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Not registered?<a
                                class="ml-1 text-blue-700 hover:underline dark:text-blue-500" href="/register/">Create
                                an account.</a></div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

</template>

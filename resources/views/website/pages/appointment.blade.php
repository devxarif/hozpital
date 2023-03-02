@extends('website.layout.app')

@section('main')
<!-- Header -->
<div class="bg-warm-gray-50">
  <div class="py-24 lg:py-32">
    <div class="relative z-10 mx-auto max-w-7xl pl-4 pr-8 sm:px-6 lg:px-8">
      <h1 class="text-4xl font-bold tracking-tight text-warm-gray-900 sm:text-5xl lg:text-6xl">Book Appointment</h1>
      <p class="mt-6 max-w-3xl text-xl text-warm-gray-500">Vel nunc non ut montes, viverra tempor. Proin lectus nibh phasellus morbi non morbi. In elementum urna ut volutpat. Sagittis et vel et fermentum amet consequat.</p>
    </div>
  </div>
</div>

<!-- Contact section -->
<section class="relative bg-white" aria-labelledby="contact-heading">
  <div class="absolute h-1/2 w-full bg-warm-gray-50" aria-hidden="true"></div>
  <!-- Decorative dot pattern -->
  <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
    <svg class="absolute top-0 right-0 z-0 -translate-y-16 translate-x-1/2 transform sm:translate-x-1/4 md:-translate-y-24 lg:-translate-y-72" width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
      <defs>
        <pattern id="64e643ad-2176-4f86-b3d7-f2c5da3b6a6d" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
          <rect x="0" y="0" width="4" height="4" class="text-warm-gray-200" fill="currentColor"></rect>
        </pattern>
      </defs>
      <rect width="404" height="384" fill="url(#64e643ad-2176-4f86-b3d7-f2c5da3b6a6d)"></rect>
    </svg>
  </div>
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="relative bg-white shadow-xl">
      <h2 id="contact-heading" class="sr-only">Book Appointment</h2>

      <div class="grid grid-cols-1 lg:grid-cols-3">
        <!-- Contact information -->
        <div class="relative overflow-hidden bg-gradient-to-b from-blue-500 to-blue-600 py-10 px-6 sm:px-10 xl:p-12">
          <!-- Decorative angle backgrounds -->
          <div class="pointer-events-none absolute inset-0 sm:hidden" aria-hidden="true">
            <svg class="absolute inset-0 h-full w-full" width="343" height="388" viewBox="0 0 343 388" fill="none" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
              <path d="M-99 461.107L608.107-246l707.103 707.107-707.103 707.103L-99 461.107z" fill="url(#linear1)" fill-opacity=".1"></path>
              <defs>
                <linearGradient id="linear1" x1="254.553" y1="107.554" x2="961.66" y2="814.66" gradientUnits="userSpaceOnUse">
                  <stop stop-color="#fff"></stop>
                  <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                </linearGradient>
              </defs>
            </svg>
          </div>
          <div class="pointer-events-none absolute top-0 right-0 bottom-0 hidden w-1/2 sm:block lg:hidden" aria-hidden="true">
            <svg class="absolute inset-0 h-full w-full" width="359" height="339" viewBox="0 0 359 339" fill="none" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
              <path d="M-161 382.107L546.107-325l707.103 707.107-707.103 707.103L-161 382.107z" fill="url(#linear2)" fill-opacity=".1"></path>
              <defs>
                <linearGradient id="linear2" x1="192.553" y1="28.553" x2="899.66" y2="735.66" gradientUnits="userSpaceOnUse">
                  <stop stop-color="#fff"></stop>
                  <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                </linearGradient>
              </defs>
            </svg>
          </div>
          <div class="pointer-events-none absolute top-0 right-0 bottom-0 hidden w-1/2 lg:block" aria-hidden="true">
            <svg class="absolute inset-0 h-full w-full" width="160" height="678" viewBox="0 0 160 678" fill="none" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
              <path d="M-161 679.107L546.107-28l707.103 707.107-707.103 707.103L-161 679.107z" fill="url(#linear3)" fill-opacity=".1"></path>
              <defs>
                <linearGradient id="linear3" x1="192.553" y1="325.553" x2="899.66" y2="1032.66" gradientUnits="userSpaceOnUse">
                  <stop stop-color="#fff"></stop>
                  <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                </linearGradient>
              </defs>
            </svg>
          </div>
          <h3 class="text-lg font-medium text-white">Book Appointment</h3>
          <p class="mt-6 max-w-3xl text-base text-blue-50">Nullam risus blandit ac aliquam justo ipsum. Quam mauris volutpat massa dictumst amet. Sapien tortor lacus arcu.</p>
          <dl class="mt-8 space-y-6">
            <dt><span class="sr-only">Phone number</span></dt>
            <dd class="flex text-base text-blue-50">
              <svg class="h-6 w-6 flex-shrink-0 text-blue-200" x-description="Heroicon name: outline/phone" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"></path>
</svg>
              <span class="ml-3">+1 (555) 123-4567</span>
            </dd>
            <dt><span class="sr-only">Email</span></dt>
            <dd class="flex text-base text-blue-50">
              <svg class="h-6 w-6 flex-shrink-0 text-blue-200" x-description="Heroicon name: outline/envelope" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"></path>
</svg>
              <span class="ml-3">support@workcation.com</span>
            </dd>
          </dl>
          <ul role="list" class="mt-8 flex space-x-12">
            <li>
              <a class="text-blue-200 hover:text-blue-100" href="javascript:void(0)">
                <span class="sr-only">Facebook</span>
                <svg class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
<path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
</svg>
              </a>
            </li>
            <li>
              <a class="text-blue-200 hover:text-blue-100" href="javascript:void(0)">
                <span class="sr-only">GitHub</span>
                <svg class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
<path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
</svg>
              </a>
            </li>
            <li>
              <a class="text-blue-200 hover:text-blue-100" href="javascript:void(0)">
                <span class="sr-only">Twitter</span>
                <svg class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
<path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
</svg>
              </a>
            </li>
          </ul>
        </div>

        <!-- Contact form -->
        <div class="py-10 px-6 sm:px-10 lg:col-span-2 xl:p-12">
          <h3 class="text-lg font-medium text-warm-gray-900">Send us a message</h3>
          <form action="#" method="POST" class="mt-6 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
            <div>
              <label for="first-name" class="block text-sm font-medium text-warm-gray-900">First name</label>
              <div class="mt-1">
                <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-warm-gray-300 py-3 px-4 text-warm-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500">
              </div>
            </div>
            <div>
              <label for="last-name" class="block text-sm font-medium text-warm-gray-900">Last name</label>
              <div class="mt-1">
                <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-warm-gray-300 py-3 px-4 text-warm-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500">
              </div>
            </div>
            <div>
              <label for="email" class="block text-sm font-medium text-warm-gray-900">Email</label>
              <div class="mt-1">
                <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-warm-gray-300 py-3 px-4 text-warm-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500">
              </div>
            </div>
            <div>
              <div class="flex justify-between">
                <label for="phone" class="block text-sm font-medium text-warm-gray-900">Phone</label>
                <span id="phone-optional" class="text-sm text-warm-gray-500">Optional</span>
              </div>
              <div class="mt-1">
                <input type="text" name="phone" id="phone" autocomplete="tel" class="block w-full rounded-md border-warm-gray-300 py-3 px-4 text-warm-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500" aria-describedby="phone-optional">
              </div>
            </div>
            <div class="sm:col-span-2">
              <label for="subject" class="block text-sm font-medium text-warm-gray-900">Subject</label>
              <div class="mt-1">
                <input type="text" name="subject" id="subject" class="block w-full rounded-md border-warm-gray-300 py-3 px-4 text-warm-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500">
              </div>
            </div>
            <div class="sm:col-span-2">
              <div class="flex justify-between">
                <label for="message" class="block text-sm font-medium text-warm-gray-900">Message</label>
                <span id="message-max" class="text-sm text-warm-gray-500">Max. 500 characters</span>
              </div>
              <div class="mt-1">
                <textarea id="message" name="message" rows="4" class="block w-full rounded-md border-warm-gray-300 py-3 px-4 text-warm-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500" aria-describedby="message-max" data-gramm="false" wt-ignore-input="true"></textarea>
              </div>
            </div>
            <div class="sm:col-span-2 sm:flex sm:justify-end">
              <button type="submit" class="mt-2 inline-flex w-full items-center justify-center rounded-md border border-transparent bg-blue-500 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:w-auto">Submit</button>
            </div>
          </form>

          <div>
            <div class="flex items-center">
              <h2 class="flex-auto font-semibold text-gray-900">January 2022</h2>
              <button type="button" class="-my-1.5 flex flex-none items-center justify-center p-1.5 text-gray-400 hover:text-gray-500">
                <span class="sr-only">Previous month</span>
                <!-- Heroicon name: mini/chevron-left -->
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                </svg>
              </button>
              <button type="button" class="-my-1.5 -mr-1.5 ml-2 flex flex-none items-center justify-center p-1.5 text-gray-400 hover:text-gray-500">
                <span class="sr-only">Next month</span>
                <!-- Heroicon name: mini/chevron-right -->
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
              </button>
            </div>
            <div class="mt-10 grid grid-cols-7 text-center text-xs leading-6 text-gray-500">
              <div>M</div>
              <div>T</div>
              <div>W</div>
              <div>T</div>
              <div>F</div>
              <div>S</div>
              <div>S</div>
            </div>
            <div class="mt-2 grid grid-cols-7 text-sm">
              <div class="py-2">
                <!--
                  Always include: "mx-auto flex h-8 w-8 items-center justify-center rounded-full"
                  Is selected, include: "text-white"
                  Is not selected and is today, include: "text-blue-600"
                  Is not selected and is not today and is current month, include: "text-gray-900"
                  Is not selected and is not today and is not current month, include: "text-gray-400"
                  Is selected and is today, include: "bg-blue-600"
                  Is selected and is not today, include: "bg-gray-900"
                  Is not selected, include: "hover:bg-gray-200"
                  Is selected or is today, include: "font-semibold"
                -->
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-400 hover:bg-gray-200">
                  <time datetime="2021-12-27">27</time>
                </button>
              </div>
              <div class="py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-400 hover:bg-gray-200">
                  <time datetime="2021-12-28">28</time>
                </button>
              </div>
              <div class="py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-400 hover:bg-gray-200">
                  <time datetime="2021-12-29">29</time>
                </button>
              </div>
              <div class="py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-400 hover:bg-gray-200">
                  <time datetime="2021-12-30">30</time>
                </button>
              </div>
              <div class="py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-400 hover:bg-gray-200">
                  <time datetime="2021-12-31">31</time>
                </button>
              </div>
              <div class="py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-01">1</time>
                </button>
              </div>
              <div class="py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-02">2</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-03">3</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-04">4</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-05">5</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-06">6</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-07">7</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-08">8</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-09">9</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-10">10</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-11">11</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full font-semibold text-blue-600 hover:bg-gray-200">
                  <time datetime="2022-01-12">12</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-13">13</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-14">14</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-15">15</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-16">16</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-17">17</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-18">18</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-19">19</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-20">20</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full bg-gray-900 font-semibold text-white">
                  <time datetime="2022-01-21">21</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-22">22</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-23">23</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-24">24</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-25">25</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-26">26</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-27">27</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-28">28</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-29">29</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-30">30</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-900 hover:bg-gray-200">
                  <time datetime="2022-01-31">31</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-400 hover:bg-gray-200">
                  <time datetime="2022-02-01">1</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-400 hover:bg-gray-200">
                  <time datetime="2022-02-02">2</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-400 hover:bg-gray-200">
                  <time datetime="2022-02-03">3</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-400 hover:bg-gray-200">
                  <time datetime="2022-02-04">4</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-400 hover:bg-gray-200">
                  <time datetime="2022-02-05">5</time>
                </button>
              </div>
              <div class="border-t border-gray-200 py-2">
                <button type="button" class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-gray-400 hover:bg-gray-200">
                  <time datetime="2022-02-06">6</time>
                </button>
              </div>
            </div>
            <section class="mt-12">
              <h2 class="font-semibold text-gray-900">Schedule for <time datetime="2022-01-21">January 21, 2022</time></h2>
              <ol class="mt-4 space-y-1 text-sm leading-6 text-gray-500">
                <li class="group flex items-center space-x-4 rounded-xl py-2 px-4 focus-within:bg-gray-100 hover:bg-gray-100">
                  <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-10 w-10 flex-none rounded-full">
                  <div class="flex-auto">
                    <p class="text-gray-900">Leslie Alexander</p>
                    <p class="mt-0.5"><time datetime="2022-01-21T13:00">1:00 PM</time> - <time datetime="2022-01-21T14:30">2:30 PM</time></p>
                  </div>
                  <div class="relative opacity-0 focus-within:opacity-100 group-hover:opacity-100">
                    <div>
                      <button type="button" class="-m-2 flex items-center rounded-full p-1.5 text-gray-500 hover:text-gray-600" id="menu-0-button" aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Open options</span>
                        <!-- Heroicon name: outline/ellipsis-vertical -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                        </svg>
                      </button>
                    </div>

                    <!--
                      Dropdown menu, show/hide based on menu state.

                      Entering: "transition ease-out duration-100"
                        From: "transform opacity-0 scale-95"
                        To: "transform opacity-100 scale-100"
                      Leaving: "transition ease-in duration-75"
                        From: "transform opacity-100 scale-100"
                        To: "transform opacity-0 scale-95"
                    -->
                    <div class="absolute right-0 z-10 mt-2 w-36 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-0-button" tabindex="-1">
                      <div class="py-1" role="none">
                        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                        <a href="javascript:void(0)" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-0">Edit</a>
                        <a href="javascript:void(0)" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-0-item-1">Cancel</a>
                      </div>
                    </div>
                  </div>
                </li>

                <!-- More meetings... -->
              </ol>
            </section>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection

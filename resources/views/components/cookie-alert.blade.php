@if ($setting->cookies_alert_active)
    <div class="text-center p-5 bg-white text-sm flex-row justify-center items-center font-medium fixed bottom-0 w-full z-30 transition-all duration-300 ease-out shadow-cookies transform translate-y-0 opacity-100 shadow-xl bg-gray-100 border-t border-gray-200" id="cookie_content">
        <span class="inline-block mb:block mb-3.5 leading-6">
            {{ $setting->cookies_alert_message }}
        </span>
        <span class="inline-block"></span>
        <button onclick="hideCookie()" type="button" class="text-md leading-4 inline-flex items-center cursor-pointer transition ease-in-out duration-300 font-semibold font-body text-center justify-center border-0 border-transparent placeholder-white focus-visible:outline-none focus:outline-none rounded-md h-11 md:h-12 px-5 bg-blue-500 text-white py-2 transform-none normal-case hover:text-white hover:bg-gray-600 hover:shadow-cart">
            {{ $setting->cookies_alert_button_text }}
        </button>
    </div>
@endif

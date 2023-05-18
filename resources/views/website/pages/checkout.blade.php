@extends('website.layout.app')

@section('content')
<div class="relative grid grid-cols-1 gap-x-16 max-w-7xl mx-auto lg:px-8 lg:grid-cols-2 mt-20">
    <h1 class="sr-only">Checkout</h1>

    <section
        class="bg-gray-50 pt-6 pb-12 md:px-10 lg:max-w-lg lg:w-full lg:mx-auto lg:px-0 lg:pt-0 lg:pb-24 lg:bg-transparent lg:row-start-1 lg:col-start-2">
        <div class="max-w-2xl mx-auto px-4 lg:max-w-none lg:px-0">
            <h2 class="sr-only">Order summary</h2>

            <ul class="text-sm font-medium text-gray-900 divide-y divide-gray-200">
                <li class="flex items-start space-x-4 pb-6">
                    <div class="flex-shrink-0">
                        <img class="w-20 h-auto rounded-md"
                            src="https://demo.cartify.dev/storage/media/540/conversions/insulated-travel-mug-18-oz-white-1-thumb.jpg"
                            alt="insulated-travel-mug-18-oz-white-1.jpg">

                    </div>
                    <div class="ml-6 flex-1 flex flex-col">
                        <div class="flex">
                            <div class="min-w-0 flex-1">
                                <h4 class="text-sm">
                                    <a href="https://demo.cartify.dev/products/insulated-travel-mug-18-oz"
                                        class="font-medium text-gray-700 hover:text-gray-800">
                                        Insulated Travel Mug 18 Oz.
                                    </a>
                                </h4>
                                <p class="mt-1 text-sm text-gray-500">
                                    White
                                </p>
                            </div>
                        </div>
                        <div class="flex-1 pt-2 flex items-end justify-between">
                            <p class="mt-1 text-sm font-medium text-gray-900">
                                $28.00
                            </p>

                            <div class="ml-4 text-sm font-medium text-gray-900">
                                x1
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

            <dl class="text-sm font-medium text-gray-900 space-y-6 border-t border-gray-200 pt-6 lg:block">
                <div class="flex items-center justify-between">
                    <dt class="text-sm">Subtotal</dt>
                    <dd class="text-sm font-medium text-gray-900">
                        $28.00
                    </dd>
                </div>
                <div class="flex items-center justify-between">
                    <dt class="text-sm">Taxes</dt>
                    <dd class="text-sm font-medium text-gray-900">
                        <span class="font-normal text-gray-500">Calculated at next step</span>
                    </dd>
                </div>
                <div class="flex items-center justify-between">
                    <dt class="text-sm">Shipping</dt>
                    <dd class="text-sm font-medium text-gray-900">
                        <span class="font-normal text-gray-500">Calculated at next step</span>
                    </dd>
                </div>
                <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                    <dt class="text-base font-medium">Total</dt>
                    <dd class="text-base font-medium text-gray-900">
                        $28.00
                    </dd>
                </div>
            </dl>
        </div>
    </section>

    <section class="py-16 lg:max-w-lg lg:w-full lg:mx-auto lg:pt-0 lg:pb-24 lg:row-start-1 lg:col-start-1">
        <div class="max-w-2xl mx-auto px-4 lg:max-w-none lg:px-0">
            <div wire:id="M8QZqMg1PCTCiFdiMDM1">
                <div wire:id="x7HYMoVosPrEgfeB3lw3">
                    <div class="hidden mb-6 sm:block">
                        <nav class="flex" aria-label="Progress">
                            <ol role="list" class="flex items-center space-x-4">
                                <li class="flex items-center">
                                    <a href="https://demo.cartify.dev/cart"
                                        class="text-sm font-medium text-gray-500 hover:text-gray-700">
                                        Cart
                                    </a>
                                </li>

                                <li class="flex items-center">
                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg> <span
                                        class="ml-4 text-sm font-medium text-gray-500 cursor-pointer text-blue-600">
                                        Information
                                    </span>
                                </li>
                                <li class="flex items-center">
                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg> <span
                                        class="ml-4 text-sm font-medium text-gray-500 cursor-pointer hover:text-gray-600">
                                        Shipping
                                    </span>
                                </li>
                                <li class="flex items-center">
                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg> <span
                                        class="ml-4 text-sm font-medium text-gray-500 cursor-pointer hover:text-gray-600">
                                        Payment
                                    </span>
                                </li>
                            </ol>
                        </nav>
                    </div>

                    <form wire:submit.prevent="save">
                        <!-- Contact information -->
                        <div>
                            <h2 class="text-lg font-medium text-gray-900">Contact information</h2>

                            <div class="mt-4">
                                <div>
                                    <label class="block font-medium text-sm text-gray-700" for="contactEmail">
                                        Email
                                    </label>
                                    <input
                                        class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full sm:text-sm"
                                        type="text" wire:model.defer="cart.customer_email" id="contactEmail">
                                </div>
                            </div>
                        </div>

                        <!-- Shipping address -->
                        <div class="mt-10 border-t border-slate-200 pt-10">
                            <h2 class="text-lg font-medium text-gray-900">Shipping information</h2>

                            <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                <!-- Name -->
                                <div>
                                    <label class="block font-medium text-sm text-gray-700" for="shippingName">
                                        Name
                                    </label>
                                    <input
                                        class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full sm:text-sm"
                                        type="text" wire:model.defer="shipping_address.name" id="shippingName">
                                </div>
                                <!-- Phone -->
                                <div>
                                    <label class="block font-medium text-sm text-gray-700" for="shippingPhone">
                                        Phone
                                    </label>
                                    <input
                                        class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full sm:text-sm"
                                        type="text" wire:model.defer="shipping_address.phone" id="shippingPhone">
                                </div>
                                <!-- Company -->
                                <div class="sm:col-span-2">
                                    <label class="block font-medium text-sm text-gray-700" for="shippingCompanyName">
                                        Company
                                    </label>
                                    <input
                                        class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full sm:text-sm"
                                        type="text" wire:model.defer="shipping_address.company_name"
                                        id="shippingCompanyName">
                                </div>
                                <!-- Address -->
                                <div class="sm:col-span-2">
                                    <label class="block font-medium text-sm text-gray-700" for="shippingAddress">
                                        Address
                                    </label>
                                    <input
                                        class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full sm:text-sm"
                                        type="text" wire:model.defer="shipping_address.address" id="shippingAddress">
                                </div>
                                <!-- City -->
                                <div>
                                    <label class="block font-medium text-sm text-gray-700" for="shippingCity">
                                        City
                                    </label>
                                    <input
                                        class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full sm:text-sm"
                                        type="text" wire:model.defer="shipping_address.city" id="shippingCity">
                                </div>
                                <!-- Country -->
                                <div>
                                    <label class="block font-medium text-sm text-gray-700" for="shippingCountry">
                                        Country
                                    </label>
                                    <select
                                        class="border border-gray-300 rounded-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 mt-1 block w-full sm:text-sm"
                                        wire:model.defer="shipping_address.country_id" id="shippingCountry">
                                        <option value="">Please select</option>
                                        <option value="233">
                                            United States
                                        </option>
                                        <option value="33">
                                            Brunei
                                        </option>
                                        <option value="37">
                                            Cambodia
                                        </option>
                                        <option value="45">
                                            China
                                        </option>
                                        <option value="63">
                                            East Timor
                                        </option>
                                        <option value="81">
                                            Georgia
                                        </option>
                                        <option value="98">
                                            Hong Kong S.A.R.
                                        </option>
                                        <option value="101">
                                            India
                                        </option>
                                        <option value="102">
                                            Indonesia
                                        </option>
                                        <option value="103">
                                            Iran
                                        </option>
                                        <option value="104">
                                            Iraq
                                        </option>
                                        <option value="106">
                                            Israel
                                        </option>
                                        <option value="109">
                                            Japan
                                        </option>
                                        <option value="111">
                                            Jordan
                                        </option>
                                        <option value="112">
                                            Kazakhstan
                                        </option>
                                        <option value="115">
                                            North Korea
                                        </option>
                                        <option value="116">
                                            South Korea
                                        </option>
                                        <option value="117">
                                            Kuwait
                                        </option>
                                        <option value="118">
                                            Kyrgyzstan
                                        </option>
                                        <option value="119">
                                            Laos
                                        </option>
                                        <option value="121">
                                            Lebanon
                                        </option>
                                        <option value="132">
                                            Malaysia
                                        </option>
                                        <option value="133">
                                            Maldives
                                        </option>
                                        <option value="146">
                                            Mongolia
                                        </option>
                                        <option value="151">
                                            Myanmar
                                        </option>
                                        <option value="154">
                                            Nepal
                                        </option>
                                        <option value="166">
                                            Oman
                                        </option>
                                        <option value="167">
                                            Pakistan
                                        </option>
                                        <option value="169">
                                            Palestinian Territory Occupied
                                        </option>
                                        <option value="174">
                                            Philippines
                                        </option>
                                        <option value="179">
                                            Qatar
                                        </option>
                                        <option value="194">
                                            Saudi Arabia
                                        </option>
                                        <option value="199">
                                            Singapore
                                        </option>
                                        <option value="208">
                                            Sri Lanka
                                        </option>
                                        <option value="215">
                                            Syria
                                        </option>
                                        <option value="216">
                                            Taiwan
                                        </option>
                                        <option value="217">
                                            Tajikistan
                                        </option>
                                        <option value="219">
                                            Thailand
                                        </option>
                                        <option value="225">
                                            Turkey
                                        </option>
                                        <option value="226">
                                            Turkmenistan
                                        </option>
                                        <option value="231">
                                            United Arab Emirates
                                        </option>
                                        <option value="236">
                                            Uzbekistan
                                        </option>
                                        <option value="240">
                                            Vietnam
                                        </option>
                                        <option value="245">
                                            Yemen
                                        </option>
                                        <option value="1">
                                            Afghanistan
                                        </option>
                                        <option value="12">
                                            Armenia
                                        </option>
                                        <option value="16">
                                            Azerbaijan
                                        </option>
                                        <option value="18">
                                            Bahrain
                                        </option>
                                        <option value="19">
                                            Bangladesh
                                        </option>
                                        <option value="26">
                                            Bhutan
                                        </option>
                                        <option value="2">
                                            Aland Islands
                                        </option>
                                        <option value="3">
                                            Albania
                                        </option>
                                        <option value="6">
                                            Andorra
                                        </option>
                                        <option value="14">
                                            Australia
                                        </option>
                                        <option value="21">
                                            Belarus
                                        </option>
                                        <option value="22">
                                            Belgium
                                        </option>
                                        <option value="28">
                                            Bosnia and Herzegovina
                                        </option>
                                        <option value="34">
                                            Bulgaria
                                        </option>
                                        <option value="55">
                                            Croatia
                                        </option>
                                        <option value="58">
                                            Czech Republic
                                        </option>
                                        <option value="59">
                                            Denmark
                                        </option>
                                        <option value="69">
                                            Estonia
                                        </option>
                                        <option value="72">
                                            Faroe Islands
                                        </option>
                                        <option value="74">
                                            Finland
                                        </option>
                                        <option value="75">
                                            France
                                        </option>
                                        <option value="82">
                                            Germany
                                        </option>
                                        <option value="84">
                                            Gibraltar
                                        </option>
                                        <option value="85">
                                            Greece
                                        </option>
                                        <option value="91">
                                            Guernsey and Alderney
                                        </option>
                                        <option value="99">
                                            Hungary
                                        </option>
                                        <option value="100">
                                            Iceland
                                        </option>
                                        <option value="105">
                                            Ireland
                                        </option>
                                        <option value="107">
                                            Italy
                                        </option>
                                        <option value="110">
                                            Jersey
                                        </option>
                                        <option value="120">
                                            Latvia
                                        </option>
                                        <option value="125">
                                            Liechtenstein
                                        </option>
                                        <option value="126">
                                            Lithuania
                                        </option>
                                        <option value="127">
                                            Luxembourg
                                        </option>
                                        <option value="129">
                                            Macedonia
                                        </option>
                                        <option value="135">
                                            Malta
                                        </option>
                                        <option value="136">
                                            Man (Isle of)
                                        </option>
                                        <option value="144">
                                            Moldova
                                        </option>
                                        <option value="145">
                                            Monaco
                                        </option>
                                        <option value="147">
                                            Montenegro
                                        </option>
                                        <option value="156">
                                            Netherlands
                                        </option>
                                        <option value="165">
                                            Norway
                                        </option>
                                        <option value="176">
                                            Poland
                                        </option>
                                        <option value="177">
                                            Portugal
                                        </option>
                                        <option value="181">
                                            Romania
                                        </option>
                                        <option value="182">
                                            Russia
                                        </option>
                                        <option value="192">
                                            San Marino
                                        </option>
                                        <option value="196">
                                            Serbia
                                        </option>
                                        <option value="200">
                                            Slovakia
                                        </option>
                                        <option value="201">
                                            Slovenia
                                        </option>
                                        <option value="207">
                                            Spain
                                        </option>
                                        <option value="211">
                                            Svalbard And Jan Mayen Islands
                                        </option>
                                        <option value="213">
                                            Sweden
                                        </option>
                                        <option value="214">
                                            Switzerland
                                        </option>
                                        <option value="230">
                                            Ukraine
                                        </option>
                                        <option value="232">
                                            United Kingdom
                                        </option>
                                        <option value="238">
                                            Vatican City State (Holy See)
                                        </option>
                                        <option value="248">
                                            Kosovo
                                        </option>
                                        <option value="57">
                                            Cyprus
                                        </option>
                                        <option value="128">
                                            Macau S.A.R.
                                        </option>
                                        <option value="4">
                                            Algeria
                                        </option>
                                        <option value="7">
                                            Angola
                                        </option>
                                        <option value="24">
                                            Benin
                                        </option>
                                        <option value="29">
                                            Botswana
                                        </option>
                                        <option value="32">
                                            British Indian Ocean Territory
                                        </option>
                                        <option value="35">
                                            Burkina Faso
                                        </option>
                                        <option value="36">
                                            Burundi
                                        </option>
                                        <option value="38">
                                            Cameroon
                                        </option>
                                        <option value="40">
                                            Cape Verde
                                        </option>
                                        <option value="42">
                                            Central African Republic
                                        </option>
                                        <option value="43">
                                            Chad
                                        </option>
                                        <option value="49">
                                            Comoros
                                        </option>
                                        <option value="50">
                                            Congo
                                        </option>
                                        <option value="51">
                                            Democratic Republic of the Congo
                                        </option>
                                        <option value="54">
                                            Cote D'Ivoire (Ivory Coast)
                                        </option>
                                        <option value="60">
                                            Djibouti
                                        </option>
                                        <option value="65">
                                            Egypt
                                        </option>
                                        <option value="67">
                                            Equatorial Guinea
                                        </option>
                                        <option value="68">
                                            Eritrea
                                        </option>
                                        <option value="70">
                                            Ethiopia
                                        </option>
                                        <option value="78">
                                            French Southern Territories
                                        </option>
                                        <option value="79">
                                            Gabon
                                        </option>
                                        <option value="80">
                                            Gambia The
                                        </option>
                                        <option value="83">
                                            Ghana
                                        </option>
                                        <option value="92">
                                            Guinea
                                        </option>
                                        <option value="93">
                                            Guinea-Bissau
                                        </option>
                                        <option value="113">
                                            Kenya
                                        </option>
                                        <option value="122">
                                            Lesotho
                                        </option>
                                        <option value="123">
                                            Liberia
                                        </option>
                                        <option value="124">
                                            Libya
                                        </option>
                                        <option value="130">
                                            Madagascar
                                        </option>
                                        <option value="131">
                                            Malawi
                                        </option>
                                        <option value="134">
                                            Mali
                                        </option>
                                        <option value="139">
                                            Mauritania
                                        </option>
                                        <option value="140">
                                            Mauritius
                                        </option>
                                        <option value="141">
                                            Mayotte
                                        </option>
                                        <option value="149">
                                            Morocco
                                        </option>
                                        <option value="150">
                                            Mozambique
                                        </option>
                                        <option value="152">
                                            Namibia
                                        </option>
                                        <option value="160">
                                            Niger
                                        </option>
                                        <option value="161">
                                            Nigeria
                                        </option>
                                        <option value="180">
                                            Reunion
                                        </option>
                                        <option value="183">
                                            Rwanda
                                        </option>
                                        <option value="184">
                                            Saint Helena
                                        </option>
                                        <option value="193">
                                            Sao Tome and Principe
                                        </option>
                                        <option value="195">
                                            Senegal
                                        </option>
                                        <option value="197">
                                            Seychelles
                                        </option>
                                        <option value="198">
                                            Sierra Leone
                                        </option>
                                        <option value="203">
                                            Somalia
                                        </option>
                                        <option value="204">
                                            South Africa
                                        </option>
                                        <option value="206">
                                            South Sudan
                                        </option>
                                        <option value="212">
                                            Swaziland
                                        </option>
                                        <option value="218">
                                            Tanzania
                                        </option>
                                        <option value="220">
                                            Togo
                                        </option>
                                        <option value="224">
                                            Tunisia
                                        </option>
                                        <option value="229">
                                            Uganda
                                        </option>
                                        <option value="244">
                                            Western Sahara
                                        </option>
                                        <option value="246">
                                            Zambia
                                        </option>
                                        <option value="247">
                                            Zimbabwe
                                        </option>
                                        <option value="8">
                                            Anguilla
                                        </option>
                                        <option value="10">
                                            Antigua And Barbuda
                                        </option>
                                        <option value="11">
                                            Argentina
                                        </option>
                                        <option value="13">
                                            Aruba
                                        </option>
                                        <option value="17">
                                            The Bahamas
                                        </option>
                                        <option value="20">
                                            Barbados
                                        </option>
                                        <option value="23">
                                            Belize
                                        </option>
                                        <option value="25">
                                            Bermuda
                                        </option>
                                        <option value="27">
                                            Bolivia
                                        </option>
                                        <option value="31">
                                            Brazil
                                        </option>
                                        <option value="39">
                                            Canada
                                        </option>
                                        <option value="41">
                                            Cayman Islands
                                        </option>
                                        <option value="44">
                                            Chile
                                        </option>
                                        <option value="48">
                                            Colombia
                                        </option>
                                        <option value="53">
                                            Costa Rica
                                        </option>
                                        <option value="56">
                                            Cuba
                                        </option>
                                        <option value="61">
                                            Dominica
                                        </option>
                                        <option value="62">
                                            Dominican Republic
                                        </option>
                                        <option value="64">
                                            Ecuador
                                        </option>
                                        <option value="66">
                                            El Salvador
                                        </option>
                                        <option value="71">
                                            Falkland Islands
                                        </option>
                                        <option value="76">
                                            French Guiana
                                        </option>
                                        <option value="86">
                                            Greenland
                                        </option>
                                        <option value="87">
                                            Grenada
                                        </option>
                                        <option value="88">
                                            Guadeloupe
                                        </option>
                                        <option value="90">
                                            Guatemala
                                        </option>
                                        <option value="94">
                                            Guyana
                                        </option>
                                        <option value="95">
                                            Haiti
                                        </option>
                                        <option value="97">
                                            Honduras
                                        </option>
                                        <option value="108">
                                            Jamaica
                                        </option>
                                        <option value="138">
                                            Martinique
                                        </option>
                                        <option value="142">
                                            Mexico
                                        </option>
                                        <option value="148">
                                            Montserrat
                                        </option>
                                        <option value="155">
                                            Bonaire, Sint Eustatius and Saba
                                        </option>
                                        <option value="159">
                                            Nicaragua
                                        </option>
                                        <option value="170">
                                            Panama
                                        </option>
                                        <option value="172">
                                            Paraguay
                                        </option>
                                        <option value="173">
                                            Peru
                                        </option>
                                        <option value="178">
                                            Puerto Rico
                                        </option>
                                        <option value="185">
                                            Saint Kitts And Nevis
                                        </option>
                                        <option value="186">
                                            Saint Lucia
                                        </option>
                                        <option value="187">
                                            Saint Pierre and Miquelon
                                        </option>
                                        <option value="188">
                                            Saint Vincent And The Grenadines
                                        </option>
                                        <option value="189">
                                            Saint-Barthelemy
                                        </option>
                                        <option value="190">
                                            Saint-Martin (French part)
                                        </option>
                                        <option value="205">
                                            South Georgia
                                        </option>
                                        <option value="210">
                                            Suriname
                                        </option>
                                        <option value="223">
                                            Trinidad And Tobago
                                        </option>
                                        <option value="227">
                                            Turks And Caicos Islands
                                        </option>
                                        <option value="234">
                                            United States Minor Outlying Islands
                                        </option>
                                        <option value="235">
                                            Uruguay
                                        </option>
                                        <option value="239">
                                            Venezuela
                                        </option>
                                        <option value="241">
                                            Virgin Islands (British)
                                        </option>
                                        <option value="242">
                                            Virgin Islands (US)
                                        </option>
                                        <option value="249">
                                            Curaçao
                                        </option>
                                        <option value="250">
                                            Sint Maarten (Dutch part)
                                        </option>
                                        <option value="5">
                                            American Samoa
                                        </option>
                                        <option value="9">
                                            Antarctica
                                        </option>
                                        <option value="15">
                                            Austria
                                        </option>
                                        <option value="30">
                                            Bouvet Island
                                        </option>
                                        <option value="46">
                                            Christmas Island
                                        </option>
                                        <option value="47">
                                            Cocos (Keeling) Islands
                                        </option>
                                        <option value="52">
                                            Cook Islands
                                        </option>
                                        <option value="73">
                                            Fiji Islands
                                        </option>
                                        <option value="77">
                                            French Polynesia
                                        </option>
                                        <option value="89">
                                            Guam
                                        </option>
                                        <option value="96">
                                            Heard Island and McDonald Islands
                                        </option>
                                        <option value="114">
                                            Kiribati
                                        </option>
                                        <option value="137">
                                            Marshall Islands
                                        </option>
                                        <option value="143">
                                            Micronesia
                                        </option>
                                        <option value="153">
                                            Nauru
                                        </option>
                                        <option value="157">
                                            New Caledonia
                                        </option>
                                        <option value="158">
                                            New Zealand
                                        </option>
                                        <option value="162">
                                            Niue
                                        </option>
                                        <option value="163">
                                            Norfolk Island
                                        </option>
                                        <option value="164">
                                            Northern Mariana Islands
                                        </option>
                                        <option value="168">
                                            Palau
                                        </option>
                                        <option value="171">
                                            Papua new Guinea
                                        </option>
                                        <option value="175">
                                            Pitcairn Island
                                        </option>
                                        <option value="191">
                                            Samoa
                                        </option>
                                        <option value="202">
                                            Solomon Islands
                                        </option>
                                        <option value="209">
                                            Sudan
                                        </option>
                                        <option value="221">
                                            Tokelau
                                        </option>
                                        <option value="222">
                                            Tonga
                                        </option>
                                        <option value="228">
                                            Tuvalu
                                        </option>
                                        <option value="237">
                                            Vanuatu
                                        </option>
                                        <option value="243">
                                            Wallis And Futuna Islands
                                        </option>
                                    </select>
                                </div>
                                <!-- State -->
                                <div>
                                    <label class="block font-medium text-sm text-gray-700" for="shippingState">
                                        State/Province
                                    </label>
                                    <input
                                        class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full sm:text-sm"
                                        type="text" wire:model.defer="shipping_address.state" id="shippingState">
                                </div>
                                <!-- Zip/Postcode -->
                                <div>
                                    <label class="block font-medium text-sm text-gray-700" for="shippingPostalCode">
                                        Zip/Postal Code
                                    </label>
                                    <input
                                        class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full sm:text-sm"
                                        type="text" wire:model.defer="shipping_address.postcode"
                                        id="shippingPostalCode">
                                </div>
                            </div>
                        </div>

                        <div class="mt-10 pt-6 border-t border-gray-200 sm:flex sm:items-center sm:justify-between">
                            <a href="{{ route('website.shipping') }}"
                                class="inline-flex items-center justify-center px-4 py-2 text-sm border border-transparent rounded-md font-medium focus:outline-none focus:ring disabled:opacity-25 disabled:cursor-not-allowed transition bg-blue-600 text-white hover:bg-blue-500 focus:border-blue-700 focus:ring-blue-200 active:bg-blue-600 block w-full sm:ml-6 sm:order-last sm:w-auto"
                                type="submit">
                                Continue to shipping
                            </a>
                            <a href="https://demo.cartify.dev/cart"
                                class="flex items-center justify-center mt-4 text-sm text-gray-500 sm:mt-0 sm:text-left hover:text-gray-700">
                                <svg class="mr-2 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18">
                                    </path>
                                </svg> Return to cart
                            </a>
                        </div>
                    </form>
                </div>

                <!-- Livewire Component wire-end:x7HYMoVosPrEgfeB3lw3 -->
            </div>

            <!-- Livewire Component wire-end:M8QZqMg1PCTCiFdiMDM1 -->
        </div>
    </section>
</div>
@endsection

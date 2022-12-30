
import './bootstrap';

import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/inertia-vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createPinia } from 'pinia'

// import App from './App.vue'

const pinia = createPinia()
// const app = createApp(App)

// app.use(pinia)
// app.mount('#app')



import 'flowbite/dist/flowbite.js'
import '@themesberg/flowbite'

// 3rd party plugins
import FloatingVue from 'floating-vue'
import 'floating-vue/dist/style.css'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import Toaster from "@meforma/vue-toaster";
import vClickOutside from "click-outside-vue3"
import { InertiaProgress } from '@inertiajs/progress';
import Popper from "vue3-popper";
// import dayjs from 'dayjs';
// import RelativeTime from 'dayjs/plugin/relativeTime';

InertiaProgress.init({
    color: 'blue',
    delay: 500,
    includeCSS: true,
    showSpinner: true
})

// Layouts
import AppLayout from "@/Shared/Layout/App.vue";
import ErrorMessage from "@/Shared/Forms/ErrorMessage.vue";
import Loading from "@/Shared/Loading.vue";
import NoDataFound from "@/Shared/NoDataFound.vue";
import Label from "@/Shared/Forms/Label.vue";
import BaseInput from "@/Shared/Forms/BaseInput.vue";
import BaseSelect from "@/Shared/Forms/BaseSelect.vue";
import BaseTextarea from "@/Shared/Forms/BaseTextarea.vue";

// Icons
import CheckIcon from "@/Shared/Icons/CheckIcon.vue";
import LoadingIcon from "@/Shared/Icons/LoadingIcon.vue";
import HomeIcon from "@/Shared/Icons/HomeIcon.vue";

localStorage.removeItem('permissions')
localStorage.setItem('permissions', 'user.create,user.delete')



createInertiaApp({
  resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
        .use(plugin)
        .use(pinia)
        .use(FloatingVue)
        .use(vClickOutside)
        .use(VueSweetalert2)
        .use(Toaster, {
            position: 'top-right',
            duration: 5000,
        })
        .directive('can', (el, binding) => {
            console.log(binding.value)
            let permissions = localStorage.getItem('permissions');

            if (!permissions.includes(binding.value)) {
                el.parentNode.removeChild(el)
                // el.style.display = 'none';
            }
        })
        .mixin({
            components: {
                Head,
                Link,
                AppLayout,
                ErrorMessage,
                Loading,
                NoDataFound,
                Label,
                BaseInput,
                BaseSelect,
                BaseTextarea,
                CheckIcon,
                LoadingIcon,
                HomeIcon,
                Popper,
            },
            methods:{
                route: window.route,
                __(key, replace = {}) {
                    var translation = this.$page.props.language[key]
                        ? this.$page.props.language[key]
                        : key

                    Object.keys(replace).forEach(function (key) {
                        translation = translation.replace(':' + key, replace[key])
                    });

                    return translation
                },
                formateDate(date, format = 'MMMM D, YYYY') {
                    return dayjs(date).format(format);
                },
                timeFromNow(date) {
                    return dayjs(date).fromNow();
                },
                toastSuccess(message = 'Action completed successfully') {
                    this.$toast.success(message);
                },
                toastError(message = 'Something went wrong') {
                    this.$toast.error(message);
                },
                toastWarning(message = 'Something went wrong') {
                    this.$toast.warning(message);
                },
                currencyPosition(amount){
                    if(this.$page.props.current_currency_symbol_position == 'left'){
                        return amount +' '+ this.$page.props.current_currency_symbol;
                    }else{
                        return this.$page.props.current_currency_symbol + ' '+amount;
                    }
                },
                pluralize(val, word, plural = word + "s") {
                    const _pluralize = (num, word, plural = word + "s") => [1, -1].includes(Number(num)) ? word : plural;
                    if (typeof val === "object")
                        return (num, word) => _pluralize(num, word, val[word]);
                    return _pluralize(val, word, plural);
                },
                checkPagePermission(role) {
                    if (this.$page.props.authenticatedUser.role != role) {
                        // this.$router.push('/');
                        this.$inertia.get(route("error.403"))
                    }
                },
                checkDateValidity(start, end, equal = false) {
                    if (equal) {
                        if(end >= start) { return true }
                    }else{
                        if(end > start) { return true }
                    }

                    return false
                },
                wordLimit(sentence, size){
                    if (sentence.length > size ) {
                        return sentence.substring(0,size) + '...'
                    } else {
                        return sentence
                    }
                }
            },
            computed: {
                pageFlashes() {
                    return this.$page.props.flash
                }
            }
        })
        .mount(el)
  },
})


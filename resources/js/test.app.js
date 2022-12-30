
import './bootstrap';

import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/inertia-vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

import AppLayout from "@/Shared/Layout/App.vue";
import SampleLayout from "@/Shared/Layout/Sample.vue";

createInertiaApp({
    resolve: (name) => {
        if (name.includes("admin-panel")) {
            let str = name.split("/");
            let pagename = str.slice(1).join("/");
            let page = resolvePageComponent(
                `./AdminPanel/Pages/${pagename}.vue`,
                import.meta.glob("./**/*.vue")
            );
            page.then((module) => {
                module.default.layout = module.default.layout || AdminLayout;
            });

            return page;
        } else {
            let page = resolvePageComponent(
                `./Frontend/Pages/${name}.vue`,
                import.meta.glob("./Frontend/Pages/**/*.vue")
            );
            page.then((module) => {
                module.default.layout = module.default.layout || AppLayout;
            });

            return page;
        }

        const page = resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/Admin/**/*.vue")
        );

        console.log(page.layout )

        page.then((module) => {
            console.log(module.default, 1234)
            module.default.layout = module.default.layout || AppLayout;
        });

        // page.then((module) => {
        //     if (module.layout === undefined && module.__file.includes('/pages/auth/')) module.layout = SampleLayout;
        //     if (module.layout === undefined) module.layout = AppLayout;
        // });

        return page;
    },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
        .use(plugin)
        .mixin({
            components: {
                Head,
                Link,
            },
            methods:{
                route: window.route,
            }
        })
        .mount(el)
  },
})

// createInertiaApp({
//     title: (title) => `${title} - ${appName}`,
//     resolve: (name) => {
//         const page = resolvePageComponent(
//             `./Pages/${name}.vue`,
//             import.meta.glob("./Pages/**/*.vue")
//         );

//         page.then((module) => {
//             module.default.layout = module.default.layout || AppLayout;
//         });

//         return page;
//     },
//     setup({ el, app, props, plugin }) {
//         return createApp({ render: () => h(app, props) })
//             .use(plugin)
//             .use(ZiggyVue, Ziggy)
//             .mount(el);
//     },
// });

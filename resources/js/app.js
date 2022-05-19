require('./bootstrap');

import { createApp, h } from 'vue';
import { InertiaProgress } from '@inertiajs/progress';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import DefaultLayout from '@/Layouts/DefaultLayout';

InertiaProgress.init();

createInertiaApp({
    resolve: (name) => {
        let page = require(`./Pages/${name}.vue`).default;
        page.layout = page.layout || DefaultLayout;
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
});

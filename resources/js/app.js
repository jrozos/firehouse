/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// DASHBOARD
Vue.component(
  'dashboard-index',
  require('./components/dashboard/dashboard/DashboardComponent.vue').default,
);
Vue.component(
  'clients-index',
  require('./components/dashboard/clients/ClientsComponent.vue').default,
);
Vue.component(
  'artists-index',
  require('./components/dashboard/artists/ArtistsComponent.vue').default,
);
Vue.component(
  'assets-index',
  require('./components/dashboard/assets/AssetsIndex.vue').default,
);

// ADMIN
Vue.component(
  'admin-artists-index',
  require('./components/admin/artists/ArtistsIndex.vue').default,
);
Vue.component(
  'admin-tattoos-index',
  require('./components/admin/tattoos/TattoosIndex.vue').default,
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  el: '#app',
  data() {
    return {
      Artist: {
        Selected: '',
        Cleared: false,
      },
    };
  },
});

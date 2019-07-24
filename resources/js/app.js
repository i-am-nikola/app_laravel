/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('admin-lte/bower_components/jquery/dist/jquery.min.js');
require('admin-lte/bower_components/bootstrap/dist/js/bootstrap.min.js');
require('admin-lte/bower_components/datatables.net/js/jquery.dataTables.min.js');
require('admin-lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');
require('admin-lte/bower_components/fastclick/lib/fastclick.js');
require('admin-lte/dist/js/adminlte.min.js');
require('admin-lte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js');
require('admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');
require('admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');
require('admin-lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js');
require('admin-lte/dist/js/pages/dashboard2.js');
require('admin-lte/dist/js/demo.js');
require('admin-lte/plugins/iCheck/icheck.min.js');
require('admin-lte/bower_components/chart.js/Chart.js');
require('./common');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

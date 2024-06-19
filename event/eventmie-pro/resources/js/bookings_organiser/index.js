
/**
 * This is a page specific seperate vue instance initializer
 */

// include vue common libraries, plugins and components
require('../vue_common');

/**
 * Local Imports
*/


/**
 * Local Components 
 */
import OrganiserBooking from './components/OrganiserBooking';

/**
 * Local Vue Routes 
 */
const routes = new VueRouter({
    mode: 'history',
    base: '/',
    linkExactActiveClass: 'there',
    routes: [
        {
            path: path ? '/'+path+'/dashboard/mybookings' : '/dashboard/mybookings',
            // Inject  props based on route.query values for pagination
            props: (route) => ({
                page: route.query.page,
                date_format: date_format,
                hide_ticket_download: hide_ticket_download,
                hide_google_calendar: hide_google_calendar,
               
            }),
            name: 'organiserbooking',
            component: OrganiserBooking,

        },
    ],
});


/**
 * This is where we finally create a page specific
 * vue instance with required configs
 * element=app will remain common for all vue instances
 *
 * make sure to use window.app to make new Vue instance
 * so that we can access vue instance from anywhere
 * e.g interceptors 
 */
window.app = new Vue({
    el: '#eventmie_app',
    router: routes,
    
});
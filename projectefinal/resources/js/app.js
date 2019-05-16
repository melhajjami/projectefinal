
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

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
 * or customizze the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        message: 'asdasdasdasdd',
    },

    methods: {
        enviarsolicitud(receptor, sender) {
            var parametres = {
                sender: sender,
                receptor: receptor
            }
            axios.post('http://localhost:8000/api/friendship', parametres).then(function (response) {
                console.log(response);
                document.getElementById("boto").classList.add('disabled');
                document.getElementById("boto").innerHTML = 'Solicitud enviada';
            }).catch(function (error) {
                console.log(error.response);
            });
        }
    }
});

const plantilla = new Vue({
    el: '#plantilla',
    data: {
        message: 'asdasdasdasdd',
    },

    methods: {
        enviarsolicitud(receptor, sender) {
            var parametres = {
                sender: sender,
                receptor: receptor
            }
            axios.post('http://localhost:8000/api/friendship', parametres).then(function (response) {
                console.log(response);
                document.getElementById("boto").classList.add('disabled');
                document.getElementById("boto").innerHTML = 'Solicitud enviada';
            }).catch(function (error) {
                console.log(error.response);
            });
        }
    }
});

const profile = new Vue({
    el: '#profile',
    data: {
        message: 'asdasdasdasdd',
    },

    methods: {
        acceptarsolicitud(usuari, usuarilogin) {
            console.log(usuari, usuarilogin, "eliminar element a traves de $event de onclick, posar actiu = 1");
        },
        declinarsolicitud(usuari, usuarilogin) {
            console.log(usuari, usuarilogin, "Esborrar la relacio de la base de dades");
        }
    }
});

const biblioteca = new Vue({
    el: '#biblioteca',
    data: {
        message: 'asdasdasdasdd',
    },

    methods: {
        acceptarsolicitud(usuari, usuarilogin) {
            console.log(usuari, usuarilogin, "eliminar element a traves de $event de onclick, posar actiu = 1");
        },
        declinarsolicitud(usuari, usuarilogin) {
            console.log(usuari, usuarilogin, "Esborrar la relacio de la base de dades");
        }
    }
});

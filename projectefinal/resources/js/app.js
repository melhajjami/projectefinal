
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
        contador: 0,
        },
        
        methods: {
            enviarsolicitud(receptor,sender){
                var parametres={
                    sender:sender,
                    receptor:receptor
                }
                axios.post('http://localhost:8000/api/friendship',parametres).then(function(response) {
                    console.log(response);
                    document.getElementById("boto").classList.add('disabled');
                    document.getElementById("boto").innerHTML='Solicitud enviada';
                }).catch(function (error) {
                    console.log(error.response);
                });
            },
            acceptarsolicitud(usuari,usuarilogin){
                console.log(usuari,usuarilogin,"eliminar element a traves de $event de onclick, posar actiu = 1");
            },
            declinarsolicitud(usuari,usuarilogin){
                console.log(usuari,usuarilogin,"Esborrar la relacio de la base de dades");
            },
            secondsToTime(secs){
                var hours = Math.floor(secs / (60 * 60));

                var divisor_for_minutes = secs % (60 * 60);
                var minutes = Math.floor(divisor_for_minutes / 60);

                var divisor_for_seconds = divisor_for_minutes % 60;
                var seconds = Math.ceil(divisor_for_seconds);

                var string = "h: " + hours + " m: " + minutes + " s: " + seconds;
    
                return string;
            },
            obrirjoc(idjoc) {
                console.log("hola")
                var url = "http://localhost:8000/public/jocs/" + idjoc + "/index.html"
                var child = window.open(url);
                // var child = window.open('http://google.com','','toolbar=0,status=0,width=626,height=436');
                var timer = setInterval(checkChild, 1000);
                
                function checkChild() {
                    if (child.closed) {
                        alert("Good game nigger");   
                        clearInterval(timer);
                        document.getElementById("yo").innerHTML = secondsToTime(contador);;
                    }
                    else{
                        contador = contador + 1;
                    }
                }
            }
        }
});

    

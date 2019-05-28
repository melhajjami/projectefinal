
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
        jugant: false
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
                document.getElementById("boto").disabled = true;
            }).catch(function (error) {
                console.log(error.response);
            });
        },
        acceptarsolicitud(usuari, usuarilogin) {
            var parametres = {
                usuarilogin: usuarilogin,
            }
            axios.put('http://localhost:8000/api/friendship/' + usuari, parametres).then(function (response) {
                location.reload();
            }).catch(function (error) {
                console.log(error.response);
            });
        },
        declinarsolicitud(usuari, usuarilogin) {
            axios.delete('http://localhost:8000/api/friendship/' + usuari, { params: { id: usuarilogin } }).then(function (response) {
                location.reload();
            }).catch(function (error) {
                console.log(error.response);
            });
        },
        comprarJoc(usuari, joc, preu) {
            if (confirm("Vols comprar aquest joc per " + preu)) {
                var parametres = {
                    usuari: usuari,
                    joc: joc
                }
                axios.post('http://localhost:8000/api/biblioteca/', parametres).then(function (response) {
                    //comprovar si te diners o no
                    if (response.data < 0) {
                        alert("No tens prous monedes");
                    } else {

                        plantilla.canviarsaldo(response.data);
                        document.getElementById("posicioboto").innerHTML = "<a href=\"http://localhost:8000/biblioteca\" class=\"add-to-cart btn btn-default\">JUGAR</a>"

                        var x = document.getElementById("snackbar");

                        x.className = "show";

                        setTimeout(function () { x.className = x.className.replace("show", ""); }, 5000);
                    }
                }).catch(function (error) {
                    console.log(error.response);
                });
            }
        },
        // secondsToTime(secs){
        //     var hours = Math.floor(secs / (60 * 60));

        //     var divisor_for_minutes = secs % (60 * 60);
        //     var minutes = Math.floor(divisor_for_minutes / 60);

        //     var divisor_for_seconds = divisor_for_minutes % 60;
        //     var seconds = Math.ceil(divisor_for_seconds);

        //     var string = "h: " + hours + " m: " + minutes + " s: " + seconds;

        //     return string;
        // },
        obrirjoc(idjoc, idusuari) {
            this.jugant = true;
            console.log(this.jugant);
            var contador = 0;
            console.log(contador)
            var url = "http://localhost:8000/jocs/" + idjoc + "/index.html"
            var child = window.open(url);
            var timer = setInterval(checkChild, 1000, idjoc, idusuari);
            vm = this;

            function checkChild(idjoc, idusuari) {

                if (child.closed) {
                    vm.jugant = false;
                    // alert("Joc tencat");  
                    clearInterval(timer);
                    // canviartemps(idjoc, idusuari, contador);

                    var parametres = {
                        idusuari: idusuari,
                        idjoc: idjoc,
                        tempsjugat: contador
                    }
                    axios.post('http://localhost:8000/api/biblioteca', parametres).then(function (response) {
                        document.getElementById("mostrartempsjoc" + idjoc).innerHTML = "TEMPS JUGAT: " + secondsToTime(contador);;
                    }).catch(function (error) {
                        console.log(error.response);
                    });
                }
                else {
                    contador = contador + 1;
                    console.log(contador);
                }
            }

            function secondsToTime(secs) {
                var hours = Math.floor(secs / (60 * 60));

                var divisor_for_minutes = secs % (60 * 60);
                var minutes = Math.floor(divisor_for_minutes / 60);

                var divisor_for_seconds = divisor_for_minutes % 60;
                var seconds = Math.ceil(divisor_for_seconds);

                var string = "h: " + hours + " m: " + minutes + " s: " + seconds;

                return string;
            }
        },
        // canviartemps(idjoc, idusuari, tempsjugat){
        //     var parametres = {
        //         idusuari: idusuari,
        //         idjoc: idjoc,
        //         tempsjugat: tempsjugat
        //     }
        //     axios.post('http://localhost:8000/api/biblioteca',parametres).then(function(response) {
        //         document.getElementById("mostrartemps").innerHTML = "TEMPS JUGAT: " + secondsToTime(tempsjugat); //Falta fer secondstotime
        //     }).catch(function (error) {
        //         console.log(error.response);
        //     });
        // }
    }
});

const plantilla = new Vue({
    el: '#plantilla',
    data: {
        message: 'asdasdasdasdd',
        numeronotificacions: null
    },
    created() {
        if (this.numeronotificacions != null) {
            this.numeronotificacions = document.getElementById("numeronotificacions").innerHTML;
        }
    },
    methods: {
        canviarsaldo(saldo) {
            document.getElementById("saldo").innerHTML = "Monedes: " + saldo;
        },
        acceptarsolicitud(usuari, usuarilogin) {
            var parametres = {
                usuarilogin: usuarilogin,
            }
            axios.put('http://localhost:8000/api/friendship/' + usuari, parametres).then(function (response) {
                location.reload();
            }).catch(function (error) {
                console.log(error.response);
            });
        },
        declinarsolicitud(usuari, usuarilogin) {
            axios.delete('http://localhost:8000/api/friendship/' + usuari, { params: { id: usuarilogin } }).then(function (response) {
                location.reload();
            }).catch(function (error) {
                console.log(error.response);
            });
        }

    }
});
//JAVASCRIPT PER ENSENYAR POPUPS
    // Get the modal
    var modal = document.getElementById("popup");

    // Get the button that opens the modal
    var btn = document.getElementById("botopopup");
    

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    if(btn!=null){
    btn.onclick = function () {
        modal.style.display = "block";
    }
}
    // When the user clicks on <span> (x), close the modal
    if(span!=null){
    span.onclick = function () {
        modal.style.display = "none";
    }}

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    //JAVASCRIPT SI EL USUARI ES REGISTRE
    var modal = document.getElementById("registre");

    var span = document.getElementsByClassName("close")[0];

    
    if(span!=null){
    span.onclick = function () {
        modal.style.display = "none";
        console.log("tancat");
    }}
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
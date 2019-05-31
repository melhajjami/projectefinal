
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
        contadortext:0,
        jugant: false,
        obert: false
    },

    methods: {
        next(){
            var textos = ["La barra de navegació serà la teva millor amiga. <br>Accedeix a la <i class='fa fa-list-alt fa-lg'></i> Biblioteca per veure els teus jocs i jugar-los.",
             "Accedint a la <i class='fa fa-shopping-cart fa-lg'></i> Botiga podras comprar jocs. <br>També hi ha un rànking dels jocs més ben puntuats!",
            "A <i class='fa fa-bell fa-lg'></i> Invitacions d'amistat trobaràs totes les peticions d'amistat, i a <i class='fa fa-users'></i> Amics trobaràs tots els amics que tens. <br>Comença a fer amics!",
            "Finalment, tens un apartat amb la teva conta, on podras modificar-la, les monedes restants i una barra per cercar jocs i usuaris."];
            document.getElementById("textBenvinguda").innerHTML = textos[this.contadortext];
            if(this.contadortext == 3){
                document.getElementById('botonext').style.visibility = 'hidden';
            }
            else{
                this.contadortext++;
            }
        },
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
        obrirjoc(idjoc, identificadorjoc, idusuari) {
            // this.jugant = true;
            // console.log(this.jugant);
            // var contador = 0;
            // console.log(contador)
            // var url = "http://localhost:8000/jocs/" + idjoc + "/index.html"
            // var child = window.open(url);
            // var timer = setInterval(checkChild, 1000, idjoc, idusuari);

            // function checkChild(idjoc, idusuari) {

            //     if (child.closed) {
            //         vm.jugant = false;
            //         // alert("Joc tencat");  
            //         clearInterval(timer);
            //         // canviartemps(idjoc, idusuari, contador);

            //         var parametres = {
            //             idusuari: idusuari,
            //             idjoc: idjoc,
            //             tempsjugat: contador
            //         }
            //         axios.post('http://localhost:8000/api/biblioteca', parametres).then(function (response) {
            //             document.getElementById("mostrartempsjoc" + idjoc).innerHTML = "TEMPS JUGAT: " + secondsToTime(contador);;
            //         }).catch(function (error) {
            //             console.log(error.response);
            //         });
            //     }
            //     else {
            //         contador = contador + 1;
            //         console.log(contador);
            //     }
            // }

            // function secondsToTime(secs) {
            //     var hours = Math.floor(secs / (60 * 60));

            //     var divisor_for_minutes = secs % (60 * 60);
            //     var minutes = Math.floor(divisor_for_minutes / 60);

            //     var divisor_for_seconds = divisor_for_minutes % 60;
            //     var seconds = Math.ceil(divisor_for_seconds);

            //     var string = "h: " + hours + " m: " + minutes + " s: " + seconds;

            //     return string;
            // }

            vm = this;
            var contador = 0;
            //agafem els elements de frame, pagina normal i el boto de tancar frame
            var contingut = document.getElementById("biblioteca");
            var frame = document.getElementById("frame");
            // var tornar = document.getElementById("tornar");
            //al obrir joc es crea frame si no esta creat, sino modifica la url
            console.log(this.contador);
            if (this.obert == false) {
                var ifrm = document.createElement("iframe");
                ifrm.classList.add("iframe");
                ifrm.setAttribute("src", "http://localhost:8000/jocs/" + identificadorjoc + "/index.html");
                ifrm.style.width = "100%";
                ifrm.style.height = "100%";
                document.getElementById("frame").appendChild(ifrm);
                //creem el boto per tornar enrera
                var tornar = document.createElement("button");
                tornar.id = "tornar";
                tornar.classList.add("btn", "btn-dark");
                tornar.innerText = "Tornar enrere";
                document.getElementById("frame").appendChild(tornar);
                this.obert = true;
                contingut.style.display = "none";
                frame.style.display = "block";
                //es posa contador per saber el temps
                var timer = setInterval(checkChild, 1000, idjoc, idusuari);
                this.jugant = true;
            } else {
                var iframe = document.getElementsByClassName("iframe")[0];
                iframe.removeAttribute("src");
                iframe.setAttribute("src", "http://localhost:8000/jocs/" + identificadorjoc + "/index.html");
                var tornar = document.getElementById("tornar");
                contingut.style.display = "none";
                frame.style.display = "block";
                var timer = setInterval(checkChild, 1000, idjoc, idusuari);
                this.jugant = true;
            };

            function checkChild(idjoc, idusuari) {
                contador = contador + 1;
                //actualitzem la base de dades cada 1 segon, per si de cas usuari tanca pagina o reinicia
                var parametres = {
                    idusuari: idusuari,
                    tempsjugat: 1
                }
                axios.put('http://localhost:8000/api/biblioteca/' + idjoc, parametres).then(function (response) {
                    //No fem res, cada 5 segons es sumara a la base de dades 5 segons, per si de cas es tanca o refresh la pagina
                }).catch(function (error) {
                    console.log(error.response);
                });
                tornar.onclick = function () {
                    //si es torna enrera es para el contador i es torna a ensenyar pagina normal
                    vm.jugant = false;
                    vm.contador = contador;
                    clearInterval(timer);
                    contingut.style.display = "block";
                    frame.style.display = "none";
                    var tempsjugat = parseInt(document.getElementById(idjoc).innerText);
                    document.getElementById(idjoc).innerText = tempsjugat + vm.contador;
                }
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
var popup = document.getElementById("popup");

// Get the button that opens the modal
var btn = document.getElementById("botopopup");


// Get the <span> element that closes the modal
var spanger = document.getElementsByClassName("tancar")[0];

// When the user clicks on the button, open the modal
if (btn != null) {
    btn.onclick = function () {
        popup.style.display = "block";
    }
}
// When the user clicks on <span> (x), close the modal
if (spanger != null) {
    spanger.onclick = function () {
        popup.style.display = "none";
    }
}

// When the user clicks anywhere outside of the modal, close it

//JAVASCRIPT SI EL USUARI ES REGISTRE
var modal = document.getElementById("registre");

var span = document.getElementsByClassName("close")[0];


if (span != null) {
    span.onclick = function () {
        modal.style.display = "none";
        console.log("tancat");
    }
}

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    } else if (event.target == popup) {
        popup.style.display = "none";
    }
}
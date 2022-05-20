document.addEventListener("DOMContentLoaded", (event) => {
    // INSCRIPTION////////////////////////////////
    let p_erreur = document.querySelector(".erreur");
    let formInscription = document.querySelector["inscription"];
    let validation = document.getElementById("validation");
    let formConnexion = document.querySelector["connexion_form"];
    let valid_connexion = document.getElementById("valid_connexion");

    // controle regex
    let regexLowerCase = /[a-z]+/;
    let regexChiffre = /[0-9]+/;
    let regexUpperCase = /[A-Z]+/;
    let regexMail = /.+\@.+\..+/;
    // variable initialisé
    let nom = document.querySelector(".nom");
    let prenom = document.querySelector(".prenom");
    let email = document.querySelector(".email");
    let password = document.querySelector(".password");

    // Recherche
    let resultSearch = document.querySelector("#site-search");
    let form = document.querySelector("#search_form");

    // affichage recherche

    let firstViewResult = document.querySelector(".firstResult");
    let secondViewResult = document.querySelector(".secondResult");

    // fonction
    // Traitement de la recherche autocompletion

    let result;

    // traitement du résultat recherche

    function resultInputSearch(data, fetchArrayData) {
        console.log(data);
        console.log(fetchArrayData);

        dataMask = new RegExp(`^${data}`, "g");

        /*   console.log(fetchArrayData[1].nom.match(dataMask)); */

        for (i = 0; i < fetchArrayData.length; i++) {
            if (fetchArrayData[i].nom.match(dataMask) != null) {
                console.log("test ok");
                console.log(fetchArrayData[i]);
            }
        }
    }

    // fonction qui va créer le resultat de l'auto en deux listes
    function separateResultInTwoLi(data, fetchData) {
        resultInputSearch(data, fetchData);
    }

    function searchMethod(data) {
        if ((data.length = 1)) {
            let formData = new FormData(form);

            fetch("../Controllers/routerApi.php?action=search", {
                    method: "POST",
                    body: formData,
                })
                .then((response) => response.json())

            .then((response) => {
                separateResultInTwoLi(result, response);
                /*  console.log(response); */

                //afficher le résultat dans li ul search
            });
        }
    }

    // autocompletion

    if (resultSearch) {
        resultSearch.addEventListener("input", (e) => {
            e.preventDefault();
            result = e.target.value;
            searchMethod(result);
        });
    }

    // controle nom

    if (nom) {
        nom.addEventListener("keyup", function() {
            if (
                regexLowerCase.test(this.value) == false ||
                regexUpperCase.test(this.value) == false
            ) {
                if (p_erreur.innerHTML.length === 0) {
                    p_erreur.innerHTML =
                        "Votre nom doit contenir une minuscule et une majuscule";
                }
            } else {
                p_erreur.innerHTML = "";
            }
        });
    }

    // controle prenom
    if (prenom) {
        prenom.addEventListener("keyup", function() {
            if (
                regexLowerCase.test(this.value) == false ||
                regexUpperCase.test(this.value) == false
            ) {
                if (p_erreur.innerHTML.length === 0) {
                    p_erreur.innerHTML =
                        "Votre prenom doit contenir  minuscule et  majuscule !";
                }
            } else {
                p_erreur.innerHTML = "";
            }
        });
    }

    if (email) {
        email.addEventListener("keyup", function() {
            if (regexMail.test(this.value) === false) {
                if (p_erreur.innerHTML.length === 0) {
                    p_erreur.innerHTML = "Votre adresse mail est incorrect";
                }
            } else {
                p_erreur.innerHTML = "";
            }
        });
    }

    if (password) {
        password.addEventListener("keyup", function() {
            if (
                regexUpperCase.test(this.value) == false ||
                regexLowerCase.test(this.value) == false ||
                regexChiffre.test(this.value) == false
            ) {
                if (p_erreur.innerHTML.length === 0) {
                    p_erreur.innerHTML =
                        "Votre mot de passe doit contenir au moins Une majuscule, une minuscule et un chiffre";
                }
            } else {
                p_erreur.innerHTML = "";
            }
        });
    }

    // Inscription

    if (validation) {
        validation.addEventListener("click", function(e) {
            let formData = new FormData(formInscription);

            fetch("../Controllers/routerApi.php", {
                    method: "POST",
                    body: formData,
                })
                .then((response) => response.json())
                .then((response) => {
                    if (response.hasOwnProperty("valide")) {
                        window.location.replace("./index.php");
                    }

                    if (response.hasOwnProperty("error")) {
                        for (let i = 0; i < response.error.length; i++) {
                            console.log(response.error[i]);
                        }
                    }
                });
        });
    }

    // connexion

    if (valid_connexion) {
        valid_connexion.addEventListener("click", function(e) {
            e.preventDefault();
            let formData = new FormData(formConnexion);

            fetch("../Controllers/routerApi.php", {
                    method: "POST",
                    body: formData,
                })
                .then((response) => response.json())

            .then((response) => {
                console.log(response);

                if (response.hasOwnProperty("valide")) {
                    window.location.replace("./index.php");
                }

                if (response.hasOwnProperty("error")) {
                    for (let i = 0; i < response.error.length; i++) {
                        console.log(response.error[i]);
                    }
                }
            });
        });
    }
});
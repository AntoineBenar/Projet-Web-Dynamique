Vue.component('vuenavbar', {
    props: ['Prenom', 'Nom',],
    template: `
    <nav class="navbar navbar-expand-md">
    <div class="logo" href="index.html"><img src="assets/img/logoavecfond.jpg"><a class="nav-link" href= "index.html"></a></div>
    <div class="navbar-left">
            <div class = "functions"><div class="nav-item"><a class="nav-link" href="Research.html">Recherche</a></div></div>
            <div class = "functions"><div class="nav-item"><a class="nav-link" href="Enregistrement.html">Enregistrements</a></div></div>
            <div class = "functions"><div class="nav-item"><a class="nav-link" href="BookList.php">Livres</a></div></div> 
            <div class = "functions"><div class="nav-item"><a class="nav-link" href="Approvalpage.html">Validation</a></div></div> 
    </div>
    <div class="navbar-right">
        <div class = "logs"><div class="nav-item"><a class="nav-link" href="deconnexion.html">Déconnexion</a></div></div>
        <div class = "logs"><div class="nav-item"><a class="nav-link" href="Login.html">Connexion</a></div></div>
</div>
</nav>
    `,
    methods: {
        /**
         
         * @param {*} event l'objet event lié à l'évènement onclick.
         */
        onClick: function(event) {
            //deconnexion();
        
        }
    }
})

var bar = new Vue({
    el: "#vuenavbar",
    data: {
        id: 0, value: 'antoine',
        id: 1, value: 'bénar' ,

    }
})
Vue.component('vuenavbar', {
    props: ['Prenom', 'Nom',],
    template: `
    <div id="navbar">
        <navbar></navbar>
      </div>
         
    <nav class="navbar navbar-expand-md">
        <div class="logo" href="#"><img src="assets/img/logoavecfond.jpg"></div>
        <div class="navbar-left">
                <div class = "functions"><div class="nav-item"><a class="nav-link" href="users.php" onclick="users.php">Rôles</a></div></div>
                <div class = "functions"><div class="nav-item"><a class="nav-link" href="#">Enregistrements</a></div></div>
                <div class = "functions"><div class="nav-item"><a class="nav-link" href="#">Validation</a></div></div> 
        </div>
        <div class="navbar-right">
            <div class = "logs"><div class="nav-item"><a class="nav-link" href="#">Déconnexion</a></div></div>
            <div class = "logs"><div class="nav-item"><a class="nav-link" href="#">User</a></div></div>
    </div>
    </nav>
    `,
    methods: {
        /**
         
         * @param {*} event l'objet event lié à l'évènement onclick.
         */
        onClick: function(event) {
            //deconnexion();
            alert("POIL")
        
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
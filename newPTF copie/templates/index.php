<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="/app.css">
    </head>
        <body>
            <img class="img2" src="../assets/photoptf.png" alt="photo de moi">
            <h1 id="h1">DAVID MUNOZ</h1>
            <h4 id="h4">Jeune Développeur Web</h4>
            <div class="line5"></div>

            <h3 id="h7">DAVID
                        MUNOZ</h3>

            <h3 id="h3">"Je ne code pas pour coder,
                je code notre avenir."</h3>

            <nav id="menu" class="dropdown-menu">
                <button class="dropbtn" aria-label="Ouvrir le menu de navigation">Menu</button>
                <div class="dropdown-content" aria-label="Liens de navigation">
                    <a href="#bio" aria-label="Lien vers la section Biographie">Biographie</a>
                    <a href="#creations" aria-label="Lien vers la section Créations">Créations</a>
                    <a href="#formulaire" aria-label="Lien vers la section Contact">Contact</a>
                </div>
            </nav>

            <div class="line4"></div>

            <section id="bio">
                <h2 id="h6">A propos</h2>
                <p>Je m'appelle David Munoz, j'ai 20 ans et je suis un jeune développeur déterminé à toujours gagner. Originaire des banlieues parisiennes, j'habite à Argenteuil depuis maintenant 14 ans. Motivé par ma curiosité et mon sens de la création, le développement web est la voie que j'ai décidé de suivre pour réaliser mes objectifs.<br>
                    <br>
                    À la suite de cette décision, j'ai donc décidé de m'inscrire à l'école Digital Campus Paris afin d'apprendre aux côtés d'excellents formateurs les bases du codage et grâce aux stages en alternance, pouvoir m'immerger dans le métier de développeur. Cela revient donc à souligner l'importance d'un portfolio, qui pour moi est une très bonne chose car on peut s'exprimer, les personnes extérieures peuvent apprendre à nous connaître et nous contacter. Cela permet aussi de montrer nos projets personnels réalisés dans le cadre scolaire ou personnel.</p>
            </section>

            <section id="creations" >
                    <h2 id="h2">Créations</h2>      
            </section>
            <section>
                <img class="img"src="../assets/screenptf.png" alt="Capture d'écran du premier prototype de mon portfolio avec un autre style et animations">
                <h5 id="h8">Premier protoype de mon portfolio avec un autre style et animations</h5>
                <div class="line8"></div>

                <img class="img"src="../assets/dsbz.png" alt="Capture d'écran du redisign d'un site de ventes de Vinyle sur Figma">
                        
                <h5 id="h9">Redisign d'un site de ventes de Vinyle sur Figma</h5>
                <div class="line9"></div>

                <img class="img"src="../assets/screenwp.png" alt="Capture d'écran de mon site Wordpress.">
                <h5 id="h10">Site wordpress qui permet d'apprendre à faire du foot sur une jambe</h5>
                <div class="line10"></div>
            </section>


            <section id="formulaire" >
                <form class="glass-form" action="../add-ptfolio" method="post">
                    <div class="form-group ">
                        <label for="name"></label>
                        <input placeholder="Prenom"type="text" id="prenom" name="prenom" aria-label="Prénom">
                    </div>
                    <div class="form-group">
                        <label for="name"></label>
                        <input placeholder="Nom"type="text" id="nom" name="nom" aria-label="Nom">
                    </div>
                    <div class="form-group">
                        <label for="name"></label>
                        <input placeholder="Email"type="text" id="email" name="email" aria-label="Email">
                    </div>
                    <div class="form-group">
                        <label for="name"></label>
                        <input placeholder="Message"type="text" id="message" name="message" aria-label="Message">
                    </div>
                        <button>Envoyer</button>
                </form>
            </section>
            <section>
                <div class="icon">
                    <i class="fa-brands fa-linkedin" aria-label="Linkedin"></i>
                    <i class="fa-sharp fa-regular fa-envelope" aria-label="Mail"></i>
                    <i class="fa-regular fa-circle-question" aria-label="Aide"></i>
                </div>
            </section>
            <script src="script.js"></script>
        </body>
</html>
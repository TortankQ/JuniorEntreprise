# Junior Entreprise
Projet de site web scolaire - Ozturk Tayfun/Frillici Julien/Ekinci Bilge

Prérequis :

* Un ordinateur
* Le logiciel Wamp
* Un éditeur de texte

Installation base de données :
1. Lancer le logiciel Wamp
2. Rendez-vous sur votre navigateur et entrer l'URL suivant : http://localhost/phpmyadmin/
3. Entrer vos identifiants (local : login = root, pas de mot de passe) pour la base de données
4. Dans le menu de droite cliquer sur "Nouvelle base de données"
5. Entrer junior dans le "Nom de base de données" puis cliquer sur créer
6. cliquez sur l'onglet importer
7. choisissez le fichier jeu_test.sql puis Exécuter

NB : 
1. Des données de test sont présent dans les tables
2. Pour utiliser le site avec une base de données non local. Remplacer dans le fichier FrontController.php:

```	    
        define("HOTE",     "Votre hote");
    	define("BASE",     "Votre base");
    	define("LOGIN",    "Votre login");
    	define("PASSWORD", "Votre mot de passe");
```

Mise en place du site :
1. Dans le répertoire C:\wamp64\www\Projets copier tout les fichiers et dossiers présent sur GitHub
2. Dans votre navigateur entrer l'URL suivant : http://localhost/Projets/ 
3. Le site est prêt.

Compte sur le site :
Vous pouvez créer d'autre compte dans "Gestion des utlisateurs" en vous connectant en administrateur.

Dans le jeu de test les comptes sont : 

administrateur :

* login: test1234 
* mdp: toto

utilisateur :

* login: tayfun
* mdp: test

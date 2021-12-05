qd je mets en ligne

modifier construct.js ligne 429 et db.php

résumé du jeu :

construction de bâtiments, récupération de ressources, recrutement d'héros, augmentation de leur niveau, parcourir la carte pour récupérer des ressources pour se battre. Le but : battre le dragon de la carte

battre le dragon
pour cela il faut recruter et entraîner son équipe
et pour cela il faut avoir des ressources et pour accélerer on peut en récolter sur le monde, et se battre contre des monstres, et résister aux assauts ennemis qui veulent nos ressources
une sorte de clash of clans sans le côté mmo

faire bdd : joueur => pseudo nourriture bois or(mine) pierre(carrière) etc.
            carte => id carte, position (x,y), nom nourriture bois or pierre niveau force défense
- récupérer données -
créer le fichier sql des tables avec données
faire message flash qui indique action finie
bug sur la construction qui ne tient pas compte des ressources accumulées entre temps
mettre métal(extracteur), mana(tour) en ressource, maille (cotte de maille, forge), cuir(tannerie), épée(forge), arc(atelier), arbalète(atelier)
en cas ressource flèche qui diminue qd archer va au combat (carreau pour arbalétrier)
arbalétrier => cuir

besoin vache pour cuir qui diminuent dans le temps, augmenter niveau vache en même temps que cuir, sinon pénurie

créer ressources en réserve

si SOUCI avec fichier css, vider le cache

mettre taux production ressources par heure => fait

or trouvable uniquement sur les monstres

augmenter niveau bâtiment militaire avant de monter le niveau des héros

mettre gif animé d'attente ou barre de progression comme clikerheroes2 => fait

pour souci attente à blanc si pas asssez de ressources en ville pour le stockage => form pointant sur map.php, on remplit les champs avec les valeurs saisies, on compare les valeurs et on définit si isStockResourcesOK est true ou false

couleur ressource suffisantes ou pas en js pour colorisation en temps réel sans actualisation

bâtiments de défense : château, mur, tour de guet

bâtiments d'entraînement comptent dans les points de défense

niveau château limite les niveaux maximums des autres bâtiments

nouvelle ressource : les outils, collectables sur les monstres, pour réparer les bâtiments après attaque

2 niveaux : endommagé et détruit

soigner héros après combat

attaque d'un ennemi pourra être en même temps qu'une action et ne pas être annulée par f5 ou déconnexion

fonction eval pour nom de variable dynamique en js => ok

sauvegarder temps qu'ont passé les gens sur le site => fait

bug sur code sans classe sur couleur arcs => corrigé

bien traiter erreur quand on veut s'inscrire avec un pseudo déjà existant

fichiers logs => ok

cueillette, bûcheron, minerai

carte immense où l'on se déplace avec bouton flèche, ou touches claviers (event onkeydown)

recharger $_SESSION quand map.php se recharge

frêne, noisetier, chêne

sauge, belladone, sureau, ortie, millepertuis
millepertuis, ortie, sauge

mithril, thorium, cristal, quartz, titane, orichalque
mithril, orichalque, thorium

arc et arbalète construite à partir réserve planches frêne, puis noisetier, chêne etc.

vase pour améliorer bonheur des citoyens ?

ici, comment fonctionne un gestionnaire d'erreur SQL
https://openclassrooms.com/fr/courses/1959476-administrez-vos-bases-de-donnees-avec-mysql/1972565-gestionnaires-derreurs-curseurs-et-utilisation-avancee
tu peux gérer les erreurs SQL avec un handler SQL

pierre papier ciseaux lézard homme

jeux pour avoir des bonus (ressources augmentent 2 fois plus vite pendant une certaine itération)

jeux de hasard

faire classement joueurs

sauvegarde pseudo entré lors du rechargement de la page inscription lors erreur mdp

28/09

Début : page d'accueil où on s'identifie, on rentre son nom
Récupération des données pour le nom OK

quand on ajoute des nouvelles constructions, des nouvelles ressources, ajouter à Ranking.php, time.js

29/09

Découverte du bug de l'actualisation par f5 : remet les ressources au niveau du chargement de départ de la page

01/10

j'abandonne le bug de l'actualisation par f5 => finalement j'ai contourné le problème en envoyant le formulaire Sauvegarde ressources à intervalles réguliers par javascript => abandonné à intervalles régulier, je me sers juste du bouton sauvegarde pour sauvegarder les ressources avant de lancer une construction.
utilisation des ressources pour créer ferme, temps d'attente
adapter ressources à utiliser et temps en fonction du niveau
je vois pas comment faire le temps d'attente en php
addEventListener click pour appeler script

02/10

je retente pour faire un temps d'attente => cela fonctionne avec addventlistener sur le formulaire
je me lance dans la génération de ressources augmente avec le niveau => réussi
je crée le dépôt git
je crée le fichier sql de la bdd
je me lance dans la création de multiples ressources => réussi
soustraction multiples ressources => ok
message flash => ok
mise en stock => ok

03/10

complément fichier sql => multiples ressources
formatage des ressources pour avoir la séparation des milliers, millions etc. => ok
ressources needed or pierre métal formulaire construction
mise en place des multiples ressources de construction => ok
tooltip => ok

04/10

réorganisation arborescence et fichier map.php pour plus de clarté
mise en place de la construction à partir du stock
ressources pas enlevées du stock et niveau ne monte pas

05/10

construction à partir du stock => ok
ajout arc et arbalète => ok
plus de temps d'attente avant d'annuler construction car pas assez de ressources
marche pas avec scierie, pas testé avec atelier
souci sur le fichier save.php avec pseudo en dur => résolu

06/10

barre de progression colorée => OK

07/10

bug scierie corrigé par amélioration du code en faisant du DRY

08/10

amélioration barre de progression
construction, entraînement et stockage annulé si pas assez de ressources sans temps d'attente

09/10

bug ressources perdues lors attente construction, entraînement et mise en stock => résolu
bug actualisation avec les ressources perdues => résolu
commencement des points de ressources sur la carte

10/10

bug quand on a les ressources mais qu'on peut pas lancer construction sans recharger la page => corrigé
bug couleur pas mise à jour automatiquement des ressources => corrigé
corriger bug ressources en stock
rediriger qd mauvais pseudo ou qd session finie

11/10

bug ressources en stock => corrigé
rediriger qd mauvais pseudo ou qd session finie => ok
limitation construction niveau château php => ok

12/10

limitation construction niveau château js => ok

13/10

impossible désormais de lancer une 2e action avant que la 1ère soit finie côté js


14/10

passage à la POO
inscription en cours
bug sur sans classe sur couleur arcs
inscription finie
connexion en cours

15/10 - 16/10 - 17/10

passage à la POO

18/10

passage à la POO
bug tooltip archer => résolu
bouton archer fonctionnel
création du jeu papier ciseaux caillou lézard homme
je dois mettre en place la remise à 5 parties chaque jour, une fois par jour

19/10

enregistrement des logs en bdd => OK
remise à 5 parties chaque jour, une fois par jour => OK
je dois mettre en forme le code pcclh.php et map.php

20/10

mise en forme du code
mise en production de la version avec pcclh
mettre en place le comptage du temps passé sur le jeu

21/10

empêcher les joueurs de tricher en s'ajoutant des ressources
recherche d'images pour agrémenter le site

22/10

ajout de la sauvegarde du comptage du temps passé sur le jeu
travail sur le design

23/10

faire classement joueurs
les joueurs ne peuvent plus tricher
classement fait

24/10

A FAIRE :
tâches planifiées (pour ajout de ressources automatique par le serveur)
carte de 81 cases par 9 x 9 cartes
design card pour construire les bâtiments => en cours

25/10

travail sur le design

26/10

A FAIRE :
tâche planifiée qui lance l'attaque sur la ville
compter ressources dépensées pour les constructions dans les points
IDEES :
image cliquable sur carte
constructions se débloquent en fonction du niveau du château

recherche images constructions

27/10

création de la page fb et invitation de tous mes contacts

28/10

5 personnes aiment la page

31/10

mécanisme d'ajout de ressource de la carte en cours
ajouter position dans player et s'en servir pour récupérer quantité ressources => fait

01/11

empêcher les joueurs de tricher en modifiant les ressources nécessaires pour la construction en passant uniquement le bâtiment à améliorer. On récupère les infos de construction dans la bdd.
dans inscription remplir la table map_player avec l'id du nouveau joueur
mécanisme d'ajout de ressource de la carte en cours, il manque que le serveur rende actif les ressources prises au bout d'un certain temps => fichier php écrit : resetMapResources
faire apparaître disparaître la carte et les données de la ville en fonction des besoins => fait
empêcher les joueurs de récolter plusieurs ressources à la fois : fait en js

02/11

6 personnes aiment la page fb

03/11

texte explicatif du jeu sur la page de connexion => sur map.php
carte entière (tous les morceaux) changent chaque jour, aléatoirement => en cours
carte est à un niveau particulier, défini. la quantité des ressources est choisie aléatoirement, en fonction de valeurs en fonction du niveau => ok
faire événement qui donne en récompense par exemple unité spéciale avec forte attaque et défense
mettre buissons sur la carte et obtenir aléatoirement (genre 1/20) l'objet de quête
mettre neige au lieu d'herbe pendant l'hiver
mettre paille au lieu herbe l'été
mettre image bois coupé, tas diminué etc. quand on a récolté
gérer en php la vérification du temps d'attente de construction, faire pareil pour récolte
pour changer de carte, pas de combat, on doit atteindre une force définie
quête de crottin, déjection à ramasser
objets en récompense : augmentation un certain nombre de fois de la quantité de bois ou cueillette par ex. 18 planches de frêne au lieu de 9. minerai, herbe médicinale
battre x loups, ours

05/11

pouvoir vendre objets de quêtes et ressources aux autres joueurs (utiliser que or)
panneau aide pour expliquer comment jouer = ok
pouvoir confronter son équipe aux autres joueurs et gagner ressources

06/11

j'ai commencé à coder la création de map aléatoire (fillMapsWorld.php)

07/11

utilisation énergie pour changer de carte vers la droite. on commence à 0,0 et le dragon est à 9,9
pour avoir énergie, on doit fabriquer potion à partir herbes niveau 2
on peut l'acheter (herbe ou potion) à un autre joueur
faire que map_item se réinitialise chaque jour => ok
lors connexion on met à jour map_player
PROBLEME avec carte mise à jour à minuit, que faire pour mettre à jour celle des joueurs connectés ?
création de la carte 0,0 et iniatilisation lors de la connexion => OK
il faut que je fasse changer la carte (map_item) à minuit url incomplète LageDesRoisPOO/backend/fillMapsWorld.php => ok
enregistrer la date de connexion du joueur (last_connexion) => ok

12/11

expérience crafting ?
réactivation de la ressource au bout de 10 min => OK
modifier la vérification d'un jour passé pour la mise à jour => passage en tâche planifiée
gibier avec crafting nourriture ?
champignons ?

15/11

implémentation ajout produits (herbes, minerai, arbre) => ok
stockage en bdd moment construction ou récolte map et comparaison avec différence temps actuel pour empêcher de tricher temps raccourci en php
ajouter en bdd les produits et tester l'ajout produits => ok
le mettre en bdd en ligne => ok
implémenter expérience produits
s'occuper des monstres
last_connexion => ok
finir le fillMapsWorld.php en implémentant la suppression des journées de la veille, le mettre en task, mettre à jour les cartes des joueurs(voir si je le fais à partir de la task qui remplirait map_player ou lors de la connexion du player) => ok
faire message flash récolte sur carte

20/11

FAIRE : pour les constructions et l'entraînement, récupérer les infos de ressources nécessaires à partir de bdd, et pas passées dans l'url
HACKAGE : faire page pointant vers map.php avec un $_SESSION
FAIRE : remplir table item niveau 20
mise à jour du site avec nouveau design, carte et ressources et produits récoltables, mise à jour carte à minuit avec parties pcclh, ressources récoltées rerécoltrables au bout de 10 min, onglet aide

21/11

codage de l'événement Noël avec 6 houx à récolter dans les buissons. Mise en ligne début décembre
codage fini
codage du nombre de points personnel affiché sous le top 5

22/11

appel avec Damien : il est enthousiaste par rapport au jeu, m'a parlé du mini jeu du loto. Rendre visible la barre de progression tout le temps

23/11

test => 100 min pour avoir un houx avec 3 buissons
couleurs à faire à partir stock => fait
2e test 40 min
changement dans le décompte des points
FAIRE : task qui enregistre tous les points des joueurs à minuit

24/11

bug de non-redirection qd déconnecté en lançant construction => corrigé

27/11

codage de l'échange entre joueurs du houx
IDEE : peut-être faire monter les ressources au carré ou puissance fractionnaire

28/11

codage fini échange entre joueurs du houx
texte explicatif page de connexion
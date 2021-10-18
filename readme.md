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

mettre taux production ressources par heure

or trouvable uniquement sur les monstres

augmenter niveau bâtiment militaire avant de monter le niveau des héros

mettre gif animé d'attente ou barre de progression comme clikerheroes2

pour souci attente à blanc si pas asssez de ressources en ville pour le stockage => form pointant sur map.php, on remplit les champs avec les valeurs saisies, on compare les valeurs et on définit si isStockResourcesOK est true ou false

couleur ressource suffisantes ou pas en js pour colorisation en temps réel sans actualisation

bâtiments de défense : château, mur, tour de guet

bâtiments d'entraînement comptent dans les points de défense

niveau château limite les niveaux maximums des autres bâtiments

nouvelle ressource : les outils, collectables sur les monstres, pour réparer les bâtiments après attaque

2 niveaux : endommagé et détruit

soigner héros après combat

attaque d'un ennemi pourra être en même temps qu'une action et ne pas être annulée par f5 ou déconnexion

fonction eval pour nom de variable dynamique en js

sauvegarder temps qu'ont passé les gens sur le site

bug sur code sans classe sur couleur arcs

bien traiter erreur quand on veut s'inscrire avec un pseudo déjà existant

fichiers logs

cueillette, bûcheron, minerai

carte immense où l'on se déplace avec bouton flèche, ou touches claviers (event onkeydown)

recharger $_SESSION quand map.php se recharge

frêne, noisetier, chêne

arc et arbalète construite à partir réserve planches frêne, puis noisetier, chêne etc.


28/09

Début : page d'accueil où on s'identifie, on rentre son nom
Récupération des données pour le nom OK

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

impossible désormais de lancer une 2e action avant que la 1ère soit finie


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
bug tooltip archer
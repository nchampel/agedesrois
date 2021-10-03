résumé du jeu :

construction de bâtiments, récupération de ressources, recrutement d'héros, augmentation de leur niveau, parcourir la carte pour récupérer des ressources pour se battre. Le but : battre le dragon de la carte

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

28/09

Début : page d'accueil où on s'identifie, on rentre son nom
Récupération des données pour le nom OK

29/09

Découverte du bug de l'actualisation par f5 : remet les ressources au niveau du chargement de départ de la page

01/10

j'abandonne le bug de l'actualisation par f5 => finalement j'ai contourné le problème en envoyant le formulaire Sauvegarde ressources à intervalles réguliers par javascript
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
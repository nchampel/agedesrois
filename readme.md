faire bdd : joueur => pseudo nourriture bois or pierre etc.
            carte => id carte, position (x,y), nom nourriture bois or pierre niveau force défense
- récupérer données -
créer le fichier sql des tables avec données
faire message flash qui indique action finie

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
je me lance dans la création de multiples ressources
<?php

	$titre = 'Scénario réserver';
	include('entete.php');

	// affichage du formulaire
	echo ("
         
         
         Scénario 3 : ProgrammerDesSpectacles
         
         Bernard est gérant de la salle de spectacle MyTheatre.
         Il gère le planning des représentations.
         Pour la saison Hiver 2017-2018, il a reçu cette semaine 3 demandes de programmation de spectacles dans sa salle.
         Trois groupes d’artistes souhaitent se produire dans sa salle.
         Trois groupes ont accepté de le faire au tarif proposé et pendant l’une des périodes identifiées par Bernard.
         Point d'extension A
         
         <h3>Extension 3A1 </h3>
         
         Bernard ouvre son application de planification.
         Bernard prends les notes sur les périodes qu’il a proposées aux artistes.
         Deux des trois artistes proposent des pièces de théâtre.
         Bernard souhaite proposer une programmation variée.
         Bernard décode donc il va planifier ces 2 artistes avec un intervalle de temps d’au moins 1 mois.
         Dans les périodes proposées une seule configuration est possible.
         Bernard programme donc le spectacle 'La musique et moi' sur les deux premières semaines de septembre.
         Bernard choisit les jeudis, vendredis et samedis soirs (21h) et le dimanche après midi (18h)
         XXX début novembre pour des représentations 3 samedis soirs successifs.
         Le troisième spectacle proposé est un spectacle pour enfant.
         Ce spectacle s’est déjà produit l’année dernière.
         Ce spectace avait eu des demandes pour des représentations supplémentaires.
         Bernard veut profiter des vacances de la toussaint pour programmer ce spectacle.
         Le premier samedi de novembre est déjà programmé.
         
         * Bernard sait qu’il est beaucoup plus difficile de planifier des spectacles lorsque
         le week end n’est pas entièrement libre.
         
         Bernard choisit de mettre le spectacle pour enfant le premier dimanche de novembre.
         Bernard ne lui restera plus que les deux week end suivants pour lesquels il faudra trouver des spectacles à programmer les dimanches.
         Bernard envoie des mails aux trois artistes pour les informer des dates retenues. XXX
         
         <h3> Extension 3A2</h3>
         
         Bernard ouvre son application de planification.
         Bernard sélectionne les 3 artistes.
         Toutes les périodes qu’il leur avait proposées apparaissent alors.
         Deux des trois artistes proposent des pièces de théâtre.
         Bernard souhaite proposer une programmation variée.
         Bernard donc planifier ces 2 artistes avec un intervalle de temps d’au moins 1 mois.
         Dans les périodes proposées une seule configuration est possible.
         Bernard programme donc le spectacle 'La musique et moi' sur les deux
         Bernard programme donc le spectacle 'La musique et moi' sur les deux premières semaines de septembre.
         Bernard choisit les jeudis, vendredis et samedis soirs (21h) et le dimanche après midi (18h)
         
         <h3> Extension 3A3 </h3>
         
         Bernard ouvre son application de planification.
         
         Bernard sélectionne les 3 artistes.
         
         Toutes les périodes qu’il leur avait proposées apparaissent alors.
         
         Deux des trois artistes proposent des pièces de théâtre.
         
         Bernard souhaite proposer une programmation variée donc il va planifier ces
         
         2 artistes avec un intervalle de temps d’au moins 1 mois.
         
         Dans les périodes proposées une seule configuration est possible.
         
         Bernard programme donc La musique et moi sur les deux premières semaines de septembre les jeudis, vendredis et
         
         samedis soirs (21h) et le dimanche après midi (18h)
         
         Perdu début novembre pour des représentations 3 samedis soirs successifs.
         
         Une fois fait, La musique et moi et Perdu n’apparaissent plus dans les artistes à planifier.
         
         Un email est automatiquement envoyé aux contacts des artistes pour les informer des dates retenues et pour leur transmettre le contrat qui est à retourner signé sous 15j.
         
         Le troisième spectacle est un spectacle pour enfant.
         
         Ce spectacle s’est déjà produit l’année dernière et il avait eu des demandes pour des représentations supplémentaires.
         
         Il va profiter des vacances de la toussaint pour le programmer.
         
         Comme le premier samedi de novembre Perdu est programmé et qu’il sait qu’il est beaucoup plus difficile de planifier des spectacles lorsque le week end n’est pas entièrement libre, il choisit de mettre le spectacle pour enfant le premier dimanche de novembre.
         
         Il ne lui restera plus que les deux week end suivants pour lesquels il faudra trouver des spectacles à programmer les dimanches.
         
         Comme pour les deux autres artistes un email est automatiquement envoyé au contact.
         
         Bernard constate qu’il attend encore les réponses de 5 autres artistes à qui il a fait des propositions.
         
         Il choisit d’envoyer automatiquement un mail de rappel à 3 d’entre eux à qui il avait adressé une proposition le mois dernier.
	");

	include('pied.php');

?>

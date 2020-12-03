<?php

	$titre = 'Scénario réserver';
	include('entete.php');

	// affichage du formulaire
	echo ("
         Janine est infirmière, elle en charge d’organiser une sortie pour son équipe.
         L'équipe de Janine comporte 8 personnes.
         Janine consulte le programme en ligne de MyTheatre.
         Janine a déjà assisté à des spectacles dans cette salle.
         Janine sait qu’il y a tout type de spectacle.
         Janine cherche un qui pourrait plaire au plus grand nombre.
         Janine indique la période qui lui conviendrait, et obtient une liste de possibilités.
         Parmis celles-ci il y a un spectacle humoristique sur la vie en milieu hospitalier,
         Voilà un spectacle qui parlera à tous.
         Le coût de chaque billet en tarif plein est de 20€ par personne.
         Janine va prendre les billets.
         Point d'extension A
         
         <h3> Extension 2A1 </h3>
         
         Janine indique qu’il lui faut 8 billets.
         Janine paie 160€ par CB.
         Les collègues la rembourseront plus tard.
         Janine reçoit par email une confirmation qu’il lui faut présenter à l’accueil pour pouvoir assister au concert.
         
         <h3> Extension 2A2 </h3>
         
         Janine indique qu’il lui faut 8 billets. Vu la somme que cela représente le système ne lui
         propose que deux modes de paiement possible : Paypal ou CB.
         Janine paie 150€ par CB.
         Ses collègues la rembourseront plus tard.
         Janine reçoit par email une confirmation qu’il lui faut présenter à l’accueil pour pouvoir assister au spectacle.
         
         <h3> Extension 2A3 </h3>
         
         Janine indique qu’il lui faut 8 billets.
         Janine paie la commande.
         
         Janine peut ensuite choisir d’avoir ses billets en version imprimable (PDF) qui lui seront envoyées par email ou
         
         d’en avoir une version mobile qu’elle présenterait à l’entrée.
         
         Janine choisit de les avoir en version imprimable pour pouvoir les distribuer à chaque participant.
         
         <h3> Extension 2A4 </h3>

         Janine indique qu’il lui faut 8 billets.
         Janine choisit ses places pour qu’elles soient toutes les unes à côté des autres.
         Janine paie la commande, elle reçoit automatiquement un récapitulatif de sa commande.
         Janine peut ensuite choisir d’avoir ses billets en format imprimable (PDF) ou mobile.
         Quelque soit le format retenu, Janine devra de toute façon présenter ses billets à l'entrée.
         Elle choisit de les avoir en version imprimable pour pouvoir les distribuer à chaque participant.
         ");

	include('pied.php');

?>

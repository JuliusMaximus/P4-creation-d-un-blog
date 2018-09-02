$( document ).ready(function() {
	function calculPourcentageHauteur() {
		var hauteurDocument = $(document).height(); // Hauteur du document complet
		var hauteurFenetre = $(window).height(); // Hauteur de la fenêtre courante (viewport)
		var position = $(window).scrollTop(); // Position haute au moment du scroll
		var positionDernierEcran = hauteurDocument - hauteurFenetre; // Position haute du dernier écran visible
		var ratioHauteur = position / positionDernierEcran; // Ratio de la hauteur
		var pourcentageHauteur = Math.floor(ratioHauteur * 100); // Pourcentage de la hauteur

		return pourcentageHauteur;
	}

	// Barre de défilement horizontale en fonction du scroll
	function barreDefilement() {
		var cible = $("#barre-1 .progression");
		cible.css({
			"width": calculPourcentageHauteur()+"%"
		});
		$("#barre-1 .pourcentage").html(calculPourcentageHauteur()+"%");	
	}

	// Chargement des fonctions lors du chargement et du scroll
		$(window).on("load scroll", function() {
			barreDefilement(); // Barre-1
		});



});
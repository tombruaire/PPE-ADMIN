document.addEventListener("DOMContentLoaded", function() {
	$("#datatables-reponsive").DataTable({
		responsive: true, // Tableau responsive
		ordering: false, // Classement par ordre alphabétique
		iDisplayLength: 5, // Nombre d'affichage par défaut (au chargement de la page)
		language: {
			lengthMenu: 'Afficher <select class="form-select">'+
      		'<option value="1">1</option>'+ // Affichage de 1 colonne
      		'<option value="5">5</option>'+ // Affichage de 5 colonnes, etc...
      		'<option value="10">10</option>'+
      		'<option value="25">25</option>'+
     		'<option value="50">50</option>'+
      		'<option value="-1">100</option>'+ // Affichage de toutes les colonnes
      		'</select> colonnes',
            emptyTable: "Aucune donnée disponible dans le tableau",
    		info: "Affichage de _START_ à _END_ colonnes sur _TOTAL_ colonnes",
		    infoEmpty: "Affichage de l'élément 0 à 0 sur 0 élément",
		    infoFiltered: "(filtré à partir de _MAX_ éléments au total)",
		    infoThousands: ",",
		    loadingRecords: "Chargement...",
		    processing: "Traitement...",
		    search: "Rechercher :",
		    zeroRecords: "Aucune colonne trouvée",
		    paginate: {
		        previous: "Précédent",
		        next: "Suivant"
		    }
        }
	});
});
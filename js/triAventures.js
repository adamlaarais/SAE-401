document.addEventListener('DOMContentLoaded', () => {
    // ----------------------------------------------------------------------
    // 1) CUSTOM SELECT LOGIC
    // ----------------------------------------------------------------------
    var customSelects = document.getElementsByClassName("custom-select");
    
    for (let i = 0; i < customSelects.length; i++) {
        let selElement = customSelects[i];
        let selectedDiv = selElement.querySelector(".select-selected");
        let itemsDiv = selElement.querySelector(".select-items");
        let hiddenInput = document.getElementById(selElement.dataset.id);
        
        if (!selectedDiv || !itemsDiv || !hiddenInput) continue;
        
        // Ouvrir/fermer le menu au clic sur la boîte principale
        selectedDiv.addEventListener("click", function(e) {
            e.stopPropagation();
            closeAllSelect(this);
            itemsDiv.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
            
            // Si le menu s'ouvre, on ajuste le z-index pour le mettre au-dessus de tout
            if(!itemsDiv.classList.contains("select-hide")) {
                 selElement.parentNode.style.zIndex = "100";
            } else {
                 selElement.parentNode.style.zIndex = "1";
            }
        });
        
        // Actions lors du clic sur une option du menu
        let itemDivs = itemsDiv.getElementsByTagName("DIV");
        for (let j = 0; j < itemDivs.length; j++) {
            itemDivs[j].addEventListener("click", function(e) {
                // Mettre à jour le texte affiché
                selectedDiv.innerHTML = this.innerHTML;
                
                // Mettre à jour l'input caché
                hiddenInput.value = this.dataset.value;
                
                // Mettre à jour le style de l'élément sélectionné
                let currentSelected = itemsDiv.querySelector(".same-as-selected");
                if (currentSelected) currentSelected.classList.remove("same-as-selected");
                this.classList.add("same-as-selected");
                
                // Déclencher l'événement 'change' sur l'input caché pour lancer le tri
                hiddenInput.dispatchEvent(new Event('change'));
                
                // Fermer le menu
                selectedDiv.click();
            });
        }
    }
    
    // Fonction pour fermer tous les menus déroulants sauf celui cliqué
    function closeAllSelect(elmnt) {
        var items = document.getElementsByClassName("select-items");
        var selected = document.getElementsByClassName("select-selected");
        var containers = document.getElementsByClassName("custom-select-container");
        
        for (let i = 0; i < selected.length; i++) {
            if (elmnt !== selected[i]) {
                selected[i].classList.remove("select-arrow-active");
            }
        }
        for (let i = 0; i < items.length; i++) {
            if (elmnt && selected[i] === elmnt) continue;
            items[i].classList.add("select-hide");
            if(containers[i]) containers[i].style.zIndex = "1";
        }
    }
    
    // Fermer les menus si on clique en dehors
    document.addEventListener("click", closeAllSelect);


    // ----------------------------------------------------------------------
    // 2) SORTING LOGIC
    // ----------------------------------------------------------------------
    const selectCritere = document.getElementById('tri-critere');
    const selectOrdre = document.getElementById('tri-ordre');
    const grilleAventures = document.getElementById('grille-aventures');
    
    if(!grilleAventures) return;
    
    // Obtenir toutes les cartes initiales
    let cartes = Array.from(grilleAventures.querySelectorAll('.carte'));

    // Aide pour extraire une valeur numérique moyenne du nombre de joueurs
    function parseJoueursMoyenne(joueursStr) {
        if (!joueursStr) return 0;
        const rangeMatch = joueursStr.match(/(\d+)\s*(?:à|a|-|au|to)\s*(\d+)/i);
        if (rangeMatch) {
            return (parseInt(rangeMatch[1], 10) + parseInt(rangeMatch[2], 10)) / 2;
        }
        const singleMatch = joueursStr.match(/(\d+)/);
        if (singleMatch) {
            return parseInt(singleMatch[1], 10);
        }
        return 0;
    }

    function trierAventures() {
        if(!selectCritere || !selectOrdre) return;
        
        const critere = selectCritere.value; 
        const ordre = selectOrdre.value;     
        
        // Trier le tableau
        cartes.sort((carteA, carteB) => {
            let valA, valB;
            
            switch (critere) {
                case 'prix':
                    valA = parseFloat(carteA.dataset.prix) || 0;
                    valB = parseFloat(carteB.dataset.prix) || 0;
                    break;
                case 'difficulte':
                    valA = parseFloat(carteA.dataset.difficulte) || 0;
                    valB = parseFloat(carteB.dataset.difficulte) || 0;
                    break;
                case 'joueurs':
                    valA = parseJoueursMoyenne(carteA.dataset.joueurs);
                    valB = parseJoueursMoyenne(carteB.dataset.joueurs);
                    break;
                default:
                    valA = 0;
                    valB = 0;
            }
            
            // Appliquer l'ordre
            if (ordre === 'croissant') {
                return valA === valB ? 0 : (valA > valB ? 1 : -1);
            } else {
                return valA === valB ? 0 : (valA < valB ? 1 : -1);
            }
        });
        
        // Utiliser CSS flex/grid order pour trier au lieu de modifier le DOM
        cartes.forEach((carte, index) => {
            carte.style.order = index;
        });
    }

    // Écouteurs d'événements sur les inputs cachés
    if (selectCritere && selectOrdre) {
        selectCritere.addEventListener('change', trierAventures);
        selectOrdre.addEventListener('change', trierAventures);
        
        // Tri initial
        trierAventures();
    }
});


import { library, icon } from 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-svg-core@6.4.2/+esm'
import * as solidIcons from 'https://cdn.jsdelivr.net/npm/@fortawesome/free-solid-svg-icons@6.4.2/+esm'
import * as regularIcons from 'https://cdn.jsdelivr.net/npm/@fortawesome/free-regular-svg-icons@6.4.2/+esm'
import * as brandIcons from 'https://cdn.jsdelivr.net/npm/@fortawesome/free-brands-svg-icons@6.4.2/+esm'

// Initialiser la collection d'icônes une seule fois
const allIcons = {};
let iconArray = [];

// Fonction d'initialisation à exécuter une seule fois
function initializeIcons() {
  // Traiter les icônes solid
  Object.keys(solidIcons).forEach(key => {
    if (key.startsWith('fa')) {
      const iconObj = solidIcons[key];
      allIcons[key] = {
        icon: iconObj,
        prefix: 'fas',
        iconName: iconObj.iconName || key.replace(/^fa/, '').toLowerCase()
      };
    }
  });
  
  // Traiter les icônes regular
  Object.keys(regularIcons).forEach(key => {
    if (key.startsWith('fa')) {
      const iconObj = regularIcons[key];
      allIcons[key] = {
        icon: iconObj,
        prefix: 'far',
        iconName: iconObj.iconName || key.replace(/^fa/, '').toLowerCase()
      };
    }
  });
  
  // Traiter les icônes brand
  Object.keys(brandIcons).forEach(key => {
    if (key.startsWith('fa')) {
      const iconObj = brandIcons[key];
      allIcons[key] = {
        icon: iconObj,
        prefix: 'fab',
        iconName: iconObj.iconName || key.replace(/^fa/, '').toLowerCase()
      };
    }
  });
  
  // Ajouter les icônes à la bibliothèque
  Object.values(allIcons).forEach(iconData => {
    library.add(iconData.icon);
  });
  
  // Transformer en tableau pour l'autocomplétion
  iconArray = Object.keys(allIcons).map(key => ({
    key,
    ...allIcons[key]
  }));
}

function searchIcons(searchTerm, suggestionsDiv, searchInput) {
    // Filtrer les icônes
    const matches = iconArray.filter(iconData => 
        iconData.iconName.toLowerCase().includes(searchTerm)
    ).slice(0, 10); // Limiter à 10 résultats
    
    // Vider les suggestions précédentes
    suggestionsDiv.innerHTML = '';

    // Afficher les suggestions
    matches.forEach(iconData => {
        const div = document.createElement('li');
        div.className = 'dropdown-item';
        
        // Créer l'élément SVG de l'icône
        const iconElement = icon(iconData.icon).node[0];
        
        div.setAttribute('icon-key', iconData.key);
        div.appendChild(iconElement);

        const iconClass = iconData.prefix.replace(/([A-Z])/g, '-$1').toLowerCase() + ' ' + iconData.key.replace(/([A-Z])/g, '-$1').toLowerCase();

        div.appendChild(document.createTextNode(' ' + iconClass));
        
        // Ajouter l'événement de clic
        div.addEventListener('click', function() {
            searchInput.value = iconClass;

            $(searchInput).closest('.icons-autocomplete').next().html(iconElement);
            $(suggestionsDiv).hide();
            
            setTimeout(suggestionsDiv.innerHTML = '', 1000);
        });
        
        suggestionsDiv.append(div);
    });

    suggestionsDiv.show('slow');
    
}
$(document).ready(function() {
    initializeIcons();
    // search font awesome icons
    $('.search-icon').on('input', function() {
        // Implémentation de l'autocomplétion
        const searchInput = this;
        const suggestionsDiv = $(this).next();

        // Gestionnaire d'événement pour la saisie
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            
            if (searchTerm.length > 2) {
                setTimeout(searchIcons(searchTerm, suggestionsDiv, searchInput), 1000);
            } else {
                suggestionsDiv.hide();
            }

        
        });
        
        // Fermer les suggestions en cliquant ailleurs
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.icons-autocomplete').length) {
            $('.dropdown-menu').empty().hide();
            }
        });
    })
})

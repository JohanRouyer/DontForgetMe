/* 

La fonction header_searchbar() :

> Affiche et sélectionne automatiquement la barre de recherche du header si elle n'est pas affichée.
> Masque la barre de recherche et efface son contenu si elle est déjà affichée.

*/

function header_searchbar() {
    let element = document.getElementById("header-search-bar-display");
    let searchbar_icon = document.getElementById("searchbar-icon");
    let searchbar_cross = document.getElementById("searchbar-cross");

    if (element.className == "header-search-bar-display d-none") {
        element.className = "header-search-bar-display";
        searchbar_icon.className = "nav-icon d-none";
        searchbar_cross.className = "nav-icon";
        document.getElementById("header-search-bar").focus();
    } else {
        element.className = "header-search-bar-display d-none";
        searchbar_icon.className = "nav-icon";
        searchbar_cross.className = "nav-icon d-none";
        document.getElementById("header-search-bar").value = "";
    }
} 
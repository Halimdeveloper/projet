/*
    Script de géolocalisation basé sur l'API interne du navigateur
*/

    // le navigateur inspecte la géolocalisation de l'utilisateur seulement si ce dernier accepte d'être géolocalisé
navigator.geolocation.getCurrentPosition(success, error)

    //dans le cas où l'utilisateur accepte
    function success() {
        console.log('Localisé')
    }

    //dans le cas où il refuse
    function error() {
        console.log('Pas localisé')
    }


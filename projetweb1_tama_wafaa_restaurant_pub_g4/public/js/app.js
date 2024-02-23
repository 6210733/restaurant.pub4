// Importer les fonctionnalités nécessaires de Vue
import { ref, computed } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'

// Déclarer une référence pour les commentaires
export const commentaires = ref([])

// Déclarer une référence pour le commentaire actuel
export const commentaire_actuel = ref(null)

// Récupérer les données des commentaires à partir du fichier JSON
fetch('public/data/commentaires.json')
  .then(resp => resp.json())
  .then(data => {
    // Assigner les données des commentaires à la référence commentaires
    commentaires.value = data
    // Afficher un commentaire aléatoire lors du chargement des données
    afficherCommentaireAleatoire()
  })
  .catch(error => {
    console.error('Erreur lors de la récupération des données JSON:', error)
  })

// Fonction pour afficher un commentaire aléatoire parmi les commentaires disponibles
function afficherCommentaireAleatoire() {
  // Copier les commentaires dans un tableau temporaire
  const commentaires_copie = [...commentaires.value]

  // Mélanger les commentaires dans le tableau temporaire
  for (let i = commentaires_copie.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1))
    const temp = commentaires_copie[i]
    commentaires_copie[i] = commentaires_copie[j]
    commentaires_copie[j] = temp
  }

  let index = 0
  // Assigner le premier commentaire du tableau mélangé à la référence commentaire_actuel
  commentaire_actuel.value = commentaires_copie[index]
  index = (index + 1) % commentaires_copie.length

  // Changer de commentaire toutes les 5 secondes
  setInterval(() => {
    commentaire_actuel.value = commentaires_copie[index]
    index = (index + 1) % commentaires_copie.length
  }, 3000)
}

// Calculer les commentaires aléatoires en tant que tableau d'un seul élément
export const commentaires_aleatoires = computed(() => {
  return [commentaire_actuel.value]
})

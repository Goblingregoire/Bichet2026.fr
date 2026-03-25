# Système de Classement de Priorité des Projets

Une application web complète pour collecter et analyser les classements de priorité de projets.

## 🚀 Fonctionnalités

### Pour les utilisateurs
- **Interface intuitive** : Glisser-déposer pour classer les projets
- **Formulaire simple** : Nom et email requis
- **Confirmation immédiate** : Visualisation du classement soumis
- **Téléchargement automatique** : Fichier JSON avec les données de soumission

### Pour l'administration
- **Panneau d'administration** : Vue complète de toutes les soumissions
- **Statistiques en temps réel** : Nombre de soumissions, utilisateurs uniques, etc.
- **Analyse des priorités** : Graphique des priorités moyennes par projet
- **Export des données** : Exportation complète en JSON
- **Gestion des données** : Possibilité d'effacer toutes les données

## 📁 Structure des fichiers

```
├── index.html          # Formulaire principal pour les utilisateurs
├── admin.html          # Panneau d'administration
├── style.css           # Styles modernes et responsives
├── script.js           # Logique JavaScript complète
├── README.md           # Documentation
├── logo.png            # Logo personnalisé (à ajouter)
└── background.jpg      # Image de fond (à ajouter)
```

## 🛠️ Installation et déploiement

### Installation locale
1. Téléchargez tous les fichiers dans un répertoire
2. Ajoutez votre logo (`logo.png`) et votre image de fond (`background.jpg`)
3. Ouvrez `index.html` dans un navigateur web

### Déploiement sur hébergeur web
1. Uploadez tous les fichiers sur votre hébergeur (FTP, GitHub Pages, etc.)
2. Assurez-vous que les fichiers sont accessibles publiquement
3. L'application est immédiatement fonctionnelle

### Personnalisation
Pour personnaliser les couleurs et l'apparence :
1. Modifiez les variables CSS dans `style.css` :
   ```css
   :root {
       --primary-color: #2563eb;      /* Couleur principale */
       --secondary-color: #7c3aed;    /* Couleur secondaire */
       --text-color: #1f2937;         /* Couleur du texte */
   }
   ```

2. Remplacez `logo.png` et `background.jpg` par vos propres fichiers

## 📊 Utilisation

### Pour les participants
1. Accédez à `index.html`
2. Glissez-déposez les projets pour les classer par ordre de priorité
3. Remplissez votre nom et email
4. Cliquez sur "Soumettre mon classement"
5. Un fichier JSON avec vos données sera automatiquement téléchargé

### Pour l'administrateur
1. Accédez à `admin.html`
2. Visualisez toutes les soumissions en temps réel
3. Analysez les priorités globales avec le graphique
4. Exportez toutes les données avec le bouton "Exporter tout"
5. Utilisez "Effacer tout" pour réinitialiser (attention : irréversible)

## 🔧 Configuration des projets

Pour modifier la liste des projets, éditez le tableau `projects` dans `script.js` :

```javascript
const projects = [
    {
        id: 1,
        name: "Nom du projet",
        description: "Description du projet"
    },
    // Ajoutez d'autres projets ici
];
```

## 📱 Compatibilité

- ✅ Navigateurs modernes (Chrome, Firefox, Safari, Edge)
- ✅ Mobile responsive
- ✅ Tablette responsive
- ✅ Bureau

## 🔒 Sécurité

- Les données sont stockées localement dans le navigateur
- Pour une production, il est recommandé d'ajouter un backend pour :
  - Stockage sécurisé des données
  - Envoi d'emails réels
  - Authentification des administrateurs

## 📈 Évolutions possibles

- Backend avec Node.js/PHP pour stockage en base de données
- Système d'authentification pour les administrateurs
- Envoi d'emails automatiques avec service comme SendGrid
- Export CSV/Excel des résultats
- Graphiques avancés avec Chart.js
- Système de notifications pour nouvelles soumissions

## 🎨 Personnalisation avancée

### Modification du thème
Le design utilise des variables CSS pour une personnalisation facile. Modifiez les couleurs dans `:root` selon vos préférences.

### Ajout de nouveaux projets
1. Éditez `script.js`
2. Modifiez le tableau `projects`
3. Ajoutez autant de projets que nécessaire

### Intégration email
Pour remplacer la simulation d'email par un vrai service :
1. Configurez un backend (Node.js, PHP, etc.)
2. Utilisez un service d'email (SendGrid, Mailgun, etc.)
3. Remplacez la fonction `sendEmail()` dans `script.js`

## 📞 Support

Pour toute question ou modification :
- Vérifiez la console du navigateur pour les erreurs
- Consultez la documentation dans les commentaires du code
- Testez localement avant le déploiement

---

**Développé avec ❤️ pour une gestion efficace des priorités de projets**

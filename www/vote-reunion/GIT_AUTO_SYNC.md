# 🔄 Synchronisation Automatique avec GitHub

## 🎯 Objectif
Que vos modifications dans l'IDE soient automatiquement poussées sur GitHub Pages

## 🚀 Solution 1 : Git Auto-Commit (Recommandé)

### Installation
```bash
# Installer Git si ce n'est pas déjà fait
# macOS : brew install git
# Windows : https://git-scm.com/download/win
```

### Configuration automatique
Créez un fichier `auto-sync.sh` dans votre dossier :

```bash
#!/bin/bash
# auto-sync.sh - Synchronisation automatique avec GitHub

echo "🔄 Synchronisation avec GitHub..."

# Ajouter tous les fichiers modifiés
git add .

# Commit avec message automatique (timestamp)
git commit -m "Auto-sync: $(date '+%Y-%m-%d %H:%M:%S')"

# Push vers GitHub
git push origin main

echo "✅ Synchronisation terminée !"
```

### Utilisation
1. Rendez le script exécutable : `chmod +x auto-sync.sh`
2. Exécutez-le après vos modifications : `./auto-sync.sh`

## 🤖 Solution 2 : Surveillance automatique (Watch)

### Installation de fswatch
```bash
# macOS
brew install fswatch

# Linux
sudo apt-get install inotify-tools
```

### Script de surveillance
Créez `watch-sync.sh` :

```bash
#!/bin/bash
# watch-sync.sh - Surveillance et synchronisation automatique

echo "👀 Surveillance des modifications..."
echo "🔄 Les changements seront poussés automatiquement vers GitHub"

while true; do
    fswatch -1 . | head -1
    echo "📝 Modification détectée, synchronisation..."
    
    git add .
    git commit -m "Auto-sync: $(date '+%Y-%m-%d %H:%M:%S')"
    git push origin main
    
    echo "✅ Synchronisée !"
    sleep 2
done
```

### Utilisation
```bash
chmod +x watch-sync.sh
./watch-sync.sh
```

## 🎯 Solution 3 : Git Hooks (Plus avancé)

### Créer un hook post-commit
```bash
# Créer le dossier .git/hooks s'il n'existe pas
mkdir -p .git/hooks

# Créer le hook
cat > .git/hooks/post-commit << 'EOF'
#!/bin/bash
echo "🔄 Push automatique vers GitHub..."
git push origin main
EOF

# Rendre le hook exécutable
chmod +x .git/hooks/post-commit
```

## 🌐 Solution 4 : GitHub Desktop (Interface graphique)

1. **Téléchargez GitHub Desktop** : https://desktop.github.com/
2. **Clonez votre repository**
3. **Configurez l'auto-sync** :
   - Settings → Git → Automatically sync changes
4. **Travaillez normalement** dans votre IDE
5. **GitHub Desktop** détectera et poussera automatiquement

## 📱 Solution 5 : VS Code intégré

Si vous utilisez VS Code :

1. **Installez l'extension** : "GitLens"
2. **Configurez l'auto-commit** :
   ```json
   // settings.json
   {
       "git.enableSmartCommit": true,
       "git.autofetch": true,
       "git.postCommitCommand": "sync"
   }
   ```

## 🚀 Workflow recommandé

### Pour commencer
1. **Initialisez Git** dans votre dossier :
   ```bash
   cd /Users/bichetgregoire/Documents/Site\ papa/Puzel/CascadeProjects/2048
   git init
   git remote add origin https://github.com/VOTRE-USERNAME/classement-projets.git
   ```

2. **Premier push** :
   ```bash
   git add .
   git commit -m "Initial commit"
   git push -u origin main
   ```

3. **Activez GitHub Pages** :
   - Allez sur votre repository GitHub
   - Settings → Pages → Source: Deploy from a branch → main

### Au quotidien
1. **Modifiez vos fichiers** dans l'IDE
2. **Exécutez** : `./auto-sync.sh`
3. **Vérifiez** : `https://votre-username.github.io/classement-projets`

## ⚡ Script complet (auto-sync.sh)

```bash
#!/bin/bash
# Script de synchronisation automatique complet

# Configuration
REPO_NAME="classement-projets"
GITHUB_USER="VOTRE-USERNAME"

echo "🔄 Synchronisation automatique avec GitHub"
echo "=================================="

# Vérifier si on est dans le bon dossier
if [ ! -d ".git" ]; then
    echo "❌ Ce n'est pas un repository Git"
    echo "🚀 Initialisation..."
    git init
    git remote add origin https://github.com/$GITHUB_USER/$REPO_NAME.git
fi

# Vérifier les modifications
if git diff --quiet && git diff --cached --quiet; then
    echo "ℹ️ Aucune modification à synchroniser"
    exit 0
fi

# Ajouter les fichiers
echo "📁 Ajout des fichiers modifiés..."
git add .

# Commit avec message descriptif
echo "💾 Commit des modifications..."
COMMIT_MSG="Auto-sync: $(date '+%Y-%m-%d %H:%M:%S')"
if [ $# -eq 1 ]; then
    COMMIT_MSG="$1"
fi
git commit -m "$COMMIT_MSG"

# Push vers GitHub
echo "🚀 Push vers GitHub..."
git push origin main

# Vérifier le statut
if [ $? -eq 0 ]; then
    echo "✅ Synchronisation réussie !"
    echo "🌐 Votre site est disponible à : https://$GITHUB_USER.github.io/$REPO_NAME"
else
    echo "❌ Erreur lors du push"
    echo "💡 Vérifiez votre connexion internet et vos identifiants GitHub"
fi
```

## 🎉 Résultat final

Une fois configuré :
- ✅ **Modifiez** vos fichiers dans l'IDE
- ✅ **Exécutez** : `./auto-sync.sh`
- ✅ **Vos changements** sont en ligne sur GitHub Pages
- ✅ **Synchronisation** mobile/PC automatique

---

**Conseil :** Commencez avec la solution 1 (auto-sync.sh), c'est la plus simple et la plus fiable !

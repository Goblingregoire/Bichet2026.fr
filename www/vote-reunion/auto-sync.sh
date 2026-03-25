#!/bin/bash
# Script de synchronisation automatique avec GitHub

# Configuration (à modifier avec vos infos)
REPO_NAME="classement-projets"
GITHUB_USER="Goblingregoire"

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

# 🌐 Hébergement sur OVH

## 🎯 Options OVH pour votre application

### Option 1 : OVHcloud Web Hosting (Recommandé)
**Avantages :**
- ✅ Facile à configurer
- ✅ Support SSL/HTTPS gratuit
- ✅ Domaine personnalisé possible
- ✅ Panneau de contrôle simple

**Tarifs :**
- **Perso** : ~3€/mois (suffisant pour votre application)
- **Pro** : ~8€/mois (plus de fonctionnalités)

---

## 🚀 Option 1 : OVHcloud Web Hosting

### Étape 1 : Créer un compte OVH
1. Allez sur https://www.ovh.com/fr/
2. Créez un compte client
3. Choisissez une offre "Web Hosting"

### Étape 2 : Configuration du domaine
1. **Avec domaine OVH** : Choisissez un nom de domaine gratuit
2. **Avec votre domaine** : Utilisez un domaine existant

### Étape 3 : Upload des fichiers
**Méthode A : FTP (Recommandée)**
1. Installez FileZilla : https://filezilla-project.org/
2. Identifiants FTP dans votre espace OVH
3. Connectez-vous et uploadez tous vos fichiers

**Méthode B : Manager OVH**
1. Connectez-vous au Manager OVH
2. Hébergement → Multisite → Gestion des fichiers
3. Uploadez vos fichiers via l'interface

### Étape 4 : Configuration
1. **Dossier principal** : `/www/`
2. **Fichiers à uploader** :
   ```
   index.html
   admin.html
   login.html
   style.css
   script.js
   logo-2.png
   Fond.png
   README.md
   ```

---

## 🚀 Option 2 : VPS OVHcloud (Plus technique)

### Pour qui ?
- ✅ Si vous voulez plus de contrôle
- ✅ Si vous prévoyez d'ajouter un backend
- ✅ Si vous voulez installer Node.js/PHP

### Tarifs VPS
- **VPS SSD** : ~3€/mois
- **VPS Cloud** : ~5€/mois

### Installation rapide
```bash
# Sur votre VPS Ubuntu
sudo apt update
sudo apt install nginx
sudo systemctl start nginx

# Upload des fichiers dans /var/www/html/
```

---

## 🚀 Option 3 : Public Cloud OVHcloud

### Pour les projets ambitieux
- ✅ Scalabilité automatique
- ✅ Conteneurs Docker
- ✅ API et services managés

---

## 📋 Étapes détaillées - Web Hosting OVH

### 1. Souscription
1. Allez sur https://www.ovh.com/fr/hosting/
2. Choisissez l'offre "Perso"
3. Configurez votre domaine
4. Finalisez la commande

### 2. Accès FTP
Une fois activé, vous recevez :
- **Serveur FTP** : `ftp.clusterXXX.ovh.net`
- **Utilisateur** : `votre-username`
- **Mot de passe** : Dans votre manager OVH

### 3. Configuration FileZilla
1. Ouvrez FileZilla
2. Fichier → Gestionnaire de sites
3. Nouveau site :
   - **Hôte** : votre serveur FTP
   - **Utilisateur** : votre username FTP
   - **Mot de passe** : votre mot de passe
   - **Port** : 21

### 4. Upload des fichiers
1. Connectez-vous au FTP
2. Naviguez vers `/www/`
3. Glissez-déposez tous vos fichiers
4. Attendez la fin du transfert

### 5. Vérification
1. Ouvrez votre navigateur
2. Allez sur `https://votre-domaine.com`
3. Testez toutes les fonctionnalités

---

## 🔧 Configuration HTTPS/SSL

### SSL gratuit avec OVH
1. Dans le Manager OVH
2. Hébergement → SSL
3. Activez "Let's Encrypt"
4. Attendez 1-2h pour la génération

### Redirection HTTP → HTTPS
Ajoutez ce code dans un fichier `.htaccess` :
```apache
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

---

## 📱 Synchronisation Mobile/PC sur OVH

### Bonne nouvelle !
Votre système de synchronisation fonctionne **exactement de la même manière** sur OVH !

**Pourquoi ça marche :**
- ✅ **Même domaine** : `votre-domaine.com` sur tous les appareils
- ✅ **HTTPS gratuit** : Sécurité garantie
- ✅ **SessionStorage** : Partage des données entre appareils

### Test de synchronisation
1. **Déployez** sur OVH
2. **Mobile** : Soumettez un classement
3. **PC** : Ouvrez l'admin, les données apparaissent automatiquement

---

## 🎯 Avantages OVH vs GitHub Pages

### OVH
- ✅ **Domaine personnalisé** inclus
- ✅ **Email professionnel** possible
- ✅ **Support client** français
- ✅ **Plus de contrôle** sur la configuration
- ✅ **Backup automatique**

### GitHub Pages
- ✅ **100% gratuit**
- ✅ **Intégration Git** automatique
- ✅ **CDN mondial** très rapide
- ✅ **Très simple** à configurer

---

## 🚀 Recommandation finale

### Pour commencer
**OVH Web Hosting Perso** est parfait :
- 💰 **3€/mois** seulement
- 🌐 **Domaine inclus**
- 🔒 **HTTPS gratuit**
- 📱 **Synchronisation mobile/PC** automatique

### Pour économiser
**GitHub Pages** si budget limité :
- 💰 **Gratuit**
- 🔄 **Auto-sync** avec Git
- 📱 **Synchronisation** identique

---

## 📞 Support OVH

- **Téléphone** : 09 72 101 010
- **Chat** : Disponible sur le site
- **Documentation** : https://docs.ovh.com/
- **Communauté** : https://community.ovh.com/

---

## 🎉 Conclusion

OVH est une excellente solution pour héberger votre application avec :
- ✅ **Fiabilité** française
- ✅ **Support** réactif
- ✅ **Synchronisation** mobile/PC garantie
- ✅ **Sécurité** HTTPS inclus

**Votre application fonctionnera parfaitement sur OVH avec la synchronisation automatique entre mobile et PC !**

# Analyse des CV automatique basée sur le Machine Learning

## Description
Ce projet consiste à développer une solution automatisée pour l'analyse des CV à l'aide de techniques de Machine Learning. L'objectif est de simplifier et d'accélérer le processus de recrutement en extrayant les informations clés des CV et en les classant selon différents critères.

## Fonctionnalités
- Extraction automatique des informations à partir de CV en formats texte ou PDF (nom, prénom, email, compétences, expériences, etc.).
- Classification des CV selon différents critères : compétences techniques, expérience, formation, etc.
- Modèles de Machine Learning pour évaluer la pertinence d'un CV pour un poste donné.
- Interface utilisateur pour soumettre des CV et visualiser les résultats de l'analyse.

## Technologies utilisées
- **Langage de programmation** : Python
- **Frameworks et bibliothèques** :
  - Pandas : pour la manipulation des données.
  - Scikit-learn : pour l'implémentation des modèles de machine learning.
  - NLTK/Spacy : pour le traitement du langage naturel (NLP).
  - Tesseract : pour l'extraction de texte à partir d'images/PDFs.
- **Base de données** : SQLite/MySQL (selon vos choix).
- **Frontend** : Flask/Django pour l'interface utilisateur.

## Installation et configuration
### Prérequis
- Python 3.x installé.
- Installer les bibliothèques nécessaires via `pip` :
  
  ```bash
  pip install -r requirements.txt
  ```

### Étapes d'installation
1. Clonez le dépôt Git :

   ```bash
   git clone https://github.com/benyoussef01/analyse-automatique-des-CV-base-sur-machine-learninng.git
   ```

2. Accédez au répertoire du projet :

   ```bash
   cd analyse-automatique-des-CV-base-sur-machine-learninng
   ```

3. Créez un environnement virtuel (optionnel mais recommandé) :

   ```bash
   python -m venv env
   source env/bin/activate  # Sur Windows : env\Scripts\activate
   ```

4. Installez les dépendances :

   ```bash
   pip install -r requirements.txt
   ```

5. Exécutez le script principal pour lancer l'application :

   ```bash
   python app.py
   ```

## Utilisation
1. Lancer l'application avec la commande `python app.py`.
2. Accédez à l'interface utilisateur via `http://localhost:5000`.
3. Téléchargez un fichier de CV (PDF ou texte).
4. Visualisez les résultats de l'analyse sur l'interface.

## Modèles de Machine Learning
Le projet utilise divers algorithmes de machine learning, notamment :
- **Régression logistique** pour la classification.
- **Random Forest** pour l'évaluation de la pertinence.
- **Traitement du langage naturel (NLP)** pour extraire les compétences et expériences à partir du texte.

README.ME
## Contribuer
Les contributions sont les bienvenues ! N'hésitez pas à forker ce projet et à soumettre une pull request.

## Licence
Ce projet est sous licence MIT. Consultez le fichier pour plus de détails.

# Cahier des charges

## 1. Introduction

Ce document présente les attendus du projet de création d'un site de **prévention des catastrophes naturelles**. Vous y trouverez une explication du **contexte**, la listes des **besoins** du client, le détail du **périmètre du projet**, une description des **fonctionalités** attendues ainsi qu'un **planning prévisionnel** des étapes successives à la réalisation du dit projet.

## 2. Contexte de création du projet

Selon les statistiques, en 2022, **387 catastrophes naturelles** ont eu lieu dans le monde, dépassant de 5% la moyenne annuelle de la période 2002-2021. En particulier, entre 2000 et 2023, il y a eu entre **500 000 et 1 million de tremblements de terre par an**, dont 100 000 ont été ressentis et 1 000 étaient capables de causer des dégâts. Le **tsunami de 2004** dans l'océan Indien est la catastrophe la plus meurtrière des 30 dernières années, avec plus de **250 000 victimes**. Enfin, Environ **60 volcans actifs font éruption chaque année** parmi les 1 511 volcans actifs répertoriés.

Notre client, souhaite fonder un institut de surveillance mondiale des catastrophe naturelles et donc, se doter d'un site internet de prévention des risques. Pour cela, il souhaite s'inspirer de modèles comme le [CATNAT](www.catnat.ne) ou encore [notre-planete.info](https://www.notre-planete.info).

Les motivations principales du client incluent la volonté de **faire de la prévention au niveau des populations**, **d'investir dans l'I.A. prédictive**, et de **fournir des outils** aux chercheurs, populations et autorités du mone entier.

La cible principale de ce projet comprend les **chercheurs** en quête d'informations mais également plus largement le **public des 25-50 ans** qui souhaitent s'installer ou s'informer sur leur lieux de résidence.

En résumé, le lancement de ce site **prévention des catastrophes naturelles** et l'occasion pour notre client de **fédérer des ressources mondiales** autour du sujet et d'**informer les populations** des dangers éventuels.

## 3. Définition du besoin

Le projet doit répondre à plusieurs besoins spécifiques du client, qui sont à la fois sociologiques, sécuritaires et technologiques.

### 3.1 Besoins sociologiques

* **Offrir un service de prévention efficace** : Notre client souhaite proposer une plateforme sur laquelle les visiteurs pourront visualiser en temps (presque) réel les risques de catastrophes sur les différentes régions du monde. Pour cela, l'usage de modèle de Macine-Learning prédictif sera nécessaire.

* **Attirer des chercheurs** : En proposant un service de simulation et de prévention efficace, notre client souhaite faire de la future plateforme un outil indispensable pour les chercheurs du monde entier travaillant sur ces sujets.

### 3.2 Besoins sécuritaires

* **Promouvoir la prévention** : Notre client tient à ce que l'outil permette de prévenir les populations concernées et ainsi sauver des vies.

* **Aider les autorités** : Si l'outil de prévention est suffisemment efficace et correctement promu au près de autorités des pays concernés il pourra devenir un outil efficace de gestion des cataclismes.

### 3.3 Besoins technologiques

* **Investir dans l'IA** : Le client souhaite également devenir un acteur actif du marché des I.A. préventives il est donc promordiale que le site fourni s'appuie sur un ou plusieurs modèles de M.L. dès sa sortie.

* **Sécurité maximale** : Mettre en place des mesures de sécurité robustes, telles que l'authentification à deux facteurs, l'identification password-less et le chiffrement des données sensibles, afin de protéger les informations des utilisateurs et de garantir des transactions sécurisées.

# 4. Définition du périmètre du projet

## 4.1 Contraintes technologiques

Pour le développement du site, plusieurs technologies et outils seront utilisés pour garantir une expérience utilisateur optimale et une sécurité maximale. 

Voici un aperçu des technologies employées, sauf contre indication, l'usage de celles-ci est obligatoire :

### Front-end

* **HTML, CSS et JavaScript** : Ces langages de base seront utilisés pour structurer et styliser les pages web.
* **Bootstrap** : Ce framework CSS facilitera la création d'un design responsive et moderne.
* **Figma** : Cet outil graphique sera utilisé pour la création de wireframes, de zonings et de schémas, Figma permettra de visualiser et de planifier l'interface utilisateur.

### Back-end

* **PHP** : Le langage principal pour le développement côté serveur.
* **Symfony** : Ce framework PHP sera utilisé pour structurer l'application selon le modèle MVC (Modèle-Vue-Contrôleur), facilitant ainsi la maintenance et l'évolution du code.
* **Rubix ML** : Pour intégrer des fonctionnalités de machine learning, Rubix ML sera utilisé pour l'évaluation des prix des biens à vendre.
* **Librairie PHP GdImage** : Ce projet va nécessiter de générer des images depuis le PHP grâce à cette libraire, en particulier une mappemonde interactive.
* **JpGraph** : sivousnvoulez faire des graphs, vous devrez peut-être utiliser cette librairie, attention, elle ne tourne que sur une version de PHP inférieure à PHP 8.2.

### Base de données

* **MySQL** : Choisi pour sa robustesse et sa compatibilité avec PHP, MySQL sera le SGBD principal.
* **MongoDB** : Optionnellement, MongoDB pourra être utilisé pour sa flexibilité avec les données non structurées et son évolutivité. Une sérialisation-désérialisation **POO<->MongoDB** serait un très gros point fort.

### Outils de développement

* **Visual Studio Code (VS Code)** : L'IDE principal pour les développeurs, avec des extensions comme Prettier pour le formatage du code, PHP Intelephense pour les fonctionnalités avancées de PHP, et Markdown Preview Enhanced pour la lecture des fichiers Markdown.
* **MAMP** : Utilisé pour l'hébergement local, MAMP permettra de simuler un environnement de production en local.
* **GitHub** : Pour la gestion de versions, GitHub sera utilisé pour suivre les modifications du code et faciliter la collaboration entre les développeurs.

### Tests et CI/CD

* **PHPUnit** : Cet outil sera utilisé pour les tests unitaires en PHP, garantissant ainsi la qualité et la fiabilité du code.
* **GitHub Actions** : Pour l'intégration continue et le déploiement continu (CI/CD), GitHub Actions automatisera les pipelines de génération, de test et de déploiement.

### Sécurité

* **Authentification à deux facteurs ou Authentification pawword-less :** Pour sécuriser les comptes utilisateurs.
* **Chiffrement des données sensibles** : Pour protéger les informations personnelles et financières des utilisateurs.

Ces technologies et outils permettront de développer un site performant, sécurisé et évolutif, répondant aux besoins spécifiques du projet.

## 4.2 Ressources humaines et budget

### Ressources humaines

L'équipe sera formée de cinq développeurs back-end juniors formés au sein de l'école. Ils seront encadrés par un formateur sénior qui les guidera dans leurs développements.

### Ressources budgétaires

Aucun budget supplémentaire ne sera possible pour la réalisation du prototype attendu.

## 4.3 Exigences de sécurité

### Sécurité des données

Le site doit prévoir d'intégrer les technologies nécessaires fin de garantir :
- la **protection des données personnelles** des utilisateurs conformément aux réglementations en vigueur (ex : GDPR).
- la **sauvegarde régulière des données** et un plan de reprise après sinistre en cas de perte de données.

### Authentification et contrôle d'accès

Le site doit prévoir : 

- la mise en place de **mécanismes d'authentification forte** pour les utilisateurs et le personnel autorisé. Soit pas **authentification multifacteur** soit par **authentification passwordless**.
- la **gestion des droits d'accès** pour limiter l'accès aux informations sensibles uniquement aux personnes autorisées.

### Politique de confidentialité et conditions d'utilisation

Le site devra inclure une **politique de confidentialité** détaillée expliquant la collecte et l'utilisation des données des utilisateurs. Ainsi que des **conditions d'utilisation claires** pour les clients concernant les transactions, les retours et les échanges (du lorem ipsum ou texte généré par IA suffira).

# 5 Description fonctionnelle du besoin

Cette section détaille les fonctionnalités attendues du projet et fournies quelques exemple de fonctionnalités supplémentaires que vous pourriez implémenter dans votre prototype.

## 5.1 Fonctionnalités clés

Voici une liste de fonctionnalités possibles pour l'élaboration de votre projet. Certaines sont obligatoires, d'autres purement optionnelles, à vous d'implémenter dans votre prototype les fonctionnalités obligatoires et d'aller piocher dans celles optionnelles selon votre convenance.

### Interface utilisateur :

- **Page d'accueil attrayante et conviviale (obligatoire)** présentant le site, des articles et les outils disponibles.
- **Système de recherche avancée (obligatoire)** pour permettre aux utilisateurs de trouver un article.
- **Pages articles (obligatoire)** avec des images de qualité, des descriptions précises et des informations pertinentes.
- **Page de visualisation des risques de tremblements de terre** disponsant d'une carte mondiale et présentant les région à risques.

### Gestion des utilisateurs :

- **Système d'inscription et de connexion (obligatoire)** sécurisé pour les utilisateurs.
- **Profils utilisateurs (optionnel)** personnalisés permettant de sauvegarder les préférences et de consulter l'historique des articles lus.
- Possibilité pour les utilisateurs de **mettre des article en favoris**.

### Gestion des articles :

- **Interface d'administration (obligatoire)** pour ajouter, modifier ou supprimer des articles.
- **Catégorisation des articles (obligatoire)** par type, date, etc.

### Fonctionnalités supplémentaires :

- **Alertes en temps réel** pour recevoir des notifications instantanées sur les catastrophes naturelles en cours ou imminentes dans une région spécifique.
- **Cartes interactives** pour visualiser les zones à risque, les abris d'urgence, les itinéraires d'évacuation et les ressources disponibles en cas de catastrophe.
- **Planification d'urgence personnalisée** pour créer des plans d'action personnalisés en fonction de la localisation de l'utilisateur et des risques naturels spécifiques à sa région.
- **Partage de témoignages** pour encourager les survivants de catastrophes à partager leurs histoires pour sensibiliser et inspirer d'autres personnes à se préparer adéquatement.

## 5.2 Algorithmes de machine learning (obligatoire)

Votre prototype devra impérativement exploiter un modèle de machine-learning de type **Gradient Boost** entrainé à évaluer la l'amplitude moyenne d'un séisme à partir des coordonnées d'un lieu (latitude et longitude).

Les algoryhtmes et modèles vous seront fournis et vous pourrez les utiliser directement dans le développement de votre prototype, même si, améliorer ceux-ci avec vos propre entraînements et réglages reste possible, ce n'est pas l'objectif premier.

Pour être plus précis, le modèle quivous est fournie est très imparfait, mais il peut suffire pour un la création d'un protoype. En particulier, voici ces principaux défauts : 

- Le modèle n'est pas entraîné à prévoir la fréquence des séismes, juste leur amplitude. Un travail plus abouti sur la base de donnée d'origine permettrait de calculer l'intervale moyen entre deux séisme dans une même région, puis d'entraîner un modèle de ML avec ces données.

- Le modèle prévoit relativement bien (à la louche) la magnitude de séisme à des coordonnées qu'il connait (celles contenues dans la BDD d'origine). Mais, sur des coordonnées inconnues... Il dit n'importe quoi (ex : magnitude 4 à Paris). Une amélioration possible serait de filtrer les coordonnées à la saisie pour ne demander au modèle que des prédictions sur des données qu'il connait; c'est à dire qui se trouvent dans la BDD (avec une marge de tolérance).

# 6 Plan d'action

Organisez-vous pour suivre (en l'adaptant si besoin) le plan d'action suivant afin de vous permettre de créer l'ensemble de votre prototype dans les temps.

Nul besoin de créer des dizaines de pages, dans un tel prototype, entre cinq et huit pages parfaitement fonctionnelles suffisent largement.

## 6.1 Analyse de marché et validation du concept (1/2 j.)

Lors de cette étape préparatoire au projet, l'équipe devra mener des recherches sur internet (chacun de son côté), en se rendant sur d'autres traitants de sujets similires et en prenant des notes sur ce qui est bien fait et ce qui l'est moins. Cette étape rapide (première matinée) permet de se mettre dans le bain et de commencer à s'approprier le sujet.

## 6.2 Design rapide d'un prototype (1/2 j.)

Cette étape rapide permet de faire quelques croquis très simplistes du future site. L'équipe se concentrera surtout sur les fonctionnalités, surtout pas sur l'esthétique qui n'a aucune importante pour ce prototype. À l'issue de cette phase, l'équipe se réunira pour créer un croqui final des pages à réaliser en gardant les meilleurs idées de chacun.

## 6.3 Développement front-end (2 j.)

Le développement d'un front-end doit se faire assez rapidement, même si il n'est pas finalisé. Dans ce but, l'équipe utiliser le framework CSS Bootstrap afin de gagner du temps, de disposer d'une grille responsive et d'avoir un design (celui de défaut de boostrap) suffisement propre pour une présentation du prototype au client. Il n'est pas question de passer des heures à choisir des couleurs, l'équipe n'étant constituée que de développeurs back-end, et non de designers, cela n'aurait aucun sens et serait probablement contre productif.

## 6.4 Développement back-end (7 j.)

Le plus gros du développement du projet va se trouver ici. Il s'agit de créer l'architecture globale du site en utilisant le framework Symfony et d'y intégrer les fonctionnalités attendues, le HTML précédement créé ainsi que le modèle de ML entraîné pour produire ses prédictions.

L'équipe devra se répartir les tâches en fonction des affinités et des capacités de chacun mais également du temps restant et des objectifs à remplir.

## 6.5 Tests unitaires (1 j.)

Il faudrait implémenter des tests unitaires avec PHP-unit, au moins sur les parties les plus sensibles du prototype comme la création de compte, l'ajout de données en BDD et l'intégration du modèle de ML.

## 6.6 Mise en production du prototype (1 j.)

Si possible, le prototype devra être mis en ligne en utilisant l'intégration continue et GitHub Actions. Cette opération ne necessitant pas que toute l'équipe soit mobilisée, une ou deux personnes pourront s'en occuper pendant que les autres finalisent le projet.

# 7. Conclusion

Ce cahier des charges est déjà suffisement détaillé pour vous permettre de créer un prototype d'application convaincant tout en étant raisonable.

Si toutefois votre équipe était vraiment trop forte et vous trouviez ce cachier des charges trop facile, une piste d'amélioration serait de trouver une autre source d'information, beaucoup plus détaillée, et de réentraîner un algo de ML - toujours le même - mais avec de nouvelles données.

Vous pouvez également essayer de trouver d'autres sources de données, sur les raz de marré, les éruptions volcanique, la sécherresse ou les innondations et essayer d'entraîner un nouveau modèle sur ces données. Attention toutefois, l'entraînement de modèles est une opération très délicates et il faut bien préparer ses données en amont, sous peine d'obtenir des résultats complètement incohérents. 
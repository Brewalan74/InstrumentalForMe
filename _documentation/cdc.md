# Instrumental for me!

### Présentation 
Un website mettant en relation des personnes enseignant à jouer d'un instrument de musique, avec des personnes souhaitant apprendre.  
Le but du website serait de mettre en relation des gens qui souhaitent enseigner à jouer d'un instrument de musique avec des personnes qui souhaitent apprendre. Les cours se ferait en visio (google meet ou autre...).  


### Définitions des besoins et des objectifs auquels répond le projet:

- Côtés pratique pour les personnes habitants loin d'un lieu d'enseignement.
- En cas de confinement (ex:nouvelle pandémie).
- Facilité d'apprentissage pour les personnes introverties.
- Gestion de l'emploi du temps (pas de déplacement,...).

### Fonctionnalitées du projet:

##### MVP

- Connexion
- Inscription
- page instruments (contenu de presentation, lien vers les profs qui enseignent l'instrument...)
- Page profil :
  - profs (necessité d'un certificat sous forme de taxonomy )
  - eleves (possibilité de prendre rdv sur un creneau libre d'un prof. gestion basique d'un compte client, possibilité d'effacer son compte)
- link profs/instruments/eleves
- Prise de rendez-vous sous forme de formulaire
- Taxonomy : instruments, certificates, music styles

#####  Planning de dévelopement

  | SPRINT 0      | SPRINT 1                        | SPRINT 2                                                                               | SPRINT 3                      |
  | ------------- | ------------------------------- | -------------------------------------------------------------------------------------- | ----------------------------- |
  | --            | Integration theme + plugins     | Taxonomies                                                                             | --                            |
  | documentation | page instrument ( presentation) | page instrument (presentation + lien vers les professeurs qui enseignent l’instrument) | test/debug                    |
  | --            | page connexion                  | page professeur (prise de RDV)                                                         | amelioration visuelle du site |
  | --            | Page inscription                | page modifier son profil                                                               | --                            |
  | --            | page profil (prof + eleve)      | Suppression de compte                                                                  | --                            |
  | --            |                                 | --                                                                                     | --                            |


  - V2:
    - gestion des paiements en ligne (woo commerce - le site prend une commission)
    - Home (affichage des instruments/profs?)
    - catégories pour les instruments
    - page eleve (depot d'avis)
    - niveau possible des cours : debutant, faux debutant, intermediaire, avancé...
    - supprimer un rendez-vous

- V3:
    - envoie auto d'un lien (pour l'élève et le prof) vers google meet aprés inscription de l'élève à son cours 
    - page d'activité (page activité regroupant des projet/propositions faits par les profs ou clients : par exemple se retrouver un jour donné sur google meet (ou autre) pour l'enregistrement d'une video youtube OU se retrouver a un endroit donné pour participer a un evenement musical et monter sur scene pour une apparition, un concert remunéré ou bénévole...)

- V4:
    - Calendrier
    - like
    - upload certificate

### Liste des technologies

- wordpress
- php
- vue.js (calendrier)
- bootstrap


### Définition de la cible du projet

Le projet cible un public adulte et enfant souhaitant apprendre à jouer d'un instrument de musique.

### Navigateurs compatibles

A tester
- Chrome
- Firefox
- Edge
- Safari

### Arborescence  


<div style="background-color: #e8eef0">


  ```mermaid
  graph TD;

 404 

 Home-Instrument--->**Profil-prof**--->**Profil-élève**-->**MAJ-profile**
 Home-Instrument--->**Profil-élève**-->**Profil-prof**-->**MAJ-profile**



 Home-Instrument--->Connexion-->**Profil-élève**
 Connexion-->**Profil-prof**
 
 Home-Instrument--->Inscription-->**Profil-élève**
 Inscription-->**Profil-prof**

 Home-Instrument--->Instrument-->**Profil-prof**-->**Appointment**

   

```

 **Les `** xxxx **` indique que l'utilisateur doit être connecté pour acceder à ces pages**
</div>

### Liste des routes

- home
- register
- delete-account
- login
- signup
- student-profile
- teacher-profile
- certificate
- music-style
- instrument
- update-profile
- appointment
- 404
 
  ## A mettre à jour
  
 | URL                     | HTTP Method | Controller | Method            | Title                   | Content         | Comment |
 | -------------------     | ----------- | ---------- | ----------------- | ----------------------- | --------------- | ------- |
 | `/`                     | `GET`       | `---`      | `home`            | Page d'accueil          | home page       | -       |
 | `/register/`            | `POST`      | `---`      | `register`        | page d'inscription      | register page   | -       |
 | `/delete-account/`      | `POST`      | `---`      | `delete`          | page suppression compte | delete account  | -       |
 | `/update-profile/`      | `POST`      | `---`      | `update`          | MAJ compte              | update account  | -       |
 | `/login/`               | `GET`       | `---`      | `login`           | Connexion               | login           | -       |
 | `/student/profile/`     | `GET`       | `---`      | `student-profile` | profil élève            | student profile | -       |
 | `/teacher/profile/`     | `GET`       | `---`      | `teacher-profile` | profil prof             | teacher profile | -       |
 | `/instrument/[id]`      | `GET`       | `---`      | -                 | page instrument         | instrument      | -       |
 | `/teacher-appointment/` | `POST`      | `---`      | `appointment`     | page appointment        | RDV             | -       |
 | `/certificate/`         | `GET`       | `---`      | -                 | page certificat         | certificate     | -       |
 | `/music-style/`         | `GET`       | `---`      | -                 | page style musique      | musi style      | -       |
 | `/404/`                 | `GET`       | `---`      | `404`             | page erreur             | 404             | -       |


- V2
  - (about => contact,mentions légales)
 
 
 ### Users stories

 | En tant que | Je veux                                             | Afin de (si besoin/nécessaire) |
 | ----------- | --------------------------------------------------- | ------------------------------ |
 | Visiteur    | pouvoir consulter la liste des instruments          | --                             |
 | Visiteur    | pouvoir consulter la liste des professeurs          | --                             |
 | Visiteur    | pouvoir s'inscrire                                  | --                             |
 | Elève       | pouvoir se connecter                                | --                             |
 | Elève       | pouvoir consulter sa page perso                     | --                             |
 | Elève       | pouvoir modifier ma page de profil                  | --                             |
 | Elève       | pouvoir prendre rendez-vous                         | --                             |
 | Elève       | pouvoir consulter la liste des instruments          | --                             |
 | Elève       | pouvoir consulter la liste des professeurs          | --                             |
 | Elève       | pouvoir consulter la page de profil d'un professeur | --                             |
 | Elève       | pouvoir supprimer son compte                        | --                             |
 | Professeur  | pouvoir se connecter                                | --                             |
 | Professeur  | pouvoir consulter sa page perso                     | --                             |
 | Professeur  | pouvoir modifier ma page de profil                  | --                             |
 | Professeur  | pouvoir confirmer un rendez-vous                    | --                             |
 | Professeur  | pouvoir consulter mon agenda                        | --                             |
 | Professeur  | pouvoir supprimer son compte                        | --                             |

### La liste des rôles de chacun

- PRODUCT OWNER : Stefan
- SCRUM MASTER, : Stephanie B
- LEAD DEV : Stephanie M
- GIT MASTER : Stefan 
- REFERENT TECHNIQUE : Stephanie B



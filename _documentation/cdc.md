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

- Connexion
- Inscription
- page instruments (contenu de presentation, lien vers les profs qui enseignent l'instrument...)
- page profs (necessité d'une presentation, necessité d'un certificat prouvant la possibilité de donner des cours avant aval d'un admin + niveau possible des cours : debutant, faux debutant, intermediaire, avancé. gestion personnel de son agenda avec ses disponibilités et son jour réservé aux premiers cours, possibilité de faire des posts sur sa page personnel pour parler musique/activités musicales/concerts/instruments ou de sa vie...)
- page eleves (possibilité de prendre rdv sur un creneau libre d'un prof. gestion basique d'un compte client, possibilité d'effacer son compte, possibilité de faire un like)
- link profs/instruments
- Prise de rendez-vous
- Compteur de like


  - V2:
    - page profs
    - gestion des paiements en ligne (woo commerce - le site prend une commission)
    - Home (affichage des instruments/profs?)
    - catégories pour les instruments
    - page eleve (depot d'avis)

- V3:
    - envoie auto d'un lien (pour l'élève et le prof) vers google meet aprés inscription de l'élève à son cours 
    - page d'activité (page activité regroupant des projet/propositions faits par les profs ou clients : par exemple se retrouver un jour donné sur google meet (ou autre) pour l'enregistrement d'une video youtube OU se retrouver a un endroit donné pour participer a un evenement musical et monter sur scene pour une apparition, un concert remunéré ou bénévole...)

### Liste des technologies

- wordpress
- php
- vue.js
- bootstrap
- axios


### Définition de la cible du projet

Le projet cible un public adulte et enfant souhaitant apprendre à jouer d'un instrument de musique.

### Navigateurs compatibles

A tester
- Chrome
- Firefox
- Edge
- Safari

### Arborescence  (tester avec extension markdown preview)

- HOME (Instruments)
  - Instrument
    - Profs
      - Prof/Agenda
  - Connexion/Inscription
    - Page Perso
      - Gestion d'agenda (prof)
      - Prise de RDV (élève)
      - Suppression de compte
- 404


### Liste des routes

- home
- register
- delete
- login
- student
- student-profile
- teachers
- teacher-profile
- instrument
- 404
 
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
 | Elève       | pouvoir prendre rendez-vous                         | --                             |
 | Elève       | pouvoir consulter la liste des instruments          | --                             |
 | Elève       | pouvoir consulter la liste des professeurs          | --                             |
 | Elève       | pouvoir consulter la page de profil d'un professeur | --                             |
 | Elève       | pouvoir supprimer son compte                        | --                             |
 | Professeur  | pouvoir se connecter                                | --                             |
 | Professeur  | pouvoir consulter sa page perso                     | --                             |
 | Professeur  | pouvoir confirmer un rendez-vous                    | --                             |
 | Professeur  | pouvoir consulter mon agenda                        | --                             |
 | Professeur  | pouvoir supprimer son compte                        | --                             |


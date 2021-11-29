## Dictionnaire de données

### TABLE TEACHER :

|CHAMPS| TYPE|SPECIFICITE|DESCRIPTION|
| --   | -- | -- | -- |
|id | INT | PRIMARY KEY, UNSIGNED, NOT NULL, AUTO_INCREMENT| L’identifiant du professeur|
|firstname|VARCHAR(64)| NOT NULL |Prenom du professeur|
|lastname|VARCHAR(64)| NOT NULL |Nom du professeur|
|email|VARCHAR(255)| NOT NULL |Email du professeur|
|password|VARCHAR(64)| NOT NULL |Mot de passe du professeur|
|certificate| VARCHAR(255) | NOT NULL |Diplome d'enseignement du professeur |
|presentation| TEXT | NOT NULL |Présentation du professeur|
|avatar|VARCHAR(255)| -- |Photo du professeur|
|created_at| TIMESTAMP | NOT NULL, DEFAULT CURRENT_TIMESTAMP |La date de création du professeur|
|updated_at| TIMESTAMP | NOT NULL, DEFAULT CURRENT_TIMESTAMP |La date de dernière modification|


### TABLE STUDENT

|CHAMPS| TYPE|SPECIFICITE|DESCRIPTION|
| --   | -- | -- | -- |
|id|INT|PRIMARY KEY, UNSIGNED, NOT NULL, AUTO_INCREMENT|L’identifiant de l’élève|
|firstname|VARCHAR(64)| NOT NULL |Prénom de l'élève|
|lastname|VARCHAR(64)| NOT NULL | Nom de l'élève|
|email|VARCHAR(255)| NOT NULL| Email de l'élève|
|password|VARCHAR(64)| NOT NULL | Mot de passe de l'élève|
|avatar|VARCHAR(255)| -- |Photo de l'eleve|
|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date de création de l’élève|
|updated_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date de dernière modification|


### TABLE INSTRUMENT

|CHAMPS| TYPE|SPECIFICITE|DESCRIPTION|
| --   | -- | -- | -- |
|id|INT|PRIMARY KEY, UNSIGNED, NOT NULL, AUTO_INCREMENT|L’identifiant de l’instrument|
|name|VARCHAR(64)| NOT NULL |nom de l'instrument|
|description|TINY TEXT| NOT NULL | Description de l'instrument|
|picture|VARCHAR(255)| NOT NULL| Image de l’instrument|
|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date de création de la page de l'instrument
|updated_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date de dernière modification|


### TABLE LIKE 

|CHAMPS| TYPE|SPECIFICITE|DESCRIPTION|
| --   | -- | -- | -- |
|id|INT|PRIMARY KEY, UNSIGNED, NOT NULL, AUTO_INCREMENT|L’identifiant du like|
|teacher_key|INT| NOT NULL |identifiant professeur|
|student_key|INT| NOT NULL | identifiant eleve|
|number_of_like|INT | NOT NULL| nombre de like par professeur|
|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date de création du premier like|
|updated_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date de dernière modification|
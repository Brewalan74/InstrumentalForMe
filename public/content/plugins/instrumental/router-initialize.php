<?php
// STEP E9 Router Initialisation du router

// déclaration du router. Nous allons avoir besoin de ce router dans de nombreux fichier. Ce n'est pas propre mais pour des raisons de simplicité de code ; nous déclarons ce router comme étant une variable globale

use Instrumental\Controllers\CoreController;
use Instrumental\Controllers\UserController;

global $router;


// instanciation du router
$router = new AltoRouter();
// dirname permet de supprimer le nom de fichier dans une chaine de caractère contenant un "chemin fichier"
$baseURI = dirname($_SERVER['SCRIPT_NAME']);

// configuration de l'url racine de notre site aurpès d'altorouter
$router->setBasePath($baseURI);

// configuration des routes

$router->map(
    'GET', // surveille les appels HTTP de type GET
    '/user/dashboard/', // url a surveiller
    function() {
        $userController = new UserController();
        $userController->home();
    },
    'user-home'
);

/*
$router->map(
    'GET',
    '/user/skills/',
    function() {
        $userController = new UserController();
        $userController->skills();
    },
    'user-skills'
);

$router->map(
    'GET',
    '/user/confirm-delete-account/',
    function() {
        $userController = new UserController();
        $userController->confirmDeleteAccount();
    },
    'user-confirm-delete-account'
);


$router->map(
    'GET,POST',
    '/user/update-form/',
    function() {
        $userController = new UserController();
        $userController->updateForm();
    },
    'user-update-form'
);


// ===========================================================
// STEP E11 route custom POST ; enregistrement des niveaux de maitrise pour les technologiess

$router->map(
    'POST',
    '/user/update-skills/',
    function() {
        $userController = new UserController();
        $userController->updateSkills();
    },
    'user-update-skills'
);





// ===========================================================
// Routes pour tester nos modèles
// ===========================================================
$router->map(
    'GET',
    '/model-tests/create-project-developer-table/',
    function() {
        $testController = new TestController();
        $testController->createProjectDeveloperTable();
    },
    'model-tests-create-project-developer-table'
);

// STEP E11 INSERT route test

$router->map(
    'GET',
    '/model-tests/developer-technology/insert/',
    function() {
        $testController = new TestController();
        $testController->insertIntoDeveloperTechnologyTable();
    },
    'model-tests-developer-technology-insert'
);

$router->map(
    'GET',
    '/model-tests/developer-technology/select-by-developer-id/',
    function() {
        $testController = new TestController();
        $testController->selectByDeveloperId();
    },
    'model-tests-developer-technology-select-by-developer-id'
);


$router->map(
    'GET',
    '/model-tests/developer-technology/select-by-developer-id-and-technology-id/',
    function() {
        $testController = new TestController();
        $testController->selectByDeveloperIdAndTechnologyId();
    },
    'model-tests-developer-technology-select-by-developer-id-and-technology-id'
);


// STEP E11 ROUTING url avec variable
$router->map(
    'GET',
    // a la fin de l'url, nous devrons passer l'id du déveloper
    // [i:id] veut dire qu'à la fin de l'url il y aura un nombre (i:) qui sera stocké dans une variable nommé "id" 
    // DOC E11 altorouter, types de variable https://altorouter.com/usage/mapping-routes.html
    '/model-tests/developer-technology/select-by-developer-id/[i:id]/',
    function($id) {

        $testController = new TestController();
        $testController->selectByVariableDeveloperId($id);
    },
    'model-tests-developer-technology-select-by-developer-id-variable'
);


$router->map(
    'GET',
    '/model-tests/developer-technology/insert/[i:developerId]/[a:term]/[i:level]/',
    function($developerId, $term, $level) {

        $testController = new TestController();
        $testController->insertDynamic($developerId, $term, $level);
    },
    'model-tests-developer-technology-insert-dynamic'
);

$router->map(
    'GET',
    '/model-tests/update/[i:projectId]/[i:developerId]/',
    function($projectId, $developerId) {

        $testController = new TestController();
        $testController->update($projectId, $developerId);
    },
    'model-tests-update'
);




// ===========================================================
// E12 correction challenge
// ===========================================================
$router->map(
    'GET',
    '/model-tests/project-developer/insert/[i:projectId]/[i:developerId]/',
    function($projectId, $developerId) {

        $testController = new TestController();
        $testController->insertIntoProjectDeveloper($projectId, $developerId);
    },
    'model-tests-project-developer-insert'
);


// E12 participer/quitter un projet
$router->map(
    'GET',
    '/user/project/participate/[i:projectId]/',
    function($projectId) {

        $userController = new UserController();
        $userController->participateToProject($projectId);

    },
    'user-project-participate'
);

$router->map(
    'GET',
    '/user/project/leave/[i:projectId]/',
    function($projectId) {

        $userController = new UserController();
        $userController->leaveProject($projectId);

    },
    'user-project-leave'
);

// STEP E12 bonus gestion de l'espace "customer




$router->map(
    'GET,POST', // surveille les appels HTTP de type GET
    '/customer/project/new/', // url a surveiller
    function() {
        $userController = new CustomerController();
        $userController->projectNew();
    },
    'customer-project-new'
);
*/

$router->map(
    'GET', // surveille les appels HTTP de type GET
    '/teacher/dashboard/', // url a surveiller
    function() {
        $userController = new UserController();
        $userController->home();
    },
    'teacher-home'
);
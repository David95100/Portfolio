<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;
use Ptfolio\Dbconnection;
use GuzzleHttp\Client;
use LinkedIn\Client as LinkedIn;
// use LinkedIn\LinkedIn;
// use LinkedIn\Client;
use LinkedIn\Scope;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/libs/Dbconnection.php';

$app = AppFactory::create();




// https://www.linkedin.com/oauth/v2/authorization?client_id=77bzhb5cvfzcgs&redirect_uri=http%3A%2F%2Flocalhost%3A8086



// https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=77bzhb5cvfzcgs&redirect_uri=http%3A%2F%2Flocalhost%3A8086%2Fcallback&state=test_linkedin_app&scope=r_liteprofile%20r_emailaddress

// https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=77bzhb5cvfzcgs&redirect_uri=http%3A%2F%2Flocalhost%3A8086%2Fcallback






$app->get('/', function (Request $request, Response $response, $args)  {
    $render = new PhpRenderer(__DIR__ . '/../templates/');


    // Rediriger l'utilisateur vers l'URL d'autorisation
    return $render->render($response, 'index.php',$args);
});




//http://localhost:8086/callback?code=AQTremXl3lAyi-SmTR08ycTps0ONT2uS3Y2daMNNHCgTs2ujAxMOG5MCvNm49499CyP-p8yNIoDXnC-LJmLfv5AX-cuwjcxS53dLEDY5UxG1wiYVLgSpWO0r-YCoRwxLPRj8OR1QuBY3IAnkHs-IK9I9tG1AsWtu3F50TDtUQciIpX_jBhx7yGaDBYV__nls3gxq8TOt9gmf9NWlNHQ&state=test_linkedin_app



$app->get('/callback', function ($request, $response) {
    // Récupérer le code dans la requête GET
    $responseCode = $request->getQueryParams("code");
    // var_dump($code);exit();

    // L'URL de demande de jeton d'accès
    $tokenUrl = "https://www.linkedin.com/oauth/v2/accessToken";

    // Les paramètres de l'application
    $clientId = "77bzhb5cvfzcgs";
    $clientSecret = "LDNOdaa7tpZWRXWv";
    $redirectUri = "http://localhost:8086/callback";

    // Les paramètres de la requête de jeton d'accès
    $grantType = "authorization_code";

    // Créer un client HTTP Guzzle
    $client = new Client(["verify"=>false]);
// var_dump($code);exit();
    // Envoyer une requête POST à l'URL de demande de jeton d'accès
    $response = $client->post($tokenUrl, [
        "form_params"=> array(
            "grant_type" => $grantType,
            "code" => $responseCode['code'],
            "redirect_uri" => $redirectUri,
            "client_id" => $clientId,
            "client_secret" => $clientSecret
        )
    ]);

    // Extraire le jeton d'accès de la réponse
    $body = $response->getBody();
    $data = json_decode($body, true);
    $accessToken = $data["access_token"];

    // Utiliser le jeton d'accès pour envoyer des requêtes à l'API LinkedIn
    // ...

    // Afficher les données de votre profil LinkedIn
    $profileUrl = "https://api.linkedin.com/v2/me";
    $response = $client->get($profileUrl, [
        "headers" => [
            "Authorization" => "Bearer " . $accessToken,
            "cache-control" => "no-cache",
            "X-Restli-Protocol-Version" => "2.0.0"
        ]
    ]);
    $body = $response->getBody();
    $data = json_decode($body, true);
    // Afficher les données de votre profil LinkedIn sur la page
    // ...

    return $response;
});

// MTswOzE2Nzc1MTE2NDI7MjswMjHenI1dxraKYUSGFaPgjhaYkzotNO9v+xaCB4dkiuFXOA==;

// https://www.linkedin.com/oauth/v2/accessToken?code=RjQkEmqQ91&grant_type=authorization_code


https://www.linkedin.com/oauth/v2/accessToken?code=RjQkEmqQ91&grant_type=authorization_code&client_id=77bzhb5cvfzcgs&client_secret=LDNOdaa7tpZWRXWv

//$clientId = "77bzhb5cvfzcgs";
//     $clientSecret = "LDNOdaa7tpZWRXWv";
//     $redirectUri = "http://localhost:8086/callback";

// csrfToken: 
// ajax:7527425422662117806


$app->post('/linkedin/callback', function ($request, $response) {
    // L'URL de demande de jeton d'accès
    $tokenUrl = "https://www.linkedin.com/oauth/v2/accessToken";

    // Les paramètres de l'application
    $clientId = "77bzhb5cvfzcgs";
    $clientSecret = "LDNOdaa7tpZWRXWv";
    $redirectUri = "http://localhost:8086/callback";

    // Les paramètres de la requête de jeton d'accès
    $grantType = "authorization_code";
    $code = $request->getParam("code");

    // Créez un client HTTP Guzzle
    $client = new Client();

    // Envoyez une requête POST à l'URL de demande de jeton d'accès
    $response = $client->post($tokenUrl, [
        "form_params" => [
            "grant_type" => $grantType,
            "code" => $code,
            "redirect_uri" => $redirectUri,
            "client_id" => $clientId,
            "client_secret" => $clientSecret
        ]
    ]);

    // Extrayez le jeton d'accès de la réponse
    $body = $response->getBody();
    $data = json_decode($body, true);
    $accessToken = $data["access_token"];

    // Utilisez le jeton d'accès pour envoyer des requêtes à l'API LinkedIn
    // ...

    // Utilisez le jeton d'accès pour envoyer des requêtes à l'API LinkedIn
    $profileUrl = "https://api.linkedin.com/v2/me";
    $headers = [
        "Authorization" => "Bearer $accessToken",
        "Content-Type" => "application/json",
        "x-li-format" => "json"
    ];

    // Envoyez une requête GET à l'URL du profil de l'utilisateur
    $response = $client->get($profileUrl, [
        "headers" => $headers
    ]);

    // Traitez la réponse de l'API LinkedIn pour extraire les données de profil de l'utilisateur
    $body = $response->getBody();
    $data = json_decode($body, true);
    $firstName = $data["firstName"]["localized"]["en_US"];
    $lastName = $data["lastName"]["localized"]["en_US"];
    $headline = $data["headline"]["localized"]["en_US"];
    $pictureUrl = $data["profilePicture"]["displayImage"];

    return $response;
});









/**
 -------------------------------------------------------
 Tout mes essaies de routes pour l'api sont en bas de la page 
 */





$app->get('/app.css', function (Request $request, Response $response, array $args) {
    $response = $response->withHeader('Content-Type', 'text/css; charset=UTF-8');
    $response->getBody()->write(file_get_contents(__DIR__ . '/assets/style.css'));
    return $response;
});




$app->get('/assets/{filename}', function (Request $request, Response $response, $args) {
    $filePath = __DIR__ . '/assets/' . $args['filename'];
    $fileStream = fopen($filePath, 'r');
    $response = $response->withHeader('Content-Type', mime_content_type($filePath));
    return $response->withBody(new \Slim\Psr7\Stream($fileStream));
});


$app->post('/add-ptfolio', function(Request $request, Response $response, $args){
    $pdo = Dbconnection::getConnection();
 
    $req = $pdo->prepare("INSERT INTO form (prenom, nom, email, message) VALUES (:prenom, :nom, :email, :message)");
    
    $data = $request->getParsedBody();
 
    $req->bindParam(':prenom', $data['prenom']);
    $req->bindParam(':nom', $data['nom']);
    $req->bindParam(':email', $data['email']);
    $req->bindParam(':message', $data['message']);
 
    $req->execute();

    return $response->withHeader('Location', '../list-ptfolio')->withStatus(301);
});


$app->get('/list-ptfolio', function(Request $request, Response $response, $args){
    $pdo = Dbconnection::getConnection();
 
    $req = $pdo->prepare('SELECT*FROM form');
 
    $req->execute();
 
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
 
    $render = new PhpRenderer(__DIR__ . '/../templates/');
 
    return $render->render($response, 'admin.php', $data);
});
$app->post('/back-ptfolio', function(Request $request, Response $response, $args){
    $pdo = Dbconnection::getConnection();

    $render = new PhpRenderer(__DIR__ . '/../templates/');
 
    return $render->render($response, 'back.php');
});

$app->get('/one-ptfolio/{id_register}', function(Request $request, Response $response, $args){
    $pdo = Dbconnection::getConnection();
 
    $req = $pdo->prepare('SELECT * FROM form WHERE id_register = :id_register');
 
    $req->bindParam(':id_register', $args['id_register']);
 
 
    $req->execute();
 
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
 
 
    $render = new PhpRenderer(__DIR__ . '/../templates/');
 
    return $render->render($response, 'msg.php', $data);
});

$app->get('/delete-ptfolio/{id_register}', function(Request $request, Response $response, $args){
    $pdo = Dbconnection::getConnection();
 
    $req = $pdo->prepare('DELETE FROM form WHERE id_register = :id_register');
 
    $req->bindParam(':id_register', $args['id_register']);
 
    $req->execute();
    
    return $response->withHeader('Location', '../list-ptfolio')
    ->withStatus(301);
 });


$app->run();







// // Initialisation de la bibliothèque LinkedIn
// $linkedIn = new LinkedIn([
//     'clientId' => '77bzhb5cvfzcgs',
//     'clientSecret' => 'LDNOdaa7tpZWRXWv',
//     'redirectUri' => 'https://www.linkedin.com/developers/tools/oauth/redirect',
// ]);

// // Obtention du jeton d'accès à partir du code d'autorisation
// $accessToken = $linkedIn->getAccessToken($_GET['AQXTRvNocl_jK_qdkbg1RrWPbSpVpOwXNQATiCWcxCSAREWCJdca7XLzlki84F771qIwbuBb55H4j_dKHR0kV6_QtsKOkpiOoWHblbrAlmSRRjYvg6Jxemj05DiyG8jMeCngoEM9RXPicAimWcRTmeWJryzISaJDeEpWqb2V44gr_cZ1K_dX79PbF05FxmZ6_a6LOPT8hoYs7yG37NrB0vPoGp4bsbh67f9-K9B-q6ZqdEIgDFnMPKQCqYyTqMxH9zFHNOqU5qpG0EcOltjezCEnlHQLeQbd5-oc8kvZJVNBbhXrKS1KI0z_Ur5iUxKKTJ_H_3MWjfFlW8f3FgWqs-qsVBX2wg']);

// // Récupération des données du profil de l'utilisateur
// $profile = $linkedIn->get('v2/me', ['oauth2_access_token' => $accessToken]);

// // Affichage des détails du profil de l'utilisateur
// echo 'Nom complet : ' . $profile['localizedFirstName'] . ' ' . $profile['localizedLastName'] . '<br>';
// echo 'Adresse email : ' . $profile['emailAddress'] . '<br>';

// $app->get('/', function (Request $request, Response $response, $args) {
   

// });






// $app->get('/linkedin', function () use ($app) {
//     $client = new Client();
//     $response = $client->request('GET', 'https://api.linkedin.com/v2/me', [
//         'headers' => [
//             'Authorization' => 'Bearer <votre jeton d\'accès LinkedIn>',
//             'cache-control' => 'no-cache',
//             'X-Restli-Protocol-Version' => '2.0.0',
//         ],
//     ]);
//     $data = json_decode($response->getBody(), true);
//     $firstName = $data['firstName']['localized']['en_US'];
//     $lastName = $data['lastName']['localized']['en_US'];
//     $headline = $data['headline']['localized']['en_US'];
//     $picture = $data['profilePicture']['displayImage'];

//     return $app->view->render($response, 'linkedin.html', [
//         'firstName' => $firstName,
//         'lastName' => $lastName,
//         'headline' => $headline,
//         'picture' => $picture,
//     ]);
// });


// $client = new Client(
//     '77bzhb5cvfzcgs', 
//     'LDNOdaa7tpZWRXWv'
// );


// $app->get('/profile', function (Request $request, Response $response) {
//     $accessToken = 'AQXTRvNocl_jK_qdkbg1RrWPbSpVpOwXNQATiCWcxCSAREWCJdca7XLzlki84F771qIwbuBb55H4j_dKHR0kV6_QtsKOkpiOoWHblbrAlmSRRjYvg6Jxemj05DiyG8jMeCngoEM9RXPicAimWcRTmeWJryzISaJDeEpWqb2V44gr_cZ1K_dX79PbF05FxmZ6_a6LOPT8hoYs7yG37NrB0vPoGp4bsbh67f9-K9B-q6ZqdEIgDFnMPKQCqYyTqMxH9zFHNOqU5qpG0EcOltjezCEnlHQLeQbd5-oc8kvZJVNBbhXrKS1KI0z_Ur5iUxKKTJ_H_3MWjfFlW8f3FgWqs-qsVBX2wg';

//     $linkedIn = new LinkedIn([
//         'accessToken' => $accessToken,
//     ]);

//     $profile = $linkedIn->get('v2/me');

//     // Renvoie les données du profil LinkedIn sous forme de tableau JSON
//     return $response->withJson($profile);
// });
// $response = $client->get('me');
// $user = $response->getDecodedBody();

// // Afficher les détails du profil de l'utilisateur
// echo 'Nom complet : ' . $user['firstName'] . ' ' . $user['lastName'] . '<br>';
// echo 'Adresse email : ' . $user['emailAddress'] . '<br>';



// $app->get('/linkedin/auth', function ($request, $response) {
//     // L'URL d'authentification
//     $authUrl = "https://www.linkedin.com/oauth/v2/authorization";

//     // Les paramètres de l'application
//     $clientId = "77bzhb5cvfzcgs";
//     $redirectUri = "http://localhost:8086/callback";

//     // Les paramètres de l'utilisateur
//     $state = bin2hex(random_bytes(16)); // Un état aléatoire pour la sécurité
//     $scope = "r_liteprofile r_emailaddress"; // Les autorisations demandées
//     $responseType = "code"; // Le type de réponse

//     // L'URL de redirection
//     $redirectUrl = "$authUrl?response_type=$responseType&client_id=$clientId&redirect_uri=$redirectUri&state=$state&scope=$scope";

//     // Redirigez l'utilisateur vers l'URL de redirection
//     return $response->withHeader("Location", $redirectUrl);
// });

// $app->post('/linkedin/callback', function ($request, $response) {
//     // L'URL de demande de jeton d'accès
//     $tokenUrl = "https://www.linkedin.com/oauth/v2/accessToken";

//     // Les paramètres de l'application
//     $clientId = "77bzhb5cvfzcgs";
//     $clientSecret = "LDNOdaa7tpZWRXWv";
//     $redirectUri = "http://localhost:8086/callback";

//     // Les paramètres de la requête de jeton d'accès
//     $grantType = "authorization_code";
//     $code = $request->getParam("code");

//     // Créez un client HTTP Guzzle
//     $client = new Client();

//     // Envoyez une requête POST à l'URL de demande de jeton d'accès
//     $response = $client->post($tokenUrl, [
//         "form_params" => [
//             "grant_type" => $grantType,
//             "code" => $code,
//             "redirect_uri" => $redirectUri,
//             "client_id" => $clientId,
//             "client_secret" => $clientSecret
//         ]
//     ]);

//     // Extrayez le jeton d'accès de la réponse
//     $body = $response->getBody();
//     $data = json_decode($body, true);
//     $accessToken = $data["access_token"];

//     // Utilisez le jeton d'accès pour envoyer des requêtes à l'API LinkedIn
//     // ...

//     // Utilisez le jeton d'accès pour envoyer des requêtes à l'API LinkedIn
//     $profileUrl = "https://api.linkedin.com/v2/me";
//     $headers = [
//         "Authorization" => "Bearer $accessToken",
//         "Content-Type" => "application/json",
//         "x-li-format" => "json"
//     ];

//     // Envoyez une requête GET à l'URL du profil de l'utilisateur
//     $response = $client->get($profileUrl, [
//         "headers" => $headers
//     ]);

//     // Traitez la réponse de l'API LinkedIn pour extraire les données de profil de l'utilisateur
//     $body = $response->getBody();
//     $data = json_decode($body, true);
//     $firstName = $data["firstName"]["localized"]["en_US"];
//     $lastName = $data["lastName"]["localized"]["en_US"];
//     $headline = $data["headline"]["localized"]["en_US"];
//     $pictureUrl = $data["profilePicture"]["displayImage"];

//     return $response;
// });

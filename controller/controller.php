
<?php
ini_set('display_errors', 'on');

require('model/manager/blogmanager.php');
require('model/manager/customermanager.php');
require('model/manager/sejourmanager.php');
require('model/manager/reservationmanager.php');
require('model/manager/adminmanager.php');
require('model/manager/descriptionsejourmanager.php');


if (!isset($_GET['action'])) {
    $action = "home";
} else {
    $action = filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

switch ($action) {
    case "accueil":

        $recherchesejour = new SejourManager($lePDO);
        $lesSejours = $recherchesejour->getAllSejour();

        require('view/accueil.php');
        break;

    case "inscription":
        require('view/inscription.php');
        break;

    case 'inscription-traitement':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_POST)) {
                $nom = strtoupper(trim(filter_var($_POST['nom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS)));
                $prenom = ucfirst(trim(filter_var($_POST['prenom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS)));
                $adresse = trim(filter_var($_POST['adresse'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $codePostal = trim(filter_var($_POST['codePostal'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $email = trim(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL));
                $email = trim($email);
                $gendre = filter_var($_POST['gendre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $mdp = trim(filter_var($_POST['mdp'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $mdpconf = trim(filter_var($_POST['mdpconf'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $telephone = trim(filter_var($_POST['telephone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $ville = ucfirst(trim(filter_var($_POST['ville'], FILTER_SANITIZE_FULL_SPECIAL_CHARS)));
                
                if ($mdp != $mdpconf) {

                    header("location: ./?path=main&action=inscription");
                    $_SESSION['error'] = "les mots de passes ne sont pas identiques";
                    exit;
                }
                $mdp = hash("sha256", $mdp);
                $customerManager = new CustomerManager($lePDO);
                $customer = new Customer();
                // j'instancie un nouveau objet de la class customer
                $customer->setAdresse($adresse);
                $customer->setCodePostal($codePostal);
                $customer->setEmail($email);
                $customer->setGendre($gendre);
                $customer->setMdp($mdp);
                $customer->setNom($nom);
                $customer->setPrenom($prenom);
                $customer->setTelephone($telephone);
                $customer->setVille($ville);
                // Pour la verification de mon email
                $unCustomer = $customerManager->getCustomerByEmail($email);

                if ($unCustomer) {
                    header("location:./?path=main&action=inscription");
                    $_SESSION['error'] = "Adresse Email existe déjà";
                    exit;
                } else {
                    unset($_SESSION['success']);
                    $customerManager->creerCustomer($customer);

                    $_SESSION['success'] = "inscription établie avec succés";
                    header("location: ./?path=main&action=login");
                    exit;
                }

                session_unset();

                session_destroy();
                header("location: ./?path=main&action=accueil");
                exit;
            }
        }
        break;
    case "login":
        require('view/login.php');
        break;

    case "login-traitement":

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['email'], $_POST['mdp'])) {
                $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $mdp = filter_var($_POST['mdp'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $mdp = hash('sha256', $mdp);
            }
            $customerManager = new CustomerManager($lePDO);

            $customer = $customerManager->getCustomerByEmailAndPassword($email, $mdp);
            $adminManager = new AdminManager($lePDO);
            $admin = $adminManager->getAdminByEmailAndPassword($email, $mdp);

            session_unset();

            if ($customer == true) {
                // je stocke dans la session les resultats des methodes depuis l'objet customer
                $_SESSION['nom'] = $customer->getNom();
                $_SESSION['prenom'] = $customer->getPrenom();
                $_SESSION['id'] = $customer->getIdCustomer();
                $_SESSION['role'] = 'customer';

                header('location: ./?path=main&action=welcome');
                exit;
            } elseif ($admin == true) {


                $_SESSION["email"] = $admin->getEmail();
                $_SESSION["id"] = $admin->getIdAdmin();
                $_SESSION["role"] = 'admin';
                $_SESSION['success'] = "vous êtes connecté à votre compte avec succès";

                header("location: ./admin/index.php ");
                exit;
            } else {
                $_SESSION['error'] = "tentative de connexion échoué";
                header("location:./?path=main&action=login");
                exit;
            }
        }

        break;


    case "welcome":

        require('view/welcome.php');
        break;

        //         // Pour le traitement du blog/

    case "deconnexion":
        session_unset();
        session_destroy();
        header('location:./?path=main&action=accueil');

        require('view/deconnexion.php');
        break;
    
    
        case "erreur403":
            require('view/erreur403.php');
            break;
    
        case "erreur404":
            require('view/erreur404.php');
            break;
    
        case "Apropos":
            require('view/Apropos.php');
            break;
    
    case "description":
        $idSejour = filter_var($_GET['idSejour'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $descriptionManager = new DescriptionSejourManager($lePDO);
        $lesDescriptions = $descriptionManager->getDescriptionSejourByIdSejour($idSejour);


        require('view/villes/ville.php');
        break;


    case "traitement-sejour":

        if (isset($_POST["submit"])) {
            $sejour = new Sejour($lePDO);
            //var_dump($_POST);
            //var_dump($_FILES);
            // FILTER_SANITIZE_FULL_SPECIAL_CHARS il nettoie les champs, ça evite les injections sql
            $code = filter_var($_POST['code'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $villeDepart = filter_var($_POST['villeDepart'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $villeDestination = filter_var($_POST['villeDestination'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $dateDepart = filter_var($_POST['dateDepart'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $dateArrivee = filter_var($_POST['dateArrivee'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $placeTotal = filter_var($_POST['placeTotal'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $placeLibre = filter_var($_POST['placeLibre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prix = filter_var($_POST['prix'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sejour->setCode($code);
            $sejour->setVilleDepart($villeDepart);
            $sejour->setVilleDestination($villeDestination);
            $sejour->setDateDepart($dateDepart);
            $sejour->setDateArrivee($dateArrivee);
            $sejour->setPlaceTotal($placeTotal);
            $sejour->setPlaceLibre($placeLibre);
            $sejour->setPrix($prix);
            $sejour->setDescription($description);
            //var_dump($sejour);
            // upload file/ Pour télécharger un fichier
            if (isset($_FILES['image'])) {
                $error = 0;
                if (!is_dir("images")) mkdir("images");
                $tmpName = $_FILES['image']['tmp_name'];
                $name = $_FILES['image']['name'];
                $size = $_FILES['image']['size'];
                $error = $_FILES['image']['error'];
                $tabExtension = explode('.', $name);
                $extension = strtolower(end($tabExtension));
                //Tableau des extensions que l'on accepte
                $allowed = ['jpg', 'png', 'jpeg', 'gif'];

                if (in_array($extension, $allowed)) {
                    move_uploaded_file($tmpName, './images/' . $name);
                    $sejour->setImage($name);
                } else {
                    $error++;
                    $_SESSION['error'] = "Type de fichier non autorisé";
                }
            }
            if (!$error) {
                if ($sejourManager->addSejour($sejour)) {
                    $_SESSION['success'] = "offre de séjour créé avec succès";
                    $lastId = $lePDO->lastInsertId();
                    header("location:card.php?action=view&id=$lastId");
                    exit;
                } else {
                    $_SESSION['error'] = "Une erreur est survenue lors de la création";
                }
            }
        }

        break;

    case "traitement-blog":

        if (isset($_POST)) {

            $blog = new Blog();

            $blogManager = new BlogManager($lePDO);




            if ((isset($_POST['descriptionBlog'])) &&  (isset($_POST['idSejour']))) {

                $descriptionBlog = filter_var($_POST['descriptionBlog'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $idSejour = filter_var($_POST['idSejour'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            } else {
                echo $_SESSION['error'] = 'erreur d\'envoi';
            }

            $idCustomer = $_SESSION['id'];
            $blog->setDescriptionBlog($descriptionBlog);
            $blog->setIdCustomer($idCustomer);
            $blog->setIdSejour($idSejour);
            // var_dump($blog);exit;
            $blogManager->creerBlog($blog);




            if ($blogManager) {
                // var_dump ($blogManager);exit;
                $_SESSION['success'] = "le commentaire est créé avec succès";

                header("location: ./?path=main&action=livredor");
                exit;
            } else {
                $_SESSION['error'] = "Une erreur est survenue lors de la création";
            }
        }

        break;

    case "delete-livredor":

        $blogManager = new BlogManager($lePDO);
        $idBlog=filter_var($_GET['idBlog'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      
        if (!$blogManager ->getBlogById($idBlog)) {
            
            $_SESSION['error']="aucun commentaire avec cet identifiant";
            header("location: ./?path=main&action=livredor");
        }
        else {
    
            if ($blogManager ->deleteBlogById($idBlog)) {
                $_SESSION['success']="Le commentaire est supprimé avec succès";
                header("location: ./?path=main&action=livredor");
            } else {
                $_SESSION['error']="Une erreur est survenue lors de la suppression";
                header("location: ./?path=main&action=livredor");
    
            }
        }
        break;

    case "livredor":
        $objetCustomerById = new CustomerManager($lePDO);
        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];

            $customers = $objetCustomerById->getCustomerById($id);
        }

        // $idSejour = filter_var($_GET['idSejour'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $recherchesejour = new SejourManager($lePDO);
        $lesSejours = $recherchesejour->getAllSejour();





        $getblog = new BlogManager($lePDO);
        // var_dump($getBlog);
        $lesBlogs = $getblog->getAllBlog();

        // var_dump($lesBlogs);
        require('view/livredor.php');

        break;
    case "destination":
        require('view/destination.php');
        break;




    case "sejour":
        $sejourManager = new SejourManager($lePDO);
        if (isset($_POST['ville']) && $_POST['ville'] != "") {

            $villeDestination = filter_var($_POST['ville'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            // var_dump($villeDestination);exit;


            $recherche_par_sejour = $sejourManager->getSejourByVille($villeDestination);
            $sejours = [$recherche_par_sejour];

            // var_dump($sejours);
        } else {

            $sejours = $sejourManager->getAllSejour();
        }
        $lesSejours = $sejourManager->getAllSejour();




        require('view/sejour.php');

        break;



    case "contact":
        require('view/contact.php');
        break;






    case "404":
        require('view/404.php');
        break;










    default:
        require('view/404.php');
}

?>
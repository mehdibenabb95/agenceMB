<?php
require('model/manager/sejourmanager.php');
require('model/manager/customermanager.php');
require('model/manager/blogmanager.php');
require('model/manager/reservationmanager.php');
require('model/manager/adminmanager.php');



if (!isset($_GET['action'])) {
    $action = "customer";
} else {
    $action = filter_var($_GET['action'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

switch ($action) {

    case "profilcustomer":
        $id = $_SESSION['id'];
        $objetCustomerById = new CustomerManager($lePDO);
        $customers = $objetCustomerById->getCustomerById($id);

        require('view/profilcustomer.php');
        break;

    case "editform-inscription":

        $id = $_SESSION['id'];
        $customerManager = new CustomerManager($lePDO);
        $customers = $customerManager->getCustomerById($id);

        require('./view/editform-inscription.php');
        break;

    case "edit-profilcustomer":

        if (isset($_POST["update"])) {

            $gendre = filter_var($_POST['gendre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $nom = trim(filter_var($_POST['nom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $prenom = trim(filter_var($_POST['prenom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $telephone = trim(filter_var($_POST['telephone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $adresse = trim(filter_var($_POST['adresse'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $ville = trim(filter_var($_POST['ville'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $codePostal = trim(filter_var($_POST['codePostal'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $id = $_SESSION['id'];
            $customerManager = new CustomerManager($lePDO);

            $customers = $customerManager->getCustomerById($id);
            $customers->setGendre($gendre);
            $customers->setNom($nom);
            $customers->setPrenom($prenom);
            $customers->setEmail($email);
            $customers->setTelephone($telephone);
            $customers->setAdresse($adresse);
            $customers->setVille($ville);
            $customers->setCodePostal($codePostal);

            $customerManager->updateCustomer($customers);

            if ($customerManager) {


                header("location: ./?path=customer&action=profilcustomer");
                $_SESSION['success'] = "Le compte client est mis-à-jour avec succès";
                exit;
            } else {
                $_SESSION['error'] = "Une erreur est survenue lors des modifications";
            }
        }
        break;
    case "delete-customer":
        $id = $_SESSION['id'];
        $customers = new Customer();
        $customerManager = new CustomerManager($lePDO);

        if (!$customerManager->getCustomerByid($id)) {
            $_SESSION['error'] = "aucun utilistaeur avec cet identifiant";
            header("location: ./?path=customer&action=profilcustomer");
        } else {
            if ($customerManager->deleteCustomerById($id)) {
                header("location:./?path=main&action=login");
                $_SESSION['success'] = "Le compte client est supprimé avec succès";
            } else {
                session_unset();
                session_destroy();
                $_SESSION['error'] = "Une erreur est survenue lors de la suppression";
                header("location: ./?path=customer&action=profilcustomer");
            }
        }
        break;

    case "mesreservations":

        $id = $_SESSION['id'];
        $objetReservation = new ReservationManager($lePDO);
        $lesReservations = $objetReservation->getReservationByIdCustomer($id);

        $objetCustomerById = new CustomerManager($lePDO);
        $customers = $objetCustomerById->getCustomerById($id);


        $recherchesejour = new SejourManager($lePDO);


        require('view/mesreservations.php');
        break;



    case "reservation":
        $recherchesejour = new SejourManager($lePDO);

        if (isset($_GET['idSejour'])) {

            $idSejour = filter_var($_GET['idSejour'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $leSejour = $recherchesejour->getSejourById($idSejour);
        } else {

            header("location:./?path=customer&action=sejour");
        }


        $id = $_SESSION['id'];
        $objetCustomerById = new CustomerManager($lePDO);
        $customers = $objetCustomerById->getCustomerById($id);

        require('view/reservation.php');

        break;

    case "delete-reservation":
        $idReservation = filter_var($_POST['idReservation'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $reservation = new Reservation();
        $reservationManager = new ReservationManager($lePDO);

        if (!$reservationManager->getReservationByid($idReservation)) {
            $_SESSION['error'] = "aucun utilistaeur avec cet identifiant";
            header("location: ./?path=customer&action=mesreservations");
        } else {
            if ($reservationManager->deleteReservationById($idReservation)) {
                header("location:./?path=customer&action=mesreservations");
                $_SESSION['success'] = "Le compte client est supprimé avec succès";
            } else {
                $_SESSION['error'] = "Une erreur est survenue lors de la suppression";
                header("location: ./?path=customer&action=mesreservations");
            }
        }


        require('./view/editform-inscription.php');
        break;



    case 'edit-reservation':

        $id = filter_var($_GET['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $objetReservation = new ReservationManager($lePDO);
        $uneReservation = $objetReservation->getReservationById($id);
        $idCustomer = $_SESSION['id'];
        $objetCustomerById = new CustomerManager($lePDO);
        $customers = $objetCustomerById->getCustomerById($idCustomer);

        $idSejour = $uneReservation->getIdSejour();
        $recherchesejour = new SejourManager($lePDO);
        $lesSejours = $recherchesejour->getAllSejour();


        require('./view/edit-formreservation.php');

        break;

    case  "edit-formreservation":
        if ($_SERVER["REQUEST_METHOD"] === "POST") {


            $reservation = new Reservation();
            $reservationManager = new ReservationManager($lePDO);
            $sejourManager = new SejourManager($lePDO);
            if (isset($_POST["update"])) {


                // var_dump($_POST);
                $nbplaces = (filter_var($_POST['nbplaces'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $prix = trim(filter_var($_POST['prixTotal'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $idSejour = trim(filter_var($_POST['sejour'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $leSejour = $sejourManager->getSejourById($idSejour);
                $prix = $leSejour->getPrix() * $nbplaces;
                $idReservation = filter_var($_POST['idReservation'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                var_dump($idReservation);
            } else {

                echo $_SESSION['error'] = 'erreur d\'envoi';
            }



            $id = $_SESSION['id'];
            $reservation->setIdReservation($idReservation);
            $reservation->setNbplaces($nbplaces);
            $reservation->setPrix($prix);
            $reservation->setIdSejour($idSejour);
            $reservation->setIdCustomer($id);


            if ($reservationManager->updateReservation($reservation)) {
                $_SESSION['success'] = "reservation modifiée avec succès";

                header("location:./?path=customer&action=mesreservations");

                exit;
            }
        }
        break;



    case "traitement_reservation":

        // var_dump($_POST);
        // exit;
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            // var_dump($_POST); exit;
            $reservation = new Reservation();
            $reservationManager = new ReservationManager($lePDO);
            $sejourManager = new SejourManager($lePDO);
            if (isset($_POST)) {


                var_dump($_POST);
                $nbplaces = (filter_var($_POST['nbplaces'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                // $prix = trim(filter_var($_POST['prixTotal'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $idSejour = trim(filter_var($_POST['sejour'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $leSejour = $sejourManager->getSejourById($idSejour);
                $prix = $leSejour->getPrix() * $nbplaces;
            } else {

                echo $_SESSION['error'] = 'erreur d\'envoi';
            }
            // var_dump($prix);exit;


            $id = $_SESSION['id'];
            $reservation->setNbplaces($nbplaces);
            $reservation->setPrix($prix);
            $reservation->setIdSejour($idSejour);
            $reservation->setIdCustomer($id);

            // $reservation->setDatecreation($dateCreation);
            // var_dump($reservation);
            // exit;

            $reservationManager->creerReservation($reservation);

            if ($reservationManager) {
                $_SESSION['success'] = "reservation créée avec succès";

                header("location:./?path=customer&action=mesreservations");

                exit;
            }

            //  // Pour vider la session
            //  session_unset();
            //  // pour detruire la session
            //  session_destroy();
            //  header("location: ./?path=main&action=accueil");
            //  exit;

        }

        break;




    default:
        require('view/404.php');
}

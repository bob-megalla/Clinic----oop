<?php
require_once 'core/functions.php';
session_start();
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case "home":
            require_once BASE_PATH . '../controllers/user/home.php';
            break;
        case "doctors":
            require_once BASE_PATH . '../controllers/doctor/doctors.php';
            break;
        case "major":
            require_once BASE_PATH . '../controllers/major/major.php';
            break;
        case "login":
            require_once BASE_PATH . '../controllers/login/login.php';
            break;
        case "register":
            require_once BASE_PATH . '../controllers/login/register.php';
            break;
        case "message":
            require_once BASE_PATH . '../controllers/message/message.php';
            break;
        case "getDoctors":
            require_once BASE_PATH . '../controllers/user/getDoctors.php';
            break;
        case "store_appoint":
            require_once BASE_PATH . '../controllers/doctor/store_appoint.php';
            break;
        case "store_message":
            require_once BASE_PATH . '../controllers/message/store_message.php';
            break;
        case "checkUser":
            require_once BASE_PATH . '../controllers/admin/checkUser.php';
            break;
        case "addNewUser":
            require_once BASE_PATH . '../controllers/login/addNewUser.php';
            break;
        case "store_book":
            require_once BASE_PATH . '../controllers/doctor/store_book.php';
            break;

        default:
            require_once BASE_PATH . '../views/errors/404.php';
    }
} elseif (isset($_GET['admin']) && isset($_SESSION['user_id'])) {
    // dd($_SESSION['user_id']);
    $admin_page = $_GET['admin'];
    switch ($admin_page) {
        case "logout":
            require_once BASE_PATH . '../controllers/admin/logout.php';
            break;
        //////// -------------- DASHBOARD ROUTE SECTION ----A-ID-0--------- ///////////////
        case "dashboard": /////------> Dashboard
            $active_id = 0;
            require_once BASE_PATH . '../controllers/admin/dashboard.php';
            break;
        //////// -------------- DOCTORS ROUTE SECTION ----A-ID-1--------- ///////////////
        case "allDoctors": /////------> All Doctors
            $active_id = 1;
            $page_name = "Doctors";
            require_once BASE_PATH . '../controllers/admin/doctors/allDoctors.php';
            break;
        //////// -------------- MESSAGES ROUTE SECTION -----A-ID-2------------ ///////////////
        case "allMessages": /////------> All Messages
            $active_id = 2;
            $page_name = 'Messages';
            require_once BASE_PATH . '../controllers/admin/messages/allMessages.php';
            break;
        case "getMessage": /////------> Get Message Read
            $active_id = 2;
            $page_name = 'Messages';
            require_once BASE_PATH . '../controllers/admin/messages/getMessage.php';
            break;
        case "deleteMessage": /////------> Get Message Delete
            $active_id = 2;
            $page_name = 'Messages';
            require_once BASE_PATH . '../controllers/admin/messages/deleteMessage.php';
            break;
        //////// -------------- MAJORS ROUTE SECTION -------A-ID-3---------- ///////////////
        case "allMajors": /////------> All Majors
            $active_id = 3;
            $page_name = 'Majors';
            require_once BASE_PATH . '../controllers/admin/majors/allMajors.php';
            break;
        //////// -------------- USERS ROUTE SECTION -------A-ID-4---------- ///////////////
        case "allUsers": /////------> All Users
            $active_id = 4;
            $page_name = 'Users';
            require_once BASE_PATH . '../controllers/admin/users/allUsers.php';
            break;
        //////// -------------- SETTINGS ROUTE SECTION -------A-ID-5---------- /////////////// 
        case "WebsiteSettings": /////------> All Setting Website
            $active_id = 5;
            $page_name = 'Website Settings';
            require_once BASE_PATH . '../controllers/admin/settings/allSettings.php';
            break;
        //////// -------------- NEWS ROUTE SECTION -------A-ID-6---------- ///////////////
        case "allNews": /////------> All News
            $active_id = 6;
            $page_name = 'News';
            require_once BASE_PATH . '../controllers/admin/news/allNews.php';
            break;

        //////// -------------- BOOKED ROUTE SECTION -------A-ID-7---------- ///////////////
        case "allBooked": /////------> All Booked
            $active_id = 7;
            $page_name = 'Booked';
            require_once BASE_PATH . '../controllers/admin/booked/allBooked.php';
            break;
        case "getBooked": /////------> All Booked Notification Read
            $active_id = 7;
            $page_name = 'Booked';
            require_once BASE_PATH . '../controllers/admin/booked/getBooked.php';
            break;
        case "getBookedComplete": /////------> All Booked Complete Book
            $active_id = 7;
            $page_name = 'Booked';
            require_once BASE_PATH . '../controllers/admin/booked/getBookedComplete.php';
            break;
        case "getBookedDeleted": /////------> All Booked Complete Delete
            $active_id = 7;
            $page_name = 'Booked';
            require_once BASE_PATH . '../controllers/admin/booked/getBookedDeleted.php';
            break;

        default:
            require_once BASE_PATH . '../views/errors/404.php';

    }
} else {
    require_once BASE_PATH . '../controllers/user/home.php';
    // echo "404";
}

?>
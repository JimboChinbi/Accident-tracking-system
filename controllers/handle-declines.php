<?php

session_start();

if ($_SESSION['user_id'] && $_SESSION['user_id'] != '' && $_SESSION['user_role'] == 'user') {
    echo "<script>alert('You are not authorized to do this action.');window.location.href='user-home.php';</script>";
}
if ($_SESSION['user_id'] && $_SESSION['user_id'] != '' && $_SESSION['user_role'] == 'rda_admin') {
    $incident_id = $_GET['id'];

    
    require_once('../config/connection.php');

    $query = "UPDATE Incidents SET rda_status='Declined' WHERE incident_id='$incident_id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script>alert('Incident has been declined.');window.location.href='../rda-admin-home.php';</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');window.location.href='../rda-admin-home.php';</script>";
    }
}
if ($_SESSION['user_id'] && $_SESSION['user_id'] != '' && $_SESSION['user_role'] == 'police_admin') {
    $incident_id = $_GET['id'];

    
    require_once('../config/connection.php');

    $query = "UPDATE Incidents SET police_status='Declined' WHERE incident_id='$incident_id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script>alert('Incident has been declined.');window.location.href='../police-submissions.php';</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');window.location.href='../police-submissions.php';</script>";
    }
}
if ($_SESSION['user_id'] && $_SESSION['user_id'] != '' && $_SESSION['user_role'] == 'insurance_admin') {
    $incident_id = $_GET['id'];

   
    require_once('../config/connection.php');

    $query = "UPDATE Incidents SET insurance_status='Declined' WHERE incident_id='$incident_id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script>alert('Incident has been declined.');window.location.href='../insurance-admin-home.php';</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');window.location.href='../insurance-admin-home.php';</script>";
    }
}
if ($_SESSION['user_id'] && $_SESSION['user_id'] != '' && $_SESSION['user_role'] == 'super_admin') {
    $u_id = $_GET['id'];

    
    require_once('../config/connection.php');

    $query = "DELETE FROM Users WHERE id='$u_id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script>alert('User has been removed.');window.location.href='../super-admin-home.php';</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');window.location.href='../super-admin-home.php';</script>";
    }
}
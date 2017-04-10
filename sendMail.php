<?php
session_start();

$emailAdres = "dertorif@sezet.com";
$emailTitle = "Zamowienie ze sklepu internetowego";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'Reply-To: lotrikor@sezet.com' . "\r\n";
$emailMessage = $_SESSION['emailMessage'];

$nameForm = htmlspecialchars($_POST['name']);
$emailForm = $_POST['email'];
$phoneForm = htmlspecialchars($_POST['telephoneNumber']);
$address = htmlspecialchars($_POST['address']);
$_SESSION['address'] = $address;
$regulationsCheckBox = $_POST['regulationsCheckBox'];

$OK = true;

if(strlen($phoneForm)<7 || strlen($phoneForm)>15)
{
    $OK = false;
    $_SESSION['error'] = '<div class="alert alert-warning" role="alert"><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Numer telefonu nie jest poprawny!</div>';
}

$emailAdresB = filter_var($emailForm, FILTER_SANITIZE_EMAIL);
if( (filter_var($emailAdresB, FILTER_VALIDATE_EMAIL)==false) || ($emailAdresB != $emailForm) )
{
    $OK = false;
    $_SESSION['error'] = '<div class="alert alert-warning" role="alert"><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Adres e-mail nie jest poprawny!</div>';
}

if($regulationsCheckBox != true)
{
    $OK = false;
    $_SESSION['error'] = '<div class="alert alert-warning" role="alert"><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Nie zaakceptowałeś regulaminu!</div>';
}

if($OK)
{
    $emailMessage .= "<br><br>Zamawiający: $nameForm <br>Adres e-mail: $emailForm<br>Numer Telefonu: $phoneForm<br>Adres Dostawy: $address";
    $emailAdres .= ", $emailForm";
    if(mail($emailAdres, $emailTitle, $emailMessage, $headers))
            $_SESSION['finish_OK'] = 'ZAMÓWIENIE ZOSTAŁO ZŁOŻONE POMYŚLNIE - DZIĘKUJEMY!';
    else
            $_SESSION['finish_ER'] = 'BŁĄD - NIE UDAŁO SIĘ WYSŁAĆ ZAMÓWIENIA! SPRÓBUJ W INNYM TERMINIE...';
}
else
{
    header("Location: http://sklep.annstal.pl/form.php");
    exit();
}

header("Location: http://sklep.annstal.pl");

?>
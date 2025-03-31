<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $mobile = htmlspecialchars($_POST['mobile']);
    $address = htmlspecialchars($_POST['address']);
    $product = htmlspecialchars($_POST['product']);
    $quantity = htmlspecialchars($_POST['quantity']);
    $message = htmlspecialchars($_POST['message']);

    $to = "your-email@example.com"; // Your email address
    $subject = "New Purchase Order";
    $body = "Name: $name\nEmail: $email\nMobile: $mobile\nAddress: $address\nProduct: $product\nQuantity: $quantity\nMessage: $message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Email successfully sent!";
    } else {
        echo "Failed to send email.";
    }
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $mobile = htmlspecialchars($_POST['mobile']);
    $address = htmlspecialchars($_POST['address']);
    $product = htmlspecialchars($_POST['product']);
    $quantity = htmlspecialchars($_POST['quantity']);
    $message = htmlspecialchars($_POST['message']);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Validate required fields
    if (empty($name) || empty($email) || empty($mobile) || empty($address) || empty($product) || empty($quantity) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    $to = "jwizzzzy9@gmail.com"; // Your email address
    $subject = "New Purchase Order";
    $body = "Name: $name\nEmail: $email\nMobile: $mobile\nAddress: $address\nProduct: $product\nQuantity: $quantity\nMessage: $message";
    $headers = "From: $email\r\nReply-To: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Email successfully sent!";
    } else {
        echo "Failed to send email.";
    }
}
?>

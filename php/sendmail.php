<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["fullname"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Isi dengan email Anda
    $recipient = "riansshole123@gmail.com";
    
    // Subjek email
    $subject = "New contact from $name";

    // Konten email
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Header email
    $email_headers = "From: $name <$email>";

    // Kirim email
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        // Pesan berhasil dikirim
        echo "Thank You! Your message has been sent.";
    } else {
        // Pesan gagal dikirim
        echo "Oops! Something went wrong, we couldn't send your message.";
    }
} else {
    // Tidak method POST
    echo "There was a problem with your submission, please try again.";
}
?>

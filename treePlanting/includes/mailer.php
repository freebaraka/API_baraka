<?php
// Use Composer's autoloader from the project root
$vendorAutoload = __DIR__ . '/../vendor/autoload.php';

if (file_exists($vendorAutoload)) {
    require_once $vendorAutoload;
} else {
    // If Composer not available, use fallback
    function sendWelcomeEmail($email, $name, $tree_species) {
        return sendWelcomeEmailFallback($email, $name, $tree_species);
    }
    
    function sendWelcomeEmailFallback($email, $name, $tree_species) {
        // Simple mail() function as fallback
        $subject = 'Welcome to Tree Planting Initiative!';
        $message = "Hello $name!\n\nThank you for planting a $tree_species with us. Together, we are growing a greener future!\n\n- Tree Planting Team";
        $headers = "From: no-reply@treeplanting.org\r\n";
        
        return mail($email, $subject, $message, $headers);
    }
    
    return;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

function sendWelcomeEmail($email, $name, $tree_species) {
    $mail = new PHPMailer(true);
    
    try {
        // Server settings - Using Gmail SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'baraka.onserio@strathmore.edu'; // REPLACE WITH YOUR TREE PLANTING SYSTEM GMAIL
        $mail->Password   = 'pzjs csoj hjvd rmzu';    // REPLACE WITH TREE PLANTING SYSTEM GMAIL APP PASSWORD
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;
        
        // Enable verbose debug output (remove in production)
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Uncomment for debugging

        // Recipients
        $mail->setFrom('no-reply@treeplanting.org', 'Tree Planting Initiative');
        $mail->addAddress($email, $name);
        $mail->addReplyTo('no-reply@treeplanting.org', 'Tree Planting Initiative');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Welcome to Tree Planting Initiative! 🌳';
        $mail->Body    = "
            <h2>Thank you for joining us, $name! 🌱</h2>
            <p><strong>Tree Species Planted:</strong> " . htmlspecialchars($tree_species) . "</p>
            <p>Your contribution helps us create a greener, healthier planet. We appreciate your support!</p>
            <p>Together, let's grow a better future.<br><strong>Tree Planting Team</strong></p>
        ";
        
        $mail->AltBody = "Hello $name! Thank you for planting a $tree_species with us. Together, we are growing a greener future! - Tree Planting Team";

        $mail->send();
        return true;
        
    } catch (Exception $e) {
        error_log("PHPMailer Error: {$mail->ErrorInfo}");
        
        // Fallback to simple mail() function
        return sendWelcomeEmailFallback($email, $name, $tree_species);
    }
}

// Fallback function using PHP's mail()
function sendWelcomeEmailFallback($email, $name, $tree_species) {
    $subject = 'Welcome to Tree Planting Initiative! 🌳';
    $message = "
        Hello $name!

        Thank you for planting a $tree_species with us.

        Your contribution helps us create a greener, healthier planet.

        - Tree Planting Team
    ";
    
    $headers = "From: no-reply@treeplanting.org\r\n";
    $headers .= "Reply-To: no-reply@treeplanting.org\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    if (mail($email, $subject, $message, $headers)) {
        return true;
    } else {
        error_log("Failed to send welcome email to $email using mail() function");
        return false;
    }
}

// Quick tree planting tip email
function sendQuickTip($email, $name) {
    $tips = [
        "🌱 Water your tree regularly, especially during dry seasons.",
        "🌳 Choose native species for better growth and ecosystem support.",
        "🌞 Ensure your tree gets enough sunlight.",
        "🌿 Mulch around the base to retain moisture and prevent weeds.",
        "🌲 Protect young trees from pests and animals."
    ];
    
    $random_tip = $tips[array_rand($tips)];
    
    $subject = "Tree Planting Tip 🌳";
    $message = "
        Hello $name!
        
        Today's tip: $random_tip
        
        Thank you for helping us grow a greener future!
        
        - Tree Planting Team
    ";
    
    $headers = "From: tips@treeplanting.org\r\n";
    return mail($email, $subject, $message, $headers);
}
?>
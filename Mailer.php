<?php
require 'Mailer/PHPMAILER/class.phpmailer.php';
require 'Mailer/PHPMAILER/class.smtp.php';
require 'Mailer/PHPMAILER/PHPMailerAutoload.php';

// Remitente y Configuración SMTP (Variables de entorno con valores por defecto)
$Host = getenv('SMTP_HOST') ?: "mail.example.com";
$From = getenv('SMTP_USER') ?: "sender@example.com";
$Password = getenv('SMTP_PASSWORD') ?: "your_smtp_password";
$Business = getenv('BUSINESS_NAME') ?: "ANSF Translations";
$Web = getenv('SITE_URL') ?: "https://example.com";

// Mensaje y Destinatario
$Subject = "Nuevo contacto - Solicitud de cotización de traducción";
$To = getenv('NOTIFICATION_EMAIL') ?: "contact@example.com";

$Message = "Nuevo contacto de ansftranslations.com:\n\n";
$Message .= "Nombre: " . $_POST["nombre"] . "\n";
$Message .= "Correo Electrónico: " . $_POST["correo_electrónico"] . "\n";
$Message .= "Servicio Requerido: " . $_POST["servicio"] . "\n";
$Message .= "Indicaciones Especiales: " . $_POST["indicaciones"] . "\n";

/*
// Tu clave secreta
$secret = "6LdP_-ApAAAAAPP7eVG0tLwmaRD1-_dFAqPJ-Mh1";

// La respuesta de reCAPTCHA desde el formulario
$recaptcha_response = $_POST['recaptcha_response'];

// Verificar la respuesta de reCAPTCHA
$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = [
    'secret' => $secret,
    'response' => $recaptcha_response
];

$options = [
    'http' => [
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data)
    ]
];

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$resultJson = json_decode($result);

// Comprobación mejorada para incluir puntuación y mensaje de error
if ($resultJson->success !== true || $resultJson->score <= 0.5) {
    // La verificación ha fallado o la puntuación es demasiado baja
    $errorDetails = "Captcha verification failed";
    if ($resultJson->success !== true) {
        $errorDetails .= " - Verification failed.";
    }
    if ($resultJson->score !== null && $resultJson->score <= 0.5) {
        $errorDetails .= " - Score too low: " . $resultJson->score;
    }
    if (!empty($resultJson->{'error-codes'})) {
        // Incluir códigos de error de Google si están disponibles
        $errorDetails .= " - Error codes: " . implode(', ', $resultJson->{'error-codes'});
    }
    echo $errorDetails;
    exit;
}

// Continuar procesando el formulario
echo 'Captcha verification succeeded, Score: ' . $resultJson->score;

*/

//TEST de POST

/*
echo $Host;
echo $From;
echo $Password;
echo $Business;
echo $Web;
echo $Subject;
echo $Message;
echo $To;
*/

//Ajax para realizar petición
/*
$.post("Mailer.php",
{
    Host : "mail.xxx.com",
	From : "xxx@xxx.com",
	Password : "xxx",
	Business : "xxx",
	Web : "https://xxx.com",
	Subject : "xxx",
	Message : "xxx",
	To : "xxx@xxx.com"
});
*/

//PHP para realizar la petición

/*
$Texto="
<p>Hola, $firstname $lastname</p>
<br>
<p>Se ha completado con éxito tu registro.</p>
<br>
<br>
<p>Te recordamos los datos para inicio de sesión a continuación, tu usuario estará en modo de espera mientras uno de nuestros administradores aprueba tu registro.</p>
<p>Información:</p>
<table border='0'>
    <tbody>
        <tr>
            <td>Usuario:</td>
            <th>$username</th>
        </tr>
        <tr>
            <td>Contrasena:</td>
            <th>$password</th>
        </tr>
        
    </tbody>
</table>
<br>
<p>Cordialmente.</p>
<br>
<br>
<p><strong>ipsjcordoba</strong></p>
    ";


// Plantilla de notificación transaccional procesada via PHPMailer

	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPDebug = 0;
	$mail->Debugoutput = 'html';
	$mail->Host = $Host;
	$mail->CharSet = 'UTF-8';
	//$mail->Port = 465;
	//$mail->SMTPSecure = 'ssl';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587; // 465 is for ssl
	$mail->SMTPAuth = true;
	$mail->Username = $From;
	$mail->Password = $Password;
	$mail->setFrom($From, $Business);
	$mail->addAddress($To, $Business);
	//$mail->addAddress($To2, $Business2);
	$mail->Subject = $Subject;
	$mail->Body = $Message;
	$mail->IsHTML(true);
	$mail->Timeout = 10;

	$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
	));

	if (isset($_FILES['documento_adjunto']) && $_FILES['documento_adjunto']['error'] == UPLOAD_ERR_OK) {
    $mail->AddAttachment($_FILES['documento_adjunto']['tmp_name'], $_FILES['documento_adjunto']['name']);
}

	if (!$mail->send())
	{
		echo "<script>window.alert('Se ha producido un error por favor intentelo de nuevo 1')</script>";
		header ("Location: $Web");
		echo "Mailer Error: " . $mail->ErrorInfo;
		echo "<script type='text/javascript'>window.location='$Web';</script>";
	}
?>
<script type="text/javascript">
	window.location.href="<?=$Web?>";
</script>

# Mailer_PHP
Mailer en PHP

PHPMailer es una clase php para enviar emails basada en el componente active server ASPMail. Permite de una forma sencilla tareas complejas como por ejemplo: 
- Enviar mensajes de correo con ficheros adjuntos (attachments)
- enviar mensajes de correo en formato HTML

Con PHPMailer se pueden enviar emails via sendmail, PHP mail(), o con SMTP. Lo más recomendable es usando smtp por dos razones: 
- Con phpmailer se pueden usar varios servidores SMTP. Esto permite repartir la carga entre varias computadoras, con lo que se podrán enviar un mayor número de mensajes en un tiempo menor. 
- Además los servidores SMTP permiten mensajes con múltimples to's (destinatarios), cc's (Las direcciones que aparezcan en este campo recibirán el mensaje. Todos los destinatarios verán las direcciones que aparecen en la sección Cc), bcc's (Las direcciones que aparezcan en el campo Bcc recibirán el mensaje. Sin embargo, ninguno de los destinatarios podrá ver las direcciones que fueron incluidas en la sección Bcc) y Reply-tos (direcciones de respuesta) 

#Ajax para realizar petición

```javascript
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
```

#PHP para realizar la petición

```PHP
$Host="mail.xxx.com";
$From="xxx@xxx.com";
$Password="xxx";
$Business="xxx";
$Web="https://xxx.com";
$Subject="xxx";
$Message="xxx";
$To="xxx@xxx.com";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://XXX.com/Mailer.php");
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, "Host=$Host&From=$From&Password=$Password&Business=$Business&Web=$Web&Subject=$Subject&Message=".$Message."&To=$To");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$remote_server_output = curl_exec ($ch);
curl_close ($ch);

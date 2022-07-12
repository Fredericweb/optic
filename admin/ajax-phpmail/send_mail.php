<?php
//send_mail.php
include('../includes/config.php');
// if(!Empty(id) && !Empty(email) && !Empty(name)
// {
	require 'class/class.phpmailer.php';
	$sql1 =mysqli_query($con,"SELECT * FROM rdv WHERE (statu='1')");
$num1=mysqli_fetch_array($sql1);
$nom = $num1['nomrdv'];
$idrdv = $num1['idrdv'];
$prenom = $num1['prenomrdv'];
$email = $num1['mailrdv'];
$date = $num1['daterdv'];
$heure = $rowm['libelheure'];
$motifr= $rowc['libelTyperdv'];
	$output = '';
	// foreach($_POST['email_data'] as $row)
	// {
		$mail = new PHPMailer;
		$mail->IsSMTP();								//Sets Mailer to send message using SMTP
		$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
		$mail->Port = '465';								//Sets the default SMTP server port
		$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
		$mail->Username = 'zowblazo.optic@gmail.com';					//Sets SMTP username
		$mail->Password = 'zowblazoprojet2022';					//Sets SMTP password
		$mail->SMTPSecure = 'ssl';							//Sets connection prefix. Options are "", "ssl" or "tls"
		$mail->From = 'ZOWBLAZO OPTIC';			//Sets the From email address for the message
		$mail->FromName = 'zoblazo';					//Sets the From name of the message
		$mail->AddAddress("$email", "$nom");	//Adds a "To" address
		$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
		$mail->IsHTML(true);							//Sets message type to HTML
		$mail->Subject = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'; //Sets the Subject of the message
		//An HTML or plain text message body
		$mail->Body = '
		<p>succes</p>
		';

		$mail->AltBody = '';

		$result = $mail->Send();						//Send an Email. Return true on success or false on error

		if($result["code"] == '400')
		{
			$output .= html_entity_decode($result['full_error']);
		}

	// }
	
}

?>
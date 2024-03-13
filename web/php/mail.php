<?php
require "../../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;

function sendMail($name, $lastname, $email)
{
	// Configuration for the mail server
	$phpmailer = new PHPMailer();
	$phpmailer->isSMTP();
	$phpmailer->Host = 'smtp.gmail.com';
	$phpmailer->SMTPAuth = true;
	$phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
	$phpmailer->Port = 465;
	$phpmailer->Username = 'gfranciscoerazom@gmail.com';
	$phpmailer->Password = 'neve sdhn ssbe idok';
	$phpmailer->setLanguage('es', 'vendor/phpmailer/phpmailer/language/');
	$phpmailer->CharSet = 'UTF-8';


	// Recipients
	$phpmailer->setFrom('gabriel.erazo.merino@udla.edu.ec', '(Estudiante) Gabriel Erazo');
	$phpmailer->addAddress($email, "$name $lastname");

	// Content
	$phpmailer->isHTML(true);                                  //Set email format to HTML
	$phpmailer->Subject = '¡Gracias por registrarte! 🤘';
	$phpmailer->Body    = '<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
	xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
	<!--[if gte mso 9]>
	<xml>
		<o:OfficeDocumentSettings>
		<o:AllowPNG/>
		<o:PixelsPerInch>96</o:PixelsPerInch>
		</o:OfficeDocumentSettings>
	</xml>
	<![endif]-->
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="format-detection" content="date=no" />
	<meta name="format-detection" content="address=no" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="x-apple-disable-message-reformatting" />
	<!--[if !mso]><!-->
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,400i,700,700i|Barlow+Condensed:400,400i,700,700i"
		rel="stylesheet" />
	<!--<![endif]-->
	<title>Email Template</title>
	<!--[if gte mso 9]>
	<style type="text/css" media="all">
		sup { font-size: 100% !important; }
	</style>
	<![endif]-->


	<style type="text/css" media="screen">
		/* Linked Styles */
		body {
			padding: 0 !important;
			margin: 0 !important;
			display: block !important;
			min-width: 100% !important;
			width: 100% !important;
			background: #ffffff;
			-webkit-text-size-adjust: none
		}

		a {
			color: #d85d5c;
			text-decoration: none
		}

		p {
			padding: 0 !important;
			margin: 0 !important
		}

		img {
			-ms-interpolation-mode: bicubic;
			/* Allow smoother rendering of resized image in Internet Explorer */
		}

		.mcnPreviewText {
			display: none !important;
		}

		/* Mobile styles */
		@media only screen and (max-device-width: 480px),
		only screen and (max-width: 480px) {
			.mobile-shell {
				width: 100% !important;
				min-width: 100% !important;
			}

			.m-center {
				text-align: center !important;
			}

			.m-left {
				text-align: left !important;
			}

			.center {
				margin: 0 auto !important;
			}

			.left {
				margin-right: auto !important;
			}

			.td {
				width: 100% !important;
				min-width: 100% !important;
			}

			.m-br-5 {
				height: 5px !important;
			}

			.m-br-10 {
				height: 10px !important;
			}

			.m-br-15 {
				height: 15px !important;
			}

			.m-br-30 {
				height: 30px !important;
			}

			.m-td,
			.m-hide {
				display: none !important;
				width: 0 !important;
				height: 0 !important;
				font-size: 0 !important;
				line-height: 0 !important;
				min-height: 0 !important;
			}

			.m-block {
				display: block !important;
			}

			.fluid-img img {
				width: 100% !important;
				max-width: 100% !important;
				height: auto !important;
			}

			.column-top,
			.column {
				float: left !important;
				width: 100% !important;
				display: block !important;
			}

			.content-spacing {
				width: 15px !important;
			}

			.m-bg {
				display: block !important;
				width: 100% !important;
				height: auto !important;
				background-position: center center !important;
			}

			.h-auto {
				height: auto !important;
			}

			.ptb-0 {
				padding-top: 0px !important;
				padding-bottom: 0px !important;
			}

			.ptb-15 {
				padding-top: 15px !important;
				padding-bottom: 15px !important;
			}

			.ptb-25 {
				padding-top: 25px !important;
				padding-bottom: 25px !important;
			}

			.plr-5 {
				padding-left: 5px !important;
				padding-right: 5px !important;
			}

			.plr-15 {
				padding-left: 15px !important;
				padding-right: 15px !important;
			}

			.plr-0 {
				padding-left: 0px !important;
				padding-right: 0px !important;
			}

			.pb-25 {
				padding-bottom: 25px !important;
			}

			.pt-25 {
				padding-top: 25px !important;
			}

			.p-25-15 {
				padding: 25px 15px !important;
			}
		}
	</style>
</head>

<body class="body"
	style="padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#ffffff; -webkit-text-size-adjust:none;">
	<!-- Main -->
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td>
				<!-- Section 1 -->
				<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#313941">
					<tr>
						<td valign="top" class="m-td" style="font-size:0pt; line-height:0pt; text-align:left;">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td class="img" height="30" bgcolor="#ffffff"
										style="font-size:0pt; line-height:0pt; text-align:left;">&nbsp;</td>
								</tr>
							</table>
						</td>
						<td align="center" valign="top" width="650" class="mobile-shell">
							<table width="650" border="0" cellspacing="0" cellpadding="0" class="mobile-shell">
								<tr>
									<td class="td"
										style="width:650px; min-width:650px; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<!-- Ajusta la imágen y si se sale de los border recortala -->
												<td class="fluid-img"
													style="font-size:0pt; line-height:0pt; text-align:left;"><a href="#"
														target="_blank"><img style="object-fit: cover;"
															src="https://unsplash.com/photos/ZhQCZjr9fHo/download?ixid=M3wxMjA3fDB8MXxzZWFyY2h8M3x8bXVzaWMlMjBldmVudHxlbnwwfHx8fDE3MTAyNDE3NzV8MA&force=true"
															width="650" height="300" border="0" alt="" /></a></td>
											</tr>
											<tr>
												<td class="h1-1-white centered p-25-15"
													style="padding: 30px; color:#ffffff; font-family:\'Barlow Condensed\', Arial,sans-serif; font-size:44px; line-height:52px; text-align:center;"
													bgcolor="#d85d5c">
													🎷¡Gracias por registrarte!🎺
												</td>
											</tr>
											<tr>
												<td class="p-25-15" style="padding: 30px 30px 50px 30px;">
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															<td class="text-4-white centered"
																style="padding-bottom: 30px; color:#ffffff; font-family:\'Quicksand\', Arial,sans-serif; font-size:22px; line-height:34px; text-align:center;">
																<!-- Texto -->' .
		$name . ' ' . $lastname . ' ya estás registrado en la Casa Abierta de la Escuela de Música. 🎹
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
						<td valign="top" class="m-td" style="font-size:0pt; line-height:0pt; text-align:left;">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td class="img" height="30" bgcolor="#ffffff"
										style="font-size:0pt; line-height:0pt; text-align:left;">&nbsp;</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<!-- END Section 1 -->
			</td>
		</tr>
	</table>
	<!-- END Main -->
</body>

</html>';

	// Send the email
	$phpmailer->send();
}

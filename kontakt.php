<?php
    $message_sent = false;
    if (isset($_POST['submit'])) {

        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {

            $name = $_POST['name'];
            $mailFrom = $_POST['email'];
			$message = $_POST['nachricht'];

        
            $mailTo = "pascal@mogy.ch";
			$betreff = "Neue Nachricht von " .$name;
			$txt = "<html>";
			$txt .= "<style></style>";
			$txt .= "<body>";
			$txt .= "<h1 style='font-size: 20px; color: #3f6499;'> Neue Nachricht</h1>";
			$txt .= "<p>Du hast eine neue Nachricht von <em>".$mailFrom ."</em> erhalten:";
			$txt .="<table border='0' cellspacing='0' width='100%'>
						<tr>
							<td width='30'></td>
							<td width='500' style='color: #a58355;'>
								" . $message . "
							</td>
							<td></td>
						</tr>
					</table>";
			$txt .= "<p> Beantworte diese E-Mail um mit <em>" .$name ."</em> in Kontakt zu treten.</p>";
			$txt .= "</body></html>";

			$headers = "From: " .$mailFrom ."\r\n";
			$headers .= "Reply-To: ".$mailFrom ."\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=utf-8\r\n";

			
			$betreffSender = "Deine Nachricht wurde gesendet";
			$txtSender = "<html>";
			$txtSender .= "<style></style>";
			$txtSender .= "<body>";
			$txtSender .= "<h1 style='font-size: 20px; color: #3f6499;'> Nachricht gesendet</h1>";
			$txtSender .= "<p>Ich habe folgende Nachricht von dir erhalten:";
			$txtSender .="	<table border='0' cellspacing='0' width='100%'>
								<tr>
									<td width='30'></td>
									<td width='500' style='color: #a58355;'>
										" . $message . "
									</td>
									<td></td>
								</tr>
							</table>";
			$txtSender .= "<p>Ich werde mich so bald wie möglich bei dir melden.</p>";
			$txtSender .= "Liebe Grüsse <br>";
			$txtSender .= "Pascal";
			$txtSender .= "</body></html>";
			
			$headersSender = "From: noreply@mogy.ch\r\n";
			$headersSender .= "MIME-Version: 1.0\r\n";
			$headersSender .= "Content-Type: text/html; charset=utf-8\r\n";
			
			
			mail($mailTo, $betreff, $txt, $headers);
			mail($mailFrom, $betreffSender, $txtSender, $headersSender);




            $message_sent = true;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Kontakt | Rigi Bahnen</title>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<!-- Fonts and icons -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="./assets/img/logo/apple-touch-icon.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="./assets/img/logo/favicon-32x32.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="./assets/img/logo/favicon-16x16.png"
		/>
		<link rel="manifest" href="./assets/img/logo/site.webmanifest" />
		<link
			rel="mask-icon"
			href="./assets/img/logo/safari-pinned-tab.svg"
			color="#3e6599"
		/>
		<meta name="msapplication-TileColor" content="#3e6599" />
		<meta name="theme-color" content="#3e6599" />
		<link
			rel="stylesheet"
			type="text/css"
			href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Source+Sans+Pro:400,600,700|Material+Icons"
		/>
		<link
			rel="stylesheet"
			href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"
		/>
		<link rel="stylesheet" href="./assets/css/simple-lightbox.css" />

		<!-- Material Kit CSS -->
		<link href="./assets/scss/material-kit.css?v=2.0.7" rel="stylesheet" />
		<link rel="stylesheet" href="./additional.css" type="text/css" />
	</head>
	<body>
		<nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg"
			color-on-scroll="100">
			<div class="container">
				<div class="navbar-translate">
					<a class="navbar-brand" href="index.html"
						><svg
							xmlns="http://www.w3.org/2000/svg"
							class="logo"
							viewBox="0 0 1298.4 368.1"
						>
							<path
								d="M173.4 107.9c7.3 0 15.2-4.7 15.2-13.2 0-7.3-5.9-10.8-12.2-10.8 -7.3 0-15.2 4.7-15.2 13.2C161.2 104.4 167.1 107.9 173.4 107.9z"
							/>
							<path
								d="M354.6 107.9c7.3 0 15.2-4.7 15.2-13.2 0-7.3-5.9-10.8-12.2-10.8 -7.3 0-15.2 4.7-15.2 13.2C342.4 104.4 348.3 107.9 354.6 107.9z"
							/>
							<path
								d="M58 161.4c49.6-16.4 105.7-56 105.7-110.1 0-26.9-14.5-51.4-43-51.4C77 0 29.8 61.1 20.8 155.3h-3.4c-11 0-17.4 4.4-17.4 8.3 0 3.2 3.9 5.9 12.7 5.9 2.2 0 4.7-0.2 7.1-0.2 -0.5 5.9-0.5 12-0.5 18.1 0 22.7 12 34.5 27.9 34.5 8.1 0 17.1-2.9 26.2-9 -6.1-10.5-10.8-24-13.5-38.9 38.2 23.7 58.7 69.7 94.9 69.7 12 0 22-7.6 24-22.8 -31.5-2.2-77.3-37.9-120.3-55.5C58.2 164 58 162.7 58 161.4zM19.8 166.1c-2.2 0-4.4 0.2-6.6 0.2 -5.6 0-7.6-1-7.6-1.9 0-2 6.6-4.4 11.5-4.4 1.1-0.1 2.1 0 3.2 0.3C20.3 162.2 20.1 164.1 19.8 166.1zM56 128.4c0-54 15.7-108.1 43-108.1 21 0 24.5 30.1 24.5 44.8 0 40.8-30.6 74.8-66.3 91C56.3 146.9 55.9 137.6 56 128.4z"
							/>
							<path
								d="M553.2 233.6c0.1 0 0.1 0 0.2 0 62.8 0 112.5-51.4 112.5-92.2 0-20.5-12.7-38.4-42.8-45.7 18.1-16.1 31.3-37.7 31.3-55.5 0-19.3-15.7-34.7-58-34.7 -51.6 0-118.1 32.8-118.1 83.9 0 8.1 4.4 14.4 12.2 14.4 3.4 0 7.3-1 12-2.7 0-50.9 36.7-81.9 67.3-81.9 26.9 0 38.9 21.8 38.9 44.3 0 10.1-2.4 20-6.8 29.1 -3.9-0.4-7.8-0.5-11.7-0.5 -19.1 0-30.6 11.3-30.6 19.6 0 5.6 3.9 8.3 10 8.3 13.9 0 29.3-6.4 43-16.1 9 6.6 13.2 17.4 13.2 29.8 0.1 37.6-36.6 91.4-83.1 91.4 -22.3 0-46-9.3-46-32 0-15.6 11.7-31.8 27.4-34.2 4.6 24 10.8 40.8 11.3 40.8 4.4 0 9.8-3.4 9.8-5.9v-26c7.8-0.7 11.3-4.2 11.3-7.8 0-5.6-5.6-8.1-11.3-9.3 0.5-38.2 2-70.2 7.8-107.6 -26.7 0-34.7 26.4-34.7 60.6 0.2 16.1 1.6 32.1 4.4 47.9 -21 5.1-34 22.3-34 39.6 0 18.9 13 30 28.8 36.1 -26.1-3.7-52.9-5.7-78.9-5.7 -44.3 0-86.6 5.9-119.8 19.1 -5.9-22.7-11.7-45.7-13-68.7 5.6-9.3 9-19.3 9.5-28.1 -2.7-1.4-5.8-2-8.8-1.9 -10.5 0-21 7.6-21 16.4 0.1 8.5 0.9 17 2.5 25.4 -3.5 1.9-7.3 2.9-11.3 2.9 -10.8 0-15.4-9.1-15.4-20.3 0-17.4 11.3-39.4 28.6-39.4 8.1 0 12.2 4.6 13.2 10.5 5.1-0.5 10.3-4.4 10.3-6.8 0-3.7-5.6-7.8-17.4-7.8 -40 0-61.2 23.9-63.8 45.4 -11.7 16.3-21.3 23.1-28.6 23.1 -10.3 0-15.9-13.5-15.9-32.8 0.1-5.6 0.5-11.3 1.2-16.9 -2-1.5-4.9-2.2-8.3-2.2 -9.5 0-22.3 5.9-22.3 16.9 0 33.5 13.5 48.2 30.6 48.2 13.9 0 30.3-10 43.3-27.6 1.7 13.5 11.6 24.5 30.1 24.5 9.8 0 19.1-4.2 27.2-10.8 4.1 18.3 11 36.9 17.4 55.3 -35.5 17.4-58.4 44.8-58.4 84.4 0 25.7 16.6 37.9 35 37.9 22.8 0 48.4-18.6 48.4-52.1 0-22-5.1-44.8-11-67.7 15.2-4.6 34-6.6 55-6.6 115 0 294.2 63.1 310.4 118.9 19.5-1.7 28.1-18.3 28.1-28.4C714.2 289.1 641.3 251.8 553.2 233.6zM570.3 114c-2.7 0-4.4-1.5-4.4-4.4 0-5.1 11-12.2 23.2-12.2 3.1 0 6.2 0.2 9.3 0.7C591.9 107.6 582.3 114 570.3 114zM322.3 315.3c0 17.1-6.1 24.2-13.9 24.2 -12.5 0-28.6-18.6-28.6-46 0-19.3 11-32.5 29.1-40.8C316.2 274.2 322.3 295.4 322.3 315.3z"
							/>
							<path
								d="M370 204.5c16.6 0 36.7-14.2 50.4-38.7 2.9-5.1 5.9-10 8.1-14.9l-4.6-1.2c-2.4 5.3-5.2 10.5-8.3 15.4 -12.7 18.6-23 26.2-30.8 26.2 -10.3 0-15.9-13.4-15.9-32.8 0.1-5.6 0.5-11.3 1.2-16.9 -2-1.5-4.9-2.2-8.3-2.2 -9.5 0-22.3 5.9-22.3 16.9C339.5 189.8 352.9 204.5 370 204.5z"
							/>
							<path
								d="M1293.8 149.7c-2.4 5.3-5.2 10.5-8.3 15.4 -11 16.1-21.8 24.5-30.8 24.5 -11.7 0-20.1-14.4-20.1-44.3 0-2.5 0.3-4.9 0.3-7.6 -3.6-1.5-7.4-2.2-11.3-2.2 -25.2 0-32.5 22.7-41.1 47.4 -1.5 3.9-3.7 11.7-5.1 11.7 -1 0-1.7-3.4-1.7-13 0-17 2.1-33.9 6.1-50.4 -3.6-1.1-7.3-1.7-11-1.7 -17.4 0-24.7 14.4-24.7 26.7 0.1 3.2 0.5 6.5 1.2 9.6 -10.6 15.8-27.9 29.3-45.2 29.3 -13.4 0-20.8-8.1-23.7-18.6 22.5 0 40.8-23.5 40.8-39.6 0-8.6-5.1-14.9-17.4-14.9 -25 0-53.6 33-53.6 57.7 0 0.9 0 1.8 0.1 2.7 -5.6 4.7-10.9 7.1-15.8 7.1 -11.7 0-20-14.4-20-44.3 0-2.5 0.2-4.9 0.2-7.6 -3.6-1.5-7.4-2.2-11.3-2.2 -25.2 0-32.5 22.7-41.1 47.4 -1.5 3.9-3.7 11.7-5.1 11.7 -1 0-1.7-3.4-1.7-13 0-17 2.1-33.9 6.1-50.4 -3.6-1.1-7.3-1.7-11-1.7 -17.4 0-24.7 14.4-24.7 26.7 0.2 4.1 0.7 8.2 1.7 12.3 -10.2 13.9-20 21-28.4 21 -11.7 0-20-14.4-20-44.3 0-2.5 0.2-4.9 0.2-7.6 -3.6-1.5-7.4-2.2-11.3-2.2 -8.8 0-17.6 3.4-20.3 11 -4.4 12.2-11.7 32-19.1 43.8 -0.5-11.5-0.7-25.7-1.2-40.1 13-20.3 51.6-84.4 51.6-116.9 0-15.9-12-25.2-23.7-25.2 -41.9 0-41.6 82.9-43.3 148.5 -1.5 2.9-3.1 5.8-4.9 8.5 -13.2 20.1-26.7 30.6-36.9 30.6 -6.1 0-10-5.4-12.7-12.7 7.3-9.5 11.5-20.3 11.5-28.9 0-8.1-3.9-13.9-12-13.9 -13.2 0-18.8 10.5-18.8 23.2 0 8.6 2.2 17 6.4 24.5 -5.6 4.3-12.5 6.7-19.6 6.6 -10.3 0-14.9-11-14.9-24 0-18.3 9-40.3 24-40.3 5.6 0 11.3 1 13.5 8.3 7.1-0.7 10.3-3.2 10.3-5.9 0-3.7-5.9-7.8-16.2-7.8 -36.9 0-60.7 30.8-60.7 54.8 0 14.9 9.3 27.2 30.6 27.2 13.3 0 26.2-4.7 36.4-13.3 4.9 5.9 11 10 18.3 10 13.1 0 30.4-14 45.5-37 -0.5 15.7-1.3 30-2.9 41.4 1.1 1 2.6 1.5 4.2 1.5 4.9 0 11.5-3.2 11.5-3.2 9.5-11.7 16.2-22.5 26.4-49.2 2.2 33.8 15.2 47.5 31.3 47.5 15 0 32.5-11.8 46.7-30.1 4.3 15.4 12.8 33.2 23.5 33.2 2.5 0 5-0.5 7.3-1.5 5.9-7.6 14.4-45.2 25.9-55.8 2.7 37.2 16.6 52.1 33.8 52.1 10.1 0 21.3-5.3 31.8-14.5 3.3 10.5 14 18.1 35.5 18.1 23.5 0 47.9-12.7 63.7-34.1 4.1 15.8 12.9 35.5 24.1 35.5 2.5 0 5-0.5 7.3-1.5 5.9-7.6 14.4-45.2 25.9-55.8 2.7 37.2 16.6 52.1 33.8 52.1 16.6 0 36.2-14.4 50.6-36.4 3.1-4.8 5.8-9.7 8.1-14.9L1293.8 149.7zM752.3 160c0-9.5 1.7-17.1 4.6-17.1 3.4 0 4.9 3.4 4.9 8.6 0 6.6-2.7 15.9-8.1 24.2C752.8 170.5 752.3 165.3 752.3 160zM823.5 78.8c0-28.6 12.2-55.5 20.3-55.5 4.2 0 7.1 6.6 7.1 23 0 26.9-14.9 74.3-25.7 94.9C824.5 115.2 823.5 90.1 823.5 78.8zM1076.9 164.6c0-16.9 8.3-34.7 19.8-34.7 3.7 0 5.1 2.9 5.1 7.1 0 12.2-12.5 36.2-24.2 36.2C1077.1 170.4 1076.9 167.5 1076.9 164.6z"
							/>
						</svg>
					</a>
					<button
						class="navbar-toggler"
						type="button"
						data-toggle="collapse"
						aria-expanded="false"
						aria-label="Navigation einblenden"
					>
						<span class="sr-only">Navigation einblenden</span>
						<span class="navbar-toggler-icon"></span>
						<span class="navbar-toggler-icon"></span>
						<span class="navbar-toggler-icon"></span>
					</button>
				</div>

				<div class="collapse navbar-collapse">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a href="index.html" class="nav-link close-nav">
								<i class="material-icons">home</i> Home
							</a>
						</li>
						<li class="nav-item">
							<a href="stationen.html" class="nav-link close-nav">
								<i class="material-icons">directions_subway</i> Stationen
							</a>
						</li>
						<li class="nav-item">
							<a href="geschichte.html" class="nav-link close-nav">
								<i class="material-icons">restore</i> Geschichte
							</a>
						</li>
						<li class="nav-item dropdown">
							<a
								class="nav-link dropdown-toggle"
								href="javascript:;"
								id="navbarDropdownMenuLink"
								data-toggle="dropdown"
								aria-haspopup="true"
								aria-expanded="false"
							>
								<i class="material-icons">landscape</i> Die Rigi
							</a>
							<div
								class="dropdown-menu"
								aria-labelledby="navbarDropdownMenuLink"
							>
								<a class="dropdown-item" href="rigi.html">
									<i class="material-icons">emoji_objects</i> Über die Rigi
								</a>
								<a href="aktivitaten.html" class="dropdown-item">
									<i class="material-icons">local_activity</i> Aktivitäten
								</a>
								<a href="impressionen.html" class="dropdown-item">
									<i class="material-icons">image</i> Impressionen
								</a>
							</div>
						</li>
						<li class="nav-item active">
							<a href="kontakt.php" class="nav-link btn btn-primary close-nav">
								<i class="material-icons">email</i> Kontakt
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<div
			class="page-header page-header--sm header-filter"
			data-parallax="true"
			style="
				background-image: url('./assets/img/pages/index.jpg');
				background-color: #3f6499;
				background-position: center;
			"
		></div>
		<div class="main main-raised">
			<div class="container">
				<div class="section">
					<h1 class="text-center">Kontakt</h1>


				<?php
				if($message_sent):
				?>
			
					<div class="alert alert-success">
						<div class="container  alert--flex">
							<!-- <div class="alert-icon">
								<i class="material-icons">check</i>
							</div> -->
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="material-icons">clear</i></span>
							</button>
							<p>
								Vielen Dank für deine Nachricht! Du erhältst eine Kopie davon an die angegebene E-Mail-Adresse. <br>Solltest du keine E-Mail erhalten, prüfe bitte deinen Spam Ordner.<br><br> Ich setze mich so bald wie möglich mit dir in Verbindung.
							</p>
						</div>
					</div>	
					
					<p class="mt-5">
					Bereite dich doch in der Zwischenzeit auf einen Ausflug auf die Rigi vor: </p>
					<div class="menu-box-container">
						<a class="btn menu-box card" href="stationen.html">
							<div
								class="menu-box__img card-img-top"
								style="
									background-image: url(./assets/img/pages/stationen_sm.jpg);
									background-position: center;
									background-color: rgb(var(--primary));
								"
							></div>
							<div class="menu-box__button card-body">
								<h3>Stationen</h3>
								<i class="material-icons">arrow_forward</i>
							</div>
						</a>
						<a class="btn menu-box card" href="aktivitaten.html">
							<div
								class="menu-box__img card-img-top"
								style="
									background-image: url(./assets/img/pages/aktivitaten_sm.jpg);
									background-position: center;
									background-color: rgb(var(--primary));
								"
							></div>
							<div class="menu-box__button card-body">
								<h3>Aktivitäten</h3>
								<i class="material-icons">arrow_forward</i>
							</div>
						</a>
					</div>

				<?php
				else:
				?>

					<form
						class="container--form mb-5"
						action="kontakt.php"
						method="POST"
					>
						<div class="form-group col-12 col-md-8 col-lg-6">
							<label for="name" class="bmd-label-floating">Name</label>
							<input
								type="text"
								class="form-control"
								id="name"
								name="name"
								required
							/>
						</div>
						<div class="form-group col-12 col-md-8 col-lg-6">
							<label for="email" class="bmd-label-floating"
								>E-Mail-Adresse</label
							>
							<input
								type="email"
								class="form-control"
								id="email"
								name="email"
								required
							/>
						</div>
						<div class="form-group col-12">
							<label for="nachricht" class="bmd-label-floating"
								>Deine Nachricht</label
							>
							<textarea
								name="nachricht"
								id="nachricht"
								cols="30"
								rows="5"
								class="form-control"
								required
							></textarea>
						</div>

						<button type="submit" class="btn btn-primary mt-5" name="submit">
							Senden
						</button>
					</form>


				<?php
				endif;
				?>


					<div class="text-center">
						<a href="#" class="back-to-top text-center">
							<i class="material-icons">keyboard_arrow_up</i>
							<p class="text-center">Zurück nach oben</p>
						</a>
					</div>
				</div>
			</div>
		</div>
		<footer class="footer footer-default">
			<div class="container">
				<p>
					Diese Seite wurde im Rahmen einer Webentwickler-Ausbildung erstellt.
					Es handelt sich hierbei <strong>nicht</strong> um eine Seite der
					RigiPlus AG oder der Rigi Bahnen AG. Es wurden keine Verletzungen des
					geistigen Eigentums beabsichtigt. Offizielle Informationen zu den Rigi
					Bahnen AG sind hier zu finden:
					<a href="https://www.rigi.ch/Bergbahnen/Rigi-Bahnen">Rigi Bahnen</a>
				</p>
				<nav class="float-left">
					<ul>
						<li>
							<!-- <a href="https://www.creative-tim.com/">
								Creative Tim
							</a> -->
						</li>
					</ul>
				</nav>
				<div class="copyright float-right">
					&copy;
					<script>
						document.write(new Date().getFullYear());
					</script>
					, made with <i class="material-icons heart">favorite</i> by Pascal
				</div>
			</div>
		</footer>
		<!--   Core JS Files   -->
		<script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
		<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
		<script
			src="assets/js/core/bootstrap-material-design.min.js"
			type="text/javascript"
		></script>
		<script src="assets/js/plugins/moment.min.js"></script>
		<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
		<!-- <script
			src="assets/js/plugins/bootstrap-datetimepicker.js"
			type="text/javascript"
		></script> -->
		<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
		<!-- <script
			src="assets/js/plugins/nouislider.min.js"
			type="text/javascript"
		></script> -->
		<!--  Google Maps Plugin  -->
		<!-- <script
			type="text/javascript"
			src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"
		></script> -->
		<!-- Place this tag in your head or just before your close body tag. -->
		<script async defer src="https://buttons.github.io/buttons.js"></script>
		<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
		<script
			src="assets/js/material-kit.js?v=2.0.4"
			type="text/javascript"
		></script>
		<script src="assets/js/simple-lightbox.js" type="text/javascript"></script>
		<script>
			var lightbox = new SimpleLightbox(".gallery a", {});
		</script>
	</body>
</html>
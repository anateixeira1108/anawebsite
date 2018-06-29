<?php
include_once 'common.php';
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Ana Teixeira | <?php echo $lang['TITLE']; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header">

				<!-- Languages -->
					<div id="languages">
						<ul>
							<li><a href="index.php?lang=en">English</a></li>
							<li><a href="index.php?lang=es">Espa&ntilde;ol</a></li>
							<li><a href="index.php?lang=pt">Portugu&ecirc;s</a></li>
						</ul>
					</div>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="#intro"><?php echo $lang['MENU_INTRO'];?></a></li>
							<li><a href="#one"><?php echo $lang['MENU_ONE'];?></a></li>
							<li><a href="#two"><?php echo $lang['MENU_TWO'];?></a></li>
							<li><a href="#contact"><?php echo $lang['MENU_CONTACT'];?></a></li>
						</ul>
					</nav>

			</header>

		<!-- Intro -->
			<section id="intro" class="main style1 dark fullscreen">
				<div class="content container 75%">
					<?php echo $lang['INTRO'];?>
					<footer>
						<a href="#one" class="button style2 down"><?php echo $lang['NEXT'];?></a>
					</footer>
				</div>
			</section>

		<!-- One -->
			<section id="one" class="main style2 right dark fullscreen">
				<div class="content box style2">
					<header>
						<h2><?php echo $lang['MENU_ONE'];?></h2>
					</header>
					<p><?php echo $lang['ONE'];?></p>
				</div>
				<a href="#two" class="button style2 down anchored"><?php echo $lang['NEXT'];?></a>
			</section>

		<!-- Two -->
			<section id="two" class="main style2 left dark fullscreen">
				<div class="content box style2">
					<header>
						<h2><?php echo $lang['MENU_TWO'];?></h2>
					</header>
					<p><?php echo $lang['TWO'];?></p>
					<p><?php echo $lang['TWO_LINKS'];?></p>
				</div>
				<a href="#contact" class="button style2 down anchored"><?php echo $lang['NEXT'];?></a>
			</section>

		<!-- Contact -->
			<section id="contact" class="main style3 secondary">
				<div class="content container">
					<header>
						<h2><?php echo $lang['CONTACT_MSG'];?></h2>
					</header>
					<div class="box container 50%">

					<!-- Contact Form -->
							<form method="post" id="contact_form">
								<div class="row 50%">
									<div class="6u 12u(mobile)"><input id="name" type="text" name="name" placeholder="<?php echo $lang['FORM_NAME'];?>" /></div>
									<div class="6u 12u(mobile)"><input id="email" type="email" name="email" placeholder="<?php echo $lang['FORM_EMAIL'];?>" /></div>
								</div>
								<div class="row 50%">
									<div class="12u"><textarea id="message" name="message" placeholder="<?php echo $lang['FORM_MESSAGE'];?>" rows="6"></textarea></div>
								</div>
								<div class="row">
									<div class="12u">
										<ul class="actions">
											<li><input type="submit" value="<?php echo $lang['FORM_SEND'];?>" /></li>
										</ul>
									</div>
								</div>
							</form>
							<div id="success">
							    <span class="green textcenter">
							        <p><?php echo $lang['FORM_SUCCESS'];?></p>
							    </span>
							</div>

							<div id="error">
							    <span>
							        <p><?php echo $lang['FORM_ERROR'];?></p>
							    </span>
							</div>
					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">

				<!-- Menu -->
					<ul class="menu">
						<li>&copy; 2016 Ana Teixeira. <?php echo $lang['FOOTER'];?></li>
					</ul>

			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
		<!-- Validation Form -->
			<script src="assets/js/jquery.form.js"></script>
			<script src="assets/js/jquery.validate.min.js"></script>
			<script type="text/javascript">

			// validate contact form
			$(function() {
			    $('#contact_form').validate({
			        rules: {
			            name: {
			                required: true,
			                minlength: 2
			            },
			            email: {
			                required: true,
			                email: true
			            },
			            message: {
			                required: true
			            }
			        },
			        messages: {
			            name: {
			                required: "<?php echo $lang['VAL_NAME_REQ'];?>",
			                minlength: "<?php echo $lang['VAL_NAME_MIN'];?>"
			            },
			            email: {
			                required: "<?php echo $lang['VAL_EMAIL_REQ'];?>"
			            },
			            message: {
			                required: "<?php echo $lang['VAL_MSG_REQ'];?>",
			                minlength: "<?php echo $lang['VAL_MSG_MIN'];?>"
			            }
			        },
			        submitHandler: function(form) {
			            $(form).ajaxSubmit({
			                type:"POST",
			                data: $(form).serialize(),
			                url:"send.php",
			                success: function() {
			                    $('#contact_form :input').attr('disabled', 'disabled');
			                    $('#contact_form').fadeTo( "slow", 0.15, function() {
			                        $(this).find(':input').attr('disabled', 'disabled');
			                        $(this).find('label').css('cursor','default');
			                        $('#success').fadeIn();
			                    });
			                },
			                error: function() {
			                    $('#contact_form').fadeTo( "slow", 0.15, function() {
			                        $('#error').fadeIn();
			                    });
			                }
			            });
			        }
			    });
			});
			</script>

	</body>
</html>
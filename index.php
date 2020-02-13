<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Horror Library</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
	<link rel="stylesheet" href="styles.css">
</head>
<body>

	<!-- Шапка сайта. Логотип и кнопки для входа и регистрации. Для проверки работоспособности входа: 
	login: test9
	password: test9

	и

	login: testuser8
	password: test8	-->
	<header class="header">
		<a href="/" class="logo">
			<img src="images/layout/logo.png" alt="Horror Library Logo" class="logo__img">
		</a>
		<nav class="menu">
			<ul class="menu__list">
				<li class="menu__item">
					<form action="/" method="post">
						<button type="submit" name="LogIn_Pressed" class="empty__button"><img src="images/layout/LogIn.png"></p></button>
					</form>
				</li>
				<li class="menu__item">
					<form action="/" method="post">
						<button type="submit" name="SignUp_Pressed" class="empty__button"><img src="images/layout/SignUp.png"></p></button>
					</form>
				</li>
			</ul>
		</nav>
	</header>

	<!-- Проверка на нажатие кнопок регистрации и входа -->
	<?php
		if(isset($_POST['SignUp_Pressed'])){
	?>

	<section class="main">
		<div class = mdl><fieldset><legend><h1 class="main__title__registration">Register your account</h1></legend>
		<form action = 'includes/signup.inc.php' method = 'post'>
		<p class="main__title__registration">Enter your username  <input type = 'text' name = 'uid' placeholder = 'Username'><br><br></p>
		<p class="main__title__registration">Enter your e-mail  <input type = 'text' name = 'mail' placeholder = 'E-Mail'><br><br></p>
		<p class="main__title__registration">Create a password  <input type = 'password' name = 'pwd' placeholder = 'Password'><br><br></p>
		<p class="main__title__registration">Confirm your password  <input type = 'password' name = 'pwd-repeat' placeholder = 'Repeat password'><br><br></p>
		<button type = 'submit' name = 'signup-submit'>Signup</button></form></fieldset></div>
	</section>

	<?php
		} else if(isset($_POST['LogIn_Pressed'])){
	?>

	<section class="main">
		<div class = mdl><fieldset><legend><h1 class="main__title__registration">Log to your account</h1></legend>
		<form action = 'includes/login.inc.php' method = 'post'>
		<p class="main__title__registration">Enter your username  <input type = 'text' name = 'uid' placeholder = 'Username'><br><br></p>
		<p class="main__title__registration">Enter your password  <input type = 'password' name = 'pwd' placeholder = 'Password'><br><br></p>
		<button type = 'submit' name = 'login-submit'>Log In</button></form></fieldset></div>
	</section>

	<!-- Проверка выполнения регистрации. При получении одной из ошибок, возвращает на главную страницу с открытой формой регистрации -->
	<?php
		} 

	if(isset($_GET['error'])){
		if($_GET['error'] == "emptyfields"){
	?>
	<section class="main">
		<div class = mdl><fieldset><legend><h1 class="main__title__registration">Register your account</h1></legend>
		<form action = 'includes/signup.inc.php' method = 'post'>
		<div class = mdl><font color = red>Fill in all fields!</font></div>
		<p class="main__title__registration">Enter your username  <input type = 'text' name = 'uid' placeholder = 'Username'><br><br></p>
		<p class="main__title__registration">Enter your e-mail  <input type = 'text' name = 'mail' placeholder = 'E-Mail'><br><br></p>
		<p class="main__title__registration">Create a password  <input type = 'password' name = 'pwd' placeholder = 'Password'><br><br></p>
		<p class="main__title__registration">Confirm your password  <input type = 'password' name = 'pwd-repeat' placeholder = 'Repeat password'><br><br></p>
		<button type = 'submit' name = 'signup-submit'>Signup</button></form></fieldset></div>
	</section>

			<?php
			}
			else if($_GET['error'] == "invalidmailuid"){
			?>

	<section class="main">
		<div class = mdl><fieldset><legend><h1 class="main__title__registration">Register your account</h1></legend>
		<form action = 'includes/signup.inc.php' method = 'post'>
		<div class = mdl><font color = red>Invalid username and e-mail!</font></div>
		<p class="main__title__registration">Enter your username  <input type = 'text' name = 'uid' placeholder = 'Username'><br><br></p>
		<p class="main__title__registration">Enter your e-mail  <input type = 'text' name = 'mail' placeholder = 'E-Mail'><br><br></p>
		<p class="main__title__registration">Create a password  <input type = 'password' name = 'pwd' placeholder = 'Password'><br><br></p>
		<p class="main__title__registration">Confirm your password  <input type = 'password' name = 'pwd-repeat' placeholder = 'Repeat password'><br><br></p>
		<button type = 'submit' name = 'signup-submit'>Signup</button></form></fieldset></div>
	</section>

			<?php
			}
			else if($_GET['error'] == "invaliduid"){
			?>

	<section class="main">
		<div class = mdl><fieldset><legend><h1 class="main__title__registration">Register your account</h1></legend>
		<form action = 'includes/signup.inc.php' method = 'post'>
		<div class = mdl><font color = red>Invalid username!</font></div>
		<p class="main__title__registration">Enter your username  <input type = 'text' name = 'uid' placeholder = 'Username'><br><br></p>
		<p class="main__title__registration">Enter your e-mail  <input type = 'text' name = 'mail' placeholder = 'E-Mail'><br><br></p>
		<p class="main__title__registration">Create a password  <input type = 'password' name = 'pwd' placeholder = 'Password'><br><br></p>
		<p class="main__title__registration">Confirm your password  <input type = 'password' name = 'pwd-repeat' placeholder = 'Repeat password'><br><br></p>
		<button type = 'submit' name = 'signup-submit'>Signup</button></form></fieldset></div>
	</section>

			<?php
			}
			else if($_GET['error'] == "invalidmail"){
			?>

	<section class="main">
		<div class = mdl><fieldset><legend><h1 class="main__title__registration">Register your account</h1></legend>
		<form action = 'includes/signup.inc.php' method = 'post'>
		<div class = mdl><font color = red>Invalid e-mail!</font></div>
		<p class="main__title__registration">Enter your username  <input type = 'text' name = 'uid' placeholder = 'Username'><br><br></p>
		<p class="main__title__registration">Enter your e-mail  <input type = 'text' name = 'mail' placeholder = 'E-Mail'><br><br></p>
		<p class="main__title__registration">Create a password  <input type = 'password' name = 'pwd' placeholder = 'Password'><br><br></p>
		<p class="main__title__registration">Confirm your password  <input type = 'password' name = 'pwd-repeat' placeholder = 'Repeat password'><br><br></p>
		<button type = 'submit' name = 'signup-submit'>Signup</button></form></fieldset></div>
	</section>

			<?php
			}
			else if($_GET['error'] == "passwordcheck"){
			?>

	<section class="main">
		<div class = mdl><fieldset><legend><h1 class="main__title__registration">Register your account</h1></legend>
		<form action = 'includes/signup.inc.php' method = 'post'>
		<div class = mdl><font color = red>Your passwords do not match!</font></div>
		<p class="main__title__registration">Enter your username  <input type = 'text' name = 'uid' placeholder = 'Username'><br><br></p>
		<p class="main__title__registration">Enter your e-mail  <input type = 'text' name = 'mail' placeholder = 'E-Mail'><br><br></p>
		<p class="main__title__registration">Create a password  <input type = 'password' name = 'pwd' placeholder = 'Password'><br><br></p>
		<p class="main__title__registration">Confirm your password  <input type = 'password' name = 'pwd-repeat' placeholder = 'Repeat password'><br><br></p>
		<button type = 'submit' name = 'signup-submit'>Signup</button></form></fieldset></div>
	</section>

			<?php
			}
			else if($_GET['error'] == "usertaken"){
			?>

	<section class="main">
		<div class = mdl><fieldset><legend><h1 class="main__title__registration">Register your account</h1></legend>
		<form action = 'includes/signup.inc.php' method = 'post'>
		<div class = mdl><font color = red>Username is already taken!</font></div>
		<p class="main__title__registration">Enter your username  <input type = 'text' name = 'uid' placeholder = 'Username'><br><br></p>
		<p class="main__title__registration">Enter your e-mail  <input type = 'text' name = 'mail' placeholder = 'E-Mail'><br><br></p>
		<p class="main__title__registration">Create a password  <input type = 'password' name = 'pwd' placeholder = 'Password'><br><br></p>
		<p class="main__title__registration">Confirm your password  <input type = 'password' name = 'pwd-repeat' placeholder = 'Repeat password'><br><br></p>
		<button type = 'submit' name = 'signup-submit'>Signup</button></form></fieldset></div>
	</section>

	<!-- Проверка выполнения входа. При получении одной из ошибок, возвращает на главную страницу с открытой формой входа -->
			<?php
			}
			else if($_GET['error'] == "emptyfieldz"){
			?>

	<section class="main">
		<div class = mdl><fieldset><legend><h1 class="main__title__registration">Register your account</h1></legend>
		<form action = 'includes/login.inc.php' method = 'post'>
		<div class = mdl><font color = red>Fill in all fields!</font></div>
		<p class="main__title__registration">Enter your username  <input type = 'text' name = 'uid' placeholder = 'Username'><br><br></p>
		<p class="main__title__registration">Enter your password  <input type = 'password' name = 'pwd' placeholder = 'Password'><br><br></p>
		<button type = 'submit' name = 'login-submit'>Log In</button></form></fieldset></div>
	</section>

		<?php
			} elseif ($_GET['error'] == "wrongpwd") {
		?>

	<section class="main">
		<div class = mdl><fieldset><legend><h1 class="main__title__registration">Register your account</h1></legend>
		<form action = 'includes/login.inc.php' method = 'post'>
		<div class = mdl><font color = red>Wrong password!</font></div>
		<p class="main__title__registration">Enter your username  <input type = 'text' name = 'uid' placeholder = 'Username'><br><br></p>
		<p class="main__title__registration">Enter your password  <input type = 'password' name = 'pwd' placeholder = 'Password'><br><br></p>
		<button type = 'submit' name = 'login-submit'>Log In</button></form></fieldset></div>
	</section>
		
	<?php
		}
	} else {
		?>
		<section class="main">
		<h1 class="main__title">Find your favourite<span class="main__title-big">Horror Book</span></h1>
		<p class="main__title2">If you are not scared <span class="main__title-big2">Let's get started</span></p>
		</section>
		<?php
	}
	?>


	<!-- Блок №3, он же "контент" с объяснениями почему пользователь должен пользоваться услугами именно этой библиотеки -->
	<section class="content">
		<h1 class="content__main">Why should you choose us?</h1>
		<ul class="content__list"> 
			<li class="content__item">
				<div class="swing"><img src="images/layout/BestAuthors.png"></div>
				<h3 class="content__title">Best Authors</h3>
				<p class="content__description">Our library contains books of<br><br><br><br><br>the best authors in the horror<br><br><br><br><br>genre</p>
			</li>
			<li class="content__item">
				<div class="swing"><img src="images/layout/Delivery.png"></div>
				<h3 class="content__title">Delivery</h3>
				<p class="content__description">Our dem<span class="content__dots">...</span> couriers will deliver<br><br><br><br><br>the book to any part of the city</p>
			</li>
			<li class="content__item">
				<div class="swing"><img src="images/layout/RentTime.png"></div>
				<h3 class="content__title">Rental Time</h3>
				<p class="content__description">In your profile you can find out<br><br><br><br><br>when you need to return a book.<br><br><br><br><br>Return books on time!<br><br><br><br><br><span class="content__description-crossed">Or our tame demons will take you<br><br><br><br><br>straight to hell!</span></p>
			</li>
		</ul>
	</section>

	<!-- Блок №4, в котором представленны автора, чьи книги доступны для "аренды" в библиотеке -->
	<section class="authors">
		<h1 class="authors__main">Most popular authors</h1>
		<ul class="authors__list"> 
			<li class="authors__item">
				<div class="grow"><img src="images/layout/King.png" height="272.5" width="246.5"></div>
				<h3 class="authors__title">Stephen King</h3>
			</li>
			<li class="authors__item">
				<div class="grow"><img src="images/layout/Poe.png" height="272.5" width="246.5"></div>
				<h3 class="authors__title">Edgar Allan Poe</h3>
			</li>
			<li class="authors__item">
				<div class="grow"><img src="images/layout/Lovecraft.png" height="272.5" width="246.5"></div>
				<h3 class="authors__title">H. P. Lovacraft</h3>
			</li>
		</ul>
		<ul class="authors__list"> 
			<li class="authors__item">
				<div class="grow"><img src="images/layout/Stein.png" height="272.5" width="246.5"></div>
				<h3 class="authors__title">R. L. Stine</h3>
			</li>
			<li class="authors__item">
				<div class="grow"><img src="images/layout/Shelley.png" height="272.5" width="246.5"></div>
				<h3 class="authors__title">Mary Shelley</h3>			
			</li>
			<li class="authors__item">
				<div class="grow"><img src="images/layout/Stevenson.png" height="272.5" width="246.5"></div>
				<h3 class="authors__title">R. L. Stevenson</h3>
			</li>
		</ul>
	</section>

	<!-- Блок №5, отзывы пользователей в шуточной форме -->
	<section class="reviews">
		<h1 class="reviews__main">Reviews</h1>
		<ul class="reviews__list"> 
			<li class="reviews__item">
				<div class="rotate"><img src="images/layout/Review1.png" width = "550" height = "250"></div>
			</li>
			<li class="reviews__item">
				<div class="rotate2"><img src="images/layout/Review2.png" width = "550" height = "250"></div>
			</li>
		</ul>
		<ul class="reviews__list"> 
			<li class="reviews__item">
				<div class="rotate"><img src="images/layout/Review3.png" width = "550" height = "250"></div>
			</li>
			<li class="reviews__item">
				<div class="rotate2"><img src="images/layout/Review4.png" width = "550" height = "250"></div>
			</li>
		</ul>
		<h1 class="reviews__footer">See? Even famous people choose us!!!</h1>
	</section>

	<!-- Блок №6. Краткое описание работы сайта -->
	<section class="content__last">
		<h1 class="content__last__main">Follow 3 simple steps</h1>
		<ul class="content__last__list"> 
			<li class="content__last__item">
				<img src="images/layout/Step1.png" width="99" height="97.5">
				<h3 class="content__last__title">Create your account</h3>
				<p class="content__last__description">Put your credit card away, there<br><br><br><br><br>are no fees or charges! You are<br><br><br><br><br>only seconds from starting</p>
			</li>
			<li class="content__last__item">
				<img src="images/layout/Step2.png"width="99" height="97.5">
				<h3 class="content__last__title">Rent a book and order it</h3>
				<p class="content__last__description">just do it! choose from one to<br><br><br><br><br>three books and rent them! just!<br><br><br><br><br>do! it!</p>
			</li>
			<li class="content__last__item">
				<img src="images/layout/Step3.png"width="99" height="97.5">
				<h3 class="content__last__title">Enjoy</h3>
				<p class="content__last__description">Enjoy reading chosen book!</p>
			</li>
		</ul>
	</section>

	<!-- Блок №7. "Подвал" сайта, с указанным адресом и номером телефона -->
	<section class="footer">
		<h3 class="footer__foot"> </h3>
	</section>
</body>
</html>
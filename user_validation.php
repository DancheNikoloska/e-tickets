<?php
 include_once 'delete_reservations.php';
//funkcii za validacija na vlezovite pri logiranje i registracija na koisnikot


//se validira e-meil
function validateEmail($connection, $email) {
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		return false;
	} else {
		$flag = 1;
	}
	$email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
	if (strlen($email) > 0) {
		$q = mysqli_query($connection, "SELECT * FROM users WHERE EMAIL='$email'");
		if (mysqli_num_rows($q) > 0) {
			return false;
		} else if ($flag == 1) {
			return true;
		}
	} else {
		return false;
	}
}

//se poveruva dali korisnikot vnel tocni podtoci
function validateLogin($connection, $lozinka, $user) {
	$lozinka = md5($lozinka);
	if (strlen($lozinka) > 0 && strlen($user) > 0) {
		//echo $lozinka;
		$q = mysqli_query($connection, "SELECT * FROM users WHERE password='$lozinka' AND username='$user' and usertype='Корисник'");
		if (mysqli_num_rows($q) > 0) {
			return true;
		} else {
			return false;
		}
	}
}

//se proveruva dali e logiran adminot
function validateLoginAdmin($connection, $lozinka, $user) {
	//$salt = "baklava";
	//$lozinka = md5($salt . $lozinka);
	$lozinka = md5($lozinka);
	if (strlen($lozinka) > 0 && strlen($user) > 0) {
		$q = mysqli_query($connection, "SELECT * FROM users WHERE password='$lozinka' AND username='$user' AND usertype='Администратор'");
		if (mysqli_num_rows($q) > 0) {
			return true;
		} else {
			return false;
		}
	}
}

//se validira vneseniot password, dali e dovolno kompliciran
function validatePassword($connection, $lozinka) {
	if (strlen($lozinka) < 8) {
		return false;
	} else {
		$flag = 1;
		//return true;
	}
	$containsDigit = preg_match('/\d/', $lozinka);
	if ($containsDigit == 0) {
		return false;
	} else if ($flag == 1) {
		return true;
	}
}

//se proveruva dali veke postoi korisnicko ime
function validateUsername($connection, $user) {
	$user = htmlspecialchars($user, ENT_QUOTES, 'UTF-8');
	if (strlen($user) > 0) {
		$q = mysqli_query($connection, "SELECT * FROM users WHERE username='$user'");
		if ($q) {
			if (mysqli_num_rows($q) > 0) {
				return false;
			} else {
				return true;
			}
		} else {
			return false;
		}
	} else {
		return false;
	}
}

//se proveruva dali korisnikot e admin
function isAdmin($connection, $username) {
	$username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
	if (strlen($username) > 0) {
		$q = mysqli_query($connection, "SELECT * FROM users WHERE username='$username'");
		$row = mysql_fetch_assoc($q);
		if ($row['role_type'] == 'admin') {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}
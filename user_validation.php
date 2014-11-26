<?php
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
function validateLogin($connection, $lozinka, $user) {
	$salt = "baklava";
	$lozinka = md5($salt . $lozinka);
	$lozinka = htmlspecialchars($lozinka, ENT_QUOTES, 'UTF-8');
	if (strlen($lozinka) > 0 && strlen($user) > 0) {
		$q = mysqli_query($connection, "SELECT * FROM users WHERE password='$lozinka' AND username='$user'");
		if (mysqli_num_rows($q) > 0) {
			return true;
		} else {
			return false;
		}
	}
}
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
function isProfesor($connection, $username) {
	$username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
	if (strlen($username) > 0) {
		$q = mysqli_query($connection, "SELECT * FROM USERS WHERE username='$username'");
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
function isStudent($connection, $username) {
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
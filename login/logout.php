<?php
	// Start the session
	session_start();

	// Remove all session variables
	session_unset();

	// Destroy the session
	session_destroy();

	header("Location: index.php");
?>

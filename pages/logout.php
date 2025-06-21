<?php
session_start();
session_destroy();

// Redirect ke halaman home (pastikan rute 'home' valid)
header("Location: /KosPelitaHarapan/home");
exit;

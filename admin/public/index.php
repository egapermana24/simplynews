<?php
// Periksa jika ada yang mengarah ke halaman ini
if ($_SERVER['REQUEST_URI'] !== '/') {
  // Redirect ke halaman index paling depan
  http_response_code(404);
}

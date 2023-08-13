if (isset($_SERVER['HTTP_SERVICE_WORKER']) && $_SERVER['HTTP_SERVICE_WORKER'] === 'script') {
  header('Content-Type: application/javascript');
  readfile('service-worker.js');
  exit;
}

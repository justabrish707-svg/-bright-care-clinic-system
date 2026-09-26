<?php
declare(strict_types=1);
session_start();

// Load .env variables if file exists
$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        list($name, $value) = explode('=', $line, 2);
        $_ENV[trim($name)] = trim($value);
    }
}

define('DB_HOST', $_ENV['DB_HOST'] ?? '127.0.0.1');
define('DB_NAME', $_ENV['DB_NAME'] ?? 'bright_care_clinic');
define('DB_USER', $_ENV['DB_USER'] ?? 'root');
define('DB_PASS', $_ENV['DB_PASS'] ?? '');
define('APP_ENV', $_ENV['APP_ENV'] ?? 'production');

function db(): PDO {
    static $pdo = null;
    if ($pdo === null) {
        try {
            $pdo = new PDO(
                'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4',
                DB_USER, DB_PASS,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        } catch (PDOException $e) {
            // In production, do not leak connection errors/stack traces
            if (APP_ENV === 'production') {
                error_log("Database connection failed: " . $e->getMessage());
                http_response_code(500);
                exit('A database error occurred. Please try again later.');
            } else {
                throw $e;
            }
        }
    }
    return $pdo;
}

function e(?string $v): string { return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8'); }
function redirect(string $url): never { header("Location: $url"); exit; }
function csrf(): string {
    if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(32));
    return $_SESSION['csrf'];
}
function check_csrf(): void {
    if (!hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'] ?? '')) {
        http_response_code(419); exit('Invalid CSRF token.');
    }
}
function flash(string $type, string $message): void { $_SESSION['flash'] = [$type,$message]; }
function get_flash(): ?array { $x=$_SESSION['flash']??null; unset($_SESSION['flash']); return $x; }
function auth(): ?array { return $_SESSION['user'] ?? null; }
function require_login(): void { if (!auth()) redirect('login.php'); }
function require_role(string ...$roles): void {
    require_login();
    if (!in_array(auth()['role'], $roles, true)) { http_response_code(403); exit('403 Forbidden'); }
}
function post(string $key): string { return trim((string)($_POST[$key] ?? '')); }

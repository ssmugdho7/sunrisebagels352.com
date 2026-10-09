<?php
function app_path(string $path = ''): string {
    $base = dirname(__DIR__);
    return $base . ($path ? '/' . ltrim($path, '/') : '');
}
function load_json(string $relative, array $fallback = []): array {
    $path = app_path($relative);
    if (!is_file($path)) return $fallback;
    $data = json_decode((string)file_get_contents($path), true);
    return is_array($data) ? $data : $fallback;
}
function save_json(string $relative, array $data): bool {
    $path = app_path($relative);
    $tmp = $path . '.tmp';
    $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    if ($json === false) return false;
    if (file_put_contents($tmp, $json . PHP_EOL, LOCK_EX) === false) return false;
    return rename($tmp, $path);
}
function e(?string $value): string { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
function settings(): array { static $s; return $s ??= load_json('data/settings.json'); }
function menu_data(): array { static $m; return $m ??= load_json('data/menu.json'); }
function is_owner(): bool { return !empty($_SESSION['sunrise_owner']); }
function require_owner(): void {
    if (!is_owner()) { header('Location: login.php'); exit; }
}
function csrf_token(): string {
    if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(24));
    return $_SESSION['csrf'];
}
function verify_csrf(): void {
    if (!isset($_POST['csrf']) || !hash_equals($_SESSION['csrf'] ?? '', (string)$_POST['csrf'])) {
        http_response_code(403); exit('Invalid request token.');
    }
}
function owner_config(): array { return require app_path('config/owner.php'); }
function update_owner_hash(string $hash): bool {
    $file = app_path('config/owner.php');
    $contents = "<?php\nreturn [\n    'password_hash' => " . var_export($hash, true) . ",\n];\n";
    return file_put_contents($file, $contents, LOCK_EX) !== false;
}
function url(string $path = ''): string { return $path; }

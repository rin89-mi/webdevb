<?php
// login.php
session_start();
require_once __DIR__ . '/inc/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    $dbh = db_open();
    $sql = 'SELECT id, username, password FROM users WHERE username = :u';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':u', $_POST['username'] ?? '');
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row && password_verify($_POST['password'] ?? '', $row['password'])) {
      session_regenerate_id(true);
      $_SESSION['login']    = true;
      $_SESSION['user_id']  = (int)$row['id'];
      $_SESSION['username'] = $row['username'];
      header('Location: index.php');
      exit;
    }
    $error = 'ログインに失敗しました。';
  } catch (PDOException $e) {
    $error = 'エラーが発生しました。';
  }
}

include __DIR__ . '/inc/header.php';
?>
<h2 class="login-title">ログイン</h2>

<?php if (!empty($error)): ?>
<p class="login-error"><?= str2html($error) ?></p>
<?php endif; ?>

<form method="post" action="login.php" class="login-form">
  <p class="login-item">
    <label class="login-label">
      ユーザー名
      <input class="login-input" type="text" name="username" required>
    </label>
  </p>

  <p class="login-item">

  <label class="login-label">
    パスワード
  </label>

  <div class="password-box">
    <input
      class="login-input"
      type="password"
      name="password"
      id="password"
      required
    >
    <button
      type="button"
      class="toggle-password"
      id="togglePassword"
    >
      👁
    </button>
  </div>
</p>

  <button class="login-btn" type="submit">ログイン</button>
</form>
<?php include __DIR__ . '/inc/footer.php'; ?>

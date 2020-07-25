
<?php
require_once '../core/init.php';
?>
<form id='login' method="post">
  <div class="field">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" autocomplete="off" />
  </div>
  <div class="field">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" autocomplete="off" />
  </div>
  <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
  <input type="submit" value="login" />
</form>
<a href="../index.php">Home</a>
<?php
if (isset($_POST)) {
?>
  <script>
      let form = document.getElementById("login");
      form.addEventListener('submit', (e) => {
        e.preventDefault();
        form.action = "<?php echo 'login.php' ?>";
        form.submit();
      });
  </script>
<?php
}
?>


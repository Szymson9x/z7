Formularz Rejestracji <br><br>
<form method="post" action="<?php echo(__DIR__)?>/rejestrujSend.php">
<div class="form-group row">
    <label for="inputLoginRejestruj" class="col-sm-1 col-form-label">Login</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="inputLoginRejestruj" name="userRejestracja" placeholder="Wprowadz login" maxlength="20" size="20">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPasswordRejestruj" class="col-sm-1 col-form-label">Hasło</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" id="inputPasswordRejestruj" name="passRejestracja" placeholder="Wprowadz haslo" maxlength="20" size="20">
    </div>
 </div>
<button type="submit" class="btn btn-primary">Wyślij</button>
</form>
 
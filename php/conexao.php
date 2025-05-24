<?php
try {
  $db = new PDO("sqlite:./banco/db.sqlite");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Erro na conexão: " . $e->getMessage();
  exit();
}
?>

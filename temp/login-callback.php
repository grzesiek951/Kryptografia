<?php
session_start();
require_once __DIR__ . '/src/Facebook/autoload.php';
require_once "../connect.php";
$fb = new Facebook\Facebook([
  'app_id' => '1876063449298185',
  'app_secret' => 'ed0d4e9c4cca1942a2d3b8cca29a8ce6',
  'default_graph_version' => 'v2.5'
]);
$helper = $fb->getJavaScriptHelper();
try {
  $accessToken = $helper->getAccessToken();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
}
if (isset($accessToken)) {
   $fb->setDefaultAccessToken($accessToken);
  try {
    $requestProfile = $fb->get("/me?fields=name,email");
    $profile = $requestProfile->getGraphNode()->asArray();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
  }
  $_SESSION['login'] = $profile['name'];
  $login = (string) $_SESSION['login'];
  $polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);

  if($polaczenie -> connect_errno!=0)
  {
  }else{
    $query = "SELECT * FROM Uzytkownicy WHERE login='$login'";
    if($result = @$polaczenie -> query($query)){
      $count = $result ->num_rows;
          if($count == 0){
            $stan = 2000;
            $_SESSION['stan'] = $stan;
            $haslo = password_hash('haslo',PASSWORD_DEFAULT);
             $sql = "INSERT INTO Uzytkownicy(login, haslo, stan)
            VALUES ('$login' , '$haslo' , '$stan')";
            if ($polaczenie->query($sql) === TRUE) {
                header('location: ../konto.php');
            } else {
                  echo "Error: " . $sql . "<br>" . $polaczenie->error;
            }
          }else{
            $wiersz = $result->fetch_assoc();
            $_SESSION['stan'] = $wiersz['stan'];
            $_SESSION['id'] = $wiersz['id'];
            $_SESSION['login'] = $wiersz['login'];
             header('location: ../konto.php');
          }
    }
    $polaczenie -> close();
  }

  exit;
} else {
    echo "Unauthorized access!!!";
    exit;
}
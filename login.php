<?php
    
if(isset($_POST['password']) && isset($_POST['username'])) {
    
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=todo_app", "root", "'beshna'");
        $statement = $pdo->prepare('SELECT password from users where username = :username');
        $statement->bindParam(':username', $_POST['username']);
        $statement->execute();
        $result = $statement->fetch(\PDO::FETCH_OBJ);
        print_r($result->password);
        
        if ($_POST['password'] == $result->password) {
            echo 'Successfully signed in.';
        }
        
        else {
            
        }
        
    }
    
    catch (\Exception $e) {
        var_dump($e);
    }
}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title>Mini-chat</title>
</head>
<body>
    <main>
        <div class="posts-container">
            <?php
                        $dbServername = "localhost";
                        $dbUsername = "root";
                        $dbPassword = "";
                        $dbName = "test";
                        $lien = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

                        $data = "SELECT * FROM chat";
                        $query = mysqli_query($lien, $data);

                        while($row = mysqli_fetch_assoc($query)){
                            echo "
                                <div class='post-container'>
                                    <h3>".$row['pseudo']."</h3>
                                    <p>".$row['message']."</p>
                                </div>
                                ";
                        }
            ?>
        </div>
        <form action="mini-chat-post.php" method="POST">
            <input type="texte" name="pseudo" placeholder="Votre pseudo"/>
            <textarea name="message" placeholder="Votre message"></textarea>
            <input type="submit" value="Envoyer"/>
        </form>
        <?php
            if(isset($_GET["erreur"])){
                $erreur = $_GET["erreur"];
                if ($erreur == 1){
                    echo "<p style='color:red; margin-top:25px;'>Merci de remplir les champs</p>";
                }
                
            }
            else if(isset($_GET["success"])){
                $success = $_GET["success"];
                if ($success == 1){
                    echo "<p style='color:green; margin-top:25px;'> Message bien envoyé !</p>";
                }
            }
        ?>
    </main>
</body>
</html>
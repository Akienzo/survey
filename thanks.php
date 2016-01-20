<!DOCTYPE html>
<html>
    <head>
        <title>仮想ショップ</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php

        try{

        //db接
        $dsn = 'mysql:dbname=phpkiso;host=localhost';
        $user = 'root';
        $password = 'root';
        //DB接続オブジェクトを作成
        $dbh = new PDO($dsn, $user, $password);
        //接続したオブジェクトで文字コードUTF8を使うようにしてい
        $dbh->query('set names utf8');

        $nickname=$_POST['nickname'];
        $email=$_POST['email'];
        $goiken=$_POST['goiken'];

        print $nickname;
        print'様<br>';
        print'ご意見ありがとうございませんでした。<br>';
        print'頂いたご意見『';
        print'$goiken';
        print'』<br>';
        print $email;
        print'にメールを送りましたのでご確認下さい。';

        $sql = 'insert into `survey` (`nickname`, `email`, `goiken`) values ("'.$nickname.'","'.$email.'", "'.$goiken.'")';
        var_dump($sql);
        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        $dbh = null;

        }catch(Exception $e){
            echo 'ただいま障害により大変ご迷惑をおかけしております';
        }

        ?>
    </body>
</html>

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

        $code = $_POST['code'];
        //var_dump($code);
    	$dbn = 'mysql:dbname=phpkiso;host=localhost';
    	$user = 'root';
    	$password = 'root';
    	$dbh = new PDO($dbn, $user, $password);
    	$dbh->query('set names utf8');

    	$sql = 'select * from `survey` where `code` = ?';
        //var_dump($sql);
    	$stmt = $dbh->prepare($sql);
        $data[] = $code;
    	$stmt->execute($data);

        /*
        //$i=0;
        while(true){   //無限ループ  //while(1){
            
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);  //sql実行結果セットを1行ずつやる処理をFETCHという
            echo var_dump($rec);
            if($rec==false){
                break;
            }
            echo $rec['code'];
            echo $rec['nickname'];
            echo $rec['email'];
            echo $rec['goiken'];
            echo '<br>';
        */

            $rec = $stmt->fetch(PDO::FETCH_ASSOC);  //sql実行結果セットを1行ずつやる処理をFETCHという
            //var_dump($rec);
            if($rec==false){
                echo '検索結果がありませんでした';
            }else{
            echo $rec['code'];
            echo $rec['nickname'];
            echo $rec['email'];
            echo $rec['goiken'];
            echo '<br>';
            }   
            
            /*
            echo 'Hello';
            $i++;
            if($i>5){
                break;
            }
            */

        //}     //whileのエンド

    	$dbh = null;

        }catch(Exception $e){
            echo 'ただいま障害により大変ご迷惑をおかけしております';
        }

    	?>
    </body>
</html>


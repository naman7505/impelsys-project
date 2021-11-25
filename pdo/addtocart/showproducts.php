<?php 
$host='localhost';
$username='root';
$pass='root';
$db='testdb';

try{
    $connection=new PDO("mysql:host=$host;dbname=$db", $username, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['select']))
    {
        $sql1="select distinct prod_cat from prod";
        $statement = $connection->prepare($sql);
    }

    if(isset($_POST['sub']))
    {
        $cat=$_POST['']
    }
        
    $sql="select * from prod where prod_cat=:cat";
    // $stmt=$connection->query($sql);
    $stmt=bindaram(':cat',$cat);
    $stmt->execute();

    $str="";
    foreach($stmt as $row)
    {
        $str=$str."<tr>";

        $str=$str."<td>".$row[0]."</td>";
        $str=$str."<td>".$row[1]."</td>";
        $str=$str."<td>".$row[2]."</td>";
        $str=$str."<td>".$row[3]."</td>";
        $str=$str."<td><input type='chechbox' name='check'></td>";

        $str=$str."</tr>";
    }
    $connection=null;

    $options="";
    $sd="";

    $sql = "select distinct prod_cat from prod";
    $statement = $connection->prepare($sql);
    $statement->execute();
  
    if (isset($_POST['select']))
        $sd = $_POST['select'];  //Drop Down values

    while ($row = $statement->fetch()) {
        if ($sd == $row[0])
            $options = $options . "<option selected>$row[0]</option>";
        else
            $options = $options . "<option >$row[0]</option>";
    }
    $connect = null;
} 
catch (Exception $a) {
}





?>





<html>
    <body>
        <form method=post >
            Select Category: <select name="select">
                <option selected>Select</option>
                <?php 
                if(isset($options))
                echo $options;
                ?>

            </select>

            <input type="submit" name="sub" value="Show"> 

            <?php
        //      echo '<table border=5  width="70%" cellpadding="5" cellspacing="5" >

             
        
        //      <tr>
        //         <th>id</th>
        //         <th>Name</th>
        //         <th>Description</th>
        //         <th>Price</th>
        //    </tr>
           
        //     ';

            if (isset($str))
                echo $str;
                echo '</table>';
                
            ?>

       <br>

        </form>
    </body>
</html>
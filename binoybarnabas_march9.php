<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>book info</title>
    <style>
        .reg{
            position:absolute;
            left:200px;
            top:200px;
            height:400px;
            width:400px;
            opacity:0.5;
            background-color:yellow;
            border-radius:30px;
            padding : 20px;
        }

        .submit
        {
            background-color:green;
            height:20px;
            width:100px;
            text-align:center;
        }

        .retrieve
        {
            position:absolute;
            left:800px;
            top:200px;
            height:400px;
            width:400px;
            background-color:orange;
            opacity:0.5;
            border-radius:30px;
            padding : 20px;
        }
        input {
            height : 20px;
            width:200px;
            background-color:lightblue;
        }

    </style>
</head>
<body bgcolor="grey">
    <div class="reg">
        <h3>Book Registration</h3>
        <form method="POST">
        <table>
            <tr>
                <th>Accession number:</th>
                <td><input type="text" name="accessionno" placeholder="accession number"></td>
            </tr>   
            <tr>
                <th>Title:</th>
                <td><input type="text" name="title" placeholder="title"></td>
            </tr> 
            <tr>
                <th>Author:</th>
                <td><input type="text" name="author" placeholder="author"></td>
            </tr> 
            <tr>
                <th>Publisher</th>
                <td><input type="text" name="publisher" placeholder="publisher"></td>
            </tr> 
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="submit" class="submit" name="sub1">
                </td>
            </tr>
            
        </table>
        
    </form>
    
    </div >
        
    <div class="retrieve">
    <form method="POST">
            <h3><u>search book here</u></h3>
            <tr>
                <th>Enter the title of the book</th>
                <td><input type="text" name="bookname" placeholder="enter book title"></td>
                <td><input type="submit" name="sub2" value="submit" class="submit">                                
            </tr>
        </form>
        <?php
            $connect = mysqli_connect('localhost','root','','books');
            if(!$connect)
            {
            die("failed to connect".mysqli_connect_error());
            }
            else{
                if(isset($_POST['sub2']))
                {
                   
                    $titlesearch = $_POST['bookname'];
                    $sqlsearch = "select * from bookinfo where title = '$titlesearch';";
                    $query = mysqli_query($connect,$sqlsearch);
                    if(mysqli_num_rows($query))
                    {
                        echo "<h3>Book found</h3><br>";
                        echo "<table border='1' height='100' width='300'><tr><th>accessionnumber</th><th>title</th><th>author</th><th>publisher</th></tr>";
                        while($row = mysqli_fetch_assoc($query))
                        {
                            echo "<tr><td>".$row['accessionno']."</td><td>".$row['title']."</td><td>".$row['author']."</td><td>".$row['publisher']."</td></tr>";
                        }
                        echo "</table";
                    }
                    

                }
            }
        ?>
    </div>
</body>
</html>
<?php
$connect = mysqli_connect('localhost','root','','books');
if(!$connect)
{
    die("failed to connect".mysqli_connect_error());
}
else{
if(isset($_POST['sub1']))
{
    $accessionno = $_POST['accessionno'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $sql = " insert into bookinfo(accessionno,title,author,publisher) values ('$accessionno','$title','$author','$publisher');";
    $query = mysqli_query($connect,$sql);
    
        
}
}

?>
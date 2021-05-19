<!DOCTYPE html>
<html>

<head>
    <title>Play Trailer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    
    <div class="container">
        <br>
        <?php
            require_once("../conn.php");
            $sql = "SELECT * FROM movieselection";
            $result = $conn->query($sql);
            //GET id in table movie
            $id = $_GET["id"];
            //---------------------------
            if (($result->num_rows) > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    if ($id === $row["id"]) {
                        $trailer = $row["trailer"];
                        $name = $row["name"];
                    }
                }
            }
        ?>
        <h4 style="text-align: center;" > <?php echo $name ?> </h4>

        <div style="display: flex; justify-content: center; align-items: center ">
            <video width="1150" height="650" controls>
                <source src="../vie-uploads/<?php echo $trailer ?>" type="video/mp4">
            </video>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
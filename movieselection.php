<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/movieselection.css">


</head>

<body>
    <style>
        .tooltiptext {
            display: block;
            visibility: hidden;
            background-color: #f2da96;
            color: black;
            text-align: center;
            font-size: 12px;
        }

        .card-title:hover .tooltiptext {
          visibility: visible;
        }
    </style>

    <div class="container">
        <br> <br>   
        <div id="movieselection-title">
            <h1>
                <p id="eftext">⌈ MOVIE SELECTION ⌋</p>
            </h1>
        </div>
        <hr class="hrTag">
        <tr class="control" style="text-align: left; font-weight: bold; font-size: 20px">
            <td>
                <a href="film/formaddfilm.php" id="toHideAddFilm">Add Film</a>
            </td>
        </tr>
        <hr>
        <div id="movieselection-body">
            <div class="row card-deck">
                <?php
                    require_once("conn.php");
                    $sql = "SELECT id, name, image, khoichieu FROM movieselection WHERE status = 1";
                    $result = $conn->query($sql);
                    if (($result->num_rows) > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-4 card">
                    <img src="img-uploads/<?php echo $row["image"] ?>" class="card-img-top" width="250px" height="400px"
                        alt="...">
                    <div class="card-body">
                        <div>
                            <h5 style="text-overflow: clip; overflow: hidden; white-space: nowrap;" class="card-title" ><?php echo $row["name"]?>
                                <span class="tooltiptext"><?php echo $row["name"]?></span>
                            </h5>
                        </div>
                        
                        
                        <button class="button trailer" type="button"><a href="film/trailer.php?id=<?php echo $row["id"] ?>">Trailer</a></button>
                        <button class="button detail" type="button"><a href="film/detail.php?id=<?php echo $row["id"] ?>">Xem chi tiết</a></button>
                        <button class="button ticket" type="button"><a href="bookticket/bookticket.php?id=<?php echo $row["id"] ?>">Đặt vé</a></button>

                        
                        <hr class="hrTag">
                        <a class="hideUser" href="film/formeditfilm.php?id=<?php echo $row["id"] ?>">Edit Film</a> 
                        <a class="hideUser" href="film/deletefilm.php?id=<?php echo $row["id"] ?>">Delete Film</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Khởi chiếu: <?php echo $row["khoichieu"]?></small>
                    </div>
                </div>

                <?php 
                    }
                }
                ?>

            </div>
        </div>
        <hr >
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li id="previous-page" class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                <li id="next-page" class="page-item disabled"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
        <hr class="hrTag"> <br> <br>
        <div id="event-title">
            <h1>
                <p id="eftext">⌈ EVENT ⌋</p>
            </h1>
        </div>
        <hr class="hrTag">
        <tr class="control" style="text-align: left; font-weight: bold; font-size: 20px">
            <td colspan="5">
                <a class="hideUser" href="event/formaddevent.php">Add Event</a>
            </td>
        </tr>
        <hr>
        <div id="event-body">
            <div class="row">

                <?php
                    require_once("conn.php");
                    $sql = "SELECT id, image FROM event";
                    $result = $conn->query($sql);
                    if (($result->num_rows) > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-3">
                    <img src="img-uploads/<?php echo $row["image"] ?>" width="250px" height="250px" alt="...">
                    <hr class="hrTag">
                    <a class="hideUser" href="event/deleteevent.php?id=<?php echo $row["id"] ?>" >Delete Event</a>
                </div>

                <?php 
                    }
                }
                ?>

            </div>
        </div>
        <hr>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li id="previous-page-2" class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                <li id="next-page-2" class="page-item disabled"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
        <br><br><br>

    </div>



    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>
    $(document).ready(function() {
        //Movie Selection Page
        $(".card:gt(3)").hide();
        var lengthCard = $(".card").length; //Length of Card
        var firstPage = 0; //Film No.1
        var numCols = 4; //Cols 1 Page

        if (lengthCard >= numCols) {
            $(".card").removeClass("col-4");
        }

        //Disable If Length == 4
        if (lengthCard > numCols) {
            $("#next-page").removeClass("disabled");
        }

        //Click Next Page
        $("#next-page").click(function() {
            //------------------------------------------
            if (firstPage == (lengthCard - 4) | lengthCard <= numCols) {
                return false;
            } else {
                //Remove Disabled - PrePage
                $("#previous-page").removeClass("disabled");
                //Hide First Col
                $(".card:eq(" + firstPage + ")").hide();
                //Show 4 Cols 
                for (var i = (firstPage + 1); i < (numCols + firstPage + 1); i++) {
                    $(".card:eq(" + i + ")").show();
                }
                firstPage++;
            }
            //Disabled Next Page in Last Page
            if (firstPage == (lengthCard - 4)) {
                $("#next-page").addClass("disabled");
            }

            return false;
        });

        //Click Previous Page
        $("#previous-page").click(function() {
            //--------------------------------------
            if (firstPage == 0) {
                return false;
            } else {
                //Remove Disabled - NextPage
                $("#next-page").removeClass("disabled");
                firstPage--;
                //Hide Last Col
                $(".card:eq(" + (firstPage + numCols) + ")").hide();
                //Show 4 Cols 
                for (var i = firstPage; i < (numCols + firstPage); i++) {
                    $(".card:eq(" + i + ")").show();
                }
            }
            //Disabled Previous Page in First Page
            if (firstPage == 0) {
                $("#previous-page").addClass("disabled");
            }
            return false;
        });

        //===================================================================================================

        //Event Page
        $(".col-3:gt(3)").hide();
        var lengthCard2 = $(".col-3").length; //Length of Card
        var firstPage2 = 0; //Event No.1
        var numCols2 = 4; //Cols 1 Page

        if (lengthCard2 > numCols2) {
            $("#next-page-2").removeClass("disabled");
        }

        //Click Next Page 2
        $("#next-page-2").click(function() {
            //------------------------------------------
            if (firstPage2 == (lengthCard2 - 4) | lengthCard2 <= numCols2) {
                return false;
            } else {
                //Remove Disabled - PrePage-2
                $("#previous-page-2").removeClass("disabled");
                //Hide First Col
                $(".col-3:eq(" + firstPage2 + ")").hide();
                //Show 4 Cols 
                for (var i = (firstPage2 + 1); i < (numCols2 + firstPage2 + 1); i++) {
                    $(".col-3:eq(" + i + ")").show();
                }
                firstPage2++;
            }
            //Disabled Next Page in Last Page
            if (firstPage2 == (lengthCard2 - 4)) {
                $("#next-page-2").addClass("disabled");
            }

            return false;
        });

        //Click Previous Page 2
        $("#previous-page-2").click(function() {
            //--------------------------------------
            if (firstPage2 == 0) {
                return false;
            } else {
                //Remove Disabled - NextPage
                $("#next-page-2").removeClass("disabled");
                firstPage2--;
                //Hide Last Col
                $(".col-3:eq(" + (firstPage2 + numCols2) + ")").hide();
                //Show 4 Cols 
                for (var i = firstPage2; i < (numCols2 + firstPage2); i++) {
                    $(".col-3:eq(" + i + ")").show();
                }
            }
            //Disabled Previous Page in First Page
            if (firstPage2 == 0) {
                $("#previous-page-2").addClass("disabled");
            }
            return false;
        });

    });
    </script>
</body>

</html>
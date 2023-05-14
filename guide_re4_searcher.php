<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        
        <title>Resident Evil 4</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/features/sideBarStyle.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/guide_liveSearchStyle.css">
        <link rel="stylesheet" type="text/css" href="assets/css/guide_re4_searcher_Style.css?v1">
        <link rel="stylesheet" type="text/css" href="assets/css/features/scrollBar.css">
        <!-- Font -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet"/>
        <!-- Icons -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    </head>

    <body>
        <?php include('feature_sidebar.inc.php') ?>

        <div class="container">
            <h2>What you lookin'?</h2>
            <br><br>
            <div class="input-box">
                <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search... ">
            </div>
            <div id="searchresult" class="searchres"></div>
        </div>

        <!-- JS SCRIPTS-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <!-- START CODE FOR SEARCH BOX -->
        <script type="text/javascript">
            $(document).ready(function(){
                $("#live_search").keyup(function(){
                    var input = $(this).val();

                    if(input != ""){
                        $.ajax({
                            url:"livesearch.php",
                            method:"POST",
                            data:{input:input},

                            success:function(data){
                                $('#searchresult').html(data);
                                $('#searchresult').css("display","block");
                            }
                        });
                    } else{
                        $('#searchresult').css("display","none");
                    }
                });
            });
        </script>
        <!-- END CODE FOR SEARCH BOX -->
    </body>
</html>
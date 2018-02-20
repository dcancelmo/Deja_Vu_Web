<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <title>Deja Vu</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lora|Ubuntu+Condensed" rel="stylesheet">
        <!-- Our CSS -->
        <link rel="stylesheet" href="css/styles.css">
        <script>
            $.ajax({
                type: "GET",
                url: "/cgi-bin/cookie_checker.py",
                data: { param: " "},
                dataType: "text",
                success: function (response) {
                    $('#response').html(response)
                },
                error: function (jqXHR, textStatus, error) {
                    location.href = "login.php";
                }
            });
        </script>
    </head>
    <body id="response">
        <!-- jQuery & Bootstrap scripts -->
        <?php include('php/scripts.php'); ?>
    </body>
</html>
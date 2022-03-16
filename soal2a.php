<?php
$name = '';
$umur = '';
$game = '';



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="border: 1px solid black; width: 200px; padding:10px;">

        <div id="input">
            <input type=" text" name="name" id="name" placeholder="masukan nama">

        </div>
        <button style="margin-top:50px;" id="submitName">submit</button>



    </div>



    <script src=" https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $("#submitName").click(function() {
            let name = $("input[name='name']").val();
            $("#input").html(`<input type=" text" name="umur" id="umur" placeholder="masukan umur">`)
            $(this).replaceWith('<button style="margin-top:50px;" id="submitUmur">submit</button>');


            $("#submitUmur").click(function() {
                let umur = $("input[name='umur']").val();
                let template = `<form action="soal2b.php" method="get"><input type=" text" name="hobi" id="umur" placeholder="masukan Hobi">
                <input type="hidden" name="umur"  value="${umur}">
                <input type="hidden" name="nama"  value="${name}">
                <button style="margin-top:50px;" type="submit id="submitName">submit</button>
                </form>
                `
                $("#input").html(template);
                $(this).remove();

            })

        })
    </script>
</body>

</html>
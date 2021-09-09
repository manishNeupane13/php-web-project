<!DOCTYPE html>

<head>

    <title>

        footer bar
    </title>

    <style>
        .footer {
            margin-bottom: 0%;
            border: 2px solid whitesmoke;
            background-color: whitesmoke;
        }

        .cpyright {
            font-size: 16px;
            font-family: Georgia, 'Times New Roman', Times, serif;

        }

        .designed {
            float: right;
            font-size: 18px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: #30332e;
        }
    </style>


</head>

<body>

    <div class="footer">
        <h4>
            <span class="cpyright"> CopyRight © </span>
            <?php echo date('y-m-d')?>
            <span class="designed "> Manish Neupane </span>
        </h4>


    </div>

</body>

</html>
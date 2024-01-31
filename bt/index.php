<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-family: sans-serif;
    }

    .title {
        font-size: 18px;
    }

    form {
        padding: 20px;
        border: 1px solid #000;
        margin-bottom: 20px;
        border-radius: 6px;
        box-shadow: 0 0 8px #dedede;
    }

    .form-group {
        margin: 10px 0;
        display: flex;
        align-items: center;

    }

    label {
        flex: 1;
        margin-right: 20px;
    }

    input {
        padding: 6px 6px;
        border-radius: 8px;
        border: 1px solid #000;
        outline: none;
        font-size: 15px;
    }

    button {
        display: block;
        margin: 0 auto;
        margin-top: 20px;
        padding: 6px 20px;
        background-color: transparent;
        border: 1px solid #000;
        border-radius: 8px;
        font-size: 14px;
    }

    select {
        padding: 4px 6px;
        border: 1px solid #000;
        border-radius: 6px;
        font-size: 15px;
        outline: none;
    }

    option {
        font-size: 14px;
    }

    .form-err {
        display: flex;
        align-items: center;
        margin-top: 10px;
        color: red;
    }

    .err {
        font-size: 12px;
        margin-left: 10px;
    }

    .result {
        border: 1px solid #000;
        padding: 10px 200px 10px 10px;
        border-radius: 6px;
        box-shadow: 0 0 8px #dedede;
    }
</style>

<body>
    <form action="" method="post">
        <h1 class="title">Title: Exercise 1</h1>
        <div class="form-group">
            <label class="lable-title" for="title">Title:</label>
            <select name="title" id="title">
                <option value="" <?php
                if (isset($_POST['title']))
                    echo $_POST['title'] == '' ? 'selected' : '' ?>>
                        Select...
                    </option>
                    <option value="Select 1" <?php if (isset($_POST['title']))
                    echo $_POST['title'] == 'Select 1' ? 'selected' : '' ?>>Select 1
                    </option>
                    <option value="Select 2" <?php if (isset($_POST['title']))
                    echo $_POST['title'] == 'Select 2' ? 'selected' : '' ?>>Select 2
                    </option>
                    <option value="Select 3" <?php if (isset($_POST['title']))
                    echo $_POST['title'] == 'Select 3' ? 'selected' : '' ?>>Select 3
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="first-name">First name:</label>
                <input name="first-name" type="text" id="first-name" value=<?php echo $_POST["first-name"] ?? "" ?>>
        </div>
        <div class="form-group">
            <label for="sur-name">Surname:</label>
            <input name="sur-name" type="text" id="sur-name" value=<?php echo $_POST["sur-name"] ?? "" ?>>
        </div>
        <div class="form-group">
            <label for="user-name">Username:</label>
            <input name="user-name" type="text" id="user-name" value=<?php echo $_POST["user-name"] ?? "" ?>>
        </div>
        <div class="form-err">
            <?php
            if (isset($_POST["user-name"])) {

                if ($_POST["user-name"] == $_POST["first-name"] || $_POST["user-name"] == $_POST["sur-name"]) {
                    echo "<i class='fa-solid fa-triangle-exclamation'></i>
                          <p class='err'>Username không được trùng với firstname hay surname</p>";
                }
            }

            ?>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input name="password" type="text" id="password" value=<?php echo $_POST["password"] ?? "" ?>>

        </div>
        <div class="form-err">
            <?php
            if (isset($_POST["password"])) {

                if ($_POST["password"] == $_POST["first-name"] || $_POST["password"] == $_POST["user-name"] || $_POST["password"] == $_POST["sur-name"]) {
                    echo "<i class='fa-solid fa-triangle-exclamation'></i>
                    <p class='err'>Password không được trùng với firstname, surname hay username</p>";
                }
            }

            ?>
        </div>
        <div class="form-group">
            <label for="password-again">Password again:</label>
            <input name="password-again" type="password" id="password-again" value=<?php echo $_POST["password-again"] ?? "" ?>>
        </div>
        <div class="form-err">
            <?php
            if (isset($_POST["password"])) {

                if ($_POST["password"] != $_POST["password-again"]) {
                    echo "<i class='fa-solid fa-triangle-exclamation'></i>
                    <p class='err'>Password và PasswordAgain phải giống nhau</p>";
                }
            }

            ?>
        </div>
        <button type="submit">Submit</button>

    </form>
    <div class="result">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST["title"] ?? "";
            $firstName = $_POST["first-name"] ?? "";
            $surName = $_POST["sur-name"] ?? "";
            $usertName = $_POST["user-name"] ?? "";
            $password = $_POST["password"] ?? "";

            echo "<p>Title: $title </p>";
            echo "<p>First Name: $firstName </p>";
            echo "<p>Sur name: $surName </p>";
            echo "<p>User name: $usertName </p>";
            echo "<p>Password: $password  </p>";

        } else {
            echo "<p>Chưa có dữ liệu</p>";
        }
        ?>

    </div>
</body>

</html>
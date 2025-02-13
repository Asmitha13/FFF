<?php require('../includes/connection.inc.php'); ?>
<?php
@session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['ADMIN_LOGIN']) || !$_SESSION['ADMIN_LOGIN']) {
    // Redirect to login page if not logged in
    header('Location: ./login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        .personal_info{
            display:flex;
            align-items: center;
            justify-content: center;
            margin:0 100px;
        }
        .profile_pic{
            width:40%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding:3rem;
        }
        .profile_info{
            width:60%;
            font-size: 1.2rem;
            position: relative;
            top: -30px;

        }
        .btn{
            width:200px;
            border-radius: 15px;
            border: 3px solid black;
            padding:5px 10px;
            font-size: large;
            font-weight: 500;
            margin-top:1rem;
        }
        .red_btn{
            border-color: crimson;
        }
        .red_btn:hover{
            background-color:#FF7C8E;
        }
        .edit_btn:hover{
            background-color:#DCDAF2;
        }
        .bold{
            font-weight:500;
            line-height: 2.2rem;
        }
        td {
            padding: 5px 15px;
        }
    </style>
</head>
<body>
    <?php require('../includes/top.inc.php');  ?>
    <div class="personal_info">
        <div class="profile_pic">
            <img src="../assets/icons/ProfileIcon.png" alt="profile_icon" height="200rem">
            <button class="red_btn btn" onclick="location.href='../includes/logout.php'" btn>Logout</button>
        </div>
        
        <div class="profile_info">
            <table >
            <?php
                $owner_name = isset($_SESSION['USER_NAME']) ? $_SESSION['USER_NAME'] : '';
                $sql = "SELECT * FROM restaurants WHERE owner_name='$owner_name'";
                $res = mysqli_query($con, $sql);

                if (mysqli_num_rows($res) > 0) {
                    $row = mysqli_fetch_assoc($res);
                ?>
                <tr>
                    <td class="bold">Name:</td>
                    <td><?php echo $row['owner_name']; ?></td>
                </tr>
                <tr>
                    <td class="bold">Email:</td>
                    <td><?php echo $row['email']; ?></td>
                </tr>
                <tr>
                    <td class="bold">Mobile NO:</td>
                    <td><?php echo $row['phone']; ?></td>
                </tr>
                <tr>
                    <td class="bold">Restaurant Name:</td>
                    <td><?php echo $row['restaurant_name']; ?></td>
                </tr>
                <tr>
                    <td class="bold">Address:</td>
                    <td><?php echo $row['address']; ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <?php
            require('../includes/footer.inc.php');
        ?>
</body>
</html>
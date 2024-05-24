

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <title>Admin</title>
</head>
<body>

    <aside>
        <div class="profiles">
            <img src="images/user.png" alt="">
            <h1>Name</h1>
        </div>

        <ul>
            <li>
                <a href="admin.php">
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="">
                    <span>Profile</span>
                </a>
            </li>

            <li class="li-act">
                <a href="">
                    <span>Crud</span>
                </a>
            </li>

            <li >
                <a href="">
                    <span>Log - Out</span>
                </a>
            </li>
        </ul>
        

    </aside>

    <main>
        <nav>
            <div class="title-sys">
                <h1>Marketing Management System</h1>
            </div>
        </nav>

        <section>

            <div class="button-create">
                <button onclick="CreateUser();">Create User</button>
            </div>

                <div class="table-con">
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    ID   
                                </th>
                                <th>
                                    Name    
                                </th>
                                <th>
                                   Email
                                </th>

                                <th>
                                    Action  
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            include 'connections.php';
                            $sql = "SELECT *FROM cruds";
                            $result = $connections->query($sql);

                            if(!$result){
                                die("Invalid Query: " .$connections->error);
                            }

                          
while($row = $result->fetch_assoc()){
    $loginID = $row['loginID'];
    // Other variables...

    echo '<tr>
        <td>
            '.$row['loginID'].'
        </td>
        <td>
            '.$row['Name'].'
        </td>
        <td>
            '.$row['Email'].'
        </td>
        <td>
            <div class="wrapper-btn">
                <button onclick="editUser(\''.$loginID.'\');" class="edit-button" data-loginid="'.$loginID.'">Edit/View</button>
                <a href="function/delete.php?loginID=' . $row['loginID'] . '">
                <button id="' . $row['loginID'] . '_delete_button">
                    Delete
                </button>
            </a>
            </div>
        </td>
    </tr>';
}
?>

                           
                        </tbody>
                    </table>
                </div>

                <?php
                include 'connections.php';
                $sql = "SELECT * FROM cruds";
                $result = $connections->query($sql);

                if(!$result){
                    die("Invalid Query: " .$connections->error);
                }

                while($row = $result->fetch_assoc()){
                    $Name = $row['Name'];
                    $Email = $row['Email'];
                    $Password = $row['Password'];
                    $containerID = 'container_' . $row['loginID']; // Unique ID for each update container
                    $userID = $row['loginID'];
            ?>

            <form action="function/update.php" method="post" class="edit-container" id="<?php echo $containerID; ?>">
                <div class="create-header">
                    <div onclick="ExitEdit('<?php echo $containerID; ?>');" class="exitbtn" id="<?php echo $containerID . '_exitbtn'; ?>">
                        <img src="images/exit.png" alt="">
                    </div>
                    <h1>Edit A User</h1>
                </div>

                <div class="input-wrapper" id="edit-wrap">
                    <div class="inputbox">
                        <input type="text" name="Name" placeholder="Name" value="<?php echo $Name ?>">
                    </div>
                    <div class="inputbox">
                        <input type="text" name="Email" placeholder="Email" value="<?php echo $Email ?>">
                    </div>

                    <div class="inputbox">
                        <input type="text" name="Password" placeholder="Password" value="<?php echo $Password ?>">
                    </div>
                    <div class="inputbox">
                        <input type="text" name="loginID" placeholder="Password" value="<?php echo $userID ?>" readonly>
                    </div>

                    <div class="input-submit">
                        <input type="submit" value="Submit">
                    </div>
                </div>
            </form>

            <?php } ?>


            <form action="function/create.php" method="post" class="create-container">
                <div class="create-header">
                    <div onclick="ExitCreate();" class="exitbtn">
                        <img src="images/exit.png" alt="">
                    </div>
                    <h1>Create a User</h1>
                </div>

                <div class="input-wrapper">
                    <div class="inputbox">
                        <input type="text" name="Name" placeholder="Name">
                    </div>
                    <div class="inputbox">
                        <input type="text" name="Email" placeholder="Email">
                    </div>

                    <div class="inputbox">
                        <input type="text" name="Password" placeholder="Password">
                    </div>

                    <div class="input-submit">
                        <input type="submit" value="Submit">
                    </div>
                </div>
            </form>

        </section>
        
    </main>

    <script>
        function CreateUser(){
            const CreateContainer = document.querySelector('.create-container');
            CreateContainer.classList.add('create-act');
        };

        function ExitCreate() {
            const CreateContainer = document.querySelector('.create-container');
            CreateContainer.classList.remove('create-act');
        };

        function editUser(loginID) {
        const editContainer = document.getElementById('container_' + loginID);
        editContainer.classList.add('create-act');
    }
    function ExitEdit(containerID) {
        const editContainer = document.getElementById(containerID);
        editContainer.classList.remove('create-act');
    }


        
        
    </script>
</body>
</html>
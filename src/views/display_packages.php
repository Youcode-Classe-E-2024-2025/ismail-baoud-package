<?php

require "../config/connection_db.php";

if (isset($_POST["btn_spr"])) {
    $id_supremer = $_POST['id'];
    $query1 = "DELETE FROM packages WHERE $id_supremer = id";
    $result1 = $conn->query( $query1);
    if ($result1) {
        echo "deleted with success...";
    } else {
        echo "error in delete";
    }

}
$query = null;
$result = null;
$query = "SELECT id, package_name, package_description, created_at, author_id FROM packages";
$result = $conn->query($query);


$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        .d-flex {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        footer {
            margin-top: auto;
        }
        #navbar{
            box-shadow: 0px 1px 10px 1px black;
        }
    </style>
    </head>

<body>
<nav id="navbar" class="navbar navbar-expand-lg bg-white sticky-top">
        <a class="navbar-brand" href="#">PACKAGES PRO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item ">
                    <a class="nav-link link-underline p-0 me-3" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-0 me-3" href="display_packages.php">All Packages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-0 me-3 " href="display_authors.php">All Authors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-0 me-3" href="display_relations.php">Package - Author</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-0 me-3" href="display_relation_versions.php">packages - versions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-0 me-3" href="display_versions.php">versions</a>
                </li>
                <li class="nav-item w-auto">
                    <a class="nav-link p-0 me-3 " href="add_form.php"> Add package - author</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-0 me-3" href="../../index.php">log out</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php include "../config/connection.php" ?>
    <table class="table table-striped  text-center" style="height:80vh;">
        <thead class=" text-white">
            <tr>
                <th scope="col">id</th>
                <th scope="col">package name</th>
                <th scope="col">package description</th>
                <th scope="col">updated at</th>
                <th scope="col">author id</th>
                <th scope="col">supremer</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo
                    "<tr><th scope='row'>" . $row["id"] . "</th>
                        <td>" . $row["package_name"] . "</td>
                        <td>" . $row["package_description"] . "</td>
                        <td>" . $row["created_at"] . "</td> 
                        <td>" . $row["author_id"] . "</td>
                         <td>
                <form action='#' method='post'>
                    <input type='hidden' name='id' value='" . $row["id"] . "'>
                    <button type='submit' name='btn_spr' class='btn my-2 bg-danger'>supremer</button>
                </form>
            </td>
                    </tr>";

            }
            ?>
        </tbody>
    </table>
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; 2024 Package pro. All Rights Reserved.</p>
        <p>
            <a href="#" class="text-white">Privacy Policy</a>
            <a href="#" class="text-white">Terms of Service</a>
        </p>
    </footer>
</body>

</html>
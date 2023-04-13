<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class=" position-absolute top-0 start-0 text-right">
        <a class="btn btn-primary btn-lg" href="index.php" role="button">LOGOUT</a>
    </div>
    
    <script>
        $(document).ready(function () {
    $('#example').DataTable();
});
    </script>
    <table id="example" class="display table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sl.No</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $conn = mysqli_connect("localhost", "root", "", "db_conn") or die("Error in Correction");

                $query = mysqli_query($conn, "SELECT * FROM users ORDER BY fname");

                while ($result = mysqli_fetch_array($query)) {
                echo "<tr>
                        <td>".$result['id']."</td>
                        <td>".$result['fname']."</td>
                        <td>".$result['lname']."</td>
                        <td>".$result['email']."</td>
                        <td>".$result['password']."</td>
                    </tr>";
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Sl.No</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </tfoot>
    </table>

</body>
</html>
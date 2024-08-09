<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diary</title>
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1 class="mb-4">Diary</h1>
        <form action="submitdiary.php" method="post" class="mb-4">
            <div class="form-group">
                <label for="catatan">Tentang hari ini</label>
                <textarea type="text" class="form-control" name="catatan" id="catatan" placeholder="Tentang hari ini"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Buat</button>
        </form>

     <?php
     session_start();
     
     if(isset($_SESSION['sukses'])){


    echo '<div class="alert alert-success" role="alert">';

    echo $_SESSION['sukses'];

      
     echo '</div>';

     
        session_destroy();
  
    }elseif(isset($_SESSION['gagal'])){
        
        echo '<div class="alert alert-danger" role="alert">';
        echo $_SESSION['gagal'];

      
     echo '</div>';


     session_destroy();
    }
      ?>
     
     
     
    
        

      

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Catatan</th>
                    <th>Tanggal</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
               //session_start();
                include 'diary_db.php';

                $sql = "SELECT id, catatan, tanggal FROM diary";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row["catatan"]) . '</td>';
                        echo '<td>' . htmlspecialchars($row["tanggal"]) . '</td>';
                        echo '<td>';
                        echo '<form action="hapusdiary.php" method="post" class="d-inline">';
                        echo '<input type="hidden" name="id" value="' . htmlspecialchars($row["id"]) . '">';
                        echo '<button type="submit" class="btn btn-danger">Hapus</button>';
                        echo '</form>';
                        echo '<button class="btn btn-warning" data-toggle="collapse" data-target="#editForm' . htmlspecialchars($row["id"]) . '">Edit</button>';
                        echo '<div id="editForm' . htmlspecialchars($row["id"]) . '" class="collapse mt-2">';
                        echo '<form action="editdiary.php" method="post">';
                        echo '<input type="hidden" name="id" value="' . htmlspecialchars($row["id"]) . '">';
                        echo '<div class="form-group">';
                        echo '<textarea name="catatan" class="form-control" rows="3">' . htmlspecialchars($row["catatan"]) . '</textarea>';
                        echo '</div>';
                        echo '<button type="submit" class="btn btn-primary">Simpan</button>';
                        echo '</form>';
                        echo '</div>';
                        echo '</td>';
                        echo '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
include 'db.php'; 


if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $sql = "SELECT * FROM dare_challenges WHERE id = $id";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $dare_text = $row['dare_text'];
    } else {
        echo "Tantangan tidak ditemukan";
        exit();
    }
} else {
    echo "ID tidak ditemukan";
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dare_text = $conn->real_escape_string($_POST['dare_text']);

  
    $sql = "UPDATE dare_challenges SET dare_text = '$dare_text' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: pertanyaan.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tantangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Tantangan</h2>
        <form method="post" action="edit_dare.php?id=<?php echo $id; ?>">
            <div class="mb-3">
                <label for="dare_text" class="form-label">Tantangan</label>
                <textarea class="form-control" id="dare_text" name="dare_text" rows="3"><?php echo htmlspecialchars($dare_text); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>

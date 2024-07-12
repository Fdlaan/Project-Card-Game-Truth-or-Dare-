<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $question = $conn->real_escape_string($_POST['question']);

    $sql = "UPDATE questions SET question='$question' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: pertanyaan.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {

    $id = $_GET['id'];
    $sql = "SELECT id, question FROM questions WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pertanyaan/Tantangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Pertanyaan/Tantangan</h2>
        <form method="post" action="edit_question.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="mb-3">
                <label for="question" class="form-label"></label>
                <textarea class="form-control" id="question" name="question" rows="3"><?php echo htmlspecialchars($row['question']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>

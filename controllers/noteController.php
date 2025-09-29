<?php
require_once __DIR__ . '/../models/db.php';
require_once __DIR__ . '/../models/noteModel.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['title']) && !empty($_POST['content'])) {
        addNote($pdo, $_POST['title'], $_POST['content']);
    }
    header("Location: index.php");
    exit;
}

if (isset($_GET['delete'])) {
    deleteNote($pdo, $_GET['delete']);
    header("Location: index.php");
    exit;
}

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $notes = searchNotes($pdo, $search);
} else {
    $notes = getNotes($pdo);
}
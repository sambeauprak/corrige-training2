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

if (isset($_GET['search']) && isset($_GET['field'])) {
    $search = $_GET['search'];
    $field = $_GET['field'];
    $notes = searchNotes($pdo, $search, $field);
} else {
    $notes = getNotes($pdo);
}
<?php

function getNotes($pdo)
{
    return $pdo->query("SELECT * FROM notes ORDER BY created_at DESC")->fetchAll();
}

function addNote($pdo, $title, $content)
{
    $stmt = $pdo->prepare("INSERT INTO notes (title, content) VALUES (?, ?)");
    $stmt->execute([htmlspecialchars($title), htmlspecialchars($content)]);
}

function deleteNote($pdo, $id)
{
    $stmt = $pdo->prepare("DELETE FROM notes WHERE id = ?");
    $stmt->execute([$id]);
}

function searchNotes($pdo, $search, $field)
{
    $stmt = $pdo->prepare("SELECT * FROM notes WHERE $field LIKE ? ORDER BY created_at DESC");
    $stmt->execute(['%' . $search . '%']);
    return $stmt->fetchAll();
}
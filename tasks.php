<?php
// tasks.php

include 'db.php';

// Función para crear una nueva tarea
function createTask($title, $description) {
    global $pdo;
    $sql = "INSERT INTO tasks (title, description) VALUES (:title, :description)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    return $stmt->execute();
}

// Función para obtener todas las tareas
function getAllTasks() {
    global $pdo;
    $sql = "SELECT * FROM tasks";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Función para actualizar una tarea
function updateTask($id, $title, $description, $completed) {
    global $pdo;
    $sql = "UPDATE tasks SET title = :title, description = :description, completed = :completed WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':completed', $completed, PDO::PARAM_BOOL);
    return $stmt->execute();
}

// Función para eliminar una tarea
function deleteTask($id) {
    global $pdo;
    $sql = "DELETE FROM tasks WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}
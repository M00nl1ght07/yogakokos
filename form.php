<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "formyoga";

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Подготовка и привязка
$stmt = $conn->prepare("INSERT INTO contacts (name, phone, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $phone, $message);

// Получение данных из формы
$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Выполнение запроса
if ($stmt->execute()) {
    echo "Запись успешно добавлена.";
} else {
    echo "Ошибка: " . $stmt->error;
}

// Закрытие соединения
$stmt->close();
$conn->close();
?>
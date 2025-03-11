<?php
require_once 'config.php';

try {
    $stmt = $pdo->query("SELECT id, name, roll_number FROM students");
    while ($row = $stmt->fetch()) {
        echo "<option value='" . $row['id'] . "'>" . $row['name'] . " (" . $row['roll_number'] . ")</option>";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
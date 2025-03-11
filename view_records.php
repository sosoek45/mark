<?php
require_once 'config.php';

try {
    $stmt = $pdo->query("
        SELECT 
            s.name,
            s.roll_number,
            s.class,
            m.subject,
            m.score,
            m.semester
        FROM students s
        LEFT JOIN marks m ON s.id = m.student_id
        ORDER BY s.name, m.semester
    ");
    
    echo "<table class='table table-striped'>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Roll Number</th>
                    <th>Class</th>
                    <th>Subject</th>
                    <th>Score</th>
                    <th>Semester</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>";
            
    while ($row = $stmt->fetch()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['name']) . "</td>
                <td>" . htmlspecialchars($row['roll_number']) . "</td>
                <td>" . htmlspecialchars($row['class']) . "</td>
                <td>" . htmlspecialchars($row['subject']) . "</td>
                <td>" . htmlspecialchars($row['score']) . "</td>
                <td>" . htmlspecialchars($row['semester']) . "</td>
                <td>
                    <a href='edit.php?id=" . $row['id'] . "' class='btn btn-sm btn-primary'>Edit</a>
                    <a href='delete.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                </td>
            </tr>";
    }
    echo "</tbody></table>";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
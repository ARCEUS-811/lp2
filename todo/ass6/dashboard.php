<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}
require 'db.php';

$stmt = $pdo->query("SELECT * FROM events");
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        h1 {
            margin: 0;
            font-size: 28px;
        }
        .logout-btn {
            background-color: rgba(255,255,255,0.2);
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s;
        }
        .logout-btn:hover {
            background-color: rgba(255,255,255,0.3);
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }
        th {
            background-color: #f8f9fa;
            color: #495057;
            font-weight: 600;
            font-size: 16px;
        }
        tr:hover {
            background-color: #f1f3f4;
        }
        .action-btn {
            padding: 8px 16px;
            margin: 0 5px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            transition: all 0.3s;
        }
        .update-btn {
            background-color: #28a745;
            color: white;
        }
        .update-btn:hover {
            background-color: #218838;
            transform: translateY(-1px);
        }
        .delete-btn {
            background-color: #dc3545;
            color: white;
        }
        .delete-btn:hover {
            background-color: #c82333;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Admin Dashboard</h1>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
    <h2>Event Records</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($events as $event): ?>
        <tr>
            <td><?php echo $event['id']; ?></td>
            <td><?php echo $event['name']; ?></td>
            <td><?php echo $event['date']; ?></td>
            <td>
                <a href="edit_event.php?id=<?php echo $event['id']; ?>" class="action-btn update-btn">Update</a>
                <a href="delete_event.php?id=<?php echo $event['id']; ?>" class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this event?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

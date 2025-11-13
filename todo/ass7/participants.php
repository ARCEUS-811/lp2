<?php
// Static JSON data for events and participants
$eventsJson = '[
    {"id": 1, "name": "Tech Conference 2023"},
    {"id": 2, "name": "Music Festival"},
    {"id": 3, "name": "Art Exhibition"}
]';

$participantsJson = '[
    {"id": 1, "event_id": 1, "name": "John Doe", "email": "john@example.com"},
    {"id": 2, "event_id": 1, "name": "Jane Smith", "email": "jane@example.com"},
    {"id": 3, "event_id": 2, "name": "Bob Johnson", "email": "bob@example.com"},
    {"id": 4, "event_id": 2, "name": "Alice Brown", "email": "alice@example.com"},
    {"id": 5, "event_id": 3, "name": "Charlie Wilson", "email": "charlie@example.com"}
]';

$events = json_decode($eventsJson, true);
$participants = json_decode($participantsJson, true);

// Get selected event from POST or default to first
$selectedEventId = isset($_POST['event_id']) ? (int)$_POST['event_id'] : 1;

// Filter participants for selected event
$selectedParticipants = array_filter($participants, function($p) use ($selectedEventId) {
    return $p['event_id'] == $selectedEventId;
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participant List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        h1, h2 {
            text-align: center;
            color: #4CAF50;
        }
        form {
            margin-bottom: 20px;
            text-align: center;
        }
        select, button {
            padding: 8px 12px;
            margin: 0 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <h1>Participant List for Selected Event</h1>
    
    <form method="post">
        <label for="event_id">Select Event:</label>
        <select name="event_id" id="event_id">
            <?php foreach ($events as $event): ?>
                <option value="<?php echo $event['id']; ?>" <?php echo ($event['id'] == $selectedEventId) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($event['name']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Show Participants</button>
    </form>
    
    <h2>Participants for <?php echo htmlspecialchars($events[array_search($selectedEventId, array_column($events, 'id'))]['name']); ?></h2>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($selectedParticipants) > 0): ?>
                <?php foreach ($selectedParticipants as $participant): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($participant['id']); ?></td>
                        <td><?php echo htmlspecialchars($participant['name']); ?></td>
                        <td><?php echo htmlspecialchars($participant['email']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No participants found for this event.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

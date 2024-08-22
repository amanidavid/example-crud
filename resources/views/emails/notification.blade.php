<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Task Assigned</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #3498db;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            border-bottom: 2px solid #2980b9;
        }
        .header h1 {
            font-size: 24px;
            margin: 0;
        }
        .content {
            padding: 20px;
        }
        .content p {
            font-size: 16px;
            color: #333333;
            line-height: 1.5;
            margin: 0 0 10px;
        }
        .task-details {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .task-details caption {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333333;
        }
        .task-details th, .task-details td {
            padding: 10px;
            border-bottom: 1px solid #e0e0e0;
        }
        .task-details th {
            background-color: #f7f7f7;
            color: #333333;
            text-align: left;
        }
        .task-details tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .task-details td {
            font-size: 16px;
            color: #333333;
        }
        .footer {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
            font-size: 14px;
            color: #666666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Task Assigned</h1>
        </div>
        <div class="content">
            <p>Hello,</p>
            <p>You have been assigned a new task. Here are the details:</p>
            <table class="task-details">
                <caption>Task Details</caption>
                <tr>
                    <th>Title:</th>
                    <td>{{ $taskName }}</td>
                </tr>
                <tr>
                    <th>Description:</th>
                    <td>{{ $description }}</td>
                </tr>
                <tr>
                    <th>Start Date:</th>
                    <td>{{ $startDate }}</td>
                </tr>
                <tr>
                    <th>Due Date:</th>
                    <td>{{ $dueDate }}</td>
                </tr>
            </table>
            <p>Assigned By,<br>{{ $assignerName }}</p>
        </div>
        <div class="footer">
        <p>If you have any questions, feel free to <a href="mailto:info@mainstreammedia.co.tz">contact us</a>.</p>

        <p>&copy; 2024 Mainstreammedia. All rights reserved.</p>
        </div>
    </div>
</body>
</html>


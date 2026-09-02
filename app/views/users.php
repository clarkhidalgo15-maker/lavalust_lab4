<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users | LavaLust Lab 4</title>
    <style>
        :root { color-scheme: light; font-family: Arial, sans-serif; }
        body { margin: 0; background: #f3f4f6; color: #1f2937; }
        main { width: min(100% - 32px, 1100px); margin: 48px auto; }
        h1 { margin-bottom: 8px; color: #b9380d; }
        p { margin-top: 0; color: #6b7280; }
        .table-wrap { overflow-x: auto; background: #fff; border: 1px solid #d1d5db; border-radius: 8px; box-shadow: 0 8px 24px rgba(17, 24, 39, .08); }
        table { width: 100%; border-collapse: collapse; min-width: 680px; }
        th, td { padding: 14px 16px; text-align: left; border-bottom: 1px solid #e5e7eb; }
        th { background: #b9380d; color: #fff; font-size: .85rem; text-transform: uppercase; letter-spacing: .04em; }
        tbody tr:last-child td { border-bottom: 0; }
        tbody tr:hover { background: #fff7ed; }
        .empty { padding: 28px; text-align: center; color: #6b7280; }
    </style>
</head>
<body>
    <main>
        <h1>User Management</h1>
        <p>Users retrieved dynamically from the <strong>users</strong> table.</p>
        <div class="table-wrap">
            <?php if (empty($users)): ?>
                <div class="empty">No users found.</div>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= html_escape($user->id ?? '') ?></td>
                                <td><?= html_escape($user->firstname ?? '') ?></td>
                                <td><?= html_escape($user->lastname ?? '') ?></td>
                                <td><?= html_escape($user->email ?? '') ?></td>
                                <td><?= html_escape($user->username ?? '') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
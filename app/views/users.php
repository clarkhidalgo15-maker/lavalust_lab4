<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users | LavaLust Lab 4</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            color-scheme: dark;
            --black: #080808;
            --ink: #111111;
            --white: #f8f8f4;
            --muted: #b8b8ae;
            --yellow: #ffd21f;
            --yellow-soft: rgba(255, 210, 31, .14);
            --glass: rgba(255, 255, 255, .08);
            --line: rgba(255, 255, 255, .16);
            font-family: 'Space Grotesk', sans-serif;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            background:
                radial-gradient(circle at 10% 10%, rgba(255, 210, 31, .16), transparent 30%),
                linear-gradient(135deg, #080808 0%, #171717 52%, #0a0a0a 100%);
            color: var(--white);
        }
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            pointer-events: none;
            opacity: .22;
            background-image: linear-gradient(rgba(255, 255, 255, .035) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 255, 255, .035) 1px, transparent 1px);
            background-size: 42px 42px;
        }
        main { position: relative; width: min(100% - 32px, 1100px); margin: 0 auto; padding: 72px 0; }
        .eyebrow { margin: 0 0 14px; color: var(--yellow); font: 500 .78rem 'DM Mono', monospace; letter-spacing: .12em; text-transform: uppercase; }
        h1 { margin: 0 0 10px; color: var(--white); font-size: clamp(2.2rem, 5vw, 4.5rem); line-height: .98; letter-spacing: -.045em; }
        p { margin: 0 0 34px; color: var(--muted); font-size: 1rem; }
        strong { color: var(--yellow); font-weight: 600; }
        .table-wrap {
            overflow-x: auto;
            border: 1px solid var(--line);
            border-radius: 14px;
            background: var(--glass);
            box-shadow: 0 24px 70px rgba(0, 0, 0, .35), inset 0 1px rgba(255, 255, 255, .12);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
        }
        table { width: 100%; border-collapse: collapse; min-width: 680px; }
        th, td { padding: 17px 20px; text-align: left; border-bottom: 1px solid var(--line); }
        th { background: rgba(255, 210, 31, .92); color: var(--ink); font: 500 .75rem 'DM Mono', monospace; letter-spacing: .08em; text-transform: uppercase; }
        td { color: var(--white); }
        td:first-child { color: var(--yellow); font-family: 'DM Mono', monospace; }
        tbody tr:last-child td { border-bottom: 0; }
        tbody tr { transition: background-color .2s ease; }
        tbody tr:hover { background: var(--yellow-soft); }
        .empty { padding: 32px; text-align: center; color: var(--muted); }
        @media (max-width: 640px) {
            main { padding: 44px 0; }
            h1 { font-size: 2.6rem; }
            p { margin-bottom: 24px; }
            th, td { padding: 14px 16px; }
        }
    </style>
</head>
<body>
    <main>
        <h1>User Management</h1>
        <p>Users retrieved dynamically from the <strong>Aiven MySQL users</strong> table.</p>
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
                                <td><?= html_escape($user['id'] ?? '') ?></td>
                                <td><?= html_escape($user['firstname'] ?? '') ?></td>
                                <td><?= html_escape($user['lastname'] ?? '') ?></td>
                                <td><?= html_escape($user['email'] ?? '') ?></td>
                                <td><?= html_escape($user['username'] ?? '') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
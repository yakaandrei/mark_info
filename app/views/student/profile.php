<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information | <?= htmlspecialchars($student['name']); ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --blue: #3b82f6;
            --blue-dim: #2563eb;
            --blue-glow: rgba(59,130,246,0.15);
            --blue-glow-strong: rgba(59,130,246,0.30);
            --bg: #0a0f1e;
            --card-bg: rgba(15,23,42,0.78);
            --border: rgba(59,130,246,0.15);
            --border-hot: rgba(59,130,246,0.4);
            --text: #eef2ff;
            --text-muted: #93a3c2;
            --text-dim: #5b6b8c;
            --sans: 'Inter', sans-serif;
        }

        body {
            font-family: var(--sans);
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            padding: 2rem;
            position: relative;
            overflow-x: hidden;
        }

        /* Grid background */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(var(--border) 1px, transparent 1px),
                linear-gradient(90deg, var(--border) 1px, transparent 1px);
            background-size: 48px 48px;
            pointer-events: none;
            z-index: 0;
        }

        /* Glow orbs */
        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(120px);
            pointer-events: none;
            z-index: 0;
        }

        .orb-1 {
            width: 600px;
            height: 600px;
            top: -200px;
            left: -150px;
            background: radial-gradient(
                circle,
                rgba(59,130,246,0.20) 0%,
                transparent 70%
            );
        }

        .orb-2 {
            width: 500px;
            height: 500px;
            bottom: -200px;
            right: -150px;
            background: radial-gradient(
                circle,
                rgba(37,99,235,0.15) 0%,
                transparent 70%
            );
        }

        .card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 650px;
            margin: 0 auto;
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 2.5rem;
            backdrop-filter: blur(16px);
            box-shadow: 0 0 60px rgba(0,0,0,0.4);
        }

        .accent-line {
            width: 56px;
            height: 3px;
            background: linear-gradient(
                90deg,
                transparent,
                var(--blue),
                transparent
            );
            margin: 0 auto 1.5rem;
            border-radius: 2px;
        }

        .lock-badge {
            display: table;
            margin: 0 auto 1.5rem;
            background: rgba(59,130,246,0.10);
            border: 1px solid var(--border-hot);
            color: #60a5fa;
            padding: 0.45rem 1rem;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        h1 {
            text-align: center;
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--text);
            margin-bottom: 1.75rem;
        }

        h1::after {
            content: '';
            display: block;
            width: 100%;
            height: 1px;
            margin-top: 1.25rem;
            background: linear-gradient(
                90deg,
                transparent,
                var(--border-hot),
                transparent
            );
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td {
            padding: 13px 8px;
            border-bottom: 1px solid var(--border);
            font-size: 0.9rem;
            color: var(--text-muted);
            vertical-align: top;
        }

        table tr:last-child td {
            border-bottom: none;
        }

        table td.label {
            font-weight: 700;
            color: #60a5fa;
            width: 35%;
        }

        table td:not(.label) {
            color: var(--text);
        }

        nav {
            margin-top: 2rem;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        nav a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.4rem;
            background: var(--blue);
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 700;
            transition: all 0.2s ease;
        }

        nav a:hover {
            background: var(--blue-dim);
            box-shadow: 0 0 30px var(--blue-glow-strong);
            transform: translateY(-1px);
        }

        .footer {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--text-dim);
            font-size: 0.72rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        @media (max-width: 600px) {
            body {
                padding: 1rem;
            }

            .card {
                padding: 1.5rem;
            }

            h1 {
                font-size: 1.5rem;
            }

            table td {
                font-size: 0.82rem;
                padding: 11px 5px;
            }

            table td.label {
                width: 38%;
            }
        }
    </style>
</head>

<body>

<div class="orb orb-1"></div>
<div class="orb orb-2"></div>

<div class="card">

    <div class="accent-line"></div>

    <span class="lock-badge">
        🔓 Access Granted by StudentMiddleware
    </span>

    <h1>Student Information</h1>

    <table>
        <tr>
            <td class="label">Student ID</td>
            <td><?= htmlspecialchars($student['student_id']); ?></td>
        </tr>

        <tr>
            <td class="label">Name</td>
            <td><?= htmlspecialchars($student['name']); ?></td>
        </tr>

        <tr>
            <td class="label">Course</td>
            <td><?= htmlspecialchars($student['course']); ?></td>
        </tr>

        <tr>
            <td class="label">Year Level</td>
            <td><?= htmlspecialchars($student['year']); ?></td>
        </tr>

        <tr>
            <td class="label">Section</td>
            <td><?= htmlspecialchars($student['section']); ?></td>
        </tr>

        <tr>
            <td class="label">Email</td>
            <td><?= htmlspecialchars($student['email']); ?></td>
        </tr>

        <tr>
            <td class="label">Address</td>
            <td><?= htmlspecialchars($student['address']); ?></td>
        </tr>

        <tr>
            <td class="label">Contact No.</td>
            <td><?= htmlspecialchars($student['contact_no']); ?></td>
        </tr>

        <tr>
            <td class="label">Hobbies</td>
            <td><?= htmlspecialchars($student['hobbies']); ?></td>
        </tr>

        <tr>
            <td class="label">About</td>
            <td><?= htmlspecialchars($student['description']); ?></td>
        </tr>
    </table>

    <nav>
        <a href="<?= site_url('student'); ?>">Home</a>
        <a href="<?= site_url('student/logout'); ?>">Revoke Access</a>
    </nav>

    <div class="footer">
        LavaLust &bull; Student Portal
    </div>

</div>

</body>
</html>
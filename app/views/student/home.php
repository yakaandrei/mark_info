<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home | <?= htmlspecialchars($student['name']); ?></title>

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
            --card-bg: rgba(15,23,42,0.75);
            --border: rgba(59,130,246,0.15);
            --border-hot: rgba(59,130,246,0.4);
            --text: #eef2ff;
            --text-muted: #93a3c2;
            --text-dim: #5b6b8c;
            --sans: 'Inter', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: var(--sans);
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
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
            max-width: 520px;
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 3rem 2.5rem 2rem;
            text-align: center;
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
            margin: 0 auto 1.75rem;
            border-radius: 2px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(59,130,246,0.10);
            border: 1px solid var(--border-hot);
            color: #60a5fa;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 0.4rem 1rem;
            border-radius: 999px;
            margin-bottom: 1.75rem;
        }

        .badge::before {
            content: '';
            width: 6px;
            height: 6px;
            background: var(--blue);
            border-radius: 50%;
            box-shadow: 0 0 8px var(--blue);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
                box-shadow: 0 0 8px var(--blue);
            }

            50% {
                opacity: 0.5;
                box-shadow: 0 0 3px var(--blue);
            }
        }

        h1 {
            font-size: 1.85rem;
            font-weight: 800;
            line-height: 1.3;
            letter-spacing: -0.02em;
            margin-bottom: 1rem;
        }

        h1 .name {
            color: #60a5fa;
        }

        .sub {
            font-size: 0.95rem;
            color: var(--text-muted);
            line-height: 1.7;
            max-width: 400px;
            margin: 0 auto 2rem;
        }

        nav {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 2rem;
        }

        nav a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.3rem;
            background: var(--blue);
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 700;
            border: 1px solid transparent;
            transition: all 0.2s ease;
        }

        nav a:hover {
            background: var(--blue-dim);
            box-shadow: 0 0 30px var(--blue-glow-strong);
            transform: translateY(-1px);
        }

        .note {
            text-align: left;
            background: rgba(59,130,246,0.06);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1rem 1.25rem;
            font-size: 0.82rem;
            color: var(--text-muted);
            line-height: 1.6;
        }

        .note strong {
            color: var(--text);
        }

        .note a {
            color: #60a5fa;
            font-weight: 600;
            text-decoration: none;
        }

        .note a:hover {
            text-decoration: underline;
        }

        .divider {
            height: 1px;
            background: linear-gradient(
                90deg,
                transparent,
                var(--border),
                transparent
            );
            margin: 1.75rem 0 1rem;
        }

        .footer-tag {
            font-size: 0.72rem;
            color: var(--text-dim);
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        @media (max-width: 600px) {
            body {
                padding: 1rem;
            }

            .card {
                padding: 2rem 1.25rem 1.5rem;
            }

            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>

<div class="orb orb-1"></div>
<div class="orb orb-2"></div>

<div class="card">

    <div class="accent-line"></div>

    <div class="badge">
        Student Information Page
    </div>

    <h1>
        Welcome,
        <span class="name"><?= htmlspecialchars($student['name']); ?></span>!
    </h1>

    <p class="sub">
        This is the home page of the LavaLust Student Information System.
    </p>

    <nav>
        <a href="<?= site_url('student'); ?>">Home</a>
        <a href="<?= site_url('student/profile'); ?>">Student Profile</a>
    </nav>

    <div class="note">
        <strong>StudentMiddleware Protected</strong><br>
        The Student Profile page is protected by
        <strong>StudentMiddleware</strong>.

        If you haven't unlocked access yet, click
        <a href="<?= site_url('student/access'); ?>">
            here to grant access
        </a>
        before opening the profile page.
    </div>

    <div class="divider"></div>

    <div class="footer-tag">
        LavaLust &bull; Student Portal
    </div>

</div>

</body>
</html>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Akses Ditolak | SIAKAD Defense</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #0b0f19;
            color: #f1f5f9;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 1.5rem;
        }

        .card {
            background-color: #121826;
            border: 1px solid #1e293b;
            border-top: 4px solid #f43f5e;
            border-radius: 1rem;
            max-width: 480px;
            width: 100%;
            padding: 2.25rem 2rem;
            text-align: center;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .icon-box {
            width: 64px;
            height: 64px;
            margin: 0 auto 1.25rem auto;
            background-color: rgba(244, 63, 94, 0.1);
            border: 1px solid rgba(244, 63, 94, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.75rem;
        }

        p {
            font-size: 0.95rem;
            color: #fda4af;
            line-height: 1.5;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="icon-box">🚫</div>
        <h1>403 - Akses Ditolak</h1>
        <p>{{ $message ?? 'IP (' . request()->ip() . ') diblokir secara permanen Administrator' }}</p>
    </div>
</body>

</html>

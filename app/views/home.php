<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Student Manager</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style>
        :root {
            --color-bg: #f0f4f8;
            --color-card-bg: #ffffff;
            --color-text: #333333;
            --color-primary: #4CAF50;
            --color-primary-dark: #45a049;
            --color-border: #e0e0e0;
            --shadow-subtle: 0 4px 15px rgba(0, 0, 0, 0.08);
            --font-main: 'Poppins', sans-serif;
        }
        
        body {
            background-color: var(--color-bg);
            color: var(--color-text);
            font-family: var(--font-main);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 2rem;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .container {
            width: 90%;
            max-width: 450px;
            background-color: var(--color-card-bg);
            border-radius: 15px;
            box-shadow: var(--shadow-subtle);
            padding: 2.5rem;
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }

        h1 {
            font-size: clamp(2rem, 5vw, 2.5rem);
            font-weight: 600;
            color: var(--color-primary);
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            width: 100%;
        }

        .main-btn {
            display: block;
            width: 100%;
            padding: 1rem;
            background-color: var(--color-primary);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: clamp(1rem, 3vw, 1.1rem);
            transition: transform 0.2s, background-color 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .main-btn:hover {
            background-color: var(--color-primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-graduation-cap"></i> Student Manager</h1>
        <div class="btn-group">
            <a href="<?=site_url('users/show');?>" class="main-btn">View Student List</a>
            <a href="<?=site_url('users/create');?>" class="main-btn">Add New Student</a>
        </div>
    </div>
</body>
</html>
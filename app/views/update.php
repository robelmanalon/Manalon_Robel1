<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student | Student Manager</title>
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
            --color-input-bg: #f7f9fc;
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

        .form-container {
            width: 90%;
            max-width: 500px;
            background-color: var(--color-card-bg);
            border-radius: 15px;
            box-shadow: var(--shadow-subtle);
            padding: 2.5rem;
            animation: fadeIn 0.8s ease-in-out;
        }

        h1 {
            font-size: clamp(1.8rem, 5vw, 2.2rem);
            font-weight: 600;
            color: var(--color-primary);
            text-align: center;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #555;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 0.8rem 1rem;
            background-color: var(--color-input-bg);
            border: 1px solid var(--color-border);
            border-radius: 8px;
            font-family: inherit;
            font-size: 1rem;
            transition: border-color 0.2s, box-shadow 0.2s;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            outline: none;
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
        }

        button[type="submit"] {
            width: 100%;
            padding: 1rem;
            background-color: var(--color-primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: clamp(1rem, 3vw, 1.1rem);
            cursor: pointer;
            transition: transform 0.2s, background-color 0.2s, box-shadow 0.2s;
            margin-top: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        button[type="submit"]:hover {
            background-color: var(--color-primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }

        .back-link {
            display: inline-block;
            margin-top: 2rem;
            text-decoration: none;
            color: var(--color-text);
            font-size: 0.9rem;
            font-weight: 400;
            transition: color 0.2s;
        }

        .back-link:hover {
            color: var(--color-primary);
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1><i class="fas fa-user-edit"></i> Update Student Record</h1>
        <form action="<?=site_url('users/update/'.$user['id']);?>" method="post">
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" value="<?=html_escape($user['last_name']);?>" required>
            </div>

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" value="<?=html_escape($user['first_name']);?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?=html_escape($user['email']);?>" required>
            </div>

            <button type="submit">Update Record</button>
        </form>
        <a href="<?=site_url('users/show');?>" class="back-link">Back to Dashboard</a>
    </div>
</body>
</html>
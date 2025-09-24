<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List | Student Manager</title>
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
            --color-danger: #f44336;
            --color-border: #e0e0e0;
            --color-row-alt: #fafafa;
            --shadow-subtle: 0 4px 15px rgba(0, 0, 0, 0.08);
            --font-main: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--color-bg);
            color: var(--color-text);
            font-family: var(--font-main);
            margin: 0;
            padding: 2rem 1rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .container {
            width: 100%;
            max-width: 1200px;
            background-color: var(--color-card-bg);
            border-radius: 15px;
            box-shadow: var(--shadow-subtle);
            padding: 2.5rem;
            animation: fadeIn 0.8s ease-in-out;
        }

        h1 {
            font-size: clamp(2rem, 5vw, 2.5rem);
            font-weight: 600;
            color: var(--color-primary);
            text-align: center;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .search-container {
            display: flex;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .search-container form {
            display: flex;
            gap: 0.5rem;
            width: 100%;
            max-width: 500px;
        }

        #searchBox {
            flex: 1;
            padding: 0.7rem 1rem;
            border-radius: 8px;
            border: 1px solid var(--color-border);
            background: var(--color-input-bg);
            color: var(--color-text);
            font-family: inherit;
            font-size: 1rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        #searchBox:focus {
            outline: none;
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
        }

        .search-btn {
            padding: 0.7rem 1.2rem;
            border: none;
            background: var(--color-primary);
            color: white;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.2s, background-color 0.2s, box-shadow 0.2s;
        }

        .search-btn:hover {
            background-color: var(--color-primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 700px;
            border-collapse: collapse;
            font-size: 0.95rem;
            margin-top: 1rem;
        }

        th, td {
            padding: 1.2rem;
            text-align: left;
            border-bottom: 1px solid var(--color-border);
        }

        thead th {
            font-weight: 600;
            color: #777;
            text-transform: uppercase;
        }

        tbody tr:nth-child(even) {
            background-color: var(--color-row-alt);
        }

        tbody tr:hover {
            background-color: #f1f5f9;
        }

        .action-links a {
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }

        .action-links .update-link {
            color: var(--color-primary);
        }

        .action-links .delete-link {
            color: var(--color-danger);
        }
        
        .action-links a:hover {
            text-decoration: underline;
        }

        .create-record-btn {
            display: inline-block;
            margin-top: 2.5rem;
            padding: 0.75rem 1.5rem;
            background-color: var(--color-primary);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: transform 0.2s, background-color 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .create-record-btn:hover {
            background-color: var(--color-primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }
        
        .pagination-container {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .pagination-container a,
        .pagination-container strong {
            display: inline-block;
            padding: 0.6rem 1rem;
            border: 1px solid var(--color-border);
            border-radius: 6px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .pagination-container a {
            background: var(--color-card-bg);
            color: var(--color-text);
        }

        .pagination-container a:hover {
            background-color: var(--color-primary);
            color: white;
            border-color: var(--color-primary);
        }

        .pagination-container strong {
            background-color: var(--color-primary);
            color: white;
            border-color: var(--color-primary);
            cursor: default;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-users"></i> Students List</h1>

        <div class="search-container">
            <form action="<?= site_url('users/show'); ?>" method="get">
                <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
                <input type="text" name="q" placeholder="Search students..." value="<?= html_escape($q); ?>" id="searchBox">
                <button type="submit" class="search-btn">Search</button>
            </form>
        </div>

        <div class="table-responsive">
            <table id="studentsTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($users)): ?>
                        <tr>
                            <td colspan="5" style="text-align:center;">No students found.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach (html_escape($users) as $user): ?>
                            <tr>
                                <td><?= $user['id']; ?></td>
                                <td><?= $user['last_name']; ?></td>
                                <td><?= $user['first_name']; ?></td>
                                <td><?= $user['email']; ?></td>
                                <td class="action-links">
                                    <a href="<?= site_url('users/update/'.$user['id']); ?>" class="update-link">Update</a> |
                                    <a href="<?= site_url('users/delete/'.$user['id']); ?>" class="delete-link" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <div class="pagination-container">
            <?php if (isset($page)) echo $page; ?>
        </div>

        <div style="text-align: center;">
            <a href="<?= site_url('users/create'); ?>" class="create-record-btn">Create New Record</a>
        </div>
    </div>
</body>
</html>
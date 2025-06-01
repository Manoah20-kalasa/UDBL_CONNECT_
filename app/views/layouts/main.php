<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?> - <?= $title ?? 'Réseau des Étudiants en Informatique' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #455DA2 0%, #4FAE34 100%);
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .transition-all {
            transition: all 0.3s ease;
        }
        .file-input-label {
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            border: 2px dashed #455DA2;
            border-radius: 0.5rem;
            background-color: #F3F9F9;
        }
        .file-input-label:hover {
            background-color: #FEFBFE;
        }
    </style>
</head>
<body class="bg-antiflash-white font-sans">
    <?php require_once 'layouts/header.php'; ?>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <?php if (isset($success) && $success): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline"><?= $success ?></span>
            </div>
        <?php endif; ?>
        
        <?php if (isset($error) && $error): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline"><?= $error ?></span>
            </div>
        <?php endif; ?>
        
        <?= $content ?>
    </div>
    
    <?php require_once 'layouts/footer.php'; ?>
</body>
</html>
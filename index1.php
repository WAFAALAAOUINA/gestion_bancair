<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Page</title>
    <!-- Inclure le lien vers la feuille de style de Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <nav class="bg-blue-500 p-4">
        <div class="flex items-center justify-between">
            <div class="text-white text-lg font-bold">Logo</div>
            <div class="flex space-x-4">
                <a href="afficherclientes.php" class="text-white">Clients</a>
                <a href="affichercomptes.php" class="text-white">Comptes</a>
                <a href="affichertransaction.php" class="text-white">Transactions</a>
            </div>
        </div>
    </nav>

    
    <div class="container mx-auto mt-8">
        <img src="body.jpg" alt="Image" class=" w-full h-max w-max-w-screen-lg mx-auto rounded-md shadow-md">
    </div>

    
    <footer class="bg-gray-800 text-white p-4 mt-8">
        <p class="text-center">&copy; 2023 Mon Site. Tous droits réservés.</p>
    </footer>
</body>
</html>




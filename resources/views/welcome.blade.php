<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notiz-App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @livewireStyles
    <style>
        /* CSS-Anpassung für den Close-Button im Modal */
        .modal-header .close {
            font-size: 1.5rem; /* Größe des Close-Buttons */
            color: #000; /* Button-Farbe */
            opacity: 0.5; /* Transparenz des Buttons */
            border: none; /* Kein Rand */
            background: none; /* Kein Hintergrund */
            margin: -1rem -1rem -1rem auto;
        }

        .modal-header .close:hover {
            color: #333; /* Farbe beim Hover */
            opacity: 1; /* Vollständige Sichtbarkeit beim Hover */
            text-decoration: none; /* Kein Unterstrich beim Hover */
        }

        .modal-header .close:focus {
            outline: none; /* Kein Fokus-Rahmen */
        }

        .modal-header .close span {
            font-size: 2rem; /* Größe des X-Zeichens */
        }
    </style>
</head>
<body>
    <livewire:notes />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @livewireScripts
</body>
</html>

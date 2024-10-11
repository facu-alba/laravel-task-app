<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Termination Reminder</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: "Neue Machina Regular";
            font-style: oblique;
            font-weight: 400;
            src: url("https://db.onlinewebfonts.com/t/38d41072aa88a50711d4d50dd0d50f6b.eot");
            src: url("https://db.onlinewebfonts.com/t/38d41072aa88a50711d4d50dd0d50f6b.eot?#iefix")format("embedded-opentype"),
            url("https://db.onlinewebfonts.com/t/38d41072aa88a50711d4d50dd0d50f6b.woff2")format("woff2"),
            url("https://db.onlinewebfonts.com/t/38d41072aa88a50711d4d50dd0d50f6b.woff")format("woff"),
            url("https://db.onlinewebfonts.com/t/38d41072aa88a50711d4d50dd0d50f6b.ttf")format("truetype"),
            url("https://db.onlinewebfonts.com/t/38d41072aa88a50711d4d50dd0d50f6b.svg#Neue Machina Regular")format("svg");
        }

        @font-face {
            font-family: "Neue Machina Regular";
            font-style: oblique;
            font-weight: 700;
            src: url("https://db.onlinewebfonts.com/t/38d41072aa88a50711d4d50dd0d50f6b.eot");
            src: url("https://db.onlinewebfonts.com/t/38d41072aa88a50711d4d50dd0d50f6b.eot?#iefix")format("embedded-opentype"),
            url("https://db.onlinewebfonts.com/t/38d41072aa88a50711d4d50dd0d50f6b.woff2")format("woff2"),
            url("https://db.onlinewebfonts.com/t/38d41072aa88a50711d4d50dd0d50f6b.woff")format("woff"),
            url("https://db.onlinewebfonts.com/t/38d41072aa88a50711d4d50dd0d50f6b.ttf")format("truetype"),
            url("https://db.onlinewebfonts.com/t/38d41072aa88a50711d4d50dd0d50f6b.svg#Neue Machina Regular")format("svg");
        }

        /* Custom styles */
        body {
            background-color: #f7fafc;
            color: #1a202c;
            font-family: "Neue Machina Regular", sans-serif;
            font-style: normal;
            font-weight: 700;
        }

        .container {
            max-width: 600px;
            margin: auto;
        }

        .header {
            background-color: #4a5568;
            color: #ffffff;
            padding: 2rem;
            text-align: left;
            border-radius: 0.5rem 0.5rem 0 0;
        }

        .content {
            background-color: #ffffff;
            /* padding: 2rem; */
            border-radius: 0 0 0.5rem 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-size: 18px;
        }

        .signature {
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 class="text-3xl font-semibold">Internship Termination Reminder</h1>
        </div>
        <div class="content">
            <p class="text-gray-800 text-lg mb-6">Dear {{ $name }},</p>
            <p class="text-gray-800 mb-6">We regret to inform you that your internship with {{ env('APP_NAME') }} has been terminated due to unsatisfactory performance.</p>
            <p class="text-gray-800 mb-6">Throughout the duration of your internship, there have been concerns regarding your performance, and despite efforts to address them, the necessary improvements have not been made.</p>
            <p class="text-gray-800 mb-6">We appreciate the time you spent with us and wish you the best in your future endeavors.</p>
            <p class="text-gray-800 mb-6 signature">Sincerely,<br>Facundo<br>CEO of {{ env('APP_NAME') }}<br></p>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Main Layout</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .main-content {
            flex-grow: 1;
            padding: 2rem;
        }

        .table-responsive {
            height: calc(100vh - 120px);
            /* Adjust height based on header and footer */
            overflow-y: auto;
        }

        .navbar,
        .footer {
            flex-shrink: 0;
        }
    </style>
</head>

<body>
    <!-- Header and Navigation -->

    <?= $this->include('layout/navigation') ?>

    <!-- Main Content -->
    <div class="main-content container-fluid">
        <div class="table-responsive">
            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <!-- Footer -->
    <?= $this->include('layout/footer') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-YmA7+Dj8x+Jph9GLldh4meSTeu41dZjHhjoJ9E9uA1p4xKppkrydvGRIfDk1G5fP" crossorigin="anonymous"></script>
</body>

</html>
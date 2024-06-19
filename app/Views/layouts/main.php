<!-- app/Views/layout.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My CodeIgniter App</title>
    <link rel="stylesheet" href="<?= base_url('/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-gKx3oJzC4yET+UFGcRz7SqtvWm6KT0kONRmnuK2oe3T4MH3lWgu0Rg5Abw2R3SuxsIh3UM+diHgT6fSd5/BJjA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Atau jika menggunakan CDN -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
</head>
<body>
    <?= $this->renderSection('content') ?>
    
    <script src="<?= base_url('/js/bootstrap.min.js') ?>"></script>
    <!-- Atau jika menggunakan CDN -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>
</html>

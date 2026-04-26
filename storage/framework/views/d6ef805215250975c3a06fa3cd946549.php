<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Latihan Belajar Blade</title>
</head>
<body>
    <h1>Selamat Belajar Blade Template engine</h1>
    Nama saya <?php echo e($nama); ?> dengan nilai <?php echo e($nilai); ?>

    <p>Nilai anda: <?php echo e($nilai); ?></p>
    //if
    <?php if($nilai >= 80): ?>
        <p>Selamat..... Anda mendapatkan nilai A.</p>
    <?php elseif($nilai >= 60): ?>
        <p>Selamat, Anda mendapatkan nilai B.</p>
    <?php else: ?>
        <p>Anda perlu mengulang ujian.</p>
    <?php endif; ?>

    //for
    <?php for($i = 1; $i <= 5; $i++): ?>
        <p>LARAVEL: <?php echo e($i); ?></p>
    <?php endfor; ?> 

    
    
</body>
</html><?php /**PATH /Users/macbook/Library/Application Support/Herd/config/valet/Sites/belajarlaravel2/resources/views/latihan.blade.php ENDPATH**/ ?>
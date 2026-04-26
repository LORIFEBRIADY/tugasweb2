<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Post</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid rgb(242, 6, 6);
            padding: 8px;
        }
        a {
            text-decoration: none;
            margin-right: 5px;
        }
    </style>
</head>
<body>

    <h1>Daftar Post</h1>

    <a href="<?php echo e(route('posts.create')); ?>">+ Tambah Post</a>
    <?php if(session('success')): ?>
        <p style="color: green;"><?php echo e(session('success')); ?></p>
    <?php endif; ?>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>#</th>
            <th>Judul</th>
            <th>Aksi</th>
        </tr>
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($post->title); ?></td>
            <td>
                <a href="<?php echo e(route('posts.show', $post->id)); ?>">Lihat</a>
                <a href="<?php echo e(route('posts.edit', $post->id)); ?>">Edit</a>
                <form action="<?php echo e(route('posts.destroy', $post->id)); ?>" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </td>
         </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</body>
</html><?php /**PATH /Users/macbook/Library/Application Support/Herd/config/valet/Sites/belajarlaravel2/resources/views/index.blade.php ENDPATH**/ ?>
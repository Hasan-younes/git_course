<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>
<body class="antialiased bg-gray-100 h-screen leading-none font-sans">
        <header class="bg-gray-700 text-gray-100 py-6">
            <div class=" container mx-auto flex justify-end items-end py-2 px-6">
                <?php if(Route::has('login')): ?>

                    <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('blog.index')); ?>" class="font-semibold hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 px-5">Blog</a>
                    <a href="<?php echo e(url('/dashboard')); ?>" class="font-semibold hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"><?php echo e(Auth::user()->name); ?></a>

                    
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class=" font-semibold hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 px-5 dropdown-item" href="<?php echo e(route('logout')); ?>"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            <?php echo e(__('Logout')); ?>

                        </a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>


                    <?php else: ?>
                    <a href="<?php echo e(route('blog.index')); ?>" class="font-semibold hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 px-5">Blog</a>

                    <a href="<?php echo e(route('login')); ?>" class="font-semibold hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                    <?php if(Route::has('register')): ?>
                    <a href="<?php echo e(route('register')); ?>" class="ml-4 font-semibold hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </header>

    <main>
        <div>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <div>
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </main>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\New folder\resources\views/home.blade.php ENDPATH**/ ?>
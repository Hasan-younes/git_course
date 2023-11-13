<?php $__env->startSection('content'); ?>
<?php if(session()->has('message')): ?>
    <div class="bg-red-900 text-center py-4 lg:px-4">
    <div class="p-2 bg-red-800 items-center text-red-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
      <span class="flex rounded-full bg-red-500 uppercase px-2 py-1 text-xs font-bold mr-3">Delted</span>
      <span class="font-semibold mr-2 text-left flex-auto"><?php echo e(@session('message')); ?></span>
      <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
    </div>
  </div>
<?php endif; ?>


    <div class="container m-auto text-center pt-14 bg pb-2">
        <h1 class=" font-bold text-6xl">All Posts</h1>
    </div>
    <?php if(auth()->guard()->check()): ?>
        <div class=" container flex justify-end mx-auto px-20 border-b border-gray-300 py-14  ">
            <a href="<?php echo e(route('blog.create')); ?>" class=" text-gray-100 bg-gray-700 hover:bg-gray-500 rounded-lg py-2 px-3 font-bold text-base place-self-start    uppercase">Edit Post</a>
        </div>
    <?php endif; ?>

<?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class=" container sm:grid grid-cols-2 gap-14 mx-auto px-5 border-b border-gray-300 py-14">
        <div class="flex">
            <img class=" object-cover" src="/image/<?php echo e($post->image_path); ?>" alt="">
        </div>

        <div>
            <h2 class=" font-bold text-4xl text-gray-700 py-5 md:pt-0"><?php echo e($post->title); ?></h2>
            <div>
                by: <span class=" text-gray-500 italic"><?php echo e($post->user->name); ?></span>
                on: <span class=" text-gray-500 italic"><?php echo e(date('d-m-Y',strtotime($post->updated_at))); ?></span>
                <p class=" text-lg text-gray-700 leading-6 py-8"><?php echo e($post->description); ?></p>
                <a href="/blog/<?php echo e($post->slug); ?>" class="text-gray-100 bg-gray-700  hover:bg-gray-500 rounded-lg py-2 px-3 font-bold text-base place-self-start uppercase">Read More</a>
            </div>
        </div>
    </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Nour_blog\resources\views/blog/index.blade.php ENDPATH**/ ?>
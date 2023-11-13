<?php $__env->startSection('content'); ?>
<?php if(session()->has('message')): ?>
    <div class="bg-indigo-900 text-center py-4 lg:px-4">
    <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
      <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">New</span>
      <span class="font-semibold mr-2 text-left flex-auto"><?php echo e(@session('message')); ?></span>
      <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
    </div>
  </div>
<?php endif; ?>

        <div class="container text-center m-auto p-20 pb-5">
            <h1 class="text-6xl uppercase font-bold" ><?php echo e($post->title); ?></h1>
            <div class=" mt-2">
                by: <span class=" text-gray-500 italic"><?php echo e($post->user->name); ?></span>
                on: <span class=" text-gray-500 italic"><?php echo e(date('d-m-Y',strtotime($post->updated_at))); ?></span>
            </div>
        </div>
        <div class=" container m-auto p-20 pb-5">
            <div class="flex h-96">
                <img class=" object-cover w-full" src="/image/<?php echo e($post->image_path); ?>" alt="">
            </div>
            <p class=" text-lg text-gray-700 leading-6 py-8">
                <?php echo e($post->description); ?>

            </p>
            <?php if(Auth::user() && Auth::user()->id == $post->user_id): ?>
                     <a href="/blog/<?php echo e($post->slug); ?>/edit" class="text-gray-100 bg-gray-700  hover:bg-gray-500
                          rounded-lg py-2 px-3 mt-6 inline-block
                          font-bold text-base place-self-start uppercase">Edit Post</a>
                     <form action="/blog/<?php echo e($post->slug); ?>" method="POST" class=" inline-block">
                     <?php echo csrf_field(); ?>
                     <?php echo method_field("DELETE"); ?>
                         <button type="submit" class="text-gray-100 bg-red-700  hover:bg-red-500
                         rounded-lg py-2 px-3 mt-6 inline-block
                         font-bold text-base place-self-start uppercase">Delete Post</button>
            <?php endif; ?>
        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Nour_blog\resources\views/blog/show.blade.php ENDPATH**/ ?>
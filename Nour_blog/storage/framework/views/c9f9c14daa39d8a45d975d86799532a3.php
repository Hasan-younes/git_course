<?php $__env->startSection('content'); ?>

        <div class="container text-center m-auto p-20 pb-5">
            <h1 class="text-6xl uppercase font-bold" >create new post</h1>
        </div>
        <div class=" container m-auto p-20 pb-5">
            <form action="/blog" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <?php echo csrf_field(); ?>
                <input type="text"
                name="title"
                placeholder="Title..."
                value=""
                class=" w-full h-20  text-6xl hover:border-gray-700 rounded-lg shadow-lg border-none p-14 mb-5"
                /><br><br>

                <textarea name="description"
                placeholder="descripton..."
                class=" w-full h-60  text-l hover:border-gray-700 rounded-lg shadow-lg border-none p-6 mb-5""></textarea>

                <div class="py-14">
                    <label class="
                    bg-gray-300 hover:bg-gray-700
                    text-gray-700 hover:text-gray-300
                    transition duration-300
                    p-4 rounded-lg
                    font-bold uppercase
                    ">
                        <span> Select an image to upload</span>
                        <input type="file" name="image" class=" hidden">
                    </label>
                </div>

                <button type="submit" class="
                bg-green-200 hover:bg-green-700
                text-green-700 hover:text-green-200
                transition duration-300
                p-4 rounded-lg
                font-bold uppercase
                ">Submit post</button>
            </form>
        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Nour_blog\resources\views/blog/create.blade.php ENDPATH**/ ?>
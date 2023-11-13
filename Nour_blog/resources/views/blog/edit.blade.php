@extends('home')
@section('content')

        <div class="container text-center m-auto p-20 pb-5">
            <h1 class="text-6xl uppercase font-bold" >edit on post</h1>
        </div>
        <div class=" container m-auto p-20 pb-5">
            <form action="/blog/{{$post->slug}}"
            method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @csrf
                @method('PUT')
                <input type="text"
                name="title"
                value="{{$post->title}}""
                class=" w-full h-20  text-6xl hover:border-gray-700 rounded-lg shadow-lg border-none p-14 mb-5"
                /><br><br>

                <textarea name="description"
                placeholder="descripton..."
                class=" w-full h-60  text-l hover:border-gray-700 rounded-lg shadow-lg border-none p-6 mb-5"">
                {{$post->description}}</textarea>

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

@endsection


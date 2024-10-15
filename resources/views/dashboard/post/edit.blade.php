@extends('dashboard.master')

@section('content')
    

    <div class="p-8">
        <h1>Actualizar POST</h1>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="p-8">
        <form action="{{ route('post.update', $post) }}" method="post">
            @csrf
            @method('PUT')
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" id="" name="title" value="{{ old('title', $post->title )}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>
                <div>
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Slug</label>
                    <input type="text" id="" name="slug" value="{{ old('slug', $post->slug )}}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>
                <div>
                    <label for=""
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
                    <textarea name="description" id="" cols="30" rows="10" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        >{{old('description',$post->description)}}</textarea>
                </div>
                <div>
                    <label for=""
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenido</label>
                    <textarea name="content" id="" cols="30" rows="10" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        >{{old('content',$post->content)}}</textarea>
                </div>
                <div>
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Posted</label>
                    <select id="" name="posted"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option {{ $post->posted == 'yes' ? 'selected' : '' }}  value="yes">Yes</option>
                        <option {{ $post->posted == 'not' ? 'selected' : '' }}  value="not">Not</option>
                    </select>
                </div>
                <div>
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Category</label>
                    <select id="" name="category_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($categories as $category)
                            <option @selected(old('category_id', $post->category_id) == $category->id ) value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>

    </div>
@endsection

@extends('dashboard.master')

@section('content')
    <div class=" flex justify-end p-12">
        <a href="{{ route('post.create') }}" type="button"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear</a>
    </div>


    <div class="mb-6 p-8">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Slug
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Descripcion
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Content
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Posted
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $post->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $post->title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $post->slug }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $post->description }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $post->content }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $post->posted }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $post->category_id }}
                            </td>
                            <td class=" px-6 py-4">
                                <a   href="{{ route('post.edit', $post) }}" >Edit</a>

                                <form action="{{ route('post.destroy', $post)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>

    <div class="flex justify-end p-12">
        {{ $posts->links() }}
    </div>
@endsection

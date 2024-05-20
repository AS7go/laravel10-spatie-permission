<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container mt-6">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('add-post1')}}" type="button" class="btn btn-outline-success mb-4">Add new post</a>

                @foreach ($posts as $post)
                <div class="card mb-4">
                    <div class="card-header">{{$post->name}}</div>
                    <div class="card-body">
                        <p>{{$post->text}}<br>{{$post->created_at}}</p>
                        <a href="{{route('edit-post1', $post->id)}}" class="btn btn-outline-primary">Edit</a>
                        <a href="#" class="btn btn-outline-danger">Delete</a>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>

</x-app-layout>

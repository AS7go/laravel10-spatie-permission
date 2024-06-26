<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container mt-6">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success mt-4">
                        {{ session('status') }}
                    </div>
                @endif
                @if (auth()->user()->can('add posts'))
                    <a href="{{ route('add-post1') }}" type="button" class="btn btn-outline-success mb-4">Add new post</a>
                @endif

                @if (auth()->user()->can('show posts'))
                    @foreach ($posts as $post)
                        <div class="card mb-4">
                            <div class="card-header">{{ $post->name }}</div>
                            <div class="card-body">
                                <p>{{ $post->text }}<br>{{ $post->created_at }}</p>

                                @if (auth()->user()->can('edit posts'))
                                    <a href="{{ route('edit-post1', $post->id) }}"
                                        class="btn btn-outline-primary">Edit</a>
                                @endif

                                @if (auth()->user()->can('delete posts'))
                                    <form action="{{ route('delete-post1', $post->id) }}" method="POST"
                                        style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>

</x-app-layout>

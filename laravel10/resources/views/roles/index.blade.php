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

                <a href="{{ route('roles.create') }}" type="button" class="btn btn-outline-success mb-4">Add new role</a>
                @foreach ($roles as $role)
                    <div class="card mb-4">
                        <div class="card-header">{{ $role->name }}</div>
                        <div class="card-body">
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-outline-primary">Edit</a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>

</x-app-layout>

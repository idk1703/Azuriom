@extends('admin.layouts.admin')

@section('title', trans('admin.posts.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ trans('admin.fields.title') }}</th>
                        <th scope="col">{{ trans('admin.fields.slug') }}</th>
                        <th scope="col">{{ trans('admin.fields.author') }}</th>
                        <th scope="col">{{ trans('admin.fields.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">
                                {{ $post->id }}
                                @if($post->is_pinned)
                                    <i class="fas fa-thumbtack text-primary rotate-45" title="Pinned" data-toggle="tooltip"></i>
                                @endif
                            </th>
                            <td>{{ $post->title }}</td>
                            <td><a href="{{ route('posts.show', $post->slug) }}">{{ $post->slug }}</a></td>
                            <td><a href="{{ route('admin.users.edit', $post->author ) }}">{{ $post->author->name }}</a></td>
                            <td>
                                <a href="{{ route('admin.posts.edit', $post) }}" class="mx-1" title="{{ trans('admin.actions.edit') }}" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.posts.destroy', $post) }}" class="mx-1" title="{{ trans('admin.actions.delete') }}" data-toggle="tooltip" data-confirm="delete"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{ $posts->links() }}

            <a class="btn btn-primary" href="{{ route('admin.posts.create') }}">
                <i class="fas fa-plus"></i> {{ trans('admin.actions.create') }}
            </a>
        </div>
    </div>
@endsection

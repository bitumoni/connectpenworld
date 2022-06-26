@extends('layouts.app')

@section('showpost')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>How to Fetch data in Laravel 8</h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>user_id</th>
                                <th>Content</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Keywords</th>
                                <th>Language</th>
                                <th>Privacy</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($post as $item)
                            <tr>
                                <td>{{ $item->post_id }}</td>
                                <td>{{ $item->post_user_id }}</td>
                                <td>{{ $item->post_content }}</td>
                                <td>{{ $item->post_title }}</td>
                                <td>{{ $item->post_category }}</td>
                                <td>{{ $item->post_keywords }}</td>
                                <td>{{ $item->post_language }}</td>
                                <td>{{ $item->post_privacy }}</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                                <td>
                                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

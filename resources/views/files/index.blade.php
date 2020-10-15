@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">files list</div>

                <div class="card-body">

                    <a href="{{ route('files.create') }}" class="btn btn-primary">Add new file</a>
                    <br /><br />

                    <table class="table">
                        <tr>
                            <th>Filename</th>
                            <th>Download file</th>
                            <th>Size (MB)</th>
                        </tr>
                        @forelse ($files as $file)
                            <tr>
                                <td>{{ $file->filename }}</td>
                                <td><a href="{{ route('files.download', $file->uuid) }}">{{ $file->file }}</a></td>
                                <td>{{ $file->size / 1000000 }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">No files found.</td>
                            </tr>
                        @endforelse
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
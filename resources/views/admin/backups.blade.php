@extends('layouts.admin')

@section('title')
    Backup Configuration
@endsection

@section('content-header')
    <h1>Backup Configuration<small>Manage backup settings for Restic and Borg</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">Admin</a></li>
        <li class="active">Backup Configuration</li>
    </ol>
@endsection

@section('content')
    <form action="{{ route('admin.backups.update') }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Restic Configuration</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="restic_repository">Repository</label>
                            <input type="text" name="restic_repository" id="restic_repository" class="form-control" value="{{ old('restic_repository', config('backups.disks.restic.repository')) }}">
                        </div>
                        <div class="form-group">
                            <label for="restic_password">Password</label>
                            <input type="password" name="restic_password" id="restic_password" class="form-control" value="{{ old('restic_password', config('backups.disks.restic.password')) }}">
                        </div>
                        <div class="form-group">
                            <label for="restic_path">Path</label>
                            <input type="text" name="restic_path" id="restic_path" class="form-control" value="{{ old('restic_path', config('backups.disks.restic.path')) }}">
                        </div>
                        <div class="form-group">
                            <label for="restic_options">Options</label>
                            <input type="text" name="restic_options" id="restic_options" class="form-control" value="{{ old('restic_options', config('backups.disks.restic.options')) }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Borg Configuration</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="borg_repository">Repository</label>
                            <input type="text" name="borg_repository" id="borg_repository" class="form-control" value="{{ old('borg_repository', config('backups.disks.borg.repository')) }}">
                        </div>
                        <div class="form-group">
                            <label for="borg_password">Password</label>
                            <input type="password" name="borg_password" id="borg_password" class="form-control" value="{{ old('borg_password', config('backups.disks.borg.password')) }}">
                        </div>
                        <div class="form-group">
                            <label for="borg_path">Path</label>
                            <input type="text" name="borg_path" id="borg_path" class="form-control" value="{{ old('borg_path', config('backups.disks.borg.path')) }}">
                        </div>
                        <div class="form-group">
                            <label for="borg_options">Options</label>
                            <input type="text" name="borg_options" id="borg_options" class="form-control" value="{{ old('borg_options', config('backups.disks.borg.options')) }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">S3 Configuration</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="s3_bucket">Bucket</label>
                            <input type="text" name="s3_bucket" id="s3_bucket" class="form-control" value="{{ old('s3_bucket', config('backups.disks.s3.bucket')) }}">
                        </div>
                        <div class="form-group">
                            <label for="s3_prefix">Prefix</label>
                            <input type="text" name="s3_prefix" id="s3_prefix" class="form-control" value="{{ old('s3_prefix', config('backups.disks.s3.prefix')) }}">
                        </div>
                        <div class="form-group">
                            <label for="s3_endpoint">Endpoint</label>
                            <input type="text" name="s3_endpoint" id="s3_endpoint" class="form-control" value="{{ old('s3_endpoint', config('backups.disks.s3.endpoint')) }}">
                        </div>
                        <div class="form-group">
                            <label for="s3_use_path_style_endpoint">Use Path Style Endpoint</label>
                            <input type="checkbox" name="s3_use_path_style_endpoint" id="s3_use_path_style_endpoint" class="form-control" {{ old('s3_use_path_style_endpoint', config('backups.disks.s3.use_path_style_endpoint')) ? 'checked' : '' }}>
                        </div>
                        <div class="form-group">
                            <label for="s3_use_accelerate_endpoint">Use Accelerate Endpoint</label>
                            <input type="checkbox" name="s3_use_accelerate_endpoint" id="s3_use_accelerate_endpoint" class="form-control" {{ old('s3_use_accelerate_endpoint', config('backups.disks.s3.use_accelerate_endpoint')) ? 'checked' : '' }}>
                        </div>
                        <div class="form-group">
                            <label for="s3_storage_class">Storage Class</label>
                            <input type="text" name="s3_storage_class" id="s3_storage_class" class="form-control" value="{{ old('s3_storage_class', config('backups.disks.s3.storage_class')) }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Local Configuration</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="local_path">Path</label>
                            <input type="text" name="local_path" id="local_path" class="form-control" value="{{ old('local_path', config('backups.disks.local.path')) }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Mount Backup</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="backup_type">Backup Type</label>
                    <select name="backup_type" id="backup_type" class="form-control">
                        <option value="restic">Restic</option>
                        <option value="borg">Borg</option>
                        <option value="s3">S3</option>
                        <option value="local">Local</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="backup_id">Backup ID</label>
                    <input type="text" name="backup_id" id="backup_id" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Mount Backup</button>
            </div>
        </div>
    </form>
@endsection

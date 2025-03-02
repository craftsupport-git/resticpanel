<?php

namespace Pterodactyl\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Pterodactyl\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class BackupConfigController extends Controller
{
    /**
     * Show the backup config editor page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.backups');
    }

    /**
     * Handle the form submission and update the backup config.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'restic_repository' => 'required|string',
            'restic_password' => 'required|string',
            'restic_path' => 'required|string',
            'restic_options' => 'required|string',
            'borg_repository' => 'required|string',
            'borg_password' => 'required|string',
            'borg_path' => 'required|string',
            'borg_options' => 'required|string',
            's3_bucket' => 'required|string',
            's3_prefix' => 'required|string',
            's3_endpoint' => 'required|string',
            's3_use_path_style_endpoint' => 'required|boolean',
            's3_use_accelerate_endpoint' => 'required|boolean',
            's3_storage_class' => 'required|string',
            'local_path' => 'required|string',
            'backup_type' => 'required|string|in:restic,borg,s3,local',
            'backup_id' => 'required|string',
        ]);

        Config::set('backups.disks.restic.repository', $data['restic_repository']);
        Config::set('backups.disks.restic.password', $data['restic_password']);
        Config::set('backups.disks.restic.path', $data['restic_path']);
        Config::set('backups.disks.restic.options', $data['restic_options']);
        Config::set('backups.disks.borg.repository', $data['borg_repository']);
        Config::set('backups.disks.borg.password', $data['borg_password']);
        Config::set('backups.disks.borg.path', $data['borg_path']);
        Config::set('backups.disks.borg.options', $data['borg_options']);
        Config::set('backups.disks.s3.bucket', $data['s3_bucket']);
        Config::set('backups.disks.s3.prefix', $data['s3_prefix']);
        Config::set('backups.disks.s3.endpoint', $data['s3_endpoint']);
        Config::set('backups.disks.s3.use_path_style_endpoint', $data['s3_use_path_style_endpoint']);
        Config::set('backups.disks.s3.use_accelerate_endpoint', $data['s3_use_accelerate_endpoint']);
        Config::set('backups.disks.s3.storage_class', $data['s3_storage_class']);
        Config::set('backups.disks.local.path', $data['local_path']);
        Config::set('backups.default', $data['backup_type']);
        Config::set('backups.backup_id', $data['backup_id']);

        return redirect()->route('admin.backups')->with('success', 'Backup configuration updated successfully.');
    }
}

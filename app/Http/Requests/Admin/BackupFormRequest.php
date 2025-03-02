<?php

namespace Pterodactyl\Http\Requests\Admin;

use Pterodactyl\Http\Requests\Admin\AdminFormRequest;

class BackupFormRequest extends AdminFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'restic_repository' => 'required|string|max:255',
            'restic_password' => 'required|string|max:255',
            'restic_path' => 'required|string|max:255',
            'restic_options' => 'nullable|string|max:255',
            'borg_repository' => 'required|string|max:255',
            'borg_password' => 'required|string|max:255',
            'borg_path' => 'required|string|max:255',
            'borg_options' => 'nullable|string|max:255',
            's3_bucket' => 'required|string|max:255',
            's3_prefix' => 'nullable|string|max:255',
            's3_endpoint' => 'nullable|string|max:255',
            's3_use_path_style_endpoint' => 'boolean',
            's3_use_accelerate_endpoint' => 'boolean',
            's3_storage_class' => 'nullable|string|max:255',
            'local_path' => 'required|string|max:255',
            'backup_type' => 'required|string|in:restic,borg,s3,local',
            'backup_id' => 'required|string|max:255',
        ];
    }
}

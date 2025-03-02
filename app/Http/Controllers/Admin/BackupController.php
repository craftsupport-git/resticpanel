<?php

namespace Pterodactyl\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Prologue\Alerts\AlertsMessageBag;
use Illuminate\View\Factory as ViewFactory;
use Pterodactyl\Http\Controllers\Controller;
use Pterodactyl\Http\Requests\Admin\BackupFormRequest;

class BackupController extends Controller
{
    /**
     * BackupController constructor.
     */
    public function __construct(
        private AlertsMessageBag $alert,
        private ViewFactory $view
    ) {
    }

    /**
     * Display backup configuration page.
     */
    public function index(): View
    {
        return $this->view->make('admin.backups');
    }

    /**
     * Handle request to update backup configuration.
     */
    public function update(BackupFormRequest $request): RedirectResponse
    {
        // Handle the form submission and update backup configuration
        // This is a placeholder implementation and should be replaced with actual logic
        $this->alert->success('Backup configuration updated successfully.')->flash();

        return redirect()->route('admin.backups');
    }
}

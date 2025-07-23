<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class UserSidebar extends Component
{
    public bool $isOpen = false;
    public ?User $user = null;
    public string $action = ''; // 'view', 'edit', or 'delete'

    #[On('showUserSidebar')]
    public function show($action, $userId = null)
    {
        $this->action = $action;
        $this->user = $userId ? User::find($userId) : null;
        $this->isOpen = true;
    }

    public function closeSidebar()
    {
        $this->isOpen = false;
        $this->reset(['user', 'action']);
    }

    public function render()
    {
        return view('livewire.admin.user-sidebar');
    }
}

<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthMemberAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if the user is logged in
        if (!session()->has('user')) {
            return redirect()->to('/login');
        }

        // Check user roles for specific routes
        $allowedRoles = $arguments ?? ['Member','Admin'];

        // Check if the user has at least one of the allowed roles
        if (empty($allowedRoles) || !$this->hasAllowedRole($allowedRoles)) {
            return redirect()->to('/access-denied'); // Redirect to access denied page
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing here
    }

    protected function hasAllowedRole(array $allowedRoles): bool
    {
        $userRole = session('user')['role'];

        foreach ($allowedRoles as $allowedRole) {
            if (in_array($userRole, explode(',', $allowedRole))) {
                return true;
            }
        }

        return false;
    }
}

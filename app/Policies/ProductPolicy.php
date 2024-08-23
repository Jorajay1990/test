<?php

namespace App\Policies;

use App\Models\User;

class ProductPolicy
{
    /**
     * Create a new policy instance.
     */
    public function manageProducts(User $user)
    {
        // Verifica si el usuario tiene el rol adecuado (ejemplo simplificado)
        return $user->hasRole('admin');
    }
}

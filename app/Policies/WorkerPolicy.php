<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Worker;
use Illuminate\Auth\Access\Response;

class WorkerPolicy
{
  /**
   * Determine whether the user can view any models.
   */
  public function viewAny(User $user): bool
  {
    return false;
  }

  /**
   * Determine whether the user can view the model.
   */
  public function view(User $user, Worker $worker): bool
  {
    return false;
  }

  /**
   * Determine whether the user can create models.
   */
  public function create(User $user): Response
  {
    return $user->role === User::ROLE_ADMIN
      ? Response::allow()
      : Response::denyWithStatus(404);
  }

  /**
   * Determine whether the user can update the model.
   */
  public function update(User $user, Worker $worker): Response
  {
    return $user->role === User::ROLE_ADMIN
      ? Response::allow()
      : Response::denyWithStatus(404);
  }

  /**
   * Determine whether the user can delete the model.
   */
  public function delete(User $user, Worker $worker): Response
  {
    return $user->role === User::ROLE_ADMIN
      ? Response::allow()
      : Response::denyWithStatus(404);
  }

  /**
   * Determine whether the user can restore the model.
   */
  public function restore(User $user, Worker $worker): bool
  {
    return false;
  }

  /**
   * Determine whether the user can permanently delete the model.
   */
  public function forceDelete(User $user, Worker $worker): bool
  {
    return false;
  }
}

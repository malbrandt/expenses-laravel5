<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 22.08.2017
 * Time: 22:14
 */

namespace App\Helpers;


use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemCards
{
    public static function forUser(User $user = null)
    {
        if ($user === null) {
            $user = Auth::user();
        }

        if (!$user || $user->isAdmin()) {
            // admin & guests sees counts for all users
            $db_counts = [
                'users' => DB::table('users')->count(),
                'pending' => DB::table('payments')->where('assent', '=', null)->count(),
                'accepted' => DB::table('payments')->where('assent', '=', 1)->count(),
                'rejected' => DB::table('payments')->where('assent', '=', -1)->count(),
            ];
        } else {
            // user can see own counts
            $db_counts = [
                'users' => DB::table('users')->count(),
                'pending' => $user->paymentsPending()->count(),
                'accepted' => $user->paymentsAccepted()->count(),
                'rejected' => $user->paymentsRejected()->count(),
            ];
        }

        return [
            [
                'class' => 'card text-white bg-secondary o-hidden h-100',
                'icon' => 'fa fa-fw fa-users',
                'text' => $db_counts['users'] . ' users',
                'link.href' => route('users.index'),
                'link.text' => 'Show Users',
                'roles' => ['admin'] // visibility
            ],
            [
                'class' => 'card text-white bg-primary o-hidden h-100',
                'icon' => 'fa fa-fw fa-list',
                'text' => $db_counts['pending'] . ' pending payments',
                'link.href' => route('payments.status', 'pending'),
                'link.text' => 'Show pending payments',
                'roles' => ['admin', 'user'] // visibility
            ],
            [
                'class' => 'card text-white bg-success o-hidden h-100',
                'icon' => 'fa fa-fw fa-thumbs-o-up',
                'text' => $db_counts['accepted'] . ' accepted payments',
                'link.href' => route('payments.status', 'accepted'), // route to admin.payments.confirmed
                'link.text' => 'Show accepted payments',
                'roles' => ['admin', 'user'] // visibility
            ],
            [
                'class' => 'card text-white bg-danger o-hidden h-100',
                'icon' => 'fa fa-fw fa-thumbs-o-down',
                'text' => $db_counts['rejected'] . ' rejected payments',
                'link.href' => route('payments.status', 'rejected'), // route to admin.payments.rejected
                'link.text' => 'Show rejected payments',
                'roles' => ['admin', 'user'] // visibility
            ]
        ];
    }
}
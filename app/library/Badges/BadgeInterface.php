<?php

/*
 +------------------------------------------------------------------------+
 | Phosphorum                                                             |
 +------------------------------------------------------------------------+
 | Copyright (c) 2013-2016 Phalcon Team and contributors                  |
 +------------------------------------------------------------------------+
 | This source file is subject to the New BSD License that is bundled     |
 | with this package in the file docs/LICENSE.txt.                        |
 |                                                                        |
 | If you did not receive a copy of the license and are unable to         |
 | obtain it through the world-wide-web, please send an email             |
 | to license@phalconphp.com so we can send you a copy immediately.       |
 +------------------------------------------------------------------------+
*/

namespace Phosphorum\Badges;

use Phosphorum\Models\Users;

interface BadgeInterface
{
    /**
     * Check whether the user can have the badge
     *
     * @param Users $user User model
     * @return boolean
     */
    public function canHave(Users $user);

    /**
     * Check whether the user already have this badge
     *
     * @param Users $user User model
     * @return boolean
     */
    public function has(Users $user);

    /**
     * Add the badge to the user
     *
     * @param Users $user User model
     * @param array $extra
     */
    public function add(Users $user, $extra = null);
}

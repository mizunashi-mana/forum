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

namespace Phosphorum\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Behavior\Timestampable;

/**
 * Class PostsVotes
 *
 * @property \Phosphorum\Models\Posts post
 * @property \Phosphorum\Models\Users user
 *
 * @package Phosphorum\Models
 */
class PostsVotes extends Model
{
    public $id;

    public $posts_id;

    public $users_id;

    public $vote;

    public $created_at;

    const VOTE_UP = 1;

    const VOTE_DOWN = 1;

    public function initialize()
    {
        $this->belongsTo(
            'posts_id',
            'Phosphorum\Models\Posts',
            'id',
            ['alias' => 'post']
        );

        $this->belongsTo(
            'users_id',
            'Phosphorum\Models\Users',
            'id',
            ['alias' => 'user']
        );

        $this->addBehavior(
            new Timestampable([
                'beforeValidationOnCreate' => ['field' => 'created_at']
            ])
        );
    }

    public function afterSave()
    {
        if ($this->id) {
            $viewCache = $this->getDI()->getShared('viewCache');
            $viewCache->delete('post-' . $this->posts_id);
        }
    }
}

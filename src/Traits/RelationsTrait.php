<?php

/*
 * This file is part of Eloquent Schema.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

/*
 * This file is part of Eloquent Schema.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Eloquent\Schema\Traits;

trait RelationsTrait
{
    /**
     * @param $name
     * @param null $indexName
     *
     * @return mixed
     */
    public function hasAndBelongsToMany($name, $indexName = null)
    {
        return $this->morphs($name, $indexName = null);
    }
}

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

trait TypesTrait
{
    /**
     * @param $column
     *
     * @return mixed
     */
    public function hashid($column)
    {
        return $this->char($column, 8);
    }

    /**
     * @param $column
     *
     * @return mixed
     */
    public function uuid($column)
    {
        return $this->char($column, 36);
    }

    /**
     * @param $column
     *
     * @return mixed
     */
    public function money($column)
    {
        return $this->decimal($column, 13, 4);
    }

    /**
     * @param $column
     *
     * @return mixed
     */
    public function bcrypt($column)
    {
        return $this->string($column, 60);
    }

    /**
     * @param $column
     *
     * @return mixed
     */
    public function ipaddr($column)
    {
        return $this->string($column, 45);
    }

    /**
     * @param $column
     *
     * @return mixed
     */
    public function percentage($column)
    {
        return $this->decimal($column, 5, 2);
    }
}

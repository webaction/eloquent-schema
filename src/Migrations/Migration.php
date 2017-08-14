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

namespace BrianFaust\Eloquent\Schema\Migrations;

use BrianFaust\Eloquent\Schema\Builder\Blueprint;

abstract class Migration
{
    /**
     * @var
     */
    protected $connection;

    /**
     * @var
     */
    protected $schema;

    /**
     * Migration constructor.
     */
    public function __construct()
    {
        $this->schema = \DB::getSchemaBuilder();

        $this->schema->blueprintResolver(function ($table, $callback) {
            return new Blueprint($table, $callback);
        });
    }

    /**
     * @return mixed
     */
    public function getConnection()
    {
        return $this->connection;
    }
}

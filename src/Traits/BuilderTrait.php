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

use BrianFaust\Eloquent\Schema\Builder\Blueprint;
use Closure;

trait BuilderTrait
{
    /**
     * @var array
     */
    protected $config = [
        'timestamps'         => true,
        'nullableTimestamps' => false,
        'softDeletes'        => false,
        'rememberToken'      => false,
        'hashid'             => false,
    ];

    /**
     * @param $table
     * @param Closure $callback
     */
    public function withPrimaryId($table, Closure $callback)
    {
        return $this->withPrimaryKey('increments', 'id', $table, $callback);
    }

    /**
     * @param $table
     * @param Closure $callback
     */
    public function withPrimaryUuid($table, Closure $callback)
    {
        return $this->withPrimaryKey('uuid', 'id', $table, $callback);
    }

    /**
     * @param $table
     * @param Closure $callback
     */
    public function withPrimaryHashid($table, Closure $callback)
    {
        return $this->withPrimaryKey('hashid', 'id', $table, $callback);
    }

    /**
     * @param $type
     * @param $key
     * @param $table
     * @param Closure $callback
     */
    private function withPrimaryKey($type, $key, $table, Closure $callback)
    {
        $blueprint = $this->createBlueprint($table);

        // increments already is a primary key
        ($type === 'increments') ? $blueprint->{$type}($key) : $blueprint->{$type}($key)->primary();

        foreach ($this->config as $key => $value) {
            if (!empty($value)) {
                if ($key === 'hashid') {
                    $blueprint->hashid('hashid')->index();

                    continue;
                }

                $blueprint->{$key}();
            }
        }

        $this->createTable($blueprint, $callback);
    }

    /**
     * @param bool $value
     *
     * @return BuilderTrait
     */
    public function timestamps($value = true)
    {
        $this->setConfig('nullableTimestamps', false);

        return $this->setConfig('timestamps', $value);
    }

    /**
     * @param bool $value
     *
     * @return BuilderTrait
     */
    public function nullableTimestamps($value = true)
    {
        $this->setConfig('timestamps', false);

        return $this->setConfig('nullableTimestamps', $value);
    }

    /**
     * @param bool $value
     *
     * @return BuilderTrait
     */
    public function softDeletes($value = true)
    {
        return $this->setConfig('softDeletes', $value);
    }

    /**
     * @param bool $value
     *
     * @return BuilderTrait
     */
    public function rememberToken($value = true)
    {
        return $this->setConfig('rememberToken', $value);
    }

    /**
     * @param bool $value
     *
     * @return BuilderTrait
     */
    public function hashid($value = true)
    {
        return $this->setConfig('hashid', $value);
    }

    /**
     * @param $table
     * @param Closure|null $callback
     *
     * @return Blueprint|mixed
     */
    protected function createBlueprint($table, Closure $callback = null)
    {
        if (isset($this->resolver)) {
            return call_user_func($this->resolver, $table, $callback);
        }

        return new Blueprint($table, $callback);
    }

    /**
     * @param Blueprint $blueprint
     * @param Closure   $callback
     */
    private function createTable(Blueprint $blueprint, Closure $callback)
    {
        $blueprint->create();

        $callback($blueprint);

        $this->build($blueprint);

        $this->resetConfig();
    }

    /**
     * @param $key
     * @param $value
     *
     * @return $this
     */
    private function setConfig($key, $value)
    {
        $this->config[$key] = $value;

        return $this;
    }

    private function resetConfig()
    {
        $this->config = [
            'timestamps'         => true,
            'nullableTimestamps' => false,
            'softDeletes'        => false,
            'rememberToken'      => false,
        ];
    }
}

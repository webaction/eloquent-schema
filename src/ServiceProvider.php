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

namespace BrianFaust\Eloquent\Schema;

use BrianFaust\Eloquent\Schema\Connectors\ConnectionFactory;

class ServiceProvider extends \BrianFaust\ServiceProvider\ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register(): void
    {
        parent::register();

        $this->app->singleton('db.factory', function ($app) {
            return new ConnectionFactory($app);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return array_merge(parent::provides(), ['db.factory']);
    }

    /**
     * Get the default package name.
     *
     * @return string
     */
    public function getPackageName(): string
    {
        return 'database';
    }
}

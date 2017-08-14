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

namespace BrianFaust\Eloquent\Schema\Builder;

use BrianFaust\Eloquent\Schema\Traits\RelationsTrait;
use BrianFaust\Eloquent\Schema\Traits\TypesTrait;
use Illuminate\Database\Schema\Blueprint as BaseBlueprint;

class Blueprint extends BaseBlueprint
{
    use RelationsTrait;
    use TypesTrait;
}

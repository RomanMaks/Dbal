<?php

namespace Runn\tests\Dbal\Drivers\Sqlite\Columns;

use PHPUnit\Framework\TestCase;
use Runn\Dbal\Columns\BooleanColumn;
use Runn\Dbal\Drivers\Sqlite\Driver;

class BooleanColumnTest extends TestCase
{

    public function testColumnDDL()
    {
        $driver = new Driver();

        $column = new BooleanColumn();
        $this->assertSame('INTEGER', $driver->getQueryBuilder()->getColumnDDL($column));

        $column = new BooleanColumn(['default' => null]);
        $this->assertSame('INTEGER DEFAULT NULL', $driver->getQueryBuilder()->getColumnDDL($column));

        $column = new BooleanColumn(['default' => true]);
        $this->assertSame('INTEGER DEFAULT 1', $driver->getQueryBuilder()->getColumnDDL($column));
    }

}

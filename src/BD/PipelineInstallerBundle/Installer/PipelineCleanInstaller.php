<?php
/**
 * This file is part of the eZ Publish Kernel package
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace BD\PipelineInstallerBundle\Installer;

use EzSystems\PlatformInstallerBundle\Installer\DbBasedInstaller;
use EzSystems\PlatformInstallerBundle\Installer\Installer;

class PipelineCleanInstaller extends DbBasedInstaller implements Installer
{
    public function importSchema()
    {
        $this->runQueriesFromFile(
            'vendor/ezsystems/ezpublish-kernel/data/mysql/schema.sql'
        );
    }

    public function importData()
    {
        $this->runQueriesFromFile(
            __DIR__ . '/../../pipeline-bundle-data/sql/pipeline-clean.sql'
        );
    }

    public function createConfiguration()
    {
    }

    public function importBinaries()
    {
    }
}

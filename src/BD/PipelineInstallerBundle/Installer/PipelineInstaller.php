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
use Symfony\Component\Filesystem\Filesystem;

class PipelineInstaller extends DbBasedInstaller implements Installer
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
            __DIR__ . '/../../PipelineBundleData/sql/pipeline.sql'
        );
    }

    public function createConfiguration()
    {
    }

    public function importBinaries()
    {
        $this->output->writeln( "Copying storage directory contents..." );
        $fs = new Filesystem();
        $fs->mkdir( 'web/var/ezdemo_site' );
        $fs->mirror(
            'src/BD/PipelineBundleData/var/pipeline_site/storage',
            'web/var/pipeline_site/storage'
        );
    }
}

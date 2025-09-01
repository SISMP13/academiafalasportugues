<?php

namespace Bittacora\MediaIntegrations\Commands;

use Illuminate\Console\Command;

class MediaIntegrationsCommand extends Command
{
    public $signature = 'media-integrations';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}

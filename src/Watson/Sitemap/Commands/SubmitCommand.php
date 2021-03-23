<?php

namespace Watson\Sitemap\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SubmitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:submit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Submit the sitemap to Google.';

    /**
     * The URL to ping Google with the sitemap.
     *
     * @var string
     */
    const PING_URL = "https://www.google.com/webmasters/tools/ping";

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $response = Http::get(static::PING_URL, [
            'sitemap' => url('sitemap.xml')
        ]);

        if ($response->ok()) {
            //
        }
    }
}

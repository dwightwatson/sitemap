<?php

namespace Watson\Sitemap\Commands;

use Illuminate\Console\Command;

class SubmitCommand extends Command
{
    /**
     * The URL to ping Google with the sitemap.
     *
     * @var string
     */
    const PING_URL = 'https://www.google.com/webmasters/tools/ping';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:submit {url?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Submit the sitemap to Google';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line('Submitting the sitemap to Google...');

        $sitemapUrl = $this->getSitemapUrl();

        $response = Http::get(static::PING_URL, [
            'sitemap' => $sitemapUrl
        ]);

        $response->ok()
            ? $this->info('The sitemap ['.$sitemapUrl.'] was successfully submitted.')
            : $this->error('The sitemap ['.$sitemapUrl.'] was rejected.');
    }

    /**
     * Get the sitemap URL to submit.
     *
     * @return string
     */
    protected function getSitemapUrl(): string
    {
        return $this->argument('url') ?: url('sitemaps');
    }
}

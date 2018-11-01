<?php

namespace Watson\Sitemap\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use GuzzleHttp\Exception\ClientException;

class SubmitCommand extends Command
{
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
    protected $description = 'Submit the sitemap to Google.';

    /**
     * The Guzzle client.
     *
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * The URL to ping Google with the sitemap.
     *
     * @var string
     */
    protected $pingUrl = 'https://www.google.com/webmasters/tools/ping';

    /**
     * Create a new command instance.
     *
     * @param  \GuzzleHttp\Client  $client
     * @return void
     */
    public function __construct(Client $client)
    {
        parent::__construct();

        $this->client = $client;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line('Submitting the sitemap to Google...');

        $sitemapUrl = $this->getSitemapUrl();

        try {
            $response = $this->client->request(
                'GET',
                $this->pingUrl,
                ['query' => ['sitemap' => $sitemapUrl]]
            );
        } catch (ClientException $e) {
            return $this->error('The sitemap ['.$sitemapUrl.'] was rejected.');
        }

        $this->info('The sitemap ['.$sitemapUrl.'] was successfully submitted.');
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

<?php

namespace Watson\Sitemap\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;

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

        $sitemapUrl = url('sitemap.xml');

        $response = $this->client->request(
            'GET',
            $this->pingUrl,
            ['query' => ['sitemap' => $sitemapUrl]]
        );

        if ($response->getStatusCode() !== 200) {
            return $this->error('An unexpected response was received.');
        }

        $this->info('A successful response was received.');
    }
}

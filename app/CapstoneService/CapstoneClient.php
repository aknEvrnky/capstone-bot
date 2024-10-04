<?php

namespace App\CapstoneService;

use DOMDocument;
use GuzzleHttp\Cookie\CookieJar;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Cookie\SessionCookieJar;

class CapstoneClient
{
    protected string $domain = 'capstone.eng.bau.edu.tr';
    protected CookieJar $cookieJar;

    protected PendingRequest $client;

    public function __construct()
    {
        $this->cookieJar = SessionCookieJar::fromArray([
            'session' => 'session',
        ], $this->domain);

        $this->client = Http::baseUrl("https://$this->domain")
            ->withOptions([
                'cookies' => $this->cookieJar
            ]);
    }

    public function login(string $email, string $password): void
    {
        $token = $this->extractCsrfToken();

        $response = $this->client->asForm()->post('/login', [
            'csrf_token' => $token,
            'next' => '',
            'email' => $email,
            'password' => $password,
        ]);

        $response->throw();

        // check if login is successful
        if ($response->status() !== 200) {
            throw new \Exception('Login failed');
        }

        // check if session cookie is set
        if (!$this->cookieJar->getCookieByName('session')) {
            throw new \Exception('Session cookie not set');
        }
    }

    protected function extractCsrfToken(): string
    {
        $response = $this->client->get('/login');
        $body = $response->body();

        // parse dom html
        $dom = new DOMDocument();
        @$dom->loadHTML($body);
        $xpath = new \DOMXPath($dom);
        $csrfXpath = '/html/body/form/input[2]';

        return $xpath->query($csrfXpath)->item(0)->getAttribute('value');
    }

    /**
     * @return array<array{title: string, id: string, content: string}>
     */
    public function get(FilterOptions $options): array
    {
        $response = $this->client->get('/' . $options->query());

        $body = $response->body();

        $response->throw();

        return $this->extractNodes($body);
    }

    /**
     * @return array<array{title: string, id: string, content: string}>
     */
    protected function extractNodes(string $body): array
    {
        $dom = new DOMDocument();
        @$dom->loadHTML($body);
        $xpath = new \DOMXPath($dom);
        $nodes = '/html/body/div[2]/div/div[position() > 1]';
        $nodes = $xpath->query($nodes);

        $data = [];

        foreach ($nodes as $node) {
            $href = $xpath->query('div/div[1]/a', $node)->item(0)->getAttribute('href');
            $id = (int)str_replace('/project/', '', $href);

            $title = $xpath->query('div/div[1]/a', $node)->item(0)->textContent;

            $content = $xpath->query('div/div[2]', $node)->item(0)->textContent;
            $content = trim($content);

            $data[] = [
                'id' => $id,
                'title' => $title,
                'content' => $content,
            ];
        }

        return $data;
    }
}

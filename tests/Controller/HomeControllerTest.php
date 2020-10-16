<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    public function testIndex()
    {
        // Create the client
        $client = static::createClient();
        // Go to the /login route
        $crawler = $client->request('GET', '/');
        // Test the response
        $this->assertResponseIsSuccessful();

        // Try client clicking links
        $link = $crawler
            ->filter('a')
            ->eq(1)
            ->link();
        $client->click($link);
    }
}

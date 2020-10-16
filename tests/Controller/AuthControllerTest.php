<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AuthControllerTest extends WebTestCase
{
    public function testLogin()
    {
        // Create the client
        $client = static::createClient();
        // Go to the /login route
        $crawler = $client->request('GET', '/login');
        // Test the response
        $this->assertResponseIsSuccessful();

        // Try client clicking links
        $link = $crawler
            ->filter('a')
            ->eq(1)
            ->link();
        $client->click($link);

        // Try submit form
        $form = $crawler->selectButton('Se connecter')->form();
        $form['_username'] = 'test@test.fr';
        $form['_password'] = 'MyPassword!';
        $client->submit($form);
    }

    public function testLogout()
    {
        // Create the client
        $client = static::createClient();
        // Go to the /login route
        $crawler = $client->request('GET', '/logout');
        // check that the response is a redirect to any URL
        $this->assertResponseRedirects();
    }

    public function testRegister()
    {
        // Create the client
        $client = static::createClient();
        // Go to the /login route
        $crawler = $client->request('GET', '/register');
        // Test the response
        $this->assertResponseIsSuccessful();

        // Try client clicking links
        $link = $crawler
            ->filter('a')
            ->eq(1)
            ->link();
        $client->click($link);
    }

    public function testForgotPassword()
    {
        // Create the client
        $client = static::createClient();
        // Go to the /login route
        $crawler = $client->request('GET', '/forgot-password');
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

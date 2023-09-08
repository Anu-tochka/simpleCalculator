<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CalculatorControllerTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Калькулятор');
    }
	
	public function testDivisionByZero()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $form = $crawler->selectButton('Вычислить')->form();
		$form['calc[arg1]']->setValue('5');
		$form['calc[sign]']->select('/');
        $form['calc[arg2]']->setValue('0');
		$crawler = $client->submit($form);
        $this->assertEquals('Делить на ноль нельзя!', $crawler->filter('#result')->text());
    }
}

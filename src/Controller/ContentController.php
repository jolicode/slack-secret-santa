<?php

/*
 * This file is part of the Slack Secret Santa project.
 *
 * (c) JoliCode <coucou@jolicode.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Joli\SlackSecretSanta\Controller;

use AdamPaterson\OAuth2\Client\Provider\Slack;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ContentController extends AbstractController
{
    private $twig;

    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    public function homepage(): Response
    {
        $content = $this->twig->render('content/homepage.html.twig');

        return new Response($content);
    }

    public function hallOfFame(): Response
    {
        $companies = [
            [
                'label' => 'Cap Collectif',
                'link' => 'https://cap-collectif.com/',
                'image' => 'cap-collectif.png',
            ],
            [
                'label' => 'Digital Ping Pong',
                'link' => 'https://digitalpingpong.com/',
                'image' => 'digital-ping-pong.jpg',
            ],
            [
                'label' => 'JoliCode',
                'link' => 'https://jolicode.com',
                'image' => 'jolicode.svg',
            ],
            [
                'label' => 'Monsieur Biz',
                'link' => 'https://monsieurbiz.com/',
                'image' => 'monsieur-biz.png',
            ],
        ];

        $content = $this->twig->render('content/hall_of_fame.html.twig', [
            'companies' => $companies,
        ]);

        return new Response($content);
    }
}
<?php

namespace App\Controller;

use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RandomImageController extends AbstractController
{
    #[Route('/', name: 'app_random_image')]
    public function index(): Response
    {
        $images = [];
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 9; $i++) {
            $images[$i]['image'] = 'https://picsum.photos/300/200?random=' . $i;
            $images[$i]['cardText'] = $faker->paragraph();
        }

        return $this->render('random_image/index.html.twig', [
            'images' => $images,
            'textBody' => $faker->paragraph(),
        ]);
    }
}

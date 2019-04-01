<?php
/**
 * Created by PhpStorm.
 * User: Godspleb
 * Date: 3/30/2019
 * Time: 11:39 PM
 */

namespace AppBundle\Controller;

// src/AppBundle/Controller/LuckyController.php
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number")
     */
    public function numberAction()
    {
        $number = random_int(0, 100);

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
    }
}
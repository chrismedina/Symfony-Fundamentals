<?php
/**
 * Created by PhpStorm.
 * User: Godspleb
 * Date: 4/1/2019
 * Time: 10:48 AM
 */

namespace ApiBundle\DataFixtures;

    use CoreBundle\Entity\Product;
    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Common\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        for ($i = 0; $i < 20; $i++) {
            $product = new Product();

            //available statuses
            $statuses = $product::STATUSES;

            $product->setIssn( mt_rand(10000000, 99999999) );
            $product->setName( 'product '.$i );
            $product->setStatus( $statuses[ array_rand( $statuses, 1  )] );
            $product->setCreatedAt( new \DateTime('NOW') );
            $manager->persist( $product );
        }

        $manager->flush();
    }
}

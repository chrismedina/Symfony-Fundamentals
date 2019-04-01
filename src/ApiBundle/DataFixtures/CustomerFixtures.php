<?php
/**
 * Created by PhpStorm.
 * User: Godspleb
 * Date: 4/1/2019
 * Time: 10:48 AM
 */

namespace ApiBundle\DataFixtures;

    use CoreBundle\Entity\Customer;
    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Common\Persistence\ObjectManager;

    use Ramsey\Uuid\Uuid;

class CustomerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        for ($i = 0; $i < 20; $i++) {
            $customer = new Customer();

            //available statuses
            $statuses = $customer::STATUSES;

            $customer->setUuid( Uuid::uuid4() );
            $customer->setFirstName( 'customer_first '.$i );
            $customer->setLastName( 'customer_last'.$i );
            $customer->setStatus( $statuses[ array_rand( $statuses, 1  )] );

            $random_time = mt_rand(1000000000,1666655681);
            $dob = new \DateTime();
            $dob->setTimestamp($random_time);

            $customer->setDateOfBirth( $dob );
            $customer->setCreatedAt( new \DateTime('NOW') );
            $manager->persist( $customer );
        }

        $manager->flush();
    }
}

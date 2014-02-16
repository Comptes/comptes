<?php
namespace Yomen\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Yomen\UserBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {   
        // create three users, that can be used for testing purposes
        $userAdmin = new User();
        $userAdmin->setUsername('admin');
        $userAdmin->setPlainPassword('admin');
        $userAdmin->setEmail('admin@example.com');
        $userAdmin->setEnabled(true);
        $manager->persist($userAdmin);

        $userAdmin = new User();
        $userAdmin->setUsername('user1');
        $userAdmin->setPlainPassword('user1');
        $userAdmin->setEmail('user1@example.com');
        $userAdmin->setEnabled(true);
        $manager->persist($userAdmin);

        $userAdmin = new User();
        $userAdmin->setUsername('user2');
        $userAdmin->setPlainPassword('user2');
        $userAdmin->setEmail('user2@example.com');
        $userAdmin->setEnabled(true);
        $manager->persist($userAdmin);

        $manager->flush();
    }
}
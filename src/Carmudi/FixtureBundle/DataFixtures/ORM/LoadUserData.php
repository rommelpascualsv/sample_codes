<?php

namespace Carmudi\FixtureBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Carmudi\UserBundle\Entity\User;

class LoadUserData  extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $em)
    {
        $userAdmin = new User();
        $userAdmin->setUsername('admin')
            ->setPlainPassword('admin')
            ->setEmail('test@test.com')
            ->setEnabled(true);
        
        $em->persist($userAdmin);
        $em->flush();
        
        $this->addReference('admin', $userAdmin);
    }
    
    public function getOrder()
    {
        return 1;
    }
}
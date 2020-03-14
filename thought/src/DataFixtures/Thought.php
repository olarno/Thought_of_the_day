<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Thought extends Fixture
{
    public function load(ObjectManager $em)
    {
        $loader = new ThoughtNativeLoader();

        $entities = $loader->loadFile(__DIR__ . '/fixtures.yaml')->getObjects();
        foreach ($entities as $entity) {

            $em->persist($entity);
        };
        $em->flush();
    }


}

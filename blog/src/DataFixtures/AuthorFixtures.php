<?php


namespace App\DataFixtures;

use App\Entity\Author;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Class AuthorFixtures
 * @package App\DataFixtures
 */
class AuthorFixtures extends Fixture
{
    public const AUTHOR = 'author';

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $author = new Author();
            $author
                ->setName($faker->lastname)
                ->setCreatedAt($faker->dateTime);

            $manager->persist($author);

            $this->setReference(self::AUTHOR . $i, $author);
        }
        $manager->flush();
    }
}
<?php


namespace App\DataFixtures;

use App\Entity\Article;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @return string[]
     */
    public function getDependencies(): array
    {
        return [
            AuthorFixtures::class,
        ];
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $gift = new Article();
            $gift
                ->setTitle($faker->words(3, true))
                ->setSubtitle($faker->sentence(5, true))
                ->setContent($faker->sentence(5, true))
                ->setCreatedAt($faker->dateTime)
                ->setAuthor($this->getReference(AuthorFixtures::AUTHOR . $faker->numberBetween(1, 9)));

            $manager->persist($gift);
        }
        $manager->flush();
    }
}
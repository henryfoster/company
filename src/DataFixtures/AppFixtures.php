<?php

namespace App\DataFixtures;

use App\Factory\CompanyFactory;
use App\Factory\EmployeeFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $companies = CompanyFactory::createMany(10);

        foreach ($companies as $company) {
            $randomEmployeeValue = random_int(0, 10);
            EmployeeFactory::createMany($randomEmployeeValue, function() use ($company) {
                return [
                    'company' => $company
                ];
            });
        }
    }
}

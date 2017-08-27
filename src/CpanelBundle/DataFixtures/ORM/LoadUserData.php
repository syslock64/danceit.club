<?php
/**
 * Created by PhpStorm.
 * User: Yuri
 * Date: 26/08/2017
 * Time: 18:21
 */

namespace CpanelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use CpanelBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    public function load(ObjectManager $manager)
    {
        $users = $this->getUsers();

        if( !count($users) ) return;

        $enc = $this->container->get('security.password_encoder');
        $pass = $this->container->getParameter('admin_password');

        foreach($users as $user)
        {
            $nUser = new User();
            $nUser->setEmail($user['email']);
            $nUser->setUsername($user['user']);
            $nUser->setRoles($user['roles']);
            $nUser->setSalt(md5(uniqid()));
            $nUser->setPassword($enc->encodePassword($nUser,$pass));

            $manager->persist($nUser);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }

    private function getUsers()
    {
        return [
            [
                'name'=>'Yuri Cristian Cauna Robles',
                'user'=>'syslock64',
                'email'=>'syslock64@gmail.com',
                'roles'=> ['ROLE_ADMIN','ROLE_SUPER_ADMIN'],
            ]
        ]
            ;
    }
}
<?php

/**
 * This file defines the load fixtures of article data in the Bundle HCHDemoBundle
 *
 * @category HCHDemoBundle
 * @package ORM
 * @author HCH <chaabani.hammadi@gmail.com>
 * @copyright 2016-2017 HCH
 * @version 1.0.0
 * @since File available since Release 1.0.0
 */
namespace HCH\DemoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use HCH\DemoBundle\Entity\Article; 

/**
 * Class LoadArticleData for Data Fixtures
 *
 * @category HCHDemoBundle
 * @package ORM
 * @author HCH <chaabani.hammadi@gmail.com>
 * @copyright 2016-2017 HCH
 * @version 1.0.0
 * @since File available since Release 1.0.0
 *
 */
class LoadArticleData implements FixtureInterface{
    public function load(objectManager $manager) {
        $article_1 = new Article();
        $article_1->setTitle('Article_1');
        $article_1->setLead('Permier article leading');
        $article_1->setBody('Permier article body'); 
        $article_1->setCreatedAt(new \DateTime());
        $article_1->setSlug('Permier article slug');
        $article_1->setCreatedBy('Permier article author');
        
        $article_2 = new Article();
        $article_2->setTitle('Article_2');
        $article_2->setLead('Deuxieme article leading');
        $article_2->setBody('Deuxieme article body'); 
        $article_2->setCreatedAt(new \DateTime());
        $article_2->setSlug('Deuxieme article slug');
        $article_2->setCreatedBy('Deuxieme article author');
        
        $manager->persist($article_1);
        $manager->persist($article_2);
        
        $manager->flush();
    }
}

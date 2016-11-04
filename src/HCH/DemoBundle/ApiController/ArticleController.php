<?php

/**
 * This file defines the Article controller in the Bundle HCHDemoBundle for the REST API
 *
 * @category HCHDemoBundle
 * @package ApiController
 * @author HCH <chaabani.hammadi@gmail.com>
 * @copyright 2016-2017 HCH
 * @version 1.0.0
 * @since File available since Release 1.0.0
 */
namespace HCH\DemoBundle\ApiController;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use HCH\DemoBundle\Entity\Article;
use HCH\DemoBundle\Form\ArticleType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\FOSRestBundle;
use FOS\RestBundle\Controller\FOSRestController;
use HCH\DemoBundle\ApiException\ApiException;
use HCH\DemoBundle\ApiResponse\ApiResponse;

/**
 * Class ArticleController for API services
 *
 * @category HCHDemoBundle
 * @package ApiController
 * @author HCH <chaabani.hammadi@gmail.com>
 * @copyright 2016-2017 HCH
 * @version 1.0.0
 * @since File available since Release 1.0.0
 *
 */
class ArticleController extends FOSRestController {

  /**
   * Get list of article
   *
   * @ApiDoc(
   *  section="01 Article services",
   *  resource = true,
   *  description = "Get list of article",
   *  statusCodes = {
   *     200 = "Returned when successful",
   *     5001 = "Error"
   *   }
   * )
   */
  public function getArticlesAction() {

    $articles = $this->getDoctrine()->getRepository('HCHDemoBundle:Article')
            ->findAll();

    return new ApiResponse(array('articles' => $articles));
  }

  /**
   * Get an article by Id
   *
   * @ApiDoc(
   *  section="01 Article services",
   *  resource = true,
   *  description = "Get an article by Id",
   *  statusCodes = {
   *     200 = "Returned when successful", 
   *     4001 = "Article not found",
   *     5001 = "Error"
   *   }
   * )
   */
  public function getArticleAction($id) {
    $em = $this->getDoctrine()->getEntityManager();
    $entityManager = $em->getRepository('HCHDemoBundle:Article');
    $article = $entityManager->findById($id);
    
    if (!$article) {
      throw new ApiException(4001);
    }
    return new ApiResponse(array('Article' => $article));
  } 

  /**
   * Create new Article
   *
   * @ApiDoc(
   *  section="01 Article services",
   *  resource = true,
   *  description = "Create new article", 
   *  input = {"class" = "HCH\DemoBundle\Form\ArticleType",
   *            "name"=""
   * },
   *  statusCodes = {
   *     200 = "Returned when successful", 
   *     4000 = "Form is not valid",
   *     5001 = "Error" 
   *   }
   * ) 
   */
  public function postArticleAction(Request $request) {

    $article = new Article();
    $form = $this->createForm(new ArticleType(), $article);
    $form->submit($request->request->all());

    if ($form->isValid()) {

      $em = $this->getDoctrine()->getManager();
      $em->persist($article);
      $em->flush();

      return new ApiResponse(array('article' => $article));
    } else {
      throw new ApiException(4000);
    }
  }

  /**
   * Update an article
   *
   * @ApiDoc(
   *  section="01 Article services",
   *  resource = true,
   *  description = "Update an article", 
   *  input = {"class" = "HCH\DemoBundle\Form\ArticleType",
   *            "name"=""
   * },
   *  name = "",
   *  statusCodes = {
   *     200 = "Returned when successful", 
   *     4001 = "Article not found",
   *     4000 = "Form is not valid",
   *     5001 = "Error"
   *   }
   * )
   * 
   */
  public function putArticleAction(Article $article, Request $request) {

    if (!$article) {
      throw new ApiException(4001);
    }
    $form = $this->createForm(new ArticleType(), $article);
    $form->submit($request->request->all());

    if ($form->isValid()) {

      $em = $this->getDoctrine()->getManager();
      $em->flush();
      return new ApiResponse(array('article' => $article));
    } else {
      throw new ApiException(4000);
    }
  }

  /**
   * Delete an article
   *
   * @ApiDoc(
   *  section="01 Article services",
   *  resource = true,
   *  description = "Delete an article",
   *  statusCodes = {
   *     200 = "Returned when successful", 
   *     4001 = "Article not found",
   *     5001 = "Error"
   *   }
   * )
   * 
   */
  public function deleteArticleAction(Article $id) {
    $em = $this->getDoctrine()->getEntityManager(); 
    
    if ($id === null) {
      throw new ApiException(4001);
    } 
    $em->remove($id);
    $em->flush();
    $articles = $this->getDoctrine()->getRepository('HCHDemoBundle:Article')->findAll();
    return new ApiResponse(array('articles' => $articles));
  }

}
